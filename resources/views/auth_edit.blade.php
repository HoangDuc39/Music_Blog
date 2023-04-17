@extends('admin_base')

@section('content')

<main class="container mt-5 mb-5">

    <div class="row">
        <div class="col-sm">
            <h3 class="text-center text-uppercase fw-bold">Sửa thông tin tác giả</h3>
            <form action="{{ route('auths.update', $auth->id) }}" method="post">
                @csrf
                @method('PUT')
            <div class="input-group mt-3 mb-3">
                    <span class="input-group-text" id="lblCatId">Mã tác giả</span>
                    <input type="text" class="form-control" name="id" readonly value="{{ $auth->id }}">
                </div>

                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text" id="lblCatName">Tên tác giả</span>
                    <input type="text" class="form-control" name="auth" value = "{{ $auth->ten_tgia}}">
                </div>

                <div class="form-group  float-end ">
                    <input type="submit" value="Lưu lại" class="btn btn-success">
                    <a href="{{route('auths.index')}}" class="btn btn-warning ">Quay lại</a>
                </div>
            </form>
        </div>
    </div>
</main>

@endsection
