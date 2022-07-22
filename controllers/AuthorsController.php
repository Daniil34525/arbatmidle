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
        $dataProvider = new ActiveDataProvider([
            'query' => Authors::find(),
        ]);
        return $this->render('index', ['title' => $this->action->id,'dataProvider' => $dataProvider]);
    }

    public function actionCreate($id = null)
    {
        $model = new Authors();
        if ($model->load(Yii::$app->request->post()) && $model->save(false))
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
        $model = Authors::findOne($id);
        if ($model->load(Yii::$app->request->post()) && $model->save(false))
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
        $model = Authors::findOne($id);
        return $this->render('create_update_view',
            [
                'model' => $model,
                'title' => $this->action->id,
                'view' => true
            ]);
    }
    public function actionCreate_update_view($id = null)
    {
        $model = is_null($id) ? new Authors() : Authors::findOne($id);
        if ($model->load(Yii::$app->request->post()) && $model->save(false))
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
