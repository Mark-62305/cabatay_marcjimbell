<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Upload Form</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen flex items-center justify-center bg-gray-100">
  <div class="w-full max-w-md bg-white rounded-2xl shadow-lg p-8">
    <h2 class="text-2xl font-semibold text-gray-800 text-center mb-6">Upload a File</h2>
    <form method="POST" action="/file-upload/store" enctype="multipart/form-data" class="space-y-5">
      
      <!-- File Input -->
      <div>
        <label class="block text-sm font-medium text-gray-700 mb-2">Choose a file</label>
        <input 
          type="file" 
          name="file" 
          required 
          class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 
                 file:rounded-full file:border-0 
                 file:text-sm file:font-semibold
                 file:bg-blue-50 file:text-blue-600
                 hover:file:bg-blue-100 cursor-pointer"
        >
      </div>
      
      <!-- Submit Button -->
      <button 
        type="submit" 
        class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2.5 rounded-xl shadow-md transition">
        Upload
      </button>
    </form>
  </div>
</body>
</html>
