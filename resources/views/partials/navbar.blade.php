<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand" href="/">Sistem Perpustakaan</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="/">Dashboard</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ request()->is('buku*') ? 'active' : '' }}" href="#" role="button" data-bs-toggle="dropdown">
                        Buku
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/buku">Daftar Buku</a></li>
                        <li><a class="dropdown-item" href="/buku/create">Tambah Buku</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ request()->is('siswa*') ? 'active' : '' }}" href="#" role="button" data-bs-toggle="dropdown">
                        Siswa
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/siswa">Daftar Siswa</a></li>
                        <li><a class="dropdown-item" href="/siswa/create">Tambah Siswa</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ request()->is('petugas*') ? 'active' : '' }}" href="#" role="button" data-bs-toggle="dropdown">
                        Petugas
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/petugas">Daftar Petugas</a></li>
                        <li><a class="dropdown-item" href="/petugas/create">Tambah Petugas</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ request()->is('peminjaman*') ? 'active' : '' }}" href="#" role="button" data-bs-toggle="dropdown">
                        Peminjaman
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/peminjaman">Daftar Peminjaman</a></li>
                        <li><a class="dropdown-item" href="/peminjaman/create">Tambah Peminjaman</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ request()->is('denda*') ? 'active' : '' }}" href="#" role="button" data-bs-toggle="dropdown">
                        Denda
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/denda">Daftar Denda</a></li>
                        <li><a class="dropdown-item" href="/denda/create">Tambah Denda</a></li>
                    </ul>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                        <i class="fas fa-user-circle me-1"></i> Admin
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="#"><i class="fas fa-user me-1"></i> Profil</a></li>
                        <li><a class="dropdown-item" href="#"><i class="fas fa-cog me-1"></i> Pengaturan</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#"><i class="fas fa-sign-out-alt me-1"></i> Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>