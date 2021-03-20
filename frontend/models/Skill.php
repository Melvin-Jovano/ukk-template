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
class Skill extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'jurusan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['skill', 'alias'], 'required'],
            [['skill', 'alias'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'skill' => 'Skill',
            'alias' => 'Alias',
        ];
    }
}
