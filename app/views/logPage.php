<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login Page</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 flex items-center justify-center min-h-screen text-gray-100">
  <div class="bg-gray-800 shadow-2xl rounded-2xl p-8 w-96 border border-violet-600/40">
    <h2 class="text-3xl font-bold text-violet-400 mb-8 text-center tracking-wide">Login</h2>

    <form action="login" method="POST" class="space-y-6">
      <!-- Username -->
      <div>
        <label for="username" class="block text-sm font-medium text-gray-300 mb-1">
          Email
        </label>
        <input type="text" name="username" id="username" required
          class="w-full px-4 py-2 bg-gray-700 border border-violet-600/30 rounded-lg 
                 focus:ring-2 focus:ring-violet-500 focus:border-violet-500 
                 text-gray-100 placeholder-gray-400 outline-none transition">
      </div>

      <!-- Password -->
      <div>
        <label for="password" class="block text-sm font-medium text-gray-300 mb-1">
          Password
        </label>
        <input type="password" name="password" id="password" required
          class="w-full px-4 py-2 bg-gray-700 border border-violet-600/30 rounded-lg 
                 focus:ring-2 focus:ring-red-500 focus:border-red-500 
                 text-gray-100 placeholder-gray-400 outline-none transition">
      </div>

      <!-- Button -->
      <button type="submit"
        class="w-full py-2 rounded-lg bg-gradient-to-r from-red-600 via-violet-600 to-green-600 
               hover:opacity-90 font-semibold text-white shadow-md transition-all duration-300">
        Login
      </button>
    </form>

    <p class="text-sm text-gray-400 mt-6 text-center">
      Don’t have an account?
      <a href="signup" class="text-green-400 hover:text-violet-400 transition-colors font-medium">Sign up here</a>
    </p>
  </div>
</body>
</html>
