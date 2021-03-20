<?php

namespace backend\models;

use Yii;
/**
 * This is the model class for table "petugas".
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property string $nama_petugas
 * @property string $level
 */
class LoginPetugas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'petugas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['username', 'required', 'message' => 'Username Tidak Boleh Kosong'],
            ['password', 'required', 'message' => 'Kata Sandi Tidak Boleh Kosong'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'password' => 'Password',
            'nama_petugas' => 'Nama Petugas',
            'level' => 'Level',
        ];
    }

    public function login($data = [])
    {
        return Yii::$app->user->login($data, 3600);
    }
}
