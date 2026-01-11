<?php
session_start();
include 'config/app.php';

$error_message = '';
$success_message = '';

if (isset($_POST['signup'])) {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    // Validasi input
    if (empty($username) || empty($email) || empty($password)) {
        $error_message = 'empty';
    } elseif (strlen($username) < 3) {
        $error_message = 'username_short';
    } elseif (strlen($password) < 6) {
        $error_message = 'password_short';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error_message = 'email_invalid';
    } else {
        // Cek apakah username sudah terdaftar
        $check_username = "SELECT * FROM user WHERE username='$username'";
        $result_username = mysqli_query($conn, $check_username);
        
        if (mysqli_num_rows($result_username) > 0) {
            $error_message = 'username_exists';
        } else {
            // Cek apakah email sudah terdaftar
            $check_email = "SELECT * FROM user WHERE email='$email'";
            $result_email = mysqli_query($conn, $check_email);
            
            if (mysqli_num_rows($result_email) > 0) {
                $error_message = 'email_exists';
            } else {
                // Insert data ke database
                $insert_query = "INSERT INTO user (username, email, password, role) VALUES ('$username', '$email', '$password', 'user')";
                
                if (mysqli_query($conn, $insert_query)) {
                    $success_message = 'success';
                    // Clear form
                    $username = '';
                    $email = '';
                    $password = '';
                } else {
                    $error_message = 'database_error';
                }
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EXPLORE JABAR - Sign Up</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Custom styling untuk menambahkan gambar latar belakang */
        .bg-signup {
            /* Ganti dengan path atau URL gambar Anda untuk tampilan persis */
            background-image: url('image_67b01d.jpg'); 
            background-size: cover;
            background-position: center;
        }

        /* Alert Animation */
        @keyframes slideInDown {
            from {
                opacity: 0;
                transform: translateY(-30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slideOutUp {
            from {
                opacity: 1;
                transform: translateY(0);
            }
            to {
                opacity: 0;
                transform: translateY(-30px);
            }
        }

        .alert-enter {
            animation: slideInDown 0.4s ease-out;
        }

        .alert-exit {
            animation: slideOutUp 0.4s ease-in;
        }

        /* Shake animation untuk error */
        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            10%, 30%, 50%, 70%, 90% { transform: translateX(-5px); }
            20%, 40%, 60%, 80% { transform: translateX(5px); }
        }

        .shake {
            animation: shake 0.5s ease-in-out;
        }

        /* Close button hover effect */
        .close-btn:hover {
            transform: rotate(90deg);
            transition: transform 0.3s ease;
        }

        /* Password strength indicator */
        .password-strength {
            height: 3px;
            border-radius: 2px;
            transition: all 0.3s ease;
            margin-top: 4px;
        }

        .strength-weak { background-color: #ef4444; width: 33%; }
        .strength-medium { background-color: #f59e0b; width: 66%; }
        .strength-strong { background-color: #10b981; width: 100%; }
    </style>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center bg-signup">
    
    <!-- Success Alert Modal -->
    <?php if ($success_message === 'success'): ?>
    <div class="fixed inset-0 bg-black/40 backdrop-blur-sm flex items-center justify-center p-4 z-50 alert-enter" id="successAlert">
        <div class="bg-white rounded-2xl shadow-2xl max-w-md w-full p-8 relative border border-green-100">
            <!-- Close button -->
            <button onclick="closeSuccessAlert()" class="absolute top-5 right-5 text-gray-400 hover:text-gray-600 transition close-btn">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>

            <!-- Icon -->
            <div class="flex justify-center mb-4">
                <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center">
                    <svg class="w-8 h-8 text-green-600" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/>
                    </svg>
                </div>
            </div>

            <!-- Message -->
            <h3 class="text-center text-xl font-bold text-gray-800 mb-2">Pendaftaran Berhasil!</h3>
            <p class="text-center text-gray-600 mb-6">Akun Anda telah berhasil dibuat. Silakan login dengan akun baru Anda untuk mulai menjelajahi.</p>

            <!-- Action button -->
            <a href="index.php" class="block w-full px-4 py-3 bg-green-600 text-white font-semibold rounded-lg hover:bg-green-700 transition duration-200 text-center">
                Login Sekarang
            </a>
        </div>
    </div>
    <?php endif; ?>

    <!-- Error Alert Modal -->
    <?php if ($error_message): ?>
    <div class="fixed inset-0 bg-black/40 backdrop-blur-sm flex items-center justify-center p-4 z-50 alert-enter" id="errorAlert">
        <div class="bg-white rounded-2xl shadow-2xl max-w-md w-full p-8 relative border border-red-100 shake">
            <!-- Close button -->
            <button onclick="closeErrorAlert()" class="absolute top-5 right-5 text-gray-400 hover:text-gray-600 transition close-btn">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>

            <!-- Icon -->
            <div class="flex justify-center mb-4">
                <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center">
                    <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4v.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
            </div>

            <!-- Message -->
            <h3 class="text-center text-xl font-bold text-gray-800 mb-2">Pendaftaran Gagal</h3>
            
            <p class="text-center text-gray-600 mb-6">
                <?php 
                    switch($error_message) {
                        case 'empty':
                            echo 'Semua field harus diisi. Silakan coba lagi.';
                            break;
                        case 'username_short':
                            echo 'Username minimal harus 3 karakter.';
                            break;
                        case 'password_short':
                            echo 'Password minimal harus 6 karakter.';
                            break;
                        case 'email_invalid':
                            echo 'Format email tidak valid.';
                            break;
                        case 'username_exists':
                            echo 'Username sudah terdaftar. Gunakan username lain.';
                            break;
                        case 'email_exists':
                            echo 'Email sudah terdaftar di sistem.';
                            break;
                        case 'database_error':
                            echo 'Terjadi kesalahan pada sistem. Silakan coba lagi nanti.';
                            break;
                        default:
                            echo 'Terjadi kesalahan. Silakan coba lagi.';
                    }
                ?>
            </p>

            <!-- Action button -->
            <button onclick="closeErrorAlert()" class="w-full px-4 py-3 bg-red-600 text-white font-semibold rounded-lg hover:bg-red-700 transition duration-200">
                Coba Lagi
            </button>
        </div>
    </div>
    <?php endif; ?>
    
    <div class="max-w-md w-full mx-4 p-8 bg-white/70 backdrop-blur-sm rounded-xl shadow-2xl relative border border-white/50">
        
        <header class="text-center mb-8">
            <h1 class="text-3xl font-bold text-gray-800 tracking-tight">EXPLORE JABAR</h1>
            <p class="text-sm text-gray-600 mt-1">Your trusted guide to discovering the beauty of West Java.</p>
        </header>

        <section class="text-center mb-6">
            <h2 class="text-xl font-semibold text-gray-700 mb-4">Begin Your Adventure</h2>
            <p class="text-gray-500 mb-4 text-sm">Sign Up with Open account</p>
            
            <div class="flex justify-center space-x-4">
                <button class="flex items-center justify-center w-12 h-12 border border-gray-300 rounded-full text-gray-700 hover:bg-gray-100 transition duration-150">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M21.737 10.612c-.524-2.81-2.934-5.334-5.592-5.334-1.928 0-3.328 1.15-4.148 1.15-.818 0-1.879-1.15-3.692-1.15-2.73 0-5.187 2.404-5.187 5.617 0 2.222 1.34 3.708 2.766 4.608 1.258.813 2.704 1.705 4.398 1.705 1.69 0 2.575-.98 4.398-.98 1.82 0 2.705.98 4.398.98 1.69 0 3.14-.892 4.398-1.705 1.425-.9 2.766-2.386 2.766-4.608 0-1.04-.15-1.99-.44-2.88zM15.46 3.636c.642-.816 1.474-1.398 2.508-1.398 1.13 0 2.115.65 2.73 1.65-.642.816-1.474 1.398-2.508 1.398-1.13 0-2.115-.65-2.73-1.65z"/></svg>
                </button>
                <button class="flex items-center justify-center w-12 h-12 border border-gray-300 rounded-full text-gray-700 hover:bg-gray-100 transition duration-150">
                    <svg class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M22.56 12.25c0-.62-.05-1.22-.16-1.8H12v3.45h5.83c-.25 1.3-.98 2.54-2.09 3.32v2.24h2.89c1.69-1.55 2.67-3.7 2.67-6.22z" fill="#4285F4"/><path d="M12 23c3.08 0 5.67-1.02 7.56-2.77l-2.89-2.24c-.79.52-1.81.83-3.04.83-2.34 0-4.32-1.57-5.04-3.67H3.87v2.3C5.7 20.8 8.65 23 12 23z" fill="#34A853"/><path d="M6.96 14.15c-.17-.52-.26-1.07-.26-1.65s.09-1.13.26-1.65V8.55H4.07c-.55 1.1-.87 2.37-.87 3.75s.32 2.65.87 3.75l2.89-2.2z" fill="#FBBC05"/><path d="M12 5.38c1.69 0 2.95.7 3.84 1.58l2.58-2.48C17.67 1.88 15.08 0 12 0 8.65 0 5.7 2.2 3.87 5.38l2.9 2.2C7.68 5.75 9.66 4.18 12 4.18z" fill="#EA4335"/></svg>
                </button>
                <button class="flex items-center justify-center w-12 h-12 border border-gray-300 rounded-full text-gray-700 hover:bg-gray-100 transition duration-150">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M22 12c0-5.52-4.48-10-10-10S2 6.48 2 12c0 4.99 3.6 9.15 8.35 9.87V15H7v-3h3V9.5C10 7.57 11.2 6 14.24 6c1.37 0 2.47.1 2.8.14V8h-1.63c-1.82 0-2.18.88-2.18 2.14V12h3.5l-.6 3H13v6.87C17.4 21.15 22 16.99 22 12z"/></svg>
                </button>
            </div>
            
            <div class="flex items-center my-6">
                <hr class="flex-grow border-gray-300">
                <span class="mx-4 text-gray-500 text-sm">Or</span>
                <hr class="flex-grow border-gray-300">
            </div>
        </section>

        <form action="#" method="POST" class="space-y-4">
            
            <div>
                <label for="username" class="sr-only">Username</label>
                <input 
                    type="text" 
                    id="username" 
                    name="username" 
                    placeholder="username" 
                    value="<?php echo isset($username) ? htmlspecialchars($username) : ''; ?>"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 transition duration-150 bg-white/50 placeholder-gray-600 text-gray-800"
                    required
                    minlength="3"
                >
            </div>

            <div>
                <label for="email" class="sr-only">Email</label>
                <input 
                    type="email" 
                    id="email" 
                    name="email" 
                    placeholder="email" 
                    value="<?php echo isset($email) ? htmlspecialchars($email) : ''; ?>"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 transition duration-150 bg-white/50 placeholder-gray-600 text-gray-800"
                    required
                >
            </div>

            <div class="relative">
                <label for="password" class="sr-only">Password</label>
                <input 
                    type="password" 
                    id="password" 
                    name="password" 
                    placeholder="password" 
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 transition duration-150 bg-white/50 placeholder-gray-600 text-gray-800"
                    required
                    minlength="6"
                    onchange="checkPasswordStrength()"
                >
                <button type="button" class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-500 hover:text-gray-700">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0zM2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                </button>
                <div id="passwordStrength" class="password-strength hidden"></div>
            </div>
            
            <button 
                type="submit" 
                name="signup"
                class="w-full py-3 mt-6 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition duration-200 shadow-lg shadow-blue-500/50"
            >
                Let's Start
            </button>
        </form>

        <div class="text-center mt-6 text-sm">
            <p class="text-gray-700">Already have an account? 
                <a href="index.php" class="text-blue-600 font-medium hover:text-blue-800 transition duration-150">Sign in.</a>
            </p>
        </div>
        
    </div>

    <script>
        // Toggle password visibility
        document.querySelector('button[type="button"]').addEventListener('click', function() {
            const passwordInput = document.getElementById('password');
            const isPassword = passwordInput.type === 'password';
            passwordInput.type = isPassword ? 'text' : 'password';
            
            // Update icon
            const svg = this.querySelector('svg');
            if (isPassword) {
                svg.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-4.803m5.596-3.856a3.375 3.375 0 11-4.753 4.753m4.753-4.753L9.172 9.172m5.656 5.656l1.414-1.414m1.414 1.414L15.172 15.172m-4.243 4.243l1.414 1.414"></path>';
            } else {
                svg.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0zM2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>';
            }
        });

        // Password strength checker
        function checkPasswordStrength() {
            const password = document.getElementById('password').value;
            const strengthBar = document.getElementById('passwordStrength');
            
            if (password.length === 0) {
                strengthBar.classList.add('hidden');
                return;
            }

            strengthBar.classList.remove('hidden');
            strengthBar.className = 'password-strength ';
            
            let strength = 0;
            if (password.length >= 6) strength++;
            if (/[a-z]/.test(password) && /[A-Z]/.test(password)) strength++;
            if (/\d/.test(password)) strength++;
            if (/[^a-zA-Z\d]/.test(password)) strength++;

            if (strength <= 1) {
                strengthBar.classList.add('strength-weak');
            } else if (strength <= 2) {
                strengthBar.classList.add('strength-medium');
            } else {
                strengthBar.classList.add('strength-strong');
            }
        }

        // Close alerts
        function closeErrorAlert() {
            const alert = document.getElementById('errorAlert');
            if (alert) {
                alert.classList.remove('alert-enter');
                alert.classList.add('alert-exit');
                setTimeout(() => {
                    alert.style.display = 'none';
                }, 400);
            }
        }

        function closeSuccessAlert() {
            const alert = document.getElementById('successAlert');
            if (alert) {
                alert.classList.remove('alert-enter');
                alert.classList.add('alert-exit');
                setTimeout(() => {
                    window.location.href = 'index.php';
                }, 400);
            }
        }

        // Real-time password strength check
        document.getElementById('password').addEventListener('input', checkPasswordStrength);
    </script>
</body>
</html>