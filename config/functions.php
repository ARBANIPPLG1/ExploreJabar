<?php
/**
 * Security and Utility Functions
 */

// Sanitize input
function sanitize($input) {
    return htmlspecialchars(trim($input), ENT_QUOTES, 'UTF-8');
}

// Validate email
function is_valid_email($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

// Hash password
function hash_password($password) {
    return md5($password); // Lebih baik gunakan password_hash untuk production
}

// Format currency
function format_currency($amount) {
    return 'Rp ' . number_format($amount, 0, ',', '.');
}

// Format date
function format_date($date) {
    $months = ['', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
    $timestamp = strtotime($date);
    return date('d', $timestamp) . ' ' . $months[date('n', $timestamp)] . ' ' . date('Y', $timestamp);
}

// Check if user is logged in
function is_logged_in() {
    return isset($_SESSION['status']) && $_SESSION['status'] === 'login';
}

// Redirect if not logged in
function require_login() {
    if (!is_logged_in()) {
        header('Location: index.php?pesan=login_required');
        exit();
    }
}

// Redirect if not admin
function require_admin() {
    if (!is_logged_in() || $_SESSION['role'] !== 'admin') {
        header('Location: index.php?pesan=admin_required');
        exit();
    }
}

// Get user data
function get_user_data($conn, $username) {
    $query = "SELECT * FROM user WHERE username = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc();
}

// Alert box function
function show_alert($type, $message) {
    $colors = [
        'success' => 'green',
        'error' => 'red',
        'warning' => 'yellow',
        'info' => 'blue'
    ];
    
    $icons = [
        'success' => 'check-circle',
        'error' => 'exclamation-circle',
        'warning' => 'info-circle',
        'info' => 'info-circle'
    ];
    
    $color = $colors[$type] ?? 'blue';
    $icon = $icons[$type] ?? 'info-circle';
    
    return "
    <div class='bg-{$color}-50 border-l-4 border-{$color}-600 p-4 mb-4 rounded'>
        <div class='flex items-center'>
            <i class='fas fa-{$icon} text-{$color}-600 mr-3'></i>
            <p class='text-{$color}-700'>{$message}</p>
        </div>
    </div>
    ";
}

// Log activity
function log_activity($conn, $user_id, $activity) {
    $query = "INSERT INTO activity_log (user_id, activity, created_at) VALUES (?, ?, NOW())";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("is", $user_id, $activity);
    return $stmt->execute();
}
?>
