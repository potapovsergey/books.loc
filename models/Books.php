<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "books".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $price
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $image
 * @property integer $author_id
 * @property integer $year_id
 * @property integer $category_id
 * @property integer $min_price
 * @property integer $max_price
 * @property integer $count
 *
 * @property Author $author
 * @property Category $category
 * @property Year $year
 */
class Books extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'image' => [
                'class' => 'rico\yii2images\behaviors\ImageBehave',
            ]
        ];
    }
    public static function tableName()
    {
        return 'books';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'description', 'price'], 'required'],
            [['price'], 'number'],
            [['created_at', 'updated_at', 'author_id', 'year_id', 'category_id', 'count'], 'integer'],
            [['name', 'image'], 'string', 'max' => 255],
            [['description'], 'string', 'max' => 4096],
            [['author_id'], 'exist', 'skipOnError' => true, 'targetClass' => Author::className(), 'targetAttribute' => ['author_id' => 'id']],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
            [['year_id'], 'exist', 'skipOnError' => true, 'targetClass' => Year::className(), 'targetAttribute' => ['year_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'description' => 'Description',
            'price' => 'Price',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'image' => 'Image',
            'author_id' => 'Автор',
            'year_id' => 'Рік',
            'category_id' => 'Category ID',
            'min_price' => 'Ціна від',
            'max_price' => 'і до',
            'count' => 'Количество',
        ];
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthor()
    {
        return $this->hasOne(Author::className(), ['id' => 'author_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getYear()
    {
        return $this->hasOne(Year::className(), ['id' => 'year_id']);
    }
}
