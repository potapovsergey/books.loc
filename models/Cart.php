<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 14.05.2017
 * Time: 11:43
 */

namespace app\models;


class Cart extends \yii\db\ActiveRecord
{
    public function addToCart($books, $count = 1)
    {
        if (isset($_SESSION['cart'][$books->id])) {
            $_SESSION['cart'][$books->id]['count'] += $count;
        } else {
            $_SESSION['cart'][$books->id] = [
                'count' => $count,
                'name' => $books->name,
                'price' => $books->price,
            ];
        }
        $_SESSION['cart.count'] = isset($_SESSION['cart.count']) ? $_SESSION['cart.count'] + $count : $count;
        $_SESSION['cart.sum'] = isset($_SESSION['cart.sum']) ? $_SESSION['cart.sum'] + $count * $books->price : $count * $books->price;
    }

    public function deleteToCart($books)
    {
        $_SESSION['cart.count'] -= $_SESSION['cart']['count'][$books->id];
        $_SESSION['cart.sum'] -= $_SESSION['cart']['price'][$books->id];
        unset($_SESSION['cart'][$books->id]);
    }
}