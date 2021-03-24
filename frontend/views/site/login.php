<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
    <div class="row">
        <div class="col-lg-3"></div>
        <div class="col-lg-6 p-5 my-2">
            <h1 class="mb-5"><?= Html::encode($this->title) ?></h1>

            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
                <?php if($password): ?>
                    <?= $form->field($model, 'nisn')->textInput(['readonly' => true, 'placeholder' => "Silahkan Isi NISN Untuk Masuk"])->label("NISN")->label(false); ?>
                    <?= $form->field($model, 'password')->passwordInput(['autofocus' => true])->label("Kata Sandi"); ?>
                <?php else: ?>
                    <?= $form->field($model, 'nisn')->textInput(['autofocus' => true, 'placeholder' => "Silahkan Isi NISN Untuk Masuk"])->label("NISN")->label(false); ?>
                    <?= $form->field($model, 'password')->passwordInput(['style' => 'display:none;'])->label(false); ?>
                <?php endif; ?>

                <?= $form->field($model, 'rememberMe')->checkbox()->label("Ingat Saya"); ?>

                <div class="">
                    <?= Html::submitButton('Masuk', ['class' => 'btn btn-success', 'name' => 'login-button']) ?>
                </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
<?php
$this->registerJs('
    $(document).ready(function(){
        // $("#password-optional").hide();
    });', \yii\web\View::POS_READY);
?>