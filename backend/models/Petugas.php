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
class Petugas extends \yii\db\ActiveRecord
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
            ['username', 'unique'],
            [['username', 'password', 'nama_petugas', 'level'], 'required'],
            [['username', 'password', 'nama_petugas', 'level'], 'string'],
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
}
