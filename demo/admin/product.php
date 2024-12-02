<?php
ob_start();
require_once './api/connection.php';
require_once './api/functions.php';
$where = "";
if(empty($_COOKIE['olabasket_admin_id'])){
    header('Location : login.php');
}
$title = "Products";
$where = "";
$category_id_search = "";
if(!empty($_REQUEST['category_id_search'])){
    $category_id_search = $_REQUEST['category_id_search'];
    $where .= " AND PM.category_id = '".$category_id_search."'";
}
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
                    <div class="col-8">
                        <div class="breadcrumb">
                            <h1><?= $title; ?></h1>
                            <ul>
<!--                                <li><a href="#">Masters</a></li>-->
<!--                                <li><?= $title; ?></li>-->
                            </ul>
                        </div>
                    </div>
                    <div class="col-4 text-right">
                        <a href="addEditProduct.php">
                            <button class="btn btn-primary btn-rounded" type="button">+ Add <?= $title; ?></button>
                        </a>
                    </div>
                </div>
                <div class="separator-breadcrumb border-top"></div>
                <!-- end of row-->
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <form action="<?= $_SERVER['PHP_SELF']; ?>" method="POST">
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="row row-xs">
                                    <div class="col-md-2 form-group mb-4">
                                        <label for="picker1">Category</label>
                                        <select id="category_id_search" name="category_id_search" class="form-control default-select">
                                            <option selected value="">Select</option>
                                                <?php
                                                                    $fetchData = array();
$fetchData = $db->rawQuery("SELECT * FROM ".CATEGORY." WHERE is_deleted = '0' AND is_active = '1' ORDER BY category_name ASC");
if(count($fetchData) > 0){
    for($i=0;$i<count($fetchData);$i++){
        $category_id_tmp  = $fetchData[$i]['category_id'];
        $category_name = $fetchData[$i]['category_name'];
        ?>
                                                <option value="<?= $category_id_tmp; ?>" <?php if($category_id_search == $category_id_tmp){ ?>selected=""<?php } ?>><?= $category_name; ?></option>
                                                    <?php
    }
}
    ?>
                                            </select>
                                    </div>
                                    <div class="col-md-2 mt-4 form-group mt-md-0">
                                        <label for="picker1">&nbsp;</label>
                                        <button type="submit" name="search" class="btn btn-primary btn-block">
                                            Search
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-md-12 mb-4">
                        <div class="card text-left">
                            <div class="card-body">
                                <h4 class="card-title mb-3"><?=  $title; ?> List</h4>
                                <p></p>
                                <div class="table-responsive">
                                    <table class="display table table-striped table-bordered" id="zero_configuration_table" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th class="text-center">Sr#</th>
                                                <th>Name</th>
                                                <th class="text-center">Image</th>
                                                <th>Category Name</th>
                                                <th class="text-center">Index</th>
                                                <th class="text-center">Is Popular</th>
                                                <th class="text-center">Status</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                                    $fetchData = array();
$fetchData = $db->rawQuery("SELECT PM.*"
        . ",(SELECT category_name FROM ".CATEGORY." WHERE category_id = PM.category_id) AS category_name "
        . "FROM ".PRODUCT." PM WHERE PM.is_deleted = '0' $where ORDER BY PM.product_id DESC");
if(count($fetchData) > 0){
    for($i=0;$i<count($fetchData);$i++){
        $product_id  = $fetchData[$i]['product_id'];
        $category_id = $fetchData[$i]['category_id'];
        $product_name = $fetchData[$i]['product_name'];
        $product_image = ADMIN_PANEL.$fetchData[$i]['product_image'];
        $product_short_description = $fetchData[$i]['product_short_description'];
        $product_description = $fetchData[$i]['product_description'];
        $product_code = $fetchData[$i]['product_code'];
        $is_available = $fetchData[$i]['is_available'];
        $is_popular = $fetchData[$i]['is_popular'];
        $category_name = $fetchData[$i]['category_name'];
        $product_index = $fetchData[$i]['product_index'];
        $is_active = $fetchData[$i]['is_active'];
        ?>
                                            <tr>
                                                <td class="text-center"><?= $i+1; ?></td>
                                                <td><?= $product_name; ?></td>
                                                <td class="text-center">
                                                    <img width="50" class="rounded-circle" src="<?= $product_image; ?>" alt="">
                                                </td>
                                                <td><?= $category_name; ?></td>
                                                <td class="text-center"><?= $product_index; ?></td>
                                                <td class="text-center">
                                                    <?php
                                                if($is_popular == "1"){
                                                    ?>
                                                    <span style="color: blue;">Yes</span>
                                                    <?php
                                                }else{
                                                    ?>
                                                    <span style="color: red;">No</span>
                                                    <?php
                                                }
                                                ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php
                                                if($is_active == "1"){
                                                    ?>
                                                    <button type="button" class="btn btn-rounded btn-success">Active</button>
                                                    <?php
                                                }else{
                                                    ?>
                                                    <button type="button" class="btn btn-rounded btn-danger">In Active</button>
                                                    <?php
                                                }
                                                ?>
                                                </td>
                                                <td class="text-center">
                                                    <a href="addEditProduct.php?id=<?= base64_encode($product_id); ?>" class="btn btn-primary shadow btn-xs sharp mr-1"
                                                            title="Edit">
                                                            <i class="nav-icon i-Pen-4"></i>
                                                        </a>
							<a href="javascript:void(0)" class="btn btn-danger shadow btn-xs sharp" 
                                                           title="Remove" key="product_id" val="<?= $product_id; ?>" 
                                                           function_name="removeProductData" 
                                                           onclick="return removeDataByFunction(this);">
                                                            <i class="nav-icon i-Close-Window"></i>
                                                        </a>
						</td>												
                                            </tr>
                                            <?php
    }
}
?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end of row-->
                <!-- end of main-content -->
            </div><!-- Footer Start -->
            <div class="flex-grow-1"></div>
            <?php
                    require_once './footer.php';
            ?>
        </div>
    </div>
    <script src="./dist-assets/js/plugins/jquery-3.3.1.min.js"></script>
    <script src="./dist-assets/js/plugins/bootstrap.bundle.min.js"></script>
    <script src="./dist-assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="./dist-assets/js/scripts/script.min.js"></script>
    <script src="./dist-assets/js/scripts/sidebar.large.script.min.js"></script>
    <script src="./dist-assets/js/plugins/datatables.min.js"></script>
    <script src="./dist-assets/js/scripts/datatables.script.min.js"></script>
    <script src="./dist-assets/js/plugins/toastr.min.js"></script>
    <script src="./dist-assets/js/scripts/toastr.script.min.js"></script>
    <script src="./functions.js"></script>
    <script>
        $(document).ready(function(){
            $("#form").submit(function(e) {
            var formData = $('#form').serialize();
            e.preventDefault(); // avoid to execute the actual submit of the form.
            commonAjaxCall('<?= API; ?>',formData,commonCallback);
        });
});
    </script>
</body>
</html>