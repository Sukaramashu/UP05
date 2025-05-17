<?php
require_once 'BaseModel.php';

class Inventory extends BaseModel {
    protected static $tableName = 'inventory';

    // Получение активных инвентаризаций
    public static function getActive() {
        $pdo = Database::getInstance();
        $stmt = $pdo->query("SELECT * FROM inventory WHERE end_date IS NULL");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>