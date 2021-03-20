<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PetugasSeacrhController */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Petugas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="petugas-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            'username:ntext',
            // 'password:ntext',
            'nama_petugas:ntext',
            'level',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <p class="float-right">
        <?= Html::a('Buat Data Kelas baru', ['create'], ['class' => 'btn btn-success my-3']) ?>
    </p>

</div>
