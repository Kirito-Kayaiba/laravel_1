<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css" rel="stylesheet">
@extends('index')
@section('content')
    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title text-center">Quên mật khẩu?</h3>
                        <p class="card-text text-center">Đừng lo, hãy cung cấp địa chỉ email của bạn và chúng tôi sẽ gửi liên kết để đặt lại mật khẩu.</p>

                        <!-- Trạng thái phiên -->
                        <div class="mb-4">
                            @if (session('status'))
                                <div class="alert alert-success">{{ session('status') }}</div>
                            @endif
                        </div>

                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <!-- Địa chỉ email -->
                            <div class="form-group">
                                <label for="email">Địa chỉ Email</label>
                                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus class="form-control">
                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-danger">Gửi liên kết đặt lại mật khẩu</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Link tới JS của Bootstrap (CDN) - Cần thiết cho một số tính năng Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js"></script>

@endsection