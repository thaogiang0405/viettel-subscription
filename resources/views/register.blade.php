<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đăng ký Viettel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Animate -->
    <link href="{{ asset('lib/animate/animate.min.css') }}" rel="stylesheet">
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background-color: #f8f9fa;
        }
        .register-wrapper {
            background: linear-gradient(rgba(15,23,43,0.7), rgba(15,23,43,0.7)), url('/images/banner2.jpg') center/cover no-repeat;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .register-card {
            background: rgba(255, 255, 255, 0.95);
            padding: 20px 30px;
            border-radius: 10px;
            max-width: 500px;
            width: 100%;
        }
        .register-card h3 {
            color: #d9534f;
        }
        .btn-primary {
            background-color: #d9534f;
            border: none;
        }
        .btn-primary:hover {
            background-color: #c9302c;
        }
    </style>
</head>
<body>

<div class="register-wrapper wow fadeInUp" data-wow-delay="0.1s">
    <div class="register-card shadow">
        <div class="text-center mb-4">
            <img src="/images/viettel-logo.png" alt="Viettel" width="120">
            <h3 class="mt-3">Đăng Ký</h3>
        </div>

        <form method="POST" action="{{ route('register.submit') }}">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Họ tên</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Nhập họ tên" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control" id="email" name="email" placeholder="Nhập email/SĐT" required>
            </div>

            <div class="mb-3">
                <label for="phone" class="form-label">Số điện thoại</label>
                <input type="text" class="form-control" id="phone" name="phone" placeholder="Nhập số điện thoại" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Mật khẩu</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Nhập mật khẩu" required>
            </div>

            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Xác nhận mật khẩu</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Nhập lại mật khẩu" required>
            </div>

            <button type="submit" class="btn btn-primary w-100 py-2">Đăng Ký</button>

            <div class="text-center mt-3">
                <p>Đã có tài khoản? <a href="{{ route('login') }}">Đăng nhập</a></p>
            </div>
        </form>

        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('lib/wow/wow.min.js') }}"></script>
<script> new WOW().init(); </script>
</body>
</html>
