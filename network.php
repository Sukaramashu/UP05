<?php
$page_title = "Сетевые настройки оборудования";
include 'header.php';
include 'sidebar.php';

$equipment_id = isset($_GET['id']) ? intval($_GET['id']) : null;
?>

<div class="main-content">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Сетевые настройки оборудования</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#editNetworkSettingsModal">
                <i class="bi bi-pencil"></i> Редактировать
            </button>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="card-title mb-0">Основные параметры</h5>
                </div>
                <div class="card-body">
                    <dl class="row">
                        <dt class="col-sm-4">IP-адрес:</dt>
                        <dd class="col-sm-8" id="ipAddress">192.168.1.100</dd>

                        <dt class="col-sm-4">Маска подсети:</dt>
                        <dd class="col-sm-8" id="subnetMask">255.255.255.0</dd>

                        <dt class="col-sm-4">Шлюз:</dt>
                        <dd class="col-sm-8" id="gateway">192.168.1.1</dd>

                        <dt class="col-sm-4">DNS:</dt>
                        <dd class="col-sm-8" id="dnsServers">8.8.8.8, 8.8.4.4</dd>
                    </dl>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Дополнительные настройки</h5>
                </div>
                <div class="card-body">
                    <dl class="row">
                        <dt class="col-sm-4">MAC-адрес:</dt>
                        <dd class="col-sm-8" id="macAddress">00:1A:2B:3C:4D:5E</dd>

                        <dt class="col-sm-4">Порт управления:</dt>
                        <dd class="col-sm-8" id="managementPort">8080</dd>

                        <dt class="col-sm-4">Логин:</dt>
                        <dd class="col-sm-8" id="login">admin</dd>

                        <dt class="col-sm-4">Дата изменения:</dt>
                        <dd class="col-sm-8" id="lastUpdated">15.05.2023 14:30</dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>

    <div class="card mt-4">
        <div class="card-header">
            <h5 class="card-title mb-0">История изменений</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th>Дата</th>
                            <th>Пользователь</th>
                            <th>Изменения</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>15.05.2023 14:30</td>
                            <td>Иванов И.И.</td>
                            <td>Изменен IP-адрес (192.168.1.50 → 192.168.1.100)</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Модальное окно редактирования сетевых настроек -->
<div class="modal fade" id="editNetworkSettingsModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Редактирование сетевых настроек</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="networkSettingsForm">
                    <input type="hidden" name="equipment_id" value="<?= $equipment_id ?>">
                    
                    <div class="mb-3">
                        <label for="editIpAddress" class="form-label">IP-адрес</label>
                        <input type="text" class="form-control" id="editIpAddress" name="ip_address">
                    </div>
                    
                    <div class="mb-3">
                        <label for="editSubnetMask" class="form-label">Маска подсети</label>
                        <input type="text" class="form-control" id="editSubnetMask" name="subnet_mask">
                    </div>
                    
                    <div class="mb-3">
                        <label for="editGateway" class="form-label">Шлюз</label>
                        <input type="text" class="form-control" id="editGateway" name="gateway">
                    </div>
                    
                    <div class="mb-3">
                        <label for="editDns" class="form-label">DNS-серверы (через запятую)</label>
                        <input type="text" class="form-control" id="editDns" name="dns_servers">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Отмена</button>
                <button type="button" class="btn btn-primary" id="saveNetworkSettings">Сохранить</button>
            </div>
        </div>
    </div>
</div>

<script>
// Загрузка текущих настроек при открытии модального окна
document.getElementById('editNetworkSettingsModal').addEventListener('show.bs.modal', function() {
    fetch(`get_network_settings.php?equipment_id=<?= $equipment_id ?>`)
        .then(response => response.json())
        .then(data => {
            if (data.settings) {
                document.getElementById('editIpAddress').value = data.settings.ip_address || '';
                document.getElementById('editSubnetMask').value = data.settings.subnet_mask || '';
                document.getElementById('editGateway').value = data.settings.gateway || '';
                document.getElementById('editDns').value = data.settings.dns_servers || '';
            }
        })
        .catch(error => {
            console.error('Error loading network settings:', error);
            logErrorToSystem(error, {
                page: 'network_settings.php',
                action: 'load_settings_for_edit'
            });
        });
});

// Сохранение новых настроек
document.getElementById('saveNetworkSettings').addEventListener('click', function() {
    const formData = new FormData(document.getElementById('networkSettingsForm'));
    
    fetch('save_network_settings.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            location.reload(); // Обновляем страницу для отображения новых данных
        } else {
            alert('Ошибка при сохранении: ' + data.message);
            logErrorToSystem(new Error(data.message), {
                form: 'network_settings',
                error: data.error
            });
        }
    })
    .catch(error => {
        alert('Произошла ошибка при сохранении настроек');
        logErrorToSystem(error, {
            form: 'network_settings',
            action: 'save_settings'
        });
    });
});
</script>

<?php include 'footer.php'; ?>