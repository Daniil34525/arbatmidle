<?php

use app\models\Authors;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var $this yii\web\View
 * @var $model app\models\Books
 * @var $form ActiveForm
 * @var $title string
 * @var $view bool
 *
 */
$view = false;
?>
<div class="books-create_update_view">
    <?php $this->title = $title;
    $form = ActiveForm::begin(); ?>
    <?php if ($view) { $button = 'Ok'?>
        <?= $form->field($model, 'author_id')->dropDownList(Authors::getAuthorList()); ?>
        <?= $form->field($model, 'name'); ?>
    <?php } else {
        $button = 'Сохранить';
        ?>
        <div class="alert alert-secondary"> <?= $model->author->name ?> </div>
        <div class="alert alert-secondary"> <?= $model->name ?> </div>
    <?php } ?>

    <div class="form-group">
        <?= Html::submitButton($button, ['class' => 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div><!-- books-create_update_view -->
