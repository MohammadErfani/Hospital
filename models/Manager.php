<?php

namespace app\models;

use app\core\DbModel;

class Manager extends DbModel
{
    public int $id = 0;
    public bool $isRegister = true;         // default must be false but for now because manager panel not implement yet
                                             // we assume all doctors are registered
    public $createDepartment;
    public $register;
    public static function tableName(): string
    {
        return 'managers';
    }

    public function rules(): array
    {
        return [];
    }
    public function attributes():array{
        return ['id','isRegister'];
    }
}