<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Viettel Telecom</title>

  <!-- Fonts & CSS -->
  <link rel="icon" href="img/favicon.ico">
  <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:...lay=swap" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="/css/header.css" rel="stylesheet">
  <link href="/css/style.css" rel="stylesheet">

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

    .navbar-nav .nav-link {
      padding-left: 8px;
      padding-right: 8px;
      white-space: nowrap; /* ngăn chữ bị xuống dòng */
    }

      .qr-code {
        transition: transform 0.3s ease;  
      }
      .qr-code:hover {
        transform: scale(1.2); /* phóng to 120% */
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
        <a href="https://web.facebook.com/vietteltelecom" class="text-light me-2"><i class="fab fa-facebook-f"></i></a>
        <a href="https://www.youtube.com/@Vietteltelecom.Official" class="text-light"><i class="fab fa-youtube"></i></a>
      </div>
    </div>
  </div>

  <!-- HEADER + NAVBAR -->
  <header class="sticky-top shadow-sm bg-white">
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
      <div class="container">
        <!-- Logo -->
        <a href="{{ route('dashboard') }}" class="navbar-brand d-flex align-items-center gap-2">
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
            <li><a class="dropdown-item" href="{{ route('danh_gia')}}">Chất lượng dịch vụ</a></li>
          </ul>
        </li>
        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="hoamang" data-bs-toggle="dropdown">Hòa Mạng Mới</a>
          <ul class="dropdown-menu" aria-labelledby="hoamang">
            <li><a class="dropdown-item" href="{{ route('traTruoc') }}">Trả Trước</a></li>
            <li><a class="dropdown-item" href="{{ route('traSau') }}">Trả Sau</a></li>
          </ul>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="{{ route('onlydata') }}"><span style="white-space: nowrap;">Only Data</span></a>
        </li>
        <li class="nav-item"><a class="nav-link" href="{{ route('combo') }}">Combo</a></li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="thanhtoan" data-bs-toggle="dropdown">
            Thanh toán
          </a>
          <ul class="dropdown-menu p-3 text-center" aria-labelledby="thanhtoan">
            <li>
              <img src="/images/qr-code1.jpg" alt="QR Code" class="img-fluid qr-code" style="max-width:250px;">
            </li>
          </ul>
        </li>


        <li class="nav-item"><a class="nav-link" href="{{ route('question') }}">Hỗ trợ khách hàng</a></li>
        
      </ul>


          <!-- Lịch sử + Logout -->
          <div class="d-flex align-items-center gap-2">
            <button type="button" class="btn btn-outline-secondary btn-sm" id="openSearch">
              <i class="fas fa-search"></i>
            </button>
            <form method="POST" action="{{ route('logout') }}" class="mb-0">
              @csrf
              <button type="submit" class="btn btn-outline-danger btn-sm">Quản lí</button>
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
<!-- Modal Tìm kiếm -->
<div class="modal fade" id="searchModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content p-4 rounded-4 shadow">
      <!-- Nút đóng -->
      <button type="button" class="btn-close ms-auto" data-bs-dismiss="modal"></button>
      
      <form action="{{ route('search') }}" method="GET" class="d-flex">
        <input type="text" name="ten_goi" class="form-control form-control-lg" placeholder="Nhập mã gói...">
        <button type="submit" class="btn btn-danger ms-2">Tìm</button>
      </form>
      
      <h6 class="fw-bold">Gợi ý tính năng</h6>
      <div class="d-flex gap-4 text-center my-3">
        <a href="{{ route('traTruoc') }}" class="text-decoration-none text-dark">
          <i class="fas fa-mobile-alt text-danger fs-3"></i>
          <div>Trả trước</div>
        </a>
        <a href="{{ route('traSau') }}" class="text-decoration-none text-dark">
          <i class="fas fa-phone-alt text-danger fs-3"></i>
          <div>Trả sau</div>
        </a>
        <a href="{{ route('onlydata') }}" class="text-decoration-none text-dark">
          <i class="fas fa-sim-card text-danger fs-3"></i>
          <div>Only Data</div>
        </a>
        <a href="{{ route('combo') }}" class="text-decoration-none text-dark">
          <i class="fas fa-layer-group text-danger fs-3"></i>
          <div>Combo</div>
        </a>
      </div>

      <!-- Từ khóa nổi bật -->
      <h6 class="fw-bold">Từ khóa nổi bật</h6>
      <div class="d-flex flex-wrap gap-2">
        <a href="#" class="badge bg-light text-dark text-decoration-none">5G10</a>
        <a href="#" class="badge bg-light text-dark text-decoration-none">12T5G125</a>
      </div>
    </div>
  </div>
</div>


<script>
  document.getElementById("openSearch").addEventListener("click", function () {
    let modal = new bootstrap.Modal(document.getElementById('searchModal'));
    modal.show();
  });
</script>

</body>
</html>