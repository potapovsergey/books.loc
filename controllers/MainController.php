<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 19.04.2017
 * Time: 14:38
 */

namespace app\controllers;


use Yii;
use yii\web\Controller;
use app\models\RegForm;
use app\models\User;
use app\models\LoginForm;
use app\models\Books;
use yii\data\ActiveDataProvider;

class MainController extends Controller
{

    public function actionIndex()
    {
        $models = Books::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $models
        ]);
        return $this->render('index',[
            'dataProvider' => $dataProvider
        ]);
    }

    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest):
            return $this->goHome();
        endif;

        $model = new LoginForm();

        if ($model->load(Yii::$app->request->post()) && $model->login()):
            return $this->goBack();
        endif;

        if (!Yii::$app->request->isAjax){
            return $this->render(
                'login',
                [
                    'model' => $model
                ]
            );
        }

        $this->layout = false;
        return $this->render(
            'modal_login',
            [
                'model' => $model
            ]
        );
    }

    public function actionReg()
    {
        $model = new RegForm();

        if ($model->load(Yii::$app->request->post()) && $model->validate()):
            if ($user = $model->reg()):
                if ($user->status === User::STATUS_ACTIVE):
                    if (Yii::$app->getUser()->login($user)):
                        Yii::$app->session->setFlash('success', 'Регистрация прошла успешно!');
                        return $this->goHome();
                    endif;
                endif;
            else:
                Yii::$app->session->setFlash('error', 'Возникла ошибка при регистрации');
                Yii::error('Ошибка при регистрации');
                return $this->refresh();
            endif;
        endif;

        return $this->render(
            'reg',
            [
                'model'=>$model
            ]
        );
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->redirect([
            '/main/index'
        ]);
    }
}