<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
@extends('index')
@section('content')
    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title text-center">Xác nhận mật khẩu</h3>
                        <p class="card-text text-center">Bạn đang đăng nhập vào một khu vực bảo mật. Vui lòng xác nhận mật khẩu trước khi tiếp tục.</p>

                        <!-- Auth session status -->
                        <div class="mb-4">
                            @if (session('status'))
                                <div class="alert alert-success">{{ session('status') }}</div>
                            @endif
                        </div>

                        <form method="POST" action="{{ route('password.confirm') }}">
                            @csrf

                            <!-- Mật khẩu -->
                            <div class="form-group">
                                <label for="password">Mật khẩu</label>
                                <input id="password" type="password" name="password" required autocomplete="current-password" class="form-control">
                                @error('password')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="text-end">
                                <button type="submit" class="btn btn-primary">Xác nhận</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Link to Bootstrap JS (CDN) - Required for certain Bootstrap features -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
@endsection