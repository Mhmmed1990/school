<?php
require 'includes/db.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($sql);
    $user = $result->fetch_assoc();

    if ($user && password_verify($password, $user['password'])) {
        if ($user['role'] == 'admin') {
            $_SESSION['admin_id'] = $user['id'];
            header('Location: admin/dashboard.php');
        } else {
            $_SESSION['student_id'] = $user['id'];
            header('Location: student/dashboard.php');
        }
        exit;
    } else {
        $error = "بيانات الدخول غير صحيحة";
    }
}
?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تسجيل الدخول</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container">
        <h1>تسجيل الدخول</h1>
        <?php if (isset($error)): ?>
            <p class="error"><?php echo $error; ?></p>
        <?php endif; ?>
        <form action="login.php" method="post">
            <div class="form-group">
                <label for="email">البريد الإلكتروني</label>
                <input type="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">كلمة المرور</label>
                <input type="password" name="password" required>
            </div>
            <input type="submit" value="تسجيل الدخول">
        </form>
        <a href="forgot_password.php">نسيت كلمة المرور؟</a>
    </div>
</body>
</html>