    <!-- Pesan jika tidak ada tugas -->
    @if ($activeTasks->count() == 0 && $completedTasks->count() == 0)
        <div class="empty-state">
            <div class="empty-icon">📝</div>
            <h3>Belum ada tugas</h3>
            <p>Mulai dengan menambahkan tugas pertama Anda!</p>
        </div>
    @endif
