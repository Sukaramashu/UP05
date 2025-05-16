<?php 
$page_title = "Аудитории";
include 'header.php';
include 'sidebar.php';
?>

<div class="col-md-10 ms-sm-auto main-content">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2>Управление аудиториями</h2>
        <div class="btn-toolbar mb-2 mb-md-0">
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addClassroomModal">
                <i class="bi bi-plus-circle"></i> Добавить аудиторию
            </button>
        </div>
    </div>

    <!-- Фильтры -->
    <div class="card mb-4">
        <div class="card-body">
            <form class="row g-3">
                <div class="col-md-6">
                    <label for="search" class="form-label">Поиск по названию</label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="search" placeholder="Введите название аудитории">
                        <button class="btn btn-outline-secondary" type="button">
                            <i class="bi bi-search"></i>
                        </button>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="responsible" class="form-label">Ответственный</label>
                    <select class="form-select" id="responsible">
                        <option value="">Все</option>
                        <option>Иванов И.И.</option>
                        <option>Петров П.П.</option>
                    </select>
                </div>
                <div class="col-md-2 d-flex align-items-end">
                    <button type="submit" class="btn btn-primary w-100">Применить</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Таблица аудиторий -->
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead>
                        <tr>
                            <th>Название</th>
                            <th>Сокращение</th>
                            <th>Ответственный</th>
                            <th>Кол-во оборудования</th>
                            <th>Действия</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Аудитория 305</td>
                            <td>А-305</td>
                            <td>Иванов И.И.</td>
                            <td>15</td>
                            <td>
                                <div class="btn-group btn-group-sm">
                                    <button class="btn btn-outline-primary" title="Просмотр">
                                        <i class="bi bi-eye"></i>
                                    </button>
                                    <button class="btn btn-outline-warning" title="Редактировать">
                                        <i class="bi bi-pencil"></i>
                                    </button>
                                    <button class="btn btn-outline-danger" title="Удалить">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <!-- Другие строки -->
                    </tbody>
                </table>
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
    </div>
</div>

<!-- Модальное окно добавления аудитории -->
<div class="modal fade" id="addClassroomModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Добавить аудиторию</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="classroomName" class="form-label required-field">Название</label>
                        <input type="text" class="form-control" id="classroomName" required>
                    </div>
                    <div class="mb-3">
                        <label for="shortName" class="form-label">Сокращенное название</label>
                        <input type="text" class="form-control" id="shortName">
                    </div>
                    <div class="mb-3">
                        <label for="responsible" class="form-label">Ответственный</label>
                        <select class="form-select" id="responsible">
                            <option value="">Не назначен</option>
                            <option>Иванов И.И.</option>
                            <option>Петров П.П.</option>
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