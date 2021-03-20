<?php
namespace common\models;

use Yii;
use yii\base\Model;
use frontend\models\Student;

/**
 * Login form
 */
class LoginForm extends Model
{
    public $nisn;
    public $password;
    public $rememberMe = true;

    private $_user;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['nisn'], 'required'],
            [ 'password', 'string'],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
        ];
    }

    /**
     * Logs in a user using the provided username and password.
     *
     * @return bool whether the user is logged in successfully
     */
    public function login($data = [])
    {
        return Yii::$app->user->login($data, $this->rememberMe ? 3600 * 24 * 30 : 0);
    }

    public function loginAdmin($data = [])
    {
        return Yii::$app->user->identity->login($data, $this->rememberMe ? 3600 * 24 * 30 : 0);
    }
}
