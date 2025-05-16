<?php 
$page_title = "Авторизация";
include 'header_auth.php';
?>

<div class="auth-container">
    <div class="auth-card">
        <div class="auth-logo">
            <img src="assets/logo.png" alt="Логотип системы">
        </div>
        <h2 class="auth-title">Вход в систему</h2>
        
        <form class="auth-form">
            <div class="mb-3">
                <label for="login" class="form-label">Логин</label>
                <input type="text" class="form-control" id="login" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Пароль</label>
                <div class="input-group">
                    <input type="password" class="form-control" id="password" required>
                    <button class="btn btn-outline-secondary toggle-password" type="button">
                        <i class="bi bi-eye"></i>
                    </button>
                </div>
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="remember">
                <label class="form-check-label" for="remember">Запомнить меня</label>
            </div>
            <button type="submit" class="btn btn-primary w-100">Войти</button>
        </form>
        
        <div class="auth-links">
            <a href="reset_password.php">Забыли пароль?</a>
            <a href="register.php">Регистрация</a>
        </div>
    </div>
</div>

<?php include 'footer_auth.php'; ?>