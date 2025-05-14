<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') - Sistem Perpustakaan</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Custom CSS -->
    <style>
        /* General Styles */
        body {
            padding-top: 70px;
            background-color: #f8f9fa;
        }
        
        /* Card Styles */
        .card {
            margin-bottom: 20px;
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
            transition: transform 0.2s;
        }
        .card:hover {
            transform: translateY(-5px);
        }
        .card-header {
            background-color: #fff;
            border-bottom: 1px solid rgba(0, 0, 0, 0.125);
        }
        
        /* Breadcrumb */
        .breadcrumb {
            background-color: transparent;
            padding: 0;
            margin-bottom: 0;
        }
        
        /* Action Buttons */
        .action-buttons a {
            margin-right: 5px;
        }
        
        /* Table Styles */
        .data-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .data-table th, .data-table td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        .data-table th {
            background-color: #f8f9fa;
            font-weight: 600;
        }
        .data-table tr:hover {
            background-color: #f5f5f5;
        }
        
        /* Form Styles */
        .form-container {
            max-width: 600px;
            margin: 0 auto;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
        }
        .form-control {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            transition: border-color 0.3s;
        }
        .form-control:focus {
            border-color: #80bdff;
            outline: 0;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        }
        textarea.form-control {
            min-height: 100px;
        }
        
        /* Button Styles */
        .btn {
            padding: 10px 15px;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            transition: all 0.3s;
        }
        .btn-primary {
            background-color: #3490dc;
            color: white;
            border: none;
        }
        .btn-primary:hover {
            background-color: #227dc7;
        }
        .btn-success {
            background-color: #38c172;
            color: white;
            border: none;
        }
        .btn-success:hover {
            background-color: #2d995b;
        }
        .btn-danger {
            background-color: #dc3545;
            color: white;
            border: none;
        }
        .btn-danger:hover {
            background-color: #bd2130;
        }
        .btn-secondary {
            background-color: #6c757d;
            color: white;
            border: none;
        }
        .btn-secondary:hover {
            background-color: #5a6268;
        }
        .btn-outline {
            background-color: transparent;
            border: 1px solid #ddd;
        }
        .btn-outline:hover {
            background-color: #f8f9fa;
        }
        
        /* Alert Styles */
        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border: 1px solid transparent;
            border-radius: 4px;
        }
        .alert-success {
            color: #155724;
            background-color: #d4edda;
            border-color: #c3e6cb;
        }
        .alert-danger {
            color: #721c24;
            background-color: #f8d7da;
            border-color: #f5c6cb;
        }
        
        /* Detail View Styles */
        .detail-item {
            margin-bottom: 15px;
        }
        .detail-label {
            font-weight: 600;
            display: block;
            margin-bottom: 5px;
        }
        .detail-value {
            padding: 8px;
            background-color: #f8f9fa;
            border-radius: 4px;
        }
        
        /* Quick Links */
        .quick-link-card {
            text-decoration: none;
            color: #212529;
            text-align: center;
            transition: all 0.3s;
        }
        .quick-link-card:hover {
            color: #0056b3;
        }
        .quick-link-icon {
            font-size: 2.5rem;
            margin-bottom: 15px;
        }
        
        /* Confirmation Styles */
        .confirmation-message {
            margin-bottom: 25px;
            font-size: 1.1rem;
        }
        .confirmation-details {
            margin-bottom: 30px;
        }
        
        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .btn {
                display: block;
                width: 100%;
                margin-bottom: 10px;
            }
            .action-buttons a {
                display: block;
                margin-bottom: 10px;
                margin-right: 0;
            }
        }
    </style>
    @yield('styles')
</head>
<body>
    @include('partials.navbar')

    <div class="container">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="my-3">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/"><i class="fas fa-home"></i></a></li>
                @yield('breadcrumb')
            </ol>
        </nav>

        <!-- Page Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>@yield('header')</h2>
            @hasSection('actions')
                <div class="actions">
                    @yield('actions')
                </div>
            @endif
        </div>

        <!-- Content -->
        <div class="row">
            <div class="col-12">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @yield('content')
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-light py-4 mt-5">
        <div class="container text-center">
            <p class="mb-0">Sistem Perpustakaan &copy; {{ date('Y') }}</p>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    @yield('scripts')
</body>
</html>