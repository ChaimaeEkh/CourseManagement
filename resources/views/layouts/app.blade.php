<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Course Management')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="{{ route('courses.index') }}">Courses</a>
        </div>
    </nav>
    
    <div class="container mt-4">
        @yield('content')
    </div>

    <footer class="text-center mt-4 py-3">
        <p>&copy; {{ date('Y') }} Course Management</p>
    </footer>
</body>
</html>
