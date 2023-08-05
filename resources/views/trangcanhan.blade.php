@extends('index')
@section('content')
    <link
      href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="/css/styles.users.css" />
    <section class="section">
      <div class="section__container">
        <div class="content">
        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{ session('success') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
          <p class="subtitle">Chào bạn</p>
          <h1 class="title">
            Tôi Là <span>Yuan Yuan<br />1</span> Web Developer
          </h1>
          <p class="description">
            Tôi biết rất nhiều người đang đăng ký làm cộng tác viên của tôi, nhưng tôi không thể chấp nhận tất cả họ. Tôi chỉ chấp nhận những người tôi thực sự tin tưởng và tôi biết họ có thể làm việc tốt. Hãy click đăng ký để tôi xét duyệt bạn nhé!
          </p>
          <div class="action__btns">
            <button class="hire__me"><a style="color:white;" href="/trangcanhan/dangkycongtacvien">Đăng ký</button></a>
            <button class="portfolio" ><a class="portfolio" href="/logout">Đăng Xuất</button></a>
          </div>
        </div>
        <div class="image">
          <img src="/img/profile.jpg" alt="profile" />
        </div>
      </div>
    </section>
@endsection