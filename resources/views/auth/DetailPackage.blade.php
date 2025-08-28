<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Chi tiết gói cước</title>
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f9;
            margin: 0;
            padding: 0;
        }

        .breadcrumb {
            background: white;
            padding: 15px 20px;
            border-bottom: 1px solid #ddd;
            font-size: 14px;
        }

        .section {
            max-width: 90%;
            margin: 30px auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.05);
        }

        .section h2 {
            font-size: 28px;
            margin-bottom: 20px;
            color: #d9001b;
            border-left: 6px solid #d9001b;
            padding-left: 12px;
        }

        .grid {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            margin-bottom: 30px;
        }

        .box {
            flex: 1 1 30%;
            background: #f8f8f8;
            padding: 15px 20px;
            margin: 10px;
            text-align: center;
            border-radius: 8px;
            border: 1px solid #eee;
        }

        .box-title {
            font-size: 13px;
            color: #666;
            margin-bottom: 8px;
        }

        .box-value {
            font-size: 18px;
            color: #111;
            font-weight: bold;
        }

        .box-icon {
            width: 40px;
            height: 40px;
            margin-bottom: 8px;
        }

        .promo {
            padding: 25px;
            background: #fff8f8;
            border: 2px solid #ffdfdf;
            border-radius: 10px;
            font-size: 16px;
            line-height: 1.7;
            color: #333;
        }

        .btn-register {
            display: inline-block;
            margin-top: 30px;
            background-color: #c9001b;
            color: white;
            font-size: 16px;
            font-weight: bold;
            padding: 14px 40px;
            border: none;
            border-radius: 8px;
            text-decoration: none;
            transition: 0.3s ease;
        }

        .btn-register:hover {
            background-color: #a70017;
        }

        .right-image {
            float: right;
            width: 340px;
            margin-left: 30px;
            border-radius: 10px;
        }
        .table-cards {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .goi-card {
            display: flex;
            justify-content: space-between;
            padding: 20px;
            border: 1px solid #eee;
            border-radius: 12px;
            background-color: #fff;
            box-shadow: 0 2px 6px rgba(0,0,0,0.05);
            flex-wrap: wrap;
        }

        .goi-left {
            flex: 1 1 20%;
            text-align: center;
            padding: 10px;
            font-size: 15px;
        }

        .goi-center {
            flex: 1 1 50%;
            background-color: #fff0f0;
            border-radius: 10px;
            padding: 15px;
            font-size: 14px;
            line-height: 1.5;
        }

        .goi-right {
            flex: 1 1 20%;
            text-align: center;
            display: flex;
            flex-direction: column;
            justify-content: center;
            gap: 10px;
        }

        .styled-table {
    width: 100%;
    border-collapse: collapse;
    font-size: 15px;
    margin-top: 20px;
}

.styled-table thead tr {
    background-color: #d9001b;
    color: #ffffff;
    text-align: left;
}

.styled-table th,
.styled-table td {
    padding: 12px 15px;
    border: 1px solid #ddd;
}

.styled-table tbody tr {
    background-color: #fff;
}

.styled-table tbody tr:nth-child(even) {
    background-color: #f9f9f9;
}

.styled-table tbody tr:hover {
    background-color: #f1f1f1;
}
.alert {
    padding: 15px;
    border-radius: 5px;
    margin-bottom: 20px;
}
.alert-success {
    background-color: #d4edda;
    color: #155724;
    border: 1px solid #c3e6cb;
}


        @media (max-width: 768px) {
            .grid {
                flex-direction: column;
            }

            .box {
                width: 100%;
                margin-bottom: 15px;
            }

            .right-image {
                float: none;
                display: block;
                margin: 20px auto;
                width: 100%;
            }

            .goi-card {
                flex-direction: column;
                text-align: center;
            }

            .goi-left, .goi-center, .goi-right {
                flex: 1 1 100%;
            }
        }

    </style>
</head>
<body>

@include('auth.header')

<section class="section">
    <img src="{{ asset('images/anhDetail.jpg') }}" alt="Gói cước Viettel" class="right-image">


    <h2>📦 Chi Tiết Gói Cước</h2>

    <div class="grid">
        <div class="box">
            <div class="box-left">
                <img src="{{ asset('images/icon-goi.png.webp') }}" alt="icon" class="box-icon">
            </div>
            <div class="box-right">
                <div class="box-title">Tên gói</div>
                <div class="box-value">{{ $goi->ten_goi }}</div>
            </div>
        </div>

        <div class="box">
            <div class="box-left">
                <img src="{{ asset('images/icon-gia.png.webp') }}" alt="icon" class="box-icon">
            </div>
            <div class="box-right">
                <div class="box-title">Giá</div>
                <div class="box-value">{{ number_format($goi->cuoc_phi) }}đ</div>
            </div>
        </div>

        <div class="box">
            <div class="box-left">
                <img src="{{ asset('images/wifi-icon-red.webp') }}" alt="icon" class="box-icon">
            </div>
            <div class="box-right">
                <div class="box-title">Dung lượng</div>
                <div class="box-value">{{ $goi->dung_luong }}</div>
            </div>
        </div>
    </div>


    <div class="promo">
        <h3 style="color: #d9001b;">🎯 {{ $goi->ma_goi }} - {{ $goi->ten_goi }}</h3>
        <p><strong>📌 Loại gói:</strong> {{ $goi->loai_goi }}</p>

        <hr style="margin: 20px 0;">

        <p><strong>📲 Cú pháp đăng ký:</strong><br>{!! nl2br(e($goi->mo_ta)) !!}</p>

        <hr style="margin: 20px 0;">

        <p><strong>🎁 Ưu đãi nổi bật:</strong><br>{!! nl2br(e($goi->uu_diem)) !!}</p>

        <hr style="margin: 20px 0;">

        <p><strong>📱 Ứng dụng miễn phí:</strong> {{ $goi->ung_dung_mien_phi ?? 'Không có' }}</p>
    </div>

    <td style="text-align: center;">
        <button class="btn btn-danger px-4 rounded-2 fw-bold btn-dangky" data-bs-toggle="modal"
            data-bs-target="#registerModal"  data-id="{{ $goi->id }}" data-goi="{{ $goi->ten_goi }}"> 📩 ĐĂNG KÝ
        </button>
    </td>

    <br><br>
<h2>📦 Gói cùng chu kỳ ({{ $goi->chu_ky }} ngày)</h2>


<div class="table-cards">
   <table style="width: 100%; border-collapse: collapse; border: 1px solid #ccc;">
       <thead style="background-color: #d0021b; color: white;">
           <tr>
               <th style="padding: 12px; font-size: 16px; border: 1px solid #ccc;">Tên gói</th>
               <th style="padding: 12px; font-size: 16px; border: 1px solid #ccc;">Cú pháp đăng ký</th>
               <th style="padding: 12px; font-size: 16px; border: 1px solid #ccc;">Giá gói</th>
           </tr>
       </thead>
       <tbody>
           @foreach ($goiCungChuKy as $item)
               <tr style="border-bottom: 1px solid #ccc;">
                   <td style="padding: 15px; text-align: center; border-right: 1px solid #ccc;">
                       <div style="color: #d0021b; font-weight: bold; font-size: 20px;">
                           {{ $item->ma_goi }}
                       </div>
                       <div style="font-size: 16px;">
                           ({{ number_format($item->cuoc_phi, 0, ',', '.') }}đ/{{ hienThiChuKy($item->chu_ky) }})
                       </div>
                   </td>

                   <td style="padding: 0; border-right: 1px solid #ccc;">
                       <div style="padding: 15px; font-size: 16px; font-weight: bold; border-bottom: 1px solid #ccc;">
                           {{ $item->ma_goi }} MO gửi 191
                       </div>
                       <div style="font-size: 14px; color: #333; background-color: #ffe6e6; padding: 12px; border-radius: 0; border-top: none;">
                           {{ Str::limit($item->uu_diem, 100) }}
                       </div>
                   </td>
                    <td style="text-align: center;">
                        <button class="btn btn-danger px-4 rounded-2 fw-bold btn-dangky" data-bs-toggle="modal"
                            data-bs-target="#registerModal"  data-id="{{ $goi->id }}" data-goi="{{ $goi->ten_goi }}"> 📩 ĐĂNG KÝ
                        </button>
                    </td>

               </tr>
           @endforeach
       </tbody>
   </table>
</div>




</section>

@php
                function hienThiChuKy($ngay) {
                    if ($ngay == 1) return 'ngày';
                    if ($ngay >= 28 && $ngay <= 31) return 'tháng';
                    if ($ngay >= 365) return 'năm';
                    if ($ngay >= 7 && $ngay < 28) return 'tuần';
                    return $ngay . ' ngày';
                }
            @endphp

            
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
