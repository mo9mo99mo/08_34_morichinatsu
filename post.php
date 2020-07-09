<?php
session_start();
//var_dump($_SESSION['user_id']);
//exit(); 
//ok

//共通関数の読込
// データベース接続
include('functions/common.php');
//DB接続
$pdo = connect_db();
// データ取得SQL作成
$sql = 'SELECT * FROM posts_table';

//users_tableのidをposts_tableに入れる
$user_id = $_SESSION['user_id'];
var_dump($_SESSION['user_id']);
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
    <?php include('header.php'); ?>
    <main role="main">
        <section class="jumbotron text-center" id="login">
            <div class="container">
                <h1>新規投稿</h1>
                <p class="lead text-muted">メモ以外は入力必須です</p>
                <form action="post_act.php" method="POST" id="form" enctype="multipart/form-data">
                    <fieldset>
                        <div class="form_1colmun">
                            <input type="text" name="title" placeholder="タイトルを入力" class="form_input">
                        </div>
                        <div class="form_1colmun">
                            <input type="text" name="honbun" placeholder="メモ・説明を入力" class="form_input">
                        </div>
                        <div class="form_1colmun">
                            <input type="date" name="hizuke" id="hizuke" class="form_input">
                            <span id="date_error" class="error_msg"></span>
                        </div>
                        <!-- 画像アップロード -->
                        <div class="form_1colmun">
                            <div class="form_input">
                                <input id="img_file" type="file" name="img_file" placeholder="画像ファイルを選択">
                                <span id="img_error" class="error_msg"></span>
                            </div>
                        </div>
                        <!-- /画像アップロード -->
                        <div class="form_btn">
                            <!--ログインユーザー情報を送信-->
                            <input type="hidden" name="user_id" value="<?= $user_id ?>">
                            <button class="f_btn btn-danger my-2" type="submit">投稿する</button>
                        </div>
                    </fieldset>

                </form>
                <p class="lead text-muted">
                    <a href="mypage.php" class="f_btn btn-secondary my-2">マイページに戻る</a>
                </p>
            </div>
        </section>



    </main>

    <footer class="text-muted">

    </footer>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script>
        window.jQuery || document.write('<script src="js/vendor/jquery.slim.min.js"><\/script>')
    </script>
    <script src="js/bootstrap.bundle.js"></script>
</body>

</html>