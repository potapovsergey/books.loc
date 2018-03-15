<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 19.04.2017
 * Time: 14:38
 */

namespace app\controllers;


use app\models\Author;
use app\models\BooksSearch;
use Yii;
use yii\web\Controller;
use app\models\RegForm;
use app\models\User;
use app\models\LoginForm;
use app\models\Books;
use yii\data\ActiveDataProvider;
use app\models\Year;
use app\models\Profile;
class MainController extends Controller
{

    public function actionIndex()
    {
        $models = Books::find()->limit(5);
        $dataProvider = new ActiveDataProvider([
            'query' => $models,
            'pagination'=> false,
            'sort'=>['defaultOrder'=>[
                'updated_at'=>SORT_DESC
            ]],
        ]);

        $model = $dataProvider->getModels();

        return $this->render('index',[
            'model' => $model
        ]);
    }
    public function actionAbout()
    {
        $models = Books::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $models
        ]);
        return $this->render('about',[
            'dataProvider' => $dataProvider
        ]);
    }
    public function actionContacts()
    {
        $models = Books::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $models
        ]);
        return $this->render('contacts',[
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
                        return $this->redirect('/profile/create');
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
    public function actionCategory($id)
    {
        $searchModel = new BooksSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('category',[
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
            'id_category' => $id
        ]);
    }
    public function actionYear($id)
    {
        $query = Books::find();
        $dataProvider = new ActiveDataProvider([
            'query'=>$query,
            'pagination'=> ['pageSize'=>5],
            'sort'=>['defaultOrder'=>['updated_at'=>SORT_DESC]]
        ]);
        $query->where(['year_id'=>$id]);
        return $this->render('index',[
            'dataProvider'=>$dataProvider,
        ]);
    }

    public function actionBooks($id)
    {
        $models = Books::findOne(['id' => $id]);
        return $this->render('books', [
            'model' => $models,
        ]);
    }

    public function actionSearch()
    {
        $search = Yii::$app->request->get('search');
        $query = Books::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query
        ]);

        $year = Year::findOne(['year' => $search]);
        $author = $this->authorFind($search);
        //var_dump($author[2]['id']);
        $query->Where(['year_id' => $year->id]);
        $query->orWhere(['like', 'name', $search]);
        $query->orWhere(['author_id' => $author->id]);


        return $this->render('search', [
            'dataProvider' => $dataProvider
        ]);
    }

    public function authorFind($search)
    {
        $query = Author::find()->limit(1);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => false
        ]);

        $query->Where(['like', 'name', $search]);

        $author = $dataProvider->getModels();

        return $author;
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->redirect([
            '/main/index'
        ]);
    }
}