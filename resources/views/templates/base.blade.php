<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'PMS - Product Management System')</title>
</head>
<body>
    <header>
        <nav>
            <h1>PMS</h1>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Products</a></li>
                <li><a href="#">Stores</a></li>
                <img src="" alt="logo">
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
</body>
</html>

