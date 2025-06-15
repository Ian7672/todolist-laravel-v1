    <!-- Statistik tugas -->
    <div class="task-stats">
        <div class="stat-item">
            <span class="stat-number">{{ $activeTasks->count() }}</span>
            <span class="stat-label">Tugas Aktif</span>
        </div>
        <div class="stat-item">
            <span class="stat-number">{{ $completedTasks->count() }}</span>
            <span class="stat-label">Tugas Selesai</span>
        </div>
        <div class="stat-item">
            <span class="stat-number">{{ $activeTasks->count() + $completedTasks->count() }}</span>
            <span class="stat-label">Total Tugas</span>
        </div>
    </div>
