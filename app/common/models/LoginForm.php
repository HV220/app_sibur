<?php

namespace common\models;

use Yii;
use yii\base\Model;
use common\models\User;

/**
 * LoginForm is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class LoginForm extends Model
{
    public $email;
    public $password;
    public $rememberMe = true;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['email','password'], 'required'],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            // password is validated by validatePassword()
            ['email', 'email'],
        ];
    }

    public function login()
    {
        if (!$this->validate()) {
            return false;
        }

        $user = User::findOne(['email' => $this->email]);

        if ($user && Yii::$app->getSecurity()->validatePassword($this->password, $user->password_hash)) {
            return Yii::$app->user->login($user, $this->rememberMe ? 3600 * 24 * 30 : 0);
        }

        $this->addError('password', 'Incorrect username or password.');

        return false;
    }
}
