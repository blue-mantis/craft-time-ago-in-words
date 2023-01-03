<?php

namespace bluemantis\timeagoinwords\models;

use craft\base\Model;

class Settings extends Model
{
    public $timezone = 'Europe/London';

    public function rules(): array
    {
        return [
        ];
    }
}
