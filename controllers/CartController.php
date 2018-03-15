<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 14.05.2017
 * Time: 11:41
 */

namespace app\controllers;

use app\models\Books;
use Yii;
use app\models\Cart;
use yii\web\Controller;

class CartController extends Controller
{
    public function actionAdd()
    {
        $id = Yii::$app->request->post('id');
        $books = Books::findOne($id);
        if (empty($books)) {
            return false;
        }
        $session = Yii::$app->session;
        $session->open();

        $cart = new Cart();
        $cart->addToCart($books);

        if (!Yii::$app->request->isAjax){
            return $this->redirect(Yii::$app->request->referrer);
        }

        $this->layout = false;
        return $this->render('cart_view', compact('session'));
    }

    public function actionClear()
    {
        $session = Yii::$app->session;
        $session->open();
        $session->remove('cart');
        $session->remove('cart.count');
        $session->remove('cart.sum');
        $this->layout = false;
        return $this->render('cart_view', compact('session'));
    }

    public function actionShow()
    {
        $session = Yii::$app->session;
        $session->open();
        $this->layout = false;
        return $this->render('cart_view', compact('session'));
    }

    public function actionDelete()
    {
        $id = Yii::$app->request->post('id');
        $books = Books::findOne($id);
        if (empty($books)) {
            return false;
        }

        $session = Yii::$app->session;
        $session->open();

        unset($_SESSION['coupons'][$books->id]);
        return $this->actionShow();
    }
}