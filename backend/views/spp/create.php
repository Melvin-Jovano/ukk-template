<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\spp */

$this->title = 'Buat Data Pembayaran Baru';
$this->params['breadcrumbs'][] = ['label' => 'Spps', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="spp-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
