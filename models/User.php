<?php

namespace app\models;

use app\core\DbModel;
use app\core\UserModel;


class User extends DbModel implements UserModel
{
    public int $id =0;
    public string $firstname = '';
    public string $lastname = '';
    public string $email = '';
    public string $password = '';
    public string $confirmPassword = '';
    public string $role = 'patient';

    public function save()
    {
        $this->id = rand(1,9999999);
        $this->password = password_hash($this->password, PASSWORD_DEFAULT);
        return parent::save();
    }

    public function rules(): array
    {
        return [
            'firstname' => [self::RULE_REQUIRED],
            'lastname' => [self::RULE_REQUIRED],
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL, [
                self::RULE_UNIQUE, 'class' => self::class
            ]],
            'password' => [self::RULE_REQUIRED, [self::RULE_MIN, 'min' => 8], [self::RULE_MAX, 'max' => 24]],
            'confirmPassword' => [self::RULE_REQUIRED, [self::RULE_MATCH, 'match' => 'password']],

        ];
    }

    public static function tableName(): string
    {
        return 'users';
    }
    public function attributes(): array
    {
        return ['id','firstname', 'lastname', 'email', 'password','role'];
    }

    public function getDisplayName(): string
    {
        return $this->firstname.' '.$this->lastname;
    }
}