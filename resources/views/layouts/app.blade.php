<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Catalogue Bibliothèque Pédagogique')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Poppins:wght@600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --accent: #4f46e5;
            --accent-dark: #4338ca;
            --accent-light: #eef2ff;
            --ink: #1e2433;
            --muted: #6b7280;
            --border: #e5e7eb;
            --bg: #f8f9fc;
            --success: #16a34a;
            --danger: #dc2626;
        }

        * {
            font-family: 'Inter', sans-serif;
        }

        body {
            background-color: var(--bg);
            color: var(--ink);
        }

        h1, h2, h3, h4, .navbar-brand {
            font-family: 'Poppins', sans-serif;
        }

        /* Navbar */
        .navbar {
            background-color: #ffffff !important;
            border-bottom: 1px solid var(--border);
            padding-top: 14px;
            padding-bottom: 14px;
        }
        .navbar-brand {
            color: var(--ink) !important;
            font-weight: 700;
            font-size: 1.25rem;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .navbar-brand .icon-box {
            width: 38px;
            height: 38px;
            background: var(--accent);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1rem;
        }

        /* Page heading */
        .page-heading h2 {
            font-weight: 600;
            font-size: 1.5rem;
            color: var(--ink);
        }
        .page-subtitle {
            color: var(--muted);
            font-size: 0.9rem;
        }

        /* Cards */
        .card {
            border: 1px solid var(--border);
            border-radius: 14px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.04);
        }

        /* Buttons */
        .btn {
            border-radius: 8px;
            font-weight: 500;
            font-size: 0.9rem;
            padding: 0.55rem 1.1rem;
        }
        .btn-primary {
            background-color: var(--accent);
            border-color: var(--accent);
        }
        .btn-primary:hover, .btn-primary:focus {
            background-color: var(--accent-dark);
            border-color: var(--accent-dark);
        }
        .btn-outline-secondary {
            border-color: var(--border);
            color: var(--muted);
        }
        .btn-outline-secondary:hover {
            background-color: var(--bg);
            color: var(--ink);
        }
        .btn-sm {
            padding: 0.4rem 0.85rem;
            font-size: 0.82rem;
        }
        .btn-warning {
            background-color: #fbbf24;
            border-color: #fbbf24;
            color: #78350f !important;
        }
        .btn-warning:hover {
            background-color: #f59e0b;
            border-color: #f59e0b;
        }
        .btn-danger {
            background-color: var(--danger);
            border-color: var(--danger);
        }

        /* Table */
        .table thead {
            background-color: var(--bg);
            color: var(--muted);
        }
        .table thead th {
            font-weight: 600;
            font-size: 0.78rem;
            text-transform: uppercase;
            letter-spacing: 0.04em;
            border-bottom: 1px solid var(--border);
            padding: 14px 16px;
        }
        .table tbody td {
            padding: 14px 16px;
            font-size: 0.92rem;
            border-bottom: 1px solid var(--border);
            vertical-align: middle;
        }
        .table tbody tr:last-child td {
            border-bottom: none;
        }
        .table tbody tr:hover {
            background-color: var(--accent-light);
        }

        /* Badges */
        .badge {
            font-weight: 500;
            font-size: 0.78rem;
            padding: 6px 12px;
            border-radius: 20px;
        }
        .badge-statut-disponible {
            background-color: #dcfce7;
            color: #166534;
        }
        .badge-statut-epuise {
            background-color: #fee2e2;
            color: #991b1b;
        }

        /* Forms */
        .form-label {
            font-weight: 500;
            font-size: 0.88rem;
            color: var(--ink);
            margin-bottom: 6px;
        }
        .form-control, .form-select {
            border-radius: 8px;
            border: 1px solid var(--border);
            padding: 0.6rem 0.85rem;
            font-size: 0.92rem;
        }
        .form-control:focus, .form-select:focus {
            border-color: var(--accent);
            box-shadow: 0 0 0 3px var(--accent-light);
        }
        .invalid-feedback {
            margin-top: 5px;
            font-size: 0.82rem;
        }

        /* Alerts */
        .alert {
            border-radius: 10px;
            border: none;
            font-size: 0.9rem;
        }
        .alert-success {
            background-color: #dcfce7;
            color: #166534;
        }
        .alert-danger {
            background-color: #fee2e2;
            color: #991b1b;
        }

        /* Modal */
        .modal-content {
            border-radius: 14px;
            border: none;
        }
        .modal-header {
            border-bottom: 1px solid var(--border);
        }
        .modal-footer {
            border-top: 1px solid var(--border);
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="{{ route('ouvrages.index') }}">
                <span class="icon-box"><i class="fas fa-book"></i></span>
                Bibliothèque Pédagogique
            </a>
        </div>
    </nav>

    <div class="container" style="max-width: 1100px; margin-top: 40px; margin-bottom: 60px;">

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-circle-check me-2"></i>{{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fas fa-circle-exclamation me-2"></i>{{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @yield('content')

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>