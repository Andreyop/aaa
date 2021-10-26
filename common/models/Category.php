<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "category".
 *
 * @property int $id
 * @property int $parent_id
 * @property string $title
 * @property string|null $description
 * @property string|null $keywords
 * @property string|null $image
 * @property int|null $create_at
 * @property int|null $update_at
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

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['parent_id', 'create_at', 'update_at'], 'integer'],
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
            'create_at' => 'Create At',
            'update_at' => 'Update At',
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
