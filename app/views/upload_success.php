<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Upload Success</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex items-center justify-center h-screen bg-gray-100">
    <div class="bg-white shadow-lg rounded-xl p-6 text-center">
        <h1 class="text-2xl font-bold mb-4 text-green-600">✅ Upload Successful!</h1>
        <p class="mb-4">Here’s your uploaded image:</p>
        <img src="<?= $url ?>" alt="Uploaded Image" class="rounded-xl shadow-md max-w-sm mx-auto">
        <div class="mt-4">
            <a href="/file-upload" class="px-4 py-2 bg-blue-500 text-white rounded-lg">Upload Another</a>
        </div>
    </div>
</body>
</html>
