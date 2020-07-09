<?php
session_start();
//共通関数の読込
// データベース接続
require_once('functions/common.php');
//DB接続
$pdo = connect_db();

?>
<!doctype html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <title>課題8 | マイページ</title>

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
<!doctype html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <title>課題8 | ユーザー登録</title>

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

    <!-- ここからユーザー登録フォーム -->
    <main role="main">
        <section class="jumbotron text-center" id="login">
            <div class="container">
                <h1>新規ユーザー登録</h1>
                <p class="lead text-muted">ユーザー名とパスワードを入力してください</p>
                <form action="register_act.php" method="POST">
                    <fieldset>
                        <div class="form_1colmun">
                            <input type="text" name="user_name" placeholder="ユーザー名" class="form_input">
                        </div>
                        <div class="form_1colmun">
                            <input type="password" name="pwd" placeholder="パスワード" class="form_input">
                        </div>
                        <div class="form_btn">
                            <button class="f_btn btn-danger my-2">登録する</button>
                        </div>
                    </fieldset>

                </form>
                <p class="lead text-muted">ユーザー登録がお済みの方はこちら</p>
                <p>
                    <a href="login.php" class="f_btn btn-secondary my-2">ログイン</a>
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