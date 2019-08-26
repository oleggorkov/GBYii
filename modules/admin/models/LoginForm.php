<?php

namespace app\modules\admin\models;
use app\modules\admin\models\User;
use Yii;
use yii\base\Model;
/**
 * LoginForm is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class LoginForm extends Model {
    public $email;
    public $password;
    private $_user = false;
    public function rules() {
        return [
            // удалим случайные пробелы для двух полей
            [['email', 'password'], 'trim'],
            // email и пароль обязательны для заполнения
            [
                ['email', 'password'],
                'required',
                'message' => 'Это поле обязательно для заполнения'
            ],
            // поле email должно быть адресом почты
            ['email', 'email'],
            // пароль не может быть короче 12 символов
            [['password'], 'string', 'min' => 12],
            ['password', 'validatePassword'],
        ];
    }
    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, 'Incorrect username or password.');
            }
        }
    }
    public function attributeLabels() {
        return [
            'email' => 'E-mail',
            'password' => 'Пароль',
        ];
    }
    /**
     * Logs in a user using the provided email and password.
     * @return bool whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate()) {
            return Yii::$app->user->login($this->getUser());
        }
        return false;
    }
    /**
     * Finds user by [[email]]
     *
     * @return User|null
     */
    public function getUser()
    {
        if ($this->_user === false) {
            $this->_user = User::findByUsername($this->email);
        }
        return $this->_user;
    }