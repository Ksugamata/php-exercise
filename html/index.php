<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>フォーム</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <form action="thanks.php" method="POST">
        <label for="name">お名前:</label><br>
        <input type="text" id="name" name="name" required><br>
        
        <br><label for="email">メールアドレス:</label><br>
        <input type="email" id="email" name="email" required>
        
        <br><label for="password">パスワード:</label><br>
        <input type="password" id="password" name="password" required><br>
        
        <button type="submit">送信</button>
    </form>
</body>
</html>