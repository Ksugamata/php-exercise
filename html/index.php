<?php

$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = isset($_POST["name"]) ? trim($_POST["name"]) : "";
    if (empty($name)) {
        $errors["name"] = "お名前を入力してください。";
    } elseif (mb_strlen($name) < 3) {
        $errors["name"] = "お名前は3文字以上で入力してください。";
    }

    $email = isset($_POST["email"]) ? trim($_POST["email"]) : "";
    if (empty($email)) {
        $errors["email"] = "メールアドレスを入力してください。";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors["email"] = "有効なメールアドレスを入力してください。";
    }

    $password = isset($_POST["password"]) ? $_POST["password"] : "";
    if (empty($password)) {
        $errors["password"] = "パスワードを入力してください。";
    } elseif (mb_strlen($password) < 5) {
        $errors["password"] = "パスワードは5文字以上で入力してください。";
    }

    if (empty($errors)) {
        session_start();
        $_SESSION["form_data"] = [
            "name" => $name,
            "email" => $email,
            "password" => $password
        ];
        
        header("Location: thanks.php");
        exit;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>フォーム</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        .error {
            color: red;
            font-size: 0.9em;
            margin-top: 3px;
        }
    </style>
</head>
<body>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <label for="name">お名前:</label><br>
        <input type="text" id="name" name="name" value="<?php echo isset($name) ? htmlspecialchars($name) : ''; ?>" required><br>
        <?php if (isset($errors["name"])): ?>
            <span class="error"><?php echo $errors["name"]; ?></span><br>
        <?php endif; ?>
        
        <br><label for="email">メールアドレス:</label><br>
        <input type="email" id="email" name="email" value="<?php echo isset($email) ? htmlspecialchars($email) : ''; ?>" required>
        <?php if (isset($errors["email"])): ?>
            <br><span class="error"><?php echo $errors["email"]; ?></span>
        <?php endif; ?>
        
        <br><label for="password">パスワード:</label><br>
        <input type="password" id="password" name="password" required><br>
        <?php if (isset($errors["password"])): ?>
            <span class="error"><?php echo $errors["password"]; ?></span><br>
        <?php endif; ?>
        
        <br><button type="submit">送信</button>
    </form>
</body>
</html>