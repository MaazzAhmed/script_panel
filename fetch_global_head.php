<?php 
// fetch_global_head.php
require_once('main_components/configration.php');

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $stmt = $conn->prepare("SELECT global_head FROM websites WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->bind_result($global_head);
    
    if ($stmt->fetch()) {
        echo json_encode(['global_head' => $global_head]);
    } else {
        echo json_encode(['error' => 'Record not found']);
    }
    $stmt->close();
} else {
    echo json_encode(['error' => 'ID is required']);
}

?>