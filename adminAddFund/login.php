<?php
session_start();
$error = '';

if (isset($_POST['login'])) {
    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if ($username === 'admin' && $password === '12345') {
        $_SESSION['admin_logged_in'] = true;
        header('Location: ./');
        exit;
    } else {
        $error = 'Invalid username or password.';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Login</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
          <!-- Navbar -->
  <nav class="bg-white shadow p-4">
    <div class="container mx-auto flex justify-between items-center">
      <h1 class="text-xl font-bold text-blue-600">CrowdFunding</h1>
    <div class="flex space-x-6 mx-auto">
        <a href="../" class="text-blue-500 hover:underline">Home</a>
        <a href="../allCampaign.php" class="text-blue-500 hover:underline">All Campaign</a>
        <a href="../Contact/" class="text-blue-500 hover:underline">Contact</a>
    </div>
    <div class="flex space-x-4">
        <a href="" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
           Admin
        </a>
    </div>
    </div>
  </nav>
<div class="min-h-screen flex items-center justify-center ">
    <div class="w-full max-w-md p-8 bg-white rounded shadow">
    <h1 class="text-2xl font-semibold text-center mb-6">Admin Login</h1>
    <?php if ($error): ?>
      <div class="mb-4 p-2 bg-red-100 text-red-700 rounded">
        <?= htmlspecialchars($error) ?>
      </div>
    <?php endif; ?>
    <form method="post" class="space-y-4">
      <div>
        <label for="username" class="block text-sm font-medium">Username</label>
        <input
          type="text"
          name="username"
          id="username"
          required
          class="mt-1 w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
        />
      </div>
      <div>
        <label for="password" class="block text-sm font-medium">Password</label>
        <input
          type="password"
          name="password"
          id="password"
          required
          class="mt-1 w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
        />
      </div>
      <button
        type="submit"
        name="login"
        class="w-full py-2 px-4 bg-blue-600 text-white rounded hover:bg-blue-700 transition"
      >
        Log In
      </button>
    </form>
  </div>
</div>

</body>
</html>