<?php 
// fetch_data.php
require_once('../main_components/configration.php'); // Database connection file

// Allow CORS
header("Access-Control-Allow-Origin: *");  // Allow all domains
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: application/json; charset=UTF-8");

// Check if `id` and `field` parameters are set in the GET request
if (isset($_GET['id']) && isset($_GET['field'])) {
    $id = intval($_GET['id']); // Sanitize the 'id' parameter
    $field = $_GET['field'];   // Field to retrieve from database

    // List of allowed fields that can be retrieved from the database
    $allowed_fields = ['website_name', 'global_head', 'thank_you_head', 'global_body', 'thank_you_body'];

    // Check if the requested field is in the allowed list
    if (in_array($field, $allowed_fields)) {
        // Prepare the SQL query to fetch the specific field for the given id
        $sql = "SELECT $field FROM websites WHERE id = ? LIMIT 1";
        
        if ($stmt = $conn->prepare($sql)) {  // Prepare the SQL statement
            $stmt->bind_param("i", $id);    // Bind the 'id' parameter
            $stmt->execute();               // Execute the statement
            $stmt->bind_result($field_data); // Bind the result
            $stmt->fetch();                 // Fetch the result

            // Return the data as JSON if the field data is found
            if ($field_data) {
                echo json_encode([$field => $field_data]);
            } else {
                echo json_encode(['error' => 'Data not found']);
            }
        } else {
            // Error in preparing the SQL statement
            echo json_encode(['error' => 'SQL error: ' . $conn->error]);
        }
    } else {
        // Invalid field requested
        echo json_encode(['error' => 'Invalid field']);
    }
} else {
    // Missing parameters in the GET request
    echo json_encode(['error' => 'Missing parameters']);
}
?>
