<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Petugas */

$this->title = 'Buat Petugas Baru';
$this->params['breadcrumbs'][] = ['label' => 'Petugas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="petugas-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
