<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Sign Up Page</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 flex items-center justify-center min-h-screen text-gray-100">
  <div class="bg-gray-800 shadow-2xl rounded-2xl p-8 w-96 border border-violet-700/40">
    <h2 class="text-3xl font-bold text-violet-400 mb-8 text-center tracking-wide">Create Account</h2>

    <form action="signup" method="POST" class="space-y-6">
      <!-- Firstname -->
      <div>
        <label for="firstname" class="block text-sm font-medium text-gray-300 mb-1">
          First Name
        </label>
        <input type="text" name="First_Name" id="firstname" required
          class="w-full px-4 py-2 bg-gray-700 border border-violet-600/30 rounded-lg 
                 focus:ring-2 focus:ring-green-500 text-gray-100 placeholder-gray-400 outline-none transition">
      </div>

      <!-- Lastname -->
      <div>
        <label for="lastname" class="block text-sm font-medium text-gray-300 mb-1">
          Last Name
        </label>
        <input type="text" name="Last_Name" id="lastname" required
          class="w-full px-4 py-2 bg-gray-700 border border-violet-600/30 rounded-lg 
                 focus:ring-2 focus:ring-green-500 text-gray-100 placeholder-gray-400 outline-none transition">
      </div>

      <!-- Email -->
      <div>
        <label for="email" class="block text-sm font-medium text-gray-300 mb-1">
          Email
        </label>
        <input type="email" name="Email" id="email" required
          class="w-full px-4 py-2 bg-gray-700 border border-violet-600/30 rounded-lg 
                 focus:ring-2 focus:ring-red-500 text-gray-100 placeholder-gray-400 outline-none transition">
      </div>

      <!-- Password -->
      <div>
        <label for="password" class="block text-sm font-medium text-gray-300 mb-1">
          Password
        </label>
        <input type="password" name="passw" id="password" required
          class="w-full px-4 py-2 bg-gray-700 border border-violet-600/30 rounded-lg 
                 focus:ring-2 focus:ring-violet-500 text-gray-100 placeholder-gray-400 outline-none transition">
      </div>

      <!-- Button -->
      <button type="submit"
        class="w-full bg-gradient-to-r from-red-600 via-violet-600 to-green-600 py-2 rounded-lg 
               font-semibold text-white hover:opacity-90 transition-all duration-300 shadow-md">
        Sign Up
      </button>
    </form>

    <p class="text-sm text-gray-400 mt-6 text-center">
      Already have an account?
      <a href="login" class="text-green-400 hover:text-violet-400 transition-colors font-medium">Login here</a>
    </p>
  </div>
</body>
</html>
