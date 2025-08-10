<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Xác thực OTP</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .otp-wrapper {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .otp-card {
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            max-width: 400px;
            width: 100%;
        }
    </style>
</head>
<body>

<div class="otp-wrapper">
    <div class="otp-card">
        <div class="text-center mb-4">
            <img src="/images/viettel-logo.png" alt="Viettel" width="100">
            <h3 class="mt-3">Nhập mã OTP</h3>
            <p>Chúng tôi đã gửi mã OTP tới email của bạn.</p>
        </div>

        @if(session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('otp.verify') }}">
            @csrf
            <div class="mb-3">
                <label for="otp" class="form-label">Mã OTP</label>
                <input type="text" name="otp" id="otp" class="form-control" placeholder="Nhập mã OTP" required>
            </div>
            <button type="submit" class="btn btn-danger w-100 mb-2">Xác nhận</button>
        </form>

        <form method="POST" action="{{ route('otp.resend') }}">
            @csrf
            <button type="submit" class="btn btn-secondary w-100">Gửi lại mã OTP</button>
        </form>
    </div>
</div>

</body>
</html>
