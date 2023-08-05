<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
@extends('Admin.index')
@section('content')
<main>
  <!-- Giao diện sửa tin tức -->
  <div class="container mt-5">
    <div class="row">
      <div class="col">
        <div class="row">
          <h1 class="col-3" style="color: var(--dark)">Sửa Tin Tức</h1>
          <div class="col-8"></div>
          <a href="/admin/quanlytintuc/xoa/{{$tintuc->id}}" class="btn btn-danger mt-4 col-1">Xóa</a>
        </div>
        <form action="" method="post" enctype="multipart/form-data">
          @csrf
          <div class="form-group mt-4">
            <label for="tieuDe" style="color: var(--dark)">Tiêu đề:</label>
            <input type="text" class="form-control" id="tieuDe" name="tieuDe" value="{{$tintuc->tieuDe}}">
          </div>
          <div class="form-group row">
            <div class="form-group col-3">
              <label for="urlHinh" style="color: var(--dark)">Ảnh:</label>
              <input type="file" class="form-control-file" id="urlHinh" name="urlHinh">
            </div>
            <div class="image-preview col-9">
              <!-- Thẻ img để hiển thị ảnh -->
              <img id="previewImage" src="#" alt="Preview" style="display: none; max-width: 300px; max-height: 300px;">
            </div>
          </div>
          <div class="form-group">
            <label for="tomTat" style="color: var(--dark)">Tóm tắt:</label>
            <textarea class="form-control" id="tomTat" name="tomTat" rows="3">{{$tintuc->tomTat}}</textarea>
          </div>
          <div class="form-group">
            <label for="noiDung" style="color: var(--dark)">Nội dung:</label>
            <textarea class="form-control" id="noiDung" name="noiDung" rows="6">{{$tintuc->noiDung}}</textarea>
          </div>
          <div class="row">
            <div class="form-group col-6">
              <label for="created_at" style="color: var(--dark)">Ngày Đăng:</label>
              <input type="date" class="form-control" id="created_at" name="created_at"
                value="{{ date('Y-m-d', strtotime($tintuc->created_at)) }}" disabled>
            </div>
            <div class="form-group col-6">
              <label for="updated_at" style="color: var(--dark)">Ngày Cập Nhật:</label>
              <input type="date" class="form-control" id="updated_at" name="updated_at"
                value="{{ date('Y-m-d', strtotime($tintuc->updated_at)) }}" disabled>
            </div>
          </div>
          <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
        </form>
      </div>
    </div>
  </div>
</main>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
  // Bắt sự kiện khi người dùng chọn ảnh
  $('#urlHinh').change(function() {
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