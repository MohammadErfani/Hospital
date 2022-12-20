<?php

namespace app\models;

use app\core\DbModel;

class Patient extends DbModel
{
    public int $id = 0;
    public static function tableName(): string
    {
        return 'patients';
    }

    public function rules(): array
    {
        return [];
    }
    public function attributes(){
        return ['id'];
    }
}