<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Submit via Fetch</title>
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
              <a href="./login.php" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                Admin
              </a>
          </div>
          </div>
        </nav>
        <div class=" flex items-center justify-center min-h-screen">
        <div class="bg-white p-8 rounded shadow-md w-full max-w-md">
            <h1 class="text-2xl font-bold mb-6">Submit Donation Card</h1>
            <form id="donationForm" class="space-y-4">
              <div>
                <label class="block text-sm font-medium">Upload Image</label>
                <input name="image" type="file" required class="mt-1 block w-full border rounded p-2" />
              </div>
              <div>
                <label class="block text-sm font-medium">Type of CrowdFund</label>
                <input name="label" type="text" required class="mt-1 block w-full border rounded p-2" />
              </div>
              <div>
                <label class="block text-sm font-medium">Fund Name</label>
                <input name="title" type="text" required class="mt-1 block w-full border rounded p-2" />
              </div>
              <div>
                <label class="block text-sm font-medium">Goal (in number)</label>
                <input name="goal" type="number" required min="0" class="mt-1 block w-full border rounded p-2" />
              </div>
              <div>
                <label class="block text-sm font-medium">Deadline (e.g. May 30, 2025)</label>
                <input name="deadline" type="text" required class="mt-1 block w-full border rounded p-2" />
              </div>

              <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700">
                Submit
              </button>
            </form>
            <div id="responseMessage" class="mt-4 text-center font-semibold"></div>
          </div>
        </div>


  <script>
    document.getElementById('donationForm').addEventListener('submit', async function (e) {
      e.preventDefault();

      const form = e.target;
      const formData = new FormData(form);

      try {
        const response = await fetch('submit.php', {
          method: 'POST',
          body: formData
        });

        const result = await response.json();

        const messageDiv = document.getElementById('responseMessage');
        messageDiv.textContent = result.message;
        messageDiv.className = result.success
          ? 'text-green-600 mt-4'
          : 'text-red-600 mt-4';

        if (result.success) {
          form.reset();
        }
      } catch (err) {
        document.getElementById('responseMessage').textContent = 'Error submitting form.';
      }
    });
  </script>
</body>
</html>
