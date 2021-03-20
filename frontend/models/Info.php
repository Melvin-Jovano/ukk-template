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
class Info extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
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
            [['nis'], 'required', 'message' => 'NIS Tidak Boleh Kosong'],
            [['nis'], 'number', 'message' => 'NIS Harus Nomor'],
            // [['no_telp'], 'required', 'message' => 'Nomor Telepon Tidak Boleh Kosong'],
            [['alamat'], 'required', 'message' => 'Alamat Tidak Boleh Kosong'],
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
