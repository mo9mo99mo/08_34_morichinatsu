<?php
//データ送信されているかチェック
//var_dump($_POST);
//exit(); ok!

//セッション開始
session_start();

// フォームからデータ受取
// $title = $_POST['title'];
// $honbun = $_POST['honbun'];
// $hizuke = $_POST['hizuke'];
// $user_id = $_POST['user_id'];
// var_dump($user_id);
// exit(); ok!

//共通処理の読込 DB接続&セッション確認
//requireはファイル読込に失敗した場合はエラーで以降の処理を停止する
require 'functions/common.php';

// DB接続
$pdo = connect_db();

//$_POST（投稿）の情報をデータベースに保存する
function file_upload()
{
    // POSTではないとき何もしない
    if (filter_input(INPUT_SERVER, 'REQUEST_METHOD') !== 'POST') {
        return;
    }
    // フォームからデータ受取
    $title = $_POST['title'];
    $honbun = $_POST['honbun'];
    $hizuke = $_POST['hizuke'];
    $user_id = $_POST['user_id'];

    // 画像アップロードファイル
    $img_file = $_FILES['img_file'];
    //参照 http://php.net/manual/ja/features.file-upload.post-method.php

    if ($img_file['error'] > 0) {
        throw new Exception('ファイルアップロードに失敗しました。');
    }

    $tmp_name = $img_file['tmp_name'];

    // ファイル拡張子をチェック
    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mimetype = finfo_file($finfo, $tmp_name); //ファイルについての情報を返す

    // 許可するMIMETYPE
    $allowed_types = [
        'jpg' => 'image/jpeg', 'png' => 'image/png', 'gif' => 'image/gif'
    ];
    if (!in_array($mimetype, $allowed_types)) {
        throw new Exception('許可されていない拡張子のファイルです。');
    }

    // アップロード後のファイル名の処理
    //（ハッシュ値でファイル名を決定するため、同一ファイルは同名で上書き）
    $filename = sha1_file($tmp_name);

    // 拡張子
    $ext = array_search($mimetype, $allowed_types);

    // 画像保存先のパス
    $destination = sprintf(
        '%s/%s.%s',
        'uploads',
        $filename,
        $ext
    );

    // アップロード後、ファイルを指定ディレクトリに移動
    if (!move_uploaded_file($tmp_name, $destination)) {
        throw new Exception('ファイルの保存に失敗しました。');
    }

    // データベースに登録する処理
    $sql = 'INSERT INTO posts_table(id, hizuke, title, honbun, img_file, user_id, updated_at, created_at) VALUES(NULL, :hizuke, :title, :honbun, :img_file, :user_id, sysdate(), sysdate())';
    //配列の中身を空にする
    $arr = [];

    $arr[':hizuke'] = $hizuke;
    $arr[':title'] = $title;
    $arr[':honbun'] = $honbun;
    $arr[':img_file'] = $destination;
    $arr[':user_id'] = $user_id;
    //最終行に挿入
    $lastInsertId = insert($sql, $arr);

    // 成功時にページを移動する
    header("Location:mypage.php");
}

try {
    // ファイルアップロード
    file_upload();
} catch (Exception $e) {
    $error = $e->getMessage();
}
