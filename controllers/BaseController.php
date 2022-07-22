<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Response;

abstract class BaseController extends Controller
{
    public $modelClass;
    public $searchModelClass;
    public $indexView;
    public $updateView;

    public function actionIndex(): string
    {
        $searchModel = new $this->searchModelClass;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render($this->indexView,
            [
                'title' => $this->action->id,
                'dataProvider' => $dataProvider,
                'searchModel' => $searchModel
            ]
        );
    }

    public function actionCreate()
    {
        $model = new $this->modelClass;
        if ($model->load(Yii::$app->request->post()) && $model->save(false)) {
            return $this->redirect($this->indexView);
        }
        return $this->render($this->updateView,
            [
                'model' => $model,
                'title' => $this->action->id,
                'view' => false
            ]);
    }

    public function actionUpdate($id)
    {
        $model = $this->modelClass::findOne($id);
        if ($model->load(Yii::$app->request->post()) && $model->save(false)) {
            return $this->redirect($this->indexView);
        }
        return $this->render($this->updateView,
            [
                'model' => $model,
                'title' => $this->action->id,
                'view' => false
            ]);
    }

    public function actionView($id): string
    {
        $model = $this->modelClass::findOne($id);
        return $this->render($this->updateView,
            [
                'model' => $model,
                'title' => $this->action->id,
                'view' => true
            ]);
    }

    public function actionDelete($id): Response
    {
        $model = $this->modelClass::findOne($id);
        $model->delete();
        return $this->redirect($this->indexView);
    }
}