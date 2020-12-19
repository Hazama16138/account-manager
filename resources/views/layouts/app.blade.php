<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="{{config('consts.common.ROOT_PATH')}}css/style.css">
</head>

<body>
    <div class="container-lg">
        <header>
            <div class="col">
                <a href="{{config('consts.common.ROOT_PATH')}}" class="header-logo">
                    <img src="{{config('consts.common.ROOT_PATH')}}img/logo.png" alt="Account Manager">
                </a>
            </div>
        </header>
        <div class="row">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{config('consts.common.ROOT_PATH')}}">Account Manager</a>
                    </li>
                    @foreach($breadcrumb as $value)
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
            <div class="col-2">
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
            <div class="col-10">
                <h1>@yield('title')</h1>
                @yield('content')
            </div>
        </div>
        <footer class="row">
            <div class="col text-center">
                フッター
            </div>
        </footer>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <script src="js/main.js"></script>
</body>

</html>