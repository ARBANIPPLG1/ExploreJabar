<?php
// Data dummy untuk Galeri (memastikan ada 12 item)
$gallery_items = [
    ['title' => 'Kawah Papandayan', 'location' => 'Garut', 'image' => 'images/gallery/item_01.jpg'],
    ['title' => 'Pemandangan Tangkuban Perahu', 'location' => 'Bandung Barat', 'image' => 'images/gallery/item_02.jpg'],
    ['title' => 'Puncak Gede Pangrango', 'location' => 'Cianjur', 'image' => 'images/gallery/item_03.jpg'],
    ['title' => 'Senja di Pelabuhan Ratu', 'location' => 'Sukabumi', 'image' => 'images/gallery/item_04.jpg'],
    ['title' => 'Sunset Pangandaran', 'location' => 'Pangandaran', 'image' => 'images/gallery/item_05.jpg'],
    ['title' => 'Karang Potong View', 'location' => 'Cianjur', 'image' => 'images/gallery/item_06.jpg'],
    ['title' => 'Situ Patenggang', 'location' => 'Bandung', 'image' => 'images/gallery/item_07.jpg'],
    ['title' => 'Kawah Putih', 'location' => 'Bandung', 'image' => 'images/gallery/item_08.jpg'],
    ['title' => 'Curug Cikaso', 'location' => 'Sukabumi', 'image' => 'images/gallery/item_09.jpg'],
    ['title' => 'Taman Safari Bogor', 'location' => 'Bogor', 'image' => 'images/gallery/item_10.jpg'],
    ['title' => 'Kota Tua Jakarta', 'location' => 'Jakarta', 'image' => 'images/gallery/item_11.jpg'],
    ['title' => 'Gunung Ciremai', 'location' => 'Kuningan', 'image' => 'images/gallery/item_12.jpg'],
];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EXPLORE JABAR - Gallery</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body class="bg-gray-50">

    <header class="bg-blue-800 text-white shadow-md py-4 mb-10">
        <div class="container mx-auto px-6">
            <h1 class="text-2xl font-bold">EXPLORE JABAR - GALLERY</h1>
        </div>
    </header>
    
    <main class="container mx-auto px-6 py-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-2">
                Discover the Visual Wonders
            </h2>
            <p class="text-center text-gray-500">
                A collection of beautiful moments captured across West Java.
            </p>
        </div>

        <div class="flex justify-center space-x-3 mb-10">
            <a href="#" class="px-5 py-2 text-sm font-medium rounded-full bg-blue-600 text-white">All</a>
            <a href="#" class="px-5 py-2 text-sm font-medium rounded-full border border-gray-300 text-gray-600 hover:bg-gray-200">Nature</a>
            <a href="#" class="px-5 py-2 text-sm font-medium rounded-full border border-gray-300 text-gray-600 hover:bg-gray-200">Culture</a>
            <a href="#" class="px-5 py-2 text-sm font-medium rounded-full border border-gray-300 text-gray-600 hover:bg-gray-200">Food</a>
            <a href="#" class="px-5 py-2 text-sm font-medium rounded-full border border-gray-300 text-gray-600 hover:bg-gray-200">People</a>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            
            <?php 
            // Loop PHP untuk menampilkan 12 item galeri
            foreach ($gallery_items as $item) {
                echo '
                <a href="' . htmlspecialchars($item['image']) . '" class="block bg-white rounded-xl shadow-lg overflow-hidden transition-transform duration-300 hover:scale-[1.02] hover:shadow-2xl group">
                    <div class="relative">
                        <img 
                            class="w-full h-64 object-cover" 
                            src="' . htmlspecialchars($item['image']) . '" 
                            alt="Galeri ' . htmlspecialchars($item['title']) . '"
                        >
                        <div class="absolute inset-0 bg-black opacity-0 group-hover:opacity-20 transition duration-300"></div>
                        
                        <button class="absolute top-4 right-4 p-2 bg-white rounded-full text-red-500 shadow-md hover:scale-110 transition">
                            <i class="far fa-heart"></i>
                        </button>
                    </div>

                    <div class="p-4">
                        <h3 class="text-xl font-bold text-gray-800 mb-1">' . htmlspecialchars($item['title']) . '</h3>
                        <p class="text-sm text-gray-500 flex items-center">
                            <i class="fas fa-map-marker-alt text-xs mr-2"></i>
                            ' . htmlspecialchars($item['location']) . '
                        </p>
                    </div>
                </a>
                ';
            }
            ?>
        </div>
        
        <div class="mt-16 flex justify-center">
            <a href="#" class="text-blue-600 hover:underline px-4 py-2 border border-gray-300 rounded-lg">Load More</a>
        </div>

    </main>
    
    <footer class="mt-16 bg-gray-200 text-center py-4 text-sm text-gray-600">
        &copy; 2025 ExploreJabar. All rights reserved.
    </footer>

</body>
</html>