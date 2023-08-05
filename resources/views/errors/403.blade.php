@extends('Admin.index')
@section('content')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<div class="container mt-5 d-flex justify-content-center align-items-center">
    <div class="alert alert-danger text-center" role="alert">
        <h1 class="alert-heading">Đây là trang dành cho cấp bậc cao hơn!</h1>
        <p>Cấp bậc của bạn quá thấp để truy cập.</p>
    </div>
</div>

@endsection