 <!-- PHP CODE -->
 <?php
    require_once('main_components/PHPMailer/Exception.php');
    require_once('main_components/PHPMailer/PHPMailer.php');
    require_once('main_components/PHPMailer/SMTP.php');

    use PHPMailer\PHPMailer\PHPMailer;

 require_once('main_components/configration.php');

    $error = '';
    $alert = '';

    function baseUrl() {
        $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
        $domainName = $_SERVER['HTTP_HOST'];
        return $protocol . $domainName;
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST["email"]) && (!empty($_POST["email"]))) {
            $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
            $email = filter_var($email, FILTER_VALIDATE_EMAIL);
            if (!$email) {
                $error .= "<p>Invalid email address please type a valid email address!</p>";
            } else {
                $sel_query = "SELECT * FROM `accounts` WHERE email='" . $email . "'";
                $results = mysqli_query($conn, $sel_query);
                $row = mysqli_num_rows($results);
                if ($row == 0) {
                    $error .= "<p>No user is registered with this email address!</p>";
                }
            }
            if ($error != "") {
                $alerts = "Unable to forget password </strong> " . $error;
            } else {
                $expDate = date("Y-m-d H:i:s", strtotime("+1 day"));
                $key = md5(rand() . microtime());
                $insert_query = "UPDATE `accounts` SET new_password_requested = '$expDate', new_password_key = '$key' WHERE email = '$email'";
                if (!mysqli_query($conn, $insert_query)) {
                    $alert = "Error updating data: " . mysqli_error($conn);
                } else {
                    $output = '

                    <table align="center" border="0" cellpadding="0" cellspacing="0" style="margin-left:15px">

                        <tbody>

                            <tr>

                                <td height="90" style="color:#999999" width="600">

                                    <img src="images/logo.png" alt="Invoice Logo" style="width: 250px; height: 95px;object-fit: contain;">

                                </td>

                            </tr>

                            <tr>

                                <td bgcolor="whitesmoke" height="200" style="background:whitesmoke; border:1px solid #e0e0e0; font-family:Helvetica,Arial,sans-serif" valign="top" width="600">

                                    <table align="center" style="margin-left:15px;">

                                        <tbody>

                                            <tr>

                                                <td width="560" style="text-transform: capitalize;">

                                                    <h4 style="color:rgb(0,0,0)">Notification</h4>

                                                    <p style="font-size:12px;font-family:Helvetica,Arial,sans-serif">Hi There,</p>

                                                    <p style="font-size:12px;line-height:20px;font-family:Helvetica,Arial,sans-serif">

                                                         Please click on the following link to reset your password.

                                                        <br>

                                                        <a href="' . baseUrl() . 'Admin-template/authentication_user_pass.php?key=' . $key . '&email=' . $email . '&action=reset" target="_blank" style="color:#11a7db;text-decoration:none" target="_blank">

                                                            <strong>Change Your Password Now</strong>

                                                        </a>
                                                        Please be sure to copy the entire link into your browser. The link will expire after 1 day for security reasons.

                                                        <br><br><br>

                                                        Best Regards,

                                                        <br>Academic Help

                                                    </p>

                                                </td>

                                            </tr>

                                            <tr>

                                                <td height="10" width="560">&nbsp;</td>

                                            </tr>

                                        </tbody>

                                    </table>

                                </td>

                            </tr>

                        </tbody>

                    </table>

                </body>

                ';
                  
                    $body = $output;
                    $subject = "Email Verification - Password Reset";

                    $email_to = $email;
                    $fromserver = "admin@mmecloud.tech";
                    $mail = new PHPMailer();
$mail->isSMTP();
$mail->Host = "mail.graderz.org";  // SMTP Host
$mail->SMTPAuth = true;
$mail->Username = 'support@graderz.org';  // SMTP Username (should match the from address)
$mail->Password = 'fB2Qc#w4c7&2';  // SMTP Password
$mail->Port = 587;  // SMTP Port
$mail->IsHTML(true);
$mail->From = "support@graderz.org";  // This should match the domain hosted on the server
$mail->FromName = "Graderz Support";  // Display Name
$mail->Sender = 'support@graderz.org';  // ReturnPath header
$mail->Subject = $subject;
$mail->Body = $body;
$mail->AddAddress($email_to);  // Recipient email address
$mail->SMTPSecure = 'tls';  // Use TLS encryption
$mail->SMTPAutoTLS = false;  // Disable auto TLS if not needed

                    // $mail->SMTPDebug = 2; // 2 for basic debugging, 3 for more detailed debugging

                    if (!$mail->Send()) {
                        $alert = "Mailer Error: " . $mail->ErrorInfo;
                    } else {
                        $alert = "An email with instructions for creating a new password has been sent to you!";
                    }
                }
            }
        } else {
            $alert = "<p>Please enter an email address!</p>";
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

                                               <?php if (!empty($error)) { ?>
                        <div class="alert alert-danger">
                            <i class="fa fa-info-sign"></i>
                            <center><b><?php echo $error ?></b></center>
                        </div>
                    <?php } ?>
                    <?php if (!empty($alert)) { ?>
                        <div class="alert alert-info">
                            <i class="fa fa-info-sign"></i>
                            <center><b><?php echo $alert ?></b></center>
                        </div>
                    <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <form action="#"  method="post" name="reset">
                                    <div class="form-group">
                                        <div class="form-label-group"><label class="form-label" for="default-01">Email</label></div>
                                        <div class="form-control-wrap"><input type="text" class="form-control form-control-lg" id="default-01" placeholder="Enter your email address" name="email"></div>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-lg btn-primary btn-block" type="submit">Send Reset Link</button>
                                    </div>
                                </form>
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