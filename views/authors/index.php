<?php
/* @var $this yii\web\View
 * @var $title
 * @var ActiveDataProvider $dataProvider
 * @var \app\models\AuthorsSearch $searchModel
 */

use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use yii\helpers\Html;

$this->title = $title;
echo Html::a('Добавление автора',['create'],['class'=>'btn btn-success']);
echo GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        'id',
        'name',
        [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{view} {update} {delete}',
        ],
    ]
]);
