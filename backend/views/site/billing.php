<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use frontend\models\Classes;
use frontend\models\Skill;
use frontend\models\Student;
use yii\helpers\Url;

$this->title = 'Pembayaran';
?>

<div class="row">
    
    <div class="col-lg-12 mt-3">
        <div class="">

            <div class="card-content p-3">
                <?php $form = ActiveForm::begin(['id' => 'bio-form']); ?>
                <div class="row">
                    <div class="col-4">
                        <b class="mb-2 d-block">Kelas Siswa</b>
                        <?= Html::activeDropDownList(new Classes, 'id', ArrayHelper::map(Classes::find()->all(), 'id', 'kelas'), ['class' => "form-control siswa-form", "id" => "id-class", 'prompt' => 'Cari Kelas']) ?>
                    </div>

                    <div class="col-8">
                        <b class="mb-2 d-block">Jurusan Siswa</b>
                        <?= Html::activeDropDownList(new Skill, 'id', ArrayHelper::map(Skill::find()->all(), 'id', 'jurusan'), ['class' => "form-control siswa-form", "id" => "id-skill", 'prompt' => 'Cari Jurusan']) ?>
                    </div>

                    <div class="col-12 mt-3">
                        <b class="mb-2 d-block">Nama Siswa</b>
                        <select class="form-control" id="nama-siswa" name="nama-siswa">
                            <option></option>
                        </select>
                    </div>
                </div>
                
            </div>

        </div>
    </div>
    <hr>
    <div class="col-lg-12">
        <div class="">

            <div class="card-content p-3" id="transaksi">
                <div class="row">
                    <div class="col-6">
                        <b class="mb-2 d-block">Jumlah Uang</b>
                        <?= $form->field($model, 'nominal')->textInput(['id' => 'nominal'])->label(false); ?>
                    </div>

                    <div class="col-6">
                        <b class="mb-2 d-block">Kembalian</b>
                        <input type="text" disabled="true" id="exchange" class="form-control">
                    </div>
                </div>
                <?= Html::submitButton('Bayar', ['class' => 'btn btn-success ', 'id' => 'btn-pay']) ?>
            </div>
            
            <?php ActiveForm::end(); ?>

        </div>
    </div>

</div>

<?php

$this->registerJs('
    $(document).ready(function(){

        let price = 150000;
        $("#nama-siswa").prop("disabled", "true");
        $("#btn-pay").prop("disabled", "true");

        $("#nominal").on("keyup", (event) => {
            if (parseInt($("#nominal").val()) < price) {
                $("#exchange").val("0");
                $("#month").html("0");
                $("#btn-pay").prop("disabled", "true");
            } else {
                $("#btn-pay").removeAttr("disabled");
                $("#exchange").val( parseInt($("#nominal").val()) % price);
                $("#month").html(Math.floor(parseInt($("#nominal").val())/price));
            }
        });

        $("#id-class").change(() => {
            getSiswa();
        });

        $("#id-skill").change(() => {
            getSiswa();
        });

        function getSiswa() {
            let formData = new FormData;
            formData.append("class", $("#id-class").val());
            formData.append("skill", $("#id-skill").val());
            $.ajax({
                url : "/ardy_ukk/admin/action/get-siswa",
                type : "post",
                data: formData,
                processData: false,
                contentType: false,
                success : (data) => {
                    $("#nama-siswa").html("");
                    $("#btn-pay").prop("disabled", "true");
                    
                    if($("#id-skill").val() != "" && $("#id-class").val() != "") {
                        if(!data.siswa) {
                            $("#nama-siswa").prop("disabled", "true");
                        } else {
                            data.siswa.forEach((siswa) => {
                                let option = document.createElement("option");
                                option.setAttribute("value", siswa.nisn);
                                option.innerHTML = siswa.nama;

                                document.querySelector("#nama-siswa").append(option);
                            });
                            
                            $("#nama-siswa").removeAttr("disabled");
                        }
                    } else {
                        
                        $("#btn-pay").prop("disabled", "true");
                        $("#nama-siswa").prop("disabled", "true");
                    }
                }
            });
        }

    });', \yii\web\View::POS_READY);

?>