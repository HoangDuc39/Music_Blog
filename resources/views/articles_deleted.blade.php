@extends('admin_base')
@section('content')
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
    <div class="container mt-5 mb-5">
        <div class="row ">
            <div class="col-sm">
                    <a href="{{ route('articles.index') }}" >Quay lại</a >

                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Tiêu đề</th>
                                    <th>Tên bài hát</th>
                                    <th>Tóm tắt</th>
                                    <th>Nội dung</th>
                                    <th>Hình ảnh</th>
                                    <th>Deleted At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($articles) > 0)
                                @foreach($articles as $article)
                                    <tr>
                                        <td>{{ $article->tieude}}</td>
                                        <td>{{ $article->ten_bhat}}</td>
                                        <td>{{ $article->tomtat}}</td>
                                        <td>{{ $article->noidung}}</td>
                                        <td><img src="{{ asset('images/' . $article->hinhanh) }}" class="card-img-top" alt="{{ $article->tieude }}"></td>
                                        <td>{{ $article->deleted_at }}</td>
                                        <td>
                                            <form action="{{ route('articles.restore', $article->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="btn btn-sm btn-primary">Restore</button>
                                            </form>
                                            <form action="{{ route('articles.forceDelete', $article->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger mt-2">Force Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="5" class="text-center">Thùng rác rỗng </td>
                                </tr>
                            @endif

                            </tbody>
                        </table>
                    </div>
            </div>
        </div>
    </div>
@endsection

