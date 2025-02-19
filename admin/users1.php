<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users - GuffGaff</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap');
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-100 h-screen">

    <!-- Sidebar -->
    <div class="flex h-full">
        <div class="w-1/4 bg-blue-600 text-white flex flex-col justify-between py-8 px-4">
            <div>
                <h1 class="text-4xl font-bold mb-6">guffgaff</h1>
                <nav class="space-y-4">
                    <a href="index.php" class="block text-lg hover:underline">Dashboard</a>
                    <a href="users.php" class="block text-lg hover:underline">Users</a>
                    <a href="messages.php" class="block text-lg hover:underline">Messages</a>
                </nav>
            </div>
            <a href="logout.php" class="text-red-500 hover:text-red-700 text-lg">LogOut</a>
        </div>

        <!-- Main Content -->
        <div class="flex-1 p-8">
            <h2 class="text-2xl font-bold mb-6">Users</h2>
            <div class="bg-white p-6 rounded-lg shadow-md">
                <table class="table-auto w-full border-collapse border border-gray-300">
                    <thead>
                        <tr class="bg-blue-600 text-white">
                            <th class="p-4 text-left border border-gray-300">Name</th>
                            <th class="p-4 text-left border border-gray-300">Password</th>
                            <th class="p-4 text-left border border-gray-300">Email</th>
                            <th class="p-4 text-left border border-gray-300">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $servername = "localhost";
                        $username = "root";
                        $password = "";
                        $database = "chat-app";

                        $connection = new mysqli($servername, $username, $password, $database);

                        if ($connection->connect_error) {
                            die("Connection failed: " . $connection->connect_error);
                        }

                        $sql = "SELECT * FROM users";
                        $result = $connection->query($sql);

                        if (!$result) {
                            die("Invalid query: " . $connection->error);
                        }

                        while ($row = $result->fetch_assoc()) {
                            echo "<tr class='hover:bg-gray-100'>
                                <td class='p-4 border border-gray-300'>" . $row["username"] . "</td>
                                <td class='p-4 border border-gray-300'>" . $row["password"] . "</td>
                                <td class='p-4 border border-gray-300'>" . $row["email"] . "</td>
                                <td class='p-4 border border-gray-300'>
                                    <form action='delete_user.php' method='POST'>
                                        <input type='hidden' name='user_id' value='" . $row["user_id"] . "'>
                                        <button type='submit' class='bg-red-500 text-white px-4 py-2 rounded hover:bg-red-700 transition'>
                                            Remove
                                        </button>
                                    </form>
                                </td>
                            </tr>";
                        }

                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>
</html>
