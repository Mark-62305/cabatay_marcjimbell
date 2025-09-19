<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Profile Page</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen px-4">
  <div class="bg-white shadow-lg rounded-2xl w-full max-w-5xl p-6 sm:p-8 relative">
    
    <!-- Logout Button -->
    <div class="absolute top-4 right-4 sm:top-6 sm:right-6">
      <a href="logout.php" 
         class="bg-red-500 hover:bg-red-600 text-white px-3 sm:px-4 py-2 rounded-lg shadow-md transition text-sm sm:text-base">
        Logout
      </a>
    </div>

    <h2 class="text-2xl sm:text-3xl font-bold text-gray-800 mb-6 sm:mb-8">Profile</h2>

    <form id="profileForm" class="flex flex-col md:flex-row gap-6 sm:gap-8 items-center md:items-start">
      
      <!-- Profile Image + Upload -->
      <div class="flex flex-col items-center flex-shrink-0">
        <div class="w-32 h-32 sm:w-40 sm:h-40 bg-gray-200 rounded-lg flex items-center justify-center overflow-hidden">
          <img id="profileImage" src="https://via.placeholder.com/150" 
               alt="Profile" class="w-full h-full object-cover">
        </div>
        <label class="mt-3 sm:mt-4">
          <span class="bg-gray-700 hover:bg-gray-800 text-white px-4 sm:px-6 py-2 rounded-lg shadow transition cursor-pointer text-sm sm:text-base">
            Upload
          </span>
          <input type="file" accept="image/*" class="hidden" id="uploadInput">
        </label>
      </div>

      <!-- Profile Info -->
      <div class="flex-1 space-y-4 w-full">
            
        <!-- Name -->
        <div>
          <label class="block text-sm font-medium text-gray-700">Name</label>
          <input type="text" name="name" value="<?= $data['fname']; ?> <?= $data['lname']; ?>"
                 class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 text-sm sm:text-base"
                 disabled>
        </div>

        <!-- Email -->
        <div>
          <label class="block text-sm font-medium text-gray-700">Email</label>
          <input type="email" name="email" value="<?= $data['email']; ?>"
                 class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 text-sm sm:text-base"
                 disabled>
        </div>

        <!-- Age -->
        <div>
          <label class="block text-sm font-medium text-gray-700">Age</label>
          <input type="number" name="age" value="<?= $data['age']; ?>"
                 class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 text-sm sm:text-base"
                 disabled>
        </div>

        <!-- Address -->
        <div>
          <label class="block text-sm font-medium text-gray-700">Address</label>
          <input type="text" name="address" value="<?= $data['address']; ?>"
                 class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 text-sm sm:text-base"
                 disabled>
        </div>

        <!-- Password -->
        <div>
          <label class="block text-sm font-medium text-gray-700">Password</label>
          <input type="password" name="password" value="<?= $data['passw']; ?>"
                 class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 text-sm sm:text-base"
                 disabled>
        </div>

        <!-- Buttons -->
        <div class="mt-4 sm:mt-6 flex flex-col sm:flex-row gap-3 sm:gap-4">
          <button type="button" id="editBtn"
                  class="bg-blue-600 hover:bg-blue-700 text-white px-5 sm:px-6 py-2 rounded-lg shadow text-sm sm:text-base">
            Edit
          </button>
          <button type="submit" id="saveBtn"
                  class="bg-green-500 hover:bg-green-600 text-white px-5 sm:px-6 py-2 rounded-lg shadow text-sm sm:text-base"
                  disabled>
            Save
          </button>
        </div>
      </div>
    </form>
  </div>

  <script>
    const editBtn = document.getElementById("editBtn");
    const saveBtn = document.getElementById("saveBtn");
    const formInputs = document.querySelectorAll("#profileForm input:not([type=file])");
    const uploadInput = document.getElementById("uploadInput");
    const profileImage = document.getElementById("profileImage");

    // Enable fields on Edit
    editBtn.addEventListener("click", () => {
      formInputs.forEach(input => input.disabled = false);
      saveBtn.disabled = false;
      editBtn.disabled = true;
    });

    // Handle Save (demo only)
    document.getElementById("profileForm").addEventListener("submit", (e) => {
      e.preventDefault();
      alert("Profile saved!");
      formInputs.forEach(input => input.disabled = true);
      saveBtn.disabled = true;
      editBtn.disabled = false;
    });

    // Preview uploaded image
    uploadInput.addEventListener("change", (e) => {
      const file = e.target.files[0];
      if (file) {
        const reader = new FileReader();
        reader.onload = () => {
          profileImage.src = reader.result;
        };
        reader.readAsDataURL(file);
      }
    });
  </script>
</body>
</html>
