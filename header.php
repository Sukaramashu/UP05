<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page_title; ?> - Система учета оборудования</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link href="styles.css" rel="stylesheet">
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Функция для закрытия меню
            function closeSidebar() {
                document.querySelector('.sidebar').classList.remove('active');
                document.querySelector('.sidebar-backdrop').classList.remove('active');
                document.body.classList.remove('sidebar-open');
            }
            
            // Открытие/закрытие меню
            document.querySelector('.sidebar-toggle').addEventListener('click', function(e) {
                e.stopPropagation();
                document.querySelector('.sidebar').classList.toggle('active');
                document.querySelector('.sidebar-backdrop').classList.toggle('active');
                document.body.classList.toggle('sidebar-open');
            });
            
            // Закрытие при клике на подложку
            document.querySelector('.sidebar-backdrop').addEventListener('click', closeSidebar);
            
            // Закрытие при клике на пункт меню
            document.querySelectorAll('.sidebar-link').forEach(link => {
                link.addEventListener('click', closeSidebar);
            });
            
            // Закрытие при изменении размера окна
            window.addEventListener('resize', function() {
                if (window.innerWidth >= 992) {
                    closeSidebar();
                }
            });
        });
    </script>
</head>
<body>
<!-- Подложка для бокового меню -->
<div class="sidebar-backdrop"></div>

<!-- Навигационная панель -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
    <div class="container-fluid px-3">
        <button class="sidebar-toggle d-lg-none me-2 border-0 bg-transparent">
            <i class="bi bi-list text-white"></i>
        </button>
        <a class="navbar-brand text-truncate" href="index.php" style="max-width: 180px">Учет оборудования</a>
        <div class="d-flex align-items-center">
            <div class="dropdown">
                <a href="#" class="nav-link dropdown-toggle text-white" id="userDropdown" role="button" data-bs-toggle="dropdown">
                    <i class="bi bi-person-fill"></i>
                    <span class="d-none d-md-inline">Администратор</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="profile.php"><i class="bi bi-person"></i> Профиль</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="logout.php"><i class="bi bi-box-arrow-right"></i> Выход</a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>

<!-- Основной контейнер -->
<div class="container-fluid main-container">
    <div class="row">