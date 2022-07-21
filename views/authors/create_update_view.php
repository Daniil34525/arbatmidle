<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View
 * @var $model app\models\Authors
 * @var $form ActiveForm
 * @var $title string
 * @var $view bool
 */

$this->title = $title;
$view = false;
?>
<div class="authors-create_update_view">

    <?php $form = ActiveForm::begin(); ?>

    <?php if ($view) {
        $button = 'Сохранить'?>
        <?= $form->field($model, 'name'); ?>
    <?php } else {
        $button = 'ОК';
        ?>
        <div class="alert alert-secondary"> <?= $model->name ?> </div>
    <?php } ?>
        <div class="form-group">
            <?= Html::submitButton($button, ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- authors-create_update_view -->
