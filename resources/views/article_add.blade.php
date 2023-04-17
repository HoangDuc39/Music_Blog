@extends('admin_base')

@section('content')
    <main class="container mt-5 mb-5">

        <div class="row">
            <div class="col-sm">
                <h3 class="text-center text-uppercase fw-bold">Thêm mới bài viết</h3>
                <form action="{{ route('articles.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblCatName">Tiêu đề</span>
                        <input type="text" class="form-control" name="title" >
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblCatName">Tên bài hát</span>
                        <input type="text" class="form-control" name="song_name" >
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblCatName">Thể loại</span>
                        <select class="ml-5" name="category">
                            @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{$category->ten_tloai}}</option>
                        @endforeach
                            </select>
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblCatName">Tóm tắt</span>
                        <input type="text" class="form-control" name="summary" >
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblCatName">Nội dung</span>
                        <input  type="text" class="form-control" name="content" >
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblCatName">Tác giả</span>
                        <select name="auth">
                            @foreach ($auths as $auth)
                            <option value="{{$auth->id}}">{{$auth->ten_tgia}}</option>
                            @endforeach
                            </select>
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblCatName">Hình ảnh</span>
                        {{-- <td><img src="{{ asset('images/' . $article->hinhanh) }}" class="card-img-top" alt="{{ $article->tieude }}"></td> --}}
                        <input type="file" class="form-control" id="image" name="image" >
                    </div>

                    <div class="form-group  float-end ">
                        <input type="submit" value="Thêm" class="btn btn-success">
                        <a href="{{route('articles.index')}}" class="btn btn-warning ">Quay lại</a>
                    </div>
                </form>
            </div>
        </div>
    </main>
    @endsection
