<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'PMS - Product Management System')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="sweetalert2.min.js"></script>
    <link rel="stylesheet" href="sweetalert2.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #1e293b;
            background-color: #f0fdf4;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* Header Styles */
        header {
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            padding: 1rem 0;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        header nav {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        header nav h1 {
            font-size: 1.75rem;
            font-weight: bold;
            color: white;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        header nav h1 i {
            font-size: 2rem;
        }

        header nav ul {
            list-style: none;
            display: flex;
            gap: 1.5rem;
            align-items: center;
        }

        /* Main Content */
        body > div {
            flex: 1;
            width: 100%;
        }

        body > div > h1 {
            display: none; /* Hide the duplicate title */
        }

        /* Footer Styles */
        footer {
            background: #1e293b;
            color: white;
            padding: 2rem 0;
            text-align: center;
            margin-top: auto;
        }

        footer p {
            margin: 0;
            font-size: 0.95rem;
        }

        /* Responsive */
        @media (max-width: 768px) {
            header nav {
                padding: 0 1rem;
            }

            header nav h1 {
                font-size: 1.5rem;
            }
        }
                .navbar-brand {
            font-size: 1.5rem;
            font-weight: bold;
            color: white !important;
        }
    </style>

    <!-- Custom CSS  -->
     @stack('style')


</head>
<body>
    <header>
        <nav>
            <h1>
                <a class="navbar-brand" href="{{ route('shopdashboard') }}">
                <i class="bi bi-box-seam"></i> PMS
                </a>
            </h1>
            <ul>
            </ul>
        </nav>
    </header>

    <div>
        <h1>@yield('title')</h1>
        @yield('content')
    </div>

    <footer>
        <p>&copy; 2025 Product Management System. All rights reserved.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>