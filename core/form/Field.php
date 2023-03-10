<?php

namespace app\core\form;

use app\core\Model;

class Field
{
    public const TYPE_TEXT = 'text';
    public const TYPE_PASSWORD = 'password';
    public const TYPE_NUMBER = 'number';
    public const TYPE_CHECK = 'checkbox';
    public Model $model;
    public string $attribute;
    public string $type;
    public string $placeHolder;
    /**
     * @param Model $model
     * @param string $attribute
     */
    public function __construct(Model $model, string $attribute)
    {
        $this->type = self::TYPE_TEXT;
        $this->placeHolder = '';
        $this->model = $model;
        $this->attribute = $attribute;
    }

    public function __toString()
    {
        return sprintf('
        <div class="form-group">
            <label>%s</label>
            <input type="%s" name="%s" value="%s" class="form-control%s" placeholder="%s">
            <div class="invalid-feedback">
                %s
            </div>
            </div>
        ', ucfirst($this->attribute),
        $this->type,
        $this->attribute,
        $this->model->{$this->attribute},
        $this->model->hasErrors($this->attribute) ? ' is-invalid' : '',
        $this->placeHolder,
        $this->model->getFirstError($this->attribute)

        );
    }

    public function passwordField():self
    {
        $this->type = self::TYPE_PASSWORD;
        return $this;
    }

    public function numberField():self
    {
        $this->type = self::TYPE_NUMBER;
        return $this;
    }
    public function checkbox():self{
        $this->type = self::TYPE_CHECK;
        return $this;
    }
    public function placeholder(string $holder){
        $this->placeHolder = $holder;
        return $this;
    }
}