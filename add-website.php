<?php
$Title = "Add";
require_once('main_components/header.php');
?>

<div class="nk-content">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="components-preview wide-md mx-auto">
                    <div class="row">
                        <div class="col-12">
                            <div class="card h-100">
                                <div class="card-inner">
                                    <div class="card-head">
                                        <h5 class="card-title">Add</h5>
                                    </div>
                                    <form method="post">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label class="form-label" for="user-name">Website Name</label>
                                                <input class="form-control" id="user-name" name="website_name" required>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label class="form-label" for="user-name">Global Head</label>
                                                <textarea class="form-control" id="user-name" name="global_head" required></textarea>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label class="form-label" for="user-name">Thank You Head</label>
                                                <textarea class="form-control" id="user-name" name="thankyouhead" required></textarea>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label class="form-label" for="user-name">Global Body</label>
                                                <textarea class="form-control" id="user-name" name="global_body" required></textarea>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label class="form-label" for="user-name">Thank You Body</label>
                                                <textarea class="form-control" id="user-name" name="thankyou_body" required></textarea>
                                            </div>
                                        </div>
                                        <div class="mt-2 text-center">
                                            <button type="submit" class="btn btn-lg btn-primary" name="Add">Add</button>
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
</div>

<?php
// Display success/error message if set

require_once('main_components/footer.php');
?>