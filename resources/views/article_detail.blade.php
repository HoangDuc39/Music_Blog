@extends('home_base')

@section('content')
    <main class="container mt-5">
        <!-- <h3 class="text-center text-uppercase mb-3 text-primary">CẢM NHẬN VỀ BÀI HÁT</h3> -->

                <div class="row mb-5">
                    <div class="col-sm-4">
                        {{-- <img src="{{$article[0]->hinhanh }}" class="img-fluid" alt="..."> --}}
                        <img src="{{ asset('images/' . $article[0]->hinhanh) }}" class="card-img-top" alt="{{ $article[0]->tieude }}">
                    </div>
                    <div class="col-sm-8">
                        <h5 class="card-title mb-2">
                            <a href="" class="text-decoration-none">{{$article[0]->ten_bhat }}</a>
                        </h5>
                        <p class="card-text"><span class=" fw-bold">Bài hát: </span>{{$article[0]->ten_bhat }}</p>
                        <p class="card-text"><span class=" fw-bold">Thể loại: </span>{{$article[0]->ten_tloai}}</p>
                        <p class="card-text"><span class=" fw-bold">Tóm tắt: </span>{{$article[0]->tomtat }}</p>
                        <p class="card-text"><span class=" fw-bold">Nội dung: </span>{{$article[0]->noidung }}</p>
                        <p class="card-text"><span class=" fw-bold">Tác giả: </span>{{$article[0]->ten_tgia}}</p>

                    </div>
        </div>
    </main>
 @endsection
