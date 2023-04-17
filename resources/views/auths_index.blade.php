@extends('admin_base')

@section('content')

<main class="container mt-5 mb-5">

    <div class="row">
        <div class="col-sm">
            <a href="{{ route('auths.create') }}" class="btn btn-success">Thêm mới</a>
            <table class="table">

                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tên tác giả</th>
                        <th>Sửa</th>
                        <th>Xóa</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($auths as $auth)
                    <tr>
                        <th scope="row">{{$auth->id}}</th>
                        <td>{{$auth->ten_tgia}}</td>
                        <td>
                            <a href="{{ route('auths.edit', $auth->id) }}"><i class="fa-solid fa-pen-to-square"></i></a>
                        </td>
                        <td>
                            <form method="post" action="{{ route('auths.destroy', $auth->id) }}">
                                @csrf
                                @method('DELETE')

                                <input type="submit" class="btn btn-danger btn-sm" value="Delete" onclick="return confirm('Are you sure you want to delete this auth?')"/>
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
