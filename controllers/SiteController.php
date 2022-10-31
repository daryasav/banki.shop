<?php

namespace app\controllers;

use app\models\Image;
use Yii;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Image::find(),
        ]);
        return $this->render('index', ['dataProvider' => $dataProvider]);
    }

    public function actionAdd()
    {
        $model = new Image();
        if ($model->load(Yii::$app->request->post())){
            if($model->add()){
                return $this->redirect('index');
            }
        }
        return $this->render('add', compact('model'));
    }

    public function actionView($id)
    {
        $model = Image::find()->where(['id' => $id])->one();
        return $this->render('view', compact('model'));
    }

}
