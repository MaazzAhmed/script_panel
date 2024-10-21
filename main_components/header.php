<?php 



require_once('global.php');

if(!$_SESSION['id']){

    header('Location: ./login');

    exit;

}



?>

<!DOCTYPE html>

<html lang="zxx" class="js">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />



<head>

    <meta charset="utf-8">

    <meta name="author" content="Softnio">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="description"

        content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">

    <link rel="shortcut icon" href="images/favicon.png">

    <title><?php echo $Title ?> | Admin Panel</title>

    <link rel="stylesheet" href="assets/css/dashlite324d.css?ver=3.1.0">

    <link id="skin-default" rel="stylesheet" href="assets/css/theme324d.css?ver=3.1.0">

    <link rel="stylesheet" href="assets/css/style-email.css">

    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>





    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-91615293-4"></script>

    <script>window.dataLayer = window.dataLayer || []; function gtag() { dataLayer.push(arguments); } gtag('js', new Date()); gtag('config', 'UA-91615293-4');</script>

    <style>

    /* Ensure your table's width, padding, and margins are as per your design */

    table.dataTable {

        width: 100% !important;

        border-collapse: collapse;

    }



    table.dataTable th, table.dataTable td {

        padding: 10px !important;

        text-align: left;

    }



    table.dataTable thead {

        background-color: #f8f9fa;

    }



    table.dataTable thead th {

        font-weight: bold;

    }



    table.dataTable tbody tr:nth-child(even) {

        background-color: #f2f2f2;

    }

</style>


</head>



<?php 

 require_once('sidebar.php');

 require_once('topbar.php');

 ?>