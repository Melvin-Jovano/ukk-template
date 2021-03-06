<?php

use yii\helpers\Url;
$url = Yii::$app->request->url;
$currentUrl = $this->context->route;

?>
<div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-light shadow" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <hr>
                            <?php if(Yii::$app->user->identity->level == 2): ?>
                            <a class="nav-link <?= $currentUrl == "student/index" || $currentUrl == "student/create" || $currentUrl == "student/view" || $currentUrl == "student/update" || $currentUrl == "student/delete" ? "active" : "" ?>" href="<?= Url::toRoute(['student/index']); ?>">
                                ~ Data Siswa
                            </a>
                            
                            <a class="nav-link <?= $currentUrl == "petugas/index" || $currentUrl == "petugas/create" || $currentUrl == "petugas/view" || $currentUrl == "petugas/update" || $currentUrl == "petugas/delete" ? "active" : "" ?>" href="<?= Url::toRoute(['petugas/index']); ?>">
                                ~ Data Petugas
                            </a>
                            
                            <a class="nav-link <?= $currentUrl == "classes/index" || $currentUrl == "classes/create" || $currentUrl == "classes/view" || $currentUrl == "classes/update" || $currentUrl == "classes/delete" ? "active" : "" ?>" href="<?= Url::toRoute(['classes/index']); ?>">
                                ~ Data Kelas
                            </a>

                            <a class="nav-link <?= $currentUrl == "spp/index" || $currentUrl == "spp/create" || $currentUrl == "spp/view" || $currentUrl == "spp/update" || $currentUrl == "spp/delete" ? "active" : "" ?>" href="<?= Url::toRoute(['spp/index']); ?>">
                                ~ Data Pembayaran
                            </a>
                            
                            <a class="nav-link <?= $currentUrl == "site/billing" ? "active" : "" ?>" href="<?= Url::toRoute(['site/billing']); ?>">
                                ~ Pembayaran
                            </a>

                            <a class="nav-link <?= $currentUrl == "site/report" ? "active" : "" ?>" href="<?= Url::toRoute(['site/report']); ?>">
                                ~ Laporan
                            </a>
                            <?php else: ?>
                                <a class="nav-link <?= $currentUrl == "site/billing" ? "active" : "" ?>" href="<?= Url::toRoute(['site/billing']); ?>">
                                    ~ Pembayaran
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </nav>
            </div>