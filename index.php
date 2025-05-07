<!-- index.html -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Crowdfunding Platform</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 text-gray-800">

  <!-- Navbar -->
  <nav class="bg-white shadow p-4">
    <div class="container mx-auto flex justify-between items-center">
      <h1 class="text-xl font-bold text-blue-600">CrowdFunding</h1>
    <div class="flex space-x-6 mx-auto">
        <a href="" class="text-blue-500 hover:underline">Home</a>
        <a href="./allCampaign.php" class="text-blue-500 hover:underline">All Campaign</a>
        <a href="./Contact/" class="text-blue-500 hover:underline">Contact</a>

    </div>
    <div class="flex space-x-4">
        <a href="./adminAddFund/login.php" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
           Admin
        </a>
    </div>
    </div>
  </nav>

  <!-- Hero -->
  <section class="bg-blue-600 text-white py-20 text-center">
    <h2 class="text-4xl font-bold mb-4">Support Creative Projects</h2>
    <p class="text-lg mb-6">Choose a project and help make it real!</p>
    <a href="#projects" class="bg-yellow-400 text-black px-6 py-2 rounded-full font-semibold">Explore Projects</a>
  </section>

  <!-- Projects -->
<section id="projects" class="py-16">
    <div class="container mx-auto">
        <h3 class="text-3xl font-bold text-center mb-10">Projects</h3>
        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-8 auto-rows-fr ml-4 mr-4">
            <!-- Card -->
            <?php
            $cardsJson = file_get_contents(__DIR__ . '/Cards/data.json');
            $cards     = json_decode($cardsJson, true);

            // grab only the last 8 items
            $cards     = array_slice($cards, -8);

            foreach ($cards as $card): ?>
                <div class="bg-white rounded-xl shadow-lg overflow-hidden transform hover:scale-105 transition duration-300 flex flex-col h-full">
                    <div class="relative">
                        <img
                            src="<?= htmlspecialchars($card['image'], ENT_QUOTES) ?>"
                            alt="<?= htmlspecialchars($card['title'], ENT_QUOTES) ?>"
                            class="w-full h-48 object-cover"
                        >
                        <span class="absolute top-3 left-3 bg-indigo-600 text-white text-xs uppercase px-2 py-1 rounded">
                            <?= htmlspecialchars($card['label'], ENT_QUOTES) ?>
                        </span>
                    </div>
                    <div class="p-4 flex flex-col flex-grow">
                        <h4 class="text-xl font-semibold text-gray-800 mb-2">
                            <?= htmlspecialchars($card['title'], ENT_QUOTES) ?>
                        </h4>
                        <div class="flex justify-between text-xs text-gray-600 mb-4">
                            <div>
                                <span class="font-medium">Goal:</span>
                                <b>TK <?= number_format($card['goal']) ?></b>
                            </div>
                            <div>
                                <span class="font-medium">Deadline:</span>
                                <?= htmlspecialchars($card['deadline'], ENT_QUOTES) ?>
                            </div>
                        </div>
                        <a
                            href="donate.php"
                            class="mt-auto block w-full text-center bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 rounded-full transition"
                        >
                            Donate Now
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

  <!-- Footer -->
  <footer class="bg-gray-800 text-white text-center py-6">
    &copy; 2025 CrowdFund. All rights reserved.
  </footer>

</body>
</html>
