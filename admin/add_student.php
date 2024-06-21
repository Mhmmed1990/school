<?php

require '../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $studentCode = mt_rand(10000, 99999);

    $sql = "INSERT INTO students (name, email, password, student_code) VALUES ('$name', '$email', '$password', '$studentCode')";

    if ($conn->query($sql) === TRUE) {
        echo "تم إضافة الطالب بنجاح. رقم الطالب الخاص به هو: $studentCode";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إضافة طالب جديد</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <div class="container">
        <h1>إضافة طالب جديد</h1>
        <form action="add_student.php" method="post">
            <div class="form-group">
                <label for="name">الاسم الكامل</label>
                <input type="text" name="name" id="name" required>
            </div>
            <div class="form-group">
                <label for="email">البريد الإلكتروني</label>
                <input type="email" name="email" id="email" required>
            </div>
            <div class="form-group">
                <label for="password">كلمة المرور</label>
                <input type="password" name="password" id="password" required>
            </div>
            <input type="submit" value="إضافة">
        </form>
        <a href="dashboard.php">العودة للوحة التحكم</a>
    </div>
</body>
</html>