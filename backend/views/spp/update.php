<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\spp */

$this->title = 'Ubah Data Pembayaran ' . $model->created_at;
$this->params['breadcrumbs'][] = ['label' => 'Spps', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="spp-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
