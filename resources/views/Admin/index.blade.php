<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Boxicons -->
  <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <!-- My CSS -->
  <link rel="stylesheet" href="/css/style.admin.css">

  <title>AdminHub</title>
</head>

<body>


  <!-- SIDEBAR -->
  <section id="sidebar">
    <a href="#" class="brand">
      <i class='bx bxs-smile'></i>
      <span class="text">Admin</span>
    </a>
    <ul class="side-menu top">
      @if(Auth::user()->role == 3)
      <li class="active">
        <a href="/admin/trangchu">
          <i class='bx bxs-dashboard'></i>
          <span class="text">Trang Chủ</span>
        </a>
      </li>
      @endif
      <li>
        <a href="/admin/quanlytintuc">
          <i class='bx bxs-shopping-bag-alt'></i>
          <span class="text">Quản Lý Tin Tức</span>
        </a>
      </li>
      @if(Auth::user()->role == 3)
      <li>
        <a href="/admin/quanlynguoidung">
          <i class=' bx bxs-group'></i>
          <span class="text">Quản Lý người dùng</span>
        </a>
      </li>
      @endif
      <li>
        <a href="#">
          <i class='bx bxs-message-dots'></i>
          <span class="text">Message</span>
        </a>
      </li>
      <li>
        <a href="#">
          <i class='bx bxs-doughnut-chart'></i>
          <span class="text">Team</span>
        </a>
      </li>
    </ul>
    <ul class="side-menu">
      <li>
        <a href="/admin/setting">
          <i class='bx bxs-cog'></i>
          <span class="text">Settings</span>
        </a>
      </li>
      <li>
        <a href="/logout" class="logout">
          <i class='bx bxs-log-out-circle'></i>
          <span class="text">Logout</span>
        </a>
      </li>
    </ul>
  </section>
  <!-- SIDEBAR -->



  <!-- CONTENT -->
  <section id="content">
    <!-- NAVBAR -->
    <nav>
      <i class='bx bx-menu'></i>
      <a href="#" class="nav-link">Menu</a>
      <form action="#">
        <div class="form-input">
          <input type="search" placeholder="Search...">
          <button type="submit" class="search-btn"><i class='bx bx-search'></i></button>
        </div>
      </form>
      <input type="checkbox" id="switch-mode" hidden>
      <label for="switch-mode" class="switch-mode"></label>
      <a href="#" class="notification">
        <i class='bx bxs-bell'></i>
        <span class="num">8</span>
      </a>
      <a href="#" class="profile">
        <img src=" {{ Auth::user()->avatar }}" alt="">
      </a>
    </nav>
    <!-- NAVBAR -->
    <!-- MAIN -->
    @yield('content')
    <!-- MAIN -->
  </section>
  <!-- CONTENT -->
  <script src="/js/script.js"></script>
</body>

</html>