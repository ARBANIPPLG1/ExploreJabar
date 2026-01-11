<?php
session_start();
include 'config/app.php';
include 'config/functions.php';

// Check if user is admin
require_admin();

$admin_name = $_SESSION['username'];

// Stats data
$stats = [
    ['icon' => 'fa-map-marked', 'label' => 'Total Destinations', 'value' => '12', 'color' => 'blue'],
    ['icon' => 'fa-calendar-check', 'label' => 'Total Bookings', 'value' => '45', 'color' => 'green'],
    ['icon' => 'fa-users', 'label' => 'Total Users', 'value' => '328', 'color' => 'purple'],
    ['icon' => 'fa-money-bill-wave', 'label' => 'Total Revenue', 'value' => 'Rp 67.5M', 'color' => 'orange'],
];

// Destinations data
$destinations = [
    ['id' => 1, 'name' => 'Papandayan Mountain', 'location' => 'Cisurupan, Garut', 'category' => 'mountain', 'duration' => '2 Days', 'rating' => 4.7, 'status' => 'active'],
    ['id' => 2, 'name' => 'Tangkuban Perahu', 'location' => 'Lembang, Bandung Barat', 'category' => 'mountain', 'duration' => '4 Hours', 'rating' => 4.5, 'status' => 'active'],
    ['id' => 3, 'name' => 'Gede Pangrango', 'location' => 'Cipendawa, Cianjur', 'category' => 'mountain', 'duration' => '3 Days', 'rating' => 4.8, 'status' => 'active'],
    ['id' => 4, 'name' => 'Pelabuhan Ratu', 'location' => 'Palabuhanratu, Sukabumi', 'category' => 'beach', 'duration' => '4 Hours', 'rating' => 4.6, 'status' => 'inactive'],
];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - EXPLORE JABAR</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .sidebar-active {
            background-color: #eff6ff;
            border-left: 4px solid #2563eb;
        }
        
        .stat-card {
            transition: all 0.3s ease;
        }
        
        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body class="bg-gray-100">

<!-- Header -->
<header class="bg-white shadow-md sticky top-0 z-40">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 flex justify-between items-center">
        <div class="flex items-center space-x-3">
            <button onclick="toggleSidebar()" class="lg:hidden p-2 hover:bg-gray-100 rounded-lg">
                <i class="fas fa-bars text-xl text-gray-700"></i>
            </button>
            <h1 class="text-2xl font-bold text-blue-600 uppercase tracking-wider">
                <i class="fas fa-admin mr-2"></i> Admin Dashboard
            </h1>
        </div>
        
        <div class="flex items-center space-x-4">
            <div class="hidden sm:block">
                <span class="text-sm font-semibold text-gray-700"><?php echo htmlspecialchars($admin_name); ?></span>
            </div>
            <div class="relative group">
                <button class="flex items-center space-x-2 text-gray-700 hover:text-blue-600">
                    <i class="fas fa-user-circle text-2xl"></i>
                </button>
                <div class="hidden group-hover:block absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-xl z-50">
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-blue-50 first:rounded-t-lg">
                        <i class="fas fa-user mr-2"></i> Profile
                    </a>
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-blue-50">
                        <i class="fas fa-cog mr-2"></i> Settings
                    </a>
                    <hr class="border-gray-200">
                    <a href="logout.php" class="block px-4 py-2 text-red-600 hover:bg-red-50 last:rounded-b-lg">
                        <i class="fas fa-sign-out-alt mr-2"></i> Logout
                    </a>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="flex">
    <!-- Sidebar -->
    <aside id="sidebar" class="hidden lg:block w-64 bg-white shadow-lg">
        <nav class="p-4 space-y-2">
            <a href="#" class="sidebar-active block px-4 py-3 text-blue-600 font-semibold rounded-lg flex items-center">
                <i class="fas fa-chart-line mr-3"></i> Dashboard
            </a>
            <a href="#" class="block px-4 py-3 text-gray-700 hover:bg-gray-100 rounded-lg transition flex items-center">
                <i class="fas fa-map-marked mr-3"></i> Destinations
            </a>
            <a href="#" class="block px-4 py-3 text-gray-700 hover:bg-gray-100 rounded-lg transition flex items-center">
                <i class="fas fa-calendar-check mr-3"></i> Bookings
            </a>
            <a href="#" class="block px-4 py-3 text-gray-700 hover:bg-gray-100 rounded-lg transition flex items-center">
                <i class="fas fa-users mr-3"></i> Users
            </a>
            <a href="#" class="block px-4 py-3 text-gray-700 hover:bg-gray-100 rounded-lg transition flex items-center">
                <i class="fas fa-images mr-3"></i> Gallery
            </a>
            <a href="#" class="block px-4 py-3 text-gray-700 hover:bg-gray-100 rounded-lg transition flex items-center">
                <i class="fas fa-file-chart-line mr-3"></i> Reports
            </a>
        </nav>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-4 sm:p-8">
        <!-- Page Title -->
        <div class="mb-8">
            <h2 class="text-3xl font-bold text-gray-900">Welcome back, <?php echo htmlspecialchars($admin_name); ?>!</h2>
            <p class="text-gray-600">Here's your dashboard overview</p>
        </div>

        <!-- Stats Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <?php foreach ($stats as $stat): ?>
                <div class="stat-card bg-white rounded-lg shadow-md p-6 border-l-4 border-<?php echo $stat['color']; ?>-500">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-600 text-sm font-semibold"><?php echo $stat['label']; ?></p>
                            <p class="text-3xl font-bold text-gray-900 mt-2"><?php echo $stat['value']; ?></p>
                        </div>
                        <div class="w-12 h-12 bg-<?php echo $stat['color']; ?>-100 rounded-full flex items-center justify-center text-<?php echo $stat['color']; ?>-600 text-xl">
                            <i class="fas <?php echo $stat['icon']; ?>"></i>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Content Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Destinations Section -->
            <div class="lg:col-span-2">
                <div class="bg-white rounded-lg shadow-md">
                    <div class="p-6 border-b border-gray-200 flex justify-between items-center">
                        <h3 class="text-lg font-bold text-gray-900">Recent Destinations</h3>
                        <a href="#" class="text-blue-600 hover:text-blue-700 font-semibold text-sm">View All</a>
                    </div>

                    <!-- Table -->
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700">Destination</th>
                                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700">Category</th>
                                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700">Rating</th>
                                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700">Status</th>
                                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                <?php foreach ($destinations as $dest): ?>
                                    <tr class="hover:bg-gray-50 transition">
                                        <td class="px-6 py-4">
                                            <div>
                                                <p class="font-semibold text-gray-900"><?php echo htmlspecialchars($dest['name']); ?></p>
                                                <p class="text-xs text-gray-500"><i class="fas fa-map-marker-alt mr-1"></i><?php echo htmlspecialchars($dest['location']); ?></p>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 text-sm text-gray-700">
                                            <span class="px-3 py-1 bg-blue-100 text-blue-700 rounded-full text-xs font-semibold">
                                                <?php echo ucfirst($dest['category']); ?>
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 text-sm text-gray-700">
                                            <span class="text-yellow-500"><i class="fas fa-star mr-1"></i><?php echo $dest['rating']; ?></span>
                                        </td>
                                        <td class="px-6 py-4 text-sm">
                                            <?php if ($dest['status'] === 'active'): ?>
                                                <span class="px-3 py-1 bg-green-100 text-green-700 rounded-full text-xs font-semibold">Active</span>
                                            <?php else: ?>
                                                <span class="px-3 py-1 bg-red-100 text-red-700 rounded-full text-xs font-semibold">Inactive</span>
                                            <?php endif; ?>
                                        </td>
                                        <td class="px-6 py-4 text-sm space-x-2">
                                            <a href="#" class="text-blue-600 hover:underline">Edit</a>
                                            <span class="text-gray-300">|</span>
                                            <a href="#" class="text-red-600 hover:underline">Delete</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="p-6 border-t border-gray-200 text-center">
                        <a href="#" class="text-blue-600 hover:text-blue-700 font-semibold text-sm">
                            <i class="fas fa-arrow-right mr-1"></i> View All Destinations
                        </a>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div>
                <!-- Recent Activity -->
                <div class="bg-white rounded-lg shadow-md p-6 mb-6">
                    <h3 class="text-lg font-bold text-gray-900 mb-4">Quick Actions</h3>
                    <div class="space-y-3">
                        <a href="#" class="block p-3 bg-blue-50 hover:bg-blue-100 text-blue-700 rounded-lg font-semibold transition">
                            <i class="fas fa-plus mr-2"></i> Add Destination
                        </a>
                        <a href="#" class="block p-3 bg-green-50 hover:bg-green-100 text-green-700 rounded-lg font-semibold transition">
                            <i class="fas fa-list mr-2"></i> View Bookings
                        </a>
                        <a href="#" class="block p-3 bg-purple-50 hover:bg-purple-100 text-purple-700 rounded-lg font-semibold transition">
                            <i class="fas fa-file-export mr-2"></i> Export Reports
                        </a>
                        <a href="#" class="block p-3 bg-orange-50 hover:bg-orange-100 text-orange-700 rounded-lg font-semibold transition">
                            <i class="fas fa-cog mr-2"></i> Settings
                        </a>
                    </div>
                </div>

                <!-- System Info -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-lg font-bold text-gray-900 mb-4">System Info</h3>
                    <div class="space-y-3 text-sm">
                        <div class="flex justify-between">
                            <span class="text-gray-600">Last Login:</span>
                            <span class="font-semibold text-gray-900">Today, 10:30 AM</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Admin Role:</span>
                            <span class="font-semibold text-gray-900">Super Admin</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Version:</span>
                            <span class="font-semibold text-gray-900">v2.0.1</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Status:</span>
                            <span class="font-semibold text-green-600"><i class="fas fa-check-circle mr-1"></i> Online</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>

<script>
    function toggleSidebar() {
        const sidebar = document.getElementById('sidebar');
        sidebar.classList.toggle('hidden');
    }
</script>

</body>
</html>
