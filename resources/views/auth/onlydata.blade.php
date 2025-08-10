<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Danh sách gói cước Only Data Viettel</title>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@600&display=swap');
    
    <<!-- Link thư viện AOS -->
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  AOS.init({
    duration: 800,
    offset: 100,
  });
</script>


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
      width: 90%;
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

    .package-card {
      background: #fff;
      border-radius: 16px;
      box-shadow: 0 8px 16px rgba(0, 0, 0, 0.07);
      display: flex;
      flex-direction: column;
      overflow: hidden;
      animation: fadeInScale 0.5s ease forwards;
      opacity: 0;
      transform: scale(0.95);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      width: 300px;
    }

    .package-card:hover {
      transform: scale(1.03);
      box-shadow: 0 12px 25px rgba(0, 0, 0, 0.12);
    }

    .package-header {
      background: linear-gradient(135deg, #d91035, #ea3643);
      color: white;
      font-family: 'Montserrat', sans-serif;
      font-weight: 600;
      font-size: 18px;
      padding: 16px;
      text-align: center;
    }

    .package-body {
      padding: 20px;
      flex-grow: 1;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
    }

    .package-price {
      font-size: 22px;
      font-weight: 700;
      margin: 10px 0 5px;
      color: #d91035;
      text-align: center;
    }

    .package-cycle {
      font-size: 14px;
      color: #666;
      text-align: center;
      margin-bottom: 10px;
    }

    .package-description {
      font-size: 14px;
      color: #333;
      line-height: 1.5;
      margin-bottom: 15px;
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
      align-self: center;
      display: inline-block;
      text-decoration: none;
      width: 100%;
      transition: background-color 0.3s ease, transform 0.2s ease;
    }

    .btn-register:hover {
      background-color: #a3131f;
      transform: translateY(-1px);
    }

    .no-data {
      text-align: center;
      font-style: italic;
      color: #999;
      width: 100%;
    }

    @keyframes fadeInScale {
      to {
        opacity: 1;
        transform: scale(1);
      }
    }

    @media (max-width: 900px) {
      .package-card {
        width: calc(50% - 15px);
      }
    }

    @media (max-width: 600px) {
      .package-card {
        width: 100%;
      }
    }
  </style>
</head>
<body>

    @include('auth.header')
    <div style="height: 100px;"></div>

  <h1>Danh sách gói cước Only Data Viettel</h1>

  {{-- NGẮN NGÀY --}}
  <h2>Gói ngắn ngày (1 - 7 ngày)</h2>
  <div class="gioi-thieu">
    {{ $gioiThieuNganNgay ?? 'Các gói cước ngắn ngày với ưu đãi hấp dẫn dành cho bạn.' }}
  </div>
  <div class="package-list">
    @forelse ($nganNgay as $index => $goi)
      <div class="package-card" style="animation-delay: {{ $index * 0.15 }}s;">
        <div class="package-header">{{ $goi->ten_goi }}</div>
        <div class="package-body">
          <div class="package-price">{{ number_format($goi->cuoc_phi, 0, ',', '.') }} VNĐ</div>
          <div class="package-cycle">Chu kỳ: {{ $goi->chu_ky }} ngày</div>
          <div class="package-description">
            Dung lượng: {{ $goi->dung_luong }} GB<br>
            {!! nl2br(e(Str::limit($goi->uu_diem, 200))) !!}
          </div>
          <form action="{{ route('register.package', ['id' => $goi->id]) }}" method="POST">
            @csrf
            <button type="submit" class="btn-register">Đăng ký ngay</button>
          </form>
        </div>
      </div>
    @empty
      <p class="no-data">Không có gói ngắn ngày.</p>
    @endforelse
    
{{ $nganNgay->links() }}
  </div>

  {{-- GÓI THÁNG --}}
  <h2>Gói tháng (30 ngày)</h2>
  <div class="gioi-thieu">
    {{ $gioiThieuThang ?? 'Các gói tháng với ưu đãi đặc biệt, phù hợp nhu cầu dài hạn.' }}
  </div>
  <div class="package-list">
    @forelse ($goiThang as $index => $goi)
      <div class="package-card" style="animation-delay: {{ $index * 0.15 }}s;">
        <div class="package-header">{{ $goi->ten_goi }}</div>
        <div class="package-body">
          <div class="package-price">{{ number_format($goi->cuoc_phi, 0, ',', '.') }} VNĐ</div>
          <div class="package-cycle">Chu kỳ: {{ $goi->chu_ky }} ngày</div>
          <div class="package-description">
            Dung lượng: {{ $goi->dung_luong }} GB<br>
            {!! nl2br(e(Str::limit($goi->uu_diem, 200))) !!}
          </div>
          <form action="{{ route('register.package', ['id' => $goi->id]) }}" method="POST">
            @csrf
            <button type="submit" class="btn-register">Đăng ký ngay</button>
          </form>
        </div>
      </div>
    @empty
      <p class="no-data">Không có gói tháng.</p>
    @endforelse
    
  </div>

  {{-- GÓI DÀI NGÀY --}}
  <h2>Gói dài ngày (&gt; 30 ngày)</h2>
  <div class="gioi-thieu">
    {{ $gioiThieuDaiNgay ?? 'Các gói dài ngày với ưu đãi hấp dẫn dành cho khách hàng sử dụng lâu dài.' }}
  </div>
  <div class="package-list">
    @forelse ($daiNgay as $index => $goi)
      <div class="package-card" style="animation-delay: {{ $index * 0.15 }}s;">
        <div class="package-header">{{ $goi->ten_goi }}</div>
        <div class="package-body">
          <div class="package-price">{{ number_format($goi->cuoc_phi, 0, ',', '.') }} VNĐ</div>
          <div class="package-cycle">
            Chu kỳ: {{ $goi->chu_ky }} ngày
            @if ($goi->chu_ky > 30 && $goi->chu_ky % 30 === 0)
              ({{ intval($goi->chu_ky / 30) }} tháng)
            @endif
          </div>
          <div class="package-description">
            Dung lượng: {{ $goi->dung_luong }} GB<br>
            {!! nl2br(e(Str::limit($goi->uu_diem, 200))) !!}
          </div>
          <form action="{{ route('register.package', ['id' => $goi->id]) }}" method="POST">
            @csrf
            <button type="submit" class="btn-register">Đăng ký ngay</button>
          </form>
        </div>
      </div>
    @empty
      <p class="no-data">Không có gói dài ngày.</p>
    @endforelse
  </div>
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
