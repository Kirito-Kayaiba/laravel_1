@extends('index')
@section('content')
    <div class="filter-bar">
        <a href="/search/moinhat?request={{$search}}" class='btn btn-info btn-block'>Mới Nhất</a></a>
        <a href="/search/hot?request={{$search}}" class='btn btn-info btn-block'>Tin Hot</a></a>
    </div>
@foreach ($data as $tin)
    <section id="article">
        <div class="container">
            <div class="page-container">
                <article class="card">
                    <img src="{{$tin->urlHinh}}" alt="photo">
                    <h1 class='l-heading'><a href="tin/{{$tin->id}}">{{$tin->tieuDe}}</a></h1>
                    <div class="meta">
                        <small>
                            @php
                                //lấy tên từ id_user trong bảng users
                                $ten = DB::table('users')->where('id', $tin->id_user)->value('name');
                                //lấy veryfi từ id_user trong bảng users
                                $veryfi = DB::table('users')->where('id', $tin->id_user)->value('veryfi');
                            @endphp
                            @if ($veryfi == 1)
                            <i class="fas fa-user"></i>Được viết bởi {{$ten}} <i class="fa-solid fa-circle-check" style="color: #3C91E6"></i> {{$tin->created_at}}
                            @else
                            <i class="fas fa-user"></i>Được viết bởi {{$ten}} {{$tin->created_at}}
                            @endif
                        </small>
                    </div>
                    <p>{{$tin->tomTat}}</p>
                </article>
            </div>
        </div>
    </section>
@endforeach
@endsection