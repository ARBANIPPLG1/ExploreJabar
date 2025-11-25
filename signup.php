<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EXPLORE JABAR - Sign Up</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .bg-signup {
            background-image: url('img/sawah.jpg'); 
            background-size: cover;
            background-position: center;
        }
    </style>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center bg-signup">
    
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
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 transition duration-150 bg-white/50 placeholder-gray-600 text-gray-800"
                    required
                >
            </div>

            <div>
                <label for="email" class="sr-only">Email</label>
                <input 
                    type="email" 
                    id="email" 
                    name="email" 
                    placeholder="email" 
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
                >
                <button type="button" class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-500 hover:text-gray-700">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0zM2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                </button>
            </div>
            
            <button 
                type="submit" 
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

</body>
</html>