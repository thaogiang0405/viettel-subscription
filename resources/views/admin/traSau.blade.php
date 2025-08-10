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
    /* Font Viettel (nếu không có font gốc, dùng Roboto thay thế) */
    @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap');

    .table-viettel {
        font-family: 'Roboto', sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    .table-viettel thead th {
        background-color: #ee0033;
        color: white;
        font-weight: 600;
        text-align: center;
        vertical-align: middle;
        padding: 12px;
    }

    .table-viettel tbody td {
        vertical-align: middle;
        padding: 10px;
    }

    .table-viettel tbody tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    .table-viettel tbody tr:hover {
        background-color: #ffe5eb;
    }

    /* Breadcrumb Viettel style */
    .breadcrumb-item a {
        color: #ee0033;
        font-weight: 500;
        text-decoration: none;
    }

    .breadcrumb-item.active {
        color: #555;
        font-weight: 500;
    }
</style>
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
                    <h2 style="color: #ee0033; font-weight: 700;">Danh sách gói cước</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index.html"><i class="zmdi zmdi-home"></i> Viettel</a>
                        </li>
                        <li class="breadcrumb-item">Danh sách</li>
                        <li class="breadcrumb-item active">Đăng ký trả sau</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="card project_list">
                        <div class="table-responsive">
                            <table class="table table-hover table-viettel">
                                <thead>
                                    <tr>
                                        <th>Tên</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Tên gói cước</th>
                                        <th>Giá cước</th>
                                        <th>Chu kỳ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($dangKyTraSau as $item)
                                    <tr>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->phone }}</td>
                                        <td>{{ $item->ten_goi }}</td>
                                        <td>{{ number_format($item->cuoc_phi, 0, ',', '.') }} đ</td>
                                        <td>{{ $item->chu_ky }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{-- {{ $dangKyTraSau->links() }} --}}
                    </div>
                </div>
            </div>
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

<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>



</body>


</html>