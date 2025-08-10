<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Gói Cước Trả Trước</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
@import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@600&display=swap');

body {
  font-family: 'Montserrat', sans-serif;
  background: #fffafa;
  color: #8b0000;
  margin: 0;
  padding: 0;
}

h1 {
  text-align: center;
  color: #b30000;
  margin: 40px 0 30px;
  font-weight: 700;
  font-size: 28px;
}

.package-list {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  gap: 25px;
  max-width: 1200px;
  margin: 0 auto 60px;
  padding: 0 20px;
}

.package-card {
  background: #fff;
  border-radius: 16px;
  box-shadow: 0 8px 16px rgba(0, 0, 0, 0.07);
  display: flex;
  flex-direction: column;
  width: 100%;
  max-width: 270px;
  animation: fadeInScale 0.5s ease forwards;
  opacity: 0;
  transform: scale(0.95);
  transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.package-card:hover {
  transform: scale(1.03);
  box-shadow: 0 12px 25px rgba(0, 0, 0, 0.12);
}

.package-header {
  background: linear-gradient(135deg, #d91035, #ea3643);
  color: white;
  font-weight: 600;
  font-size: 18px;
  padding: 14px;
  text-align: center;
}

.package-body {
  padding: 16px;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  flex-grow: 1;
}

.package-price {
  font-size: 22px;
  font-weight: bold;
  color: #d91035;
  text-align: center;
  margin-top: 10px;
}

.package-description {
  font-size: 14px;
  color: #333;
  line-height: 1.5;
  margin: 12px 0;
  min-height: 60px;
  text-align: justify;
}

.btn-register {
  background-color: #d11a2a;
  color: white;
  padding: 10px;
  border: none;
  border-radius: 8px;
  font-weight: bold;
  cursor: pointer;
  text-align: center;
  margin-top: auto;
  transition: all 0.3s ease;
}

.btn-register:hover {
  background-color: #a3131f;
  transform: translateY(-1px);
}

@keyframes fadeInScale {
  to {
    opacity: 1;
    transform: scale(1);
  }
}
  </style>
</head>
<body>

@include('auth.header')
<div style="height: 100px;"></div>

<h1>Danh sách Gói Cước Trả Trước Viettel</h1>

<div class="package-list">
  @foreach($goiCuoc as $index => $goi)
    <div class="package-card" style="animation-delay: {{ $index * 0.15 }}s;">
      <div class="package-header">{{ $goi->ma_goi }}</div>
      <div class="package-body">
        <div class="text-sm text-gray-700 mb-2">Dung lượng: <strong>{{ $goi->dung_luong }}GB</strong></div>
        <div class="package-description">{{ $goi->mo_ta }}</div>
        <div class="text-sm text-gray-600">Phí gia hạn: <b>{{ number_format($goi->cuoc_phi, 0, ',', '.') }}đ / 30 ngày</b></div>
        <div class="text-sm text-gray-600 mb-2">Tên gói: <b>{{ $goi->uu_diem }}</b></div>
        <a href="javascript:void(0)" onclick="openModal({{ $goi->id }})" class="text-blue-600 underline text-sm text-center block mb-2">Xem chi tiết</a>
        <button onclick="openForm({{ $goi->id }})" class="btn-register block text-center w-full">Đăng kí</button>
      </div>
    </div>
  @endforeach
  @if(count($goiCuoc) == 0)
    <p style="text-align:center; width: 100%; color: #a00; font-weight: bold;">
      Không có gói trả trước nào.
    </p>
  @endif
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
  const html = `
    <h3 class="text-xl font-bold mb-4 text-center text-red-700">Đăng ký gói ${g.ma_goi}</h3>
    <form action="/dang-ky-goi/${g.id}" method="POST" class="space-y-4">
      <input type="hidden" name="goi_id" value="${g.id}" />
      <div>
        <label class="block mb-1 font-medium">Họ và tên</label>
        <input type="text" name="ho_ten" required class="w-full border border-gray-300 rounded px-3 py-2">
      </div>
      <div>
        <label class="block mb-1 font-medium">Số điện thoại</label>
        <input type="tel" name="so_dien_thoai" required class="w-full border border-gray-300 rounded px-3 py-2">
      </div>
      <div>
        <label class="block mb-1 font-medium">CMND/CCCD</label>
        <input type="text" name="cmnd" required class="w-full border border-gray-300 rounded px-3 py-2">
      </div>
      <div>
        <label class="block mb-1 font-medium">Địa chỉ</label>
        <input type="text" name="dia_chi" required class="w-full border border-gray-300 rounded px-3 py-2">
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

</body>
</html>
