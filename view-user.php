<?php
$Title = "View User";
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
                                <h4 class="nk-block-title">View Users</h4>

                            </div>
                        </div>
                        <div class="card card-bordered card-preview">
                            <div class="card-inner">
                                <table class="datatable-init-export nowrap table"
                                    data-export-title="Export">
                                    <thead>
                                        <tr>
                                            <th class="destable">Id</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = "SELECT * from accounts";
                                        $query = mysqli_query($conn, $sql);
                                        while ($row = mysqli_fetch_array($query)) {
                                        ?>

                                            <tr>
                                                <td><?php echo $row['id'] ?></td>
                                                <td><?php echo $row['username'] ?></td>
                                                <td><?php echo $row['email'] ?></td>

                                                <td>
                                                    <form action="edit-user" method="post">
                                                        <input type="hidden" name="user-id" value="<?php echo $row['id'] ?>">
                                                        <button class="btn btn-info" type="submit" name="edit-user">Edit</button>
                                                    </form>
                                                </td>
                                                <td>
                                                    <form method="post">
                                                        <input type="hidden" name="user-id" value="<?php echo $row['id'] ?>">
                                                        <button class="btn btn-danger" type="submit" name="delete-user">Delete</button>
                                                    </form>
                                                </td>

                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
<?php
 if (isset($_SESSION['alert'])) {
     $alert = $_SESSION['alert'];
     $type = $alert['type'];
     $message = htmlspecialchars($alert['message']); 

     if ($type == 'success') {
         echo "<script>
             window.addEventListener('load', function() {
                 Swal.fire({
                     icon: 'success',
                     title: 'Success',
                     text: '$message'
                 });
             });
         </script>";
     } elseif ($type == 'error') {
         echo "<script>
             window.addEventListener('load', function() {
                 Swal.fire({
                     icon: 'error',
                     title: 'Error',
                     text: '$message'
                 });
             });
         </script>";
     }
     unset($_SESSION['alert']);
 }

require_once('main_components/footer.php');
?>