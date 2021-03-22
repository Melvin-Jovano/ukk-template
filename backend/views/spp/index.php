<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\SppSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Pembayaran';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="spp-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'nisn',
            'nominal:ntext',
            'created_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <p class="float-right">
        <?= Html::a('Buat Data baru', ['create'], ['class' => 'btn btn-success my-3']) ?>
    </p>

</div>
