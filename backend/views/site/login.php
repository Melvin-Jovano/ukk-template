<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login Admin';
?>

<main class="d-flex align-items-center py-md-0">
    <div class="container">
      <div class="card login-card bg-warning">
        <div class="row no-gutters">
        <div class="col-md-3"></div>
          <div class="col-md-6">
            <div class="card-body">
                <h1><?= Html::encode($this->title) ?></h1>

                <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true, 'autocomplete' => 'off'])->label("Username"); ?>
                
                <br>

                <?= $form->field($model, 'password')->passwordInput()->label("Password"); ?>

                <br>

                <div class="form-group">
                    <?= Html::submitButton('Login', ['class' => 'btn btn-warning', 'name' => 'login-button']) ?>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
          </div>
        </div>
      </div>
  </main>