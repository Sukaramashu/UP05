<?php
require_once 'BaseModel.php';

class Classrooms extends BaseModel {
    protected static $tableName = 'classrooms';

    public static function getByResponsible($userId) {
        $pdo = Database::getInstance();
        $stmt = $pdo->prepare("SELECT * FROM classrooms WHERE responsible_id = ?");
        $stmt->execute([$userId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
        protected static $validationRules = [
        'name' => [
            'required' => true,
            'min' => 3,
            'max' => 50,
            'unique' => true
        ],
        'short_name' => [
            'required' => true,
            'min' => 2,
            'max' => 10
        ]
    ];
}

?>