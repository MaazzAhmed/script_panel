<?php

$Title = "Edit";

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

                                        <form method="post">

                                            <input type="hidden" name="iddel" value="<?php echo htmlspecialchars($id); ?>">

                                            <button type="submit" name="delete" class="btn btn-danger card-title"> Delete</button>

                                        </form>

                                    </div>

                                    <form method="post" action="">

                                        <div class="row">

                                            <div class="col-md-12">

                                                <label class="form-label" for="website_name">Website Name</label>

                                                <input class="form-control" type="text" id="website_name" name="website_name" value="<?php echo htmlspecialchars($website_name); ?>" required>

                                            </div>

                                        </div>



                                        <div class="row">
                                            <div class="col-md-12">
                                                <label class="form-label" for="global_head">Global Head</label>
                                                <textarea class="form-control" id="global_head" name="global_head" required><?php echo htmlspecialchars($global_head); ?></textarea>
                                            </div>
                                            <div class="mt-3">
                                                <p>Generated Script:</p>
                                                <div class="position-relative" style="background-color: black; border-radius: 5px; padding: 10px;">
                                                    <button type="button" class="btn btn-primary position-absolute end-0 top-0" onclick="copyCode('global_head-script')">Copy</button>
                                                    <code id="global_head-script" style="display: block; margin-top: 40px; color: white;">
                                                        &lt;script data-host="https://<?php echo htmlspecialchars($_SERVER['HTTP_HOST']); ?>" data-id="<?php echo htmlspecialchars($id); ?>" data-field="global_head" src="https://<?php echo htmlspecialchars($_SERVER['HTTP_HOST']); ?>/Scripts_panel/js/script.js" async&gt;&lt;/script&gt;
                                                    </code>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <label class="form-label" for="thank_you_head">Thank You Head</label>
                                                <textarea class="form-control" id="thank_you_head" name="thank_you_head" required><?php echo htmlspecialchars($thank_you_head); ?></textarea>
                                            </div>
                                            <div class="mt-3">
                                                <p>Generated Script:</p>
                                                <div class="position-relative" style="background-color: black; border-radius: 5px; padding: 10px;">
                                                    <button type="button" class="btn btn-primary position-absolute end-0 top-0" onclick="copyCode('thank_you_head-script')">Copy</button>
                                                    <code id="thank_you_head-script" style="display: block; margin-top: 40px; color: white;">
                                                        &lt;script data-host="https://<?php echo htmlspecialchars($_SERVER['HTTP_HOST']); ?>" data-id="<?php echo htmlspecialchars($id); ?>" data-field="thank_you_head" src="https://<?php echo htmlspecialchars($_SERVER['HTTP_HOST']); ?>/Scripts_panel/js/script.js" async&gt;&lt;/script&gt;
                                                    </code>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <label class="form-label" for="global_body">Global Body</label>
                                                <textarea class="form-control" id="global_body" name="global_body" required><?php echo htmlspecialchars($global_body); ?></textarea>
                                            </div>
                                            <div class="mt-3">
                                                <p>Generated Script:</p>
                                                <div class="position-relative" style="background-color: black; border-radius: 5px; padding: 10px;">
                                                    <button type="button" class="btn btn-primary position-absolute end-0 top-0" onclick="copyCode('global_body-script')">Copy</button>
                                                    <code id="global_body-script" style="display: block; margin-top: 40px; color: white;">
                                                        &lt;script data-host="https://<?php echo htmlspecialchars($_SERVER['HTTP_HOST']); ?>" data-id="<?php echo htmlspecialchars($id); ?>" data-field="global_body" src="https://<?php echo htmlspecialchars($_SERVER['HTTP_HOST']); ?>/Scripts_panel/js/script.js" async&gt;&lt;/script&gt;
                                                    </code>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <label class="form-label" for="thank_you_body">Thank You Body</label>
                                                <textarea class="form-control" id="thank_you_body" name="thank_you_body" required><?php echo htmlspecialchars($thank_you_body); ?></textarea>
                                            </div>
                                            <div class="mt-3">
                                                <p>Generated Script:</p>
                                                <div class="position-relative" style="background-color: black; border-radius: 5px; padding: 10px;">
                                                    <button type="button" class="btn btn-primary position-absolute end-0 top-0" onclick="copyCode('thank_you_body-script')">Copy</button>
                                                    <code id="thank_you_body-script" style="display: block; margin-top: 40px; color: white;">
                                                        &lt;script data-host="https://<?php echo htmlspecialchars($_SERVER['HTTP_HOST']); ?>" data-id="<?php echo htmlspecialchars($id); ?>" data-field="thank_you_body" src="https://<?php echo htmlspecialchars($_SERVER['HTTP_HOST']); ?>/Scripts_panel/js/script.js" async&gt;&lt;/script&gt;
                                                    </code>
                                                </div>
                                            </div>
                                        </div>

                                        <input type="hidden" name="idupd" value="<?php echo htmlspecialchars($id); ?>">



                                        <div class="mt-2 text-center">

                                            <button type="submit" class="btn btn-lg btn-primary" name="updateweb">Update</button>

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


<script>
    function copyCode(scriptId) {
        const codeElement = document.getElementById(scriptId);
        const code = codeElement.textContent;
        const button = codeElement.previousElementSibling; // Get the button next to the code

        navigator.clipboard.writeText(code).then(() => {
            button.textContent = 'Copied';
            setTimeout(() => {
                button.textContent = 'Copy';
            }, 10000); // Reset after 10 seconds
        }).catch(err => {
            console.error('Failed to copy: ', err);
        });
    }
</script>


<?php

// Display success/error message if set



require_once('main_components/footer.php');

?>