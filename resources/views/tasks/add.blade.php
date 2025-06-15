    <!-- Form tambah tugas baru -->
    <form method="POST" action="/tasks" class="new-task">
        @csrf
        <input type="text" name="title" placeholder="Judul tugas..." required value="{{ old('title') }}" />
        <textarea name="description" placeholder="Deskripsi tugas (opsional)...">{{ old('description') }}</textarea>
        @php
            $tomorrow = \Carbon\Carbon::tomorrow()->format('Y-m-d');
        @endphp

        <input type="date" name="deadline" value="{{ old('deadline', $tomorrow) }}" required
            min="{{ $tomorrow }}">

        <button type="submit">Tambah</button>
    </form>
