<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi - Sistem Perpustakaan</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            height: 100vh;
            display: flex;
            align-items: center;
        }
        .register-card {
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }
        .register-header {
            background: linear-gradient(135deg, #2ecc71, #27ae60);
            padding: 2rem;
            color: white;
        }
        .register-footer {
            background-color: #f8f9fa;
            padding: 1rem;
        }
        .form-control:focus {
            border-color: #2ecc71;
            box-shadow: 0 0 0 0.25rem rgba(46, 204, 113, 0.25);
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="register-card">
                    <div class="register-header text-center">
                        <h2><i class="fas fa-book-open me-2"></i> Sistem Perpustakaan</h2>
                        <p class="mb-0">SMA Negeri 1 Semin</p>
                    </div>

                    <div class="card-body p-4">
                        <h4 class="text-center mb-4">Buat Akun Baru</h4>
                        
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="name" class="form-label">Nama Lengkap</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        <input type="text" class="form-control" id="name" name="name" 
                                               value="{{ old('name') }}" required autocomplete="name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="email" class="form-label">Email</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                        <input type="email" class="form-control" id="email" name="email" 
                                               value="{{ old('email') }}" required autocomplete="email">
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="password" class="form-label">Password</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                        <input type="password" class="form-control" id="password" name="password" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="password-confirm" class="form-label">Konfirmasi Password</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                        <input type="password" class="form-control" id="password-confirm" 
                                               name="password_confirmation" required>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="role" class="form-label">Daftar Sebagai</label>
                                <select class="form-select" id="role" name="role">
                                    <option value="siswa">Siswa</option>
                                    <option value="petugas">Petugas Perpustakaan</option>
                                </select>
                            </div>

                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="terms" name="terms" required>
                                <label class="form-check-label" for="terms">Saya menyetujui syarat dan ketentuan</label>
                            </div>

                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-success btn-lg">
                                    <i class="fas fa-user-plus me-2"></i>Daftar
                                </button>
                            </div>
                        </form>
                    </div>

                    <div class="register-footer text-center">
                        <p class="mb-0">Sudah punya akun? <a href="{{ route('login') }}">Login disini</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>