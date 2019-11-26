<?php
session_start();
$_SESSION['page'] = @$_GET['p'];
if (!$_SESSION['page']) $_SESSION['page'] = 'top';
if (!preg_match('/^[a-z]{1,8}$/', $_SESSION['page'])) exit();
if (isset($_SESSION['registration'])) {
    if (isset($_POST['reg_id'])) {
        if ($_POST['reg_id'] != "") {
            if (isset($_POST['reg_pw'])) {
                if ($_POST['reg_pw']) {
                    $_SESSION['account'] = array('id' => $_POST['reg_id'], 'pw' => $_POST['reg_pw']);
                    // print_r($_SESSION['account']);
                    $_SESSION['page'] = 'login';
                    unset($_SESSION['registration']);
                } else {
                    echo "パスワードを入力してください";
                }
            }
        } else {
            echo "IDを入力してください";
        }
    }
}
if (!isset($_SESSION['name'])) {
    $_SESSION['page'] = 'login';
    if (isset($_POST['id'])) {
        if ($_POST['id'] === $_SESSION['account']['id'] && $_POST['pw'] === $_SESSION['account']['pw']) {
            $_SESSION['name'] = $_SESSION['account']['id'];
            $_SESSION['page'] = 'top';
        }
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>秘密倶楽部</title>
    <style>
        h1 {
            margin: 0;
        }

        #header,
        #footer {
            background-color: #fed;
            text-align: center;
            height: 60px;
            /* width: 50%; */
            padding: 10px;
        }

        #main {
            background-color: #eee;
            text-align: center;
            /* width: 50%; */
            padding: 10px;
        }
    </style>
</head>

<body>
    <div id="header">
        <h1>秘密倶楽部へようこそ</h1>
    </div>
    <div id="main">
        <?php
        require "{$_SESSION['page']}.php";
        ?>
    </div>
    <div id="footer">
        <a href="?p=top">トップページ</a> |
        <a href="?p=party">秘密のパーティー</a> |
        <a href="?p=journey">秘密のジャーニー</a> |
        <a href="?p=logout">ログアウト</a>
    </div>
</body>

</html>