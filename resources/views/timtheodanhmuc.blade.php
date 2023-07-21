@extends('index')
@section('content')
    <div class="filter-bar">
        <a href="/danhmuc/moinhat/{{$id}}" class='btn btn-info btn-block'>Mới Nhất</a></a>
        <a href="/danhmuc/hot/{{$id}}" class='btn btn-info btn-block'>Tin Hot</a></a>
    </div>
@foreach ($data as $tin)
    <section id="article">
        <div class="container">
            <div class="page-container">
                <article class="card">
                    <img src="{{$tin->urlHinh}}" alt="photo">
                    <h1 class='l-heading'>{{$tin->tieuDe}}</h1>
                    <div class="meta">
                        <small>
                            <i class="fas fa-user"></i>Được viết bởi Lê Khánh Luân {{$tin->ngayDang}}
                        </small>
                    </div>
                    <p>{{$tin->tomTat}}</p>
                </article>
            </div>
        </div>
    </section>
@endforeach
@endsection