<?php
require '../includes/db.php';
session_start();

// التحقق من تسجيل دخول الطالب
if (!isset($_SESSION['student_id'])) {
    header('Location: ../login.php');
    exit;
}

$course_id = $_GET['id'];
$student_id = $_SESSION['student_id'];

// جلب بيانات المادة الدراسية
$sql_course = "SELECT * FROM courses WHERE id = $course_id";
$result_course = $conn->query($sql_course);
$course = $result_course->fetch_assoc();

// جلب المواد التعليمية الخاصة بالمادة
$sql_materials = "SELECT * FROM materials WHERE course_id = $course_id";
$result_materials = $conn->query($sql_materials);
?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $course['name']; ?></title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <div class="container">
        <h1><?php echo $course['name']; ?></h1>
        <p><?php echo $course['description']; ?></p>

        <h2>المواد التعليمية</h2>
        <ul>
            <?php while($material = $result_materials->fetch_assoc()): ?>
                <li><a href="material.php?id=<?php echo $material['id']; ?>"><?php echo $material['title']; ?></a></li>
            <?php endwhile; ?>
        </ul>

        <a href="dashboard.php">العودة للوحة التحكم</a>
    </div>
</body>
</html>