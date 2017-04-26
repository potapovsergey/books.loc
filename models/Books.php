<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "books".
 *
 * @property integer $id
 * @property string $title
 * @property string $author
 * @property integer $year
 * @property string $description
 * @property integer $created_at
 * @property integer $update_at
 */
class Books extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
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
            [['title', 'author', 'year', 'description'], 'required'],
            [['year', 'created_at', 'update_at'], 'integer'],
            [['title', 'author'], 'string', 'max' => 255],
            [['description'], 'string', 'max' => 512],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'author' => 'Author',
            'year' => 'Year',
            'description' => 'Description',
            'created_at' => 'Created At',
            'update_at' => 'Update At',
        ];
    }
}
