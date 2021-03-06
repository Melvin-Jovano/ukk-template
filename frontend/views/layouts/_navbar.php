<?php 

use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use yii\helpers\Html;

?>

<?php
    NavBar::begin([
        'brandLabel' => '<b>SPP APP</b>',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'shadow navbar-expand-lg navbar-light bg-light sticky-top',
        ],
    ]);
    // $menuItems = [
        
    // ];
    if (Yii::$app->user->isGuest) {
        // $menuItems[] = ['label' => '<i class="fas fa-user-plus mr-2"></i>Daftar', 'url' => ['/site/signup']];
        $menuItems[] = ['label' => 'Masuk', 'url' => ['/site/login']];
    } else {
        // $menuItems[] = ['label' => '<i class="fas fa-signal mr-2"></i>Riwayat Pembayaran', 'url' => ['/site/dashboard']];
        // $menuItems[] = ['label' => '<i class="fas fa-address-card mr-2"></i>Biodata', 'url' => ['/site/profile']];

        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->nama . ')',
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>';
    }
    echo Nav::widget([
        'options' => ['class' => 'nav-pills nav-fill ml-auto'], 
        'items' => $menuItems,
        'encodeLabels' => false,
    ]);
    NavBar::end();
