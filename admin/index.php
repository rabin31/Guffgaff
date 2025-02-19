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

    <!-- Sidebar -->
    <div class="flex h-full">
        <div class="w-1/4 bg-blue-600 text-white flex flex-col justify-between py-8 px-4">
            <div>
                <h1 class="text-4xl font-bold mb-6">guffgaff admin</h1>
                <nav class="space-y-4">
                    <a href="index.php" class="block text-lg hover:underline">Dashboard</a>
                    <a href="users1.php" class="block text-lg hover:underline">Users</a>
                    <a href="messages.php" class="block text-lg hover:underline">Messages</a>
                </nav>
            </div>
            <a href="logout.php" class="text-red-500 hover:text-red-700 text-lg">LogOut</a>
        </div>

        <!-- Main Content -->
        <div class="flex-1 p-8">
            <div class="">
               <h2 class="text-center text-3xl font-bold text-blue-600">WELCOME! ADMIN</h2>
            </div>
            <div class="grid grid-cols-2 gap-8 mt-5">
                <div class="bg-white p-6 rounded-lg shadow-md text-center transform hover:scale-105 transition-all duration-300">
                    <h2 class="text-gray-600 text-xl mb-4">Total Users</h2>
                    <?php

                     ?>
                    <p class="text-4xl font-bold text-blue-600">2</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md text-center transform hover:scale-105 transition-all duration-300">
                    <h2 class="text-gray-600 text-xl mb-4">Total Messages</h2>
                    <p class="text-4xl font-bold text-blue-600">2</p>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
