<?php

namespace app\controllers;

use app\models\Authors;
use app\models\Books;
use app\models\BooksSearch;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;

class BooksController extends Controller
{
    public function actionIndex(): string
    {
        $searchModel = new BooksSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index',
            [
                'title' => $this->action->id,
                'dataProvider' => $dataProvider,
                'searchModel' => $searchModel
            ]
        );
    }

    public function actionCreate($id = null)
    {
        $model = new Books();
        if ($model->load(Yii::$app->request->post()) && $model->save())
        {
            return $this->redirect('index');
        }
        return $this->render('create_update_view',
            [
                'model' => $model,
                'title' => $this->action->id,
                'view' => false
            ]);
    }
    public function actionUpdate($id = null)
    {
        $model = Books::findOne($id);
        if ($model->load(Yii::$app->request->post()) && $model->save())
        {
            return $this->redirect('index');
        }
        return $this->render('create_update_view',
            [
                'model' => $model,
                'title' => $this->action->id,
                'view' => false
            ]);
    }
    public function actionView($id = null)
    {
        $model = Books::findOne($id);
        if ($model->load(Yii::$app->request->post()))
        {
            return $this->redirect('index');
        }
        return $this->render('create_update_view',
            [
                'model' => $model,
                'title' => $this->action->id,
                'view' => true
            ]);
    }
    public function actionCreate_update_view($id = null)
    {
        $model = is_null($id) ? new Books() : Books::findOne($id);
        if ($model->load(Yii::$app->request->post()) && $model->save())
        {
            return $this->redirect('index');
        }
        return $this->render('create_update_view',
            [
                'model' => $model,
                'title' => $this->action->id
            ]);
    }
}
