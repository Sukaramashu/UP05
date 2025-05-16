<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Система учета оборудования</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown">
                        <i class="bi bi-person-fill"></i> Администратор
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="#"><i class="bi bi-person"></i> Профиль</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#"><i class="bi bi-box-arrow-right"></i> Выход</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-2 sidebar d-none d-md-block">
            <div class="logo-container">
                <img src="https://via.placeholder.com/150x50?text=Логотип" alt="Логотип" class="logo">
            </div>
            <nav class="nav flex-column">
                <a href="#" class="sidebar-link active"><i class="bi bi-house"></i> Главная</a>
                <a href="#" class="sidebar-link"><i class="bi bi-pc-display"></i> Оборудование</a>
                <a href="#" class="sidebar-link"><i class="bi bi-building"></i> Аудитории</a>
                <a href="#" class="sidebar-link"><i class="bi bi-tags"></i> Направления и статусы</a>
                <a href="#" class="sidebar-link"><i class="bi bi-hdd-stack"></i> Типы оборудования</a>
                <a href="#" class="sidebar-link"><i class="bi bi-device-hdd"></i> Виды моделей</a>
                <a href="#" class="sidebar-link"><i class="bi bi-file-earmark-code"></i> Программы</a>
                <a href="#" class="sidebar-link"><i class="bi bi-people"></i> Разработчики</a>
                <a href="#" class="sidebar-link"><i class="bi bi-clipboard-check"></i> Инвентаризация</a>
                <a href="#" class="sidebar-link"><i class="bi bi-person-vcard"></i> Пользователи</a>
                <a href="#" class="sidebar-link"><i class="bi bi-hdd-network"></i> Сетевые настройки</a>
                <a href="#" class="sidebar-link"><i class="bi bi-tools"></i> Расходные материалы</a>
                <a href="#" class="sidebar-link"><i class="bi bi-list-check"></i> Характеристики</a>
                <a href="#" class="sidebar-link"><i class="bi bi-file-earmark-text"></i> Документы</a>
            </nav>
        </div>

        <!-- Main Content -->
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
                                <tr>
                                    <td>Проектор Epson</td>
                                    <td>000012123126</td>
                                    <td>Аудитория 105</td>
                                    <td><span class="status-badge status-active">Используется</span></td>
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
    </div>
</div>