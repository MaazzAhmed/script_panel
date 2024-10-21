<?php
$Title = "Edit User";
require_once('main_components/header.php');
?>
<div class="nk-content ">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="components-preview wide-md mx-auto">


                    <div class="nk-block nk-block-lg">
                        <div class="nk-block-head">
                            <div class="nk-block-head-content">
                                <h4 class="title nk-block-title">Edit User</h4>

                            </div>
                        </div>
                        <div class="card">
                            <div class="card-inner">
                                <div class="card-head">
                                </div>
                                <form method="post">
                                    <div class="row g-4">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-label" for="full-name-1">Username</label>
                                                <div class="form-control-wrap">
                                                    <input type="hidden" name="userid" value="<?php echo $editUserData['id'] ?>">
                                                    <input type="text" class="form-control" id="full-name-1" name="username" required value="<?php echo $editUserData['username']; ?>">

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-label" for="email-address-1">Email address</label>
                                                <div class="form-control-wrap">
                                                    <input type="email" class="form-control" id="email-address-1" name="email" required value="<?php echo $editUserData['email']; ?>">

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-label" for="password">Password</label>
                                                <div class="form-control-wrap">
                                                    <input autocomplete="new-password" type="password" class="form-control form-control-lg" id="password" placeholder="Enter your passcode" name="password">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 center">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-lg btn-primary" name="update-user">Update</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<?php
require_once('main_components/footer.php');
?>