<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Giới thiệu - Viettel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">

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

    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/dashboard.css" rel="stylesheet">
<style>
   .image-anh-size {
    width: 100%;
    aspect-ratio: 1/1;  /* Tạo ảnh vuông, luôn full cột */
    object-fit: cover;  /* Cắt ảnh nhưng vẫn giữ tỉ lệ */
    border-radius: 8px;
   }
    .map-responsive {
  overflow: hidden ;
  padding-bottom: 56.25%;
  position: relative;
  height: 0;
}

    .map-responsive iframe {
    left: 0;
    top: 0;
    height: 100%;
    width: 100%;
    position: absolute;
    border: 0;
    }

</style>
</head>
<body>
@include('auth.header')
<!-- Section 1 -->
<div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">       
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <img class="img-fluid w-100" src="/images/about.jpg" alt="">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <h6 class="section-title bg-white text-start text-danger pe-3">Giới thiệu Viettel Telecom</h6>
                    <h1 class="mb-4">Chào mừng đến với <span class="text-danger">Viettel</span> – Kết nối mọi nhà</h1>
                    <p class="mb-4">Tại sao hàng triệu khách hàng tin chọn Viettel mỗi ngày?</p>
                    <div class="row gy-2 gx-4 mb-4">
						<div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-danger me-2"></i>Gói cước linh hoạt – Theo ngày, tuần, tháng, năm</p>
                        </div>
						<div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-danger me-2"></i>Tốc độ cao – Truy cập Internet mượt mà</p>
                        </div>
						<div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-danger me-2"></i>Giá cả hợp lý – Phù hợp mọi nhu cầu</p>
                        </div>
          
                        <div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-danger me-2"></i>Đăng ký dễ dàng chỉ với 1 cú click</p>
                        </div>
         
                        <div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-danger me-2"></i>Tặng thêm dung lượng – Khuyến mãi liên tục</p>
                        </div>
              <div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-danger me-2"></i>Đội ngũ hỗ trợ 24/7 – Luôn bên bạn</p>
                        </div>
						 <p class="mb-4"></p>
                        <p class="mb-4">
                                  Hãy chọn gói cước yêu thích và bắt đầu hành trình kết nối không giới hạn cùng Viettel ngay hôm nay!
                        </p>
						 
                    </div>
                
                </div>
            </div>
        </div>
    </div>

<div class="container mt-5">
  <h2 class="section-title-custom text-center mb-4 wow fadeInUp">Vị trí cửa hàng Viettel Liên Chiểu</h2>
  <div class="map-responsive">
    <iframe
      src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d455.97253351115893!2d108.14957146304464!3d16.073791493249107!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3142199bf5d19399%3A0xc1a7767ab99e6d87!2zQ-G7rWEgaMOgbmcgVmlldHRlbCBMacOqbiBDaGnhu4N1!5e0!3m2!1svi!2sus!4v1758900330272!5m2!1svi!2sus"
      width="100%"
      height="400"
      style="border:0;"
      allowfullscreen=""
      loading="lazy"
      referrerpolicy="no-referrer-when-downgrade"
    ></iframe>
  </div>
</div>


<!-- Section 2 -->
<!-- Section 2: Mạng lưới rộng khắp -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                <div style="text-align: center;">
                    <h6 class="section-title bg-white text-center text-primary px-3">Mạng lưới rộng khắp</h6>
                </div>
                <div style="text-align: justify;">
                    <p class="mb-4">
                        Với sứ mệnh “Sáng tạo vì con người”, Viettel không ngừng mở rộng hạ tầng, đưa dịch vụ viễn thông đến gần hơn với mọi người dân Việt Nam. Dù bạn ở thành phố nhộn nhịp, miền quê yên bình hay vùng núi xa xôi, Viettel vẫn đảm bảo đường truyền mạnh mẽ, ổn định.
                    </p>
                    <p class="mb-4">
                        Với hơn <strong>120.000 trạm phát sóng</strong> trải dài khắp 63 tỉnh thành và hàng trăm đội ngũ kỹ thuật sẵn sàng hỗ trợ 24/7, Viettel tự tin mang đến chất lượng dịch vụ tốt nhất cho hàng chục triệu khách hàng cá nhân và doanh nghiệp. Việc đăng ký các gói cước trở nên dễ dàng hơn bao giờ hết, chỉ với vài cú click trên website, ứng dụng hoặc tại cửa hàng gần bạn.
                    </p>
                    <p class="mb-4">
                        Chúng tôi không chỉ kết nối mọi người qua đường truyền Internet tốc độ cao và mạng di động mạnh mẽ, mà còn giúp khách hàng tận hưởng các ưu đãi hấp dẫn, đa dạng gói cước phù hợp với từng nhu cầu sử dụng: gọi thoại, SMS, data, combo…
                    </p>
                </div>
            </div>
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="row gy-4 g-4">
                    <div class="col-4"><img class="img-fluid image-anh-size" src="images/network1.jpg" alt=""></div>
                    <div class="col-4"><img class="img-fluid image-anh-size" src="images/network2.jpg" alt=""></div>
                    <div class="col-4"><img class="img-fluid image-anh-size" src="images/network3.jpg" alt=""></div>
                    <div class="col-4"><img class="img-fluid image-anh-size" src="images/network4.jpg" alt=""></div>
                    <div class="col-4"><img class="img-fluid image-anh-size" src="images/network5.png" alt=""></div>
                    <div class="col-4"><img class="img-fluid image-anh-size" src="images/network6.jpg" alt=""></div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Section 3: Công nghệ tiên tiến -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="row g-4">
                    <div class="col-4"><img class="img-fluid image-anh-size" src="images/service1.jpg" alt=""></div>
                    <div class="col-4"><img class="img-fluid image-anh-size" src="images/service2.jpg" alt=""></div>
                    <div class="col-4"><img class="img-fluid image-anh-size" src="images/service3.jpg" alt=""></div>
                    <div class="col-4"><img class="img-fluid image-anh-size" src="images/service4.jpg" alt=""></div>
                    <div class="col-4"><img class="img-fluid image-anh-size" src="images/service5.jpg" alt=""></div>
                    <div class="col-4"><img class="img-fluid image-anh-size" src="images/service6.jpg" alt=""></div>
                </div>
            </div>
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                <div style="text-align: center;">
                    <h6 class="section-title bg-white text-center text-primary px-3">Công nghệ tiên tiến</h6>
                </div>
                <div style="text-align: justify;">
                    <p class="mb-4">
                        Luôn đi đầu trong công cuộc chuyển đổi số, Viettel không chỉ mang đến những gói cước viễn thông linh hoạt mà còn áp dụng các công nghệ hiện đại nhất như <strong>5G, trí tuệ nhân tạo (AI), Internet vạn vật (IoT)</strong> để phục vụ khách hàng.
                    </p>
                    <p class="mb-4">
                        Với nền tảng công nghệ tiên tiến, Viettel cung cấp hệ thống đăng ký gói cước trực tuyến thông minh, giúp bạn dễ dàng lựa chọn và đăng ký các gói phù hợp chỉ trong vài giây. Ngoài ra, bạn có thể theo dõi dung lượng, thời hạn và quản lý gói cước ngay trên website hoặc ứng dụng MyViettel.
                    </p>
                    <p class="mb-4">
                        Đội ngũ chăm sóc khách hàng tận tâm, phục vụ 24/7, sẵn sàng tư vấn cho bạn gói cước phù hợp nhất với nhu cầu sử dụng: từ gói chỉ data, gói combo thoại – data, đến các gói dành cho khách hàng trả sau.
                    </p>
                    <p class="mb-4">
                        Với Viettel, kết nối của bạn không chỉ nhanh chóng – ổn định – tiết kiệm, mà còn là một trải nghiệm dịch vụ hoàn hảo, đồng hành cùng bạn trong từng khoảnh khắc.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                <div style="text-align: center;">
                    <h6 class="section-title bg-white text-center text-primary px-3">Chăm sóc tận tâm</h6>
                </div>
                <div style="text-align: justify;">
                    <p class="mb-4">
                        Tại Viettel, khách hàng luôn là trung tâm của mọi hoạt động. Chúng tôi xây dựng hệ thống tổng đài hỗ trợ <strong>24/7</strong> với đội ngũ nhân viên chuyên nghiệp, tận tình sẵn sàng giải đáp mọi thắc mắc và xử lý yêu cầu nhanh chóng.
                    </p>
                    <p class="mb-4">
                        Bất kể bạn cần tư vấn gói cước, hướng dẫn đăng ký, hỗ trợ kỹ thuật hay phản hồi dịch vụ, chỉ cần liên hệ qua hotline 18008098 hoặc ứng dụng MyViettel, chúng tôi sẽ đồng hành cùng bạn mọi lúc, mọi nơi.
                    </p>
                    <p class="mb-4">
                        Ngoài ra, hệ thống cửa hàng Viettel phủ khắp toàn quốc luôn chào đón bạn với đội ngũ nhân viên thân thiện và dịch vụ chuyên nghiệp, đảm bảo mang đến trải nghiệm hài lòng nhất.
                    </p>
                </div>
            </div>
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="row gy-4 g-4">
                    <div class="col-4"><img class="img-fluid image-anh-size" src="images/cskh1.jpg" alt=""></div>
                    <div class="col-4"><img class="img-fluid image-anh-size" src="images/cskh2.jpg" alt=""></div>
                    <div class="col-4"><img class="img-fluid image-anh-size" src="images/cskh3.jpg" alt=""></div>
                    <div class="col-4"><img class="img-fluid image-anh-size" src="images/cskh4.jpg" alt=""></div>
                    <div class="col-4"><img class="img-fluid image-anh-size" src="images/cskh5.jpg" alt=""></div>
                    <div class="col-4"><img class="img-fluid image-anh-size" src="images/cskh6.jpg" alt=""></div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="row g-4">
                    <div class="col-4"><img class="img-fluid image-anh-size" src="images/uudai1.jpg" alt=""></div>
                    <div class="col-4"><img class="img-fluid image-anh-size" src="images/uudai2.jpg" alt=""></div>
                    <div class="col-4"><img class="img-fluid image-anh-size" src="images/uudai3.jpg" alt=""></div>
                    <div class="col-4"><img class="img-fluid image-anh-size" src="images/uudai4.jpg" alt=""></div>
                    <div class="col-4"><img class="img-fluid image-anh-size" src="images/uudai5.jpg" alt=""></div>
                    <div class="col-4"><img class="img-fluid image-anh-size" src="images/uudai6.jpg" alt=""></div>
                </div>
            </div>
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                <div style="text-align: center;">
                    <h6 class="section-title bg-white text-center text-primary px-3">Ưu đãi hấp dẫn</h6>
                </div>
                <div style="text-align: justify;">
                    <p class="mb-4">
                        Viettel luôn mang đến cho khách hàng những <strong>ưu đãi đặc biệt</strong> nhằm tri ân và khuyến khích người dùng trải nghiệm dịch vụ. Hàng tuần, hàng tháng chúng tôi triển khai nhiều chương trình khuyến mãi: tặng data, giảm giá gói cước, tặng phút gọi, SMS miễn phí…
                    </p>
                    <p class="mb-4">
                        Khi đăng ký gói cước trực tuyến tại website hoặc ứng dụng MyViettel, khách hàng còn có cơ hội nhận thêm những phần quà giá trị và ưu đãi độc quyền.
                    </p>
                    <p class="mb-4">
                        Chúng tôi cam kết luôn đổi mới chương trình ưu đãi để khách hàng cảm thấy hài lòng và yên tâm sử dụng dịch vụ lâu dài.
                    </p>
                    <p class="mb-4">
                        Hãy cập nhật thường xuyên để không bỏ lỡ những ưu đãi hấp dẫn từ Viettel nhé!
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
@include('auth.footer')
</html>
