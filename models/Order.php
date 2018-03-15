<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "order".
 *
 * @property integer $id
 * @property string $first_name
 * @property string $last_name
 * @property string $phone
 * @property string $address
 * @property integer $number_post
 *
 * @property OrderBooks[] $orderBooks
 */
class Order extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'order';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['first_name', 'last_name', 'phone', 'address', 'number_post'], 'required'],
            [['number_post'], 'integer'],
            [['first_name', 'last_name', 'phone', 'address'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'phone' => 'Phone',
            'address' => 'Address',
            'number_post' => 'Number Post',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderBooks()
    {
        return $this->hasMany(OrderBooks::className(), ['order_id' => 'id']);
    }

    public function order()
    {
        $order = new Order();
        $order->first_name = $this->first_name;
        $order->last_name = $this->last_name;
        $order->phone = $this->phone;
        $order->address = $this->address;
        $order->number_post = $this->number_post;

        return $order->save() ? $order : null;
    }
}
