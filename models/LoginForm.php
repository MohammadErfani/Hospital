<?php
/**
 * User: TheCodeholic
 * Date: 7/25/2020
 * Time: 9:36 AM
 */

namespace app\models;




use app\core\Application;
use app\core\Model;

/**
 * Class LoginForm
 *
 * @author  Zura Sekhniashvili <zurasekhniashvili@gmail.com>
 * @package app\models
 */
class LoginForm extends Model
{
    public string $email = '';
    public string $password = '';
    public string $role = 'patient';

    public function rules():array
    {
        return [
            'email' => [self::RULE_REQUIRED],
            'password' => [self::RULE_REQUIRED],
        ];
    }

    public function login()
    {
        $user = User::findOne(['email' => $this->email,'role'=>$this->role]);
        if (!$user) {
            $this->addError('email', 'User does not exist with this email address or check you select correct Role');
            return false;
        }
        if (!password_verify($this->password, $user->password)) {
            $this->addError('password', 'Password is incorrect');
            return false;
        }
        return Application::$app->login($user);
    }
}