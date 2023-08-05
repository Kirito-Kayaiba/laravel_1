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
  <!-- Phần danh sách người dùng -->
  <div class="container mt-5">
    <div class="row">
      <div class="col">
        <div class="row">
          <h1 class="col-5" style="color: var(--dark)">Quản lý Người dùng</h1>
          <div class="col-6"></div>
          <a href="/admin/quanlynguoidung/them" class="btn btn-primary col-1 mt-4">Thêm <i
              class="fa-solid fa-square-plus"></i></a>
        </div>
        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{ session('success') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <table class="table table-striped mt-3 align-middle">
          <thead>
            <tr class="text-center">
              <th class="col-1" style="color: var(--dark)">
                <span class="sort-id">ID</span>
              </th>
              <th class="col-1" style="color: var(--dark)">Avatar</th>
              <th class="col-2" style="color: var(--dark)">Tên người dùng</th>
              <th class="col-3" style="color: var(--dark)">Email</th>
              <th class="col-2" style="color: var(--dark)">Ngày Tạo</th>
              <th class="col-2" style="color: var(--dark)">Vai Trò</th>
              <th class="col-1" style="color: var(--dark)"></th>
            </tr>
          </thead>
          <tbody>
            @foreach($nguoidung as $nd)
            <tr>
              <td class="align-middle text-center" style="color: var(--dark)">{{$nd->id}}</td>
              <td class="align-middle text-center" style="color: var(--dark)"><img src="{{$nd->avatar}}" alt=""
                  style="width: 50px; height: 50px; border-radius: 50%;"></td>
                  
              <td class="align-middle ">
                @if($nd->veryfi == 1)
                <h6 class="font-weight-bold" style="color: var(--dark)">{{$nd->name}} <i class="fa-solid fa-circle-check" style="color: #3C91E6"></i></h6>
                @else
                <h6 class="font-weight-bold" style="color: var(--dark)">{{$nd->name}}</h6>
                @endif
              </td>
              <td class="align-middle" style="color: var(--dark)">{{$nd->email}}</td>
              <td class="align-middle text-center" style="color: var(--dark)">{{$nd->created_at}}</td>
              <td class="align-middle text-center" style="color: var(--dark)">
                @if($nd->role = 3)
                <span class="badge bg-success" style="color: var(--dark)">Quản Trị Viên</span>
                @elseif($nd->role = 2)
                <span class="badge bg-danger" style="color: var(--dark)">Quản Lý</span>
                @else
                <span class="badge bg-warning" style="color: var(--dark)">Người Dùng</span>
                @endif
              </td>
              <td class="align-middle">
                <a href="/admin/quanlynguoidung/sua/{{$nd->id}}" class="font-weight-bold" style="color: var(--primary)">
                  <i class="fa-regular fa-pen-to-square" style="color: var(--primary)"></i>Sửa
                </a>
              </td>
            </tr>
            @endforeach
            <!-- Thêm các người dùng khác tại đây -->
          </tbody>
        </table>
        <!-- Hiển thị số kết quả -->
        <div class="container mt-5">
          <div class="row">
            <div class="col">
              <!-- Hiển thị số kết quả -->
              <p class="text-center">Showing {{ $nguoidung->firstItem() }} to {{ $nguoidung->lastItem() }} of
                {{ $nguoidung->total() }} results</p>

              <!-- Hiển thị phân trang -->
              <nav aria-label="Page navigation" class="d-flex justify-content-center mt-4">
                <ul class="pagination">
                  {!! $nguoidung->links('pagination::bootstrap-4') !!}
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
@endsection