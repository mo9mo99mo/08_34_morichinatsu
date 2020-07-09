<?php
//全ファイル共通の処理

//データベースに接続する関数
function connect_db()
{

    $dbn = 'mysql:dbname=gsacf_d06_34;charset=utf8;port=3306;host=localhost';
    $user = 'root';
    $pwd = '';
    $options = [
        //error report PDO::ERRMODE_EXCEPTION 例外を投げる
        //FETCH_MODE 配列の形式を指定するモード PDO::ATTR_DEFAULT_FETCH_MODE デフォルトの設定 PDO::FETCH_ASSOC カラム名の配列を返す
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ];
    //return new PDO($dbn, $user, $pwd, $options);
    try {
        // ここでDB接続処理を実行する
        return new PDO($dbn, $user, $pwd);
    } catch (PDOException $e) {
        // DB接続に失敗した場合はここでエラーを出力し，以降の処理を中止する
        echo json_encode(["db error" => "{$e->getMessage()}"]);
        exit();
    }
}

// データベースの処理 insert
/* @param string $sql
 * @param array $arr
 * @return int lastInsertId
 * 最終行のIDを取得、その後に挿入*/

function insert($sql, $arr = [])
{
    $pdo = connect_db();
    $stmt = $pdo->prepare($sql);
    $stmt->execute($arr);
    return $pdo->lastInsertId(); //最終行のIDを取得
}



// ログイン状態をチェックする関数
// ログインしているかどうかチェック→毎回id再生成
function check_session_id()
{
    // 失敗時はログイン画面に戻る(セッションidがないor一致しない) 
    if (
        !isset($_SESSION['session_id']) ||
        $_SESSION['session_id'] != session_id()
    ) {
        header('Location:login.php');
    } else {
        session_regenerate_id(true); // セッションidの再生成
        $_SESSION['session_id'] = session_id(); //セッション変数に格納
    }
}
