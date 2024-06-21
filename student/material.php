<?php
require '../includes/db.php';
session_start();

// التحقق من تسجيل دخول الطالب
if (!isset($_SESSION['student_id'])) {
    header('Location: ../login.php');
    exit;
}

$material_id = $_GET['id'];
$student_id = $_SESSION['student_id'];

// جلب بيانات المادة التعليمية
$sql_material = "SELECT * FROM materials WHERE id = $material_id";
$result_material = $conn->query($sql_material);
$material = $result_material->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $material['title']; ?></title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <div class="container">
        <h1><?php echo $material['title']; ?></h1>
        <p><?php echo $material['content']; ?></p>
        <a href="../uploads/<?php echo $material['file']; ?>" target="_blank">تحميل الملف</a>

        <a href="course.php?id=<?php echo $material['course_id']; ?>">العودة للمادة الدراسية</a>
    </div>
</body>
</html>