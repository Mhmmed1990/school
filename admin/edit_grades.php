<?php
require '../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $studentId = $_POST['student_id'];
    $subject = $_POST['subject'];
    $month = $_POST['month'];
    $grade = $_POST['grade'];

    $sql = "INSERT INTO grades (student_id, subject, month, grade) VALUES ('$studentId', '$subject', '$month', '$grade')";

    if ($conn->query($sql) === TRUE) {
        echo "تم إضافة العلامة بنجاح";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$sql = "SELECT * FROM students";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تعديل علامات الطلاب</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <div class="container">
        <h1>تعديل علامات الطلاب</h1>
        <form action="edit_grades.php" method="post">
            <div class="form-group">
                <label for="student_id">رقم الطالب</label>
                <select name="student_id" id="student_id" required>
                    <?php while($row = $result->fetch_assoc()): ?>
                        <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                    <?php endwhile; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="subject">المادة</label>
                <input type="text" name="subject" id="subject" required>
            </div>
            <div class="form-group">
                <label for="month">الشهر</label>
                <input type="text" name="month" id="month" required>
            </div>
            <div class="form-group">
                <label for="grade">العلامة</label>
                <input type="number" name="grade" id="grade" required>
            </div>
            <input type="submit" value="إضافة">
        </form>
        <a href="dashboard.php">العودة للوحة التحكم</a>
    </div>
</body>
</html>