<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Danh sách gói cước Trả Sau</title>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@600&display=swap');


    .intro-section {
      max-width: 1200px;   /* cùng độ rộng với .package-list */
      margin: 0 auto 30px auto;
      padding: 0 20px;
      color: #070606;
      font-size: 16px;
      line-height: 1.5;
    }

    .intro-section h2 {
      font-family: 'Montserrat', sans-serif;
      font-weight: 700;
      margin-bottom: 10px;
      color: #b30000;
}


    body {
      font-family: Arial, sans-serif;
      background: #fffafa;
      margin: 0;
      padding: 20px;
      color: #8b0000;
      animation: fadeIn 1s ease-in-out;
    }

    h1 {
      text-align: center;
      color: #b30000;
      margin: 40px 0 30px;
      font-family: 'Montserrat', sans-serif;
      font-weight: 700;
      font-size: 28px;
    }

    .header-image {
      background: url('your_image_url_here.jpg') no-repeat center center; /* Thay đổi URL ở đây */
      background-size: cover;
      height: 200px; /* Bạn có thể điều chỉnh chiều cao */
      border-radius: 16px;
      box-shadow: 0 8px 16px rgba(0, 0, 0, 0.07);
      margin-bottom: 25px;
    }

    .package-list {
  display: grid;
  grid-template-columns: repeat(4, 1fr); /* 4 cột */
  gap: 25px;
  max-width: 1200px;
  margin: 0 auto;
}


    .package-card {
      background: #fff;
      border-radius: 16px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.08);
      display: flex;
      flex-direction: column;
      overflow: hidden;
      animation: fadeInUp 0.6s ease forwards;
      opacity: 0;
      transform: translateY(30px);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    @keyframes fadeInUp {
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

    .package-card:hover {
      transform: scale(1.03);
      box-shadow: 0 12px 25px rgba(0, 0, 0, 0.12);
    }

    .package-header {
      background-image: url('../images/hotpackage.svg' );
      color: white;
      font-family: 'Montserrat', sans-serif;
      font-weight: 600;
      font-size: 20px;
      padding: 16px;
      text-align: center;
      letter-spacing: 1px;
    }

    .package-body {
      padding: 20px;
      flex-grow: 1;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
    }

    .package-price {
      font-size: 24px;
      font-weight: 700;
      margin: 10px 0 5px;
      color: #d91035;
      text-align: center;
    }

    .package-cycle {
      font-size: 14px;
      color: #666;
      text-align: center;
      margin-bottom: 15px;
    }

    .package-description {
      font-size: 14px;
      color: #333;
      line-height: 1.5;
      margin-bottom: 20px;
      min-height: 60px;
      text-align: justify;
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

    /* Animation xuất hiện */
    @keyframes fadeInScale {
      to {
        opacity: 1;
        transform: scale(1);
      }
    }

    /* Responsive: Giới thiệu nhỏ lại */
    @media (max-width: 768px) {
      h1 {
        font-size: 22px;
      }
      .package-header {
        font-size: 18px;
      }
      .package-price {
        font-size: 20px;
      }
    }

    @media (max-width: 900px) {
      .package-list {
        grid-template-columns: repeat(2, 1fr); 
      }
    }
    @media (max-width: 600px) {
      .package-list {
        grid-template-columns: 1fr;
      }
    }

  </style>
</head>
<body>

@include('auth.header')

<section class="intro-section">
  <br><br>
  <h2>Giới thiệu</h2>
  <p>
    Các gói cước Trả Sau Viettel được thiết kế linh hoạt phù hợp với nhu cầu sử dụng internet và liên lạc của cá nhân và doanh nghiệp.
    Bạn sẽ được sử dụng dịch vụ với chất lượng cao, cước phí hợp lý và nhiều ưu đãi hấp dẫn như miễn phí phút gọi, dung lượng data lớn, tích hợp các dịch vụ giải trí như MCA, TV360, Mybox.
  </p>
  <p>
    Hãy lựa chọn gói phù hợp với nhu cầu sử dụng của bạn và đăng ký ngay để trải nghiệm dịch vụ chất lượng từ Viettel.
  </p>
</section>

<h1>Danh sách gói cước Trả Sau Viettel</h1><br><br>

<div class="package-list">
<div class="header-image" style="background-image: url('/images/goi-cuoc-viettel-thang-5-2025.webp');"><br><br><br><br><br><br><br><br><br><br><h3>Các gói cước ưu đãi Viettel</h3></div>
  @foreach($goiCuoc as $index => $goi)
    <div class="package-card" style="animation-delay: {{ $index * 0.15 }}s;">
      <div class="package-header">{{ $goi->ma_goi }} - {{ $goi->ten_goi }}</div>
      <div class="package-body">
        <div class="package-price">{{ number_format($goi->cuoc_phi, 0, ',', '.') }} VNĐ</div>
        <div class="package-cycle">Chu kỳ: {{ $goi->chu_ky }} ngày</div>
        <div class="package-description">{!! nl2br(e($goi->mo_ta)) !!}</div>
        <button class="btn btn-danger px-4 rounded-2 fw-bold btn-dangky" data-bs-toggle="modal"
             data-bs-target="#registerModal"  data-id="{{ $goi->id }}" data-goi="{{ $goi->ten_goi }}">Đăng ký
          </button>
      </div>
    </div>
  @endforeach
  @if(count($goiCuoc) == 0)
    <p style="text-align:center; width: 100%; color: #a00; font-weight: bold;">
      Không có gói trả sau nào.
    </p>
  @endif
</div>

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

@include('auth.footer')
</body>
</html>