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
#resultOverlay {
  position: fixed;
  top: 0;
  left: 0;
  width: 100vw;   /* full màn hình ngang */
  height: 100vh;  /* full màn hình dọc */
  background-color: rgba(0,0,0,0.5); /* nền mờ đen */
  display: flex;
  justify-content: center;
  align-items: center;
  z-index: 9999;  /* nổi lên trên hết */
}

#resultArea {
  background: white;
  border-radius: 12px;
  padding: 20px 25px;
  max-width: 400px;
  box-shadow: 0 5px 20px rgba(0,0,0,0.3);
  opacity: 0;
  transform: scale(0.8);
  transition: opacity 0.4s ease, transform 0.4s ease;
}

#resultArea.show {
  opacity: 1;
  transform: scale(1);
}

    .goi-card {
        background: linear-gradient(145deg, #ffffff, #f1f3f6);
        border-radius: 16px;
        padding: 20px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
        position: relative;
        transition: all 0.3s ease;
        border: 1px solid #eaeaea;
    }

    .goi-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.12);
    }

    .goi-label {
        position: absolute;
        top: -10px;
        right: -10px;
        background: #e63946;
        color: white;
        padding: 5px 10px;
        font-size: 12px;
        font-weight: bold;
        border-radius: 0 10px 0 10px;
        box-shadow: 0 2px 5px rgba(0,0,0,0.2);
    }

    .goi-title {
        font-size: 20px;
        font-weight: 700;
        color: #1d3557;
    }

    .goi-price {
        font-size: 18px;
        font-weight: 600;
        color: #457b9d;
        margin-bottom: 10px;
    }

    .highlight {
        color: #e76f51;
        font-weight: bold;
    }

    .btn-dangky,
    .btn-chitiet {
        padding: 6px 14px;
        border-radius: 8px;
        text-decoration: none;
        font-size: 14px;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .btn-dangky {
        background-color: #2a9d8f;
        color: white;
    }

    .btn-dangky:hover {
        background-color: #21867a;
    }

    .btn-chitiet {
        background-color: #f4a261;
        color: white;
    }

    .btn-chitiet:hover {
        background-color: #e07b39;
    }

.goi-box {
    transition: box-shadow 0.3s ease, transform 0.3s ease;
    border-bottom: 4px solid #e60023;
}
.goi-box:hover {
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
    transform: translateY(-4px);
}
.goi-code {
    position: relative;
    z-index: 1;
}


.btn-register {
  background-color: #d11a2a;
  color: white;
  padding: 10px 20px;
  border: none;
  border-radius: 8px;
  font-weight: 700;
  cursor: pointer;
  transition: background-color 0.3s ease, transform 0.2s ease;
  align-self: center;
  display: inline-block;
  text-decoration: none;
}

.btn-register:hover {
  background-color: #a3131f;
  transform: translateY(-1px);
}


</style>
</head>

<body>



@include('auth.header')

<!-- Overlay (mặc định ẩn) -->
<div id="resultOverlay" style="display:none;">
  <div id="resultArea"></div>
</div>

<section class="banner-wrapper position-relative">
  <div class="swiper mySwiper">
    <div class="swiper-wrapper">
      <div class="swiper-slide">
        <img src="/images/bg1.jpg" alt="Ảnh 1">
      </div>
      <div class="swiper-slide">
        <img src="/images/bg2.jpg" alt="Ảnh 2">
      </div>
      <div class="swiper-slide">
        <img src="/images/bg3.jpg" alt="Ảnh 3">
      </div>
    </div>

    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
    <div class="swiper-pagination"></div>
  </div>

  <!-- Di chuyển .banner-content ra ngoài .swiper -->
  <div class="banner-content text-center text-white">
    <h1 class="display-1 fw-bold">KẾT NỐI MỌI LÚC<br>TIẾT KIỆM MỌI NƠI</h1>
    <p class="fs-3 mb-4">
      Đăng ký nhanh các gói cước Viettel ngày, tháng, năm chỉ với vài cú click!
    </p>
    <div class="search-box mx-auto d-flex justify-content-center gap-2" style="max-width: 500px;">
  <input type="text" id="searchInput" class="form-control rounded-pill" placeholder="Nhập tên gói cước (VD: SD5, ST70...)">
  <button type="button" id="searchBtn" class="btn btn-danger rounded-pill px-5 fw-bold">Tìm gói</button>
</div>





  </div>
</section>




<script>
window.addEventListener("scroll", () => {
  const content = document.querySelector(".banner-content");
  const banner = document.querySelector(".banner-wrapper");

  if (window.scrollY > 50) {
    content.classList.add("hide");
    banner.classList.add("light");
  } else {
    content.classList.remove("hide");
    banner.classList.remove("light");
  }
});
</script>


 <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">       
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <img class="img-fluid w-100" src="/images/about.jpg" alt="">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <h6 class="section-title bg-white text-start text-danger pe-3">Về Viettel Telecom</h6>
                    <h1 class="mb-4">Chào mừng đến với <span class="text-danger">Viettel</span> – Kết nối mọi nhà</h1>
                    <p class="mb-4">Tại sao hàng triệu khách hàng tin chọn Viettel mỗi ngày?</p>
                    <div class="row gy-2 gx-4 mb-4">
						<div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-danger me-2"></i>Gói cước linh hoạt – Theo ngày, tuần, tháng, năm</p>
                        </div>
						<div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-danger me-2"></i>Tốc độ cao – Truy cập Internet mượt mà</p>
                        </div>
						<div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-danger me-2"></i>Giá cả hợp lý – Phù hợp mọi nhu cầu</p>
                        </div>
          
                        <div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-danger me-2"></i>Đăng ký dễ dàng chỉ với 1 cú click</p>
                        </div>
         
                        <div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-danger me-2"></i>Tặng thêm dung lượng – Khuyến mãi liên tục</p>
                        </div>
              <div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-danger me-2"></i>Đội ngũ hỗ trợ 24/7 – Luôn bên bạn</p>
                        </div>
						 <p class="mb-4"></p>
                        <p class="mb-4">
                                  Hãy chọn gói cước yêu thích và bắt đầu hành trình kết nối không giới hạn cùng Viettel ngay hôm nay!
                        </p>
						 
                    </div>
                    <a class="btn btn-danger py-3 px-5 mt-2" href="{{ route('about') }}">Tìm hiểu thêm</a>
                </div>
            </div>
        </div>
    </div>

<section class="content">
    <h2>Tin tức mới nhất</h2>
    <p>Thông tin mới nhất về công nghệ 5G, dịch vụ viễn thông và nhiều hơn nữa.</p>
    <p>Hãy theo dõi để không bỏ lỡ các chương trình khuyến mãi hấp dẫn.</p>
</section>

<div id="dv" class="container-xxl py-5">
  <div class="container">
    <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
      <h6 class="section-title bg-white text-center text-danger px-3">Dịch vụ Viettel</h6>
      <h1 class="mb-5">Lựa chọn gói cước phù hợp với bạn</h1>
    </div>
    <div class="row g-4">
      <!-- Gói Data Ngày
      <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
        <div class="service-item rounded pt-3">
          <div class="p-4 text-center">
            <i class="fa fa-3x fa-calendar-day text-danger mb-3"></i>
            <h5>Data Ngày</h5>
            <p>Lướt web mỗi ngày với giá siêu tiết kiệm</p>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.2s">
        <div class="service-item rounded pt-3">
          <div class="p-4 text-center">
            <i class="fa fa-3x fa-calendar-week text-danger mb-3"></i>
            <h5>Data Tuần</h5>
            <p>Truy cập Internet ổn định cả tuần</p>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
        <div class="service-item rounded pt-3">
          <div class="p-4 text-center">
            <i class="fa fa-3x fa-calendar-alt text-danger mb-3"></i>
            <h5>Data Tháng</h5>
            <p>Gói cước phổ biến, nhiều ưu đãi hấp dẫn</p>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.4s">
        <div class="service-item rounded pt-3">
          <div class="p-4 text-center">
            <i class="fa fa-3x fa-calendar text-danger mb-3"></i>
            <h5>Data Năm</h5>
            <p>Dung lượng khủng, dùng xuyên suốt cả năm</p>
          </div>
        </div>
      </div> -->

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
        <h2 class="text-center mb-4">🔥 CÁC GÓI DATA HOT VIETTEL 🔥</h2>
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

        {{-- Gói HOT Theo Tháng --}}
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

<div class="container py-5">
    <h2 class="text-center mb-5">🔥 CÁC GÓI DATA HOT VIETTEL 🔥</h2>
    <div class="row g-4">

      <!-- Gói theo ngày -->
      <div class="col-md-3 wow fadeInUp" data-wow-delay="0.1s">
        <div class="goi-card text-center">
          <div class="goi-label">HOT</div>
          <h5 class="goi-title">SD5</h5>
          <div class="goi-price">5.000đ</div>
          <p>📶 Data: <span class="highlight">500MB/ngày</span></p>
          <p>⏳ Hạn dùng: <span class="highlight">1 ngày</span></p>
          <p>Soạn: <span class="highlight">SD5 MO</span> gửi <span class="highlight">191</span></p>
          <div class="d-flex justify-content-center gap-2">
            <form action="{{ route('register.package', ['id' => 1]) }}" method="POST">
              @csrf
              <button type="submit"  class="btn-dangky">Đăng ký</button>
            </form>
              <a href="{{ route('goi.show', ['id' => 1]) }}"class="btn-chitiet">CHI TIẾT</a>
          </div>
        </div>
      </div>

      <!-- Gói theo tuần -->
      <div class="col-md-3 wow fadeInUp" data-wow-delay="0.2s">
        <div class="goi-card text-center">
          <div class="goi-label">HOT</div>
          <h5 class="goi-title">ST50</h5>
          <div class="goi-price">50.000đ</div>
          <p>📶 Data: <span class="highlight">7GB/7 ngày</span></p>
          <p>⏳ Hạn dùng: <span class="highlight">7 ngày</span></p>
          <p>Soạn: <span class="highlight">ST50 MO</span> gửi <span class="highlight">191</span></p>
          <div class="d-flex justify-content-center gap-2">
            <form action="{{ route('register.package', ['id' => 2]) }}" method="POST">
                        @csrf
                        <button type="submit"  class="btn-dangky">Đăng ký</button>
                      </form>
                    <a href="{{ route('goi.show', ['id' => 2]) }}"class="btn-chitiet">CHI TIẾT</a>

                </div>
        </div>
      </div>

      <!-- Gói theo tháng -->
      <div class="col-md-3 wow fadeInUp" data-wow-delay="0.3s">
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

      <!-- Gói theo năm -->
      <div class="col-md-3 wow fadeInUp" data-wow-delay="0.4s">
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
