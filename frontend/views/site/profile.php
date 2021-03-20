<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use frontend\models\Classes;
use frontend\models\Skill;



$this->title = 'Biodata';
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="pt-5">

    <div class="row">
        <div class="col-lg-1"></div>
        <div class="col-lg-10 card p-5 my-2">
            <small class="bio-data">
                <button id="password-button" class="btn btn-sm btn-secondary my-3 d-block"><i id="icon-password" class="fas fa-key mr-2"></i>Buat / Ganti Password</button>
            </small>
            <?php $form = ActiveForm::begin(['id' => 'bio-form']); ?>
            <h2>
                <span class="bio-data"><?= $data['nama'] ?></span>
                <?= $form->field($data, 'nama')->textInput(['class' => 'biodata-form form-control'])->label(false); ?>
            </h2>
            <hr>
            <div id="bio">
                <div class="row">
                    <div class="col-6">
                        <div class="mb-1 font-weight-bold">NISN</div>
                        <small class="bio-data">~ <?= $data['nisn'] != "" ? $data['nisn'] : "Belum Diisi" ?></small>
                        <?= $form->field($data, 'nisn')->textInput(['class' => 'biodata-form form-control', 'readonly' => 'true', 'disabled' => 'true'])->label(false); ?>

                        <div class="mb-1 font-weight-bold mt-4">NIS</div>
                        <small class="bio-data">~ <?= $data['nis'] != "" ? $data['nis'] : "Belum Diisi" ?></small>
                        <?= $form->field($data, 'nis')->textInput(['class' => 'biodata-form form-control'])->label(false); ?>
                    </div>

                    <div class="col-6">
                        <div class="mb-1 font-weight-bold">Kelas</div>
                        <small class="bio-data">~ <?= $myClass['class'] != "" ? $myClass['class'] . " " . $mySkill['alias'] : "Belum Diisi" ?></small>
                        <div class="row">
                            <div class="col-3">
                                <?= Html::activeDropDownList(new Classes, 'id', ArrayHelper::map(Classes::find()->all(), 'id', 'class'), ['class' => "form-control biodata-form", 'options' => [$data['id_kelas'] => ['selected' => 'selected']]]) ?>
                            </div>

                            <div class="col-9">
                                <?= Html::activeDropDownList(new Skill, 'id', ArrayHelper::map(Skill::find()->all(), 'id', 'skill'), ['class' => "form-control biodata-form", 'options' => [$data['id_skill'] => ['selected' => 'selected']]]) ?>
                            </div>
                        </div>

                        <div class="mb-1 font-weight-bold mt-4">Nomor Telepon</div>
                        <small class="bio-data">~ <?= $data['no_telp'] != "" ? $data['no_telp'] : "Belum Diisi" ?></small>
                        <?= $form->field($data, 'no_telp')->textInput(['class' => 'biodata-form form-control', 'id' => 'tel'])->label(false); ?>
                    </div>

                    <div class="col-12">
                        <div class="mb-1 font-weight-bold">Alamat</div>
                        <small class="bio-data">~ <?= $data['alamat'] != "" ? $data['alamat'] : "Belum Diisi" ?></small>
                        <?= $form->field($data, 'alamat')->textInput(['class' => 'biodata-form form-control'])->label(false); ?>

                        <button id="update" class="btn btn-dark mt-3"><i class="fas fa-wrench mr-2"></i>Ubah</button>
                        <button id="cancel-update" class="action-button btn btn-dark mt-3 mr-4"><i class="fas fa-times mr-2"></i>Batal</button>
                        <button type="submit" id="do-update" class="action-button btn btn-dark mt-3"><i class="fas fa-check mr-2"></i>Simpan</button>
                    </div>
                </div>
            </div>
            <?php ActiveForm::end(); ?>

            <div id="pass">

                <?php $formPassword = ActiveForm::begin(['id' => 'pass-form']); ?>

                <?php if($old): ?>
                    <div class="row">
                        <div class="col-6">
                            <?= $formPassword->field($pass, 'password_2')->passwordInput(['class' => 'form-control']); ?>
                        </div>

                        <div class="col-6">
                            <?= $formPassword->field($pass, 'repeat_password')->passwordInput(['class' => 'form-control']); ?>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="row">
                        <div class="col-4">
                            <?= $formPassword->field($pass, 'password')->passwordInput(['class' => 'form-control']); ?>
                        </div>

                        <div class="col-4">
                            <?= $formPassword->field($pass, 'password_2')->passwordInput(['class' => 'form-control']); ?>
                        </div>

                        <div class="col-4">
                            <?= $formPassword->field($pass, 'repeat_password')->passwordInput(['class' => 'form-control']); ?>
                        </div>
                    </div>
                <?php endif; ?>

                <button type="submit" class="btn btn-dark mt-3"><i class="fas fa-check mr-2"></i>Simpan</button>

                <?php ActiveForm::end(); ?>

            </div>
            
        </div>
    </div>
</div>

<?php

$this->registerJs('
    let num = 1;
    $(document).ready(function(){
        $(".action-button").toggle();
        $("#pass").toggle();
        $(".biodata-form").toggle();
        
        $("#password-button").click((event) => {
            event.preventDefault();
            $("#password-button").html("");
            if(num % 2) {
                let icon = document.createElement("i");
                icon.setAttribute("class", "fas fa-redo mr-2");
                let label = document.createElement("span");
                label.innerHTML = "Kembali";

                document.querySelector("#password-button").append(icon);
                document.querySelector("#password-button").append(label);
            } else {
                let icon = document.createElement("i");
                icon.setAttribute("class", "fas fa-key mr-2");
                let label = document.createElement("span");
                label.innerHTML = "Buat / Ganti Password";

                document.querySelector("#password-button").append(icon);
                document.querySelector("#password-button").append(label);
            }
            $("#pass").slideToggle();
            $("#bio").slideToggle();
            num++;
        });

        $("#update").click((event) => {
            event.preventDefault();
            $(".biodata-form").toggle();
            $(".bio-data").toggle();
            $(".action-button").toggle();
            $("#update").toggle();
        });

        $("#cancel-update").click((event) => {
            event.preventDefault();
            $(".biodata-form").toggle();
            $(".bio-data").toggle();
            $(".action-button").toggle();
            $("#update").toggle();
        });

        $("#tel").on("keydown", () => {
            if($("#tel").val().length == 4) {
                $("#tel").val($("#tel").val() + "-"); 
            } else if($("#tel").val().length == 9) {
                $("#tel").val($("#tel").val() + "-"); 
            }
        });
    });', \yii\web\View::POS_READY);

?>
