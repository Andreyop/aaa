<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "category".
 *
 * @property int $id
 * @property int $parent_id
 * @property string $title
 * @property string|null $description
 * @property string|null $keywords
 * @property string|null $image
 * @property int|null $created_at
 * @property int|null $updated_at
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'category';
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
            [['parent_id', 'created_at', 'updated_at'], 'integer'],
            [['title'], 'required'],
            [['title', 'description', 'keywords', 'image'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parent_id' => 'Parent ID',
            'title' => 'Title',
            'description' => 'Description',
            'keywords' => 'Keywords',
            'image' => 'Image',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
    public function getParent() {
        // связь таблицы БД category с таблицей category
        return $this->hasOne(self::class, ['id' => 'parent_id']);
    }

    /**
     * Возвращает дочерние категории
     */
    public function getChildren() {
        // связь таблицы БД category с таблицей category
        return $this->hasMany(self::class, ['parent_id' => 'id']);
    }
}
