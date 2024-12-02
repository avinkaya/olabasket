<?php
ob_start();
require_once './api/connection.php';
require_once './api/functions.php';
if(empty($_COOKIE['olabasket_admin_id'])){
    header('Location:login.php');
}
$title = "Dashboard";
?>
<!DOCTYPE html>
<html lang="en" dir="">
<head>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title><?= $title; ?></title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,400i,600,700,800,900" rel="stylesheet" />
    <link href="./dist-assets/css/themes/lite-purple.min.css" rel="stylesheet" />
    <link href="./dist-assets/css/plugins/perfect-scrollbar.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="./dist-assets/css/plugins/datatables.min.css" />
    <link rel="stylesheet" href="./dist-assets/css/plugins/toastr.css" />
</head>

<body class="text-left">
    <div class="app-admin-wrap layout-sidebar-large">
        <?php
        require_once './header.php';
        require_once './sidebar.php';
        ?>
        <!-- =============== Left side End ================-->
        <div class="main-content-wrap sidenav-open d-flex flex-column">
            <!-- ============ Body content start ============= -->
            <div class="main-content">
                 <div class="row">
                    <div class="col-sm-8">
                        <div class="breadcrumb">
                    <h1 class="mr-2">Dashboard</h1>
                    <ul>
                        <li>Version <?= PROJECT_VERSION; ?></li>
                    </ul>
                </div>
                    </div>
                </div>
                <div class="separator-breadcrumb border-top"></div>
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <a href="#">
                        <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
                            <div class="card-body text-center"><i class="i-Library"></i>
                                <div class="content">
                                    <p class="text-muted mt-2 mb-0">Category</p>
                                    <p class="text-primary text-24 line-height-1 mb-2">
                                        <?php
                                        $getData = array();
$getData = $db->rawQuery("SELECT * FROM ".CATEGORY." WHERE is_deleted = '0'");
if(count($getData)){
    echo count($getData);
}else{
    echo "0";
}
?>
                                    </p>
                                </div>
                            </div>
                        </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <a href="team.php">
                        <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
                            <div class="card-body text-center"><i class="i-Couple-Sign"></i>
                                <div class="content">
                                    <p class="text-muted mt-2 mb-0">Team</p>
                                    <p class="text-primary text-24 line-height-1 mb-2">
                                        <?php
                                        $getData = array();
$getData = $db->rawQuery("SELECT * FROM ".TEAM." WHERE is_deleted = '0'");
if(count($getData)){
    echo count($getData);
}else{
    echo "0";
}
?>
                                    </p>
                                </div>
                            </div>
                        </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <a href="product.php">
                        <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
                            <div class="card-body text-center"><i class="i-Cart-Quantity"></i>
                                <div class="content">
                                    <p class="text-muted mt-2 mb-0">Product</p>
                                    <p class="text-primary text-24 line-height-1 mb-2">
                                        <?php
                                        $getData = array();
$getData = $db->rawQuery("SELECT * FROM ".PRODUCT." WHERE is_deleted = '0'");
if(count($getData)){
    echo count($getData);
}else{
    echo "0";
}
?>
                                    </p>
                                </div>
                            </div>
                        </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <a href="#">
                        <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
                            <div class="card-body text-center"><i class="i-Camera"></i>
                                <div class="content">
                                    <p class="text-muted mt-2 mb-0">Gallery</p>
                                    <p class="text-primary text-24 line-height-1 mb-2">
                                        <?php
                                        $getData = array();
$getData = $db->rawQuery("SELECT * FROM ".GALLERY." WHERE is_deleted = '0'");
if(count($getData)){
    echo count($getData);
}else{
    echo "0";
}
?>
                                    </p>
                                </div>
                            </div>
                        </div>
                        </a>
                    </div>
                </div>
                <div class="row" style="padding-bottom: 100px;">
                    
                </div>
            <?php
            require_once './footer.php';
            ?>
        </div>
    </div>
    </div>
    <script src="./dist-assets/js/plugins/jquery-3.3.1.min.js"></script>
    <script src="./dist-assets/js/plugins/bootstrap.bundle.min.js"></script>
    <script src="./dist-assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="./dist-assets/js/scripts/script.min.js"></script>
    <script src="./dist-assets/js/scripts/sidebar.large.script.min.js"></script>
    <script src="./dist-assets/js/plugins/echarts.min.js"></script>
    <script src="./dist-assets/js/scripts/echart.options.min.js"></script>
    <script src="./dist-assets/js/scripts/dashboard.v1.script.min.js"></script>
    <script src="./dist-assets/js/plugins/datatables.min.js"></script>
    <script src="./dist-assets/js/scripts/datatables.script.min.js"></script>
    <script src="./dist-assets/js/plugins/toastr.min.js"></script>
    <script src="./dist-assets/js/scripts/toastr.script.min.js"></script>
    <script src="./functions.js"></script>
</body>
</html>