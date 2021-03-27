<?php 

use yii\helpers\Url;
$url = Yii::$app->request->url;

?>

<nav class="sb-topnav navbar navbar-expand  shadow-lg" style="background-color:#F87171">
            <a class="navbar-brand text-dark" href=""><b>SPP APP</b></a>
            <button class="btn btn-link btn-sm order-1 order-lg-0 text-dark" id="sidebarToggle" href="#"><i class="fas fa-home"></i></button>
            <!-- Navbar Search-->
            <form id="search-form" class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0"></form>
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0">
                <!-- <a class="btn text-dark btn-light" data-method="post" href="<?= Url::toRoute(['site/logout']); ?>">Logout (<?= Yii::$app->user->identity->nama_petugas; ?>)
                </a> -->
            </ul>
        </nav>
