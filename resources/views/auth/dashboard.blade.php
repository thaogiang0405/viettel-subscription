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


    <!-- Your Custom Styles (always put at the end so they override defaults) -->
    <!-- <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet"> -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/dashboard.css" rel="stylesheet">
    

</head>

<body>

@include('auth.header')

<!-- Overlay (mặc định ẩn) -->
<!-- <div id="resultOverlay" style="display:none;">
  <div id="resultArea"></div>
</div> -->

<section class="banner-wrapper position-relative bg-light py-3">
  <div class="container">
    <div class="banner-box rounded overflow-hidden shadow-lg">
      <div class="swiper mySwiper">
        <div class="swiper-wrapper">
          <div class="swiper-slide">
            <img src="/images/bg1.jpg" alt="Ảnh 1" />
          </div>
          <div class="swiper-slide">
            <img src="/images/bg2.jpg" alt="Ảnh 2" />
          </div>
          <div class="swiper-slide">
            <img src="/images/bg3.jpg" alt="Ảnh 3" />
          </div>
        </div>

        <!-- Nút điều hướng và phân trang -->
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-pagination"></div>
      </div>
    </div>
  </div>
</section>

<div id="dv" class="container-xxl py-5">
  <div class="container"> 
    <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
      <h6 class="section-title bg-white text-center text-danger px-3">Dịch vụ Viettel</h6>
      <h1 class="mb-5section-title-custom text-center mb-4 wow fadeInUp">Lựa chọn gói cước phù hợp với bạn</h1>
    </div>
    <div class="row g-4">
      <!-- Trả Trước -->
      <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
        <div class="service-item rounded pt-3">
          <div class="p-4 text-center">
            <i class="fa fa-3x fa-money-bill-wave text-danger mb-3"></i>
            <a href="{{route('traTruoc')}}" style="text-decoration: none; color: inherit;">
              <h5>Trả Trước</h5>
              <p>Chủ động chi tiêu, không lo phát sinh</p>
            </a>
          </div>
        </div>
      </div>

      <!-- Trả Sau -->
      <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.6s">
        <div class="service-item rounded pt-3">
          <div class="p-4 text-center">
            <i class="fa fa-3x fa-file-invoice text-danger mb-3"></i>
            <a href="{{ route('traSau') }}" style="text-decoration: none; color: inherit;">
              <h5>Trả Sau</h5>
              <p>Sử dụng trước, thanh toán sau linh hoạt</p>
            </a>
          </div>
        </div>
      </div>

      <!-- Gói Chỉ Data -->
      <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
        <div class="service-item rounded pt-3">
          <div class="p-4 text-center">
            <i class="fa fa-3x fa-signal text-danger mb-3"></i>
            <a href="{{ route('onlydata') }}" style="text-decoration: none; color: inherit;">
              <h5>Gói Only Data</h5>
              <p>Dành riêng cho nhu cầu truy cập Internet</p>
            </a>
          </div>
        </div>
      </div>

      <!-- Gói Combo -->
      <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.8s">
        <div class="service-item rounded pt-3">
          <div class="p-4 text-center">
            <i class="fa fa-3x fa-box text-danger mb-3"></i>
            <a href="{{route('combo')}}" style="text-decoration: none; color: inherit;">
              <h5>Gói Combo</h5>
              <p>Gộp data, thoại, SMS – tiết kiệm toàn diện</p>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
    <div class="container">
   <h2 class="section-title-custom text-center mb-4 wow fadeInUp" data-wow-delay="0.1s">🔥 CÁC GÓI SIÊU HOT 5G 🔥</h2>

    <div class="row">

        {{-- Gói HOT Theo Ngày --}}
        <div class="col-md-3 mb-4 wow fadeInUp" data-wow-delay="0.3s">
            <div class="goi-card text-center">
                <div class="goi-label">HOT</div>
                <h5 class="goi-title">5G10</h5>
                <div class="goi-price">10.000đ</div>
                <p>Data: <span class="highlight">6GB/ngày</span></p>
                <p>Hạn dùng: <span class="highlight">1 ngày</span></p>
                <p>Soạn: <span class="highlight">DK 5G10</span> gửi <span class="highlight">191</span></p>
                <div class="d-flex justify-content-center gap-2">
                    <button class="btn-dangky" data-bs-toggle="modal" data-bs-target="#registerModal" 
                        data-id="5" data-goi="5G10">
                        Đăng ký
                    </button>  
                    <a href="{{ route('goi.show', 5) }}" class="btn-chitiet">CHI TIẾT</a>
                </div>
            </div>
        </div>

        {{-- Gói HOT Theo Tuần --}}
        <div class="col-md-3 mb-4 wow fadeInUp" data-wow-delay="0.4s">
            <div class="goi-card text-center">
                <div class="goi-label">HOT</div>
                <h5 class="goi-title">5G70</h5>
                <div class="goi-price">70.000đ</div>
                <p>Data: <span class="highlight">7GB/7 ngày</span></p>
                <p>Hạn dùng: <span class="highlight">7 ngày</span></p>
                <p>Soạn: <span class="highlight">DK 5G70</span> gửi <span class="highlight">191</span></p>
                <div class="d-flex justify-content-center gap-2">
                    <button class="btn-dangky" data-bs-toggle="modal" data-bs-target="#registerModal" 
                        data-id="7" data-goi="5G70">
                        Đăng ký
                    </button> 
                    <a href="{{ route('goi.show', ['id' => 7]) }}" class="btn-chitiet">CHI TIẾT</a>
                </div>
            </div>
        </div>

        {{-- Gói HOT Theo Tháng --}}
         <div class="col-md-3 mb-4">
            <div class="goi-card text-center">
                <div class="goi-label">HOT</div>
                <h5 class="goi-title">5G150N</h5>
                <div class="goi-price">150.000đ</div>
                <p>Data: <span class="highlight">8G/ngày</span> ⇒ 240GB/tháng</p>
                <p>Hạn dùng: <span class="highlight">30 ngày</span></p>
                <p>Soạn: <span class="highlight">5G150 DKV</span> gửi <span class="highlight">290</span></p>
                <div class="d-flex justify-content-center gap-2">
                    <button class="btn-dangky" data-bs-toggle="modal" data-bs-target="#registerModal" 
                        data-id="115" data-goi="5G150N">
                        Đăng ký
                    </button>  
                    <a href="{{ route('goi.show', ['id' => 115]) }}" class="btn-chitiet">CHI TIẾT</a>
                </div>
            </div>
        </div>

        {{-- Gói HOT Theo Năm --}}
        <div class="col-md-3 mb-4 wow fadeInUp" data-wow-delay="0.6s">
            <div class="goi-card text-center">
                <div class="goi-label">HOT</div>
                <h5 class="goi-title">12T5G125</h5>
                <div class="goi-price">1.500.000đ</div>
                <p>Data: <span class="highlight">200GB/tháng</span></p>
                <p>Hạn dùng: <span class="highlight">365 ngày</span></p>
                <p>Soạn: <span class="highlight">DK 12T5G125</span> gửi <span class="highlight">191</span></p>
                <div class="d-flex justify-content-center gap-2">
                    <button class="btn-dangky" data-bs-toggle="modal" data-bs-target="#registerModal" 
                        data-id="146" data-goi="12T5G125">
                        Đăng ký
                    </button>
                    <a href="{{ route('goi.show', ['id' => 146]) }}" class="btn-chitiet">CHI TIẾT</a>
                </div>
            </div>
        </div>

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
    var buttons = document.querySelectorAll(".btn-dangky");
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

<h1 class="section-title-custom text-center mb-4 wow fadeInUp" data-wow-delay="0.1s">CÁC GÓI PHỔ BIẾN</h1>
<div class="container py-3">
    <div class="row row-cols-1 row-cols-md-4 g-4">
         @foreach($goiPhoBien as $item)
            @php
                $goi = $item->goiCuoc;
            @endphp
            <div class="col wow fadeInUp">
                <div class="goi-box h-100 text-start p-4 bg-white rounded border position-relative shadow-sm">
                    <div class="goi-code fw-bold fs-5 mb-2 text-center position-relative">
                        {{ $goi->ma_goi }}
                        <img src="{{ asset('images/icon-blob.png') }}" alt="" 
                             class="position-absolute top-0 start-50 translate-middle-x" 
                             style="width: 40px; opacity: 0.1;">
                    </div>
                    <div class="goi-price text-danger fw-bold fs-4 text-center">
                        {{ number_format($goi->cuoc_phi, 0, ',', '.') }}đ 
                        <span class="fs-6 text-dark">/{{ $goi->chu_ky }} ngày</span>
                    </div>
                    <div class="goi-description mt-3 text-muted" style="min-height: 90px;">
                        {{ \Illuminate\Support\Str::limit($goi->uu_diem, 70, '...') }}
                    </div>
                    <div class="text-center mt-3">
                        <!-- Nút mở popup -->
                        <button class="btn btn-danger px-4 rounded-2 fw-bold btn-dangky"
                              data-bs-toggle="modal"
                              data-bs-target="#registerModal"
                              data-id="{{ $goi->id }}"
                              data-goi="{{ $goi->ten_goi }}">
                          Đăng ký
                      </button>

                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>


<h1 class="section-title-custom text-center mb-4 wow fadeInUp" data-wow-delay="0.1s">CÁC GÓI MỚI NHẤT</h1>
<div class="container py-3">
    <div class="row row-cols-1 row-cols-md-4 g-4">
         @foreach($goiMoi as $goi)
            <div class="col wow fadeInUp">
                <div class="goi-box h-100 text-start p-4 bg-white rounded border position-relative shadow-sm">
                    <div class="goi-code fw-bold fs-5 mb-2 text-center position-relative">
                        {{ $goi->ma_goi }}
                        <img src="{{ asset('images/icon-blob.png') }}" 
                             alt="" 
                             class="position-absolute top-0 start-50 translate-middle-x" 
                             style="width: 40px; opacity: 0.1;">
                    </div>
                    <div class="goi-price text-danger fw-bold fs-4 text-center">
                        {{ number_format($goi->cuoc_phi, 0, ',', '.') }}đ 
                        <span class="fs-6 text-dark">/{{ $goi->chu_ky }} ngày</span>
                    </div>
                    <div class="goi-description mt-3 text-muted" style="min-height: 90px;">
                        {{ \Illuminate\Support\Str::limit($goi->uu_diem, 70, '...') }}
                    </div>
                    
                    <div class="text-center mt-3">
                       <button class="btn btn-danger px-4 rounded-2 fw-bold btn-dangky"
                              data-bs-toggle="modal"
                              data-bs-target="#registerModal"
                              data-id="{{ $goi->id }}"
                              data-goi="{{ $goi->ten_goi }}">
                          Đăng ký
                      </button>

                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>




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
