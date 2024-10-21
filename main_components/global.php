<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>



<?php

require_once('configration.php');

session_start();



// Start Login

if (isset($_POST['login'])) {

    $email = $_POST['email'];

    $password = $_POST['password'];

    $sql = "SELECT * FROM accounts WHERE email = ?";

    $stmt = $conn->prepare($sql);

    $stmt->bind_param("s", $email);

    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows === 1) {

        $row = $result->fetch_assoc();

        $storedPassword = $row['password'];

        if (password_verify($password, $storedPassword)) {

            // Authentication successful

            $_SESSION['id'] = $row['id']; // Set the 'id' in the session



            $_SESSION['username'] = $row['username'];



            $_SESSION['email'] = $row['email'];

            // Debugging statements



            echo 'Session ID: ' . session_id() . '<br>';



            echo 'Session User: ' . $_SESSION['user'] . '<br>';

            header('Location: index');

            exit;

        } else {



            $error = 'Incorrect password';

        }

    } else {



        $error = 'User with the provided email not found';

    }

    $stmt->close();

}

// End Login



// ADD User

if (isset($_POST['add-user'])) {

    if (isset($_POST['username'], $_POST['email'], $_POST['password'])) {

        $username = $_POST['username'];

        $email = $_POST['email'];

        $password = $_POST['password'];

        $hashed_password = password_hash($password, PASSWORD_DEFAULT);



        // Prepare the SQL statement

        $insertQuery = "INSERT INTO accounts (username, email, password) VALUES (?, ?, ?)";

        $stmt_user = mysqli_prepare($conn, $insertQuery);



        // Bind parameters

        mysqli_stmt_bind_param($stmt_user, "sss", $username, $email, $hashed_password);



        // Execute the query

        if (mysqli_stmt_execute($stmt_user)) {

            echo "<script>

                window.addEventListener('load', function() {

                    Swal.fire({

                        icon: 'success',

                        title: 'Success',

                        text: 'User added successfully!'

                    }).then(() => {

                    window.location.href = 'view-user.php';

                });

                });

            </script>";

        } else {

            echo "<script>

                window.addEventListener('load', function() {

                    Swal.fire({

                        icon: 'error',

                        title: 'Error',

                        text: 'Failed to add user: " . mysqli_stmt_error($stmt_user) . "'

                    });

                });

            </script>";

        }



        // Close the statement

        mysqli_stmt_close($stmt_user);

    } else {

        echo "<script>

            window.addEventListener('load', function() {

                Swal.fire({

                    icon: 'error',

                    title: 'Error',

                    text: 'Required fields are missing.'

                });

            });

        </script>";

    }

}



// END ADD USER





// Start Edit User

if (isset($_POST['edit-user'])) {



    $userId = $_POST['user-id'];







    $editUserQuery = "SELECT * FROM accounts WHERE id = ?";



    $stmtEditUser = mysqli_prepare($conn, $editUserQuery);



    mysqli_stmt_bind_param($stmtEditUser, "i", $userId);



    mysqli_stmt_execute($stmtEditUser);



    $resultEditUser = mysqli_stmt_get_result($stmtEditUser);



    $editUserData = mysqli_fetch_assoc($resultEditUser);







    mysqli_stmt_close($stmtEditUser);

}

// End EDIT User



// Start Update User

if (isset($_POST['update-user'])) {



    $userId = $_POST['userid'];

    $username = $_POST['username'];

    $email = $_POST['email'];

    $password = $_POST['password'];

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);



    if (empty($password)) {

        $updateUserQuery = "UPDATE `accounts` SET username=?, email=? WHERE id=?";

        $stmtUpdateUser = mysqli_prepare($conn, $updateUserQuery);



        if ($stmtUpdateUser === false) {

            die('MySQL prepare error: ' . mysqli_error($conn));

        }



        mysqli_stmt_bind_param($stmtUpdateUser, "ssi", $username, $email, $userId);

    } else {

        $updateUserQuery = "UPDATE `accounts` SET username=?, email=?, password=? WHERE id=?";

        $stmtUpdateUser = mysqli_prepare($conn, $updateUserQuery);



        if ($stmtUpdateUser === false) {

            die('MySQL prepare error: ' . mysqli_error($conn));

        }



        mysqli_stmt_bind_param($stmtUpdateUser, "sssi", $username, $email, $hashedPassword, $userId);

    }



    $executeResult = mysqli_stmt_execute($stmtUpdateUser);



    if ($executeResult) {

        $_SESSION['alert'] = [

            'type' => 'success',

            'message' => 'User edited successfully!'

        ];

    } else {

        $_SESSION['alert'] = [

            'type' => 'error',

            'message' => 'Failed to edit user: ' . mysqli_stmt_error($stmtUpdateUser)

        ];

    }

    mysqli_stmt_close($stmtUpdateUser);



    header('Location: view-user');

    exit();

}



// End Update User





// Start Delete User

if (isset($_POST['delete-user'])) {

    $userId = $_POST['user-id'];



    // Trigger a SweetAlert2 confirmation in PHP using JavaScript

    echo "<script>

        window.addEventListener('load', function() {

            Swal.fire({

                title: 'Are you sure?',

                text: 'Do you really want to delete this user?',

                icon: 'warning',

                showCancelButton: true,

                confirmButtonColor: '#3085d6',

                cancelButtonColor: '#d33',

                confirmButtonText: 'Yes, delete it!',

                cancelButtonText: 'Cancel'

            }).then((result) => {

                if (result.isConfirmed) {

                    // Redirect to delete the user

                    window.location.href = 'view-user?confirmDelete=true&user-id=" . $userId . "';

                }

            });

        });

    </script>";

}



// Check if the user confirmed deletion via the URL parameter

if (isset($_GET['confirmDelete']) && $_GET['confirmDelete'] === 'true' && isset($_GET['user-id'])) {

    $userId = $_GET['user-id'];



    // Prepare the DELETE SQL query

    $deleteQuery = "DELETE FROM accounts WHERE id = ?";

    $stmtDeleteUser = mysqli_prepare($conn, $deleteQuery);



    if ($stmtDeleteUser === false) {

        die('MySQL prepare error: ' . mysqli_error($conn));

    }



    mysqli_stmt_bind_param($stmtDeleteUser, "i", $userId);



    if (mysqli_stmt_execute($stmtDeleteUser)) {

        // Success

        echo "<script>

            window.addEventListener('load', function() {

                Swal.fire({

                    icon: 'success',

                    title: 'Success',

                    text: 'User deleted successfully!'

                })

            });

        </script>";

    } else {

        // Error

        echo "<script>

            window.addEventListener('load', function() {

                Swal.fire({

                    icon: 'error',

                    title: 'Error',

                    text: 'Failed to delete user: " . mysqli_stmt_error($stmtDeleteUser) . "'

                });

            });

        </script>";

    }



    mysqli_stmt_close($stmtDeleteUser);

}

// End Delete User




// Start Add  Website Script



if (isset($_POST['Add'])) {

    // Retrieve form data

    $website_name = $_POST['website_name'];

    $global_head = $_POST['global_head'];

    $thankyou_head = $_POST['thankyouhead'];

    $global_body = $_POST['global_body'];

    $thankyou_body = $_POST['thankyou_body'];



    // Prepare the SQL statement with placeholders

    $sql = "INSERT INTO websites (website_name, global_head, thank_you_head, global_body, thank_you_body) 

            VALUES (?, ?, ?, ?, ?)";



    // Prepare the statement

    if ($stmt = $conn->prepare($sql)) {

        // Bind the parameters to the placeholders

        // 's' indicates the data type (string in this case) for each parameter

        $stmt->bind_param("sssss", $website_name, $global_head, $thankyou_head, $global_body, $thankyou_body);



        // Execute the prepared statement

        if ($stmt->execute()) {

            // Set success message in session

            $_SESSION['message'] = [

                'type' => 'success',

                'text' => 'Record added successfully.'

            ];

            

            // Redirect to the same page to avoid form resubmission

            header("Location: " . $_SERVER['PHP_SELF']);

            exit();

        } else {

            // Set error message in session

            $_SESSION['message'] = [

                'type' => 'error',

                'text' => 'Error: ' . $stmt->error

            ];

        }

        

        // Close the statement

        $stmt->close();

    } else {

        // Set error message if statement preparation failed

        $_SESSION['message'] = [

            'type' => 'error',

            'text' => 'Error preparing statement: ' . $conn->error

        ];

    }

}



// Display success/error message using SweetAlert if present in session

if (isset($_SESSION['message'])) {

    $message = $_SESSION['message'];



    // Clear the message from session after displaying

    unset($_SESSION['message']);

    

    echo "<script>

    window.addEventListener('load', function() {

        Swal.fire({

            icon: " . json_encode($message['type']) . ",

            title: " . json_encode(ucfirst($message['type'])) . ",

            text: " . json_encode($message['text']) . "

        });

    });

    </script>";

}



// Check if the ID is set in the URL

if (isset($_GET['webid'])) {

    $id = $_GET['webid'];



    // Prepare the SQL statement to fetch the current values

    $sql = "SELECT id, website_name, global_head, thank_you_head, global_body, thank_you_body FROM websites WHERE id = ?";



    // Prepare the statement

    if ($stmt = $conn->prepare($sql)) {

        // Bind the ID parameter

        $stmt->bind_param("i", $id);



        // Execute the query

        if ($stmt->execute()) {

            // Bind the result variables

            $stmt->bind_result($id, $website_name, $global_head, $thank_you_head, $global_body, $thank_you_body);



            // Fetch the data

            if ($stmt->fetch()) {

                // Data successfully fetched

            } else {

                echo "<p>No record found for ID: {$id}</p>";

                exit();

            }

        } else {

            echo "<p>Error executing query: " . $stmt->error . "</p>";

            exit();

        }



        // Close the statement

        $stmt->close();

    } else {

        echo "<p>Error preparing statement: " . $conn->error . "</p>";

        exit();

    }

} 



// Update the record when the form is submitted

if (isset($_POST['updateweb'])) {

   $id = $_POST['idupd'];

    $website_name = $_POST['website_name'];

    $global_head = $_POST['global_head'];

    $thank_you_head = $_POST['thank_you_head'];

    $global_body = $_POST['global_body'];

    $thank_you_body = $_POST['thank_you_body'];



    // Prepare the update SQL statement

    $sql = "UPDATE websites SET website_name = ?, global_head = ?, thank_you_head = ?, global_body = ?, thank_you_body = ? WHERE id = ?";



    // Prepare the statement

    if ($stmt = $conn->prepare($sql)) {

        // Bind the parameters to the placeholders

        $stmt->bind_param("sssssi", $website_name, $global_head, $thank_you_head, $global_body, $thank_you_body, $id);



        // Execute the statement

        if ($stmt->execute()) {

           

            $_SESSION['message'] = [

                'type' => 'success',

                'text' => 'Record updated successfully.'

            ];

            header("Location: " . $_SERVER['PHP_SELF'] . "?webid=" . $id);

            exit(); // Prevent further execution after redirection

        } else {

           

             // Set error message if statement preparation failed

        $_SESSION['message'] = [

            'type' => 'error',

            'text' => 'Error updating record: ' . $conn->error

        ];

        }



        // Close the statement

        $stmt->close();

    } else {

        echo "<p>Error preparing statement: " . $conn->error . "</p>";

    }

}



if (isset($_POST['delete'])) {

    $id = $_POST['iddel'];

    $delete_sql = "DELETE FROM websites WHERE id = ?";

    

    if ($delete_stmt = $conn->prepare($delete_sql)) {

        $delete_stmt->bind_param("i", $id);

        if ($delete_stmt->execute()) {

            $_SESSION['message'] = [

                'type' => 'success',

                'text' => 'Record Delete successfully.'

            ];

            header("Location: index" );

            exit();

        } else {

            echo "Error deleting record: " . $delete_stmt->error;

        }

        $delete_stmt->close();

    } else {

        echo "Error preparing delete statement: " . $conn->error;

    }

}

?>