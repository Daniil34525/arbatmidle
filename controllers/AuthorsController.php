<?php

namespace app\controllers;

use app\models\Authors;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;

class AuthorsController extends Controller
{
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider(
            ['query' => Authors::find()]
        );
        return $this->render('index', ['dataProvider' => $dataProvider, 'title' => 'index']);
    }

    public function actionCreate_update_view($id = null)
    {
        $model = is_null($id) ? new Authors() : Authors::findOne($id);
        if ($model->load(Yii::$app->request->post()) && $model->save(false)) {
            return $this->redirect('/authors/index');
        }
        return $this->render('create_update_view', ['model' => $model, 'title' => 'create_update_view']);
    }
}
