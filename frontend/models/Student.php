<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "student".
 *
 * @property int $nisn
 * @property int $nis
 * @property string $nama
 * @property int $id_kelas
 * @property string $alamat
 * @property string $no_telp
 * @property int $id_spp
 */
class Student extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */

    public $password;

    public static function tableName()
    {
        return 'siswa';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nisn'], 'required', 'message' => 'NISN Tidak Boleh Kosong'],
            [['nisn'], 'number', 'message' => 'NISN Harus Nomor'],
            [['nama'], 'required', 'message' => 'Nama Tidak Boleh Kosong'],
            [['nisn', 'nis', 'id_kelas', 'id_spp', 'id_jurusan'], 'integer'],
            [['nama', 'alamat', 'no_telp'], 'string'],
            [['nis'], 'unique'],
            [['nisn'], 'unique'],
            [['id_spp'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'nisn' => 'Nisn',
            'nis' => 'Nis',
            'nama' => 'Nama',
            'id_kelas' => 'Id Kelas',
            'alamat' => 'Alamat',
            'no_telp' => 'No Telp',
            'id_spp' => 'Id Spp',
        ];
    }

    public function getSiswa($nisn)
    {
        return static::findOne(['nisn' => $nisn]);

    }
}
