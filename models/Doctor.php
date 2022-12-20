<?php

namespace app\models;

use app\core\DbModel;

class Doctor extends DbModel
{
    public int $id = 0;
    public bool $isRegister = true;         // default must be false but for now because manager panel not implement yet
                                                // we assume all doctors are registered
    public  $specialty = '';
    public string $doctorCode = '';   //these are not implement yet
    public string $education = '';
    public $picture;
    public $resume;
    public $workHour;
    public $workDays;
    public static function tableName(): string
    {
        return 'doctors';
    }

    public function rules(): array
    {
        return [];
    }
    public function attributes():array{
        return ['id','isRegister'];
    }
}