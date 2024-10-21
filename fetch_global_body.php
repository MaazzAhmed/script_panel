<?php
// fetch_global_body.php
require_once('main_components/configration.php');

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $stmt = $conn->prepare("SELECT global_body FROM websites WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->bind_result($global_body);
    
    if ($stmt->fetch()) {
        echo json_encode(['global_body' => $global_body]);
    } else {
        echo json_encode(['error' => 'Record not found']);
    }
    $stmt->close();
} else {
    echo json_encode(['error' => 'ID is required']);
}

?>