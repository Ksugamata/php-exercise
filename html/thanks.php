<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>受け取り</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = isset($_POST["name"]) ? htmlspecialchars($_POST["name"], ENT_QUOTES, 'UTF-8') : "";
        $email = isset($_POST["email"]) ? htmlspecialchars($_POST["email"], ENT_QUOTES, 'UTF-8') : "";
        $password = isset($_POST["password"]) ? htmlspecialchars($_POST["password"], ENT_QUOTES, 'UTF-8') : "";
        
        echo "<p>お名前:" . $name . "</p>";
        echo "<p>メールアドレス: " . $email . "</p>";
        echo "<p>パスワード: " . $password . "</p>";
    } else {
        echo "<p>不正なアクセスです。お問い合わせフォームから送信してください。</p>";
    }
    ?>
</body>
</html>