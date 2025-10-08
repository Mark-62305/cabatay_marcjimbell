<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Profile Page</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-gray-100 flex items-center justify-center min-h-screen">
  <div class="bg-gray-800 shadow-2xl rounded-2xl w-full max-w-4xl p-8 relative border border-violet-700/40">
    
    <!-- Logout Button -->
    <div class="absolute top-6 right-6">
      <a href="logout" 
         class="bg-gradient-to-r from-red-600 via-violet-600 to-green-600 text-white px-5 py-2 rounded-lg shadow-md hover:opacity-90 transition-all duration-300">
        Logout
      </a>
    </div>

    <h2 class="text-3xl font-bold text-violet-400 mb-8 text-center tracking-wide">Profile</h2>

    <?php
      $fname   = $_SESSION['fname'] ?? $data['fname'] ?? 'N/A';
      $lname   = $_SESSION['lname'] ?? $data['lname'] ?? 'N/A';
      $email   = $_SESSION['email'] ?? $data['email'] ?? 'N/A';
      $age     = $_SESSION['age'] ?? $data['age'] ?? 'N/A';
      $address = $_SESSION['address'] ?? $data['address'] ?? 'N/A';
      $passw   = $_SESSION['passw'] ?? $data['passw'] ?? '********';
      $image   = $_SESSION['image_name'] ?? $data['image_name'] ?? '';
    ?>

    <form id="profileForm" class="flex flex-col md:flex-row gap-8 items-center md:items-start">
      
      <!-- Profile Image + Upload -->
      <div class="flex flex-col items-center">
        <div class="w-40 h-40 bg-gray-700 rounded-xl flex items-center justify-center overflow-hidden border border-violet-600/30">
          <img id="profileImage" 
               src="<?= $image ? 'uploads/' . htmlspecialchars($image) : 'https://via.placeholder.com/150' ?>" 
               alt="Profile" 
               class="w-full h-full object-cover">
        </div>
        <label class="mt-4">
          <span class="bg-gradient-to-r from-violet-600 to-green-600 hover:opacity-90 text-white px-6 py-2 rounded-lg shadow cursor-pointer transition">
            Upload
          </span>
          <input type="file" accept="image/*" class="hidden" id="uploadInput">
        </label>
      </div>

      <!-- Profile Info -->
      <div class="flex-1 space-y-4 w-full">
            
        <!-- Name -->
        <div>
          <label class="block text-sm font-medium text-gray-300">Name</label>
          <input type="text" name="name" value="<?= htmlspecialchars($fname) ?> <?= htmlspecialchars($lname) ?>"
                 class="w-full px-3 py-2 bg-gray-700 border border-violet-600/30 rounded-lg focus:ring-2 focus:ring-violet-500 text-gray-100 outline-none transition"
                 disabled>
        </div>

        <!-- Email -->
        <div>
          <label class="block text-sm font-medium text-gray-300">Email</label>
          <input type="email" name="email" value="<?= htmlspecialchars($email) ?>"
                 class="w-full px-3 py-2 bg-gray-700 border border-violet-600/30 rounded-lg focus:ring-2 focus:ring-green-500 text-gray-100 outline-none transition"
                 disabled>
        </div>

        <!-- Age -->
        <div>
          <label class="block text-sm font-medium text-gray-300">Age</label>
          <input type="number" name="age" value="<?= htmlspecialchars($age) ?>"
                 class="w-full px-3 py-2 bg-gray-700 border border-violet-600/30 rounded-lg focus:ring-2 focus:ring-red-500 text-gray-100 outline-none transition"
                 disabled>
        </div>

        <!-- Address -->
        <div>
          <label class="block text-sm font-medium text-gray-300">Address</label>
          <input type="text" name="address" value="<?= htmlspecialchars($address) ?>"
                 class="w-full px-3 py-2 bg-gray-700 border border-violet-600/30 rounded-lg focus:ring-2 focus:ring-green-500 text-gray-100 outline-none transition"
                 disabled>
        </div>

        <!-- Password -->
        <div>
          <label class="block text-sm font-medium text-gray-300">Password</label>
          <input type="password" name="password" value="<?= htmlspecialchars($passw) ?>"
                 class="w-full px-3 py-2 bg-gray-700 border border-violet-600/30 rounded-lg focus:ring-2 focus:ring-red-500 text-gray-100 outline-none transition"
                 disabled>
        </div>

        <!-- Buttons -->
        <div class="mt-6 flex gap-4">
          <button type="button" id="editBtn"
                  class="bg-violet-600 hover:bg-violet-700 text-white px-6 py-2 rounded-lg shadow transition">
            Edit
          </button>
          <button type="submit" id="saveBtn"
                  class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded-lg shadow transition"
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

    editBtn.addEventListener("click", () => {
      formInputs.forEach(input => input.disabled = false);
      saveBtn.disabled = false;
      editBtn.disabled = true;
    });

    document.getElementById("profileForm").addEventListener("submit", (e) => {
      e.preventDefault();
      alert("Profile saved!");
      formInputs.forEach(input => input.disabled = true);
      saveBtn.disabled = true;
      editBtn.disabled = false;
    });

    uploadInput.addEventListener("change", (e) => {
      const file = e.target.files[0];
      if (file) {
        const reader = new FileReader();
        reader.onload = () => profileImage.src = reader.result;
        reader.readAsDataURL(file);
      }
    });
  </script>
</body>
</html>
