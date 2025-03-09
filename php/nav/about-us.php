<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
   
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        .fade-in {
            animation: fadeIn 1.5s ease-in-out;
        }
    </style>
</head>
<body class="bg-blue-800 text-white font-sans">

    <!-- About Section -->
    <section class="h-screen flex items-center justify-center">
        <div class="text-center px-6 md:px-12 fade-in">
            <h1 class="text-4xl md:text-6xl font-bold mb-4">About Us</h1>
            <p class="text-lg md:text-xl max-w-2xl mx-auto mb-6">
            Guffgaff, originally known as a mobile network operator, also offers a chat app that focuses on creating community-driven communication.
            </p>
            <a href="services.php" 
               class="inline-block px-6 py-3 bg-white text-blue-500 font-bold rounded-lg hover:bg-gray-100 transition">
                Learn More
            </a>
        </div>
    </section>

</body>
</html>

