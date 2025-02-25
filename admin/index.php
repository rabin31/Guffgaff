<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GuffGaff Dashboard</title>
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
                <h1 class="text-4xl font-bold mb-6">Dashboard</h1>
                <nav class="space-y-4">
                    <a href="users1.php" class="block text-lg hover:underline">Users</a>
                    <a href="messages.php" class="block text-lg hover:underline">Messages</a>
                </nav>
            </div>
            <a href="logout.php" class="text-red-500 hover:text-red-700 text-lg">LogOut</a>
        </div>
        <div class="flex-1 p-8">
            <div>
               <h2 class="text-center text-3xl font-bold text-blue-600">WELCOME! ADMIN</h2>
            </div>
            <div class="grid grid-cols-2 gap-8 mt-5">
                <div class="bg-white p-6 rounded-lg shadow-md text-center transform hover:scale-105 transition-all duration-300">
                    <h2 class="text-gray-600 text-xl mb-4">Total Users</h2>
                    <?php
                    $conn = new mysqli("localhost", "root", "", "guffgaff");
                    $userCount = $conn->query("SELECT COUNT(*) AS total FROM users")->fetch_assoc()["total"];
                    ?>
                    <p class="text-4xl font-bold text-blue-600"><?php echo $userCount; ?></p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md text-center transform hover:scale-105 transition-all duration-300">
                    <h2 class="text-gray-600 text-xl mb-4">Total Messages</h2>
                    <?php
                    $messageCount = $conn->query("SELECT COUNT(*) AS total FROM messages")->fetch_assoc()["total"];
                    ?>
                    <p class="text-4xl font-bold text-blue-600"><?php echo $messageCount; ?></p>
                </div>
            </div>
            <div class="mt-8 bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-gray-600 text-xl mb-4">User Status</h2>
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr>
                            <th class="border-b p-3">Name</th>
                            <th class="border-b p-3">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $result = $conn->query("SELECT username, status FROM users");
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>
                                    <td class='border-b p-3'>" . $row["username"] . "</td>
                                    <td class='border-b p-3'>" . $row["status"] . "</td>
                                  </tr>";
                        }
                        $conn->close();
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
