<?php 
// fetch_thank_you_body.php
require_once('main_components/configration.php');

if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Sanitize and convert to integer
    $stmt = $conn->prepare("SELECT thank_you_body FROM websites WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->bind_result($thank_you_body);
    
    if ($stmt->fetch()) {
        // Return the thank_you_body as JSON
        echo json_encode(['thank_you_body' => $thank_you_body]);
    } else {
        echo json_encode(['error' => 'Record not found']);
    }
    $stmt->close();
} else {
    echo json_encode(['error' => 'ID is required']);
}

?>