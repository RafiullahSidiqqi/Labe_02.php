<?php
$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $databaseName = trim($_POST["database_name"]);

    $conn = new mysqli("localhost", "root", "");

    if ($conn->connect_error) {
        $message = "Connection failed: " . $conn->connect_error;
    } elseif ($databaseName == "") {
        $message = "Please enter a database name.";
    } elseif (!preg_match("/^[A-Za-z0-9_]+$/", $databaseName)) {
        $message = "Invalid database name.";
    } else {
        $sql = "CREATE DATABASE `$databaseName`";

        if ($conn->query($sql)) {
            $message = "Database created successfully.";
        } else {
            $message = "Database creation failed: " . $conn->error;
        }
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Create Database</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card p-4 mx-auto" style="max-width: 500px;">
        <h2 class="text-center mb-4">Create Database</h2>

        <?php if ($message != ""): ?>
            <div class="alert alert-info">
                <?php echo htmlspecialchars($message); ?>
            </div>
        <?php endif; ?>

        <form method="POST">
            <div class="mb-3">
                <label class="form-label">Database Name</label>
                <input type="text" name="database_name" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary w-100">
                Create Database
            </button>
        </form>
    </div>
</div>

</body>
</html>