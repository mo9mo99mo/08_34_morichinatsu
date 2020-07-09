<?php
// セッション使うので必ず記述
session_start();
// SESSIONを初期化
// セッション変数を空の配列で上書き
$_SESSION = array();

// Cookieに保存してある"SessionIDの保存期間を過去にして破棄
if (isset($_COOKIE[session_name()])) {
    setcookie(session_name(), '', time() - 42000, '/'); // ブラウザのクッキーの保持期限を過去にする
}
// サーバ側での、セッションIDの破棄
session_destroy(); // セッションの破棄 

// 処理後、index.phpへリダイレクト
header('Location:index.php'); // ログインページヘ移動
exit();
