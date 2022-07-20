<?php

namespace app\controllers;

class BooksController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

}
