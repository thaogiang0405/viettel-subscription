<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Danh sách gói cước Only Data Viettel</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #fff0f0;
      color: #8b0000;
      margin: 20px;
    }
    h1, h2 {
      text-align: center;
      color: #b30000;
    }
    h2 {
      margin-top: 40px;
      margin-bottom: 15px;
    }
    .gioi-thieu {
      width: 90%;
      max-width: 900px;
      margin: 0 auto 15px;
      font-style: italic;
      color: #a30014;
      border-left: 4px solid #d11a2a;
      padding-left: 10px;
      white-space: pre-line; /* giữ xuống dòng nếu có */
    }
    table {
      width: 90%;
      max-width: 900px;
      margin: 0 auto 40px;
      border-collapse: collapse;
      box-shadow: 0 0 10px rgba(179, 0, 0, 0.3);
    }
    thead {
      background-color: #b30000;
      color: white;
    }
    th, td {
      padding: 12px 15px;
      border: 1px solid #d11a2a;
      text-align: center;
      vertical-align: middle;
    }
    tbody tr:nth-child(even) {
      background-color: #f9d6d6;
    }
    tbody tr:hover {
      background-color: #f4a1a1;
      cursor: pointer;
    }
    .btn-register {
      background-color: #d11a2a;
      color: white;
      padding: 6px 20px;  
      border: none;
      border-radius: 4px;
      text-decoration: none;
      font-weight: bold;
      transition: background-color 0.3s ease;
      min-width: 100px;  
      display: inline-block;
      text-align: center;
      white-space: nowrap;  
    }
    .btn-register:hover {
      background-color: #a3131f;
    }
  </style>
</head>
<body>

  @include('auth.header')
  <div style="height: 100px;"></div> <!-- khoảng đệm header -->

  <h1>Các gói cước Combo Viettel</h1>

  {{-- Gói ngắn ngày --}}
  <h2>Gói ngắn ngày (1 - 7 ngày)</h2>
  <div class="gioi-thieu">
    {{ $gioiThieuNganNgay ?? 'Các gói cước ngắn ngày với ưu đãi hấp dẫn dành cho bạn.' }}
  </div>
  <table>
    <thead>
      <tr>
        <th>Tên gói</th>
        <th>Dung lượng (GB)</th>
        <th>Chu kỳ</th>
        <th>Giá cước (VNĐ)</th>
        <th>Ưu đãi</th>
        <th>Phí bảo hành</th>
        <th>Đăng ký</th>
      </tr>
    </thead>
    <tbody>
      @forelse($nganNgayC as $goi)
      <tr>
        <td>{{ $goi->ten_goi }}</td>
        <td>{{ $goi->dung_luong }}</td>
        <td>{{ $goi->chu_ky }} ngày</td>
        <td>{{ number_format($goi->cuoc_phi, 0, ',', '.') }}</td>
        <td>
          @php
            $uuDiem = $goi->uu_diem;
            echo (strlen($uuDiem) > 200) ? substr($uuDiem, 0, 200) . '...' : $uuDiem;
          @endphp
        </td>
        <td>{{$goi->pbh}}%</td>
        <td>
          <form class="btn-register" action="{{ route('register.package', ['id' => $goi->id]) }}" method="POST">
            @csrf
            <button type="submit" class="btn-register">Đăng ký ngay</button>
          </form>
        </td>
      </tr>
      @empty
      <tr><td colspan="6">Không có gói ngắn ngày</td></tr>
      @endforelse
    </tbody>
  </table>

  {{-- Gói tháng --}}
  <h2>Gói tháng (30 ngày)</h2>
  <div class="gioi-thieu">
    {{ $gioiThieuThang ?? 'Các gói tháng với ưu đãi đặc biệt, phù hợp nhu cầu dài hạn.' }}
  </div>
  <table>
    <thead>
      <tr>
        <th>Tên gói</th>
        <th>Dung lượng (GB)</th>
        <th>Chu kỳ</th>
        <th>Giá cước (VNĐ)</th>
        <th>Ưu đãi</th>
        <th>Phí bảo hành</th>
        <th>Đăng ký</th>
      </tr>
    </thead>
    <tbody>
      @forelse($goiThangC as $goi)
      <tr>
        <td>{{ $goi->ten_goi }}</td>
        <td>{{ $goi->dung_luong }}</td>
        <td>{{ $goi->chu_ky }} ngày</td>
        <td>{{ number_format($goi->cuoc_phi, 0, ',', '.') }}</td>
        <td>
          @php
            $uuDiem = $goi->uu_diem;
            echo (strlen($uuDiem) > 200) ? substr($uuDiem, 0, 200) . '...' : $uuDiem;
          @endphp
        </td>
        <td>{{$goi->pbh}}%</td>
        <td>
          <form class="btn-register" action="{{ route('register.package', ['id' => $goi->id]) }}" method="POST">
            @csrf
            <button type="submit" class="btn-register">Đăng ký ngay</button>
          </form>
        </td>
      </tr>
      @empty
      <tr><td colspan="6">Không có gói tháng</td></tr>
      @endforelse
    </tbody>
  </table>

  {{-- Gói dài ngày --}}
  <h2>Gói dài ngày (> 30 ngày)</h2>
  <div class="gioi-thieu">
    {{ $gioiThieuDaiNgay ?? 'Các gói dài ngày với ưu đãi hấp dẫn dành cho khách hàng sử dụng lâu dài.' }}
  </div>
  <table>
    <thead>
      <tr>
        <th>Tên gói</th>
        <th>Dung lượng (GB)</th>
        <th>Chu kỳ</th>
        <th>Giá cước (VNĐ)</th>
        <th>Ưu đãi</th>
        <th>Phí bảo hành</th>
        <th>Đăng ký</th>
      </tr>
    </thead>
    <tbody>
      @forelse($daiNgayC as $goi)
      <tr>
        <td>{{ $goi->ten_goi }}</td>
        <td>{{ $goi->dung_luong }}</td>
        <td>
          {{ $goi->chu_ky }}
          @if($goi->chu_ky > 30 && $goi->chu_ky % 30 == 0)
            ({{ intval($goi->chu_ky / 30) }} tháng)
          @else
            ngày
          @endif
        </td>
        <td>{{ number_format($goi->cuoc_phi, 0, ',', '.') }}</td>
        <td>
          @php
            $uuDiem = $goi->uu_diem;
            echo (strlen($uuDiem) > 200) ? substr($uuDiem, 0, 200) . '...' : $uuDiem;
          @endphp
        </td>
        <td>{{$goi->pbh}}%</td>
        <td>
          <form class="btn-register" action="{{ route('register.package', ['id' => $goi->id]) }}" method="POST">
            @csrf
            <button type="submit" class="btn-register">Đăng ký ngay</button>
          </form>
        </td>
      </tr>
      @empty
      <tr><td colspan="6">Không có gói dài ngày</td></tr>
      @endforelse
    </tbody>
  </table>

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
