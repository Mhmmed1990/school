<?php
require '../includes/db.php';
session_start();

// التحقق من صلاحيات المستخدم (يمكنك إضافة التحقق من الجلسة أو الصلاحيات هنا)

?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>لوحة التحكم</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <div class="container">
        <h1>لوحة التحكم</h1>
        <ul>
            <li><a href="add_student.php">إضافة طالب جديد</a></li>
            <li><a href="edit_grades.php">تعديل علامات الطلاب</a></li>
            <li><a href="manage_subjects.php">إدارة المواد</a></li>
            <li><a href="manage_announcements.php">إدارة الإعلانات</a></li>
        </ul>
        <a href="../logout.php">تسجيل الخروج</a>
    </div>
</body>
</html