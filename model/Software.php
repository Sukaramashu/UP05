<?php
require_once 'BaseModel.php';

class Software extends BaseModel {
    protected static $tableName = 'software';

        protected static $validationRules = [
        'name' => [
            'required' => true,
            'min' => 3,
            'max' => 100
        ],
        'version' => [
            'required' => true,
            'regex' => '/^[0-9.]+$/'
        ]
    ];
}

?>