<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "chat-app";

$connection = new mysqli($servername, $username, $password, $database);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $user_id = $_POST["user_id"];

    if (!empty($user_id)) {
        $stmt = $connection->prepare("DELETE FROM users WHERE user_id = ?");
        $stmt->bind_param("i", $user_id);

        if ($stmt->execute()) {
            header("Location: users1.php"); // Redirect back to the users page
            exit();
        } else {
            echo "Error deleting record: " . $connection->error;
        }

        $stmt->close();
    } else {
        echo "Invalid User ID";
    }
}

$connection->close();
?>
