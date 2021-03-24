<?php 

use yii\helpers\Url;
$url = Yii::$app->request->url;

?>

<nav class="sb-topnav navbar navbar-expand navbar-light bg-danger shadow-lg">
            <a class="navbar-brand" href=""><b>SPP APP</b></a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-home"></i></button>
            <!-- Navbar Search-->
            <form id="search-form" class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0"></form>
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0">
                <!-- <a class="btn text-dark btn-light" data-method="post" href="<?= Url::toRoute(['site/logout']); ?>">Logout (<?= Yii::$app->user->identity->nama_petugas; ?>)
                </a> -->
                <a class="nav-link" data-method="post" href="<?= Url::toRoute(['site/logout']); ?>">
                                    <div class="btn-danger btn-block btn">Logout (<?= Yii::$app->user->identity->nama_petugas; ?>)</div>
                                </a>
            </ul>
        </nav>
