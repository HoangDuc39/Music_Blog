@extends('admin_base')

@section('content')

<main class="container mt-5 mb-5">

    <div class="row">
        <div class="col-sm">
            <h3 class="text-center text-uppercase fw-bold">Thêm mới tác giả</h3>
            <span class="invalid-feedback"></span>
            <form action="{{ route('auths.store') }}" method="post">
                @csrf
                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text" id="lblCatName">Tên tác giả</span>
                    <input type="text" class="form-control" name="auth" >
                </div>

                <div class="form-group  float-end ">
                    <input type="submit" value="Thêm" class="btn btn-success">
                    <a href="{{route('auths.index')}}" class="btn btn-warning ">Quay lại</a>
                </div>
            </form>
        </div>
    </div>
</main>

@endsection
