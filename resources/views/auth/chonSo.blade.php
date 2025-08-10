<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Chọn số</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .chon-so-btn {
            border: 1px solid #dc3545;
            color: #dc3545;
            padding: 5px 12px;
            border-radius: 20px;
            background-color: transparent;
            transition: all 0.3s ease;
        }

        .chon-so-btn:hover {
            background-color: #dc3545;
            color: white;
        }

        .sticky-left {
            position: sticky;
            top: 20px;
        }

        .fade-in {
            animation: fadeIn 0.6s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .card-title {
            font-weight: 600;
            color: #dc3545;
        }

        th {
            background-color: #f1f1f1;
        }

        table td, table th {
            vertical-align: middle;
        }
    </style>
</head>
<body>
@include('auth.header')
 <div style="height: 100px;"></div>
<form action="{{ route('dang-ky') }}" method="POST">
    @csrf
    <input type="hidden" name="goi_id" value="{{ $goi->id }}">

    <div class="container-fluid mt-4 fade-in">
        <div class="row">

            <!-- Cột trái: Thông tin gói cước -->
            <div class="col-md-4">
                <div class="sticky-left">
                    <div class="card shadow-sm mb-4">
                        <div class="card-body">
                            <h5 class="card-title text-center">{{ $goi->ma_goi }}</h5>
                            <p><strong>Giá:</strong> {{ number_format($goi->cuoc_phi) }} đ</p>
                            <p><strong>Dung lượng:</strong> {{ $goi->dung_luong }}</p>
                            <p><strong>Chu kỳ:</strong> {{ $goi->chu_ky }} ngày</p>
                            <p><strong>Mô tả:</strong> {{ $goi->mo_ta }}</p>
                            <p><strong>Cú pháp:</strong> {{ $goi->cu_phap }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Cột phải: Danh sách SIM -->
            <div class="col-md-8" style="height: 80vh; overflow-y: auto;">
                <h5 class="mb-3 text-primary">📱 Danh sách số điện thoại khả dụng</h5>
                <table class="table table-hover table-bordered bg-white">
                    <thead class="table-light">
                        <tr>
                            <th></th>
                            <th>Số điện thoại</th>
                            <th>Phí chọn số</th>
                            <th>Loại sim</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($soDienThoai as $sim)
                            <tr>
                                <td class="text-center">
                                    <input type="radio" name="sim_id" value="{{ $sim->id }}" required>
                                </td>
                                <td>{{ $sim->so_dien_thoai }}</td>
                                <td>{{ number_format($sim->phi_chon_so, 0, ',', '.') }} đ</td>
                                <td>{{ $sim->loai_sim ?? 'Bình Dân' }}</td>
                            </tr>
                        @endforeach
                        @if($soDienThoai->isEmpty())
                            <tr>
                                <td colspan="4" class="text-center text-muted">Không có sim khả dụng</td>
                            </tr>
                        @endif
                    </tbody>
                </table>

                <div class="text-end mt-3">
                    <button type="submit" class="btn btn-danger">Đăng ký</button>
                </div>
            </div>

        </div>
    </div>
</form>

@if(session('success'))
  <div id="success-message" style="
    max-width: 1000px; margin: 0 auto 20px auto; 
    padding: 15px 20px; 
    background-color: #d4edda; 
    color: #155724; 
    border: 1px solid #c3e6cb; 
    border-radius: 8px; 
    font-weight: 600;
    text-align: center;
  ">
    {{ session('success') }}
  </div>

  <script>
    setTimeout(function() {
      const msg = document.getElementById('success-message');
      if(msg) {
        msg.style.transition = 'opacity 0.5s ease';
        msg.style.opacity = '0';
        setTimeout(() => msg.remove(), 500);
      }
    }, 3000); 
  </script>
@endif



</body>
</html>
