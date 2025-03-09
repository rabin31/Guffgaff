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
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
        }
        .modal-content {
            background-color: white;
            margin: 10% auto;
            padding: 20px;
            width: 50%;
            border-radius: 8px;
        }
    </style>
</head>
<body class="bg-gray-100 h-screen">
    <div class="flex h-full">
        <div class="w-1/4 bg-blue-600 text-white flex flex-col justify-between py-8 px-4">
            <div>
                <h1 class="text-4xl font-bold mb-6">Users</h1>
                <nav class="space-y-4">
                    <a href="index.php" class="block text-lg hover:underline">Dashboard</a>
                    <a href="messages.php" class="block text-lg hover:underline">Messages</a>
                    <a href="friends.php" class="block text-lg hover:underline">Friends</a>
                </nav>
            </div>
            <a href="logout.php" class="text-red-500 hover:text-red-700 text-lg">LogOut</a>
        </div>

        <div class="flex-1 p-8">
            <h2 class="text-2xl font-bold mb-6">Users</h2>
            <div class="bg-white p-6 rounded-lg shadow-md">
                <table class="table-auto w-full border-collapse border border-gray-300">
                    <thead>
                        <tr class="bg-blue-600 text-white">
                            <th class="p-4 text-left border border-gray-300">Name</th>
                            <th class="p-4 text-left border border-gray-300">Email</th>
                            <th class="p-4 text-left border border-gray-300">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $servername = "localhost";
                        $username = "root";
                        $password = "";
                        $database = "guffgaff";

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
                                <td class='p-4 border border-gray-300'>" . $row["email"] . "</td>
                                <td class='p-4 border border-gray-300'>
                                    <button onclick='openModal(" . $row["user_id"] . ", " . json_encode($row["username"]) . ", " . json_encode($row["email"]) . ")' class='bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-700 transition'>
                                        Edit
                                    </button>
                                    <form action='delete_user.php' method='POST' class='inline'>
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
    
    <div id="editModal" class="modal">
        <div class="modal-content">
            <h2 class="text-xl font-bold mb-4">Edit User</h2>
            <form action="update_user.php" method="POST">
                <input type="hidden" name="user_id" id="editUserId">
                <label class="block">Username:</label>
                <input type="text" name="username" id="editUsername" class="w-full border p-2 rounded mb-4">
                <label class="block">Email:</label>
                <input type="email" name="email" id="editEmail" class="w-full border p-2 rounded mb-4">
                <label class="block">New Password:</label>
                <input type="password" name="password" id="editPassword" class="w-full border p-2 rounded mb-4" placeholder="Leave blank to keep current password">
                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Update</button>
                <button type="button" onclick="closeModal()" class="bg-gray-500 text-white px-4 py-2 rounded">Cancel</button>
            </form>
        </div>
    </div>
    
    <script>
        function openModal(id, username, email) {
            document.getElementById("editUserId").value = id;
            document.getElementById("editUsername").value = username;
            document.getElementById("editEmail").value = email;
            document.getElementById("editPassword").value = "";
            document.getElementById("editModal").style.display = "block";
        }
        function closeModal() {
            document.getElementById("editModal").style.display = "none";
        }
    </script>
</body>
</html>