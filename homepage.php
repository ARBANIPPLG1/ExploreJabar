<?php
session_start();
include 'config/app.php';
include 'config/functions.php';

// Check login status
require_login();

// Check role - hanya user biasa yang bisa akses
if ($_SESSION['role'] !== 'user') {
    header('Location: index.php?pesan=unauthorized');
    exit();
}

$username = $_SESSION['username'] ?? 'Guest';
?>
<?php include 'config/header.php'; ?>

 <style>
        .hero-bg {
            background-image: url('./img/18329.jpg'); 
            background-size: cover;
            background-position: center;
        }
    </style>

<!-- Why Choose Us Section -->

<main class="py-6 px-4 md:px-8"> 
    <div class="rounded-3xl shadow-2xl overflow-hidden border border-white/50" style= "background-image: url('./images/18329.jpg'); background-size: cover; background-position: center;"> 
        <section class="hero-bg h-[70vh] flex items-center justify-center text-white relative">
            <div class="absolute inset-0 bg-black opacity-40"></div>
            <div class="container mx-auto px-4 text-center z-10"> 
                <h1 class="text-5xl md:text-6xl font-extrabold mb-4 leading-tight">
                    Discover the Wonders of West Java
                </h1>
                <p class="text-xl md:text-2xl font-light mb-8">
                    Where landscapes, heritage, and local life create unforgettable experiences.
                </p>
                <div>
                    <a href="#destinations" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-8 rounded-full transition duration-300">
                        Explore Destination
                    </a>
                </div>
            </div>
        </section>
    </div>
</main>

<section class="py-16 md:py-24 bg-white">
    <div class="container mx-auto px-4 max-w-6xl grid grid-cols-1 lg:grid-cols-2 gap-12"> 
        <div>
            <h2 class="text-xl font-bold text-blue-600 mb-4">
                What Makes Explore Jabar the Top Choice for Adventuring in West Java
            </h2>
            <p class="text-gray-600 text-lg leading-relaxed">
                Explore Jabar is trusted by countless travelers seeking the best of West Java. From volcanic mountains to breathtaking coastlines, we curate reliable information and unforgettable experiences—making every journey safer, easier, and more meaningful.
            </p>
            <div class="mt-8 flex space-x-4">
                <a href="#" class="text-gray-500 hover:text-blue-600"><i class="fab fa-instagram text-2xl"></i></a> 
                <a href="#" class="text-gray-500 hover:text-blue-600"><i class="fab fa-facebook text-2xl"></i></a>
                <a href="#" class="text-gray-500 hover:text-blue-600"><i class="fab fa-twitter text-2xl"></i></a>
            </div>
        </div>

        <div class="space-y-8">
            <div class="flex items-start">
                <div class="p-3 rounded-full bg-blue-100 text-blue-600 mr-4">
                    <i class="fas fa-map-marker-alt text-xl"></i>
                </div>
                <div>
                    <h3 class="font-bold text-gray-800 text-lg">Curated Destinations</h3>
                    <p class="text-gray-500 text-sm">
                        Only the best mountains, beaches, and cultural spots—carefully selected for quality and experience.
                    </p>
                </div>
            </div>

            <div class="flex items-start">
                <div class="p-3 rounded-full bg-blue-100 text-blue-600 mr-4">
                    <i class="fas fa-shield-alt text-xl"></i>
                </div>
                <div>
                    <h3 class="font-bold text-gray-800 text-lg">Reliable Information</h3>
                    <p class="text-gray-500 text-sm">
                        Up-to-date guides, accurate pricing, clear access routes, and essential travel notes.
                    </p>
                </div>
            </div>

            <div class="flex items-start">
                <div class="p-3 rounded-full bg-blue-100 text-blue-600 mr-4">
                    <i class="fas fa-thumbs-up text-xl"></i>
                </div>
                <div>
                    <h3 class="font-bold text-gray-800 text-lg">Easy Trip Planning</h3>
                    <p class="text-gray-500 text-sm">
                        Simple, well-structured recommendations that help travelers plan without stress.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Featured Destinations Section -->
<section id="destinations" class="py-16 md:py-24 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                Popular Destinations
            </h2>
            <p class="text-gray-600 text-lg">
                Explore some of the most visited and beloved destinations in West Java
            </p>
        </div>

        <!-- Filter Buttons -->
        <div class="flex flex-wrap justify-center gap-3 mb-12">
            <button class="px-6 py-2 bg-blue-600 text-white rounded-full font-medium hover:bg-blue-700 transition" onclick="filterDestinations('all')">
                All Destinations
            </button>
            <button class="px-6 py-2 border border-gray-300 text-gray-700 rounded-full font-medium hover:border-blue-600 hover:text-blue-600 transition" onclick="filterDestinations('mountain')">
                <i class="fas fa-mountain mr-2"></i> Mountains
            </button>
            <button class="px-6 py-2 border border-gray-300 text-gray-700 rounded-full font-medium hover:border-blue-600 hover:text-blue-600 transition" onclick="filterDestinations('beach')">
                <i class="fas fa-water mr-2"></i> Beaches
            </button>
            <button class="px-6 py-2 border border-gray-300 text-gray-700 rounded-full font-medium hover:border-blue-600 hover:text-blue-600 transition" onclick="filterDestinations('cultural')">
                <i class="fas fa-gopuram mr-2"></i> Cultural
            </button>
        </div>

        <!-- Destinations Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php 
            $destinations = [
                ['id' => 1, 'name' => 'Papandayan Mountain', 'location' => 'Cisurupan, Garut', 'duration' => '2 Days', 'rating' => 4.7, 'category' => 'mountain', 'image' => 'images/papandayan.jpg'],
                ['id' => 2, 'name' => 'Tangkuban Perahu', 'location' => 'Lembang, Kabupaten Bandung Barat', 'duration' => '4 Hours', 'rating' => 4.5, 'category' => 'mountain', 'image' => 'images/tangkuban.jpg'],
                ['id' => 3, 'name' => 'Gede Pangrango', 'location' => 'Cipendawa, Cianjur', 'duration' => '3 Days', 'rating' => 4.8, 'category' => 'mountain', 'image' => 'images/gede.jpg'],
                ['id' => 4, 'name' => 'Pelabuhan Ratu Beach', 'location' => 'Palabuhanratu, Sukabumi', 'duration' => '4 Hours', 'rating' => 4.6, 'category' => 'beach', 'image' => 'images/pelabuhan.jpeg'],
                ['id' => 5, 'name' => 'Pangandaran Beach', 'location' => 'Pangandaran', 'duration' => '1 Day', 'rating' => 4.7, 'category' => 'beach', 'image' => 'images/pangandaran.jpeg'],
                ['id' => 6, 'name' => 'Karang Potong', 'location' => 'Cianjur', 'duration' => '3 Hours', 'rating' => 4.4, 'category' => 'mountain', 'image' => 'images/karang.jpeg'],
            ];

            foreach ($destinations as $dest) {
                echo '
                <div class="destination-card bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition duration-300 group" data-category="' . $dest['category'] . '">
                    <div class="relative overflow-hidden h-48">
                        <img class="w-full h-full object-cover group-hover:scale-110 transition duration-500" src="' . $dest['image'] . '" alt="' . $dest['name'] . '">
                        <div class="absolute inset-0 bg-black/0 group-hover:bg-black/20 transition"></div>
                        <button class="absolute top-4 right-4 p-2 bg-white rounded-full text-red-500 shadow-md hover:scale-110 transition hover:bg-red-50" onclick="toggleLike(this)">
                            <i class="far fa-heart"></i>
                        </button>
                        <span class="absolute bottom-4 left-4 px-3 py-1 bg-white/90 text-xs font-bold text-gray-800 rounded-full">
                            ' . ucfirst($dest['category']) . '
                        </span>
                    </div>
                    
                    <div class="p-5">
                        <h3 class="text-lg font-bold text-gray-900 mb-1">' . $dest['name'] . '</h3>
                        <p class="text-sm text-gray-600 flex items-center mb-4">
                            <i class="fas fa-map-marker-alt text-xs mr-2 text-blue-600"></i>
                            ' . $dest['location'] . '
                        </p>
                        
                        <div class="flex justify-between items-center text-sm border-t border-gray-100 pt-4">
                            <span class="text-gray-600 flex items-center">
                                <i class="far fa-clock text-blue-500 mr-2"></i>
                                ' . $dest['duration'] . '
                            </span>
                            <span class="font-bold text-blue-600 flex items-center">
                                <i class="fas fa-star text-yellow-400 mr-1"></i>
                                ' . $dest['rating'] . '
                            </span>
                        </div>
                        
                        <a href="pemesanan.php?dest=' . $dest['id'] . '" class="block w-full mt-4 px-4 py-2 bg-blue-600 text-white text-sm font-semibold rounded-lg hover:bg-blue-700 transition text-center">
                            <i class="fas fa-calendar-check mr-2"></i> Book Now
                        </a>
                    </div>
                </div>
                ';
            }
            ?>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="py-16 bg-gradient-to-r from-blue-600 to-blue-800 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl md:text-4xl font-bold mb-6">Ready for Your Next Adventure?</h2>
        <p class="text-blue-100 text-lg mb-8 max-w-2xl mx-auto">
            Start planning your journey through West Java today and create memories that will last a lifetime.
        </p>
        <a href="pemesanan.php" class="inline-block px-8 py-3 bg-white text-blue-600 font-bold rounded-lg hover:bg-blue-50 transition duration-300">
            <i class="fas fa-arrow-right mr-2"></i> Start Booking Now
        </a>
    </div>
</section>

<?php include 'config/footer.php'; ?>

<script>
    function filterDestinations(category) {
        const cards = document.querySelectorAll('.destination-card');
        
        cards.forEach(card => {
            if (category === 'all' || card.dataset.category === category) {
                card.style.display = 'block';
                setTimeout(() => card.style.opacity = '1', 10);
            } else {
                card.style.opacity = '0';
                setTimeout(() => card.style.display = 'none', 300);
            }
        });
        
        // Update button styles
        document.querySelectorAll('button[onclick*="filterDestinations"]').forEach(btn => {
            btn.classList.remove('bg-blue-600', 'text-white');
            btn.classList.add('border', 'border-gray-300', 'text-gray-700');
        });
        event.target.classList.add('bg-blue-600', 'text-white');
        event.target.classList.remove('border', 'border-gray-300', 'text-gray-700');
    }

    function toggleLike(button) {
        button.querySelector('i').classList.toggle('far');
        button.querySelector('i').classList.toggle('fas');
        button.classList.toggle('bg-red-50');
    }
</script>
