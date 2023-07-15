@extends('index')
@section('content')
<header id = 'showcase'>
    <div class="container">
      <div class="showcase-container">
        <div class="showcase-content">
          <div class="category category-sports">
            Sports
          </div>
          <h1>"World Cup 2023 - Sự kiện hàng đầu của bóng đá, tập hợp các đội tuyển hàng đầu thế giới trong một cuộc cạnh tranh quyết liệt."</p>
          <a href="article.html" class="btn btn-primary">Xem Thêm</a>
        </div>
      </div>
    </div>
  </header>
  <section id="home-articles" class="py-2">
    <div class="container">
      <h2>Tin Hot Trong Giờ Qua</h2>
      <div class="articles-container">
        <article class="card">
          <img src="{{$data[0]->urlHinh}}" alt="photo">
          <div>
              @if ($data[0]->idLT == 1)
                  <div class="category category-ent">
                      Giải trí
                  </div>
              @elseif ($data[0]->idLT == 2)
                  <div class="category category-sports">
                      Thể thao
                  </div>
              @elseif ($data[0]->idLT == 3)
                  <div class="category category-tech">
                      Công nghệ
                  </div>
              @endif
              <h3>
              <a href="article.html">{{$data[0]->tieuDe}}</a>
            </h3>
            <p>{{$data[0]->tomTat}}</p>
          </div>
        </article>

        <article class="card bg-dark">
          <div>
              @if ($data[1]->idLT == 1)
                  <div class="category category-ent">
                      Giải trí
                  </div>
              @elseif ($data[1]->idLT == 2)
                  <div class="category category-sports">
                      Thể thao
                  </div>
              @elseif ($data[1]->idLT == 3)
                  <div class="category category-tech">
                      Công nghệ
                  </div>
              @endif
          <h3>
            <a href="article.html">{{$data[1]->tieuDe}}</a>
          </h3>
          <p>{{$data[1]->tomTat}}</p>
        </article>

        <article class="card">
          <img src="{{$data[2]->urlHinh}}" alt="photo">
          @if ($data[2]->idLT == 1)
              <div class="category category-ent">
                  Giải trí
              </div>
          @elseif ($data[2]->idLT == 2)
              <div class="category category-sports">
                  Thể thao
              </div>
          @elseif ($data[2]->idLT == 3)
              <div class="category category-tech">
                  Công nghệ
              </div>
          @endif
          <h3>
            <a href="article.html">{{$data[2]->tieuDe}}</a>
          </h3>
          <p>{{$data[2]->tomTat}}</p>
        </article>

        <article class="card">
          <div>
              @if ($data[3]->idLT == 1)
                  <div class="category category-ent">
                      Giải trí
                  </div>
              @elseif ($data[3]->idLT == 2)
                  <div class="category category-sports">
                      Thể thao
                  </div>
              @elseif ($data[3]->idLT == 3)
                  <div class="category category-tech">
                      Công nghệ
                  </div>
              @endif
          <h3>
            <a href="article.html">{{$data[3]->tieuDe}}</a>
          </h3>
          <p>{{$data[3]->tomTat}}</p>
          <img src="{{$data[3]->urlHinh}}" alt="photo">
        </article>

        <article class="card">
          <img src="{{$data[4]->urlHinh}}" alt="photo">
          <div>
              @if ($data[4]->idLT == 1)
                  <div class="category category-ent">
                      Giải trí
                  </div>
              @elseif ($data[4]->idLT == 2)
                  <div class="category category-sports">
                      Thể thao
                  </div>
              @elseif ($data[4]->idLT == 3)
                  <div class="category category-tech">
                      Công nghệ
                  </div>
              @endif
          <h3>
            <a href="article.html">{{$data[4]->tieuDe}}</a>
          </h3>
          <p>{{$data[4]->tomTat}}</p>
          </article>

          <article class="card bg-primary">
            @if ($data[5]->idLT == 1)
                <div class="category category-ent">
                    Giải trí
                </div>
            @elseif ($data[5]->idLT == 2)
                <div class="category category-sports">
                    Thể thao
                </div>
            @elseif ($data[5]->idLT == 3)
                <div class="category category-tech">
                    Công nghệ
                </div>
            @endif
            <h3>
              <a href="article.html">{{$data[5]->tieuDe}}</a>
            </h3>
            <p>{{$data[5]->tomTat}}</p>
          </article>

          <article class="card">
            <div>
                @if ($data[6]->idLT == 1)
                    <div class="category category-ent">
                        Giải trí
                    </div>
                @elseif ($data[6]->idLT == 2)
                    <div class="category category-sports">
                        Thể thao
                    </div>
                @elseif ($data[6]->idLT == 3)
                    <div class="category category-tech">
                        Công nghệ
                    </div>
                @endif
              <h3>
                <a href="article.html">{{$data[6]->tieuDe}}</a>
              </h3>
              <p>{{$data[6]->tomTat}}</p>
            </div>
            <img src="{{$data[6]->urlHinh}}" alt="photo">
          </article>
      </div>
    </div>
  </section>
  @endsection
