<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
@extends('index')
@section('content')

<body class="bg-light">
  <div class="container mt-5 mb-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card shadow">
          <div class="card-body">
            @if($errors->any())
            <div class="alert alert-danger text-center">
              <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
            @endif
            <h3 class="card-title text-center text-danger mb-4">Đăng nhập</h3>
            <form method="POST" action="{{ route('login') }}">
              @csrf

              <!-- Địa chỉ Email -->
              <div class="form-group">
                <label for="email">Địa chỉ Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                  autocomplete="username" class="form-control">
                @error('email')
                <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>

              <!-- Mật khẩu -->
              <div class="form-group">
                <label for="password">Mật khẩu</label>
                <input id="password" type="password" name="password" required autocomplete="current-password"
                  class="form-control">
                @error('password')
                <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>

              <!-- Ghi nhớ đăng nhập -->
              <div class="form-check mb-3">
                <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                <label class="form-check-label" for="remember_me">Ghi nhớ đăng nhập</label>
              </div>
              <div class="text-center">
                <button type="submit" class="btn btn-danger btn-block">Đăng nhập</button>
              </div>
              <div class="text-center">
                @if (Route::has('password.request'))
                <a class="btn-link mb-3" href="{{ route('password.request') }}">Quên mật khẩu?</a>&emsp;
                <a class="btn-link mb-3" href="{{ route('register') }}">Chưa có tài khoản?</a>
                @endif
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