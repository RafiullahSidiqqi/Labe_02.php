<?php
$message = "";

$conn = new mysqli("localhost", "root", "", "wis_lab");

if ($conn->connect_error) {
    $message = "Connection failed: " . $conn->connect_error;
} else {
    $sql = "CREATE TABLE IF NOT EXISTS students (
        id INT AUTO_INCREMENT PRIMARY KEY,
        full_name VARCHAR(100) NOT NULL,
        email VARCHAR(120) NOT NULL,
        department VARCHAR(80) NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";

    if ($conn->query($sql)) {
        $message = "Students table created successfully.";
    } else {
        $message = "Table creation failed: " . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Create Students Table</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card p-4 mx-auto" style="max-width: 600px;">
        <h2 class="text-center mb-4">Create Students Table</h2>

        <div class="alert alert-info">
            <?php echo htmlspecialchars($message); ?>
        </div>

        <a href="insert_student.php" class="btn btn-primary">Add Student</a>
    </div>
</div>

</body>
</html>