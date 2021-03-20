<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\spp */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="spp-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nisn')->textInput() ?>

    <?= $form->field($model, 'nominal')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('<i class="fas fa-check mr-2"></i>Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
