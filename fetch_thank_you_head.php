<?php
// fetch_thank_you_head.php
require_once('main_components/configration.php');

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $stmt = $conn->prepare("SELECT thank_you_head FROM websites WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->bind_result($thank_you_head);
    
    if ($stmt->fetch()) {
        echo json_encode(['thank_you_head' => $thank_you_head]);
    } else {
        echo json_encode(['error' => 'Record not found']);
    }
    $stmt->close();
} else {
    echo json_encode(['error' => 'ID is required']);
}

?>