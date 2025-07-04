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
    <!-- Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <style>
        :root {
            --primary-blue: #3498db;
            --secondary-blue: #2980b9;
            --light-blue: #e6f2ff;
            --dark-blue: #2c3e50;
        }
        
        body {
            background-color: #f5f7fa;
            height: 100vh;
            display: flex;
            align-items: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .register-container {
            max-width: 900px;
            width: 100%;
        }
        .register-card {
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(52, 152, 219, 0.2);
            border: none;
        }
        .register-header {
            background: linear-gradient(135deg, var(--primary-blue), var(--secondary-blue));
            padding: 2.5rem;
            color: white;
            position: relative;
            overflow: hidden;
        }
        .register-header::before {
            content: "";
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, rgba(255,255,255,0) 70%);
            transform: rotate(30deg);
        }
        .register-footer {
            background-color: var(--light-blue);
            padding: 1.25rem;
            text-align: center;
            border-top: 1px solid rgba(52, 152, 219, 0.1);
        }
        .form-control:focus {
            border-color: var(--primary-blue);
            box-shadow: 0 0 0 0.25rem rgba(52, 152, 219, 0.25);
        }
        .btn-primary-custom {
            background-color: var(--primary-blue);
            border-color: var(--primary-blue);
            padding: 0.75rem;
            font-weight: 600;
            letter-spacing: 0.5px;
            transition: all 0.3s ease;
        }
        .btn-primary-custom:hover {
            background-color: var(--secondary-blue);
            border-color: var(--secondary-blue);
            transform: translateY(-2px);
        }
        .input-group-text {
            background-color: var(--light-blue);
            border-right: none;
        }
        .form-control {
            border-left: none;
        }
        .password-strength {
            height: 4px;
            background-color: #e9ecef;
            margin-top: 8px;
            border-radius: 2px;
            overflow: hidden;
        }
        .password-strength-bar {
            height: 100%;
            width: 0%;
            background-color: #e74c3c;
            transition: width 0.3s ease, background-color 0.3s ease;
        }
        .terms-link {
            color: var(--primary-blue);
            text-decoration: none;
            font-weight: 500;
        }
        .terms-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container register-container animate__animated animate__fadeIn">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="register-card">
                    <div class="register-header text-center">
                        <h2 class="fw-bold"><i class="fas fa-book-open me-2"></i> Sistem Perpustakaan Digital</h2>
                        <p class="mb-0">SMA Negeri 1 Semin</p>
                    </div>

                    <div class="card-body p-5">
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show animate__animated animate__fadeInDown" role="alert">
                                <i class="fas fa-check-circle me-2"></i>
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        @if($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show animate__animated animate__shakeX" role="alert">
                                <i class="fas fa-exclamation-circle me-2"></i>
                                <ul class="mb-0">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        <h4 class="text-center mb-4 fw-bold text-dark-blue">Buat Akun Baru</h4>
                        
                        <form method="POST" action="{{ route('register') }}" id="registrationForm">
                            @csrf

                            <div class="row mb-4">
                                <div class="col-md-6 mb-3 mb-md-0">
                                    <label for="name" class="form-label fw-semibold">Nama Lengkap</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-user text-primary-blue"></i></span>
                                        <input type="text" class="form-control" id="name" name="name" 
                                               value="{{ old('name') }}" required autocomplete="name" placeholder="Masukkan nama lengkap">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="email" class="form-label fw-semibold">Alamat Email</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-envelope text-primary-blue"></i></span>
                                        <input type="email" class="form-control" id="email" name="email" 
                                               value="{{ old('email') }}" required autocomplete="email" placeholder="contoh@email.com">
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-6 mb-3 mb-md-0">
                                    <label for="password" class="form-label fw-semibold">Password</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-lock text-primary-blue"></i></span>
                                        <input type="password" class="form-control" id="password" name="password" required
                                               placeholder="Minimal 8 karakter" oninput="checkPasswordStrength(this.value)">
                                    </div>
                                    <div class="password-strength">
                                        <div class="password-strength-bar" id="passwordStrengthBar"></div>
                                    </div>
                                    <small class="text-muted">Gunakan kombinasi huruf, angka, dan simbol</small>
                                </div>
                                <div class="col-md-6">
                                    <label for="password-confirm" class="form-label fw-semibold">Konfirmasi Password</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-lock text-primary-blue"></i></span>
                                        <input type="password" class="form-control" id="password-confirm" 
                                               name="password_confirmation" required placeholder="Ketik ulang password">
                                    </div>
                                </div>
                            </div>

                            <div class="mb-4">
                                <label for="role" class="form-label fw-semibold">Daftar Sebagai</label>
                                <select class="form-select" id="role" name="role">
                                    <option value="siswa" {{ old('role') == 'siswa' ? 'selected' : '' }}>Siswa</option>
                                    <option value="petugas" {{ old('role') == 'petugas' ? 'selected' : '' }}>Petugas Perpustakaan</option>
                                </select>
                            </div>

                            <div class="mb-4 form-check">
                                <input type="checkbox" class="form-check-input" id="terms" name="terms" required>
                                <label class="form-check-label" for="terms">
                                    Saya menyetujui <a href="#" class="terms-link">syarat dan ketentuan</a>
                                </label>
                            </div>

                            <div class="d-grid gap-2 mb-3">
                                <button type="submit" class="btn btn-primary-custom btn-lg">
                                    <i class="fas fa-user-plus me-2"></i>Daftar Sekarang
                                </button>
                            </div>
                        </form>
                    </div>

                    <div class="register-footer">
                        <p class="mb-0">Sudah punya akun? <a href="{{ route('login') }}" class="terms-link">Masuk disini</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Password strength indicator
        function checkPasswordStrength(password) {
            const strengthBar = document.getElementById('passwordStrengthBar');
            const strength = calculatePasswordStrength(password);
            
            if (password.length === 0) {
                strengthBar.style.width = '0%';
                strengthBar.style.backgroundColor = '#e74c3c';
            } else if (strength < 40) {
                strengthBar.style.width = '30%';
                strengthBar.style.backgroundColor = '#e74c3c';
            } else if (strength < 70) {
                strengthBar.style.width = '60%';
                strengthBar.style.backgroundColor = '#f39c12';
            } else {
                strengthBar.style.width = '100%';
                strengthBar.style.backgroundColor = '#2ecc71';
            }
        }
        
        function calculatePasswordStrength(password) {
            let strength = 0;
            
            // Length contributes up to 40%
            strength += Math.min(password.length / 12 * 40, 40);
            
            // Presence of different character types
            if (password.match(/[a-z]/)) strength += 10;
            if (password.match(/[A-Z]/)) strength += 10;
            if (password.match(/[0-9]/)) strength += 10;
            if (password.match(/[^a-zA-Z0-9]/)) strength += 10;
            
            // Bonus for combinations
            if (password.length >= 8 && password.match(/[a-z]/) && password.match(/[A-Z]/)) strength += 10;
            if (password.length >= 8 && password.match(/[0-9]/)) strength += 5;
            if (password.length >= 8 && password.match(/[^a-zA-Z0-9]/)) strength += 5;
            
            return Math.min(strength, 100);
        }
        
        // Show terms modal
        document.querySelector('.terms-link').addEventListener('click', function(e) {
            e.preventDefault();
            // In a real application, you would show a modal with terms and conditions
            alert('Syarat dan ketentuan akan ditampilkan di sini. Dalam aplikasi nyata, ini akan membuka modal atau halaman terpisah.');
        });
        
        // Form submission animation
        document.getElementById('registrationForm').addEventListener('submit', function() {
            const submitBtn = this.querySelector('button[type="submit"]');
            submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>Memproses...';
            submitBtn.disabled = true;
        });
    </script>
</body>
</html>