<?php
// fetch_data.php
require_once('../main_components/configration.php'); // Database connection file

// Allow CORS
header("Access-Control-Allow-Origin: *"); // Allow all domains
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Headers: Content-Type");

// Check if `id` and `field` parameters are set in the GET request
if (isset($_GET['id']) && isset($_GET['field'])) {
  $id = intval($_GET['id']); // Sanitize the 'id' parameter
  $field = $_GET['field']; // Field to retrieve from database

  // List of allowed fields that can be retrieved from the database
  $allowed_fields = ['website_name', 'global_head', 'thank_you_head', 'global_body', 'thank_you_body'];

  // Check if the requested field is in the allowed list
  if (in_array($field, $allowed_fields)) {
    // Prepare the SQL query to fetch the specific field for the given id
    $sql = "SELECT $field FROM websites WHERE id = ? LIMIT 1";

    if ($stmt = $conn->prepare($sql)) { // Prepare the SQL statement
      $stmt->bind_param("i", $id); // Bind the 'id' parameter
      $stmt->execute(); // Execute the statement
      $stmt->bind_result($field_data); // Bind the result
      $stmt->fetch(); // Fetch the result

      // Handle multi-line content properly by escaping the data and removing `br` tags (already done in the previous solution)
      if ($field_data) {
        $field_data = str_replace('<br>', "\n", $field_data);
        echo $field_data; // Return the content directly
      } else {
        echo 'Data not found'; // Return a simple message if data is not found
      }
    } else {
      // Error in preparing the SQL statement
      echo 'SQL error: ' . $conn->error;
    }
  } else {
    // Invalid field requested
    echo 'Invalid field';
  }
} else {
  // Missing parameters in the GET request
  echo 'Missing parameters';
}