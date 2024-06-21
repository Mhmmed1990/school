<?php
require '../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];

    $sql = "INSERT INTO subjects (name, description) VALUES ('$name', '$description')";

    if ($conn->query($sql) === TRUE) {
        echo "تم إضافة المادة بنجاح";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$sql = "SELECT * FROM subjects";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إدارة المواد</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <div class="container">
        <h1>إدارة المواد</h1>
        <form action="manage_subjects.php" method="post">
            <div class="form-group">
                <label for="name">اسم المادة</label>
                <input type="text" name="name" id="name" required>
            </div>
            <div class="form-group">
                <label for="description">وصف المادة</label>
                <textarea name="description" id="description" required></textarea>
            </div>
            <input type="submit" value="إضافة">
        </form>
        <h2>المواد الحالية</h2>
        <ul>
            <?php while($row = $result->fetch_assoc()): ?>
                <li><?php echo $row['name']; ?>: <?php echo $row['description']; ?></li>
            <?php endwhile; ?>
        </ul>
        <a href="dashboard.php">العودة للوحة التحكم</a>
    </div>
</body>
</html>