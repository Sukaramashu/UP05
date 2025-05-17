<?php
$page_title = "Главная";
include 'header.php';
include 'sidebar.php';
?>

<div class="main-content">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Главная</h1>
    </div>

    <div class="row">
        <!-- Карточка оборудования -->
        <div class="col-md-6 col-lg-3 mb-4">
            <div class="card bg-primary text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h5 class="card-title">Оборудование</h5>
                            <h2 class="mb-0">1,254</h2>
                        </div>
                        <i class="bi bi-pc-display display-6 opacity-50"></i>
                    </div>
                    <a href="equipment.php" class="text-white stretched-link"></a>
                </div>
            </div>
        </div>

        <!-- Карточка аудиторий -->
        <div class="col-md-6 col-lg-3 mb-4">
            <div class="card bg-success text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h5 class="card-title">Аудитории</h5>
                            <h2 class="mb-0">78</h2>
                        </div>
                        <i class="bi bi-door-open display-6 opacity-50"></i>
                    </div>
                    <a href="classrooms.php" class="text-white stretched-link"></a>
                </div>
            </div>
        </div>

        <!-- Карточка активных инвентаризаций -->
        <div class="col-md-6 col-lg-3 mb-4">
            <div class="card bg-warning text-dark">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h5 class="card-title">Активные инвентаризации</h5>
                            <h2 class="mb-0">3</h2>
                        </div>
                        <i class="bi bi-clipboard-check display-6 opacity-50"></i>
                    </div>
                    <a href="inventory.php" class="text-dark stretched-link"></a>
                </div>
            </div>
        </div>

        <!-- Карточка расходных материалов -->
        <div class="col-md-6 col-lg-3 mb-4">
            <div class="card bg-info text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h5 class="card-title">Расходные материалы</h5>
                            <h2 class="mb-0">542</h2>
                        </div>
                        <i class="bi bi-printer display-6 opacity-50"></i>
                    </div>
                    <a href="consumables.php" class="text-white stretched-link"></a>
                </div>
            </div>
        </div>
    </div>

    <!-- Последние действия -->
    <div class="card mt-4">
        <div class="card-header">
            <h5 class="mb-0">Последние действия</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Дата</th>
                            <th>Действие</th>
                            <th>Пользователь</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>15.05.2023 14:30</td>
                            <td>Добавлено новое оборудование "Ноутбук Dell T200"</td>
                            <td>Иванов И.И.</td>
                        </tr>
                        <tr>
                            <td>15.05.2023 13:45</td>
                            <td>Проведена инвентаризация в аудитории А-305</td>
                            <td>Петров П.П.</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>