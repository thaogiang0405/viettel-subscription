<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Gói Cước Trả Trước</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600&display=swap">

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

    @media (max-width: 600px) {
      .v-table { min-width: 700px; }
    }
  </style>
</head>
<body>

@include('auth.header')

<br><br>
<h1>Danh sách Gói Cước Trả Trước Viettel</h1>


<div class="container py-6">

  
  <h2 style="text-align:left; margin-left:50px;">📶 Gói DATA</h2><br>
  
  <div class="bang-goi">
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
        @forelse ($onlyData as $goi)
          <tr>
            <td>{{ $goi->ten_goi }}</td>
            <td>{{ $goi->dung_luong }}</td>
            <td>
              <span class="v-price">{{ number_format($goi->cuoc_phi, 0, ',', '.') }}đ</span>
              <span class="v-cycle">/{{ $goi->chu_ky }} ngày</span>
            </td>
            <td>{{ Str::limit($goi->uu_diem, 100) }}</td>
            <td>{{ $goi->pbh }}</td>
            <td>
              <a href="javascript:void(0)" onclick="openModal({{ $goi->id }})" class="text-blue-600 underline mr-2">Chi tiết</a>
           
               <button class="btn btn-danger px-4 fw-bold btn-dangky"
                onclick="openForm({{ $goi->id }})">
                Đăng ký
              </button>
            </td>
          </tr>
        @empty
          <tr><td colspan="6" class="no-data">Không có gói DATA.</td></tr>
        @endforelse
      </tbody>
    </table>
  </div>

  <br><br>

 <h2 style="text-align:left; margin-left:50px;">🌍 Gói DATA ZONE</h2><br>


  <div class="bang-goi">
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
        @forelse ($dataZone as $goi)
          <tr>
            <td>{{ $goi->ten_goi }}</td>
            <td>{{ $goi->dung_luong }}</td>
            <td>
              <span class="v-price">{{ number_format($goi->cuoc_phi, 0, ',', '.') }}đ</span>
              <span class="v-cycle">/{{ $goi->chu_ky }} ngày</span>
            </td>
            <td>{{ Str::limit($goi->uu_diem, 100) }}</td>
            <td>{{ $goi->pbh }}</td>
            <td>
              <a href="javascript:void(0)" onclick="openModal({{ $goi->id }})" class="text-blue-600 underline mr-2">Chi tiết</a>
           
               <button class="btn btn-danger px-4 fw-bold btn-dangky"
                onclick="openForm({{ $goi->id }})">
                Đăng ký
              </button>
            </td>
          </tr>
        @empty
          <tr><td colspan="6" class="no-data">Không có gói DATA ZONE.</td></tr>
        @endforelse
      </tbody>
    </table>
  </div>

  <br><br>

  <h2 style="text-align:left; margin-left:50px;">🎁 Gói COMBO</h2><br>

  <div class="bang-goi">
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
        @forelse ($combo as $goi)
          <tr>
            <td>{{ $goi->ten_goi }}</td>
            <td>{{ $goi->dung_luong }}</td>
            <td>
              <span class="v-price">{{ number_format($goi->cuoc_phi, 0, ',', '.') }}đ</span>
              <span class="v-cycle">/{{ $goi->chu_ky }} ngày</span>
            </td>
            <td>{{ Str::limit($goi->uu_diem, 100) }}</td>
            <td>{{ $goi->pbh }}</td>
            <td>
              <a href="javascript:void(0)" onclick="openModal({{ $goi->id }})" class="text-blue-600 underline mr-2">Chi tiết</a>
           
               <button class="btn btn-danger px-4 fw-bold btn-dangky"
                onclick="openForm({{ $goi->id }})">
                Đăng ký
              </button>
            </td>
          </tr>
        @empty
          <tr><td colspan="6" class="no-data">Không có gói COMBO.</td></tr>
        @endforelse
      </tbody>
    </table>
  </div>

  <br><br>

  <h2 style="text-align:left; margin-left:50px;">⭐ Gói ĐẶC BIỆT</h2><br>
  
  <div class="bang-goi">
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
        @forelse ($dacBiet as $goi)
          <tr>
            <td>{{ $goi->ten_goi }}</td>
            <td>{{ $goi->dung_luong }}</td>
            <td>
              <span class="v-price">{{ number_format($goi->cuoc_phi, 0, ',', '.') }}đ</span>
              <span class="v-cycle">/{{ $goi->chu_ky }} ngày</span>
            </td>
            <td>{{ Str::limit($goi->uu_diem, 100) }}</td>
            <td>{{ $goi->pbh }}</td>
            <td>
              <a href="javascript:void(0)" onclick="openModal({{ $goi->id }})" class="text-blue-600 underline mr-2">Chi tiết</a>
           
              <button class="btn btn-danger px-4 fw-bold btn-dangky"
                onclick="openForm({{ $goi->id }})">
                Đăng ký
              </button>

            </td>
          </tr>
        @empty
          <tr><td colspan="6" class="no-data">Không có gói đặc biệt.</td></tr>
        @endforelse
      </tbody>
    </table>
  </div>

</div>

<!-- Modal trượt từ phải -->
<div id="overlay" class="fixed inset-0 bg-black bg-opacity-50 hidden z-[9999] flex justify-end">
  <div id="slidePanel" class="bg-white w-full max-w-lg p-6 h-full overflow-auto transform translate-x-full transition-transform duration-300 relative">
    <button onclick="closeModal()" class="absolute top-2 right-4 text-gray-600 hover:text-red-600 text-3xl font-bold">&times;</button>
    <div id="modalContent"></div>
  </div>
</div>

<script>
const data = @json($goiCuoc);

function openModal(id) {
  const g = data.find(item => item.id === id);
  const html = `
    <h3 class="text-xl font-bold mb-4 text-center text-red-700">${g.ma_goi}</h3>
    <table class="w-full text-sm text-left border border-gray-200 mb-4">
      <tbody>
        <tr class="border-b"><td class="p-2 font-medium">Tên gói cước</td><td class="p-2">${g.ma_goi}</td></tr>
        <tr class="border-b"><td class="p-2 font-medium">Dung lượng</td><td class="p-2">${g.dung_luong}GB</td></tr>
        <tr class="border-b"><td class="p-2 font-medium">Mô tả</td><td class="p-2">${g.mo_ta || ''}</td></tr>
        <tr class="border-b"><td class="p-2 font-medium">Hỗ trợ eSIM</td><td class="p-2">${g.co_esim ? 'Có' : 'Không'}</td></tr>
        <tr class="border-b"><td class="p-2 font-medium">Chu kỳ</td><td class="p-2">${g.chu_ky || '30 ngày'}</td></tr>
        <tr class="border-b"><td class="p-2 font-medium">Phí gia hạn</td><td class="p-2">${Number(g.cuoc_phi).toLocaleString()}đ / 30 ngày</td></tr>
        <tr><td class="p-2 font-medium">Ưu điểm</td><td class="p-2">${g.uu_diem || ''}</td></tr>
      </tbody>
    </table>
  `;
  showModal(html);
}

function openForm(id) {
  const g = data.find(item => item.id === id);
  const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

  // Lấy route Laravel không cần id
  const routeDangKyTemplate = "{{ route('dangkygoi.store') }}";
  const actionUrl = routeDangKyTemplate;

  const html = `
    <h3 class="text-xl font-bold mb-4 text-center text-red-700">Đăng ký gói ${g.ma_goi}</h3>
    <form action="${actionUrl}" method="POST" class="space-y-4">
      <input type="hidden" name="_token" value="${csrfToken}">
      <input type="hidden" name="goi_cuoc_id" value="${g.id}" />
      <div>
        <label class="block mb-1 font-medium">Họ và tên</label>
        <input type="text" name="customer_name" required class="w-full border border-gray-300 rounded px-3 py-2">
      </div>
      <div>
        <label class="block mb-1 font-medium">Số điện thoại</label>
        <input type="tel" name="customer_phone" required class="w-full border border-gray-300 rounded px-3 py-2">
      </div>
      <div>
        <label class="block mb-1 font-medium">CMND/CCCD</label>
        <input type="text" name="cmnd_cccd" required class="w-full border border-gray-300 rounded px-3 py-2">
      </div>
      <div>
        <label class="block mb-1 font-medium">Email</label>
        <input type="email" name="customer_email" required class="w-full border border-gray-300 rounded px-3 py-2">
      </div>
      <div>
        <label class="block mb-1 font-medium">Địa chỉ</label>
        <input type="text" name="dia_chi" required class="w-full border border-gray-300 rounded px-3 py-2">
      </div>
      <div>
        <label class="block mb-1 font-medium">Yêu cầu khách hàng (nếu có)</label>
        <textarea name="sim" class="w-full border border-gray-300 rounded px-3 py-2" placeholder="Nhập yêu cầu của bạn nếu có..."></textarea>
      </div>
      <button type="submit" class="btn-register w-full">Xác nhận đăng ký</button>
    </form>
  `;
  showModal(html);
}




function showModal(content) {
  document.getElementById('modalContent').innerHTML = content;
  const overlay = document.getElementById('overlay');
  const panel = document.getElementById('slidePanel');
  overlay.classList.remove('hidden');
  void panel.offsetWidth; // Force reflow
  panel.classList.remove('translate-x-full');
}

function closeModal() {
  document.getElementById('overlay').classList.add('hidden');
  document.getElementById('slidePanel').classList.add('translate-x-full');
}
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
