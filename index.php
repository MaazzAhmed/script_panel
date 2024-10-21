<?php
$Title = "Index";
require_once('main_components/header.php');
?>
<div class="nk-content ">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">

                <div class="nk-block">
                    <div class="row g-gs">
                        <div class="col-xxl-3 col-sm-12">
                            <div class="card">
                                <div class="nk-ecwg nk-ecwg6">
                                    <div class="card-inner">
                                        <div class="card-title-group">
                                            <div class="card-title">
                                                <h6 class="title">Welcome <?php echo $_SESSION['username'] ?></h6>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php
                        $sql = "SELECT count(*) as totalusers FROM accounts";
                        $result = $conn->query($sql);

                        if ($result) {
                            $row = $result->fetch_assoc();
                            if ($row) {
                                $totalusers = $row['totalusers'];
                            }
                        } else {
                            echo "Error: " . $conn->error;
                        }
                        ?>
                        <div class="col-xxl-3 col-sm-6">
                            <div class="card">
                                <div class="nk-ecwg nk-ecwg6">
                                    <div class="card-inner">
                                        <div class="card-title-group">
                                            <div class="card-title">
                                                <h6 class="title">Total Users</h6>
                                            </div>
                                        </div>
                                        <div class="data">
                                            <div class="data-group">
                                                <div class="amount"><?php echo $totalusers ?></div>
                                                <div class="nk-ecwg6-ck"><canvas
                                                        class="ecommerce-line-chart-s3"
                                                        id="todayVisitors"></canvas></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php 
$sql = "SELECT COUNT(*) as id FROM websites";
$result = mysqli_query($conn, $sql);

if ($result) { 
    $row = mysqli_fetch_assoc($result);
    $totalphone = $row ? $row['id'] : 0; // Default to 0 if no row found
} else {
    echo "Error: " . mysqli_error($conn);
}
?>

<div class="col-xxl-3 col-sm-6">
    <div class="card">
        <div class="nk-ecwg nk-ecwg6">
            <div class="card-inner">
                <div class="card-title-group">
                    <div class="card-title">
                        <h6 class="title">Total Websites</h6>
                    </div>
                </div>
                <div class="data">
                    <div class="data-group">
                        <div class="amount"><?php echo $totalphone; ?></div>
                        <div class="nk-ecwg6-ck">
                            <canvas class="ecommerce-line-chart-s3" id="todayVisitors"></canvas>
                        </div>
                    </div>
                </div>
            </div>
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
require_once('main_components/footer.php');
?>