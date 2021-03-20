<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\spp */

$this->title = $model->created_at;
$this->params['breadcrumbs'][] = ['label' => 'Spps', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="spp-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('<i class="fas fa-trash-alt mr-2"></i>Hapus', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Apa Anda Yakin Ingin Menghapus Data ' . $model->nama_petugas . ' ?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('<i class="fas fa-pencil-alt mr-2"></i>Ubah', ['update', 'id' => $model->id], ['class' => 'btn btn-primary ml-3']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'id',
            'nisn',
            'nominal:ntext',
            'created_at',
        ],
    ]) ?>

</div>
