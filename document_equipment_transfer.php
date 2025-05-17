<?php
$page_title = "Прием-передача оборудования";
include 'header.php';
include 'sidebar.php';

// Получаем ID оборудования из параметра URL
$equipment_id = isset($_GET['equipment_id']) ? intval($_GET['equipment_id']) : null;
?>

<div class="main-content">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Акт приема-передачи оборудования</h1>
    </div>

    <div class="card">
        <div class="card-body">
            <form id="equipmentTransferForm">
                <input type="hidden" name="document_type" value="equipment_transfer">
                
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="equipment" class="form-label required-field">Оборудование</label>
                        <select class="form-select" id="equipment" name="equipment_id" required>
                            <option value="">Выберите оборудование</option>
                            <?php
                            // Здесь должен быть код для загрузки оборудования из БД
                            // Пример:
                            // foreach($equipment_list as $item) {
                            //     $selected = $item['id'] == $equipment_id ? 'selected' : '';
                            //     echo "<option value='{$item['id']}' $selected>{$item['name']} (№{$item['inventory_number']})</option>";
                            // }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="transferDate" class="form-label required-field">Дата передачи</label>
                        <input type="date" class="form-control" id="transferDate" name="transfer_date" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="fromUser" class="form-label required-field">От кого</label>
                        <select class="form-select" id="fromUser" name="from_user_id" required>
                            <option value="">Выберите сотрудника</option>
                            <!-- Список пользователей из БД -->
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="toUser" class="form-label required-field">Кому</label>
                        <select class="form-select" id="toUser" name="to_user_id" required>
                            <option value="">Выберите сотрудника</option>
                            <!-- Список пользователей из БД -->
                        </select>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="condition" class="form-label required-field">Состояние оборудования</label>
                    <textarea class="form-control" id="condition" name="condition" rows="3" required></textarea>
                </div>

                <div class="mb-3">
                    <label for="purpose" class="form-label required-field">Цель передачи</label>
                    <input type="text" class="form-control" id="purpose" name="purpose" required>
                </div>

                <div class="mb-3">
                    <label for="returnDate" class="form-label">Дата возврата (если временная передача)</label>
                    <input type="date" class="form-control" id="returnDate" name="return_date">
                </div>

                <div class="text-end">
                    <button type="button" class="btn btn-secondary" onclick="history.back()">Отмена</button>
                    <button type="submit" class="btn btn-primary">Сохранить документ</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
document.getElementById('equipmentTransferForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const formData = new FormData(this);
    
    fetch('save_document.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            window.location.href = `document_view.php?id=${data.document_id}`;
        } else {
            alert('Ошибка при сохранении: ' + data.message);
            logErrorToSystem(new Error(data.message), {
                form: 'equipment_transfer',
                error: data.error
            });
        }
    })
    .catch(error => {
        alert('Произошла ошибка при отправке формы');
        logErrorToSystem(error, {
            form: 'equipment_transfer',
            action: 'submit_form'
        });
    });
});

// Загрузка сетевых настроек при выборе оборудования
document.getElementById('equipment').addEventListener('change', function() {
    const equipmentId = this.value;
    if (!equipmentId) return;
    
    fetch(`get_network_settings.php?equipment_id=${equipmentId}`)
        .then(response => response.json())
        .then(data => {
            if (data.network_settings) {
                // Показать сетевые настройки в интерфейсе
                showNetworkSettings(data.network_settings);
            }
        })
        .catch(error => {
            console.error('Error loading network settings:', error);
            logErrorToSystem(error, {
                page: 'document_equipment_transfer.php',
                action: 'load_network_settings'
            });
        });
});

function showNetworkSettings(settings) {
    // Реализация отображения сетевых настроек
    // Можно добавить блок с этой информацией в форму
}
</script>

<?php include 'footer.php'; ?>