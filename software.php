<?php 
$page_title = "Программное обеспечение";
include 'header.php';
include 'sidebar.php';
?>

<div class="main-content">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Программное обеспечение</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group flex-nowrap">
                <button class="btn btn-sm btn-primary btn-sm-tablet" data-bs-toggle="modal" data-bs-target="#addSoftwareModal">
                    <i class="bi bi-plus-lg"></i>
                    <span class="d-none d-md-inline"> Добавить ПО</span>
                </button>
                <a href="software_import.php" class="btn btn-sm btn-success btn-sm-tablet">
                    <i class="bi bi-upload"></i>
                    <span class="d-none d-md-inline"> Импорт</span>
                </a>
            </div>
        </div>
    </div>

    <!-- Фильтры с исправленным layout -->
    <div class="card mb-4">
        <div class="card-body">
            <form class="row gx-2 gy-3">
                <div class="col-12 col-md-8 col-lg-6">
                    <label for="search" class="form-label">Поиск ПО</label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="search" placeholder="Название или разработчик">
                        <button class="btn btn-outline-secondary" type="button">
                            <i class="bi bi-search"></i>
                        </button>
                    </div>
                </div>
                <div class="col-8 col-md-4 col-lg-3">
                    <label for="developer" class="form-label">Разработчик</label>
                    <select class="form-select" id="developer">
                        <option value="">Все</option>
                        <option>Microsoft</option>
                        <option>Adobe</option>
                    </select>
                </div>
                <div class="col-4 col-lg-3 d-flex align-items-end">
                    <button type="submit" class="btn btn-primary w-100">
                        <i class="bi bi-funnel d-lg-none"></i>
                        <span class="d-none d-lg-inline">Применить</span>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Таблица с исправленными отступами -->
    <div class="card">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover table-mobile mb-0">
                    <!-- Содержимое таблицы без изменений -->
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Модальное окно без изменений -->
<?php include 'footer.php'; ?>