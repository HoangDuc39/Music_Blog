@extends('admin_base')

@section('content')
    <main class="container mt-5 mb-5">

        <div class="row">
            <div class="col-sm">
                <h3 class="text-center text-uppercase fw-bold">Sửa thông tin bài viết</h3>
                <form action="{{ route('articles.update', $article[0]->article_id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblCatId">Mã bài viết</span>
                        <input type="text" class="form-control" name="Id" readonly value="{{$article[0]->article_id}}">
                    </div>

                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblCatName">Tiêu đề</span>
                        <input type="text" class="form-control" name="title" value = "{{$article[0]->tieude}}">
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblCatName">Tên bài hát</span>
                        <input type="text" class="form-control" name="song_name" value = "{{$article[0]->ten_bhat}}">
                    </div>

                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblCatName">Thể loại</span>
                        <select name="category">
                            <option value="{{$article[0]->ma_tloai}}" selected>{{ $article[0]->ten_tloai}}</option>
                            @foreach ($categories as $category)
                            <option value="{{$category->id}}">{{$category->ten_tloai}}</option>
                            @endforeach
                            </select>
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblCatName">Tóm tắt</span>
                        <input type="text" class="form-control" name="summary" value = "{{$article[0]->tomtat}}">
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblCatName">Nội dung</span>
                        <input type="text" class="form-control" name="content" value = "{{$article[0]->noidung}}">
                    </div>

                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblCatName">Tác giả</span>
                        <select name="auth">
                            <option value="{{$article[0]->ma_tgia}}" selected>{{ $article[0]->ten_tgia}}</option>
                            @foreach ($auths as $auth)
                            <option value="{{$auth->id}}">{{$auth->ten_tgia}}</option>
                            @endforeach
                            </select>
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblCatName">Hình ảnh</span>
                        <input type="file" class="form-control" id="image" name="image" >
                    </div>
                    <div class="form-group  float-end ">
                        <input type="submit" value="Lưu lại" class="btn btn-success">
                        <a href="{{route('articles.index')}}" class="btn btn-warning ">Quay lại</a>
                    </div>
                </form>
            </div>
        </div>
    </main>
   @endsection
