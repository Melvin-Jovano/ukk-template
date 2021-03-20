<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\MainAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

MainAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="sb-nav-fixed" style="background-color: whitesmoke">
<?php $this->beginBody() ?>

    <?= $this->render("_navbar.php"); ?>
    
    <div id="layoutSidenav">

        <?= $this->render("_sidenav.php"); ?>

        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid pt-4">
                    <?= Alert::widget() ?>
                    <?= $content; ?>
                </div>
            </main>
        </div>
    
    </div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
