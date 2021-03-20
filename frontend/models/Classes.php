<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "class".
 *
 * @property int $id
 * @property string $class
 */
class Classes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $nama_petugas;
    public $class;
    
    public static function tableName()
    {
        return 'kelas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kelas'], 'required'],
            [['kelas'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'kelas' => 'Kelas',
        ];
    }
}
