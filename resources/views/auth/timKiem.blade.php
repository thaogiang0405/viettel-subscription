<!DOCTYPE html>
<html lang="vi">
    <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard TL SOHU</title>

    <!-- Favicon -->
    <link rel="icon" href="img/favicon.ico">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">

    <!-- Bootstrap core -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Icon Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries -->
    <link href="{{ asset('lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" rel="stylesheet" />

    <!-- Template Styles -->
    <link href="css/style.css" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <!-- Your Custom Styles (always put at the end so they override defaults) -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/dashboard.css" rel="stylesheet">
    
  <style>
.card-custom {
  max-width: 320px;
  background-color: #d7132a; /* đỏ đậm */
  border-radius: 20px;
  color: white;
  padding: 25px 20px;
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  box-shadow: 0 10px 25px rgb(215 19 42 / 0.4);
  margin: 0 auto;
  text-align: center;
}

.card-custom h2 {
  font-weight: 700;
  font-size: 1.4rem;
  margin-bottom: 15px;
}

.card-into {
  background-color: white;
  border-radius: 15px;
  width: 100%;
  padding: 20px;
  box-sizing: border-box;
  color: #333;
  margin-bottom: 15px;
  text-align: left;
}
.card-custom .price {
  font-weight: 900;
  font-size: 2rem;
  margin-bottom: 8px;
}

.card-custom .cycle {
  font-weight: 500;
  font-size: 1rem;
  margin-bottom: 15px;
  color: #f0cbd2;
} 
.card-custom .description {
  font-weight: 400;
  font-size: 0.9rem;
  line-height: 1.4;
  color: #555; /* đổi màu cho dễ đọc */
  margin-bottom: 25px;
  text-align: left;
  white-space: pre-line;
}

.btn-register-custom {
  background-color: #d7132a;
  border: none;
  border-radius: 10px;
  padding: 12px 0;
  font-weight: 800;
  font-size: 1rem;
  color: white;
  width: 100%;
  cursor: pointer;
  box-shadow: 0 5px 15px rgb(215 19 42 / 0.6);
  transition: background-color 0.3s ease;
}

.btn-register-custom:hover {
  background-color: #a50f21;
}
#overlay {
  position: fixed;
  inset: 0;
  background: rgba(0,0,0,0.5);
  display: none;
  z-index: 9999;
  justify-content: flex-end;
}

/* panel trượt */
#slidePanel {
  background: #fff;
  width: 400px;
  max-width: 100%;
  height: 100%;
  overflow-y: auto;
  transform: translateX(100%);
  transition: transform 0.3s ease-in-out;
  position: relative;
  box-shadow: -2px 0 10px rgba(0,0,0,0.2);
}

.input-group .form-control {
  border-radius: 10px 0 0 10px;
}

.input-group .btn {
  border-radius: 0 10px 10px 0;
}


#overlay.active { display: flex; }
#slidePanel.active { transform: translateX(0); }
</style>
</head>

<body>

@include('auth.header')

<div class="container mb-4">
  <br><br>
  <h5 class="fw-bold mb-3">KẾT QUẢ TÌM KIẾM</h5>
  <form action="{{ route('search') }}" method="GET" class="d-flex">
        <input type="text" name="ten_goi" class="form-control form-control-lg" placeholder="Nhập mã gói...">
        <button type="submit" class="btn btn-danger ms-2">Tìm</button>
      </form>      
</div>

<div id="overlay">
  <div id="slidePanel">
      <button onclick="closeModal()" class="btn-close position-absolute top-0 end-0 m-3"></button>
      <div id="modalContent" class="p-4"></div>
  </div>
</div>
<div id="dv" class="container-xxl py-5">

    <div class="container">
   <h2 class="section-title-custom text-center mb-3 wow fadeInUp" data-wow-delay="0.1s">Gói cước di động</h2>

    <div class="row">

    @if(isset($goi) && $goi->isNotEmpty())
   @foreach($goi as $item)
<div class="col-md-3 mb-4 wow fadeInUp" data-wow-delay="0.3s">
    <div class="goi-card text-center">
        <h5 class="goi-title">{{ $item->ma_goi }}</h5>
        <div class="goi-price">{{ number_format($item->cuoc_phi) }}đ</div>

        <p>Data: <span class="highlight">{{ $item->dung_luong }}</span></p>
        <p>Hạn dùng: <span class="highlight">{{ $item->chu_ky }}</span></p>
        <p>Soạn: <span class="highlight">DK {{ $item->ma_goi }}</span> gửi <span class="highlight">191</span></p>

        <!-- Nút hành động -->
        <div class="d-flex justify-content-center gap-2">
            <button class="btn-dangky" 
                data-bs-toggle="modal" 
                data-bs-target="#registerModal" 
                data-id="{{ $item->id }}" 
                data-goi="{{ $item->ma_goi }}">
                Đăng ký
            </button>  
            <div class="d-flex justify-content-center gap-2">
          <button class="btn btn-danger"
              onclick="openModal({{ $item->id }})">
              Chi tiết
          </button>
      </div>
        </div>

    </div>
</div>
@endforeach

@else
    <p>Không tìm thấy gói cước nào chứa: {{ request('ten_goi') }}</p>
@endif
        

    </div>
</div>

{{-- Modal Đăng ký --}}
<div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form method="POST" action="{{ route('register.package') }}">
        @csrf
        <input type="hidden" name="goi_cuoc_id" id="goiCuocId">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Xác nhận đăng ký gói <span id="goiTen"></span></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Đóng"></button>
          </div>
          <div class="modal-body">
              <div class="mb-3">
                  <label for="fullname" class="form-label">Họ và tên</label>
                  <input type="text" class="form-control" id="fullname" name="fullname" required>
              </div>
              <div class="mb-3">
                  <label for="phone" class="form-label">Số điện thoại</label>
                  <input type="text" class="form-control" id="phone" name="phone" required>
              </div>
              <div class="mb-3">
                  <label for="email" class="form-label">Email</label>
                  <input type="email" class="form-control" id="email" name="email" required>
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
            <button type="submit" class="btn btn-viettel" style ="background-color: #EE0033; border: none; color: #fff; ">Đồng ý</button>

          </div>
        </div>
    </form>
  </div>
</div>

{{-- Script --}}
<script>
document.addEventListener("DOMContentLoaded", function() {
    var buttons = document.querySelectorAll(".btn-dangky, .btn-register-custom");
    var goiTenSpan = document.getElementById("goiTen");
    var goiCuocIdInput = document.getElementById("goiCuocId");

    buttons.forEach(function(btn) {
        btn.addEventListener("click", function() {
            var id = this.getAttribute("data-id");
            var goi = this.getAttribute("data-goi");
            goiTenSpan.textContent = goi;
            goiCuocIdInput.value = id;
        });
    });
});

</script>


<!-- Overlay slide panel -->
<div id="overlay" class="fixed inset-0 bg-black bg-opacity-50 hidden z-[9999] flex justify-end">
  <div id="slidePanel"
       class="bg-white w-full max-w-lg p-6 h-full overflow-auto transform translate-x-full transition-transform duration-300 relative">
      <button onclick="closeModal()" class="absolute top-2 right-4 text-gray-600 hover:text-red-600 text-3xl font-bold">&times;</button>
      <div id="modalContent"></div>
  </div>
</div>

<script>
  const data = @json($goi);

  function openModal(id) {
    const g = data.find(item => item.id === id);
    if (!g) return;

    const html = `
      <h3 class="fw-bold text-danger text-center mb-3">${g.ma_goi}</h3>
      <table class="table table-bordered">
        <tr><th>Tên gói</th><td>${g.ten_goi || g.ma_goi}</td></tr>
        <tr><th>Dung lượng</th><td>${g.dung_luong}</td></tr>
        <tr><th>Chu kỳ</th><td>${g.chu_ky || '30 ngày'}</td></tr>
        <tr><th>Mô tả</th><td>${g.mo_ta || ''}</td></tr>
        <tr><th>eSIM</th><td>${g.co_esim ? 'Có' : 'Không'}</td></tr>
        <tr><th>Phí</th><td>${Number(g.cuoc_phi).toLocaleString()}đ</td></tr>
        <tr><th>Ưu điểm</th><td>${g.uu_diem || ''}</td></tr>
      </table>
    `;
    document.getElementById('modalContent').innerHTML = html;
    document.getElementById('overlay').classList.add('active');
    document.getElementById('slidePanel').classList.add('active');
  }

  function closeModal() {
    document.getElementById('slidePanel').classList.remove('active');
    setTimeout(() => {
      document.getElementById('overlay').classList.remove('active');
    }, 300);
  }
</script>

@include('auth.footer')
<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
  const swiper = new Swiper(".mySwiper", {
    loop: true,
    autoplay: {
      delay: 4000,
      disableOnInteraction: false,
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
  });
</script>
<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('lib/wow/wow.min.js') }}"></script>
<script src="{{ asset('lib/easing/easing.min.js') }}"></script>
<script src="{{ asset('lib/waypoints/waypoints.min.js') }}"></script>
<script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>
<script src="{{ asset('lib/tempusdominus/js/moment.min.js') }}"></script>
<script src="{{ asset('lib/tempusdominus/js/moment-timezone.min.js') }}"></script>
<script src="{{ asset('lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}"></script>

<!-- Template Javascript -->
<script src="{{ asset('js/main.js') }}"></script>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $('#searchBtn').on('click', function () {
  const tenGoi = $('#searchInput').val().trim();

  if (tenGoi === '') {
    showResult('<div class="alert alert-warning">Vui lòng nhập tên gói cước.</div>');
    return;
  }

  $.ajax({
    url: "{{ route('tim-goi') }}",
    type: "GET",
    data: { ten_goi: tenGoi },
    success: function (response) {
      showResult(response.html);
    },
    error: function () {
      showResult('<div class="alert alert-danger">Có lỗi xảy ra.</div>');
    }
  });
});

function showResult(html) {
  $('#resultArea').removeClass('show').html(html);
  $('#resultOverlay').fadeIn(200, function() {
    setTimeout(() => {
      $('#resultArea').addClass('show');
    }, 10);
  });
}

// Thêm nút đóng popup (bạn cần thêm vào html hoặc js)
$('#resultOverlay').on('click', function(e) {
  if (e.target.id === 'resultOverlay') { // click ngoài box mới đóng
    $('#resultArea').removeClass('show');
    $('#resultOverlay').fadeOut(200);
  }
});

</script>

@if(session('success'))
  <div id="success-message" style="
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    max-width: 400px;
    padding: 20px 30px;
    background-color: #d4edda;
    color: #155724;
    border: 1px solid #c3e6cb;
    border-radius: 8px;
    font-weight: 600;
    text-align: center;
    box-shadow: 0 4px 12px rgba(0,0,0,0.15);
    z-index: 9999;
    opacity: 1;
    transition: opacity 0.5s ease;
  ">
    {{ session('success') }}
  </div>

  <script>
    setTimeout(function() {
      const msg = document.getElementById('success-message');
      if(msg) {
        msg.style.opacity = '0';
        setTimeout(() => msg.remove(), 500);
      }
    }, 3000);
  </script>
@endif

</body>
</html>
