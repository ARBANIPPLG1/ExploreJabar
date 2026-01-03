<?php
// PHP untuk memulai sesi dan memeriksa otorisasi
session_start();

// Data pengguna yang sudah login (Contoh data)
$user_name = "Ahmad";
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EXPLORE JABAR - Plan Your Adventure</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body class="bg-gray-50">

    <header class="bg-blue-800 text-white shadow-md">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <a href="homepage.php" class="text-xl font-bold uppercase tracking-wider">
                EXPLORE JABAR
            </a>

            <nav class="hidden md:flex items-center space-x-6">
                <a href="homepage.php" class="hover:text-blue-200 font-semibold transition duration-150">HOME</a>
                <a href="#" class="hover:text-blue-200 font-semibold transition duration-150">ABOUT US</a>
                <a href="#" class="hover:text-blue-200 font-semibold transition duration-150">TOUR</a>
                <a href="#" class="hover:text-blue-200 font-semibold transition duration-150">GALERY</a>
                <a href="#" class="hover:text-blue-200 font-semibold transition duration-150">CONTACT</a>
            </nav>

            <div class="flex items-center space-x-4">
                <span class="text-sm font-semibold hidden sm:block"><?php echo htmlspecialchars($user_name); ?></span>
                <a href="#" class="w-8 h-8 bg-gray-300 rounded-full overflow-hidden border-2 border-white" title="Profile">
                    <img src="images/ahmad_avatar.jpg" alt="<?php echo htmlspecialchars($user_name); ?>" class="w-full h-full object-cover">
                </a>
                <button class="relative text-white hover:text-blue-200">
                    <i class="fas fa-bell text-lg"></i>
                    <span class="absolute top-0 right-0 block h-2 w-2 rounded-full ring-2 ring-blue-800 bg-red-500"></span>
                </button>
            </div>
        </div>
    </header>

    <main class="container mx-auto px-6 py-12">
        <div class="max-w-4xl mx-auto bg-white p-8 md:p-12 rounded-lg shadow-xl">
            
            <div class="text-center mb-10">
                <h1 class="text-3xl font-bold text-gray-800 mb-2">Plan Your Adventure</h1>
                <p class="text-gray-500">We just need some information to complete your booking.</p>
            </div>

            <form action="proses_pemesanan.php" method="POST" class="space-y-8">

                <div class="space-y-6">
                    <h2 class="text-xl font-semibold text-gray-800 flex items-center">
                        <span class="inline-block w-2 h-2 rounded-full bg-blue-600 mr-3"></span> Personal Information
                    </h2>
                    
                    <div class="grid grid-cols-1 md:grid-cols-3 items-center gap-4">
                        <label for="full_name" class="font-medium text-gray-700">Full Name:</label>
                        <input type="text" id="full_name" name="full_name" required class="md:col-span-2 block w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 items-center gap-4">
                        <label for="date_of_birth" class="font-medium text-gray-700">Date of Birth:</label>
                        <input type="date" id="date_of_birth" name="date_of_birth" required class="md:col-span-2 block w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 items-center gap-4">
                        <label for="phone_number" class="font-medium text-gray-700">Phone Number:</label>
                        <input type="tel" id="phone_number" name="phone_number" required class="md:col-span-2 block w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-3 items-center gap-4">
                        <label for="address" class="font-medium text-gray-700">Address:</label>
                        <input type="text" id="address" name="address" required class="md:col-span-2 block w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-blue-500 focus:border-blue-500">
                    </div>
                </div>
                
                <hr class="border-gray-200 my-8">

                <div class="space-y-6">
                    <h2 class="text-xl font-semibold text-gray-800 flex items-center">
                        <span class="inline-block w-2 h-2 rounded-full bg-blue-600 mr-3"></span> Trip Details
                    </h2>
                    
                    <div class="grid grid-cols-1 md:grid-cols-3 items-center gap-4">
                        <label for="destination" class="font-medium text-gray-700">Destination:</label>
                        <input type="text" id="destination" name="destination" required class="md:col-span-2 block w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 items-center gap-4">
                        <label for="package" class="font-medium text-gray-700">Select Package:</label>
                        <div class="md:col-span-2 relative">
                            <select id="package" name="package" required class="block appearance-none w-full border border-gray-300 rounded-lg px-4 py-3 pr-8 focus:ring-blue-500 focus:border-blue-500">
                                <option value="">-- Pilih Paket --</option>
                                <option value="standard">Standard Package</option>
                                <option value="premium">Premium Package</option>
                                <option value="luxury">Luxury Package</option>
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 text-gray-700">
                                <i class="fas fa-chevron-down text-xs"></i>
                            </div>
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-3 items-center gap-4">
                        <label for="choose_date" class="font-medium text-gray-700">Choose Date:</label>
                        <input type="date" id="choose_date" name="choose_date" required class="md:col-span-2 block w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-3 items-center gap-4">
                        <label for="participants" class="font-medium text-gray-700">Number of Participant:</label>
                        <input type="number" id="participants" name="participants" required min="1" class="md:col-span-2 block w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-3 items-center gap-4">
                        <label for="duration" class="font-medium text-gray-700">Duration:</label>
                        <input type="text" id="duration" name="duration" placeholder="e.g., 3 Days 2 Nights" required class="md:col-span-2 block w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-blue-500 focus:border-blue-500">
                    </div>
                </div>
                
                <hr class="border-gray-200 my-8">

                <div class="space-y-4">
                    <div class="flex items-center">
                        <input id="terms_conditions" name="terms_conditions" type="checkbox" required class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                        <label for="terms_conditions" class="ml-3 block text-sm text-gray-700 select-none">
                            I agree to the <a href="#" class="text-blue-600 hover:text-blue-800 font-medium">terms & conditions</a>
                        </label>
                    </div>

                    <div class="flex items-center">
                        <input id="info_correct" name="info_correct" type="checkbox" required class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                        <label for="info_correct" class="ml-3 block text-sm text-gray-700 select-none">
                            I confirm that all information is correct
                        </label>
                    </div>
                </div>

                <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 rounded-lg shadow-md transition duration-200 mt-6">
                    Confirm Booking
                </button>

            </form>
        </div>
    </main>

    <footer class="bg-white pt-16 border-t border-gray-200 mt-12">
        <div class="container mx-auto px-6 pb-10">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
                <div>
                    <h3 class="text-2xl font-bold text-blue-700 uppercase tracking-wider mb-2">
                        EXPLORE JABAR
                    </h3>
                    <p class="text-gray-600 text-base">
                        Your trusted guide to discovering the beauty of West Java.
                    </p>
                    <div class="w-1/3 mt-4 border-b-2 border-blue-600"></div>
                </div>

                <div class="md:col-span-1">
                    <nav class="flex flex-wrap space-x-6 md:space-x-8 text-gray-700 text-base font-medium mt-12 md:mt-0">
                        <a href="homepage.php" class="hover:text-blue-600 transition duration-150">HOME</a>
                        <a href="#" class="hover:text-blue-600 transition duration-150">ABOUT US</a>
                        <a href="#" class="hover:text-blue-600 transition duration-150">TOUR</a>
                        <a href="#" class="hover:text-blue-600 transition duration-150">GALERY</a>
                        <a href="#" class="hover:text-blue-600 transition duration-150">CONTACT</a>
                    </nav>
                </div>

                <div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-6">Contact Us</h3>
                    <div class="space-y-4 text-gray-600">
                        <div class="flex items-start">
                            <i class="fas fa-map-marker-alt text-lg text-blue-600 mr-3 mt-1"></i>
                            <p>Jl. Aminah Syukur No.82, Sungai Pinang Luar, Kec. Samarinda Kota, Kota Samarinda, Kalimantan Timur 75113</p>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-phone-alt text-lg text-blue-600 mr-3"></i>
                            <div>
                                <p>(555) 111-2345</p>
                                <p>(555) 222-6789</p>
                            </div>
                        </div>
                        </div>
                </div>
            </div>
        </div>

        <div class="bg-blue-800 text-white py-4">
            <div class="container mx-auto px-6 flex flex-col md:flex-row justify-between items-center text-sm">
                <div class="flex space-x-6 mb-2 md:mb-0">
                    <a href="#" class="hover:underline">Help Center</a>
                    <a href="#" class="hover:underline">Terms</a>
                    <a href="#" class="hover:underline">Privacy</a>
                </div>
                <p>&copy; 2025 ExploreJabar. All rights reserved.</p>
            </div>
        </div>
    </footer>

</body>
</html>