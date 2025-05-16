<?php 
$page_title = "Инвентаризация";
include 'header.php';
include 'sidebar.php';
?>

<div class="main-content">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Инвентаризация оборудования</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#startInventoryModal">
                <i class="bi bi-clipboard-plus"></i>
                <span class="d-none d-md-inline"> Начать инвентаризацию</span>
            </button>
        </div>
    </div>

    <!-- Фильтры -->
    <div class="card mb-4">
        <div class="card-body">
            <div class="form-check form-switch mb-3">
                <input class="form-check-input" type="checkbox" id="showCompleted">
                <label class="form-check-label" for="showCompleted">Показать завершенные</label>
            </div>
            <form class="row g-2">
                <div class="col-12 col-md-6">
                    <label for="search" class="form-label">Поиск</label>
                    <input type="text" class="form-control" id="search" placeholder="Название инвентаризации">
                </div>
                <div class="col-6 col-md-3">
                    <label for="status" class="form-label">Статус</label>
                    <select class="form-select" id="status">
                        <option value="">Все</option>
                        <option>Активные</option>
                        <option>Завершенные</option>
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

    <!-- Список инвентаризаций -->
    <div class="list-group">
        <a href="inventory_view.php?id=1" class="list-group-item list-group-item-action">
            <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1">Инвентаризация №15 (май 2023)</h5>
                <span class="badge bg-success">Активна</span>
            </div>
            <p class="mb-1">Оборудование кафедры информатики</p>
            <small class="text-muted">Начата: 15.05.2023 | Проверено: 42 из 56</small>
        </a>
        <a href="inventory_view.php?id=2" class="list-group-item list-group-item-action">
            <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1">Инвентаризация №14 (апрель 2023)</h5>
                <span class="badge bg-secondary">Завершена</span>
            </div>
            <p class="mb-1">Все аудитории корпуса Б</p>
            <small class="text-muted">Начата: 10.04.2023 | Завершена: 12.04.2023</small>
        </a>
    </div>
</div>

<!-- Модальное окно начала инвентаризации -->
<div class="modal fade" id="startInventoryModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Новая инвентаризация</h5>
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
                            <label for="startDate" class="form-label required-field">Дата начала</label>
                            <input type="date" class="form-control" id="startDate" required>
                        </div>
                        <div class="col-md-6">
                            <label for="endDate" class="form-label">Дата окончания</label>
                            <input type="date" class="form-control" id="endDate">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label required-field">Оборудование для проверки</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="scope" id="allEquipment" checked>
                            <label class="form-check-label" for="allEquipment">
                                Всё оборудование
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="scope" id="byClassroom">
                            <label class="form-check-label" for="byClassroom">
                                По аудиториям
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="scope" id="byType">
                            <label class="form-check-label" for="byType">
                                По типам оборудования
                            </label>
                        </div>
                    </div>
                    <div class="text-end">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Отмена</button>
                        <button type="submit" class="btn btn-primary">Начать</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>