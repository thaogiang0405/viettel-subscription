<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Câu Hỏi Thường Gặp</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <style>
    body {
        background-color: #f5f7fa;
    }

    section.content {
        background-color: #ffffff;
        border-radius: 12px;
        padding: 30px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.06);
    }

    .accordion-button {
        background-color: #f0f4f8;
        font-weight: 500;
    }

    .accordion-button:not(.collapsed) {
        background-color: #dbeafe;
        color: #0c4a6e;
    }

    .accordion-body {
        background-color: #f9fbfc;
        border-top: 1px solid #e2e8f0;
    }
</style>

</head>
<body>

@include('auth.header')

<section class="content my-5">
    <div class="container">
        <h2 class="mb-4">Câu Hỏi Thường Gặp</h2>
        <div class="accordion" id="faqAccordion">

            <div class="accordion-item">
                <h2 class="accordion-header" id="heading1">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1">
                        1. Làm thế nào để kiểm tra các gói Mobile Internet?
                    </button>
                </h2>
                <div id="collapse1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        Bạn có thể soạn tin <strong>KT MI gửi 191</strong> hoặc đăng nhập ứng dụng MyViettel để kiểm tra chi tiết các gói Mobile Internet hiện đang sử dụng hoặc khả dụng cho thuê bao của bạn.
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="heading2">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2">
                        2. Cách đăng ký gói cước 4G như thế nào?
                    </button>
                </h2>
                <div id="collapse2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        Bạn có thể soạn tin theo cú pháp <strong>TÊN-GÓI gửi 191</strong>. Ví dụ: MIMAX90 gửi 191. Ngoài ra, có thể đăng ký trên website hoặc ứng dụng MyViettel.
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="heading3">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3">
                        3. Thuê bao di động muốn đổi sim 4G thì làm thế nào?
                    </button>
                </h2>
                <div id="collapse3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        Bạn cần mang CMND/CCCD ra cửa hàng Viettel gần nhất để được hỗ trợ đổi SIM miễn phí sang SIM 4G.
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="heading4">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse4">
                        4. Tôi không đăng nhập được app MyViettel
                    </button>
                </h2>
                <div id="collapse4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        Vui lòng kiểm tra kết nối Internet, đảm bảo bạn đã cập nhật phiên bản mới nhất của app MyViettel. Nếu vẫn không được, hãy liên hệ tổng đài 18008098 để được hỗ trợ.
                    </div>
                </div>
            </div>

    

            <div class="accordion-item">
                <h2 class="accordion-header" id="heading6">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse6">
                        5. Tôi muốn biết thông tin các gói sản phẩm của Viettel thì làm thế nào?
                    </button>
                </h2>
                <div id="collapse6" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        Bạn có thể truy cập website <a href="https://vietteltelecom.vn" target="_blank">vietteltelecom.vn</a>, hoặc gọi 18008098 để được tư vấn. Ngoài ra, bạn có thể tra cứu qua *098# ngay trên điện thoại.
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="heading7">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse7">
                        6. Tôi có thể sử dụng tiện ích Lời nhắn thoại bằng cách nào?
                    </button>
                </h2>
                <div id="collapse7" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        Khi thuê bao không liên lạc được, hệ thống sẽ tự động ghi âm lời nhắn thoại. Bạn có thể đăng ký dịch vụ này qua tổng đài hoặc app MyViettel.
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="heading8">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse8">
                        7. Làm thế nào để tôi có thể nghe lại lời nhắn thoại?
                    </button>
                </h2>
                <div id="collapse8" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        Bạn gọi đến số 1525 và làm theo hướng dẫn để nghe lại các lời nhắn được lưu trữ.
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="heading9">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse9">
                        8. Tôi muốn tra cứu các CTKM thoại, SMS, Data thì làm thế nào?
                    </button>
                </h2>
                <div id="collapse9" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        Để tra cứu chương trình khuyến mãi, bạn bấm <strong>*098#</strong> rồi nhấn Gọi. Hệ thống sẽ hiển thị các gói ưu đãi tốt nhất theo từng thuê bao. <br><br>
                        <strong>Lưu ý:</strong> Nội dung trả về từ *098# là những chương trình có ưu đãi lớn nhất và rẻ nhất theo từng thuê bao, có thể khác với thông tin trên website.
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
@include('auth.footer')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
