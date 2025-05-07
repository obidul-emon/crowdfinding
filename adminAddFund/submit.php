<?php
$dataFile    = __DIR__ . '/../Cards/data.json';
$uploadDir   = __DIR__ . '/../Cards/uploads';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    header('Content-Type: application/json'); // <- Important for fetch()

    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0755, true);
    }

    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $tmpName  = $_FILES['image']['tmp_name'];
        $origName = basename($_FILES['image']['name']);
        $safeName = uniqid() . '_' . preg_replace('/[^a-zA-Z0-9\._-]/', '_', $origName);
        $destPath = "$uploadDir/$safeName";
        move_uploaded_file($tmpName, $destPath);
        $imagePath = './Cards/uploads/' . $safeName;
    } else {
        echo json_encode(['success' => false, 'message' => 'Image upload failed.']);
        exit;
    }

    $newEntry = [
        'image'    => $imagePath,
        'label'    => trim($_POST['label']),
        'title'    => trim($_POST['title']),
        'goal'     => (int) $_POST['goal'],
        'deadline' => trim($_POST['deadline'])
    ];

    if (file_exists($dataFile)) {
        $json = file_get_contents($dataFile);
        $list = json_decode($json, true) ?: [];
    } else {
        $list = [];
    }

    $list[] = $newEntry;
    file_put_contents($dataFile, json_encode($list, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));

    echo json_encode(['success' => true, 'message' => 'Entry saved successfully!']);
    exit;
}
?>
