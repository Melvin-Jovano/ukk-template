<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "skill".
 *
 * @property int $id
 * @property string $skill
 * @property string $alias
 */
class Password extends \yii\db\ActiveRecord
{
    public $repeat_password;
    public $password;
    public $password_2;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return false;
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['password_2'], 'required', 'message' => 'Kata Sandi Baru Tidak Boleh Kosong'],
            ['password_2', 'string', 'min' => 8, 'tooShort' => 'Kata Sandi Baru Terlalu Pendek'],

            [['password'], 'required', 'message' => 'Kata Sandi Lama Tidak Boleh Kosong'],

            ['repeat_password', 'compare', 'compareAttribute' => 'password_2', 'message' => "Kata Sandi Tidak Cocok" ],
            ['repeat_password', 'required', 'message' => 'Ulang Kata Sandi Baru Tidak Boleh Kosong'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'password' => 'Kata Sandi Lama',
            'password_2' => 'Kata Sandi Baru',
            'repeat_password' => 'Ulang Kata Sandi',
        ];
    }
}
