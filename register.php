<?php 
$page_title = "Регистрация";
include 'header_auth.php';
?>

<div class="auth-container">
    <div class="auth-card">
        <div class="auth-logo">
            <img src="assets/logo.png" alt="Логотип системы">
        </div>
        <h2 class="auth-title">Регистрация</h2>
        
        <form class="auth-form">
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="lastName" class="form-label required-field">Фамилия</label>
                    <input type="text" class="form-control" id="lastName" required>
                </div>
                <div class="col-md-6">
                    <label for="firstName" class="form-label required-field">Имя</label>
                    <input type="text" class="form-control" id="firstName" required>
                </div>
            </div>
            
            <div class="mb-3">
                <label for="email" class="form-label required-field">Email</label>
                <input type="email" class="form-control" id="email" required>
            </div>
            
            <div class="mb-3">
                <label for="phone" class="form-label">Телефон</label>
                <input type="tel" class="form-control" id="phone">
            </div>
            
            <div class="mb-3">
                <label for="password" class="form-label required-field">Пароль</label>
                <div class="input-group">
                    <input type="password" class="form-control" id="password" required>
                    <button class="btn btn-outline-secondary toggle-password" type="button">
                        <i class="bi bi-eye"></i>
                    </button>
                </div>
                <div class="form-text">Минимум 8 символов</div>
            </div>
            
            <div class="mb-3">
                <label for="confirmPassword" class="form-label required-field">Подтверждение пароля</label>
                <input type="password" class="form-control" id="confirmPassword" required>
            </div>
            
            <button type="submit" class="btn btn-primary w-100">Зарегистрироваться</button>
        </form>
        
        <div class="auth-links">
            <a href="auth.php">Уже есть аккаунт? Войти</a>
        </div>
    </div>
</div>

<?php include 'footer_auth.php'; ?>