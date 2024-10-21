 <?php
 $error = '';
 $success = '';
  require_once('main_components/configration.php');


 if (isset($_GET["key"], $_GET["email"], $_GET["action"]) && $_GET["action"] == "reset" && !isset($_POST["action"])){
    $key = $_GET["key"];
    $email = $_GET["email"];
    $curDate = date("Y-m-d H:i:s");
    $query = mysqli_query($conn, "SELECT * FROM `accounts` WHERE `new_password_key`='$key' AND `email`='$email'");

    if (mysqli_num_rows($query) == 0) {
        $error .= '<h2>Invalid Link</h2><p>The link is invalid/expired. Either you did not copy the correct link from the email, or you have already used the key in which case it is deactivated.</p><p>';
    } else {
        $row = mysqli_fetch_assoc($query);
        $expDate = $row['new_password_requested'];
        if ($expDate < $curDate) {
            $error .= "<h2>Link Expired</h2><p>The link is expired. You are trying to use the expired link which was valid only for 24 hours (1 day) after request.</p>";
        }
    }
} elseif (isset($_POST["email"], $_POST["action"]) && $_POST["action"] == "update") {
    $pass1 = mysqli_real_escape_string($conn, $_POST["pass1"]);
    $pass2 = mysqli_real_escape_string($conn, $_POST["pass2"]);
    $email = $_POST["email"];

    if ($pass1 != $pass2) {
        $error .= "<div class='alert alert-danger alert-icon'><em class='icon ni ni-cross-circle'></em><strong>Passwords do not match, both passwords should be the same.</strong></div>";
    } else {
        $pas_encrypt = password_hash($pass1, PASSWORD_BCRYPT);
        mysqli_query($conn, "UPDATE `accounts` SET `password` = '$pas_encrypt' WHERE `email`= '$email'") or die("Password Reset Query Failed");
        mysqli_query($conn, "UPDATE `accounts` SET new_password_requested = '', new_password_key = '' WHERE email = '$email'");
        $success .= "<h2>Password Updated</h2><p>Your password has been updated successfully. <a href='login'>Click here to login</a>.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="zxx" class="js">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">
    <link rel="shortcut icon" href="images/favicon.png">
    <title> Reset Password | Admin Panel</title>
    <link rel="stylesheet" href="assets/css/dashlite324d.css?ver=3.1.0">
    <link id="skin-default" rel="stylesheet" href="assets/css/theme324d.css?ver=3.1.0">
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-91615293-4"></script>
   
</head>

<body class="nk-body bg-white npc-default pg-auth">
    <div class="nk-app-root">
        <div class="nk-main ">
            <div class="nk-wrap nk-wrap-nosidebar">
                <div class="nk-content ">
                    <div class="nk-block nk-block-middle nk-auth-body  wide-xs">
                        <div class="brand-logo pb-4 text-center"><a href="index-2.html" class="logo-link"><img class="logo-light logo-img logo-img-lg" src="images/logo.png" srcset="/demo2/images/logo2x.png 2x" alt="logo"><img class="logo-dark logo-img logo-img-lg" src="images/logo-dark.png" srcset="/demo2/images/logo-dark2x.png 2x" alt="logo-dark"></a></div>
                        <div class="card">
                            <div class="card-inner card-inner-lg">
                                <div class="nk-block-head">
                                    <div class="nk-block-head-content">
                                        <h5 class="nk-block-title">Reset password</h5>
                                        <div class="nk-block-des">

                                        </div>
                                    </div>
                                </div>
                                <?php if (!empty($error)) { ?>
                        <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <i class="fa fa-info-sign"></i>
                            <center><b><?php echo $error ?></b></center>
                        </div>
                    <?php } elseif (!empty($success)) { ?>
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <i class="fa fa-check-circle"></i>
                            <center><b><?php echo $success ?></b></center>
                        </div>
                    <?php } else { ?>
                                <form action="#"  method="post"  name="update">
                                    <div class="form-group">
                                        <div class="form-label-group"><label class="form-label" for="default-01">Enter New Password</label></div>
                                        <div class="form-control-wrap"><input type="password" class="form-control form-control-lg" id="default-01" placeholder="Enter your email address" name="pass1"></div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-label-group"><label class="form-label" for="default-01">Re-Enter New Password</label></div>
                                        <div class="form-control-wrap"><input type="password" class="form-control form-control-lg" id="default-01" placeholder="Enter your email address" name="pass2"></div>
                                    </div>
                                    <input type="hidden" name="email" value="<?php echo htmlspecialchars($email); ?>" />
                                    <input type="hidden" name="action" value="update" />

                                    <div class="form-group">
                                        <button class="btn btn-lg btn-primary btn-block" type="submit">Change Password</button>
                                    </div>
                                </form>
                                <?php } ?>
                                <div class="form-note-s2 text-center pt-4"><a href="login"><strong>Return to login</strong></a></div>
                            </div>
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
   
    <script src="assets/js/bundle324d.js?ver=3.1.0"></script>
    <script src="assets/js/scripts324d.js?ver=3.1.0"></script>
    <script src="assets/js/demo-settings324d.js?ver=3.1.0"></script>
    
</html>