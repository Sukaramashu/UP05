<?php 
$page_title = "Типы оборудования";
include 'header.php';
include 'sidebar.php';
?>

<div class="main-content">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Типы оборудования</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#addTypeModal">
                <i class="bi bi-plus-lg"></i>
                <span class="d-none d-md-inline"> Добавить тип</span>
            </button>
        </div>
    </div>

    <!-- Таблица типов -->
    <div class="card">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover table-mobile mb-0">
                    <thead class="d-none d-md-table-header-group">
                        <tr>
                            <th>Название</th>
                            <th>Кол-во оборудования</th>
                            <th>Действия</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td data-label="Название">Ноутбук</td>
                            <td data-label="Кол-во оборудования">
                                <span class="badge bg-primary">24</span>
                            </td>
                            <td class="actions" data-label="Действия">
                                <div class="btn-group btn-group-sm">
                                    <a href="equipment_type_edit.php?id=1" class="btn btn-outline-warning" title="Редактировать">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <button class="btn btn-outline-danger" title="Удалить">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td data-label="Название">Принтер</td>
                            <td data-label="Кол-во оборудования">
                                <span class="badge bg-primary">15</span>
                            </td>
                            <td class="actions" data-label="Действия">
                                <div class="btn-group btn-group-sm">
                                    <a href="equipment_type_edit.php?id=2" class="btn btn-outline-warning" title="Редактировать">
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

<!-- Модальное окно добавления типа -->
<div class="modal fade" id="addTypeModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Добавить тип оборудования</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="name" class="form-label required-field">Название типа</label>
                        <input type="text" class="form-control" id="name" required>
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