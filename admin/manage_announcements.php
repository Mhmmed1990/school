
<?php

require '../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $message = $_POST['message'];

    $sql = "INSERT INTO announcements (title, message) VALUES ('$title', '$message')";

    if ($conn->query($sql) === TRUE) {
        echo "تم إضافة الإعلان بنجاح";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$sql = "SELECT * FROM announcements";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إدارة الإعلانات</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <div class="container">
        <h1>إدارة الإعلانات</h1>
        <form action="manage_announcements.php" method="post">
            <div class="form-group">
                <label for="title">عنوان الإعلان</label>
                <input type="text" name="title" id="title" required>
            </div>
            <div class="form-group">
                <label for="message">محتوى الإعلان</label>
                <textarea name="message" id="message" required></textarea>
            </div>
            <input type="submit" value="إضافة">
        </form>
        <h2>الإعلانات الحالية</h2>
        <ul>
            <?php while($row = $result->fetch_assoc()): ?>
                <li><strong><?php echo $row['title']; ?></strong>: <?php echo $row['message']; ?> (<?php echo $row['date']; ?>)</li>
            <?php endwhile; ?>
        </ul>
        <a href="dashboard.php">العودة للوحة التحكم</a>
    </div>
</body>
</html>