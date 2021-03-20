<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Daftar';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pt-5">

    <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-8 card p-5 my-2">
            <h1><?= Html::encode($this->title) ?></h1>

            <p>Mohon Isi Data Di Bawah Ini Untuk Membuat Akun Baru :</p>
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                <div class="row">
                    <div class="col-lg-6">
                        <?= $form->field($model, 'nisn')->textInput()->label("NISN") ?>
                    </div>

                    <div class="col-lg-6">
                        <?= $form->field($model, 'nama')->textInput() ?>
                    </div>

                    <div class="col-lg-6">
                        <?= $form->field($model, 'password')->passwordInput()->label("Kata Sandi") ?>
                    </div>

                    <div class="col-lg-6">
                        <?= $form->field($model, 'repeat_password')->passwordInput()->label("Ulangi Kata Sandi") ?>
                    </div>
                </div>

                <div class="form-group">
                    <?= Html::submitButton('<i class="fas fa-plus mr-2"></i>Daftar', ['class' => 'btn btn-dark', 'name' => 'signup-button']) ?>
                </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
