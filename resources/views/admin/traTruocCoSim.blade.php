<!doctype html>
<html class="no-js " lang="en">


<head>
<meta name="csrf-token" content="{{ csrf_token() }}">
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
                                        <th>Tên gói cước</th>
                                        <th>Sim</th>
                                        <th>Cước phí</th>
                                        <th>Khách hàng</th>
                                        <th>Số điện thoại</th>
                                        <th>CMND/CCCD</th>
                                        <th>Địa chỉ</th>
                                        <th>Ngày đăng ký</th>
                                        <th>Trạng thái</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($dangKyTraTruoc as $item)
                                    <tr>
                                        <td>{{ $item->ten_goi }}</td>
                                        <td>
                                            <span class="sim-text" data-id="{{ $item->id }}">{{ $item->sim }}</span>
                                            <input type="text" class="sim-input form-control" data-id="{{ $item->id }}" value="{{ $item->sim }}" style="display:none;">
                                        </td>
                                        <td>{{ number_format($item->cuoc_phi, 0, ',', '.') }}đ</td>
                                        <td>{{ $item->customer_name }}</td>
                                        <td>{{ $item->customer_phone }}</td>
                                        <td>{{ $item->cmnd_cccd }}</td>
                                        <td>{{ $item->dia_chi }}</td>
                                        <td>{{ $item->registered_at }}</td>
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function () {

    // ====== SỬA SỐ SIM ======
    $(".sim-text").on("click", function () {
        let id = $(this).data("id");
        let status = $(".change-status-btn[data-id='" + id + "']").text().trim();

        // Nếu đang Hoàn thành thì chặn không cho sửa
        if (status === "Hoàn thành") {
            alert("Không thể sửa số sim khi đã Hoàn thành! Vui lòng đổi trạng thái sang 'Chờ xử lý' trước.");
            return;
        }

        // Ẩn text, hiện input
        $(this).hide();
        $(".sim-input[data-id='" + id + "']").show().focus();
    });


    // ====== ĐỔI TRẠNG THÁI ======
    $(".change-status").on("click", function (e) {
        e.preventDefault();

        let id = $(this).closest(".dropdown").find(".change-status-btn").data("id");
        let newStatus = $(this).data("status");

        $.ajax({
            url: "{{ url('dang-ky-tra-truoc/update-sim-status') }}/" + id,
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                status: newStatus
            },
            success: function (res) {
                if (res.success) {
                    let btn = $(".change-status-btn[data-id='" + id + "']");
                    btn.text(newStatus);

                    // đổi màu badge theo trạng thái
                    btn.removeClass("badge-success badge-warning badge-secondary");
                    if (newStatus === "Hoàn thành") {
                        btn.addClass("badge-success");
                    } else if (newStatus === "Chờ xử lý") {
                        btn.addClass("badge-warning");
                    } else {
                        btn.addClass("badge-secondary");
                    }
                } else {
                    alert("Lỗi: " + res.message);
                }
            },
            error: function () {
                alert("Có lỗi xảy ra khi cập nhật trạng thái!");
            }
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