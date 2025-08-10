<style>
.card-custom {
  max-width: 320px;
  background-color: #d7132a; /* đỏ đậm */
  border-radius: 20px;
  color: white;
  padding: 25px 20px;
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  box-shadow: 0 10px 25px rgb(215 19 42 / 0.4);
  margin: 0 auto;
  text-align: center;
}

.card-custom h2 {
  font-weight: 700;
  font-size: 1.4rem;
  margin-bottom: 15px;
}

.card-into {
  background-color: white;
  border-radius: 15px;
  width: 100%;
  padding: 20px;
  box-sizing: border-box;
  color: #333;
  margin-bottom: 15px;
  text-align: left;
}
.card-custom .price {
  font-weight: 900;
  font-size: 2rem;
  margin-bottom: 8px;
}

.card-custom .cycle {
  font-weight: 500;
  font-size: 1rem;
  margin-bottom: 15px;
  color: #f0cbd2;
} 
.card-custom .description {
  font-weight: 400;
  font-size: 0.9rem;
  line-height: 1.4;
  color: #555; /* đổi màu cho dễ đọc */
  margin-bottom: 25px;
  text-align: left;
  white-space: pre-line;
}

.btn-register-custom {
  background-color: #d7132a;
  border: none;
  border-radius: 10px;
  padding: 12px 0;
  font-weight: 800;
  font-size: 1rem;
  color: white;
  width: 100%;
  cursor: pointer;
  box-shadow: 0 5px 15px rgb(215 19 42 / 0.6);
  transition: background-color 0.3s ease;
}

.btn-register-custom:hover {
  background-color: #a50f21;
}
</style>


<div class="card-custom">
  <h2>{{$goi->ten_goi}}</h2>
  <div class="card-into">
  <div class="price">{{ $goi->cuoc_phi }}</div>
  <div class="cycle">Chu kỳ: {{ $goi->chu_ky }} </div>
  <div class="description">
    Dung lượng: 6GB/ngày GB
    1GB data tốc độ cao dùng trong 24h, tạm dừng truy cập khi hết data không phát sinh phí, linh hoạt không cam kết dài hạn, áp dụng cho thuê bao trả trước và trả sau.
  </div>
  <button class="btn-register-custom">Đăng ký ngay</button>
  </div>
</div>
