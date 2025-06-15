    <div class="header-section">
        <div class="profile-info">
            <div class="greeting">{{ Auth::user()->username }}</div>
            <div class="email-info">{{ Auth::user()->email }}</div>
        </div>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="logout-btn" type="submit" onmouseover="this.style.backgroundColor='#17a84b'"
                onmouseout="this.style.backgroundColor='#1DB954'">
                Keluar
            </button>
        </form>
    </div>
