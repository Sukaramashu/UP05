<?php 
$page_title = "Оборудование";
include 'header.php';
include 'sidebar.php';
?>

<div class="main-content">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Оборудование</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#addEquipmentModal">
                    <i class="bi bi-plus-lg"></i>
                    <span class="d-none d-md-inline"> Добавить</span>
                </button>
                <a href="import.php" class="btn btn-sm btn-success">
                    <i class="bi bi-upload"></i>
                    <span class="d-none d-md-inline"> Импорт</span>
                </a>
            </div>
        </div>
    </div>

    <!-- Фильтры -->
    <div class="card mb-4">
        <div class="card-body">
            <form class="row g-2">
                <div class="col-12 col-md-6 col-lg-4">
                    <label for="search" class="form-label">Поиск</label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="search" placeholder="Название или инв. номер">
                        <button class="btn btn-outline-secondary" type="button">
                            <i class="bi bi-search"></i>
                        </button>
                    </div>
                </div>
                <div class="col-6 col-md-3 col-lg-2">
                    <label for="type" class="form-label">Тип</label>
                    <select class="form-select" id="type">
                        <option value="">Все</option>
                        <option>Ноутбук</option>
                        <option>Принтер</option>
                        <option>Монитор</option>
                    </select>
                </div>
                <div class="col-6 col-md-3 col-lg-2">
                    <label for="status" class="form-label">Статус</label>
                    <select class="form-select" id="status">
                        <option value="">Все</option>
                        <option>Используется</option>
                        <option>На ремонте</option>
                        <option>Списано</option>
                    </select>
                </div>
                <div class="col-12 col-md-12 col-lg-4 d-flex align-items-end">
                    <button type="submit" class="btn btn-primary w-100 me-2">
                        <i class="bi bi-funnel"></i> Применить
                    </button>
                    <button type="reset" class="btn btn-outline-secondary d-none d-lg-block">
                        <i class="bi bi-arrow-counterclockwise"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Таблица оборудования -->
    <div class="card">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover table-mobile mb-0">
                    <thead class="d-none d-md-table-header-group">
                        <tr>
                            <th>Название</th>
                            <th>Инв. номер</th>
                            <th class="d-none d-lg-table-cell">Тип</th>
                            <th>Аудитория</th>
                            <th class="d-none d-xl-table-cell">Статус</th>
                            <th>Действия</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td data-label="Название">Ноутбук Dell T200</td>
                            <td data-label="Инв. номер">000012123124</td>
                            <td class="d-none d-lg-table-cell" data-label="Тип">Ноутбук</td>
                            <td data-label="Аудитория">А-305</td>
                            <td class="d-none d-xl-table-cell" data-label="Статус">
                                <span class="badge bg-success">Используется</span>
                            </td>
                            <td class="actions" data-label="Действия">
                                <div class="btn-group btn-group-sm">
                                    <a href="equipment_view.php?id=1" class="btn btn-outline-primary" title="Просмотр">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    <a href="equipment_edit.php?id=1" class="btn btn-outline-warning" title="Редактировать">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <button class="btn btn-outline-danger" title="Удалить">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td data-label="Название">Принтер HP LaserJet</td>
                            <td data-label="Инв. номер">000012123125</td>
                            <td class="d-none d-lg-table-cell" data-label="Тип">Принтер</td>
                            <td data-label="Аудитория">А-201</td>
                            <td class="d-none d-xl-table-cell" data-label="Статус">
                                <span class="badge bg-warning">На ремонте</span>
                            </td>
                            <td class="actions" data-label="Действия">
                                <div class="btn-group btn-group-sm">
                                    <a href="equipment_view.php?id=2" class="btn btn-outline-primary" title="Просмотр">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    <a href="equipment_edit.php?id=2" class="btn btn-outline-warning" title="Редактировать">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <button class="btn btn-outline-danger" title="Удалить">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Пагинация -->
    <nav class="mt-4">
        <ul class="pagination justify-content-center">
            <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1">Назад</a>
            </li>
            <li class="page-item active"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
                <a class="page-link" href="#">Вперед</a>
            </li>
        </ul>
    </nav>
</div>

<!-- Модальное окно добавления оборудования -->
<div class="modal fade" id="addEquipmentModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Добавить оборудование</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="name" class="form-label required-field">Название</label>
                            <input type="text" class="form-control" id="name" required>
                        </div>
                        <div class="col-md-6">
                            <label for="inventoryNumber" class="form-label required-field">Инвентарный номер</label>
                            <input type="text" class="form-control" id="inventoryNumber" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="type" class="form-label required-field">Тип оборудования</label>
                            <select class="form-select" id="type" required>
                                <option value="">Выберите тип</option>
                                <option>Ноутбук</option>
                                <option>Принтер</option>
                                <option>Монитор</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="model" class="form-label">Модель</label>
                            <select class="form-select" id="model">
                                <option value="">Выберите модель</option>
                                <option>Dell T200</option>
                                <option>HP LaserJet</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="classroom" class="form-label">Аудитория</label>
                            <select class="form-select" id="classroom">
                                <option value="">Не назначена</option>
                                <option>А-305</option>
                                <option>А-201</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="status" class="form-label">Статус</label>
                            <select class="form-select" id="status">
                                <option>Используется</option>
                                <option>На ремонте</option>
                                <option>Списано</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="photo" class="form-label">Фотография оборудования</label>
                        <input class="form-control" type="file" id="photo" accept="image/*">
                    </div>
                    <div class="text-end">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Отмена</button>
                        <button type="submit" class="btn btn-primary">Сохранить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>