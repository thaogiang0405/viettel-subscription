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
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
    

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
      <h1 class="mb-5">Lựa chọn gói cước phù hợp với bạn</h1>
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
        <h2 class="text-center mb-4">🔥 CÁC GÓI SIÊU HOT 5G 🔥</h2>
        <div class="row">

          <div class="row">

        {{-- Gói HOT Theo Ngày --}}
        <div class="col-md-3 mb-4">
            <div class="goi-card text-center">
                <div class="goi-label">HOT</div>
                <h5 class="goi-title">ST5K</h5>
                <div class="goi-price">5.000đ</div>
                <p>📶 Data: <span class="highlight">500MB/ngày</span></p>
                <p>⏳ Hạn dùng: <span class="highlight">1 ngày</span></p>
                <p>Soạn: <span class="highlight">ST5K MO</span> gửi <span class="highlight">191</span></p>
                <div class="d-flex justify-content-center gap-2">
                    <form action="{{ route('register.package', ['id' => 1]) }}" method="POST">
                        @csrf
                        <button type="submit"  class="btn-dangky">Đăng ký</button>
                      </form>
                    <a href="{{ route('goi.show', 1) }}" class="btn-chitiet">CHI TIẾT</a>

                </div>
            </div>
        </div>

        {{-- Gói HOT Theo Tuần --}}
        <div class="col-md-3 mb-4">
            <div class="goi-card text-center">
                <div class="goi-label">HOT</div>
                <h5 class="goi-title">ST30K</h5>
                <div class="goi-price">50.000đ</div>
                <p>📶 Data: <span class="highlight">7GB/7 ngày</span></p>
                <p>⏳ Hạn dùng: <span class="highlight">7 ngày</span></p>
                <p>Soạn: <span class="highlight">ST30K MO</span> gửi <span class="highlight">191</span></p>
                <div class="d-flex justify-content-center gap-2">
                    <form action="{{ route('register.package', ['id' => 2]) }}" method="POST">
                        @csrf
                        <button type="submit"  class="btn-dangky">Đăng ký</button>
                      </form>
                    <a href="{{ route('goi.show', ['id' => 2]) }}"class="btn-chitiet">CHI TIẾT</a>

                </div>
            </div>
        </div>

        {{-- Gói HOT Theo Tháng gg --}}
        <div class="col-md-3 mb-4">
            <div class="goi-card text-center">
                <div class="goi-label">HOT</div>
                <h5 class="goi-title">SD135</h5>
                <div class="goi-price">135.000đ</div>
                <p>📶 Data: <span class="highlight">5GB/ngày</span> ⇒ 150GB/tháng</p>
                <p>⏳ Hạn dùng: <span class="highlight">30 ngày</span></p>
                <p>Soạn: <span class="highlight">SD135 MO</span> gửi <span class="highlight">191</span></p>
                <div class="d-flex justify-content-center gap-2">
                    <form action="{{ route('register.package', ['id' => 3]) }}" method="POST">
                        @csrf
                        <button type="submit"  class="btn-dangky">Đăng ký</button>
                      </form>
                    <a href="{{ route('goi.show', ['id' => 3]) }}"class="btn-chitiet">CHI TIẾT</a>

                </div>
            </div>
        </div>

        {{-- Gói HOT Theo Năm --}}
        <div class="col-md-3 mb-4">
            <div class="goi-card text-center">
                <div class="goi-label">HOT</div>
                <h5 class="goi-title">SN1200</h5>
                <div class="goi-price">1.200.000đ</div>
                <p>📶 Data: <span class="highlight">1500GB</span></p>
                <p>⏳ Hạn dùng: <span class="highlight">365 ngày</span></p>
                <p>Soạn: <span class="highlight">SN1200 MO</span> gửi <span class="highlight">191</span></p>
                <div class="d-flex justify-content-center gap-2">
                  <form action="{{ route('register.package', ['id' => 4]) }}" method="POST">
                        @csrf
                        <button type="submit"  class="btn-dangky">Đăng ký</button>
                      </form>
                    <a href="{{ route('goi.show', ['id' => 4]) }}"class="btn-chitiet">CHI TIẾT</a>

                </div>
            </div>
        </div>

    </div>

    </div>
</div>

<h1 style="text-align:center">Các gói phổ biến </h1>
<div class="container py-5">
    <div class="row row-cols-1 row-cols-md-4 g-4">
        @foreach($goiPhoBien as $item)
            @php
                $goi = $item->goiCuoc;
            @endphp
            <div class="col">
                <div class="goi-box h-100 text-start p-4 bg-white rounded border position-relative shadow-sm">
                    <div class="goi-code fw-bold fs-5 mb-2 text-center position-relative">
                        {{ $goi->ma_goi }}
                        <img src="{{ asset('images/icon-blob.png') }}" alt="" class="position-absolute top-0 start-50 translate-middle-x" style="width: 40px; opacity: 0.1;">
                    </div>
                    <div class="goi-price text-danger fw-bold fs-4 text-center">
                        {{ number_format($goi->cuoc_phi, 0, ',', '.') }}đ 
                        <span class="fs-6 text-dark">/{{ $goi->chu_ky }} ngày</span>
                    </div>
                    <div class="goi-description mt-3 text-muted" style="min-height: 90px;">
                        {{ \Illuminate\Support\Str::limit($goi->uu_diem, 70, '...') }}
                    </div>
                    <div class="text-center mt-3">
                        <form action="{{ route('register.package', ['id' => $goi->id]) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger px-4 rounded-2 fw-bold">Đăng ký</button>
                      </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<h1 style="text-align:center">Các gói mới nhất</h1>
<div class="container py-5">
    <div class="row row-cols-1 row-cols-md-4 g-4">
        @foreach($goiMoi as $goi)
            <div class="col">
                <div class="goi-box h-100 text-start p-4 bg-white rounded border position-relative shadow-sm">
                    <div class="goi-code fw-bold fs-5 mb-2 text-center position-relative">
                        {{ $goi->ma_goi }}
                        <img src="{{ asset('images/icon-blob.png') }}" alt="" class="position-absolute top-0 start-50 translate-middle-x" style="width: 40px; opacity: 0.1;">
                    </div>
                    <div class="goi-price text-danger fw-bold fs-4 text-center">
                        {{ number_format($goi->cuoc_phi, 0, ',', '.') }}đ 
                        <span class="fs-6 text-dark">/{{ $goi->chu_ky }} ngày</span>
                    </div>
                    <div class="goi-description mt-3 text-muted" style="min-height: 90px;">
                        {{ \Illuminate\Support\Str::limit($goi->uu_diem, 70, '...') }}
                    </div>
                    
                    <div class="text-center mt-3">
                        <form action="{{ route('register.package', ['id' => $goi->id]) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger px-4 rounded-2 fw-bold">Đăng ký</button>
                      </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>


<!-- Testimonial Start -->
<div id="dg" class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container">
        <div class="text-center">
            <h6 class="section-title bg-white text-center text-danger px-3">Đánh giá</h6>
            <h1 class="mb-5">Khách hàng nói gì về Viettel?</h1>
        </div>
        <div class="owl-carousel testimonial-carousel position-relative">
            <div class="testimonial-item bg-white text-center border p-4">
                <img class="bg-white rounded-circle shadow p-1 mx-auto mb-3" src="images/testimonial-3.jpg" style="width: 80px; height: 80px;">
                <h5 class="mb-0">Khánh Lê</h5>
                <p>Đà Nẵng, Việt Nam</p>
                <p class="mb-0">Tôi đã dùng nhiều nhà mạng, nhưng Viettel vẫn là ổn định nhất. Giao diện đăng ký gói rất dễ dùng và tiện lợi.</p>
            </div>
            <div class="testimonial-item bg-white text-center border p-4">
                <img class="bg-white rounded-circle shadow p-1 mx-auto mb-3" src="images/testimonial-2.jpg" style="width: 80px; height: 80px;">
                <h5 class="mb-0">Mỹ Dung</h5>
                <p>Quảng Bình, Việt Nam</p>
                <p class="mt-2 mb-0">Gói combo của Viettel rất tiện – vừa gọi, vừa lướt web thoải mái. Đăng ký chỉ mất vài giây.</p>
            </div>
            <div class="testimonial-item bg-white text-center border p-4">
                <img class="bg-white rounded-circle shadow p-1 mx-auto mb-3" src="images/testimonial-1.jpg" style="width: 80px; height: 80px;">
                <h5 class="mb-0">Thảo Giang</h5>
                <p>Quảng Nam, Việt Nam</p>
                <p class="mt-2 mb-0">Tôi đăng ký gói tháng mỗi khi đi công tác, tốc độ mạng ổn định và giá rẻ hơn mong đợi.</p>
            </div>
            <div class="testimonial-item bg-white text-center border p-4">
                <img class="bg-white rounded-circle shadow p-1 mx-auto mb-3" src="images/testimonial-4.jpg" style="width: 80px; height: 80px;">
                <h5 class="mb-0">Nhất Phương</h5>
                <p>Huế, Việt Nam</p>
                <p class="mt-2 mb-0">Mình thích sự hỗ trợ 24/7 và những chương trình khuyến mãi hấp dẫn. Viettel quá tuyệt vời!</p>
            </div>
            <div class="testimonial-item bg-white text-center border p-4">
                <img class="bg-white rounded-circle shadow p-1 mx-auto mb-3" src="images/testimonial-5.jpg" style="width: 80px; height: 80px;">
                <h5 class="mb-0">Thu Trang</h5>
                <p>Quảng Nam, Việt Nam</p>
                <p class="mb-0">Dịch vụ của Viettel rất đáng tin cậy. Mình đăng ký gói combo data cho cả gia đình, vừa tiết kiệm vừa tiện lợi.</p>
            </div>

        </div>
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

