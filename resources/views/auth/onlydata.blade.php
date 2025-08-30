<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Danh sách gói cước Only Data Viettel</title>
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>AOS.init({ duration: 800, offset: 100 });</script>

  <style>
    body {
      font-family: Arial, sans-serif;
      background: #fffafa;
      margin: 0;
      padding: 20px;
      color: #8b0000;
      animation: fadeIn 1s ease-in-out;
    }

    h1, h2 {
      text-align: center;
      color: #b30000;
      font-family: 'Montserrat', sans-serif;
      font-weight: 700;
    }

    h1 {
      margin: 40px 0 30px;
      font-size: 28px;
    }

    h2 {
      margin-top: 40px;
      font-size: 22px;
    }

    .gioi-thieu {
      width: 100%;
      max-width: 1000px;
      margin: 10px auto 30px;
      font-style: italic;
      color: #a30014;
      border-left: 4px solid #d11a2a;
      padding-left: 10px;
      white-space: pre-line;
    }

    .package-list {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 25px;
      max-width: 1200px;
      margin: 0 auto;
    }

   .btn-dangky {
  font-size: 14px;      /* chữ vừa phải */
  padding: 5px 15px;    /* giảm khoảng trống */
  white-space: nowrap;  /* ép chữ không xuống dòng */
}

.btn-dangky:hover {
  background-color: #c9002b;
}


    .v-table {
      width: 100%;
      border-collapse: collapse;
      background: #fff;
      border-radius: 8px;
      overflow: hidden;
      box-shadow: 0 4px 12px rgba(0,0,0,0.08);
    }

    .v-table th, .v-table td {
      border: 1px solid #eee;
      padding: 12px;
      text-align: center;
      vertical-align: middle;
    }

    .v-table thead th {
      background: #d11a2a;
      color: #fff;
      font-weight: 600;
    }

    .v-price { font-weight: 700; color: #b30000; }
    .v-cycle { color: #666; }

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

    .no-data {
      text-align: center;
      font-style: italic;
      color: #999;
      width: 100%;
    }
   .bang-goi {
      margin: 0 auto; /* căn giữa */
      max-width: 1100px; /* bảng không vượt quá 1100px */
      padding: 0 15px; /* chừa khoảng cách 2 bên cho đẹp */
    }

    .v-table {
      width: 100%;
      border-collapse: collapse;
      background: #fff;
      border-radius: 8px;
      overflow: hidden;
      box-shadow: 0 4px 12px rgba(0,0,0,0.08);
    }

    @media (max-width: 600px) {
      .v-table { min-width: 700px; }
    }
  </style>
</head>
<body>

@include('auth.header')
<div style="height: 50px;"></div>

<h1>Danh sách gói cước Only Data Viettel</h1>

{{-- Gói ngắn ngày --}}
<h2>Gói ngắn ngày</h2>
<div class="gioi-thieu">
  {{ $gioiThieuNganNgay ?? 'Các gói cước ngắn ngày với ưu đãi hấp dẫn dành cho bạn.' }}
</div>

<div class="bang-goi">
<div class="table-wrap">
  <table class="v-table">
    <thead>
      <tr>
        <th>Tên gói</th>
        <th>Dung lượng (GB)</th>
        <th>Giá cước</th>
        <th>Ưu đãi</th>
        <th>Phí bảo hành</th>
        <th>Đăng ký</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($nganNgay as $goi)
        <tr>
          <td>{{ $goi->ten_goi }}</td>
          <td>{{ $goi->dung_luong }}</td>
          <td>
            <span class="v-price">{{ number_format($goi->cuoc_phi, 0, ',', '.') }}đ</span>
            <span class="v-cycle">/{{ $goi->chu_ky }} ngày</span>
          </td>
          <td class="v-uu-dai">{{ Str::limit($goi->uu_diem, 100) }}</td>
          <td>{{ $goi->pbh }}</td>
          <td>
         <button class="btn btn-danger fw-bold rounded-2 btn-dangky" data-bs-toggle="modal"
             data-bs-target="#registerModal"  data-id="{{ $goi->id }}" data-goi="{{ $goi->ten_goi }}">Đăng ký
          </button>
        </td>
        </tr>
      @empty
        <tr><td colspan="6" class="no-data">Không có gói ngắn ngày.</td></tr>
      @endforelse
    </tbody>
  </table>
</div>

<br><br><br>
<h2>Gói tháng</h2>
<div class="gioi-thieu">
  {{ $gioiThieuThang ?? 'Các gói tháng với ưu đãi đặc biệt, phù hợp nhu cầu dài hạn.' }}
</div>
<div class="table-wrap">
  <table class="v-table">
    <thead>
      <tr>
        <th>Tên gói</th>
        <th>Dung lượng (GB)</th>
        <th>Giá cước</th>
        <th>Ưu đãi</th>
        <th>Phí bảo hành</th>
        <th>Đăng ký</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($goiThang as $goi)
        <tr>
          <td>{{ $goi->ten_goi }}</td>
          <td>{{ $goi->dung_luong }}</td>
          <td>
            <span class="v-price">{{ number_format($goi->cuoc_phi, 0, ',', '.') }}đ</span>
            <span class="v-cycle">/{{ $goi->chu_ky }} ngày</span>
          </td>
          <td class="v-uu-dai">{{ Str::limit($goi->uu_diem, 100) }}</td>
          <td>{{ $goi->pbh }}</td>
          <td>
         <button class="btn btn-danger fw-bold rounded-2 btn-dangky" data-bs-toggle="modal"
             data-bs-target="#registerModal"  data-id="{{ $goi->id }}" data-goi="{{ $goi->ten_goi }}">Đăng ký
          </button>
        </td>
        </tr>
      @empty
        <tr><td colspan="6" class="no-data">Không có gói tháng.</td></tr>
      @endforelse
    </tbody>
  </table>
</div>

<br><br><br>
<h2>Gói dài ngày</h2>
<div class="gioi-thieu">
  {{ $gioiThieuDaiNgay ?? 'Các gói dài ngày với ưu đãi hấp dẫn dành cho khách hàng sử dụng lâu dài.' }}
</div>
<div class="table-wrap">
  <table class="v-table">
    <thead>
      <tr>
        <th>Tên gói</th>
        <th>Dung lượng (GB)</th>
        <th>Giá cước</th>
        <th>Ưu đãi</th>
        <th>Phí bảo hành</th>
        <th>Đăng ký</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($daiNgay as $goi)
        <tr>
          <td>{{ $goi->ten_goi }}</td>
          <td>{{ $goi->dung_luong }}</td>
          <td>
            <span class="v-price">{{ number_format($goi->cuoc_phi, 0, ',', '.') }}đ</span>
            <span class="v-cycle">/{{ $goi->chu_ky }} ngày</span>
          </td>
          <td class="v-uu-dai">{{ Str::limit($goi->uu_diem, 100) }}</td>
          <td>{{ $goi->pbh }}%</td>
          <td>
         <button class="btn btn-danger fw-bold rounded-2 btn-dangky" data-bs-toggle="modal"
             data-bs-target="#registerModal"  data-id="{{ $goi->id }}" data-goi="{{ $goi->ten_goi }}">Đăng ký
          </button>
        </td>
        </tr>
      @empty
        <tr><td colspan="6" class="no-data">Không có gói dài ngày.</td></tr>
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
            <button type="submit" class="btn btn-viettel"style ="background-color: #EE0033; border: none; color: #fff; ">Đồng ý</button>
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