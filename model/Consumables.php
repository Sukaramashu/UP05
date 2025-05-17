<?php
require_once 'BaseModel.php';

class Consumables extends BaseModel {
    protected static $tableName = 'consumables';

    // Получение расходников по оборудованию
    public static function getByEquipment($equipmentId) {
        $pdo = Database::getInstance();
        $stmt = $pdo->prepare("SELECT * FROM consumables WHERE equipment_id = ?");
        $stmt->execute([$equipmentId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>