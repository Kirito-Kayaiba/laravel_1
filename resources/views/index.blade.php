<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <link rel="stylesheet" href="/css/style.css">
  <link rel="stylesheet" media = 'screen and (max-width: 768px)' href="/css/mobile.css">
  <link href="https://fonts.googleapis.com/css?family=Lato|Staatliches&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
  <script src="https://kit.fontawesome.com/85a5fdd30e.js" async></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <title>NewsGrid | Your News Website</title>
</head>
<body>
  <nav id="main-nav">
    <div class="container">
      <img src="/img/logo.png" alt="NewsMedia" class="logo">
      <ul>
        <li>
            <a class="dropdown-toggle" data-toggle="dropdown" id="dropdownMenuButton">
              <i class="fa-solid fa-bars"></i>
            </a>
            <ul class="dropdown-menu" style="display: none;">
              @foreach ($danhmuc as $dm)
              <li><a href="/danhmuc/{{$dm->idLT}}">{{$dm->ten}}</a></li>
              @endforeach
            </ul>
          </li>
        <li><a href="/" class="current">Home</a></li>
        <li><a href="/about">About</a></li>
      </ul>
      <div class = 'social'>
        <form class="search-form" action="/search" method="get">
          <input type="text" name="request" placeholder="Search...">
          <button type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>
 @yield('content')
  <footer id = 'main-footer' class = 'py-2'>
    <div class="container footer-container">
      <div>
        <img src="/img/logo_light.png" alt="logo">
        <p>"Uy tín và trách nhiệm là cốt lõi của chúng tôi trong việc cung cấp thông tin chính xác và đáng tin cậy cho người đọc."</p>
      </div>
      <div>
        <h3>Gửi về Email</h3>
        <p>Đóng góp ý kiến của bạn về chúng tôi.</p>
        <form>
          <input type="email" placeholder="Email:" required>
          <input type="submit" value="Subscribe" class = 'btn btn-primary'>
        </form>
      </div>
      <div>
        <h3>Site Links</h3>
        <ul class = 'list'>
          <li><a href="#">Help and Support</a></li>
          <li><a href="#">Privacy Policy</a></li>
          <li><a href="#">About Us</a></li>
          <li><a href="#">Contact</a></li>
        </ul>
      </div>
      <div>
        <h2>Tham gia group</h2>
        <p>Tham gia với chúng tôi để biết thêm nhiều tin tức.</p>
        <a href="#" class="btn btn-secondary">Tham gia ngay</a>
      </div>
      <div>
        <p>
          Copyright Lekhanhluan &copy; 2023, All Rights reserved.
        </p>
      </div>
    </div>
  </footer>
  <script src="/js/home.js"></script>
</body>
</html>
