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
            transition: all 0.3s ease;
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

        /* Dark Mode Styles */
        body.dark-mode {
            background-color: #121212;
            color: #e0e0e0;
        }
        
        .dark-mode .card {
            background-color: #1e1e1e;
            border-color: #333;
            color: #e0e0e0;
        }
        
        .dark-mode .card-header {
            background-color: #1e1e1e;
            border-bottom-color: #333;
            color: #e0e0e0;
        }
        
        .dark-mode .data-table th,
        .dark-mode .data-table td {
            border-bottom-color: #333;
            color: #e0e0e0;
        }
        
        .dark-mode .data-table th {
            background-color: #1e1e1e;
        }
        
        .dark-mode .data-table tr:hover {
            background-color: #2a2a2a;
        }
        
        .dark-mode .form-control {
            background-color: #2a2a2a;
            border-color: #333;
            color: #e0e0e0;
        }
        
        .dark-mode .detail-value {
            background-color: #2a2a2a;
        }
        
        .dark-mode .bg-light {
            background-color: #1e1e1e !important;
            color: #e0e0e0;
        }
        
        .dark-mode .alert-success {
            background-color: #155724;
            border-color: #155724;
            color: white;
        }
        
        .dark-mode .alert-danger {
            background-color: #721c24;
            border-color: #721c24;
            color: white;
        }
        
        .dark-mode .breadcrumb-item a {
            color: #bb86fc;
        }
        
        .dark-mode .dropdown-menu {
            background-color: #1e1e1e;
            border-color: #333;
        }
        
        .dark-mode .dropdown-item {
            color: #e0e0e0;
        }
        
        .dark-mode .dropdown-item:hover {
            background-color: #2a2a2a;
        }
        
        .dark-mode .list-group-item {
            background-color: #1e1e1e;
            border-color: #333;
            color: #e0e0e0;
        }
        
        .dark-mode .text-muted {
            color: #9e9e9e !important;
        }
        
            /* Dark Mode Table Styles */
        .dark-mode table {
            color: #e0e0e0;
            border-color: #444;
        }
        
        .dark-mode table th,
        .dark-mode table td {
            border-color: #444;
            background-color: #1e1e1e;
        }
        
        .dark-mode table tr:hover td {
            background-color: #2a2a2a;
        }
        
        /* Action Buttons in Dark Mode */
        .dark-mode .btn-outline-primary {
            color: #80bdff;
            border-color: #80bdff;
        }
        
        .dark-mode .btn-outline-primary:hover {
            color: #fff;
            background-color: #80bdff;
        }
        
        .dark-mode .btn-outline-warning {
            color: #ffc107;
            border-color: #ffc107;
        }
        
        .dark-mode .btn-outline-warning:hover {
            color: #000;
            background-color: #ffc107;
        }
        
        .dark-mode .btn-outline-danger {
            color: #dc3545;
            border-color: #dc3545;
        }
        
        .dark-mode .btn-outline-danger:hover {
            color: #fff;
            background-color: #dc3545;
        }

        /* Dark Mode Toggle Button */
        .dark-mode-toggle {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 1000;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
            background-color: #343a40;
            color: white;
            border: none;
            transition: all 0.3s;
        }
        
        .dark-mode-toggle:hover {
            transform: scale(1.1);
        }
        
        /* Search Bar Styles */
        .search-container {
            margin-left: auto;
            margin-right: 15px;
            width: 250px;
        }
        
        .search-input {
            background-color: rgba(255, 255, 255, 0.1);
            border: none;
            color: white;
            border-radius: 20px;
            padding: 8px 15px;
            width: 100%;
            transition: all 0.3s;
        }
        
        .search-input::placeholder {
            color: rgba(255, 255, 255, 0.7);
        }
        
        .search-input:focus {
            outline: none;
            background-color: rgba(255, 255, 255, 0.2);
            box-shadow: 0 0 0 2px rgba(255, 255, 255, 0.1);
        }
        
        .dark-mode .search-input {
            background-color: rgba(255, 255, 255, 0.05);
            color: #e0e0e0;
        }
        
        .dark-mode .search-input:focus {
            background-color: rgba(255, 255, 255, 0.1);
        }
        
        @media (max-width: 992px) {
            .search-container {
                width: 200px;
            }
        }
        
        @media (max-width: 768px) {
            .search-container {
                width: 100%;
                margin: 10px 0;
                order: 1;
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
            <!-- <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/home"><i class="fas fa-home"></i></a></li>
                @yield('breadcrumb')
            </ol> -->
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
    
    <!-- Dark Mode and Search Functionality -->
    <button class="dark-mode-toggle" onclick="toggleDarkMode()" title="Toggle Dark Mode">
        <i class="fas fa-moon"></i>
    </button>

    <script>
        // Dark Mode Toggle
        function toggleDarkMode() {
            document.body.classList.toggle('dark-mode');
            localStorage.setItem('darkMode', document.body.classList.contains('dark-mode'));
            updateDarkModeIcon();
        }
        
        // Check for saved dark mode preference
        if (localStorage.getItem('darkMode') === 'true') {
            document.body.classList.add('dark-mode');
        }
        
        // Update dark mode icon
        function updateDarkModeIcon() {
            const darkModeToggle = document.querySelector('.dark-mode-toggle');
            const isDark = document.body.classList.contains('dark-mode');
            darkModeToggle.innerHTML = isDark ? '<i class="fas fa-sun"></i>' : '<i class="fas fa-moon"></i>';
            darkModeToggle.title = isDark ? 'Toggle Light Mode' : 'Toggle Dark Mode';
        }
        
        // Initialize icon
        document.addEventListener('DOMContentLoaded', function() {
            updateDarkModeIcon();
        });
        
        // Search Functionality
        function handleSearch(event) {
            event.preventDefault();
            const searchTerm = document.querySelector('.search-input').value.trim();
            if (searchTerm) {
                alert('Fitur pencarian akan mencari: ' + searchTerm + '\n\nIni hanya contoh UI. Implementasi aktual membutuhkan integrasi dengan backend.');
                // You can replace this with actual search functionality
                // window.location.href = '/search?q=' + encodeURIComponent(searchTerm);
            }
        }
    </script>
    
    @yield('scripts')
</body>
</html>