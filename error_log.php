<?php
// require_once 'includes/auth_check.php'; // Проверка авторизации и прав
// require_once 'includes/db.php';
// require_once 'includes/error_logger.php';

$page_title = "Журнал ошибок";
include 'header.php';
include 'sidebar.php';

// Получение ошибок из БД
// try {
//     $stmt = $pdo->prepare("
//         SELECT e.*, u.username 
//         FROM error_log e
//         LEFT JOIN users u ON e.user_id = u.id
//         ORDER BY e.occurred_at DESC
//         LIMIT 100
//     ");
//     $stmt->execute();
//     $errors = $stmt->fetchAll();
// } catch (PDOException $e) {
//     logError($e, "Ошибка при загрузке журнала ошибок");
//     $errors = [];
// }
?>

<div class="main-content">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Журнал системных ошибок</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <button class="btn btn-sm btn-outline-danger" id="clearResolvedErrors">
                    <i class="bi bi-trash"></i> Очистить решенные
                </button>
                <button class="btn btn-sm btn-outline-secondary" id="exportErrors">
                    <i class="bi bi-download"></i> Экспорт
                </button>
            </div>
        </div>
    </div>

    <!-- Фильтры ошибок -->
    <div class="card mb-4">
        <div class="card-body">
            <form id="errorFilterForm" class="row g-2">
                <div class="col-md-3">
                    <label for="errorStatus" class="form-label">Статус</label>
                    <select class="form-select" id="errorStatus" name="status">
                        <option value="">Все</option>
                        <option value="unresolved">Нерешенные</option>
                        <option value="resolved">Решенные</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="errorSeverity" class="form-label">Важность</label>
                    <select class="form-select" id="errorSeverity" name="severity">
                        <option value="">Все</option>
                        <option value="critical">Критическая</option>
                        <option value="high">Высокая</option>
                        <option value="medium">Средняя</option>
                        <option value="low">Низкая</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="errorDateRange" class="form-label">Период</label>
                    <input type="text" class="form-control" id="errorDateRange" name="date_range" placeholder="Выберите период">
                </div>
                <div class="col-md-2 d-flex align-items-end">
                    <button type="submit" class="btn btn-primary w-100">
                        <i class="bi bi-funnel"></i> Фильтровать
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Таблица ошибок -->
    <div class="card">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover table-mobile mb-0" id="errorsTable">
                    <thead>
                        <tr>
                            <th>Дата</th>
                            <th>Код</th>
                            <th>Сообщение</th>
                            <th>Пользователь</th>
                            <th>Страница</th>
                            <th>Статус</th>
                            <th>Действия</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- <?php foreach ($errors as $error): ?> -->
                        <tr>
                            <td data-label="Дата"><?= date('d.m.Y H:i', strtotime($error['occurred_at'])) ?></td>
                            <td data-label="Код"><?= htmlspecialchars($error['error_code']) ?></td>
                            <td data-label="Сообщение" class="text-truncate" style="max-width: 200px;" title="<?= htmlspecialchars($error['error_message']) ?>">
                                <?= htmlspecialchars($error['error_message']) ?>
                            </td>
                            <td data-label="Пользователь"><?= $error['username'] ?? 'Система' ?></td>
                            <td data-label="Страница"><?= htmlspecialchars($error['endpoint']) ?></td>
                            <td data-label="Статус">
                                <span class="badge bg-<?= $error['resolved'] ? 'success' : 'danger' ?>">
                                    <?= $error['resolved'] ? 'Решена' : 'Нерешена' ?>
                                </span>
                            </td>
                            <td class="actions" data-label="Действия">
                                <div class="btn-group btn-group-sm">
                                    <button class="btn btn-outline-primary view-error" data-id="<?= $error['id'] ?>" title="Подробности">
                                        <i class="bi bi-info-circle"></i>
                                    </button>
                                    <?php if (!$error['resolved']): ?>
                                    <button class="btn btn-outline-success resolve-error" data-id="<?= $error['id'] ?>" title="Пометить как решенную">
                                        <i class="bi bi-check-circle"></i>
                                    </button>
                                    <?php endif; ?>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Модальное окно просмотра деталей ошибки -->
<div class="modal fade" id="errorDetailsModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Детали ошибки</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <h6>Основная информация</h6>
                        <dl class="row">
                            <dt class="col-sm-4">Код ошибки:</dt>
                            <dd class="col-sm-8" id="errorCode"></dd>

                            <dt class="col-sm-4">Дата и время:</dt>
                            <dd class="col-sm-8" id="errorDateTime"></dd>

                            <dt class="col-sm-4">Страница:</dt>
                            <dd class="col-sm-8" id="errorPage"></dd>
                        </dl>
                    </div>
                    <div class="col-md-6">
                        <h6>Контекст</h6>
                        <dl class="row">
                            <dt class="col-sm-4">Пользователь:</dt>
                            <dd class="col-sm-8" id="errorUser"></dd>

                            <dt class="col-sm-4">Метод:</dt>
                            <dd class="col-sm-8" id="errorMethod"></dd>

                            <dt class="col-sm-4">Статус:</dt>
                            <dd class="col-sm-8"><span class="badge" id="errorStatusBadge"></span></dd>
                        </dl>
                    </div>
                </div>

                <div class="mb-3">
                    <h6>Сообщение об ошибке</h6>
                    <div class="alert alert-danger" id="errorMessage"></div>
                </div>

                <div class="mb-3">
                    <h6>Стек вызовов</h6>
                    <pre class="bg-light p-3" id="errorStackTrace"><code></code></pre>
                </div>

                <div class="mb-3">
                    <h6>Данные запроса</h6>
                    <pre class="bg-light p-3" id="errorRequestData"><code></code></pre>
                </div>

                <div id="errorResolutionSection">
                    <h6>Решение</h6>
                    <textarea class="form-control" id="errorResolutionNotes" rows="3" placeholder="Опишите решение проблемы..."></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                <button type="button" class="btn btn-success" id="markAsResolved">Пометить как решенную</button>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    // Инициализация DataTable с фильтрацией
    const table = $('#errorsTable').DataTable({
        language: {
            url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/ru.json'
        },
        dom: '<"top"f>rt<"bottom"lip><"clear">',
        pageLength: 25,
        order: [[0, 'desc']]
    });

    // Применение фильтров
    $('#errorFilterForm').on('submit', function(e) {
        e.preventDefault();
        
        const status = $('#errorStatus').val();
        const severity = $('#errorSeverity').val();
        const dateRange = $('#errorDateRange').val();
        
        table.column(5).search(status).draw();
        // Дополнительная фильтрация по другим полям
    });

    // Просмотр деталей ошибки
    $('.view-error').on('click', function() {
        const errorId = $(this).data('id');
        
        $.get(`api/get_error_details.php?id=${errorId}`, function(data) {
            if (data.success) {
                $('#errorCode').text(data.error.error_code);
                $('#errorDateTime').text(data.error.datetime);
                $('#errorPage').text(data.error.endpoint);
                $('#errorUser').text(data.error.user || 'Неизвестно');
                $('#errorMethod').text(data.error.http_method || 'N/A');
                $('#errorMessage').text(data.error.error_message);
                $('#errorStackTrace code').text(data.error.stack_trace || 'Не доступен');
                $('#errorRequestData code').text(data.error.request_data ? JSON.stringify(data.error.request_data, null, 2) : 'Нет данных');
                
                const statusBadge = $('#errorStatusBadge');
                statusBadge.text(data.error.resolved ? 'Решена' : 'Нерешена');
                statusBadge.removeClass('bg-danger bg-success').addClass(`bg-${data.error.resolved ? 'success' : 'danger'}`);
                
                $('#errorResolutionSection').toggle(!data.error.resolved);
                $('#markAsResolved').toggle(!data.error.resolved);
                $('#markAsResolved').data('id', errorId);
                $('#errorResolutionNotes').val(data.error.resolution_notes || '');
                
                new bootstrap.Modal('#errorDetailsModal').show();
            } else {
                alert('Не удалось загрузить детали ошибки');
            }
        }).fail(function() {
            alert('Ошибка при загрузке данных');
        });
    });

    // Пометить ошибку как решенную
    $('#markAsResolved').on('click', function() {
        const errorId = $(this).data('id');
        const notes = $('#errorResolutionNotes').val();
        
        $.post('api/resolve_error.php', {
            error_id: errorId,
            resolution_notes: notes
        }, function(data) {
            if (data.success) {
                location.reload();
            } else {
                alert('Ошибка: ' + data.message);
            }
        }).fail(function() {
            alert('Ошибка соединения');
        });
    });

    // Очистка решенных ошибок
    $('#clearResolvedErrors').on('click', function() {
        if (confirm('Вы уверены, что хотите удалить все решенные ошибки? Это действие нельзя отменить.')) {
            $.post('api/clear_resolved_errors.php', function(data) {
                if (data.success) {
                    location.reload();
                } else {
                    alert('Ошибка: ' + data.message);
                }
            }).fail(function() {
                alert('Ошибка соединения');
            });
        }
    });

    // Экспорт ошибок
    $('#exportErrors').on('click', function() {
        const params = $('#errorFilterForm').serialize();
        window.open(`api/export_errors.php?${params}`, '_blank');
    });
});
</script>

<?php include 'footer.php'; ?>