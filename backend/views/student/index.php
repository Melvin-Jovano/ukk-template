<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\StudentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Siswa';
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="">

    <?php 
        // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'nisn',
            'nis',
            'nama:ntext',
            // 'password:ntext',
            // 'id_kelas',
            //'id_skill',
            //'alamat:ntext',
            //'no_telp:ntext',
            //'id_spp',
            //'created_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <p class="float-right">
        <?= Html::a('Buat Data baru', ['create'], ['class' => 'btn btn-success my-3']) ?>
    </p>

</div>
