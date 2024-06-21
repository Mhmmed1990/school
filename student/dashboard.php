<?php
require '../includes/db.php';
session_start();

// التحقق من تسجيل دخول الطالب
if (!isset($_SESSION['student_id'])) {
    header('Location: ../login.php');
    exit;
}

// جلب بيانات الطالب من قاعدة البيانات
$student_id = $_SESSION['student_id'];
$sql = "SELECT * FROM students WHERE id = $student_id";
$result = $conn->query($sql);
$student = $result->fetch_assoc();

// جلب الدورات الدراسية الخاصة بالطالب
$sql_courses = "SELECT * FROM courses JOIN student_courses ON courses.id = student_courses.course_id WHERE student_courses.student_id = $student_id";
$result_courses = $conn->query($sql_courses);

// جلب الدرجات الخاصة بالطالب
$sql_grades = "SELECT courses.name as course_name, grades.grade FROM grades JOIN courses ON grades.course_id = courses.id WHERE grades.student_id = $student_id";
$result_grades = $conn->query($sql_grades);
?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>لوحة تحكم الطالب</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <div class="container">
        <h1>مرحباً، <?php echo $student['name']; ?></h1>
        
        <h2>المواد الدراسية الخاصة بك</h2>
        <ul>
            <?php while($course = $result_courses->fetch_assoc()): ?>
                <li><a href="course.php?id=<?php echo $course['id']; ?>"><?php echo $course['name']; ?></a></li>
            <?php endwhile; ?>
        </ul>

        <h2>درجاتك</h2>
        <ul>
            <?php while($grade = $result_grades->fetch_assoc()): ?>
                <li><?php echo $grade['course_name']; ?>: <?php echo $grade['grade']; ?></li>
            <?php endwhile; ?>
        </ul>

        <h2>معلوماتك الشخصية</h2>
        <p>اسم الأم: <?php echo $student['mother_name']; ?></p>
        <p>اسم الأب: <?php echo $student['father_name']; ?></p>
        <p>تاريخ الميلاد: <?php echo $student['birthdate']; ?></p>
        <p>الذمة المالية المترتبة: <?php echo $student['financial_debt']; ?></p>
        <p>المبالغ المدفوعة: <?php echo $student['financial_paid']; ?></p>

        <a href="../logout.php">تسجيل الخروج</a>
    </div>
</body>
</html>