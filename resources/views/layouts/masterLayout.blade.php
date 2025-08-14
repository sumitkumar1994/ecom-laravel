<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ShopEase - Your Cool eCommerce Store</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

  <!-- Navbar -->
  
  <nav class="navbar navbar-expand-lg">
    <div class="container">
      <a class="navbar-brand" href="/">ShopEase</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon text-white"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav me-auto ms-3">
          <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('shop') }}">Shop</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('categories') }}">Categories</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('contact') }}">Contact</a></li>
        </ul>
        <ul class="navbar-nav ms-auto">
          @auth
        <li class="nav-item">
        <span class="nav-link">Welcome, {{ Auth::user()->name }}</span>
        </li>

        <li class="nav-item">
        <form action="{{ route('logout') }}" method="POST" class="d-inline">

          @csrf
          <button class="btn btn-sm btn-outline-light text-primary" type="submit">Logout</button>
        </form>
        </li>
      @else
        <li class="nav-item">
        <a href="{{ route('login') }}" class="btn btn-sm btn-outline-light me-2">Login</a>
        </li>
        <li class="nav-item">
        <a href="{{ route('register') }}" class="btn btn-sm btn-outline-light">Register</a>
        </li>
      @endauth
        </ul>
      </div>
    </div>
  </nav>
  @if(session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
 @endif


  @hasSection('content')
    @yield('content')
  @else
    <!-- Hero Section -->
    <section class="hero">
    <div class="container">
      <h1 class="display-4">Welcome to ShopEase</h1>
      <p class="lead">Cool deals. Fast delivery. Trendy styles.</p>
      <a href="{{ route('shop') }}" class="btn btn-outline-light btn-lg mt-3">Start Shopping</a>
    </div>
    </section>

    <!-- Sample Products -->
    <section class="py-5">
    <div class="container text-center">
      <h2 class="mb-4">Featured Products</h2>
      <div class="row">
      @for ($i = 1; $i <= 4; $i++)
      <div class="col-md-3">
      <div class="card product-card mb-4 shadow-sm">
      <img src="https://via.placeholder.com/200x150" class="card-img-top" alt="Product {{ $i }}">
      <div class="card-body">
        <h5 class="card-title">Product {{ $i }}</h5>
        <p class="card-text text-muted">₹{{ 499 + $i * 100 }}</p>
        <a href="#" class="btn btn-sm btn-primary">Buy Now</a>
      </div>
      </div>
      </div>
    @endfor
      </div>
    </div>
    </section>
  @endif

  <!-- Footer -->
  <footer class="text-center text-white py-3  fixed-bottom" style="background-color: #667eea;">
    &copy; {{ date('Y') }} ShopEase. All rights reserved.
  </footer>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>