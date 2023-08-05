<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
@extends('index')
@section('content')
<body class="bg-light">
    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-body">
                    <h3 class="card-title text-center text-danger mb-4">Đăng Ký</h3>
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <!-- Họ và tên -->
                            <div class="form-group">
                                <label for="name">Họ và tên</label>
                                <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" class="form-control">
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Địa chỉ Email -->
                            <div class="form-group">
                                <label for="email">Địa chỉ Email</label>
                                <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="username" class="form-control">
                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Mật khẩu -->
                            <div class="form-group">
                                <label for="password">Mật khẩu</label>
                                <input id="password" type="password" name="password" required autocomplete="new-password" class="form-control">
                                @error('password')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Xác nhận mật khẩu -->
                            <div class="form-group">
                                <label for="password_confirmation">Xác nhận mật khẩu</label>
                                <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" class="form-control">
                                @error('password_confirmation')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="text-center">
                                <button type="submit" class="mt-3 btn btn-danger">Đăng ký</button>
                            </div>
                            <div class="text-center">
                                <a class="btn-link mb-3" href="{{ route('login') }}">Đã có tài khoản?</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Link to Bootstrap JS (CDN) - Required for certain Bootstrap features -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
@endsection


