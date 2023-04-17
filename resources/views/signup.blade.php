@extends('home_base')

@section('content')

<main class="container mt-5 mb-5">

    <div class="d-flex justify-content-center h-100">
            <div class="card">
                <div class="card-header">
                    <h3>Sign Up</h3>
                    <div class="d-flex justify-content-end social_icon">
                        <span><i class="fab fa-facebook-square"></i></span>
                        <span><i class="fab fa-google-plus-square"></i></span>
                        <span><i class="fab fa-twitter-square"></i></span>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('userstore') }}" method="post">
                        @csrf

                        <div class="input-group mb-3">
                            <span class="input-group-text" ><i class="fas fa-user"></i></span>
                            <input type="text" name="name" class="form-control" placeholder="username" required>
                        </div>
                         <div class="input-group mb-3">
                            <span class="input-group-text" ><i class="fas fa-envelope"></i></span>
                            <input type="email" name="email" class="form-control" placeholder="email" required>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" ><i class="fas fa-key"></i></span>
                            <input type="password" name="password" class="form-control" placeholder="password" required>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" ><i class="fas fa-key"></i></span>
                            <input type="password" name="password_confirmation" class="form-control" placeholder="Retype password" required>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Sign Up" class="btn float-end login_btn">
                        </div>
                    </form>
                </div>
                @if($errors->any())
                        <div>
                            <ul>
                                @foreach($errors->all() as $error)
                                    <p style="color: orange">{{ $error }}</p>
                                @endforeach
                            </ul>
                        </div>
                    @endif
            </div>

    </div>
</main>
@endsection
