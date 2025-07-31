<?php include 'db.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SmartMethods Task</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h2>Enter New User</h2>
<form method="POST" action="">
    Name: <input type="text" name="name" required>
    Age: <input type="number" name="age" required>
    <input type="submit" name="submit" value="Submit">
</form>

<?php
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $sql = "INSERT INTO users (name, age, status) VALUES ('$name', $age, 0)";
    $conn->query($sql);
    header("Location: index.php");
}
?>

<h2>Users Table</h2>
<table>
    <tr>
        <th>ID</th><th>Name</th><th>Age</th><th>Status</th><th>Action</th>
    </tr>
    <?php
    $result = $conn->query("SELECT * FROM users");
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['name']}</td>
                <td>{$row['age']}</td>
                <td id='status-{$row['id']}'>{$row['status']}</td>
                <td><button onclick='toggleStatus({$row['id']})'>Toggle</button></td>
            </tr>";
    }
    ?>
</table>

<script src="script.js"></script>
</body>
</html>
