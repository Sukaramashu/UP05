        </div>
    </div>
</div>

<!-- Скрипты для работы меню -->
<script>
    // Закрытие меню при клике вне его области
    document.addEventListener('click', function(event) {
        const sidebar = document.querySelector('.sidebar');
        const toggleBtn = document.querySelector('.sidebar-toggle');
        if (sidebar.classList.contains('active') && 
            !sidebar.contains(event.target) && 
            !toggleBtn.contains(event.target)) {
            sidebar.classList.remove('active');
            document.querySelector('.sidebar-backdrop').classList.remove('active');
            document.body.classList.remove('sidebar-open');
        }
    });

    // Закрытие меню при нажатии ESC
    document.addEventListener('keydown', function(event) {
        if (event.key === 'Escape') {
            document.querySelector('.sidebar').classList.remove('active');
            document.querySelector('.sidebar-backdrop').classList.remove('active');
            document.body.classList.remove('sidebar-open');
        }
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>