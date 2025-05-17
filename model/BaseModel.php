<?php
require_once '../config/db.php';

class BaseModel {
    protected static $tableName;
    
    protected static $validationRules = [];
    
    protected static function validateData($data, $isUpdate = false) {
        if (empty(static::$validationRules)) return true;

        $errors = [];
        
        foreach (static::$validationRules as $field => $rules) {
            if ($isUpdate && !array_key_exists($field, $data)) continue;
            
            $value = $data[$field] ?? null;
            $fieldErrors = [];

            foreach ($rules as $rule => $params) {
                if (!$this->checkRule($value, $rule, $params, $data, $isUpdate)) {
                    $fieldErrors[] = $this->getErrorMessage($rule, $params, $field);
                }
            }

            if (!empty($fieldErrors)) {
                $errors[$field] = $fieldErrors;
            }
        }

        if (!empty($errors)) {
            throw new ValidationException($errors);
        }

        return true;
    }

    protected function checkRule($value, $rule, $params, $data, $isUpdate) {
        switch ($rule) {
            case 'required': return !empty($value);
            case 'min': return strlen($value) >= $params;
            case 'max': return strlen($value) <= $params;
            case 'email': return filter_var($value, FILTER_VALIDATE_EMAIL);
            case 'regex': return preg_match($params, $value);
            case 'numeric': return is_numeric($value);
            case 'unique': 
                $pdo = Database::getInstance();
                $stmt = $pdo->prepare("
                    SELECT COUNT(*) FROM ".static::$tableName." 
                    WHERE {$field} = ? AND id != ?
                ");
                $stmt->execute([$value, $isUpdate ? ($data['id'] ?? 0) : 0]);
                return $stmt->fetchColumn() == 0;
            case 'in': return in_array($value, $params);
            default: return true;
        }
    }

    protected function getErrorMessage($rule, $params, $field) {
        $messages = [
            'required' => "Поле обязательно для заполнения",
            'min' => "Минимальная длина: {$params}",
            'max' => "Максимальная длина: {$params}",
            'email' => "Некорректный email",
            'regex' => "Неверный формат",
            'numeric' => "Должно быть числом",
            'unique' => "Значение должно быть уникальным",
            'in' => "Допустимые значения: ".implode(', ', $params)
        ];
        return $messages[$rule] ?? "Ошибка валидации";
    }

    public static function create($data) {
        static::validateData($data);
        
        $pdo = Database::getInstance();
        $columns = implode(', ', array_keys($data));
        $placeholders = implode(', ', array_fill(0, count($data), '?'));
        $stmt = $pdo->prepare("
            INSERT INTO " . static::$tableName . " ($columns)
            VALUES ($placeholders)
        ");
        $stmt->execute(array_values($data));
        return $pdo->lastInsertId();
    }

    public static function update($id, $data) {
        $data['id'] = $id; // Для unique-проверки
        static::validateData($data, true);
        
        $pdo = Database::getInstance();
        $setClause = implode(' = ?, ', array_keys($data)) . ' = ?';
        $stmt = $pdo->prepare("
            UPDATE " . static::$tableName . "
            SET $setClause
            WHERE id = ?
        ");
        $values = array_values($data);
        $values[] = $id;
        return $stmt->execute($values);
    }
}

// Кастомное исключение для валидации
class ValidationException extends Exception {
    public $errors;
    public function __construct($errors) {
        $this->errors = $errors;
        parent::__construct("Ошибка валидации данных");
    }
}
?>