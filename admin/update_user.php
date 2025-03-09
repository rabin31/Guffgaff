<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "guffgaff";

$connection = new mysqli($servername, $username, $password, $database);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_POST["user_id"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    if (!empty($password)) {
        // Hash the new password before updating
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);
        $sql = "UPDATE users SET username=?, email=?, password=? WHERE user_id=?";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("sssi", $username, $email, $hashed_password, $user_id);
    } else {
        $sql = "UPDATE users SET username=?, email=? WHERE user_id=?";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("ssi", $username, $email, $user_id);
    }

    if ($stmt->execute()) {
        echo "<script>alert('User updated successfully!'); window.location.href='index.php';</script>";
        exit();
    } else {
        echo "Error updating record: " . $connection->error;
    }
}
?>
