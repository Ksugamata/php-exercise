<?php
session_start();

if (isset($_SESSION["form_data"])) {
    $form_data = $_SESSION["form_data"];
    $name = htmlspecialchars($form_data["name"], ENT_QUOTES, 'UTF-8');
    $email = htmlspecialchars($form_data["email"], ENT_QUOTES, 'UTF-8');
    $password = htmlspecialchars($form_data["password"], ENT_QUOTES, 'UTF-8');
    
    unset($_SESSION["form_data"]);
} elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = isset($_POST["name"]) ? htmlspecialchars($_POST["name"], ENT_QUOTES, 'UTF-8') : "";
    $email = isset($_POST["email"]) ? htmlspecialchars($_POST["email"], ENT_QUOTES, 'UTF-8') : "";
    $password = isset($_POST["password"]) ? htmlspecialchars($_POST["password"], ENT_QUOTES, 'UTF-8') : "";
} else {
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>受け取り</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <h2>送信完了</h2>
    <p>お名前: <?php echo $name; ?></p>
    <p>メールアドレス: <?php echo $email; ?></p>
    <p>パスワード: <?php echo $password; ?></p>
</body>
</html>