<?php
session_start();

if ($_SESSION['status'] != "login" || $_SESSION['role'] != "admin") {
    header("Location: index.php?pesan=gagal");
    exit();
}
$admin_name = $_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EXPLORE JABAR ADMIN - Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        /* Custom styling untuk Hero Section sesuai desain */
        .admin-hero-bg {
            background-image: url('images/admin_hero.jpg'); /* Ganti dengan path gambar pemandangan misty mountain Anda */
            background-size: cover;
            background-position: center;
            height: 300px; /* Ketinggian hero section */
        }
        /* Style untuk list item yang terseleksi */
        .destination-item:hover {
            background-color: #f7fafc; /* gray-50 */
        }
    </style>
</head>
<body class="bg-gray-100">

    <header class="bg-blue-800 text-white shadow-lg">
        <div class="container mx-auto px-6 py-3 flex justify-between items-center">
            <div class="text-xl font-bold uppercase tracking-wider">
                EXPLORE JABAR <span class="text-sm font-normal opacity-70 ml-2">ADMIN</span>
            </div>
            
            <div class="flex items-center space-x-3">
                <span class="text-sm font-semibold hidden sm:block"><?php echo htmlspecialchars($admin_name); ?></span>
                <a href="#" class="w-10 h-10 bg-gray-300 rounded-full overflow-hidden border-2 border-white hover:opacity-80 transition duration-150" title="Profile">
                    <img src="images/arlo_smith_avatar.jpg" alt="<?php echo htmlspecialchars($admin_name); ?>" class="w-full h-full object-cover">
                </a>
                <a href="logout.php" title="Logout" class="text-white/80 hover:text-white ml-2">
                    <i class="fas fa-sign-out-alt"></i>
                </a>
            </div>
        </div>
    </header>

    <section class="admin-hero-bg relative">
        <div class="absolute inset-0 bg-black bg-opacity-30"></div>
        <div class="container mx-auto px-6 py-16 md:py-20 relative z-10 text-white">
            <h1 class="text-5xl font-extrabold mb-2">Hello, <?php echo $admin_name; ?>!</h1>
            <p class="text-xl font-light">Welcome back, ready to manage today?</p>
        </div>
    </section>

    <main class="container mx-auto px-6 mt-0 bg-white shadow-xl rounded-b-lg -translate-y-6 pt-4">
        
        <div class="flex border-b border-gray-200 space-x-4 mb-6">
            <button class="px-4 py-3 text-sm font-medium border-b-2 border-blue-600 text-blue-600 transition duration-150">
                DESTINATION
            </button>
            <button class="px-4 py-3 text-sm font-medium text-gray-600 hover:text-blue-600 transition duration-150">
                BOOKINGS
            </button>
            <button class="px-4 py-3 text-sm font-medium text-gray-600 hover:text-blue-600 transition duration-150">
                USERS
            </button>
            <button class="px-4 py-3 text-sm font-medium text-gray-600 hover:text-blue-600 transition duration-150">
                MEDIA
            </button>
        </div>
        
        <div class="flex flex-wrap justify-between items-center mb-6 space-y-4 md:space-y-0">
            <div class="relative w-full md:w-auto">
                <select class="appearance-none block w-full bg-white border border-gray-300 py-2 px-4 pr-8 rounded-lg text-sm leading-tight focus:outline-none focus:bg-white focus:border-blue-500">
                    <option>Categories</option>
                    <option>Mountain</option>
                    <option>Beach</option>
                    <option>Historical</option>
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                </div>
            </div>

            <div class="flex items-center space-x-3 w-full md:w-auto">
                <div class="relative flex items-center w-full">
                    <input type="text" placeholder="Find Destination" class="block w-full border border-gray-300 py-2 pl-4 pr-10 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500" />
                    <button class="absolute right-0 top-0 mt-2 mr-3 text-gray-400 hover:text-gray-600">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
               
                
                <button class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg text-sm transition duration-150 flex items-center">
                    <i class="fas fa-plus mr-2"></i> ADD DESTINATION
                </button>
            </div>
        </div>

        <div class="pb-10">
            <div class="hidden md:flex justify-between items-center border-b border-gray-300 py-2 text-xs text-gray-500 uppercase font-semibold">
                <div class="w-1/2 px-2">Destination</div>
                <div class="w-1/2 px-2 text-right">Actions</div>
            </div>

            <?php
            // PHP Array untuk data destinasi (Sama seperti di homepage.php)
            $destinations = [
                ['name' => 'Papandayan Mountain', 'location' => 'Cisurupan, Garut', 'duration' => '2 Days', 'rating' => 4.7],
                ['name' => 'Tangkuban Perahu', 'location' => 'Lembang, Kabupaten Bandung Barat', 'duration' => '4 Hours', 'rating' => 4.5],
                ['name' => 'Gede Pangrango', 'location' => 'Cipendawa, Cianjur', 'duration' => '3 Days', 'rating' => 4.8],
                ['name' => 'Pelabuhan Ratu', 'location' => 'Palabuhanratu, Sukabumi', 'duration' => '4 Hours', 'rating' => 4.6],
                ['name' => 'Pangandaran', 'location' => 'Pangandaran', 'duration' => '1 Day', 'rating' => 4.7],
                ['name' => 'Karang Potong', 'location' => 'Cianjur', 'duration' => '3 Hours', 'rating' => 4.4],
            ];

            // Loop PHP untuk membuat list item secara dinamis
            foreach ($destinations as $dest) {
                echo '
                <div class="destination-item flex justify-between items-center py-4 border-b border-gray-200 transition duration-150">
                    
                    <div class="flex items-start w-full md:w-1/2">
                        <input type="checkbox" class="form-checkbox h-5 w-5 text-blue-600 rounded mt-1 mr-4">
                        <div>
                            <p class="text-base font-semibold text-gray-800">' . htmlspecialchars($dest['name']) . '</p>
                            <p class="text-sm text-gray-500 mt-1">
                                <i class="fas fa-map-marker-alt text-xs mr-1"></i> ' . htmlspecialchars($dest['location']) . ' 
                                <span class="mx-2 text-gray-300">|</span>
                                <i class="far fa-clock text-blue-500 mr-1"></i> ' . htmlspecialchars($dest['duration']) . ' 
                                <span class="mx-2 text-gray-300">|</span>
                                <i class="fas fa-star text-yellow-400 mr-1 text-xs"></i> ' . htmlspecialchars($dest['rating']) . '
                            </p>
                        </div>
                    </div>

                    <div class="flex items-center space-x-4 text-sm text-blue-600 font-medium whitespace-nowrap">
                        <a href="#" class="hover:underline">Edit</a>
                        <span class="text-gray-300">|</span>
                        <a href="#" class="text-red-500 hover:underline">Delete</a>
                        <span class="text-gray-300">|</span>
                        <a href="#" class="hover:underline">View Detail</a>
                    </div>
                </div>
                ';
            }
            ?>
        </div>

    </main>

    <footer class="bg-white pt-16 border-t border-gray-200 mt-8">
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
                        <div class="flex items-center">
                            <i class="fas fa-envelope text-lg text-blue-600 mr-3"></i>
                            <div>
                                <p>info@explorejabar.com</p>
                                <p>support@explorejabar.com</p>
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