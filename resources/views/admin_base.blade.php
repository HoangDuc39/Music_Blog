<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music for Life</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary shadow p-3 bg-white rounded">
            <div class="container-fluid">
                <div class="h3">
                    <a class="navbar-brand" href="#">Administration</a>
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active fw-bold" aria-current="page" href="{{ route('admin')}}">Trang chủ</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('categories.index')}}">Thể loại</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('auths.index')}}">Tác giả</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('articles.index')}}">Bài viết</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('users.index')}}">Tài khoản</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="/logout">Đăng xuất</a>
                    </li>
                </ul>
                </div>
            </div>
        </nav>

    </header>
    @yield('content')
        <footer class="bg-white d-flex justify-content-center align-items-center border-top border-secondary  border-2" style="height:80px">
            <h4 class="text-center text-uppercase fw-bold">TLU's music garden</h4>
        </footer>
        <script>
        document.getElementById('delete-form').addEventListener('submit', function(e) {
            var confirmed = confirm('Are you sure you want to delete this category?');
            if (!confirmed) {
                e.preventDefault();
            }
        });

        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    </body>
    </html>
