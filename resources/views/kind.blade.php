<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>KIND</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container-lg">
        <header class="row">
            <div class="col">
                <a href="{{ url('/') }}" class="header-logo">
                    <img src="./img/logo.png" alt="logo">
                </a>
            </div>
        </header>
        <div class="breadcrumb">
            <nav>
            </nav>
        </div>
        <div class="row">
            <nav class="col">
                左ナビゲーション
            </nav>
            <main class="col">
                コンテンツ
            </main>
        </div>
        <footer class="row">
            <div class="col">
                フッター
            </div>
        </footer>

        <!-- <table>
            <tr>
                <th>Name</th>
                <th>Kana</th>
            </tr>
            @foreach ($items as $item)
                <tr>
                    <td>{{$item->name}}</td>
                    <td>{{$item->kana}}</td>
                </tr>
            @endforeach
        </table> -->
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>