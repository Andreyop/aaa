<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\helpers\FileHelper;

/**
 * This is the model class for table "brands".
 *
 * @property int $id
 * @property string $name
 * @property string|null $image
 * @property int $status
 * @property int|null $created_at
 * @property int|null $updated_at
 *
 * @property Products[] $products
 */
class Brands extends \yii\db\ActiveRecord
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
        return 'brands';
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::class
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'status'], 'required'],
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['image'], 'string', 'max' => 2000],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'image' => Yii::t('app', 'Image'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * Gets query for [[Products]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::className(), ['brands_id' => 'id']);
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
            $this->image = '/brands/' . Yii::$app->security->generateRandomString() . '/' . $this->imageFile->name;
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
     * Возвращает информацию о бренде с идентификатором $id
     */
    public function getBrand($id) {
        $id = (int)$id;
        return self::findOne($id);
    }

    /**
     * Возвращает массив всех брендов каталога и
     * количество товаров для каждого бренда
     */
    public function getAllBrands() {
        return self::find()
            ->orderBy(['name' => SORT_ASC])
            ->asArray()
            ->all();
    }

    /**
     * Возвращает массив всех товаров бренда с идентификатором $id
     */
    public function getBrandProducts($id) {
        return Product::find()->where(['brands_id' => $id])->asArray()->all();
    }

    /**
     * Возвращает массив популярных брендов и
     * количество товаров для каждого бренда
     */
    public function getPopularBrands() {
        // получаем бренды с наибольшим кол-вом товаров
        $brands = Brands::find()
            ->select([
                'id' => 'brands.id',
                'name' => 'brands.name',
                'count' => 'COUNT(*)'
            ])
            ->innerJoin(
                'products',
                'products.brands_id = brands.id'
            )
            ->groupBy([
                'brands.id', 'brands.name'
            ])
            ->orderBy(['count' => SORT_DESC])
            ->limit(10)
            ->asArray()
            // для дальнейшей сортировки
            ->indexBy('name')
            ->all();
        // теперь нужно отсортировать бренды по названию
        ksort($brands);
        return $brands;
    }
}
