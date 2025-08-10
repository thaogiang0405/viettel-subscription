<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
  <title>:: Aero Bootstrap4 Admin :: Cập Nhật Gói Cước</title>
<link rel="icon" href="favicon.ico" type="image/x-icon"> 
<link rel="stylesheet" href="{{asset('assets/plugins/bootstrap/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/plugins/jvectormap/jquery-jvectormap-2.0.3.min.css')}}"/>
<link rel="stylesheet" href="{{asset('assets/plugins/charts-c3/plugin.css')}}"/>

<link rel="stylesheet" href="{{asset('assets/plugins/morrisjs/morris.min.css')}}" />
<!-- Custom Css -->
 <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{asset('assets/css/style.min.css')}}">
  <style>
    /* Tùy chỉnh nhẹ cho form */
    .modal-content {
      border-radius: 12px;
    }

    .modal-header {
      border-bottom: none;
    }

    .form-label {
      font-weight: 600;
    }

    .btn-danger {
      background-color: #020202ff;
      border: none;
    }

    .btn-danger:hover {
      background-color: #0a0a0aff;
    }

    /* Loại bỏ gạch chân link trong sidebar */
    .sidebar a,
    .sidebar a:hover,
    .single-user-name {
      text-decoration: none !important;
    }
  </style>
</head>

<body class="theme-blush">

  @if ($errors->any())
  <div class="alert alert-danger mx-3 mt-3">
    <ul class="mb-0">
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  @endif

  <!-- Sidebar -->
  @include('admin.sideBar')

  <section class="content py-4">
    <div class="container">
      <div class="card shadow rounded p-4">
        <h3 class="mb-4 text-warning">Cập Nhật Gói Cước</h3>

        <form action="{{ route('update_goi_cuoc', $goiCuoc->id) }}" method="POST" novalidate>
          @csrf
          @method('PUT')

          <div class="form-group mb-3">
            <label for="ma_goi" class="form-label">Mã Gói <span class="text-danger">*</span></label>
            <input type="text" id="ma_goi" name="ma_goi" class="form-control" value="{{ old('ma_goi', $goiCuoc->ma_goi) }}" required />
          </div>

          <div class="form-group mb-3">
            <label for="ten_goi" class="form-label">Tên Gói <span class="text-danger">*</span></label>
            <input type="text" id="ten_goi" name="ten_goi" class="form-control" value="{{ old('ten_goi', $goiCuoc->ten_goi) }}" required />
          </div>

          <div class="form-group mb-3">
            <label for="loai_goi" class="form-label">Loại Gói <span class="text-danger">*</span></label>
            <select id="loai_goi" name="loai_goi" class="form-select" required>
              <option value="DATA" {{ (old('loai_goi', $goiCuoc->loai_goi) == 'DATA') ? 'selected' : '' }}>Data</option>
              <option value="COMBO" {{ (old('loai_goi', $goiCuoc->loai_goi) == 'COMBO') ? 'selected' : '' }}>Combo</option>
            </select>
          </div>

          <div class="form-group mb-3">
            <label for="danh_muc" class="form-label">Danh Mục <span class="text-danger">*</span></label>
            <select id="danh_muc" name="danh_muc" class="form-select" required>
              <option value="tra_truoc" {{ (old('danh_muc', $goiCuoc->danh_muc) == 'tra_truoc') ? 'selected' : '' }}>Trả Trước</option>
              <option value="tra_sau" {{ (old('danh_muc', $goiCuoc->danh_muc) == 'tra_sau') ? 'selected' : '' }}>Trả Sau</option>
            </select>
          </div>

          <div class="form-group mb-3">
            <label for="cuoc_phi" class="form-label">Cước Phí (VNĐ) <span class="text-danger">*</span></label>
            <input type="number" id="cuoc_phi" name="cuoc_phi" class="form-control" value="{{ old('cuoc_phi', $goiCuoc->cuoc_phi) }}" required />
          </div>

          <div class="form-group mb-3">
            <label for="chu_ky" class="form-label">Chu Kỳ (ngày/tháng) <span class="text-danger">*</span></label>
            <input type="number" id="chu_ky" name="chu_ky" class="form-control" value="{{ old('chu_ky', $goiCuoc->chu_ky) }}" required />
          </div>

          <div class="form-group mb-3">
            <label for="mang" class="form-label">Mạng <span class="text-danger">*</span></label>
            <select id="mang" name="mang" class="form-select" required>
              <option value="4G" {{ (old('mang', $goiCuoc->mang) == '4G') ? 'selected' : '' }}>4G</option>
              <option value="5G" {{ (old('mang', $goiCuoc->mang) == '5G') ? 'selected' : '' }}>5G</option>
            </select>
          </div>

          <div class="form-group mb-3">
            <label for="pbh" class="form-label">Phần trăm hoa hồng (PBH)</label>
            <input type="number" id="pbh" name="pbh" step="0.1" class="form-control" value="{{ old('pbh', $goiCuoc->pbh) }}" />
          </div>

          <div class="form-group mb-3">
            <label for="uu_diem" class="form-label">Ưu Điểm</label>
            <textarea id="uu_diem" name="uu_diem" rows="3" class="form-control">{{ old('uu_diem', $goiCuoc->uu_diem) }}</textarea>
          </div>

          <div class="form-group mb-4">
            <label for="cu_phap" class="form-label">Mô Tả (Cú Pháp)</label>
            <textarea id="cu_phap" name="cu_phap" rows="3" class="form-control">{{ old('cu_phap', $goiCuoc->cu_phap) }}</textarea>
          </div>

          <div class="text-end">
            <button type="submit" class="btn btn-warning px-4 rounded-pill">Cập Nhật Gói Cước</button>
          </div>
        </form>
      </div>
    </div>
  </section>

  <script src="assets/bundles/libscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js ( jquery.v3.2.1, Bootstrap4 js) --> 
<script src="assets/bundles/vendorscripts.bundle.js"></script> <!-- slimscroll, waves Scripts Plugin Js -->

<script src="assets/bundles/jvectormap.bundle.js"></script> <!-- JVectorMap Plugin Js -->
<script src="assets/bundles/sparkline.bundle.js"></script> <!-- Sparkline Plugin Js -->
<script src="assets/bundles/c3.bundle.js"></script>

<script src="assets/bundles/mainscripts.bundle.js"></script>
<script src="assets/js/pages/index.js"></script>
</body>

</html>
