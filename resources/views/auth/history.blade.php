<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <link rel="stylesheet" href="{{ asset('css/header.css') }}">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
</head>
<body>
    @include('auth.header')

<div class="container">
    <h2>Lịch sử đăng ký gói cước</h2>

    @if (count($histories) > 0)
        <table class="table table-bordered mt-3">
            <thead class="thead-dark">
                <tr>
                    <th>Tên gói cước</th>
                    <th>Giá</th>
                    <th>Data</th>
                    <th>Thời gian đăng ký</th>
                    <th>Hết hạn</th>
                    <th>Trạng thái</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($histories as $history)
                    <tr>
                        <td>{{ $history->package->name }}</td>
                        <td>{{ number_format($history->package->price) }} đ</td>
                        <td>{{ $history->package->data_amount }}</td>
                        <td>{{ \Carbon\Carbon::parse($history->registered_at)->format('d/m/Y H:i') }}</td>
                        <td>
                            {{ \Carbon\Carbon::parse($history->registered_at)->addDays((int) $history->package->duration)->format('d/m/Y H:i') }}
                        </td>
                        <td>
                            @if ($history->status === 'Đang hoạt động')
                            <span class="badge badge-success" style="color: green;">Đang hoạt động</span>
                            @else
                                <span class="badge badge-secondary" style="color: red;">Đã hết hạn</span>
                            @endif
                        </td>
                        <td>
                            @if ($history->status === 'Đang hoạt động')
                                <form action="{{ route('packages.cancel', $history->id) }}" method="POST" onsubmit="return confirm('Bạn có chắc muốn hủy gói này không?');">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-danger btn-sm">Hủy</button>
                                </form>
                                <span>-</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Không có lịch sử đăng ký nào.</p>
    @endif
</div>
</body>
</html>