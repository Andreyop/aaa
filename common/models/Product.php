<?php

namespace common\models;

use Stem\LinguaStemRu;
use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\data\Pagination;
use yii\db\Query;
use yii\helpers\FileHelper;

/**
 * This is the model class for table "{{%products}}".
 *
 * @property int $id
 * @property int $category_id
 * @property int $brands_id
 * @property string $name
 * @property string|null $description
 * @property string|null $image
 * @property float $old_price
 * @property float $price
 * @property int $status
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int $sale
 *
 * @property CartItem[] $cartItems
 * @property OrderItem[] $orderItems
 * @property User $createdBy
 * @property User $updatedBy
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * @var \yii\web\UploadedFile
     */
    public $imageFile;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%products}}';
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::class,
            BlameableBehavior::class
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name','category_id','brands_id', 'price','sale', 'old_price', 'status'], 'required'],
            [['description'], 'string'],
            [['price'], 'number'],
            [['imageFile'], 'image', 'extensions' => 'png, jpg, jpeg, webp', 'maxSize' => 10 * 1024 * 1024],
            [['status', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['image'], 'string', 'max' => 2000],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['updated_by' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_id' => 'Category',
            'brands_id' => 'Brands',
            'name' => 'Name',
            'description' => 'Description',
            'image' => 'Product Image',
            'imageFile' => 'Product Image',
            'price' => 'Price',
            'old_price' => 'Old Price',
            'sale' => 'Sale',
            'status' => 'Publish',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }

    /**
     * Gets query for [[CartItem]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\CartItemQuery
     */
    public function getCartItems()
    {
        return $this->hasMany(CartItem::className(), ['product_id' => 'id']);
    }

    /**
     * Gets query for [[OrderItem]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\OrderItemQuery
     */
    public function getOrderItems()
    {
        return $this->hasMany(OrderItem::className(), ['product_id' => 'id']);
    }
    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    /**
     * Gets query for [[CreatedBy]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\UserQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }

    /**
     * Gets query for [[UpdatedBy]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\UserQuery
     */
    public function getUpdatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'updated_by']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\ProductQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\ProductQuery(get_called_class());
    }

    public function save($runValidation = true, $attributeNames = null)
    {
        if ($this->imageFile) {
            $this->image = '/products/' . Yii::$app->security->generateRandomString() . '/' . $this->imageFile->name;
        }

        $transaction = Yii::$app->db->beginTransaction();
        $ok = parent::save($runValidation, $attributeNames);

        if ($ok && $this->imageFile) {
            $fullPath = Yii::getAlias('@frontend/web/storage' . $this->image);
            $dir = dirname($fullPath);
            if (!FileHelper::createDirectory($dir) | !$this->imageFile->saveAs($fullPath)) {
                $transaction->rollBack();

                return false;
            }
        }

        $transaction->commit();

        return $ok;
    }

    public function getImageUrl()
    {
        return self::formatImageUrl($this->image);
    }

    public static function formatImageUrl($imagePath)
    {
        if ($imagePath) {
            return Yii::$app->params['frontendUrl'] . '/storage' . $imagePath;
        }

        return Yii::$app->params['frontendUrl'] . '/img/no_image_available.png';
    }

    /**
     * Get short version of the description
     *
     * @return string
     *
     */
    public function getShortDescription()
    {
        return \yii\helpers\StringHelper::truncateWords(strip_tags($this->description), 30);
    }

    public function afterDelete()
    {
        parent::afterDelete();
        if ($this->image) {
            $dir = Yii::getAlias('@frontend/web/storage') . dirname($this->image);
            FileHelper::removeDirectory($dir);
        }
    }

    /**
     * Результаты поиска по каталогу товаров
     */
    public function getSearchResult($search, $page) {
        $search = $this->cleanSearchString($search);
        if (empty($search)) {
            return [null, null];
        }

        // пробуем извлечь данные из кеша
        $key = 'search-'.md5($search).'-page-'.$page;
        $data = Yii::$app->cache->get($key);

        if ($data === false) { // данных нет в кеше, получаем их заново
            // разбиваем поисковый запрос на отдельные слова
            $temp = explode(' ', $search);
            $words = [];
            $stemmer = new LinguaStemRu();
            foreach ($temp as $item) {
                if (iconv_strlen($item) > 3) {
                    // получаем корень слова
                    $words[] = $stemmer->stem_word($item);
                } else {
                    $words[] = $item;
                }
            }
            $relevance = "IF (`products`.`name` LIKE '%" . $words[0] . "%', 3, 0)";
            $relevance .= " + IF (`products`.`description` LIKE '%" . $words[0] . "%', 2, 0)";
            $relevance .= " + IF (`category`.`title` LIKE '%" . $words[0] . "%', 1, 0)";
            $relevance .= " + IF (`brands`.`name` LIKE '%" . $words[0] . "%', 1, 0)";
            for ($i = 1; $i < count($words); $i++) {
                $relevance .= " + IF (`products`.`name` LIKE '%" . $words[$i] . "%', 3, 0)";
                $relevance .= " + IF (`products`.`description` LIKE '%" . $words[$i] . "%', 2, 0)";
                $relevance .= " + IF (`category`.`title` LIKE '%" . $words[$i] . "%', 1, 0)";
                $relevance .= " + IF (`brands`.`name` LIKE '%" . $words[$i] . "%', 1, 0)";
            }
            $query = (new Query())
                ->select([
                    'id' => 'products.id',
                    'name' => 'products.name',
                    'price' => 'products.price',
                    'image' => 'products.image',
                    'sale' => 'products.sale',
                    'relevance' => $relevance
                ])
                ->from('products')
                ->join('INNER JOIN', 'category', 'category.id = products.category_id')
                ->join('INNER JOIN', 'brands', 'brands.id = products.brands_id')
                ->where(['like', 'products.name', $words[0]])
                ->orWhere(['like', 'products.description', $words[0]])
                ->orWhere(['like', 'category.title', $words[0]])
                ->orWhere(['like', 'brands.name', $words[0]]);
            for ($i = 1; $i < count($words); $i++) {
                $query = $query->orWhere(['like', 'products.name', $words[$i]]);
                $query = $query->orWhere(['like', 'products.keywords', $words[$i]]);
                $query = $query->orWhere(['like', 'category.title', $words[$i]]);
                $query = $query->orWhere(['like', 'brands.name', $words[$i]]);
            }
            $query = $query->orderBy(['relevance' => SORT_DESC]);

            // посмотрим, какой SQL-запрос был сформирован
//             print_r($query->createCommand()->getRawSql());

            // постраничная навигация
            $pages = new Pagination([
                'totalCount' => $query->count(),
                'pageSize' => Yii::$app->params['pageSize'],
                'forcePageParam' => false,
                'pageSizeParam' => false
            ]);
            $products = $query
                ->offset($pages->offset)
                ->limit($pages->limit)
                ->all();
            // сохраняем полученные данные в кеше
            $data = [$products, $pages];
            Yii::$app->cache->set($key, $data);
        }

        return $data;
    }


    /**
     * Вспомогательная функция, очищает строку поискового запроса с сайта
     * от всякого мусора
     */
    protected function cleanSearchString($search) {
        $search = iconv_substr($search, 0, 64);
        // удаляем все, кроме букв и цифр
        $search = preg_replace('#[^0-9a-zA-ZА-Яа-яёЁ]#u', ' ', $search);
        // сжимаем двойные пробелы
        $search = preg_replace('#\s+#u', ' ', $search);
        $search = trim($search);
        return $search;
    }
}
