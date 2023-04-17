@extends('admin_base')

@section('content')
    <main class="container mt-5 mb-5">
        <div class="row">
            <div class="col-sm">
                <h3 class="text-center text-uppercase fw-bold">Sửa thông tin tài khoản</h3>
                <form action="{{ route('users.update', $user->id) }}"  method="post">
                    @csrf
                     @method('PUT')
                <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblCatId">ID</span>
                        <input type="text" class="form-control" name="id" readonly value="{{ $user->id }}">
                    </div>

                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblCatName">Tên tài khoản</span>
                        <input type="text" class="form-control" name="name" value ="{{ $user->name }}" >
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblCatName">Email</span>
                        <input type="email" class="form-control" name="email" value = "{{ $user->email }}">
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblCatName">Mật khẩu</span>
                        <input type="text" class="form-control" name="password" value = "{{ $user->password }}">
                    </div>
                    <div class="form-group  float-end ">
                        <input type="submit" value="Lưu lại" class="btn btn-success">
                        <a href="{{ route('users.index') }}" class="btn btn-warning ">Quay lại</a>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection
