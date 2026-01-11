<?php
session_start();
include 'config/app.php';
include 'config/functions.php';

$search = isset($_GET['search']) ? sanitize($_GET['search']) : '';
$category = isset($_GET['category']) ? sanitize($_GET['category']) : 'all';

// Data galeri dengan kategori
$gallery_items = [
    ['id' => 1, 'title' => 'Kawah Papandayan', 'location' => 'Garut', 'image' => 'images/gallery/item_01.jpg', 'category' => 'nature'],
    ['id' => 2, 'title' => 'Pemandangan Tangkuban Perahu', 'location' => 'Bandung Barat', 'image' => 'images/gallery/item_02.jpg', 'category' => 'nature'],
    ['id' => 3, 'title' => 'Puncak Gede Pangrango', 'location' => 'Cianjur', 'image' => 'images/gallery/item_03.jpg', 'category' => 'nature'],
    ['id' => 4, 'title' => 'Senja di Pelabuhan Ratu', 'location' => 'Sukabumi', 'image' => 'images/gallery/item_04.jpg', 'category' => 'nature'],
    ['id' => 5, 'title' => 'Sunset Pangandaran', 'location' => 'Pangandaran', 'image' => 'images/gallery/item_05.jpg', 'category' => 'nature'],
    ['id' => 6, 'title' => 'Karang Potong View', 'location' => 'Cianjur', 'image' => 'images/gallery/item_06.jpg', 'category' => 'culture'],
    ['id' => 7, 'title' => 'Situ Patenggang', 'location' => 'Bandung', 'image' => 'images/gallery/item_07.jpg', 'category' => 'nature'],
    ['id' => 8, 'title' => 'Kawah Putih', 'location' => 'Bandung', 'image' => 'images/gallery/item_08.jpg', 'category' => 'nature'],
    ['id' => 9, 'title' => 'Curug Cikaso', 'location' => 'Sukabumi', 'image' => 'images/gallery/item_09.jpg', 'category' => 'nature'],
    ['id' => 10, 'title' => 'Taman Safari Bogor', 'location' => 'Bogor', 'image' => 'images/gallery/item_10.jpg', 'category' => 'culture'],
    ['id' => 11, 'title' => 'Kota Tua Jakarta', 'location' => 'Jakarta', 'image' => 'images/gallery/item_11.jpg', 'category' => 'culture'],
    ['id' => 12, 'title' => 'Gunung Ciremai', 'location' => 'Kuningan', 'image' => 'images/gallery/item_12.jpg', 'category' => 'nature'],
];

// Filter items berdasarkan search dan category
$filtered_items = array_filter($gallery_items, function($item) use ($search, $category) {
    $match_search = empty($search) || stripos($item['title'], $search) !== false || stripos($item['location'], $search) !== false;
    $match_category = $category === 'all' || $item['category'] === $category;
    return $match_search && $match_category;
});
?>
<?php include 'config/header.php'; ?>

<!-- Page Header -->
<section class="bg-gradient-to-r from-blue-600 to-blue-800 text-white py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-4xl font-bold mb-2">Gallery</h1>
        <p class="text-blue-100">Explore the beauty of West Java through our collection of stunning photographs</p>
    </div>
</section>

<!-- Main Content -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <!-- Search and Filter Section -->
    <div class="mb-12">
        <div class="bg-white rounded-lg shadow-md p-6">
            <h2 class="text-2xl font-bold text-gray-900 mb-6">Find Your Favorite Moment</h2>
            
            <form method="GET" action="gallery.php" class="space-y-4">
                <!-- Search Box -->
                <div class="flex flex-col md:flex-row gap-4">
                    <div class="flex-grow">
                        <input 
                            type="text" 
                            name="search" 
                            placeholder="Search by destination name or location..." 
                            value="<?php echo htmlspecialchars($search); ?>"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition"
                        >
                    </div>
                    <button 
                        type="submit" 
                        class="px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition flex items-center justify-center"
                    >
                        <i class="fas fa-search mr-2"></i> Search
                    </button>
                    <a 
                        href="gallery.php" 
                        class="px-6 py-3 bg-gray-200 text-gray-700 font-semibold rounded-lg hover:bg-gray-300 transition flex items-center justify-center"
                    >
                        <i class="fas fa-redo mr-2"></i> Reset
                    </a>
                </div>

                <!-- Category Filter -->
                <div class="flex flex-wrap gap-2">
                    <a href="gallery.php" class="px-4 py-2 rounded-full font-medium transition <?php echo $category === 'all' ? 'bg-blue-600 text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200'; ?>">
                        All Gallery
                    </a>
                    <a href="gallery.php?category=nature&search=<?php echo urlencode($search); ?>" class="px-4 py-2 rounded-full font-medium transition <?php echo $category === 'nature' ? 'bg-blue-600 text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200'; ?>">
                        <i class="fas fa-tree mr-1"></i> Nature
                    </a>
                    <a href="gallery.php?category=culture&search=<?php echo urlencode($search); ?>" class="px-4 py-2 rounded-full font-medium transition <?php echo $category === 'culture' ? 'bg-blue-600 text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200'; ?>">
                        <i class="fas fa-gopuram mr-1"></i> Culture
                    </a>
                </div>
            </form>

            <!-- Results Count -->
            <div class="mt-4 text-sm text-gray-600">
                Found <span class="font-bold text-blue-600"><?php echo count($filtered_items); ?></span> 
                <?php if (!empty($search)) echo "results for \"<strong>" . htmlspecialchars($search) . "</strong>\""; ?>
            </div>
        </div>
    </div>

    <!-- Gallery Grid -->
    <?php if (count($filtered_items) > 0): ?>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
            <?php foreach ($filtered_items as $item): ?>
                <div class="bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition duration-300 group">
                    <div class="relative overflow-hidden h-64">
                        <img 
                            class="w-full h-full object-cover group-hover:scale-110 transition duration-500" 
                            src="<?php echo htmlspecialchars($item['image']); ?>" 
                            alt="<?php echo htmlspecialchars($item['title']); ?>"
                        >
                        <div class="absolute inset-0 bg-black/0 group-hover:bg-black/20 transition"></div>
                        
                        <!-- Category Badge -->
                        <span class="absolute top-4 left-4 px-3 py-1 bg-white/90 text-xs font-bold text-gray-800 rounded-full">
                            <?php echo ucfirst($item['category']); ?>
                        </span>

                        <!-- Like Button -->
                        <button class="absolute top-4 right-4 p-2 bg-white rounded-full text-red-500 shadow-md hover:scale-110 transition hover:bg-red-50" onclick="toggleLike(event)">
                            <i class="far fa-heart"></i>
                        </button>
                    </div>

                    <div class="p-5">
                        <h3 class="text-lg font-bold text-gray-900 mb-2">
                            <?php echo htmlspecialchars($item['title']); ?>
                        </h3>
                        <p class="text-sm text-gray-600 flex items-center">
                            <i class="fas fa-map-marker-alt text-xs mr-2 text-blue-600"></i>
                            <?php echo htmlspecialchars($item['location']); ?>
                        </p>

                        <div class="mt-4 pt-4 border-t border-gray-100 flex gap-2">
                            <a href="<?php echo htmlspecialchars($item['image']); ?>" target="_blank" class="flex-1 py-2 px-3 bg-blue-600 text-white text-center font-semibold text-sm rounded-lg hover:bg-blue-700 transition">
                                <i class="fas fa-expand-alt mr-1"></i> View
                            </a>
                            <button class="flex-1 py-2 px-3 bg-gray-100 text-gray-700 text-center font-semibold text-sm rounded-lg hover:bg-gray-200 transition" onclick="sharePhoto('<?php echo htmlspecialchars($item['title']); ?>')">
                                <i class="fas fa-share-alt mr-1"></i> Share
                            </button>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <!-- No Results Message -->
        <div class="text-center py-16">
            <div class="inline-block p-8 bg-gray-100 rounded-full mb-6">
                <i class="fas fa-search text-4xl text-gray-400"></i>
            </div>
            <h3 class="text-2xl font-bold text-gray-900 mb-2">No images found</h3>
            <p class="text-gray-600 mb-6">
                <?php if (!empty($search)): ?>
                    We couldn't find any images matching "<strong><?php echo htmlspecialchars($search); ?></strong>"
                <?php else: ?>
                    No images available in this category
                <?php endif; ?>
            </p>
            <a href="gallery.php" class="inline-block px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition">
                <i class="fas fa-arrow-left mr-2"></i> Back to Gallery
            </a>
        </div>
    <?php endif; ?>
</div>

<!-- Scripts -->
<script>
    function toggleLike(event) {
        event.preventDefault();
        const button = event.currentTarget;
        const icon = button.querySelector('i');
        
        if (icon.classList.contains('far')) {
            icon.classList.remove('far');
            icon.classList.add('fas');
            button.classList.add('bg-red-50');
        } else {
            icon.classList.remove('fas');
            icon.classList.add('far');
            button.classList.remove('bg-red-50');
        }
    }

    function sharePhoto(title) {
        const url = window.location.href;
        const text = `Check out this beautiful photo: ${title} on Explore Jabar!`;
        
        if (navigator.share) {
            navigator.share({
                title: 'Explore Jabar Gallery',
                text: text,
                url: url
            }).catch(err => console.log('Error sharing:', err));
        } else {
            alert(`Share this image:\n\n${text}\n\n${url}`);
        }
    }
</script>

<?php include 'config/footer.php'; ?>
