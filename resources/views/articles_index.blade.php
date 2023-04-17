@extends('admin_base')

@section('content')
    <main class="container mt-5 mb-5">

        <div class="row">
            <a href="{{ route('articles.deleted') }}" class="ml-1 text-decoration-none">Thùng rác( {{$deletedCount}} )</a>
            <div class="col-sm">
                <a href="{{route('articles.create')}}" class="btn btn-success">Thêm mới</a>
                <table class="table">

                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tiêu đề</th>
                            <th scope="col">Tên bài hát</th>
                            <th scope="col">Tóm tắt</th>
                            <th scope="col">Nội dung</th>
                            <th scope="col">Hình ảnh</th>
                            <th>Sửa</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                   @foreach ($articles as $article)
                        <tr>
                            <th scope="row">{{$article->id}}</th>
                            <td>{{$article->tieude}}</td>
                            <td>{{$article->ten_bhat}}</td>
                            <td>{{$article->tomtat}}</td>
                            <td>{{$article->noidung}}</td>
                            <td><img src="{{ asset('images/' . $article->hinhanh) }}" class="card-img-top" alt="{{ $article->tieude }}"></td>
                            <td>
                                <a href="{{ route('articles.edit', $article->id) }}"><i class="fa-solid fa-pen-to-square"></i></a>
                            </td>
                            <td>
                                <form method="post" action="{{ route('articles.destroy', $article->id) }}">
                                    @csrf
                                    @method('DELETE')

                                    <input type="submit" class="btn btn-danger btn-sm" value="Delete" onclick="return confirm('Are you sure you want to delete this article?')"/>
                                </form>
                            </td>
                        </tr>

                        @endforeach
                    </tbody>

                </table>
                <div class=""> {{ $articles->links() }}</div>
            </div>
        </div>
    </main>
@endsection
