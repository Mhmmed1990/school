<?php
require 'includes/db.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];

    // هنا يمكن إضافة منطق إرسال البريد الإلكتروني لاستعادة كلمة المرور
    // سنقوم هنا فقط بعرض رسالة تأكيد
    $message = "تم إرسال تعليمات استعادة كلمة المرور إلى بريدك الإلكتروني.";
}
?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>نسيت كلمة المرور</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container">
        <h1>نسيت كلمة المرور</h1>
        <?php if (isset($message)): ?>
            <p class="message"><?php echo $message; ?></p>
        <?php endif; ?>
        <form action="forgot_password.php" method="post">
            <div class="form-group">
                <label for="email">البريد الإلكتروني</label>
                <input type="email" name="email" required>
            </div>
            <input type="submit" value="استعادة كلمة المرور">
        </form>
        <a href="login.php">تسجيل الدخول</a>
    </div>
</body>
</html>