<?php

namespace app\controllers;

use app\models\Authors;
use app\models\AuthorsSearch;
use app\models\BooksSearch;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Response;

class AuthorsController extends BaseController
{
    public function actionIndex()
    {
        $searchModel = new AuthorsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index',
            [
                'title' => $this->action->id,
                'dataProvider' => $dataProvider,
                'searchModel' => $searchModel
            ]
        );
    }

    public function actionCreate()
    {
        $model = new Authors();
        if ($model->load(Yii::$app->request->post()) && $model->save(false)) {
            return $this->redirect('index');
        }
        return $this->render('create_update_view',
            [
                'model' => $model,
                'title' => $this->action->id,
                'view' => false
            ]);
    }

    public function actionUpdate($id)
    {
        $model = Authors::findOne($id);
        if ($model->load(Yii::$app->request->post()) && $model->save(false)) {
            return $this->redirect('index');
        }
        return $this->render('create_update_view',
            [
                'model' => $model,
                'title' => $this->action->id,
                'view' => false
            ]);
    }

    public function actionView($id): string
    {
        $model = Authors::findOne($id);
        return $this->render('create_update_view',
            [
                'model' => $model,
                'title' => $this->action->id,
                'view' => true
            ]);
    }

    public function actionDelete($id): Response
    {
        $model = Authors::findOne($id);
        $model->delete();
        return $this->redirect('index');
    }
}
