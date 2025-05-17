<?php
require_once 'BaseModel.php';

class Users extends BaseModel {
    protected static $tableName = 'users';

    public static function getByRole($role) {
        $pdo = Database::getInstance();
        $stmt = $pdo->prepare("SELECT * FROM users WHERE role = ?");
        $stmt->execute([$role]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

     protected static $validationRules = [
        'username' => [
            'required' => true,
            'min' => 4,
            'max' => 30,
            'regex' => '/^[a-zA-Z0-9_]+$/',
            'unique' => true
        ],
        'password' => [
            'required' => true,
            'min' => 6
        ],
        'email' => [
            'required' => true,
            'email' => true
        ],
        'role' => [
            'required' => true,
            'in' => ['admin', 'teacher', 'employee']
        ],
        'last_name' => [
            'required' => true,
            'min' => 2
        ]
    ];
}

?>