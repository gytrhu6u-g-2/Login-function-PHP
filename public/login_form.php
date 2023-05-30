<?php
session_start();

require_once '../functions.php';
require_once '../classes/UserLogic.php';

$result = UserLogic::checkLogin();
if ($result) {
    header('Location: mypage.php');
    return;
}

$err = $_SESSION;

$_SESSION = array(); // セッションを空にする
session_destroy();
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログイン画面</title>
</head>
<body>
    <h2>ログインフォーム</h2>
    <?php if (isset($err['msg'])) {?>
        <p><?php echo $err['msg']; ?></p>
    <?php } ?>
    <form action="login.php" method="POST">
        <p>
            <label for="email">メールアドレス：</label>
            <input type="email" name="email">
            <?php if (isset($err['email'])) {?>
                <p><?php echo $err['email']; ?></p>
            <?php } ?>
        </p>
        <p>
            <label for="password">パスワード：</label>
            <input type="password" name="password">
            <?php if (isset($err['password'])) {?>
                <p><?php echo $err['password']; ?></p>
            <?php } ?>
        </p>
        <p>
            <input type="submit" value="ログイン">
        </p>
    </form>
    <a href="signup_form.php">新規登録はこちら</a>
</body>
</html>