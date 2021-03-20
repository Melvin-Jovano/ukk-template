<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Student */

$this->title = $model->nama;
$this->params['breadcrumbs'][] = ['label' => 'Students', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="mt-4">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('<i class="fas fa-trash-alt mr-2"></i>Hapus', ['delete', 'id' => $model->nisn], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Apa Anda Yakin Ingin Menghapus Data ' . $model->nama . ' ?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('<i class="fas fa-pencil-alt mr-2"></i>Ubah', ['update', 'id' => $model->nisn], ['class' => 'btn btn-primary ml-3']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'nisn',
            'nis',
            'nama:ntext',
            'alamat:ntext',
            'no_telp:ntext',
        ],
    ]) ?>

</div>
