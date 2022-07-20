<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Books */
/* @var $form ActiveForm */
?>
<div class="books-create_update_view">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'author_id') ?>
        <?= $form->field($model, 'name') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- books-create_update_view -->
