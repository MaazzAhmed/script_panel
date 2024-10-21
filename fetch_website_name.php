<?php
// fetch_website_name.php
require_once('main_components/configration.php'); 
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $stmt = $conn->prepare("SELECT website_name FROM websites WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->bind_result($website_name);
    
    if ($stmt->fetch()) {
        echo json_encode(['website_name' => $website_name]);
    } else {
        echo json_encode(['error' => 'Record not found']);
    }
    $stmt->close();
} else {
    echo json_encode(['error' => 'ID is required']);
}

?>