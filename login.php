<?php
session_start();
if (isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit;
}

$page_title = "Вход в систему";
include 'header.php';
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-4">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0 text-center">Вход в систему</h4>
                </div>
                <div class="card-body">
                    <form id="loginForm" action="auth.php" method="POST">
                        <div class="mb-3">
                            <label for="username" class="form-label">Логин</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Пароль</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Войти</button>
                        </div>
                    </form>
                    <?php if (isset($_GET['error'])): ?>
                    <div class="alert alert-danger mt-3">
                        Неверный логин или пароль
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>