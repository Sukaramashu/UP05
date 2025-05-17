<?php
// Проверка авторизации
//session_start();
//if (!isset($_SESSION['user_id'])) {
    //header('Location: login.php');
    //exit;
//}
?>

<div class="sidebar">
    <div class="sidebar-header">
        <h5>Меню системы</h5>
    </div>
    
    <div class="sidebar-divider">Основные модули</div>
    <a href="index.php" class="sidebar-link <?= basename($_SERVER['PHP_SELF']) == 'index.php' ? 'active' : '' ?>">
        <i class="bi bi-house"></i>
        <span class="sidebar-text">Главная</span>
    </a>
    
    <a href="equipment.php" class="sidebar-link <?= basename($_SERVER['PHP_SELF']) == 'equipment.php' ? 'active' : '' ?>">
        <i class="bi bi-pc-display"></i>
        <span class="sidebar-text">Оборудование</span>
    </a>
    
    <a href="classrooms.php" class="sidebar-link <?= basename($_SERVER['PHP_SELF']) == 'classrooms.php' ? 'active' : '' ?>">
        <i class="bi bi-door-open"></i>
        <span class="sidebar-text">Аудитории</span>
    </a>
    
    <a href="inventory.php" class="sidebar-link <?= basename($_SERVER['PHP_SELF']) == 'inventory.php' ? 'active' : '' ?>">
        <i class="bi bi-clipboard-check"></i>
        <span class="sidebar-text">Инвентаризация</span>
    </a>
    
    <a href="documents.php" class="sidebar-link <?= basename($_SERVER['PHP_SELF']) == 'documents.php' ? 'active' : '' ?>">
        <i class="bi bi-file-earmark-text"></i>
        <span class="sidebar-text">Документы</span>
    </a>
    
    <div class="sidebar-divider">Справочники</div>
    <a href="equipment_types.php" class="sidebar-link <?= basename($_SERVER['PHP_SELF']) == 'equipment_types.php' ? 'active' : '' ?>">
        <i class="bi bi-tags"></i>
        <span class="sidebar-text">Типы оборудования</span>
    </a>
    
    <a href="models.php" class="sidebar-link <?= basename($_SERVER['PHP_SELF']) == 'models.php' ? 'active' : '' ?>">
        <i class="bi bi-diagram-3"></i>
        <span class="sidebar-text">Модели</span>
    </a>
    
    <a href="software.php" class="sidebar-link <?= basename($_SERVER['PHP_SELF']) == 'software.php' ? 'active' : '' ?>">
        <i class="bi bi-code-square"></i>
        <span class="sidebar-text">ПО</span>
    </a>
    
    <a href="consumables.php" class="sidebar-link <?= basename($_SERVER['PHP_SELF']) == 'consumables.php' ? 'active' : '' ?>">
        <i class="bi bi-printer"></i>
        <span class="sidebar-text">Расходники</span>
    </a>
    
    <?php //if ($_SESSION['user_role'] == 'admin'): ?>
    <div class="sidebar-divider">Администрирование</div>
    <a href="users.php" class="sidebar-link <?= basename($_SERVER['PHP_SELF']) == 'users.php' ? 'active' : '' ?>">
        <i class="bi bi-people"></i>
        <span class="sidebar-text">Пользователи</span>
    </a>
    
    <a href="error_log.php" class="sidebar-link <?= basename($_SERVER['PHP_SELF']) == 'error_log.php' ? 'active' : '' ?>">
        <i class="bi bi-bug"></i>
        <span class="sidebar-text">Журнал ошибок</span>
    </a>
    <?php //endif; ?>
    
    <div class="sidebar-divider">Аккаунт</div>
    <a href="profile.php" class="sidebar-link <?= basename($_SERVER['PHP_SELF']) == 'profile.php' ? 'active' : '' ?>">
        <i class="bi bi-person"></i>
        <span class="sidebar-text">Профиль</span>
    </a>
    
    <a href="logout.php" class="sidebar-link">
        <i class="bi bi-box-arrow-right"></i>
        <span class="sidebar-text">Выход</span>
    </a>
</div>

<div class="sidebar-backdrop"></div>