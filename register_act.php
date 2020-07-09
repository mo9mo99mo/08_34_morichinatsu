<?php
// var_dump($_POST);
// exit();
//ok!

//共通関数の読込 データベース接続
//セッション開始
session_start();

// 外部ファイル読込
//include('functions/common.php');


// フォームからデータ受取
$username = $_POST['user_name'];
$password = $_POST['pwd'];


//共通処理の読込 DB接続&セッション確認
require_once('functions/common.php');

// DB接続
$pdo = connect_db();


// データベースからusernameが同じユーザの存在有無を確認
$sql = 'SELECT COUNT(*) FROM users_table WHERE username=:username';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':username', $username, PDO::PARAM_STR);
$status = $stmt->execute();

if ($status == false) {
    // SQL実行に失敗した場合はここでエラーを出力し，以降の処理を中止する
    $error = $stmt->errorInfo();
    echo json_encode(["error_msg" => "{$error[2]}"]);
    exit();
}
if ($stmt->fetchColumn() > 0) {
    // user_idが1件以上該当した場合はエラーを表示して元のページに戻る
    // $count = $stmt->fetchColumn();
    echo "<p>すでに登録されているユーザ名です</p>";
    echo '<a href="login.php">ログインページへ</a>';
    exit();
}

// ユーザ登録SQL作成
// `created_at`と`updated_at`には実行時の`sysdate()`関数を用いて実行時の日時を入力する
$sql = 'INSERT INTO users_table(id, username, password, is_admin, is_deleted, created_at, updated_at) VALUES(NULL, :username, :password, 0, 0, sysdate(), sysdate())';

// SQL準備&実行
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':username', $username, PDO::PARAM_STR);
$stmt->bindValue(':password', $password, PDO::PARAM_STR);
$status = $stmt->execute();

// データ登録処理後
if ($status == false) {
    // SQL実行に失敗した場合はここでエラーを出力し，以降の処理を中止する
    $error = $stmt->errorInfo();
    echo json_encode(["error_msg" => "{$error[2]}"]);
    exit();
} else {
    // 正常にSQLが実行された場合マイページへ移動させる
    header("Location:mypage.php");
    exit();
}
