<?php

// データ取得SQL作成
//$sql = 'SELECT * FROM 06kadai_table';



session_start();
//共通関数の読込
// データベース接続
include('functions/common.php');

//DB接続
$pdo = connect_db();
// データ取得SQL作成
//ユーザー情報と投稿内容を紐付
$sql = 'SELECT user.id, user.username, post.title, post.honbun, post.hizuke, post.img_file FROM 
users_table user, posts_table post WHERE user.id = post.user_id ORDER BY user.id DESC';

// SQL準備&実行
$stmt = $pdo->prepare($sql);
$status = $stmt->execute();

// データ登録処理後
if ($status == false) {
    // SQL実行に失敗した場合はここでエラーを出力し，以降の処理を中止する
    $error = $stmt->errorInfo();
    echo json_encode(["error_msg" => "{$error[2]}"]);
    exit();
} else {
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
    <title>課題8 | phpログイン</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/album/">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
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
    <!--共通ヘッダー読込-->
    <?php include('functions/header.php'); ?>

    <main role="main">
        <div class="album py-5 bg-light">
            <div class="container">
                <div class="row">
                    <?php foreach ($result as $record) : ?>
                        <div class="col-md-4">
                            <div class="card mb-4">
                                <div class="img_area bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail">
                                    <img src="<?= $record['img_file'] ?>">
                                </div>
                                <div class="card-body">
                                    <h2 class="card-title"><?= $record['title'] ?></h2>
                                    <p class="card-text"><?= $record['honbun'] ?></p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="text-muted">
                                            <span class="material-icons">tag_faces</span><span class="username_area"><?= $record['username'] ?></span>
                                        </div>
                                        <small class="text-muted"><?= $record['hizuke'] ?></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
            </div>
        </div>

    </main>

    <footer class="text-muted">
        <div class="container">
            <p class="float-right">
                <a href="login.php">ログイン</a>
            </p>
        </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script>
        window.jQuery || document.write('<script src="js/vendor/jquery.slim.min.js"><\/script>')
    </script>
    <script src="js/bootstrap.bundle.js"></script>
</body>

</html>