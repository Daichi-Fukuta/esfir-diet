<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>estelle diet</title>
</head>
<body>
<script type="text/javascript">
        myPassWord=prompt("パスワードを入力してください","");
        if (!myPassWord == "password"){
            alert( "パスワードが違います!" );
        }
</script>
<!-- ================================================== -->
<!-- 一番最初の入力フォーム -->
<!-- ================================================== -->
<?php if (!$_POST)  { ?>
    <form method="post">
        <input type="hidden" name="postFlg" value="1">
        <input type="text" name="title" placeholder="title"><br><br>
        <textarea name="content" cols="30" rows="10" placeholder="content"></textarea><br><br>
        <input type="submit" value="入力内容を確認する">
    </form>
<!-- ================================================== -->
<!-- 確認画面 -->
<!-- ================================================== -->
<?php } else if ($_POST && $_POST['postFlg'] === '1'){ ?>
    <?= $_POST['title'], '<br>' ?>
    <?= $_POST['content'], '<br>' ?>
    <form method="post">
        <input type="hidden" name="title" value="<?= $_POST['title']?>">
        <input type="hidden" name="content" value="<?= $_POST['content']?>">
        <input type="hidden" name="postFlg" value="2">
        <input type="submit" value="入力ホームへ戻る">
    </form>
    <form method="post">
        <input type="hidden" name="title" value="<?= $_POST['title']?>">
        <input type="hidden" name="content" value="<?= $_POST['content']?>">
        <input type="hidden" name="postFlg" value="3">
        <input type="submit" value="この内容で投稿する">
    </form>
<!-- ================================================== -->
<!-- 入力フォームに戻る -->
<!-- ================================================== -->
<?php } else if ($_POST && $_POST['postFlg'] === '2') { ?>
    <form method="post">
        <input type="hidden" name="postFlg" value="1">
        <input type="text" name="title" value="<?= $_POST['title'] ?>"><br><br>
        <textarea name="content" cols="30" rows="10"><?= $_POST['content'] ?></textarea><br><br>
        <input type="submit" value="入力内容を確認する">
    </form>
<!-- ================================================== -->
<!-- DBにインサートする -->
<!-- ================================================== -->
<?php } else if ($_POST && $_POST['postFlg'] === '3') {
    try {
        $dsn = 'mysql:dbname=esfir;host=127.0.0.1;charset=utf8mb4';
        $username = 'root';
        $password = 'password';
        $driver_options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
        $db = new PDO($dsn, $username, $password, $driver_options);
    } catch (Exception $e) {
        echo 'DB接続エラー: ' . $e->getMessage();
    }
    $query = $db->prepare('INSERT INTO blogs SET title=?, content=?, created=NOW(), modified=NOW()');
    $query->execute([$_POST['title'], $_POST['content']]);
    header('Location: index.php');
} ?>
</body>
</html>