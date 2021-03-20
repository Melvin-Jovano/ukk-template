<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Masuk';
?>

<main class="d-flex align-items-center py-md-0">
    <div class="container">
      <div class="card login-card">
        <div class="row no-gutters">
          <div class="col-md-5">
            <img src="/img/library.jpeg" alt="login" class="login-card-img">
          </div>
          <div class="col-md-7 pl-5">
            <div class="card-body">
                <h1><?= Html::encode($this->title) ?></h1>
                
                <p>Mohon Isi Data Dibawah Agar Dapat Masuk :</p>

                <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true, 'autocomplete' => 'off'])->label("Username"); ?>
                
                <br>

                <?= $form->field($model, 'password')->passwordInput()->label("Kata Sandi"); ?>

                <br>

                <div class="form-group">
                    <?= Html::submitButton('<i class="fas fa-door-open"></i>&nbsp;&nbsp;Masuk', ['class' => 'btn btn-dark btn-block', 'name' => 'login-button']) ?>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
          </div>
        </div>
      </div>
  </main>