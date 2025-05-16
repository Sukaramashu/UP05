<?php 
$page_title = "Расходные материалы";
include 'header.php';
include 'sidebar.php';
?>

<div class="main-content">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Расходные материалы</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#addConsumableModal">
                    <i class="bi bi-plus-lg"></i>
                    <span class="d-none d-md-inline"> Добавить</span>
                </button>
                <a href="import_consumables.php" class="btn btn-sm btn-success">
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
                <div class="col-12 col-md-6">
                    <label for="search" class="form-label">Поиск</label>
                    <input type="text" class="form-control" id="search" placeholder="Название или описание">
                </div>
                <div class="col-6 col-md-3">
                    <label for="type" class="form-label">Тип</label>
                    <select class="form-select" id="type">
                        <option value="">Все</option>
                        <option>Картриджи</option>
                        <option>Мыши</option>
                        <option>Клавиатуры</option>
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

    <!-- Таблица расходников -->
    <div class="card">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover table-mobile mb-0">
                    <thead class="d-none d-md-table-header-group">
                        <tr>
                            <th>Название</th>
                            <th class="d-none d-lg-table-cell">Тип</th>
                            <th>Количество</th>
                            <th class="d-none d-xl-table-cell">Ответственный</th>
                            <th>Действия</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td data-label="Название">
                                <div class="d-flex align-items-center">
                                    <img src="assets/consumables/cartridge.jpg" class="rounded me-2" width="40" height="40" alt="">
                                    <div>
                                        <div>Картридж HP 125A</div>
                                        <small class="text-muted">Черный</small>
                                    </div>
                                </div>
                            </td>
                            <td class="d-none d-lg-table-cell" data-label="Тип">Картридж</td>
                            <td data-label="Количество">
                                <span class="badge bg-primary">12 шт</span>
                            </td>
                            <td class="d-none d-xl-table-cell" data-label="Ответственный">Иванов И.И.</td>
                            <td class="actions" data-label="Действия">
                                <div class="btn-group btn-group-sm">
                                    <a href="consumable_view.php?id=1" class="btn btn-outline-primary" title="Просмотр">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    <a href="consumable_edit.php?id=1" class="btn btn-outline-warning" title="Редактировать">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Модальное окно добавления расходника -->
<div class="modal fade" id="addConsumableModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Добавить расходный материал</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="name" class="form-label required-field">Название</label>
                        <input type="text" class="form-control" id="name" required>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="type" class="form-label required-field">Тип</label>
                            <select class="form-select" id="type" required>
                                <option value="">Выберите тип</option>
                                <option>Картридж</option>
                                <option>Компьютерная мышь</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="quantity" class="form-label required-field">Количество</label>
                            <input type="number" class="form-control" id="quantity" min="1" required>
                        </div>
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