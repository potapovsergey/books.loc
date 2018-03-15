<?php

namespace app\controllers;

use Yii;
use app\models\Order;
use app\models\OrderSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\OrderBooks;
use app\models\Profile;
use app\models\Books;

/**
 * OrderController implements the CRUD actions for Order model.
 */
class OrderController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Displays a single Order model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Order model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @param boolean $id
     * @return mixed
     */
    public function actionCreate($id)
    {
        $model = new Order();

        $session = Yii::$app->session;
        $session->open();

        if (!Yii::$app->user->isGuest && $id == true && $model->load(Yii::$app->request->post())) {
            $profile = Profile::findOne(['user_id' => Yii::$app->user->identity['id']]);
            $model->first_name = $profile->first_name;
            $model->last_name = $profile->last_name;
            $model->phone = $profile->phone_name;
            $model->address = $profile->address_name;
            $model->save();
            $this->saveOrderBooks($session['cart'], $model->id);
            return $this->redirect(['view', 'id' => $model->id]);
        }

        if (!Yii::$app->user->isGuest && Profile::findOne(['user_id' => Yii::$app->user->identity['id']]) == false)
        {
            return $this->redirect('/profile/create');
        }

        if ($model->load(Yii::$app->request->post())) {
            if ($model->order() && $model->save()) {
                $this->saveOrderBooks($session['cart'], $model->id);
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    protected function saveOrderBooks($cart, $order_id)
    {
        foreach ($cart as $id => $item){
            $model = new OrderBooks();
            $books = Books::findOne(['id' => $id]);
            $model->books_id = $id;
            $model->order_id = $order_id;
            $model->name = $item['name'];
            $model->price = $item['price'];
            $model->quantity = $item['count'];
            $books->count -= $model->quantity;
            $books->save();
            $model->save();
            $this->cleanCart();
        }
    }

    protected function cleanCart()
    {
        $session = Yii::$app->session;
        $session->open();
        $session->remove('cart');
        $session->remove('cart.count');
        $session->remove('cart.sum');
    }

    /**
     * Finds the Order model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Order the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Order::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
