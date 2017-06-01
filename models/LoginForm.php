<?php

namespace app\models;

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
    public $user;
    public $pass;
    public $rememberMe = true;

    private $_user = false;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // user and pass are both required
            [['user', 'pass'], 'required'],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            // pass is validated by validatepass()
            ['pass', 'validatepass'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'rememberMe' => 'Recordarme?',
            'user' => 'Usuario',
            'pass' => 'Contraseña',

        ];
    }

    /**
     * Validates the pass.
     * This method serves as the inline validation for pass.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatepass($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();

            if (!$user || !$user->validatepass($this->pass)) {
                $this->addError($attribute, 'Incorrect user or pass.');
            }
        }
    }

    /**
     * Logs in a user using the provided user and pass.
     * @return boolean whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate()) {
            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600*24*30 : 0);
        }
        else{
            return false;
        }
    }

    /**
     * Finds user by [[user]]
     *
     * @return User|null
     */
    public function getUser()
    {
        if ($this->_user === false) {
            $this->_user = Usuario::findByuser($this->user);
        }

        return $this->_user;
    }
}
