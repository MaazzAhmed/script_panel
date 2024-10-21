<?php
$Title = "Footer Script";
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
                                        <h5 class="card-title">Edit Footer Script</h5>
                                    </div>
                                    <form method="post">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label class="form-label" for="user-name">Footer Script</label>
                                                <textarea class="form-control" id="user-name" name="script_content" required><?php echo htmlspecialchars(implode("\n", $footerScripts)); ?></textarea>
                                                <input type="hidden" name="sid" value="3">
                                            </div>
                                        </div>
                                        <div class="mt-2 text-center">
                                            <button type="submit" class="btn btn-lg btn-primary" name="save_script">Update</button>
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