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
    /* Font Viettel */
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

    /* Nút Viettel */
    .btn-viettel {
        background-color: #ee0033;
        color: white;
        border: none;
    }

    .btn-viettel:hover {
        background-color: #d0002c;
        color: white;
    }

    /* Badge */
    .badge-success {
        background-color: #28a745 !important;
    }
    .badge-secondary {
        background-color: #6c757d;
    }
    .badge-warning {
        background-color: #ffc107;
        color: #000;
    }
    .badge {
        display: inline-block;
        font-size: 13px;
        font-weight: 600;
        border-radius: 12px;
        padding: 5px 12px;
        color: #fff;
    }
        /* Breadcrumb */
    .breadcrumb-item a {
        color: #ee0033;
        font-weight: 500;
        text-decoration: none;
    }

    .breadcrumb-item.active {
        color: #555;
        font-weight: 500;
    }

    /* Input sim nhỏ gọn */
    .sim-input {
        max-width: 120px;
        padding: 4px 6px;
        font-size: 14px;
    }

    .sim-text {
        cursor: pointer;
        color: #007bff;
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


<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2 style="color:#ee0033; font-weight:700;">Danh sách gói cước</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i> Viettel</a></li>
                        <li class="breadcrumb-item">Danh sách</li>
                        <li class="breadcrumb-item active">Đăng ký trả trước</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-md-12">
                    <div class="card project_list">
                        <div class="table-responsive">
                            <table class="table table-hover table-viettel">
                                <thead>
                                <tr>
                                    <th>Khách hàng</th>
                                    <th>Tên gói cước</th>
                                    <th>Số điện thoại</th>
                                    <th>Email</th>
                                    <th>Thời gian đăng ký</th>
                                    <th>Cước phí</th>
                                    <th>Trạng thái</th>
                                    <
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dangKyTraTruoc as $item)
                                <tr>
                                    <td>{{ $item->customer_name }}</td>
                                    <td>{{ $item->ten_goi }}</td>
                                    <td>{{ $item->customer_phone}}</td>
                                    <td>{{ $item->customer_email}}</td>
                                    <td>{{$item->registered_at}}</td>
                                    <td>{{ number_format($item->cuoc_phi, 0, ',', '.') }}đ</td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="badge 
                                                @if($item->status == 'Hoàn thành') badge-success 
                                                @elseif($item->status == 'Chờ xử lý') badge-warning 
                                                @else badge-secondary @endif
                                                dropdown-toggle border-0 change-status-btn" 
                                                type="button" data-id="{{ $item->id }}" 
                                                data-current="{{ $item->status }}" 
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                {{ $item->status }}
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a href="#" class="dropdown-item change-status" data-status="Chờ xử lý">Chờ xử lý</a>
                                                </li>
                                                <li>
                                                    <a href="#" class="dropdown-item change-status" data-status="Hoàn thành">Hoàn thành</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>

                                   
                                </tr>
                                @endforeach
                            </tbody>

                            </table>
                        </div>
                        {{-- {{ $dangKyTraTruoc->links() }} --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
 <script>
                                    document.addEventListener("DOMContentLoaded", function () {
                                        document.querySelectorAll(".change-status").forEach(item => {
                                            item.addEventListener("click", function (e) {
                                                e.preventDefault();
                                                let status = this.dataset.status;
                                                let id = this.closest("td").querySelector(".change-status-btn").dataset.id;

                                                fetch(`/user-package/${id}/status`, {
                                                    method: "PUT",
                                                    headers: {
                                                        "Content-Type": "application/json",
                                                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                                                    },
                                                    body: JSON.stringify({ status: status })
                                                })
                                                .then(res => res.json())
                                                .then(data => {
                                                    if (data.success) {
                                                        let btn = document.querySelector(`[data-id='${id}']`);
                                                        btn.textContent = status;
                                                        btn.classList.remove("badge-success", "badge-warning", "badge-secondary");
                                                        if (status === "Hoàn thành") btn.classList.add("badge-success");
                                                        else if (status === "Chờ xử lý") btn.classList.add("badge-warning");
                                                        else btn.classList.add("badge-secondary");
                                                    } else {
                                                        alert("Cập nhật thất bại!");
                                                    }
                                                });
                                            });
                                        });
                                    });
                                    </script>



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