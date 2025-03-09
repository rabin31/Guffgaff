<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$database = "guffgaff";

$connection = new mysqli($servername, $username, $password, $database);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

$sql = "SELECT u1.username AS user, u2.username AS friend, u2.full_username, u2.img FROM friends
        JOIN users u1 ON friends.unique_id = u1.unique_id
        JOIN users u2 ON friends.friend_id = u2.unique_id";
$result = $connection->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Friends - GuffGaff</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap');
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-100 h-screen">
    <div class="flex h-full">
        <div class="w-1/4 bg-blue-600 text-white flex flex-col justify-between py-8 px-4">
            <div>
                <h1 class="text-4xl font-bold mb-6">Friends</h1>
                <nav class="space-y-4">
                    <a href="index.php" class="block text-lg hover:underline">Dashboard</a>
                    <a href="users1.php" class="block text-lg hover:underline">Users</a>
                    <a href="messages.php" class="block text-lg hover:underline">Messages</a>
                </nav>
            </div>
            <a href="logout.php" class="text-red-500 hover:text-red-700 text-lg">LogOut</a>
        </div>

        <div class="flex-1 p-8">
            <h2 class="text-2xl font-bold mb-6">Users and Their Friends</h2>
            <div class="bg-white p-6 rounded-lg shadow-md">
                <table class="table-auto w-full border-collapse border border-gray-300">
                    <thead>
                        <tr class="bg-blue-600 text-white">
                            <th class="p-4 text-left border border-gray-300">User</th>
                            <th class="p-4 text-left border border-gray-300">Friend's Profile</th>
                            <th class="p-4 text-left border border-gray-300">Friend's Username</th>
                            <th class="p-4 text-left border border-gray-300">Friend's Full Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = $result->fetch_assoc()): ?>
                        <tr class='hover:bg-gray-100'>
                            <td class='p-4 border border-gray-300'><?php echo htmlspecialchars($row["user"]); ?></td>
                            <td class='p-4 border border-gray-300'>
                                <img src='../php/images/pfp/<?php echo $row["img"]; ?>' alt='Profile' class='w-10 h-10 rounded-full'>
                            </td>
                            <td class='p-4 border border-gray-300'><?php echo htmlspecialchars($row["friend"]); ?></td>
                            <td class='p-4 border border-gray-300'><?php echo htmlspecialchars($row["full_username"]); ?></td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
