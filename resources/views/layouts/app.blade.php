<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Blog</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="d-flex flex-column min-vh-100">
  <header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
      <div class="container-fluid">
        <a class="navbar-brand text-white" href="{{ route('posts.index') }}" style="font-size: 1.75rem; font-weight: bold;">The Blog</a>
      </div>
    </nav>
  </header>

  <main class="flex-fill">
    @yield('content')
  </main>

  <footer class="footer mt-auto py-3 bg-dark">
    <div class="container d-flex justify-content-center">
      <span class="text-light" style="font-size: 1rem;">Mini-Blog © 2023</span>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"  integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>
