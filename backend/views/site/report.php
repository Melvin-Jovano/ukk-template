<?php 

$this->title = 'Generate Laporan';

?><?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use frontend\models\Classes;
use frontend\models\Skill;
use frontend\models\Student;
use yii\helpers\Url;

$this->title = 'Generate Laporan';

?>

<?php if (Yii::$app->user->identity->level == 2):?>
    <button id="printPDF" class="btn btn-success btn-sm ml-3">Download PDF</button>
<?php endif; ?>
<page>
    <div id="pdf-area" class="p-3">
        <h4 class="text-center mb-4 mt-2">Laporan Pembayaran Sekolah <span id="dateReport"></span></h4>
        <table class="table table-bordered table-striped">
            <tr>
                <th>No.</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Jurusan</th>
                <th>Tanggal & Waktu</th>
                <th>Nominal</th>
            </tr>

            <tbody id="tbody"></tbody>
        </table>
    </div>
</page>

<?php
$this->registerJs('
    $(document).ready(function(){
        function today() {
            var today = new Date();
            var dd = String(today.getDate()).padStart(2, "0");
            var mm = String(today.getMonth() + 1).padStart(2, "0"); //January is 0!
            var yyyy = today.getFullYear();

            today = mm + "-" + dd + "-" + yyyy;
            return today;
        }

        let dateData = new FormData;
        $("#nama-siswa").prop("disabled", "true");

        $("#id-class").change(() => {
            getSiswa();
        });

        $("#id-skill").change(() => {
            getSiswa();
        });

        getAllData();

        $("#printPDF").click(() => {
            printPDF("Laporan SPP");
        });

        function printPDF(name) {
            const pdf = document.getElementById("pdf-area");
            var opt = {
                margin: 0,
                filename: name + ".pdf",
                image: { type: "JPEG", quality: 1 },
                html2canvas: { scale: 1 },
                jsPDF: { unit: "in", format: "a4", orientation: "portrait" }
            };
            html2pdf().from(pdf).set(opt).save();
        }

        function getAllData() {
            let formData = new FormData;
            $.ajax({
                url : "/adit_ukk/admin/action/get-all-history",
                type : "post",
                data: formData,
                processData: false,
                contentType: false,
                success : (data) => {
                    $("#tbody").html("");
                    let num = 1;
                    let total = 0;
                    if(!data.data) {
                        alert("Data Tidak Ditemukan");
                    } else {
                        data.data.forEach((spp) => {
                            total += parseInt(spp.nominal);
                            let tr = document.createElement("tr");

                            let tdNum = document.createElement("td");
                            tdNum.innerHTML = num;

                            let tdNama = document.createElement("td");
                            tdNama.innerHTML = spp.nama;

                            let tdKelas = document.createElement("td");
                            tdKelas.innerHTML = spp.kelas;

                            let tdSkill = document.createElement("td");
                            tdSkill.innerHTML = spp.jurusan;

                            let tdDate = document.createElement("td");
                            tdDate.innerHTML = spp.created_at;

                            let tdNom = document.createElement("td");
                            tdNom.innerHTML = "Rp." + number_format(spp.nominal);

                            tr.append(tdNum);
                            tr.append(tdNama);
                            tr.append(tdKelas);
                            tr.append(tdSkill);
                            tr.append(tdDate);
                            tr.append(tdNom);

                            document.querySelector("#tbody").append(tr);
                            num++;
                        });
                        let tr = document.createElement("tr");

                        let tdJumlah = document.createElement("th");
                        tdJumlah.innerHTML = "Jumlah";
                        tdJumlah.setAttribute("colspan", "5");

                        let tdTotal = document.createElement("th");
                        tdTotal.innerHTML = "Rp." + number_format(total);

                        tr.append(tdJumlah);
                        tr.append(tdTotal);

                        document.querySelector("#tbody").append(tr);
                        // $("#dateReport").html("Seluruh Data");
                    }   
                }
            });
        }
    });', \yii\web\View::POS_READY);
?>