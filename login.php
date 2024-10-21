<?php require_once("./main_components/global.php");
$current_page = basename($_SERVER['PHP_SELF']);
$allowed_pages = array('login.php', 'authentication-forgot-password.php'); // Add other allowed pages if needed
?>

<!DOCTYPE html>
<html lang="zxx" class="js">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description"
        content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">
    <link rel="shortcut icon" href="images/favicon.png">
    <title>Login | Admin Panel</title>
    <link rel="stylesheet" href="assets/css/dashlite324d.css?ver=3.1.0">
    <link id="skin-default" rel="stylesheet" href="assets/css/theme324d.css?ver=3.1.0">
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-91615293-4"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'UA-91615293-4');
    </script>
</head>

<body class="nk-body bg-white npc-default pg-auth">
    <div class="nk-app-root">
        <div class="nk-main ">
            <div class="nk-wrap nk-wrap-nosidebar">
                <div class="nk-content ">

                    <div class="absolute-top-right d-lg-none p-3 p-sm-5"><a href="#"
                            class="toggle btn-white btn btn-icon btn-light" data-target="athPromo"><em
                                class="icon ni ni-info"></em></a></div>
                    <div class="nk-block nk-block-middle nk-auth-body">
                        <!-- <div class="brand-logo pb-5"><a href="index" class="logo-link">
                                <img
                                    class="logo-light logo-img logo-img-lg" src="assets/logo&fav/logo.png"
                                    srcset="assets/logo&fav//logo.png 2x" alt="logo">
                                <img
                                    class="logo-dark logo-img logo-img-lg" src="assets/logo&fav//logo.png"
                                    srcset="assets/logo&fav/logo.png 2x" alt="logo-dark">

                            </a>
                        </div> -->
                        <div class="nk-block-head">
                            <div class="nk-block-head-content">
                                <h5 class="nk-block-title">Sign-In</h5>

                            </div>
                        </div>
                        <?php if (!empty($error)) : ?>
                            <div class="alert alert-danger alert-icon"><em class="icon ni ni-cross-circle"></em> <strong>Unable to Login </strong> <?php echo $error; ?></div>


                        <?php endif; ?>

                        <?php if (!empty($system)) : ?>
                            <div class="alert alert-danger alert-icon"><em class="icon ni ni-cross-circle"></em> <strong>Unable to Login </strong> <?php echo $error; ?></div>
                        <?php endif; ?>
                        <form action="#" class="form-validate is-alter" method="post">
                            <div class="form-group">
                                <div class="form-label-group"><label class="form-label" for="email-address">Email or
                                        Email</label> </div>
                                <div class="form-control-wrap">
                                    <input autocomplete="off" type="text"
                                        class="form-control form-control-lg" required id="email-address"
                                        placeholder="Enter your email address" name="email">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-label-group"><label class="form-label"
                                        for="password">Passcode</label>
                                    <a class="link link-primary link-sm"
                                        tabindex="-1" href="auth-reset">Forgot Code?</a>
                                </div>
                                <div class="form-control-wrap"><a tabindex="-1" href="#"
                                        class="form-icon form-icon-right passcode-switch lg"
                                        data-target="password"><em
                                            class="passcode-icon icon-show icon ni ni-eye"></em><em
                                            class="passcode-icon icon-hide icon ni ni-eye-off"></em></a>
                                    <input
                                        autocomplete="new-password" type="password"
                                        class="form-control form-control-lg" required id="password"
                                        placeholder="Enter your passcode" name="password">
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-lg btn-primary btn-block" name="login">Sign
                                    in</button>
                            </div>
                        </form>


                    </div>

                </div>
            </div>
        </div>
    </div>




    <script src="assets/js/bundle324d.js?ver=3.1.0"></script>
    <script src="assets/js/scripts324d.js?ver=3.1.0"></script>
    <script src="assets/js/demo-settings324d.js?ver=3.1.0"></script>


</html>