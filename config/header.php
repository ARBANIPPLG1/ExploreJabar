<?php
// Tentukan halaman aktif
$current_page = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* Smooth transitions */
        * {
            transition: background-color 0.3s ease, color 0.3s ease;
        }
        
        /* Custom scroll bar */
        ::-webkit-scrollbar {
            width: 8px;
        }
        
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }
        
        ::-webkit-scrollbar-thumb {
            background: #1e40af;
            border-radius: 4px;
        }
        
        ::-webkit-scrollbar-thumb:hover {
            background: #1e3a8a;
        }

        /* Navbar sticky smooth */
        .navbar-sticky {
            backdrop-filter: blur(10px);
            background-color: rgba(255, 255, 255, 0.95);
        }

        /* Active nav link */
        .nav-link.active {
            color: #2563eb;
            border-bottom: 3px solid #2563eb;
        }
    </style>
</head>
<body class="bg-gray-50">

<nav class="navbar-sticky fixed top-0 left-0 right-0 z-50 shadow-sm border-b border-gray-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <!-- Logo -->
            <div class="flex-shrink-0">
                <a href="homepage.php" class="text-2xl font-bold bg-gradient-to-r from-blue-600 to-blue-800 bg-clip-text text-transparent uppercase tracking-wider">
                    EXPLORE JABAR
                </a>
            </div>

            <!-- Desktop Navigation -->
            <nav class="hidden md:flex items-center space-x-1">
                <a href="homepage.php" class="nav-link <?php echo $current_page === 'homepage.php' ? 'active' : ''; ?> px-3 py-2 text-sm font-medium text-gray-700 hover:text-blue-600 transition duration-150">
                    HOME
                </a>
                <a href="gallery.php" class="nav-link <?php echo $current_page === 'gallery.php' ? 'active' : ''; ?> px-3 py-2 text-sm font-medium text-gray-700 hover:text-blue-600 transition duration-150">
                    GALLERY
                </a>
                <a href="#" class="nav-link px-3 py-2 text-sm font-medium text-gray-700 hover:text-blue-600 transition duration-150">
                    ABOUT US
                </a>
            </nav>

            <!-- Search Bar -->
            <div class="hidden lg:flex items-center">
                <form action="search.php" method="GET" class="relative">
                    <input 
                        type="text" 
                        name="q" 
                        placeholder="Search destinations..." 
                        class="py-2 pl-4 pr-10 border border-gray-300 rounded-full text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent transition"
                    >
                    <button type="submit" class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-blue-600">
                        <i class="fas fa-search"></i>
                    </button>
                </form>
            </div>

            <!-- Right Side Actions -->
            <div class="flex items-center space-x-4 ml-4">
                <?php if (isset($_SESSION['status']) && $_SESSION['status'] === 'login'): ?>
                    <!-- User Logged In -->
                    <a href="pemesanan.php" class="hidden sm:inline-block bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg transition duration-200 text-sm">
                        BOOK NOW
                    </a>
                    
                    <div class="relative group">
                        <button class="flex items-center space-x-2 text-gray-700 hover:text-blue-600">
                            <i class="fas fa-user-circle text-xl"></i>
                            <span class="hidden sm:inline text-sm font-medium"><?php echo htmlspecialchars($_SESSION['username'] ?? 'User'); ?></span>
                        </button>
                        
                        <!-- Dropdown Menu -->
                        <div class="hidden group-hover:block absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-xl z-50">
                            <?php if ($_SESSION['role'] === 'admin'): ?>
                                <a href="admin.php" class="block px-4 py-2 text-gray-700 hover:bg-blue-50 hover:text-blue-600 first:rounded-t-lg">
                                    <i class="fas fa-tachometer-alt mr-2"></i> Dashboard
                                </a>
                            <?php endif; ?>
                            <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-blue-50 hover:text-blue-600">
                                <i class="fas fa-user mr-2"></i> My Profile
                            </a>
                            <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-blue-50 hover:text-blue-600">
                                <i class="fas fa-bookmark mr-2"></i> My Bookings
                            </a>
                            <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-blue-50 hover:text-blue-600">
                                <i class="fas fa-cog mr-2"></i> Settings
                            </a>
                            <hr class="border-gray-200">
                            <a href="logout.php" class="block px-4 py-2 text-red-600 hover:bg-red-50 last:rounded-b-lg">
                                <i class="fas fa-sign-out-alt mr-2"></i> Logout
                            </a>
                        </div>
                    </div>
                <?php else: ?>
                    <!-- User Not Logged In -->
                    <a href="index.php" class="text-gray-700 hover:text-blue-600 font-semibold text-sm">
                        LOGIN
                    </a>
                    <a href="signup.php" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg transition duration-200 text-sm">
                        SIGN UP
                    </a>
                <?php endif; ?>

                <!-- Mobile Menu Button -->
                <button class="md:hidden text-gray-700 hover:text-blue-600" onclick="toggleMobileMenu()">
                    <i class="fas fa-bars text-xl"></i>
                </button>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobileMenu" class="hidden md:hidden pb-4 space-y-2">
            <a href="homepage.php" class="block px-3 py-2 rounded-lg text-gray-700 hover:bg-blue-50">HOME</a>
            <a href="gallery.php" class="block px-3 py-2 rounded-lg text-gray-700 hover:bg-blue-50">GALLERY</a>
            <a href="#" class="block px-3 py-2 rounded-lg text-gray-700 hover:bg-blue-50">ABOUT US</a>
            <a href="#" class="block px-3 py-2 rounded-lg text-gray-700 hover:bg-blue-50">CONTACT</a>
            <form action="search.php" method="GET" class="px-3 py-2">
                <input type="text" name="q" placeholder="Search..." class="w-full py-2 pl-4 pr-4 border border-gray-300 rounded-lg text-sm">
            </form>
        </div>
    </div>
</nav>

<!-- Content starts after navbar -->
<div class="pt-16">
