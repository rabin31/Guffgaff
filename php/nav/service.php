<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Services</title>

    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        .fade-in-up {
            animation: fadeInUp 1.5s ease-in-out;
        }
    </style>
</head>
<body class="bg-blue-800 text-white font-sans">

    
    <header class="text-center py-8">
        <h1 class="text-4xl md:text-6xl font-bold">Our Services</h1>
        <p class="mt-2 text-lg md:text-xl">Explore the services we provide to help your business grow.</p>
    </header>

 
    <section class="py-12">
        <div class="container mx-auto px-6 md:px-12">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                
                <div class="bg-white text-blue-500 rounded-lg shadow-md p-6 text-center transform transition hover:scale-105 fade-in-up">
                    <div class="mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4" />
                        </svg>
                    </div>
                    <h2 class="text-xl font-bold mb-2">Real Time Messaging</h2>
                    <p class="text-gray-600">Instant messaging with emojis, media sharing, and notifications.</p>
                </div>

              
                <div class="bg-white text-blue-500 rounded-lg shadow-md p-6 text-center transform transition hover:scale-105 fade-in-up">
                    <div class="mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v5m0-5L6 14m3 3l3-3m0 0v-5m6 6V9a3 3 0 00-6 0v5" />
                        </svg>
                    </div>
                    <h2 class="text-xl font-bold mb-2">Send Friend Requests</h2>
                    <p class="text-gray-600">make new friends in this world</p>
                </div>

            
                <div class="bg-white text-blue-500 rounded-lg shadow-md p-6 text-center transform transition hover:scale-105 fade-in-up">
                    <div class="mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16m-7 4h7" />
                        </svg>
                    </div>
                    <h2 class="text-xl font-bold mb-2">GuffGaff</h2>
                    <p class="text-gray-600">Send message in your own language</p>
                </div>
            </div>
        </div>
    </section>

  
    <footer class="text-center py-6">
        <p>&copy; <?= date('Y') ?> GuffGaff. All rights reserved.</p>
    </footer>

</body>
</html>
