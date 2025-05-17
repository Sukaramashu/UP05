<?php
require_once 'BaseModel.php';

class Equipment extends BaseModel {
    protected static $tableName = 'equipment';

    public static function getByRoom($roomId) {
        $pdo = Database::getInstance();
        $stmt = $pdo->prepare("SELECT * FROM equipment WHERE room_id = ?");
        $stmt->execute([$roomId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
protected static $validationRules = [
        'name' => [
            'required' => true,
            'min' => 3,
            'max' => 100
        ],
        'inventory_number' => [
            'required' => true,
            'regex' => '/^[A-Z0-9-]{5,20}$/',
            'unique' => true
        ],
        'cost' => [
            'numeric' => true,
            'min' => 0
        ],
        'status_id' => ['required' => true],
        'type_id' => ['required' => true]
    ];
}
?>