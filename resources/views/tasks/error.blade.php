    <!-- Menampilkan error validasi -->
    @if ($errors->any())
        <div class="error-list">
            <div class="error-header">⚠️ Terjadi kesalahan:</div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
