<?php
namespace frontend\models;

use Yii;
use yii\base\Model;
use frontend\models\Student;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $nisn;
    public $nama;
    public $password;
    public $repeat_password;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['nisn', 'required', 'message' => 'NISN Tidak Boleh Kosong'],
            ['nisn', 'unique', 'message' => 'NISN Sudah Terdaftar'],
            ['nisn', 'number', 'message' => 'NISN Harus Nomor'],
            ['nisn', 'string', 'min' => 8, 'tooShort' => 'NISN Terlalu Pendek'],

            ['nama', 'required', 'message' => 'Nama Tidak Boleh Kosong'],

            ['password', 'required', 'message' => 'Kata Sandi Tidak Boleh Kosong'],
            ['password', 'string', 'min' => 8, 'tooShort' => 'Kata Sandi Terlalu Pendek'],

            ['repeat_password', 'required', 'message' => "Ulangi Kata Sandi Tidak Boleh Kosong" ],
            ['repeat_password', 'compare', 'compareAttribute' => 'password', 'message' => "Kata Sandi Tidak Cocok" ],
        ];
    }

    public function signup($data = [])
    {
        $student = new Student;
        $student->nisn = (int)$data["SignupForm"]["nisn"];
        $student->nis = "";
        $student->nama = $data["SignupForm"]["nama"];
        $student->password = Yii::$app->security->generatePasswordHash($data["SignupForm"]["password"]);
        $student->id_kelas = "";
        $student->alamat = "";
        $student->no_telp = "";
        $student->id_spp = "";
        $student->created_at = date('Y-m-d H:i:s');

        $student->save();

    }
}
