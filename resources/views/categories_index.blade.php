@extends('admin_base')

@section('content')

    <main class="container mt-5 mb-5">

        <div class="row">
            <a href="{{ route('categories.deleted') }}" class="ml-1 text-decoration-none">Thùng rác( {{$deletedCount}} )</a>
            <div class="col-sm">
                <a href="{{ route('categories.create') }}" class="btn btn-success">Thêm mới</a>
                <table class="table">

                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tên thể loại</th>
                            <th>Sửa</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <th scope="row">{{$category->id}}</th>
                            <td>{{$category->ten_tloai}}</td>
                            <td>
                                <a href="{{ route('categories.edit', $category->id) }}"><i class="fa-solid fa-pen-to-square"></i></a>
                            </td>
                            <td>
                                <form method="post" action="{{ route('categories.destroy', $category->id) }}">
                                    @csrf
                                    @method('DELETE')

                                    <input type="submit" class="btn btn-danger btn-sm" value="Delete" onclick="return confirm('Are you sure you want to delete this category?')"/>
                                </form>
                            </td>
                        </tr>

                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </main>

@endsection
