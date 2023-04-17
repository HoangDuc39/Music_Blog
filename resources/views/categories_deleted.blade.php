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
                    <a href="{{ route('categories.index') }}" >Quay lại</a >

                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Tên thể loại</th>
                                    <th>Deleted At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($categories as $category)
                                    <tr>
                                        <td>{{ $category->ten_tloai}}</td>
                                        <td>{{ $category->deleted_at }}</td>
                                        <td>
                                            <form action="{{ route('categories.restore', $category->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="btn btn-sm btn-primary">Restore</button>
                                            </form>
                                            <form action="{{ route('categories.forceDelete', $category->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger mt-2">Force Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
            </div>
        </div>
    </div>
@endsection

