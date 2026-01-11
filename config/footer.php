<!-- Close pt-16 div -->
</div>

<!-- Footer -->
<footer class="bg-gray-900 text-gray-300 mt-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-8">
            <!-- About Section -->
            <div>
                <h3 class="text-white text-lg font-bold mb-4">EXPLORE JABAR</h3>
                <p class="text-sm leading-relaxed">
                    Discover the natural beauty and rich culture of West Java with our trusted travel guide.
                </p>
                <div class="flex space-x-4 mt-4">
                    <a href="#" class="text-gray-400 hover:text-blue-400 transition"><i class="fab fa-facebook"></i></a>
                    <a href="#" class="text-gray-400 hover:text-blue-400 transition"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="text-gray-400 hover:text-blue-400 transition"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="text-gray-400 hover:text-blue-400 transition"><i class="fab fa-youtube"></i></a>
                </div>
            </div>

            <!-- Quick Links -->
            <div>
                <h4 class="text-white font-semibold mb-4">Quick Links</h4>
                <ul class="space-y-2 text-sm">
                    <li><a href="homepage.php" class="hover:text-blue-400 transition">Home</a></li>
                    <li><a href="gallery.php" class="hover:text-blue-400 transition">Gallery</a></li>
                    <li><a href="#" class="hover:text-blue-400 transition">Destinations</a></li>
                    <li><a href="#" class="hover:text-blue-400 transition">Blog</a></li>
                </ul>
            </div>

            <!-- Information -->
            <div>
                <h4 class="text-white font-semibold mb-4">Information</h4>
                <ul class="space-y-2 text-sm">
                    <li><a href="#" class="hover:text-blue-400 transition">About Us</a></li>
                    <li><a href="#" class="hover:text-blue-400 transition">Contact Us</a></li>
                    <li><a href="#" class="hover:text-blue-400 transition">Privacy Policy</a></li>
                    <li><a href="#" class="hover:text-blue-400 transition">Terms & Conditions</a></li>
                </ul>
            </div>

            <!-- Contact Info -->
            <div>
                <h4 class="text-white font-semibold mb-4">Contact Info</h4>
                <ul class="space-y-2 text-sm">
                    <li class="flex items-start">
                        <i class="fas fa-map-marker-alt mt-1 mr-3 text-blue-400"></i>
                        <span>Bandung, West Java, Indonesia</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-phone mt-1 mr-3 text-blue-400"></i>
                        <span>+62 xxx-xxxx-xxxx</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-envelope mt-1 mr-3 text-blue-400"></i>
                        <span>info@explorejabar.com</span>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Divider -->
        <hr class="border-gray-800 my-8">

        <!-- Bottom Bar -->
        <div class="flex flex-col md:flex-row justify-between items-center text-sm">
            <p>&copy; 2025 Explore Jabar. All rights reserved.</p>
            <div class="flex space-x-4 mt-4 md:mt-0">
                <a href="#" class="hover:text-blue-400 transition">Privacy</a>
                <span class="text-gray-700">|</span>
                <a href="#" class="hover:text-blue-400 transition">Terms</a>
                <span class="text-gray-700">|</span>
                <a href="#" class="hover:text-blue-400 transition">Cookies</a>
            </div>
        </div>
    </div>
</footer>

<script>
    function toggleMobileMenu() {
        const menu = document.getElementById('mobileMenu');
        menu.classList.toggle('hidden');
    }

    // Smooth scroll
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({ behavior: 'smooth' });
            }
        });
    });
</script>

</body>
</html>
