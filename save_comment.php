<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $comment = isset($_POST['comment']) ? trim($_POST['comment']) : '';
    $username = isset($_POST['username']) ? trim($_POST['username']) : '';
    $path_2 = isset($_POST['path_2']) ? trim($_POST['path_2']) : '';
    echo "<script>console.log('Path 2: " . addslashes($path_2) . "');</script>";

    if ($comment && $username && $path_2) {
        // Construct the data file path based on the received path_2
        $dataFile = $path_2 . '.json'; // e.g., 'asc/5.json'
        $comments = [];

        // If file exists, load existing comments
        if (file_exists($dataFile)) {
            $json = file_get_contents($dataFile);
            $comments = json_decode($json, true);
        }

        // Create a unique ID for the comment
        $id = time() . '-' . rand(1000, 9999);
        $newComment = [
            'id' => $id,
            'username' => $username,
            'comment' => $comment,
            'date' => date('Y-m-d H:i:s')
        ];

        // Add the new comment
        $comments[] = $newComment;

        // Save the updated comments back to the file
        file_put_contents($dataFile, json_encode($comments, JSON_PRETTY_PRINT));

        echo 'Comment added successfully';
    } else {
        echo 'Error: Missing username, comment, or path_2';
    }
}
?>
