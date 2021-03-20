<?php

namespace backend\models;

use Yii;
/**
 * This is the model class for table "spp".
 *
 * @property int $id
 * @property string $nominal
 * @property string $created_at
 */
class Spp extends \yii\db\ActiveRecord
{
    public $nama_petugas;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'spp';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nisn'], 'required', 'message' => 'NISN Tidak Boleh Kosong'],
            [['nisn'], 'number', 'message' => 'NISN Harus Nomor'],
            [['nominal'], 'required', 'message' => 'Nominal Tidak Boleh Kosong'],
            [['nominal'], 'number', 'message' => 'Nominal Harus Nomor'],
            [['nominal'], 'compare','operator'=>'>=','compareValue'=>90, 'message'=>'Nominal Harus Lebih Besar Atau Sama Dengan 150000'  ],
            [['created_at'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nominal' => 'Nominal',
            'created_at' => 'Created At',
        ];
    }
}
