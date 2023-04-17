@extends('admin_base')

@section('content')

<main class="container mt-5 mb-5">

    <div class="row">
        <div class="col-sm">
            <h3 class="text-center text-uppercase fw-bold">Sửa thông tin thể loại</h3>
            <form action="{{ route('categories.update', $category->id) }}" method="post">
                @csrf
                @method('PUT')
            <div class="input-group mt-3 mb-3">
                    <span class="input-group-text" id="lblCatId">Mã thể loại</span>
                    <input type="text" class="form-control" name="txtCatId" readonly value="{{ $category->id }}">
                </div>

                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text" id="lblCatName">Tên thể loại</span>
                    <input type="text" class="form-control" name="category" value = "{{ $category->ten_tloai }}">
                </div>

                <div class="form-group  float-end ">
                    <input type="submit" value="Lưu lại" class="btn btn-success">
                    <a href="{{route('categories.index')}}" class="btn btn-warning ">Quay lại</a>
                </div>
            </form>
        </div>
    </div>
</main>

@endsection
