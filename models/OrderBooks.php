<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "order_books".
 *
 * @property integer $id
 * @property integer $books_id
 * @property integer $order_id
 * @property string $name
 * @property string $price
 * @property integer $quantity
 *
 * @property Books $books
 * @property Order $order
 */
class OrderBooks extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'order_books';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['books_id', 'order_id', 'quantity'], 'integer'],
            [['price'], 'number'],
            [['name'], 'string', 'max' => 255],
            [['books_id'], 'exist', 'skipOnError' => true, 'targetClass' => Books::className(), 'targetAttribute' => ['books_id' => 'id']],
            [['order_id'], 'exist', 'skipOnError' => true, 'targetClass' => Order::className(), 'targetAttribute' => ['order_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'books_id' => 'Books ID',
            'order_id' => 'Order ID',
            'name' => 'Name',
            'price' => 'Price',
            'quantity' => 'Quantity',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBooks()
    {
        return $this->hasOne(Books::className(), ['id' => 'books_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrder()
    {
        return $this->hasOne(Order::className(), ['id' => 'order_id']);
    }
}
