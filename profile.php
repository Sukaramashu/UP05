<?php
//session_start();
//if (!isset($_SESSION['user_id'])) {
    //header('Location: login.php');
    //exit;
//}

$page_title = "Профиль пользователя";
include 'header.php';
include 'sidebar.php';

// Здесь должен быть код для получения данных пользователя из БД
?>

<div class="main-content">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Профиль пользователя</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#editProfileModal">
                <i class="bi bi-pencil"></i> Редактировать
            </button>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-body text-center">
                    <img src="assets/avatar.png" alt="Аватар" class="rounded-circle mb-3" width="150">
                    <!-- <h4><?=$_SESSION['full_name'] ?></h4>
                    <p class="text-muted mb-1">
                        <?= $_SESSION['user_role'] == 'admin' ? 'Администратор' : 'Пользователь' ?>
                    </p> -->
                </div>
            </div>
        </div>
        
        <div class="col-md-8">
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="mb-0">Основная информация</h5>
                </div>
                <div class="card-body">
                    <dl class="row">
                        <dt class="col-sm-4">ФИО:</dt>
                        <dd class="col-sm-8">Иванов Иван Иванович</dd>

                        <dt class="col-sm-4">Логин:</dt>
                        <dd class="col-sm-8">iivanov</dd>

                        <dt class="col-sm-4">Электронная почта:</dt>
                        <dd class="col-sm-8">i.ivanov@example.com</dd>

                        <dt class="col-sm-4">Телефон:</dt>
                        <dd class="col-sm-8">+7 (912) 345-67-89</dd>

                        <dt class="col-sm-4">Дата регистрации:</dt>
                        <dd class="col-sm-8">15.01.2022</dd>
                    </dl>
                </div>
            </div>
            
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Закрепленное оборудование</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th>Оборудование</th>
                                    <th>Инв. номер</th>
                                    <th>Аудитория</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Ноутбук Dell T200</td>
                                    <td>000012123124</td>
                                    <td>А-305</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Модальное окно редактирования профиля -->
<div class="modal fade" id="editProfileModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Редактирование профиля</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="profileForm">
                    <div class="mb-3">
                        <label for="lastName" class="form-label">Фамилия</label>
                        <input type="text" class="form-control" id="lastName" value="Иванов" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="firstName" class="form-label">Имя</label>
                        <input type="text" class="form-control" id="firstName" value="Иван" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="email" class="form-label">Электронная почта</label>
                        <input type="email" class="form-control" id="email" value="i.ivanov@example.com" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="phone" class="form-label">Телефон</label>
                        <input type="tel" class="form-control" id="phone" value="+79123456789">
                    </div>
                    
                    <div class="mb-3">
                        <label for="currentPassword" class="form-label">Текущий пароль</label>
                        <input type="password" class="form-control" id="currentPassword">
                    </div>
                    
                    <div class="mb-3">
                        <label for="newPassword" class="form-label">Новый пароль</label>
                        <input type="password" class="form-control" id="newPassword">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Отмена</button>
                <button type="button" class="btn btn-primary" id="saveProfile">Сохранить</button>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>