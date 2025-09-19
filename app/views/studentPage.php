<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>StudentPage GUI</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    /* Pagination Styles */
    .pagination {
      display: flex;
      justify-content: center;
      align-items: center;
      list-style: none;
      gap: 6px;
      padding: 0;
      margin: 15px 0;
    }

    .pagination li {
      display: inline-block;
    }

    .pagination a,
    .pagination strong {
      display: inline-block;
      padding: 8px 14px;
      border-radius: 6px;
      background: #f1f2f6;
      color: #2d3436;
      text-decoration: none;
      font-size: 14px;
      transition: all 0.2s ease-in-out;
    }

    .pagination a:hover {
      background: #0984e3;
      color: white;
    }

    .pagination strong {
      background: #0984e3;
      color: white;
      font-weight: bold;
    }

    .pagination-container {
      margin-top: 20px;
      display: flex;
      justify-content: space-between;
      flex-wrap: wrap;
      align-items: center;
    }

    .pagination-info {
      font-size: 14px;
      color: #636e72;
    }

    .pagination-select {
      font-size: 14px;
      padding: 6px 8px;
      border-radius: 6px;
      border: 1px solid #ccc;
    }
  </style>
</head>
<body class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-400 to-indigo-400 p-4">
  <div class="bg-white rounded-2xl shadow-xl w-full max-w-7xl p-6 md:p-10 animate-fadeIn space-y-6">
    
    <!-- Search -->
    <div class="w-full">
      <form method="POST" action="search" class="flex flex-col sm:flex-row gap-3 w-full">
        <input type="text" id="searchbar" name="searchbar" placeholder="Search student..."
          class="flex-1 px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 text-sm sm:text-base">
        <button type="submit"
          class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition text-sm sm:text-base">
          Search
        </button>
        <a href="http://localhost:3010/student/index/1"
          class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg transition text-sm sm:text-base text-center">
          Cancel
        </a>
      </form>
    </div>

    <div class="flex flex-col lg:flex-row gap-8">
      
      <!-- Student Form -->
      <div class="flex-1 bg-gray-50 rounded-xl shadow p-6">
        <h2 class="text-xl font-semibold text-gray-800 text-center mb-4">Student Form</h2>
        <form method="POST" id="studentForm" class="space-y-3">
          <input type="hidden" id="student_id" name="id">

          <input type="text" id="fname" name="First_Name" placeholder="First Name" required
            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 text-sm sm:text-base">
          
          <input type="text" id="lname" name="Last_Name" placeholder="Last Name" required
            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 text-sm sm:text-base">
          
          <input type="text" id="email" name="Email" placeholder="Email" required
            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 text-sm sm:text-base">

          <div class="flex flex-col sm:flex-row gap-3 mt-4">
            <button type="submit" formaction="inserted"
              class="flex-1 bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition text-sm sm:text-base">
              Submit
            </button>
            <button type="submit" formaction="update"
              class="flex-1 bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg transition text-sm sm:text-base">
              Update
            </button>
            <button type="submit" formaction="softdel"
              class="flex-1 bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg transition text-sm sm:text-base">
              Delete
            </button>
          </div>
        </form>
      </div>

      <!-- Table -->
      <div class="flex-2 w-full">
        <h2 class="text-xl font-semibold text-gray-800 mb-3">Student List</h2>
        <div class="overflow-x-auto rounded-xl shadow">
          <table class="w-full border-collapse text-sm sm:text-base">
            <thead class="bg-gray-100">
              <tr>
                <th class="px-4 py-2 border">ID</th>
                <th class="px-4 py-2 border">First Name</th>
                <th class="px-4 py-2 border">Last Name</th>
                <th class="px-4 py-2 border">Email</th>
              </tr>
            </thead>
            <tbody class="divide-y">
              <?php if (!empty($records)): ?>
                <?php foreach ($records as $row): ?>
                  <tr class="hover:bg-blue-50 cursor-pointer">
                    <td class="px-4 py-2 border"><?= $row['id']; ?></td>
                    <td class="px-4 py-2 border"><?= $row['fname']; ?></td>
                    <td class="px-4 py-2 border"><?= $row['lname']; ?></td>
                    <td class="px-4 py-2 border"><?= $row['email']; ?></td>
                  </tr>
                <?php endforeach; ?>
              <?php else: ?>
                <tr><td colspan="4" class="px-4 py-2 text-center text-gray-500">No students found</td></tr>
              <?php endif; ?>
            </tbody>
          </table>
        </div>

      <!-- Pagination Controls -->
      <?php if (isset($pagination_data)): ?>
        <div class="pagination-container">
          <!-- Pagination Links -->
          <div class="mt-3 d-flex justify-content-center">
              <?= $pagination_links ?>
          </div>
          <div class="pagination-info">
            <?= $pagination_data['info']; ?>
            &nbsp; | &nbsp;
            <label for="itemsPerPage"></label>
          </div>
        </div>
      <?php endif; ?>
      </div>
    </div>
  </div>

  <script>
    // Row click = fill form
    document.querySelectorAll("tbody tr").forEach(row => {
      row.addEventListener("click", function() {
        let cells = this.querySelectorAll("td");
        document.getElementById("student_id").value = cells[0]?.textContent.trim() || "";
        document.getElementById("fname").value = cells[1]?.textContent.trim() || "";
        document.getElementById("lname").value = cells[2]?.textContent.trim() || "";
        document.getElementById("email").value = cells[3]?.textContent.trim() || "";
      });
    });
  </script>
</body>
</html>
