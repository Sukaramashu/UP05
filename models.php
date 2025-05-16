<?php 
$page_title = "Модели оборудования";
include 'header.php';
include 'sidebar.php';
?>

<div class="main-content">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Модели оборудования</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#addModelModal">
                <i class="bi bi-plus-lg"></i>
                <span class="d-none d-md-inline"> Добавить модель</span>
            </button>
        </div>
    </div>

    <!-- Фильтры -->
    <div class="card mb-4">
        <div class="card-body">
            <form class="row g-2">
                <div class="col-12 col-md-6">
                    <label for="search" class="form-label">Поиск моделей</label>
                    <input type="text" class="form-control" id="search" placeholder="Название модели">
                </div>
                <div class="col-6 col-md-3">
                    <label for="type" class="form-label">Тип оборудования</label>
                    <select class="form-select" id="type">
                        <option value="">Все типы</option>
                        <option>Ноутбук</option>
                        <option>Принтер</option>
                    </select>
                </div>
                <div class="col-6 col-md-3 d-flex align-items-end">
                    <button type="submit" class="btn btn-primary w-100">
                        <i class="bi bi-funnel"></i> Применить
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Таблица моделей -->
    <div class="card">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover table-mobile mb-0">
                    <thead class="d-none d-md-table-header-group">
                        <tr>
                            <th>Название модели</th>
                            <th>Тип оборудования</th>
                            <th class="d-none d-lg-table-cell">Кол-во</th>
                            <th>Действия</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td data-label="Название модели">Dell T200</td>
                            <td data-label="Тип оборудования">Ноутбук</td>
                            <td class="d-none d-lg-table-cell" data-label="Кол-во">
                                <span class="badge bg-primary">12</span>
                            </td>
                            <td class="actions" data-label="Действия">
                                <div class="btn-group btn-group-sm">
                                    <a href="model_edit.php?id=1" class="btn btn-outline-warning" title="Редактировать">
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
</div>

<!-- Модальное окно добавления модели -->
<div class="modal fade" id="addModelModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Добавить модель</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="name" class="form-label required-field">Название модели</label>
                        <input type="text" class="form-control" id="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="type" class="form-label required-field">Тип оборудования</label>
                        <select class="form-select" id="type" required>
                            <option value="">Выберите тип</option>
                            <option>Ноутбук</option>
                            <option>Принтер</option>
                        </select>
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