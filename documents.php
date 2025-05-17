<?php
$page_title = "Документооборот";
include 'header.php';
include 'sidebar.php';
?>

<div class="main-content">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Управление документами</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group">
                <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#newDocumentModal">
                    <i class="bi bi-file-earmark-plus"></i> Создать документ
                </button>
            </div>
        </div>
    </div>

    <!-- Фильтры документов -->
    <div class="card mb-4">
        <div class="card-body">
            <form class="row g-2">
                <div class="col-md-4">
                    <label for="docType" class="form-label">Тип документа</label>
                    <select class="form-select" id="docType">
                        <option value="">Все типы</option>
                        <option value="equipment_transfer">Прием-передача оборудования</option>
                        <option value="consumables_transfer">Прием-передача расходных материалов</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="docStatus" class="form-label">Статус</label>
                    <select class="form-select" id="docStatus">
                        <option value="">Все статусы</option>
                        <option value="draft">Черновик</option>
                        <option value="approved">Утвержден</option>
                    </select>
                </div>
                <div class="col-md-4 d-flex align-items-end">
                    <button type="submit" class="btn btn-primary w-100">
                        <i class="bi bi-funnel"></i> Фильтровать
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Список документов -->
    <div class="card">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover table-mobile mb-0">
                    <thead>
                        <tr>
                            <th>№ документа</th>
                            <th>Тип</th>
                            <th>Дата создания</th>
                            <th>Статус</th>
                            <th>Автор</th>
                            <th>Действия</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td data-label="№ документа">ПП-2023-001</td>
                            <td data-label="Тип">Прием-передача оборудования</td>
                            <td data-label="Дата создания">15.05.2023</td>
                            <td data-label="Статус"><span class="badge bg-success">Утвержден</span></td>
                            <td data-label="Автор">Иванов И.И.</td>
                            <td class="actions" data-label="Действия">
                                <div class="btn-group btn-group-sm">
                                    <a href="document_view.php?id=1" class="btn btn-outline-primary" title="Просмотр">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    <a href="document_edit.php?id=1" class="btn btn-outline-warning" title="Редактировать">
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

<!-- Модальное окно создания документа -->
<div class="modal fade" id="newDocumentModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Создать новый документ</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="documentForm">
                    <div class="mb-3">
                        <label for="documentType" class="form-label required-field">Тип документа</label>
                        <select class="form-select" id="documentType" required>
                            <option value="">Выберите тип документа</option>
                            <option value="equipment_transfer">Прием-передача оборудования</option>
                            <option value="consumables_transfer">Прием-передача расходных материалов</option>
                        </select>
                    </div>
                    <div id="documentFormFields">
                        <!-- Динамически загружаемые поля формы -->
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Отмена</button>
                <button type="button" class="btn btn-primary" id="saveDocument">Сохранить</button>
            </div>
        </div>
    </div>
</div>

<script>
// Загрузка полей формы при выборе типа документа
document.getElementById('documentType').addEventListener('change', function() {
    const type = this.value;
    if (!type) return;
    
    fetch(`get_document_fields.php?type=${type}`)
        .then(response => response.text())
        .then(html => {
            document.getElementById('documentFormFields').innerHTML = html;
        })
        .catch(error => {
            console.error('Error loading form fields:', error);
            logErrorToSystem(error, {page: 'documents.php', action: 'load_document_fields'});
        });
});

// Обработка ошибок и логирование
function logErrorToSystem(error, context = {}) {
    fetch('log_error.php', {
        method: 'POST',
        headers: {'Content-Type': 'application/json'},
        body: JSON.stringify({
            error: error.message,
            stack: error.stack,
            context: context
        })
    }).catch(e => console.error('Failed to log error:', e));
}
</script>

<?php include 'footer.php'; ?>