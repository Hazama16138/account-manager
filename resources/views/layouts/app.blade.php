<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container-lg">
        <header>
            <div class="col">
                <a href="{{ url('') }}" class="header-logo">
					<img src="img/logo.png" alt="Account Manager">
				</a>
            </div>
        </header>
        <div class="row">
            <nav class="col">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="/">Account Manager</a>
                    </li>
                    @foreach($array as $value)
                        @if($value['href'] == $url)
                            <li class="breadcrumb-item">
                                <a href="{{ $value['href'] }}" class="active">{{ $value['name'] }}</a>
                            </li>
                        @else
                            <li class="breadcrumb-item">
                                <a href="{{ $value['href'] }}">{{ $value['name'] }}</a>
                            </li>
                        @endif
                    @endforeach
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-3">
                <ul class="nav flex-column side-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="/kind">種類</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">テスト2</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">テスト3</a>
                    </li>
                </ul>
            </div>
            <div class="col-9">
            </div>
        </div>
        <footer class="row">
            <div class="col text-center">
                フッター
            </div>
        </footer>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="js/main.js"></script>
</body>
</html>