<?php
require_once 'BaseModel.php';

class Documents extends BaseModel {
    protected static $tableName = 'documents';
       protected static $validationRules = [
        'type' => [
            'required' => true,
            'in' => ['transfer', 'consumable', 'equipment']
        ],
        'created_by' => ['required' => true]
    ];
}
?>