<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
@extends('Admin.index')
@section('content')
<style>
.form-container {
  border: 1px solid #ccc;
  padding: 20px;
  border-radius: 10px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.form-container label {
  font-weight: bold;
}
</style>
<main>
  <!-- Giao diện Account Setting -->
  <div class="container mt-5">
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{ session('success') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <div class="row">
      <div class="col">
        <div class="row">
          <div class="col-4"></div>
          <h1 class="col-4" style="color: var(--dark)">Account Setting</h1>
          <div class="col-4"></div>
        </div>
        <form class="form-container" action="" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="form-group row">
            <div class="form-group col-3">
              <label for="avatar" style="color: var(--dark)">Avatar:</label>
              <input type="file" class="form-control-file" id="avatar" name="avatar">
            </div>
            <div class="image-preview col-9">
              <!-- Thẻ img để hiển thị ảnh -->
              <img id="previewImage" src="{{ $accountSetting->avatar }}" alt="Preview"
                style="max-width: 300px; max-height: 300px;">
            </div>
          </div>
          <div class="form-group mt-4">
            <label for="name" style="color: var(--dark)">Name:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $accountSetting->name }}">
          </div>
          <div class="form-group">
            <label for="email" style="color: var(--dark)">Email:</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $accountSetting->email }}">
          </div>
          <!-- password -->
          <div class="row">
            <div class="form-group col-6">
              <label for="password" style="color: var(--dark)">Password:</label>
              <input type="password" class="form-control" id="password" name="password">
            </div>
            <!-- confirm password -->
            <div class="form-group col-6">
              <label for="password_record" style="color: var(--dark)">Confirm Password:</label>
              <input type="password" class="form-control" id="password_record" name="password_record">
            </div>
          </div>
          <!-- Add more form fields for other settings if needed -->

          <button type="submit" class="btn btn-primary">Save Changes</button>
        </form>
        <hr>
        @if(Auth::user()->role <= 2)
        <form class="form-container" action="" enctype="multipart/form-data">
          <div class="form-group">
            <label for="so_lan_dang_bai" style="color: var(--dark)">Số lần đăng bài còn lại:</label>
            <input type="text" class="form-control" id="so_lan_dang_bai" name="so_lan_dang_bai" value="{{ $accountSetting->so_lan_dang_bai}}" disabled>
          </div>          
          <div class="form-group">
            <label for="so_ngay_dang_bai" style="color: var(--dark)"> {{ $isExpired ? 'Tài khoản của bạn đã hết thời gian đăng bài' : 'Thời hạn gia hạn: ' . $expirationDate->format('d/m/Y') }}</label>
            <input type="hidden" class="form-control" id="so_ngay_dang_bai" name="so_ngay_dang_bai" value="{{ $accountSetting->so_ngay_dang_bai}">
          </div>
        </form>
        @endif
        <hr>
        @if($accountSetting->veryfi == 0)
        <div class="container mt-5">
          <div class="row">
            <!-- Cột bên trái -->
            <div class="col-md-6">
              <div class="card">
                <img
                  src="https://ephoto360.com/uploads/worigin/2020/05/21/taoanhdaidienfacebookcodautichxanh5ec5f3ddd0c11_1e7656c5bc025b122ec2c77ab62d70c3.jpg"
                  class="card-img-top" alt="Mua gói tích xanh">
                <div class="card-body text-center">
                  <h1 class="card-title">Mua gói tích xanh</h1>
                  <p class="card-text">100.000đ</p>
                  <form action="/admin/setting/muagoitichxanh" method="POST">
                    @csrf
                    <input type="hidden" name="total_momo" value="">
                    <button type="submit" class="btn btn-primary" name="payUrl">Mua ngay</button>
                  </form>
                </div>
              </div>
            </div>

            <!-- Cột bên phải -->
            <div class="col-md-6">
              <div class="card">
                <img
                  src="https://ephoto360.com/uploads/worigin/2020/05/21/taoanhdaidienfacebookcodautichxanh5ec5f3ddd0c11_1e7656c5bc025b122ec2c77ab62d70c3.jpg"
                  class="card-img-top" alt="Đăng ký tích xanh">
                <div class="card-body text-center">
                  <h1 class="card-title">Đăng ký tích xanh</h1>
                  <p class="card-text">Nếu tích cực đóng góp, bạn có thể lựa chọn đăng ký</p>
                  @if($accountSetting->yeuCau == 0)
                  <button type="button" class="btn btn-primary"><a style="color:var(--light)"
                      href="/admin/setting/dangkytichxanh">Đăng Ký</a></button>
                  @else
                  <button type="button" class="btn btn-primary"><a style="color:var(--light)" href="">Đã đăng
                      ký</a></button>
                  @endif
                </div>
              </div>
            </div>
          </div>
        </div>
        @endif





        @if(Auth::user()->role <= 2)
        <div class="container mt-5">
          <div class="row">
            <!-- Cột bên trái -->
            <div class="col-md-6">
              <div class="card">
                <img
                  src="https://hocban.vn/wp-content/uploads/2017/01/Blog-va-cuoc-song-featured-Image.png"
                  class="card-img-top" alt="Mua đăng bài">
                <div class="card-body text-center">
                  <h1 class="card-title">Mua Gói 30 lần đăng bài</h1>
                  <p class="card-text">69.000đ</p>
                  <form action="/admin/setting/muagoisolandangbai" method="POST">
                    @csrf
                    <input type="hidden" name="total_momo_solan" value="">
                    <button type="submit" class="btn btn-primary" name="payUrl">Mua ngay</button>
                  </form>
                </div>
              </div>
            </div>

            <!-- Cột bên phải -->
            <div class="col-md-6">
              <div class="card">
                <img
                  src="https://hocban.vn/wp-content/uploads/2017/01/Blog-va-cuoc-song-featured-Image.png"
                  class="card-img-top" alt="Mua Đăng bài">
                <div class="card-body text-center">
                  <h1 class="card-title">Mua Gói Đăng Bài 30 Ngày</h1>
                  <p class="card-text">300.000đ</p>
                  <form action="/admin/setting/muagoithangdangbai" method="POST">
                    @csrf
                    <input type="hidden" name="total_momo_sothang" value="">
                    <button type="submit" class="btn btn-primary" name="payUrl">Mua ngay</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        @endif
      </div>
    </div>
  </div>
</main>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
  // Bắt sự kiện khi người dùng chọn ảnh
  $('#avatar').change(function() {
    // Lấy file ảnh người dùng đã chọn
    var file = this.files[0];

    if (file) {
      // Tạo đường dẫn để hiển thị ảnh ngay lập tức
      var reader = new FileReader();

      reader.onload = function(e) {
        // Gán đường dẫn vào thẻ img
        $('#previewImage').attr('src', e.target.result);
        $('#previewImage').show(); // Hiển thị ảnh
      }

      reader.readAsDataURL(file);
    } else {
      // Ẩn ảnh nếu người dùng không chọn ảnh
      $('#previewImage').hide();
    }
  });
});
</script>
@endsection