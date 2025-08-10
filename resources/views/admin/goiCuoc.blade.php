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
 <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{asset('assets/css/style.min.css')}}">
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
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i> Viettel</a></li>
                        <li class="breadcrumb-item">Danh sách</li>
                        <li class="breadcrumb-item active"> gói cước</li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">                
                   
                  <a href class="btn btn-primary btn-icon float-right right_icon_toggle_btn" data-bs-toggle="modal" data-bs-target="#themGoiCuocModal">
                    Thêm Gói Cước
                  </a>
                 <a href="{{ route('xuat_file') }}">
                    <img src="/images/xuat.webp" alt="Xuất file">
                  </a>
                  <a href="{{route('view_add')}}" class="btn btn-success btn-icon float-right">
                      <i class="zmdi zmdi-plus"></i>
                  </a>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="card project_list">
                        <div class="table-responsive">
                            <table class="table table-hover c_table theme-color">
                                <thead>
                                <tr>
                                    <th style="background-color: #ee0033; color: white; width:50px;">Tên gói cước</th>
                                    <th style="background-color: #ee0033; color: white;">Danh mục</th>
                                    <th style="background-color: #ee0033; color: white;">Cú pháp</th>
                                    <th class="hidden-md-down" style="background-color: #ee0033; color: white;">Dung lượng</th>
                                    <th class="hidden-md-down" width="150px" style="background-color: #ee0033; color: white;">Chu kỳ </th>
                                    <th style="background-color: #ee0033; color: white;">Ưu điểm</th>
            

                                </tr>
                                </thead>

                                <tbody>
                                    @foreach ($goiCuoc as $goi)
                                    <tr>
                                        <td >
                                            {{$goi->ma_goi}}
                                        </td>
                                        <td>
                                            <a class="single-user-name" href="javascript:void(0);">{{$goi->mang}}</a><br>
                                            <small>{{$goi->loai_goi}}</small>
                                        </td>
                                        <td>
                                            <strong style="color: #ee0033">{{$goi->cu_phap}}</strong><br>
                                            <small>Cước phí: {{ number_format($goi->cuoc_phi, 0, ',', '.') }} VNĐ</small>
                                        </td>                                        
                                        <td>{{$goi->dung_luong}}</td>
                                        <td>{{$goi->chu_ky}} ngày</td>
                                        <td>{{ \Illuminate\Support\Str::limit($goi->uu_diem, 30, '...') }}</td>
                                        <td>
                                            <form action="{{ route('xoa_goi_cuoc', $goi->id) }}" method="POST" onsubmit="return confirm('Bạn có chắc muốn xóa không?');">
                                                @csrf
                                                <button type="submit" class="btn btn-danger">Xóa</button>
                                            </form>
                                        </td>
                                        <td>
                                                <a href="{{ route('edit_goi_cuoc', $goi->id) }}" class="btn btn-warning btn-sm">
                                                    Cập nhật
                                                </a>
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="updateModal_{{ $goi->id }}" tabindex="-1" aria-labelledby="updateModalLabel_{{ $goi->id }}" aria-hidden="true">
                                        <div class="modal-dialog modal-lg modal-dialog-centered">
                                            <div class="modal-content">
                                            <div class="modal-header bg-warning text-dark">
                                                <h5 class="modal-title">Cập Nhật Gói Cước</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Đóng"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('update_goi_cuoc', $goi->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')

                                                <div class="mb-3">
                                                    <label class="form-label">Mã Gói</label>
                                                    <input type="text" class="form-control" name="ma_goi" value="{{ $goi->ma_goi }}" required>
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label">Tên Gói</label>
                                                    <input type="text" class="form-control" name="ten_goi" value="{{ $goi->ten_goi }}" required>
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label">Loại Gói</label>
                                                    <select class="form-select" name="loai_goi" required>
                                                    <option value="DATA" {{ $goi->loai_goi == 'DATA' ? 'selected' : '' }}>Data</option>
                                                    <option value="COMBO" {{ $goi->loai_goi == 'COMBO' ? 'selected' : '' }}>Combo</option>
                                                    </select>
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label">Danh Mục</label>
                                                    <select class="form-select" name="danh_muc" required>
                                                    <option value="tra_truoc" {{ $goi->danh_muc == 'tra_truoc' ? 'selected' : '' }}>Trả Trước</option>
                                                    <option value="tra_sau" {{ $goi->danh_muc == 'tra_sau' ? 'selected' : '' }}>Trả Sau</option>
                                                    </select>
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label">Cước Phí</label>
                                                    <input type="number" class="form-control" name="cuoc_phi" value="{{ $goi->cuoc_phi }}" required>
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label">Chu Kỳ</label>
                                                    <input type="number" class="form-control" name="chu_ky" value="{{ $goi->chu_ky }}" required>
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label">Mạng</label>
                                                    <select class="form-select" name="mang" required>
                                                    <option value="4G" {{ $goi->mang == '4G' ? 'selected' : '' }}>4G</option>
                                                    <option value="5G" {{ $goi->mang == '5G' ? 'selected' : '' }}>5G</option>
                                                    </select>
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label">PBH</label>
                                                    <input type="number" class="form-control" name="pbh" step="0.1" value="{{ $goi->pbh }}">
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label">Ưu điểm</label>
                                                    <textarea class="form-control" name="uu_diem" rows="2">{{ $goi->uu_diem }}</textarea>
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label">Cú pháp</label>
                                                    <textarea class="form-control" name="cu_phap" rows="2">{{ $goi->cu_phap }}</textarea>
                                                </div>
    
                                                <div class="text-end">
                                                    <button type="submit" class="btn btn-warning px-4 rounded-pill">Cập Nhật</button>
                                                </div>
                                                
                                                </form>
                                            </div>
                                            </div>
                                        </div>
                                        </div>
                                    @endforeach   
                                </tbody>
                            </table>
                        </div>
                        <ul class="pagination pagination-primary mt-4">
                            <li class="page-item active"><a class="page-link" href="javascript:void(0);">1</a></li>
                            <li class="page-item"><a class="page-link" href="javascript:void(0);">2</a></li>
                            <li class="page-item"><a class="page-link" href="javascript:void(0);">3</a></li>
                            <li class="page-item"><a class="page-link" href="javascript:void(0);">4</a></li>
                            <li class="page-item"><a class="page-link" href="javascript:void(0);">5</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

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