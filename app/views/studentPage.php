<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>StudentPage GUI</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            redv: '#D7263D',
            violetv: '#7F00FF',
            greenv: '#00C49A',
          },
          keyframes: {
            moveGradient: {
              '0%, 100%': { backgroundPosition: '0% 50%' },
              '50%': { backgroundPosition: '100% 50%' },
            },
          },
          animation: {
            moveGradient: 'moveGradient 8s ease-in-out infinite',
          },
        },
      },
    };
  </script>
  <style>
    body {
      background: linear-gradient(135deg, #00C49A, #111827, #7F00FF);
      background-size: 300% 300%;
      animation: moveGradient 10s ease infinite;
    }
    @keyframes moveGradient {
      0% { background-position: 0% 50%; }
      50% { background-position: 100% 50%; }
      100% { background-position: 0% 50%; }
    }

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
      background: #2d3436;
      color: #ffffffff;
      text-decoration: none;
      font-size: 14px;
      transition: all 0.2s ease-in-out;
    }

    .pagination a:hover {
      background: #0984e3;
      color: white;
    }

    .pagination strong {
      background: #9507c8ff;
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
  </style>
</head>

<body class="min-h-screen flex items-center justify-center text-gray-100 font-sans p-4 sm:p-6 relative overflow-hidden">

  <!-- Floating Logout Button -->
  <button onclick="window.location.href='/logout'"
    class="fixed top-3 right-3 sm:top-5 sm:right-5 bg-redv hover:bg-red-700 text-white px-4 py-2 sm:px-6 sm:py-2.5 rounded-lg font-semibold shadow-lg transition-transform transform hover:scale-105 z-50">
    Logout
  </button>

  <!-- Main Container -->
  <div class="w-full max-w-6xl bg-gray-900/80 backdrop-blur-lg border border-gray-700 shadow-2xl rounded-2xl p-4 sm:p-8 flex flex-col lg:flex-row flex-wrap gap-6 animate-fadeIn">

    <!-- Search Section -->
    <div class="w-full">
      <form method="POST" action="search" id="studentForm" class="flex flex-col sm:flex-row gap-3">
        <input type="text" id="searchbar" name="searchbar" placeholder="Search student..."
          class="flex-1 px-4 py-2 bg-gray-800 border border-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-violetv placeholder-gray-400" />
        <div class="flex gap-2 sm:gap-3 justify-end sm:justify-start">
          <button type="submit"
            class="bg-violetv hover:bg-violet-700 px-5 py-2 rounded-lg text-white font-medium transition">
            Search
          </button>
          <button type="button" onclick="window.location.href='/student/index/1'"
            class="bg-greenv hover:bg-green-600 px-5 py-2 rounded-lg text-white font-medium transition">
            Cancel
          </button>
        </div>
      </form>
    </div>

    <!-- Student Form -->
    <div class="flex-1 min-w-[300px] bg-gray-800 rounded-xl p-6 shadow-md">
      <h2 class="text-xl font-semibold text-center mb-4 text-greenv">Student Form</h2>
      <form method="POST" action="inserted" id="studentForm" class="space-y-3">
        <input type="hidden" id="student_id" name="id">

        <input type="text" id="fname" name="First_Name" placeholder="First Name" required
          class="w-full px-4 py-2 rounded-lg bg-gray-900 border border-gray-700 focus:outline-none focus:ring-2 focus:ring-violetv" />
        <input type="text" id="lname" name="Last_Name" placeholder="Last Name" required
          class="w-full px-4 py-2 rounded-lg bg-gray-900 border border-gray-700 focus:outline-none focus:ring-2 focus:ring-violetv" />
        <input type="text" id="email" name="Email" placeholder="Email" required
          class="w-full px-4 py-2 rounded-lg bg-gray-900 border border-gray-700 focus:outline-none focus:ring-2 focus:ring-violetv" />
        <select id="role" name="role" required
          class="w-full px-4 py-2 rounded-lg bg-gray-900 border border-gray-700 focus:outline-none focus:ring-2 focus:ring-violetv text-gray-300">
          <option value="" disabled selected>-- Select Role --</option>
          <option value="user">User</option>
          <option value="admin">Admin</option>
        </select>

        <div class="grid grid-cols-1 sm:grid-cols-3 gap-3 pt-3">
          <button type="submit" formaction="inserted"
            class="bg-violetv hover:bg-violet-700 py-2 rounded-lg text-white font-semibold transition">Submit</button>
          <button type="submit" formaction="update"
            class="bg-greenv hover:bg-green-600 py-2 rounded-lg text-white font-semibold transition">Update</button>
          <button type="submit" formaction="softdel"
            class="bg-redv hover:bg-red-700 py-2 rounded-lg text-white font-semibold transition">Delete</button>
        </div>
      </form>
    </div>

    <!-- Table Section -->
    <div class="flex-1 min-w-[300px] bg-gray-800 rounded-xl p-6 shadow-md overflow-x-auto">
      <h2 class="text-xl font-semibold text-center mb-4 text-violetv">Student List</h2>

      <div class="overflow-x-auto">
        <table id="mytable" class="w-full border border-gray-700 text-sm rounded-lg overflow-hidden">
          <thead class="bg-gray-700 text-gray-100">
            <tr>
              <th class="py-2 px-3">ID</th>
              <th class="py-2 px-3">First Name</th>
              <th class="py-2 px-3">Last Name</th>
              <th class="py-2 px-3">Email</th>
            </tr>
          </thead>
          <tbody class="bg-gray-900">
            <?php if (!empty($records)): ?>
              <?php foreach ($records as $row): ?>
                <tr class="hover:bg-gray-700 cursor-pointer transition">
                  <td class="py-2 px-3 border-t border-gray-700"><?= $row['id']; ?></td>
                  <td class="py-2 px-3 border-t border-gray-700"><?= $row['fname']; ?></td>
                  <td class="py-2 px-3 border-t border-gray-700"><?= $row['lname']; ?></td>
                  <td class="py-2 px-3 border-t border-gray-700"><?= $row['email']; ?></td>
                </tr>
              <?php endforeach; ?>
            <?php else: ?>
              <tr><td colspan="4" class="text-center py-3 text-gray-400">No students found</td></tr>
            <?php endif; ?>
          </tbody>
        </table>
      </div>

      <?php if (isset($pagination_data)): ?>
        <div class="pagination-container mt-4">
          <div class="w-full sm:w-auto text-center sm:text-left">
            <?= $pagination_links ?>
          </div>
          <div class="pagination-info w-full sm:w-auto text-center sm:text-right mt-2 sm:mt-0">
            <?= $pagination_data['info']; ?>
          </div>
        </div>
      <?php endif; ?>
    </div>
  </div>

  <script>
    // Row click = fill form
    document.querySelectorAll("#mytable tbody tr").forEach(row => {
      row.addEventListener("click", function() {
        let cells = this.querySelectorAll("td");
        document.getElementById("student_id").value = cells[0]?.textContent || "";
        document.getElementById("fname").value = cells[1]?.textContent || "";
        document.getElementById("lname").value = cells[2]?.textContent || "";
        document.getElementById("email").value = cells[3]?.textContent || "";
        document.getElementById("role").value = "user";
      });
    });
  </script>
</body>
</html>
