<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
@extends('Admin.index')
@section('content')
<style>
/* Định dạng lại các nút trong phân trang */
.pagination li {
  display: inline-block;
  margin-right: 5px;
}

/* Hiển thị nút phân trang hiện tại */
.pagination .page-item.active .page-link {
  background-color: #007bff;
  border-color: #007bff;
}

/* Định dạng lại các liên kết của nút phân trang */
.pagination .page-link {
  color: #007bff;
  border: 1px solid #007bff;
  border-radius: 5px;
}

/* Định dạng lại khi hover lên các liên kết của nút phân trang */
.pagination .page-link:hover {
  background-color: #007bff;
  border-color: #007bff;
  color: #fff;
}
</style>
<main>
  <!-- Phần danh sách sản phẩm -->
  <div class="container mt-5">
    <div class="row">
      <div class="col">
        <div class="row">
          <h1 class="col-3" style="color: var(--dark)">Quản lý Tin</h1>
          <div class="col-8"></div>
          <a href="/admin/quanlytintuc/them" class="btn btn-primary col-1 mt-4">Thêm <i
              class="fa-solid fa-square-plus"></i></a>
        </div>
        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{ session('success') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          {{ session('error') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <table class="table table-striped mt-3 align-middle">
          <thead>
            <tr class="text-center ">
              <th class="col-1" style="color: var(--dark)">
                <span class="sort-id">ID</span>
              </th>
              <th class="col-2" style="color: var(--dark)">Ảnh</th>
              <th class="col-4" style="color: var(--dark)">Tên</th>
              <th class="col-2" style="color: var(--dark)">Ngày Tạo</th>
              <th class="col-2" style="color: var(--dark)">Lượt Xem</th>
              <th class="col-1" style="color: var(--dark)"></th>
            </tr>
          </thead>
          <tbody>
            @foreach($tintuc as $tt)
            <tr>
              <td class="align-middle text-center" style="color: var(--dark)">{{$tt->id}}</td>
              <td class="align-middle"><img src="{{$tt->urlHinh}}" width="180px" height="100px" alt=""></td>
              <td class="align-middle">
                <h6 class="font-weight-bold" style="color: var(--dark)">{{$tt->tieuDe}}</h6>
                <p class="" style="color: var(--dark-light);">{{$tt->tomTat = substr($tt->tomTat, 0, 150)}}...</p>
                @php
                $id_user = $tt->id_user;
                $gmail = DB::table('users')->where('id', $id_user)->value('email');
                @endphp
                @if(Auth::user()->role == 3)
                <p class="" style="color: var(--dark-light);">Người đăng: {{$gmail}}</p>
                @endif
              </td>
              <td class="align-middle" style="color: var(--dark)">{{$tt->created_at}}</td>
              <td class="align-middle text-center" style="color: var(--dark)">{{$tt->xem}}</td>
              <td class="align-middle">
                <a href="/admin/quanlytintuc/sua/{{$tt->id}}" class="font-weight-bold" style="color: var(--primary)"><i
                    class="fa-regular fa-pen-to-square" style="color: var(--primary)"></i>Sửa</a>
              </td>
            </tr>
            @endforeach
            <!-- Thêm các sản phẩm khác tại đây -->
          </tbody>
        </table>
        <!-- Hiển thị số kết quả -->
        <div class="container mt-5">
          <div class="row">
            <div class="col">
              <!-- Hiển thị số kết quả -->
              <p class="text-center">Showing {{ $tintuc->firstItem() }} to {{ $tintuc->lastItem() }} of
                {{ $tintuc->total() }} results</p>

              <!-- Hiển thị phân trang -->
              <nav aria-label="Page navigation" class="d-flex justify-content-center mt-4">
                <ul class="pagination">
                  {!! $tintuc->links('pagination::bootstrap-4') !!}
                </ul>
              </nav>
            </div>
          </div>
        </div>


      </div>
    </div>
  </div>
</main>
<!-- Thư viện jQuery -->

@endsection