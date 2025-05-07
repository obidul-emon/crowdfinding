<?php
// donate.php

// Payment methods data
$payments = [
    [
        'name'           => 'Bkash',
        'account_number' => '0123456789',
        'account_name'   => 'ABC Ltd.',
        'logo'           => 'Images/bkash.png',
    ],
    [
        'name'           => 'Nagad',
        'account_number' => '0987654321',
        'account_name'   => 'ABC Ltd.',
        'logo'           => 'Images/Nagad.png',
    ],
    [
        'name'           => 'Rocket',
        'account_number' => '0112233445',
        'account_name'   => 'ABC Ltd.',
        'logo'           => 'Images/rocket.png',
    ],
    [
        'name'           => 'Bank Account',
        'account_number' => '123456789012',
        'account_name'   => 'ABC Ltd.',
        'logo'           => 'Images/ibbl.png',
    ],
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Donate</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">
      <!-- Navbar -->
  <nav class="bg-white shadow p-4">
    <div class="container mx-auto flex justify-between items-center">
      <h1 class="text-xl font-bold text-blue-600">CrowdFunding</h1>
    <div class="flex space-x-6 mx-auto">
        <a href="./" class="text-blue-500 hover:underline">Home</a>
        <a href="" class="text-blue-500 hover:underline">All Campaign</a>
    </div>
    <div class="flex space-x-4">
        <a href="./adminAddFund/login.php" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
           Admin
        </a>
    </div>
    </div>
  </nav>
  <main class="max-w-4xl mx-auto p-6">
    <h1 class="text-4xl font-bold mb-8 text-center">Donate On</h1>
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
        <?php foreach ($payments as $p): ?>
            <div class="bg-white rounded-lg shadow p-6 flex flex-col items-center">
                <img src="<?php echo htmlspecialchars($p['logo']); ?>"
                         alt="<?php echo htmlspecialchars($p['name']); ?> Logo"
                         class="w-20 h-20 mb-4 object-contain">
                <h2 class="text-2xl font-semibold mb-2"><?php echo htmlspecialchars($p['name']); ?></h2>
                <p class="font-mono text-gray-700 mb-1">
                    <span class="font-bold">Acc#:</span>
                    <?php echo htmlspecialchars($p['account_number']); ?>
                </p>
                <p class="font-mono text-gray-700">
                    <span class="font-bold">Name:</span>
                    <?php echo htmlspecialchars($p['account_name']); ?>
                </p>
            </div>
        <?php endforeach; ?>
    </div>
  </main>
</body>
  <!-- Footer -->
  <footer class="bg-gray-800 text-white text-center py-6">
    &copy; 2025 CrowdFund. All rights reserved.
  </footer>
</html>