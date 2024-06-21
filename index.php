<?php
session_start();

// التحقق مما إذا كان المستخدم مسجل الدخول بالفعل
if (isset($_SESSION['student_id'])) {
    header('Location: student/dashboard.php');
    exit;
} elseif (isset($_SESSION['admin_id'])) {
    header('Location: admin/dashboard.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>النظام المدرسي</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container">
        <h1>مرحبًا بكم في النظام المدرسي</h1>
        
        <!-- نموذج البحث -->
        <form action="search.php" method="get">
            <input type="text" name="query" placeholder="ابحث عن الطالب بالرقم الجامعي">
            <input type="submit" value="بحث">
        </form>
        
        <!-- روابط تسجيل الدخول والتسجيل -->
        <div class="auth-links">
            <a href="login.php">تسجيل الدخول</a> |
            <a href="register.php">تسجيل جديد</a>
        </div>
    </div>
</body>
</html>