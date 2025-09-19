<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login Page</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen px-4">
  <div class="bg-white shadow-lg rounded-2xl p-6 sm:p-8 w-full max-w-md">
    <!-- Title -->
    <h2 class="text-xl sm:text-2xl font-bold text-gray-800 mb-6 text-center">
      Login
    </h2>

    <!-- Form -->
    <form action="login" method="POST" class="space-y-5">
      <!-- Email -->
      <div>
        <label for="username" class="block text-sm font-medium text-gray-700 mb-1">
          Email
        </label>
        <input type="text" name="username" id="username" required
          class="w-full px-3 sm:px-4 py-2 border border-gray-300 rounded-lg 
                 focus:ring-2 focus:ring-blue-500 focus:outline-none text-sm sm:text-base">
      </div>

      <!-- Password -->
      <div>
        <label for="password" class="block text-sm font-medium text-gray-700 mb-1">
          Password
        </label>
        <input type="password" name="password" id="password" required
          class="w-full px-3 sm:px-4 py-2 border border-gray-300 rounded-lg 
                 focus:ring-2 focus:ring-blue-500 focus:outline-none text-sm sm:text-base">
      </div>

      <!-- Button -->
      <button type="submit"
        class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 
               transition-colors text-sm sm:text-base font-medium">
        Login
      </button>
    </form>

    <!-- Footer -->
    <p class="text-xs sm:text-sm text-gray-600 mt-4 text-center">
      Don’t have an account?
      <a href="signup" class="text-blue-600 hover:underline font-medium">Sign up here</a>
    </p>
  </div>
</body>
</html>
