<?php 
$page_title = "Пользователи";
include 'header.php';
include 'sidebar.php';
?>

<div class="col-md-10 ms-sm-auto main-content">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2>Управление пользователями</h2>
        <div class="btn-toolbar mb-2 mb-md-0">
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addUserModal">
                <i class="bi bi-person-plus"></i> Добавить пользователя
            </button>
        </div>
    </div>

    <!-- Карточки статистики -->
    <div class="row mb-4">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body text-center">
                    <h5 class="card-title">Всего пользователей</h5>
                    <p class="card-text display-6">56</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body text-center">
                    <h5 class="card-title">Администраторы</h5>
                    <p class="card-text display-6">5</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body text-center">
                    <h5 class="card-title">Преподаватели</h5>
                    <p class="card-text display-6">35</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body text-center">
                    <h5 class="card-title">Сотрудники</h5>
                    <p class="card-text display-6">16</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Таблица пользователей -->
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ФИО</th>
                            <th>Логин</th>
                            <th>Роль</th>
                            <th>Email</th>
                            <th>Телефон</th>
                            <th>Статус</th>
                            <th>Действия</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <img src="assets/users/user1.jpg" class="rounded-circle me-3" width="40" height="40" alt="">
                                    <div>
                                        <h6 class="mb-0">Иванов Иван Иванович</h6>
                                        <small class="text-muted">Зав. кафедрой</small>
                                    </div>
                                </div>
                            </td>
                            <td>iivanov</td>
                            <td><span class="badge bg-primary">Администратор</span></td>
                            <td>iivanov@example.com</td>
                            <td>+7 (912) 345-67-89</td>
                            <td><span class="badge bg-success">Активен</span></td>
                            <td>
                                <div class="btn-group btn-group-sm">
                                    <button class="btn btn-outline-primary" title="Просмотр">
                                        <i class="bi bi-eye"></i>
                                    </button>
                                    <button class="btn btn-outline-warning" title="Редактировать">
                                        <i class="bi bi-pencil"></i>
                                    </button>
                                    <button class="btn btn-outline-danger" title="Деактивировать">
                                        <i class="bi bi-person-x"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <!-- Другие строки -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Модальное окно добавления пользователя -->
<div class="modal fade" id="addUserModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Добавить пользователя</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="lastName" class="form-label required-field">Фамилия</label>
                            <input type="text" class="form-control" id="lastName" required>
                        </div>
                        <div class="col-md-4">
                            <label for="firstName" class="form-label required-field">Имя</label>
                            <input type="text" class="form-control" id="firstName" required>
                        </div>
                        <div class="col-md-4">
                            <label for="middleName" class="form-label">Отчество</label>
                            <input type="text" class="form-control" id="middleName">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="login" class="form-label required-field">Логин</label>
                            <input type="text" class="form-control" id="login" required>
                        </div>
                        <div class="col-md-6">
                            <label for="email" class="form-label required-field">Email</label>
                            <input type="email" class="form-control" id="email" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="password" class="form-label required-field">Пароль</label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="password" required>
                                <button class="btn btn-outline-secondary toggle-password" type="button">
                                    <i class="bi bi-eye"></i>
                                </button>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="role" class="form-label required-field">Роль</label>
                            <select class="form-select" id="role" required>
                                <option value="">Выберите роль</option>
                                <option value="admin">Администратор</option>
                                <option value="teacher">Преподаватель</option>
                                <option value="employee">Сотрудник</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="phone" class="form-label">Телефон</label>
                            <input type="tel" class="form-control" id="phone">
                        </div>
                        <div class="col-md-6">
                            <label for="address" class="form-label">Адрес</label>
                            <input type="text" class="form-control" id="address">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="photo" class="form-label">Фотография</label>
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