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
        session_start();
        $_SESSION['registration'] = 'registration';
        ?>
        <h2> 登録情報を入力してください </h2><br>
        <form action="index.php" method="post">
            ID<br><input type="text" name="reg_id"><br>
            パスワード<br><input type="password" name="reg_pw"><br>
            <input type="submit" value="登録">
        </form>
    </div>
    <div id="footer">
        <a href="?p=top">トップページ</a> |
        <a href="?p=party">秘密のパーティー</a> |
        <a href="?p=journey">秘密のジャーニー</a> |
        <a href="?p=logout">ログアウト</a>
    </div>
</body>

</html>