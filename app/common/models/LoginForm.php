<?php
declare(strict_types=1);

namespace common\models;

use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class LoginForm extends Model
{
    public string $email;
    public string $password;
    public bool $rememberMe = true;


    /**
     * @return array the validation rules.
     */
    public function rules(): array
    {
        return [
            // username and password are both required
            [['email', 'password'], 'required'],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            // password is validated by validatePassword()
            ['email', 'email'],
        ];
    }

    public function login(): bool
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
