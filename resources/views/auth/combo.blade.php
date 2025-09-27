<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Danh sách gói cước Only Data Viettel</title>
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
    /* Vùng bao bảng */
    .v-table {
  width: 100%;
  border-collapse: collapse;
  background: #fff;
  border-radius: 8px;
  overflow: hidden;
  table-layout: fixed; /* Chia đúng tỷ lệ width */
  box-shadow: 0 4px 12px rgba(0,0,0,0.08);
}

.v-table th, 
.v-table td {
  border: 1px solid #eee;
  padding: clamp(8px, 1.2vw, 12px);
  font-size: clamp(12px, 1.5vw, 14px);
  text-align: center;
  vertical-align: middle;
  word-wrap: break-word;
}

.table-wrap {
  width: 100%;              /* chỉ chiếm 90% màn hình */
  max-width: 1100px;       /* không vượt quá 1000px */
  margin: 0 auto 30px;     /* căn giữa */
  overflow-x: auto;
  -webkit-overflow-scrolling: touch;
}


/* Bảng chính */
.v-table {
  width: 100%;
  border-collapse: collapse;
  background: #fff;
  border-radius: 8px;
  overflow: hidden;
  table-layout: fixed;
  box-shadow: 0 4px 12px rgba(0,0,0,0.08);
}

/* Ô bảng */
.v-table th,
.v-table td {
  border: 1px solid #eee;
  padding: clamp(8px, 1.2vw, 12px);
  font-size: clamp(12px, 1.5vw, 14px);
  text-align: center;
  vertical-align: middle;
  word-wrap: break-word;
}

/* Header */
.v-table thead th {
  background: #d11a2a;
  color: #fff;
  font-weight: 600;
}

/* Ưu đãi giới hạn 3 dòng */
.v-uu-dai {
  display: -webkit-box;
  -webkit-line-clamp: 3;
  -webkit-box-orient: vertical;
  overflow: hidden;
}

/* Giá + Chu kỳ */
.v-price { font-weight: 700; color: #b30000; display: inline; }
.v-cycle { color: #666; display: inline; }

/* Nút đăng ký */
.btn-register {
  background: #d11a2a;
  color: #fff;
  padding: 6px 14px;
  border: none;
  border-radius: 6px;
  cursor: pointer;
  font-weight: 700;
}
.btn-register:hover { background: #b30000; }

.bang-goi {
  margin-left: clamp(8px, 4vw, 50px);
  margin-right: clamp(8px, 4vw, 50px);
}

/* Mobile */
@media (max-width: 600px) {
  .v-table { min-width: 700px; }

  .v-price { display: block; }
  .v-cycle { display: block; margin-top: 2px; }

  .v-table th, .v-table td {
    padding: 8px 6px;
    font-size: 12px;
  }
}

  </style>
</head>
<body>

  @include('auth.header')
  <div style="height: 50px;"></div> <!-- khoảng đệm header -->

  @if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif
<div class="bang-goi">
{{-- Gói ngắn ngày --}}
<div class="table-wrap">
  <h3>Gói ngắn ngày</h3>
  <table class="v-table">
    <thead>
      <tr>
        <th style="width: 12%;">Tên gói</th>
        <th style="width: 16%;">Dung lượng (GB)</th>
        <th style="width: 12%;">Giá cước</th>
        <th style="width: 30%;">Ưu đãi</th>
        <th style="width: 10%;">Phí bảo hành</th>
        <th style="width: 10%;">Đăng ký</th>
      </tr>
    </thead>
    <tbody>
      @forelse($nganNgayC as $goi)
      <tr>
        <td>{{ $goi->ten_goi }}</td>
        <td>{{ $goi->dung_luong }}</td>
        <td>
          <span class="v-price">{{ number_format($goi->cuoc_phi, 0, ',', '.') }}đ</span>
          <span class="v-cycle">/{{ $goi->chu_ky }} ngày</span>
        </td>
        <td class="v-uu-dai">
          @php
            $uuDiem = $goi->uu_diem;
            echo (strlen($uuDiem) > 300) ? substr($uuDiem, 0, 300) . '...' : $uuDiem;
          @endphp
        </td>
        <td>{{ $goi->pbh }}</td>
        <td>
         <button class="btn btn-danger fw-bold rounded-2 btn-dangky" data-bs-toggle="modal"
             data-bs-target="#registerModal"  data-id="{{ $goi->id }}" data-goi="{{ $goi->ten_goi }}">Đăng ký
          </button>
        </td>
      </tr>
      @empty
      <tr><td colspan="7">Không có gói ngắn ngày</td></tr>
      @endforelse
    </tbody>
  </table>
</div>

{{-- Gói tháng --}}
<div class="table-wrap">
  <h3>Gói tháng</h3>
  <table class="v-table">
    <thead>
      <tr>
        <th style="width: 12%;">Tên gói</th>
    <th style="width: 16%;">Dung lượng (GB)</th>
    <th style="width: 12%;">Giá cước</th>
    <th style="width: 30%;">Ưu đãi</th>
    <th style="width: 10%;">Phí bảo hành</th>
    <th style="width: 10%;">Đăng ký</th>
      </tr>
    </thead>
    <tbody>
      @forelse($goiThangC as $goi)
      <tr>
        <td>{{ $goi->ten_goi }}</td>
        <td>{{ $goi->dung_luong }}</td>
        <td>
          <span class="v-price">{{ number_format($goi->cuoc_phi, 0, ',', '.') }}đ</span>
          <span class="v-cycle">/{{ $goi->chu_ky }} ngày</span>
        </td>
        <td class="v-uu-dai">
          @php
            $uuDiem = $goi->uu_diem;
            echo (strlen($uuDiem) > 300) ? substr($uuDiem, 0, 300) . '...' : $uuDiem;
          @endphp
        </td>
        <td>{{ $goi->pbh }}</td>
        <td>
          <button class="btn btn-danger fw-bold rounded-2 btn-dangky" data-bs-toggle="modal"
             data-bs-target="#registerModal"  data-id="{{ $goi->id }}" data-goi="{{ $goi->ten_goi }}">Đăng ký
          </button>
        </td>
      </tr>
      @empty
      <tr><td colspan="7">Không có gói tháng</td></tr>
      @endforelse
    </tbody>
  </table>
</div>

{{-- Gói dài ngày --}}
<div class="table-wrap">
  <h3>Gói dài ngày</h3>
  <table class="v-table">
    <thead>
  <tr>
    <th style="width: 12%;">Tên gói</th>
    <th style="width: 16%;">Dung lượng (GB)</th>
    <th style="width: 12%;">Giá cước</th>
    <th style="width: 30%;">Ưu đãi</th>
    <th style="width: 10%;">Phí bảo hành</th>
    <th style="width: 10%;">Đăng ký</th>
  </tr>

    </thead>
    <tbody>
      @forelse($daiNgayC as $goi)
      <tr>
        <td>{{ $goi->ten_goi }}</td>
        <td>{{ $goi->dung_luong }}</td>
        <td>
          <span class="v-price">{{ number_format($goi->cuoc_phi, 0, ',', '.') }}đ</span>
          <span class="v-cycle">/{{ $goi->chu_ky }} ngày</span>
        </td>
        <td class="v-uu-dai">
          @php
            $uuDiem = $goi->uu_diem;
            echo (strlen($uuDiem) > 300) ? substr($uuDiem, 0, 300) . '...' : $uuDiem;
          @endphp
        </td>
        <td>{{ $goi->pbh }}</td>
        <td>
          <button class="btn btn-danger fw-bold rounded-2 btn-dangky" data-bs-toggle="modal"
             data-bs-target="#registerModal"  data-id="{{ $goi->id }}" data-goi="{{ $goi->ten_goi }}">Đăng ký
          </button>
        </td>
      </tr>
      @empty
      <tr><td colspan="7">Không có gói dài ngày</td></tr>
      @endforelse
    </tbody>
  </table>
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
</div>
@include('auth.footer')

</body>
</html>
