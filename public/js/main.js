$(function() {
    // 変数定義
    let navItem = $(".side-menu .nav-item a");
    let currentPath = location.pathname; // 現在のパスの取得
    
    // メニュー内の各要素のリンク先を取得
    $(".side-menu .nav-item").each(function(index, value) {
        $path = navItem.eq(index).attr('href');
        // 現在のパスとリンク先を比較
        if (currentPath == $path) {
            // activeクラスを付与する
            navItem.eq(index).addClass('active');
        }
    });
});