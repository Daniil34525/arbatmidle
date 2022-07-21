<?php

namespace app\controllers;

use app\models\Books;
use Yii;
use yii\web\Controller;

class BooksController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index', ['title' => $this->action->id]);
    }

    public function actionCreate($id = null)
    {
        $model = is_null($id) ? new Books() : Books::findOne($id);

    }
    public function actionCreate_update_view($id = null)
    {
        $model = is_null($id) ? new Books() : Books::findOne($id);
        if ($model->load(Yii::$app->request->post()) && $model->save(false))
        {
            return $this->redirect('index');
        }
        return $this->render('create_update_view', ['model' => $model, 'title' => $this->action->id]);
    }
}
