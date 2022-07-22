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
?>
<div class="books-create_update_view">
    <?php $this->title = $title;
    $form = ActiveForm::begin(); ?>
    <?php if ($view) {
        $button = 'Ок'?>
        <div class="alert alert-secondary"> <?= $model->author->name ?> </div>
        <div class="alert alert-secondary"> <?= $model->name ?> </div>
        <a class="btn btn-success" href="index"><?= $button ?></a>
    <?php } else {
        $button = 'Сохранить';
        ?>
        <?= $form->field($model, 'author_id')->dropDownList(Authors::getAuthorList()); ?>
        <?= $form->field($model, 'name'); ?>
        <div class="form-group">
            <?= Html::submitButton($button, ['class' => 'btn btn-primary']) ?>
        </div>
    <?php } ?>

    <?php ActiveForm::end(); ?>

</div><!-- books-create_update_view -->
