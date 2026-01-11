<?php
session_start();
include 'config/app.php';
include 'config/functions.php';

// Check login status
require_login();

$user_data = [
    'full_name' => $_SESSION['username'] ?? 'User',
    'email' => '',
    'phone' => ''
];

$booking_error = '';
$booking_success = false;

// Process booking
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit_booking'])) {
    // Validate input
    $full_name = sanitize($_POST['full_name'] ?? '');
    $email = sanitize($_POST['email'] ?? '');
    $phone = sanitize($_POST['phone'] ?? '');
    $date_of_birth = sanitize($_POST['date_of_birth'] ?? '');
    $destination = sanitize($_POST['destination'] ?? '');
    $package = sanitize($_POST['package'] ?? '');
    $start_date = sanitize($_POST['start_date'] ?? '');
    $participants = isset($_POST['participants']) ? intval($_POST['participants']) : 0;
    $duration = sanitize($_POST['duration'] ?? '');
    $special_requests = sanitize($_POST['special_requests'] ?? '');

    if (empty($full_name) || empty($email) || empty($phone) || empty($destination) || empty($package) || empty($start_date)) {
        $booking_error = 'Please fill in all required fields';
    } elseif (!is_valid_email($email)) {
        $booking_error = 'Please enter a valid email address';
    } elseif ($participants < 1) {
        $booking_error = 'Number of participants must be at least 1';
    } else {
        // Save booking to database
        $booking_query = "INSERT INTO bookings (username, full_name, email, phone, date_of_birth, destination, package, start_date, participants, duration, special_requests, status, created_at) 
                         VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 'pending', NOW())";
        
        $stmt = $conn->prepare($booking_query);
        $username = $_SESSION['username'];
        $stmt->bind_param("ssssssssiss", $username, $full_name, $email, $phone, $date_of_birth, $destination, $package, $start_date, $participants, $duration, $special_requests);
        
        if ($stmt->execute()) {
            $booking_success = true;
        } else {
            $booking_error = 'Failed to save booking. Please try again.';
        }
    }
}
?>
<?php include 'config/header.php'; ?>

<!-- Page Header -->
<section class="bg-gradient-to-r from-blue-600 to-blue-800 text-white py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-4xl font-bold mb-2">Plan Your Adventure</h1>
        <p class="text-blue-100">Book your unforgettable journey through West Java</p>
    </div>
</section>

<!-- Success Alert -->
<?php if ($booking_success): ?>
<div class="fixed inset-0 bg-black/40 backdrop-blur-sm flex items-center justify-center p-4 z-50" id="successAlert">
    <div class="bg-white rounded-2xl shadow-2xl max-w-md w-full p-8 text-center">
        <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center text-green-600 mx-auto mb-4">
            <i class="fas fa-check text-2xl"></i>
        </div>
        <h3 class="text-2xl font-bold text-gray-900 mb-2">Booking Confirmed!</h3>
        <p class="text-gray-600 mb-6">Your booking has been submitted successfully. We'll send you a confirmation email shortly.</p>
        <a href="homepage.php" class="inline-block px-6 py-3 bg-green-600 text-white font-semibold rounded-lg hover:bg-green-700 transition">
            Back to Home
        </a>
    </div>
</div>
<?php endif; ?>

<!-- Main Content -->
<div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Form Section -->
        <div class="lg:col-span-2">
            <div class="bg-white rounded-xl shadow-lg p-8">
                <?php if ($booking_error): ?>
                    <div class="mb-6 p-4 bg-red-50 border-l-4 border-red-600 rounded">
                        <p class="text-red-700 font-semibold"><i class="fas fa-exclamation-circle mr-2"></i><?php echo $booking_error; ?></p>
                    </div>
                <?php endif; ?>

                <form action="" method="POST" class="space-y-8">
                    <!-- Personal Information Section -->
                    <div>
                        <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
                            <span class="flex items-center justify-center w-8 h-8 bg-blue-600 text-white rounded-full mr-3 text-sm">1</span>
                            Personal Information
                        </h2>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-gray-700 font-semibold mb-2">Full Name *</label>
                                <input type="text" name="full_name" value="<?php echo htmlspecialchars($user_data['full_name']); ?>" required 
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
                            </div>

                            <div>
                                <label class="block text-gray-700 font-semibold mb-2">Date of Birth *</label>
                                <input type="date" name="date_of_birth" required 
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
                            </div>

                            <div>
                                <label class="block text-gray-700 font-semibold mb-2">Email Address *</label>
                                <input type="email" name="email" required 
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
                            </div>

                            <div>
                                <label class="block text-gray-700 font-semibold mb-2">Phone Number *</label>
                                <input type="tel" name="phone" required 
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
                            </div>
                        </div>
                    </div>

                    <hr class="border-gray-200">

                    <!-- Trip Details Section -->
                    <div>
                        <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
                            <span class="flex items-center justify-center w-8 h-8 bg-blue-600 text-white rounded-full mr-3 text-sm">2</span>
                            Trip Details
                        </h2>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-gray-700 font-semibold mb-2">Destination *</label>
                                <select name="destination" required 
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition appearance-none bg-white cursor-pointer">
                                    <option value="">-- Select Destination --</option>
                                    <option value="Papandayan Mountain">Papandayan Mountain</option>
                                    <option value="Tangkuban Perahu">Tangkuban Perahu</option>
                                    <option value="Gede Pangrango">Gede Pangrango</option>
                                    <option value="Pelabuhan Ratu">Pelabuhan Ratu</option>
                                    <option value="Pangandaran">Pangandaran</option>
                                    <option value="Karang Potong">Karang Potong</option>
                                </select>
                            </div>

                            <div>
                                <label class="block text-gray-700 font-semibold mb-2">Package *</label>
                                <select name="package" required 
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition appearance-none bg-white cursor-pointer">
                                    <option value="">-- Select Package --</option>
                                    <option value="standard">Standard Package - Rp 1.500.000</option>
                                    <option value="premium">Premium Package - Rp 2.500.000</option>
                                    <option value="luxury">Luxury Package - Rp 4.000.000</option>
                                </select>
                            </div>

                            <div>
                                <label class="block text-gray-700 font-semibold mb-2">Start Date *</label>
                                <input type="date" name="start_date" required 
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
                            </div>

                            <div>
                                <label class="block text-gray-700 font-semibold mb-2">Duration *</label>
                                <input type="text" name="duration" placeholder="e.g., 3 Days 2 Nights" required 
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
                            </div>

                            <div>
                                <label class="block text-gray-700 font-semibold mb-2">Number of Participants *</label>
                                <input type="number" name="participants" min="1" value="1" required 
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
                            </div>
                        </div>
                    </div>

                    <hr class="border-gray-200">

                    <!-- Special Requests Section -->
                    <div>
                        <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
                            <span class="flex items-center justify-center w-8 h-8 bg-blue-600 text-white rounded-full mr-3 text-sm">3</span>
                            Special Requests
                        </h2>

                        <div>
                            <label class="block text-gray-700 font-semibold mb-2">Additional Notes (Optional)</label>
                            <textarea name="special_requests" rows="4" placeholder="Tell us about any special requirements or preferences..."
                                      class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition resize-none"></textarea>
                        </div>
                    </div>

                    <hr class="border-gray-200">

                    <!-- Terms & Conditions -->
                    <div class="space-y-3">
                        <label class="flex items-start cursor-pointer">
                            <input type="checkbox" name="terms" required class="mt-1 w-4 h-4 text-blue-600 rounded focus:ring-blue-500">
                            <span class="ml-3 text-gray-700">I agree to the <a href="#" class="text-blue-600 hover:underline font-semibold">terms and conditions</a></span>
                        </label>
                        <label class="flex items-start cursor-pointer">
                            <input type="checkbox" name="confirm_info" required class="mt-1 w-4 h-4 text-blue-600 rounded focus:ring-blue-500">
                            <span class="ml-3 text-gray-700">I confirm that all information is accurate and complete</span>
                        </label>
                    </div>

                    <button type="submit" name="submit_booking" 
                            class="w-full py-3 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-lg shadow-lg transition duration-200 flex items-center justify-center">
                        <i class="fas fa-check-circle mr-2"></i> Confirm Booking
                    </button>
                </form>
            </div>
        </div>

        <!-- Summary Section -->
        <div class="lg:col-span-1">
            <div class="bg-gradient-to-br from-blue-50 to-blue-100 rounded-xl shadow-lg p-6 sticky top-24">
                <h3 class="text-xl font-bold text-gray-900 mb-6 flex items-center">
                    <i class="fas fa-receipt text-blue-600 mr-2"></i> Booking Summary
                </h3>

                <div class="space-y-4">
                    <div class="bg-white rounded-lg p-4">
                        <p class="text-sm text-gray-600">Destination</p>
                        <p class="text-lg font-bold text-gray-900">To be selected</p>
                    </div>

                    <div class="bg-white rounded-lg p-4">
                        <p class="text-sm text-gray-600">Package Type</p>
                        <p class="text-lg font-bold text-gray-900">To be selected</p>
                    </div>

                    <div class="bg-white rounded-lg p-4">
                        <p class="text-sm text-gray-600">Number of Guests</p>
                        <p class="text-lg font-bold text-gray-900">1 Person</p>
                    </div>

                    <hr class="border-blue-200 my-4">

                    <div class="bg-white rounded-lg p-4">
                        <p class="text-sm text-gray-600 mb-1">Estimated Price</p>
                        <p class="text-2xl font-bold text-blue-600">Rp 1.500.000</p>
                        <p class="text-xs text-gray-500 mt-2">* Price may vary depending on selected options</p>
                    </div>

                    <div class="bg-blue-600 text-white rounded-lg p-4">
                        <div class="flex items-center">
                            <i class="fas fa-info-circle mr-2"></i>
                            <span class="text-sm">Complete your booking to proceed to payment</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'config/footer.php'; ?>
