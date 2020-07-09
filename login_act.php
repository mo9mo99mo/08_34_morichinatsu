<?php
// var_dump($_POST);
// exit();

//セッション開始
session_start();

// 外部ファイル読込
include('functions/common.php');

// ログイン状態をチェック idチェック関数実行
check_session_id();

// DB接続
$pdo = connect_db();

// フォームからデータ受取
$username = $_POST['user_name'];
$password = $_POST['pwd'];

// データ取得SQL作成&実行
// DBにデータがあるか、WHEREで条件指定し全て一致するデータを抽出
$sql = 'SELECT * FROM users_table WHERE username=:username AND password=:password AND is_deleted=0';

// SQL実行時にエラーがある場合はエラーを表示して終了
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':username', $username, PDO::PARAM_STR);
$stmt->bindValue(':password', $password, PDO::PARAM_STR);
$status = $stmt->execute();

// うまくいったらデータ（レコード）を一行ずつ取得
$val = $stmt->fetch(PDO::FETCH_ASSOC);

// ユーザ情報が取得できなかった場合、メッセージを表示
if (!$val) { //$valに取出せない場合
    echo "<p>ログイン情報に誤りがあります</p>";
    echo '<a href="login.php" class="f_btn">ログインページへ戻る</a>';
    exit();
} else {
    // ユーザー情報を取得できた場合（ログイン成功した場合の処理
    //情報をsession領域に保存してマイページへ移動させる
    $_SESSION = array(); // セッション変数を空にする
    $_SESSION["session_id"] = session_id();
    $_SESSION["user_id"] = $val["id"];
    $_SESSION["is_admin"] = $val["is_admin"];
    $_SESSION["username"] = $val["username"];
    header("Location:mypage.php");
    exit();
}
?>

<!doctype html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.0.1">
    <title>課題8 | ログイン</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/album/">

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
    <!-- Custom styles for this template -->
    <link href="album.css" rel="stylesheet">
</head>

<body>

</body>

</html>