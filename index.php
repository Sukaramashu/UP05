<?php 
$page_title = "Главная";
include 'header.php';
include 'sidebar.php';
?>

<div class="col-md-10 ms-sm-auto main-content">
    <h2 class="mb-4">Главная панель</h2>

    <!-- Статистика -->
    <div class="row mb-4">
        <div class="col-md-3">
            <div class="card text-white bg-primary">
                <div class="card-body">
                    <h5 class="card-title">Оборудование</h5>
                    <p class="card-text display-6">127</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-success">
                <div class="card-body">
                    <h5 class="card-title">Аудитории</h5>
                    <p class="card-text display-6">42</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-warning">
                <div class="card-body">
                    <h5 class="card-title">Пользователи</h5>
                    <p class="card-text display-6">56</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-danger">
                <div class="card-body">
                    <h5 class="card-title">На ремонте</h5>
                    <p class="card-text display-6">8</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Последние записи оборудования -->
    <div class="card">
        <div class="card-header">
            Последнее добавленное оборудование
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Название</th>
                            <th>Инвентарный номер</th>
                            <th>Аудитория</th>
                            <th>Статус</th>
                            <th>Действия</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Ноутбук Dell T200</td>
                            <td>000012123124</td>
                            <td>Аудитория 305</td>
                            <td><span class="status-badge status-active">Используется</span></td>
                            <td>
                                <button class="btn btn-sm btn-primary">Просмотр</button>
                                <button class="btn btn-sm btn-warning">Изменить</button>
                            </td>
                        </tr>
                        <tr>
                            <td>Принтер HP LaserJet</td>
                            <td>000012123125</td>
                            <td>Аудитория 201</td>
                            <td><span class="status-badge status-inactive">На ремонте</span></td>
                            <td>
                                <button class="btn btn-sm btn-primary">Просмотр</button>
                                <button class="btn btn-sm btn-warning">Изменить</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>