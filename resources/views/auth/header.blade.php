 <!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Viettel Telecom</title>

  <!-- Fonts & CSS -->
  <link rel="icon" href="img/favicon.ico">
  <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="{{ asset('css/header.css') }}" rel="stylesheet">
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">

  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: 'Nunito', sans-serif;
      background-color: #f8f9fa;
    }

    .container {
      max-width: 1200px;
      margin: 0 auto;
      padding-left: 15px;
      padding-right: 15px;
    }


    .navbar-light .navbar-nav .nav-link {
      color: #000 !important;
    }

    .navbar-light .navbar-nav .nav-link:hover,
    .navbar-light .navbar-nav .nav-link:focus,
    .navbar-light .navbar-nav .nav-link.active {
      color: #dc3545 !important;
    }
  </style>
</head>
<body>

  <!-- TOPBAR -->
  <div class="bg-dark text-light d-none d-lg-block">
    <div class="container d-flex justify-content-between align-items-center py-2">
      <div>
        <small><i class="fa fa-map-marker-alt me-1"></i>62 Nguyễn Lương Bằng, Hoà Khánh Bắc, Liên Chiểu, Đà Nẵng</small>
        <small class="ms-4"><i class="fa fa-phone-alt me-1"></i>+012 345 6789</small>
        <small class="ms-4"><i class="fa fa-envelope-open me-1"></i>viettellienchieu@example.com</small>
      </div>
      <div>
        <a href="#" class="text-light me-2"><i class="fab fa-facebook-f"></i></a>
        <a href="#" class="text-light me-2"><i class="fab fa-instagram"></i></a>
        <a href="#" class="text-light me-2"><i class="fab fa-twitter"></i></a>
        <a href="#" class="text-light me-2"><i class="fab fa-linkedin-in"></i></a>
        <a href="#" class="text-light"><i class="fab fa-youtube"></i></a>
      </div>
    </div>
  </div>

  <!-- HEADER + NAVBAR -->
  <header class="sticky-top shadow-sm bg-white">
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
      <div class="container">
        <!-- Logo -->
        <a href="{{ route('auth.dashboard') }}" class="navbar-brand d-flex align-items-center gap-2">
          <i class="fas fa-bolt text-danger fs-3"></i>
          <span class="text-danger fw-bold fs-4">Viettel Telecom</span>
        </a>

        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
          <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Menu + Actions -->
        <div class="collapse navbar-collapse" id="navbarNav">
         <ul class="navbar-nav mx-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="gioithieu" data-bs-toggle="dropdown">Giới Thiệu</a>
          <ul class="dropdown-menu" aria-labelledby="gioithieu">
            <li><a class="dropdown-item" href="{{ route('about') }}">Giới thiệu Viettel</a></li>
            <li><a class="dropdown-item" href="{{ route('about') }}">Chất lượng dịch vụ</a></li>
          </ul>
        </li>
        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="hoamang" data-bs-toggle="dropdown">Hòa Mạng Mới</a>
          <ul class="dropdown-menu" aria-labelledby="hoamang">
            <li><a class="dropdown-item" href="{{ route('traTruoc') }}">Trả Trước</a></li>
            <li><a class="dropdown-item" href="{{ route('traSau') }}">Trả Sau</a></li>
          </ul>
        </li>

        <li class="nav-item"><a class="nav-link" href="{{ route('onlydata') }}">Only Data</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('combo') }}">Combo</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('question') }}">Hỗ trợ khách hàng</a></li>
      </ul>


          <!-- Lịch sử + Logout -->
          <div class="d-flex align-items-center gap-2">
            <a href="{{ route('history') }}" class="me-2">
              <img src="/images/history.png" alt="Lịch sử" style="height: 28px;">
            </a>
            <form method="POST" action="{{ route('logout') }}" class="mb-0">
              @csrf
              <button type="submit" class="btn btn-outline-danger btn-sm">Đăng xuất</button>
            </form>
          </div>
        </div>
      </div>
    </nav>
  </header>

  <!-- JavaScript -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', () => {
      const navbar = document.querySelector('.navbar-light');

      const toggleScrolled = () => {
        if (window.scrollY > 50) {
          navbar.classList.add('scrolled');
        } else {
          navbar.classList.remove('scrolled');
        }
      };

      window.addEventListener('scroll', toggleScrolled);
      toggleScrolled(); // Run once at load
    });
  </script>

</body>
</html>

