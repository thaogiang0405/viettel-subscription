<!DOCTYPE html>
<html lang="vi">
    <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard TL SOHU</title>

    <!-- Favicon -->
    <link rel="icon" href="img/favicon.ico">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">

    <!-- Bootstrap core -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Icon Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries -->
    <link href="{{ asset('lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" rel="stylesheet" />

    <!-- Template Styles -->
    <link href="css/style.css" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <!-- Your Custom Styles (always put at the end so they override defaults) -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/dashboard.css" rel="stylesheet">
    

</head>

<body>

@include('auth.header')
<div id="dg" class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container">
        <div class="text-center">
            <h6 class="section-title bg-white text-center text-danger px-3">Đánh giá</h6>
            <h1 class="mb-5">Khách hàng nói gì về Viettel?</h1>
        </div>
        <div class="owl-carousel testimonial-carousel position-relative">
            <div class="testimonial-item bg-white text-center border p-4">
                <img class="bg-white rounded-circle shadow p-1 mx-auto mb-3" src="images/testimonial-3.jpg" style="width: 80px; height: 80px;">
                <h5 class="mb-0">Khánh Lê</h5>
                <p>Đà Nẵng, Việt Nam</p>
                <p class="mb-0">Tôi đã dùng nhiều nhà mạng, nhưng Viettel vẫn là ổn định nhất. Giao diện đăng ký gói rất dễ dùng và tiện lợi.</p>
            </div>
            <div class="testimonial-item bg-white text-center border p-4">
                <img class="bg-white rounded-circle shadow p-1 mx-auto mb-3" src="images/testimonial-2.jpg" style="width: 80px; height: 80px;">
                <h5 class="mb-0">Mỹ Dung</h5>
                <p>Quảng Bình, Việt Nam</p>
                <p class="mt-2 mb-0">Gói combo của Viettel rất tiện – vừa gọi, vừa lướt web thoải mái. Đăng ký chỉ mất vài giây.</p>
            </div>
            <div class="testimonial-item bg-white text-center border p-4">
                <img class="bg-white rounded-circle shadow p-1 mx-auto mb-3" src="images/testimonial-1.jpg" style="width: 80px; height: 80px;">
                <h5 class="mb-0">Thảo Giang</h5>
                <p>Quảng Nam, Việt Nam</p>
                <p class="mt-2 mb-0">Tôi đăng ký gói tháng mỗi khi đi công tác, tốc độ mạng ổn định và giá rẻ hơn mong đợi.</p>
            </div>
            <div class="testimonial-item bg-white text-center border p-4">
                <img class="bg-white rounded-circle shadow p-1 mx-auto mb-3" src="images/testimonial-4.jpg" style="width: 80px; height: 80px;">
                <h5 class="mb-0">Nhất Phương</h5>
                <p>Huế, Việt Nam</p>
                <p class="mt-2 mb-0">Mình thích sự hỗ trợ 24/7 và những chương trình khuyến mãi hấp dẫn. Viettel quá tuyệt vời!</p>
            </div>
            <div class="testimonial-item bg-white text-center border p-4">
                <img class="bg-white rounded-circle shadow p-1 mx-auto mb-3" src="images/testimonial-5.jpg" style="width: 80px; height: 80px;">
                <h5 class="mb-0">Thu Trang</h5>
                <p>Quảng Nam, Việt Nam</p>
                <p class="mb-0">Dịch vụ của Viettel rất đáng tin cậy. Mình đăng ký gói combo data cho cả gia đình, vừa tiết kiệm vừa tiện lợi.</p>
            </div>

        </div>
    </div>
</div>





@include('auth.footer')
<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
  const swiper = new Swiper(".mySwiper", {
    loop: true,
    autoplay: {
      delay: 4000,
      disableOnInteraction: false,
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
  });
</script>
<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('lib/wow/wow.min.js') }}"></script>
<script src="{{ asset('lib/easing/easing.min.js') }}"></script>
<script src="{{ asset('lib/waypoints/waypoints.min.js') }}"></script>
<script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>
<script src="{{ asset('lib/tempusdominus/js/moment.min.js') }}"></script>
<script src="{{ asset('lib/tempusdominus/js/moment-timezone.min.js') }}"></script>
<script src="{{ asset('lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}"></script>

<!-- Template Javascript -->
<script src="{{ asset('js/main.js') }}"></script>
    
</body>
</html>