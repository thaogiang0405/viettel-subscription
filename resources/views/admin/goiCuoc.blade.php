<!doctype html>
<html class="no-js " lang="en">


<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">

<title>:: Aero Bootstrap4 Admin :: Project List</title>
<!-- Favicon-->
<link rel="icon" href="favicon.ico" type="image/x-icon"> 
<link rel="stylesheet" href="{{asset('assets/plugins/bootstrap/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/plugins/jvectormap/jquery-jvectormap-2.0.3.min.css')}}"/>
<link rel="stylesheet" href="{{asset('assets/plugins/charts-c3/plugin.css')}}"/>

<link rel="stylesheet" href="{{asset('assets/plugins/morrisjs/morris.min.css')}}" />
<!-- Custom Css -->
 <link href="/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="/assets/css/style.min.css">
<style>
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

/* Loại bỏ underline cho tất cả link trong sidebar */
.sidebar a {
    text-decoration: none !important;
}

/* Nếu bạn muốn hover vẫn không có underline */
.sidebar a:hover {
    text-decoration: none !important;
}

.single-user-name {
    text-decoration: none !important;
}
 .table thead tr th {
        background-color: #ee0033 !important;
        color: white !important;
    }

</style>

</head>

<body class="theme-blush">

@if ($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif


@include('admin.leftRight')
<!-- Main Content -->
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Danh sách gói cước</h2>
                </div>
                <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap">
                    <ul class="breadcrumb mb-0 d-flex align-items-center gap-2">
                        <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i> Viettel</a></li>
                        <li class="breadcrumb-item">Danh sách</li>
                        <li class="breadcrumb-item active">Gói cước</li>
                    </ul>
                    <div class="d-flex align-items-center gap-2">
                       <form id="searchForm" action="{{ route('list_goi_cuoc') }}" method="GET" class="d-flex align-items-center gap-2">
                          <input type="text" name="keyword" id="searchInput" class="form-control" style="width: 250px;" 
                                placeholder="Nhập mã gói để tìm..." value="{{ request('keyword') }}">
                      </form>

                      <script>
                          const input = document.getElementById('searchInput');

                          input.addEventListener('input', function() {
                              const keyword = this.value;

                              fetch(`{{ route('list_goi_cuoc') }}?keyword=${encodeURIComponent(keyword)}`)
                                  .then(response => response.text())
                                  .then(html => {
                                      // Lấy phần tbody của bảng và cập nhật
                                      const parser = new DOMParser();
                                      const doc = parser.parseFromString(html, 'text/html');
                                      const newTbody = doc.querySelector('table tbody');
                                      document.querySelector('table tbody').innerHTML = newTbody.innerHTML;
                                  });
                          });
                      </script>


                        <a href="{{ route('view_add') }}" class="btn btn-success"><i class="zmdi zmdi-plus"></i></a>
                        <a href="{{ route('xuat_file') }}">
                            <img src="/images/xuat.webp" alt="Xuất file" style="width: 40px; height: auto;">
                        </a>
                    </div>
                </div>


            </div>
        </div>

        <div class="container-fluid">
                <div class="card-body">
                    <table class="table table-bordered mt-3">
                        <thead style="background-color: #ee0033; color: white;">
                            <tr>
                                <th>Tên gói cước</th>
                                <th>Danh mục</th>
                                <th>Cú pháp</th>
                                <th>Dung lượng</th>
                                <th>Chu kỳ</th>
                                <th>Ưu điểm</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($goiCuoc as $goi)
                                <tr>
                                    <td>{{ $goi->ma_goi }}</td>
                                    <td>
                                        <strong>{{ $goi->mang }}</strong><br>
                                        <small>{{ $goi->loai_goi }}</small>
                                    </td>
                                    <td style="color: #ee0033;">{{ $goi->cu_phap }}<br>
                                        <small>Cước phí: {{ number_format($goi->cuoc_phi, 0, ',', '.') }} VNĐ</small>
                                    </td>
                                    <td>{{ $goi->dung_luong }}</td>
                                    <td>{{ $goi->chu_ky }} ngày</td>
                                    <td>{{ \Illuminate\Support\Str::limit($goi->uu_diem, 30, '...') }}</td>
                                    <td class="text-center">
                                        <form action="{{ route('xoa_goi_cuoc', $goi->id) }}" method="POST" onsubmit="return confirm('Bạn có chắc muốn xóa không?');" style="display:inline-block;">
                                            @csrf
                                          
                                            <a>
                                                <img src="/images/delete.svg" alt="xóa file" style="width: 20px; height: auto; margin-left: 10px;">
                                            </a>
                                        </form>
                                        <a href="{{ route('edit_goi_cuoc', $goi->id) }}" ><img src="/images/update.svg" alt="xóa file" style="width: 20px; height: auto; margin-left: 10px;"></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <ul class="pagination pagination-primary mt-4">
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                    </ul>
                </div>
            </div>
        
    </div>
</section>

<style>
    .btn-danger {
        background-color: #ee0033;
        border: none;
    }
    .btn-danger:hover {
        background-color: #cc0029;
    }
    .btn-warning {
        color: white;
    }
    .table thead th {
        vertical-align: middle;
        text-align: center;
    }
    .table td {
        vertical-align: middle;
    }
</style>

<!-- Modal Form Thêm Gói Cước -->
<div class="modal fade" id="themGoiCuocModal" tabindex="-1" aria-labelledby="themGoiCuocModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header bg-danger text-white">
        <h5 class="modal-title" id="themGoiCuocModalLabel">Thêm Gói Cước Mới</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Đóng"></button>
      </div>
      <div class="modal-body">
        <form action="{{ route('add_goi_cuoc') }}" method="POST">
          @csrf

          <div class="mb-3">
            <label class="form-label">Mã Gói</label>
            <input type="text" class="form-control" name="ma_goi" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Tên Gói</label>
            <input type="text" class="form-control" name="ten_goi" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Loại Gói</label>
            <select class="form-select" name="loai_goi" required>
              <option value="DATA">Data</option>
              <option value="COMBO">Combo</option>
            </select>
          </div>

          <div class="mb-3">
            <label class="form-label">Danh Mục</label>
            <select class="form-select" name="danh_muc" required>
              <option value="tra_truoc">Trả Trước</option>
              <option value="tra_sau">Trả Sau</option>
            </select>
          </div>

          <div class="mb-3">
            <label class="form-label">Cước Phí (VNĐ)</label>
            <input type="number" class="form-control" name="cuoc_phi" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Chu Kỳ (ngày/tháng)</label>
            <input type="number" class="form-control" name="chu_ky" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Mạng</label>
            <select class="form-select" name="mang" required>
              <option value="4G">4G</option>
              <option value="5G">5G</option>
            </select>
          </div>

          <div class="mb-3">
            <label class="form-label">Phần trăm hoa hồng (PBH)</label>
            <input type="number" class="form-control" name="pbh" step="0.1">
          </div>

          <div class="mb-3">
            <label class="form-label">Ưu Điểm</label>
            <textarea class="form-control" name="uu_diem" rows="2"></textarea>
          </div>

          <div class="mb-3">
            <label class="form-label">Mô Tả (Cú Pháp)</label>
            <textarea class="form-control" name="cu_phap" rows="2"></textarea>
          </div>

          <div class="text-end">
            <button type="submit" class="btn btn-danger px-4 rounded-pill">Thêm Gói Cước</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>




<!-- Modal Cập Nhật Gói Cước -->

<!-- Jquery Core Js --> 

<script src="assets/bundles/libscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js ( jquery.v3.2.1, Bootstrap4 js) --> 
<script src="assets/bundles/vendorscripts.bundle.js"></script> <!-- slimscroll, waves Scripts Plugin Js -->

<script src="assets/bundles/jvectormap.bundle.js"></script> <!-- JVectorMap Plugin Js -->
<script src="assets/bundles/sparkline.bundle.js"></script> <!-- Sparkline Plugin Js -->
<script src="assets/bundles/c3.bundle.js"></script>

<script src="assets/bundles/mainscripts.bundle.js"></script>
<script src="assets/js/pages/index.js"></script>

<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


</body>


</html>