<!-- Боковое меню -->
<div class="sidebar">
    <div class="sidebar-header d-flex justify-content-between align-items-center p-3 d-lg-none">
        <h5 class="mb-0">Меню</h5>
        <button class="btn-close sidebar-close"></button>
    </div>
    
    <nav class="nav flex-column">
        <a href="index.php" class="sidebar-link <?php echo basename($_SERVER['PHP_SELF']) == 'index.php' ? 'active' : ''; ?>">
            <i class="bi bi-house"></i>
            <span class="sidebar-text">Главная</span>
            <span class="badge bg-primary float-end">3</span>
        </a>
        
        <div class="sidebar-divider">Учет</div>
        
        <a href="equipment.php" class="sidebar-link <?php echo basename($_SERVER['PHP_SELF']) == 'equipment.php' ? 'active' : ''; ?>">
            <i class="bi bi-pc-display"></i>
            <span class="sidebar-text">Оборудование</span>
        </a>
        
        <a href="classrooms.php" class="sidebar-link <?php echo basename($_SERVER['PHP_SELF']) == 'classrooms.php' ? 'active' : ''; ?>">
            <i class="bi bi-building"></i>
            <span class="sidebar-text">Аудитории</span>
        </a>
        
        <a href="consumables.php" class="sidebar-link <?php echo basename($_SERVER['PHP_SELF']) == 'consumables.php' ? 'active' : ''; ?>">
            <i class="bi bi-tools"></i>
            <span class="sidebar-text">Расходники</span>
        </a>
        
        <div class="sidebar-divider">Справочники</div>
        
        <a href="equipment_types.php" class="sidebar-link <?php echo basename($_SERVER['PHP_SELF']) == 'equipment_types.php' ? 'active' : ''; ?>">
            <i class="bi bi-hdd-stack"></i>
            <span class="sidebar-text">Типы оборудования</span>
        </a>
        
        <a href="models.php" class="sidebar-link <?php echo basename($_SERVER['PHP_SELF']) == 'models.php' ? 'active' : ''; ?>">
            <i class="bi bi-device-hdd"></i>
            <span class="sidebar-text">Модели</span>
        </a>
        
        <a href="software.php" class="sidebar-link <?php echo basename($_SERVER['PHP_SELF']) == 'software.php' ? 'active' : ''; ?>">
            <i class="bi bi-file-earmark-code"></i>
            <span class="sidebar-text">Программы</span>
        </a>
        
        <div class="sidebar-divider">Администрирование</div>
        
        <a href="users.php" class="sidebar-link <?php echo basename($_SERVER['PHP_SELF']) == 'users.php' ? 'active' : ''; ?>">
            <i class="bi bi-people"></i>
            <span class="sidebar-text">Пользователи</span>
        </a>
        
        <a href="inventory.php" class="sidebar-link <?php echo basename($_SERVER['PHP_SELF']) == 'inventory.php' ? 'active' : ''; ?>">
            <i class="bi bi-clipboard-check"></i>
            <span class="sidebar-text">Инвентаризация</span>
            <span class="badge bg-danger float-end">2</span>
        </a>
    </nav>
</div>