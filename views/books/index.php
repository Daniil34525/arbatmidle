<?php
/* @var $this yii\web\View
 * @var $title string
 * @var $dataProvider \yii\data\ActiveDataProvider
 */

use yii\grid\GridView;
use yii\helpers\Html;

$this->title = $title;
echo Html::a('Добавление книги',['create'],['class'=>'btn btn-success']);
echo GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        'id',
        'name',
        [
            'attribute' => 'Author_name',
            'value' => function($model){
                return $model->author->name;
            },
        ],
        [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{view} {update} {delete}',
        ],
    ]
]);

