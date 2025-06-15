    <!-- Tugas yang sudah selesai -->
    @if ($completedTasks->count() > 0)
        <div class="section-header">
            <h2>✅ Tugas Selesai ({{ $completedTasks->count() }})</h2>
        </div>
        <ul id="completed-tasks">
            @foreach ($completedTasks as $task)
                <li data-task-id="{{ $task->id }}" class="completed-task">
                    <div class="task-left">
                        <div class="task-info">
                            <!-- Checkbox untuk mark complete -->
                            <form method="POST" action="/tasks/{{ $task->id }}/toggle" class="checkbox-form">
                                @csrf
                                @method('POST')
                                <input type="checkbox" name="completed" onchange="this.form.submit()"
                                    {{ $task->completed ? 'checked' : '' }} />
                            </form>

                            <!-- Form edit atau tampilan normal -->
                            @if (request()->query('edit') == $task->id)
                                <div class="edit-container">
                                    <form method="POST" action="/tasks/{{ $task->id }}/edit" class="edit-form">
                                        @csrf
                                        @method('PUT')
                                        <input type="text" name="title" value="{{ old('title', $task->title) }}"
                                            required />
                                        <textarea name="description" placeholder="Deskripsi tugas...">{{ old('description', $task->description) }}</textarea>
                                        <input type="date" name="deadline"
                                            value="{{ old('deadline', \Carbon\Carbon::parse($task->deadline)->format('Y-m-d')) }}"
                                            required min="{{ date('Y-m-d') }}" />

                                        <!-- Button actions untuk edit -->
                                        <div class="edit-actions">
                                            <button type="submit" class="save-btn">💾 Simpan</button>
                                            <a href="{{ url()->current() }}" class="cancel-btn">❌ Batal</a>
                                        </div>
                                    </form>
                                </div>
                            @else
                                <!-- Tampilan normal task -->
                                <div class="task-content">
                                    <span
                                        class="task-title {{ $task->completed ? 'completed' : '' }}">{{ $task->title }}</span>


                                    @if ($task->description)
                                        <div class="task-description {{ $task->completed ? 'completed' : '' }}">
                                            {{ $task->description }}</div>
                                    @endif

                                    <div class="task-dates">
                                        <span class="task-deadline">📅 Deadline:
                                            {{ \Carbon\Carbon::parse($task->deadline)->translatedFormat('d F Y') }}</span>
                                        @if ($task->completed_at)
                                            <span class="task-completed-at">✅ Selesai:
                                                {{ $task->formatted_completed_at }}</span>
                                        @endif
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- Actions untuk tampilan normal -->
                    @if (request()->query('edit') != $task->id)
                        <div class="task-actions">
                            <a href="{{ url()->current() }}?edit={{ $task->id }}" class="edit-link">
                                <button type="button" class="edit-btn">✏️ Edit</button>
                            </a>
                            <form method="POST" action="/tasks/{{ $task->id }}" class="delete-form">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="delete-btn"
                                    onclick="return confirm('Yakin ingin menghapus tugas ini?')">🗑️ Hapus</button>
                            </form>
                        </div>
                    @endif
                </li>
            @endforeach
        </ul>
    @endif
