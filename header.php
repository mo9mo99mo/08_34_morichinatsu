<?php
//セッション確認
//check_session_id();

if (isset($_SESSION['session_id'])) {
    //ログイン時の処理
    $username = $_SESSION['username'];
    $e_username = htmlspecialchars($username, \ENT_QUOTES, 'UTF-8');
    $e_link = '<a href="logout.php">ログアウト</a>';
} else {
    //未ログイン時の処理
    $e_username = 'ゲストユーザー';
    $e_link = '<a href="login.php">ログイン</a>';
}
?>


<header>
    <div class="collapse bg-white" id="navbarHeader">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-md-7 py-4">
                    <h4 class="text-dark">About</h4>
                    <p class="text-muted">my Album は、<?php echo $e_username ?>の好きなものたちを集めてコレクションするところです</p>
                </div>
                <div class="col-sm-4 offset-md-1 py-4">
                    <h4 class="text-dark"><?php echo $e_username ?> さん</h4>
                    <ul class="list-unstyled">
                        <li><a href="mypage.php" class="text-dark">マイページ</a></li>
                        <li><?php echo $e_link ?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="navbar navbar-white bg-white shadow-sm">
        <div class="container d-flex justify-content-between">
            <a href="#" class="navbar-brand d-flex align-items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" aria-hidden="true" class="mr-2" viewBox="0 0 24 24" focusable="false">
                    <path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z" />
                    <circle cx="12" cy="13" r="4" /></svg>
                <strong>my Album</strong>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </div>
</header>