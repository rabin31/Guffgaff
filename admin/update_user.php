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

    $sql = "UPDATE users SET username=?, email=? WHERE user_id=?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("ssi", $username, $email, $user_id);

    if ($stmt->execute()) {
        header("Location: index.php"); // Redirect to index.php after update
        exit();
    } else {
        echo "Error updating record: " . $connection->error;
    }
}
?>
