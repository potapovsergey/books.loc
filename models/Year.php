<?php

namespace app\models;

use phpDocumentor\Reflection\Types\Null_;
use Yii;

/**
 * This is the model class for table "year".
 *
 * @property integer $id
 * @property string $year
 *
 * @property Books[] $books
 */
class Year extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'year';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['year'], 'required'],
            [['year'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'year' => 'Year',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBooks()
    {
        return $this->hasMany(Books::className(), ['year_id' => 'id']);
    }
    public function year($id){
        $model = new Year();
        $model->year=(string)$id;
        return $model->save() ? $model : null;
    }

}
