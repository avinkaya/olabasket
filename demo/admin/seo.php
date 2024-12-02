<?php
ob_start();
require_once './api/connection.php';
require_once './api/functions.php';
$where = "";
if(empty($_COOKIE['olabasket_admin_id'])){
    header('Location : login.php');
}
$title = "Page SEO";
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
                                <li><a href="#">Masters</a></li>
                                <li><?= $title; ?></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-4 text-right">
                    </div>
                </div>
                <div class="separator-breadcrumb border-top"></div>
                <!-- end of row-->
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
                                                <th>Page</th>
                                                <th>Meta Title</th>
                                                <th>Meta Description</th>
                                                <th>Meta Keywords/th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                                    $fetchData = array();
$fetchData = $db->rawQuery("SELECT SM.* FROM ".SEO." SM WHERE SM.is_deleted = '0' ORDER BY SM.seo_id ASC");
if(count($fetchData) > 0){
    for($i=0;$i<count($fetchData);$i++){
        $seo_id  = $fetchData[$i]['seo_id'];
        $meta_title = $fetchData[$i]['meta_title'];
        $meta_description = $fetchData[$i]['meta_description'];
        $meta_keywords = $fetchData[$i]['meta_keywords'];
        $page_id = $fetchData[$i]['page_id'];
        if($page_id == "1"){
            $page = "Home";
        }elseif($page_id == "2"){
            $page = "About Us";
        }elseif($page_id == "3"){
            $page = "CSR";
        }elseif($page_id == "4"){
            $page = "Contact Us";
        }elseif($page_id == "5"){
            $page = "Catalogue";
        }elseif($page_id == "6"){
            $page = "Our Team";
        }elseif($page_id == "7"){
            $page = "All Products";
        }elseif($page_id == "8"){
            $page = "Product Details";
        }elseif($page_id == "9"){
            $page = "Event";
        }elseif($page_id == "10"){
            $page = "Event Details";
        }else{
            $page = "";
        }
        $is_active = $fetchData[$i]['is_active'];
        $is_deleted = $fetchData[$i]['is_deleted'];
        ?>
                                            <tr>
                                                <td class="text-center"><?= $i+1; ?></td>
                                                <td><?= $page; ?></td>
                                                <td><?= $meta_title; ?></td>
                                                <td><?= $meta_description; ?></td>
                                                <td><?= $meta_keywords; ?></td>
                                                </td>
                                                <td class="text-center">
							<a href="javascript:void(0)" class="btn btn-primary shadow btn-xs sharp mr-1"
                                                            title="Edit" 
                                                            seo_id="<?= $seo_id; ?>" 
                                                            meta_title="<?= $meta_title; ?>" 
                                                            meta_description="<?= $meta_description; ?>" 
                                                            page_id="<?= $page_id; ?>"
                                                            meta_keywords="<?= $meta_keywords; ?>"
                                                            onclick="return editData(this);">
                                                            <i class="nav-icon i-Pen-4"></i>
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
           <!-- Modal -->
                                    <div class="modal fade" id="popUpModal">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content modal-sm">
                                                <form method="post" id="form">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="popUpModalTitle"></h5>
                                                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <input type="hidden" name="case" id="case" value="updateSeoData">
                                    <input type="hidden" name="seo_id" id="seo_id">
                                                    <div class="form-row">
                                                    <div class="form-group col-md-12">
                                                <label>Select Page</label>
                                                <select id="page_id" name="page_id" class="form-control default-select" required="" disabled="">
                                                    <option value="">Select Page</option>
                                                    <option value="1">Home</option>
                                                    <option value="2">About Us</option>
                                                    <option value="3">CSR</option>
                                                    <option value="4">Contact Us</option>
                                                    <option value="5">Catalogue</option>
                                                    <option value="6">Our Team</option>
                                                    <option value="7">All Products</option>
                                                    <option value="8">Product Details</option>
                                                    <option value="9">Event</option>
                                                    <option value="10">Event Details</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label>Meta Title</label>
                                                <input type="text" class="form-control" id="meta_title" name="meta_title" placeholder="Enter Name" required="">
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label>Meta Description</label>
                                                <textarea class="form-control" id="meta_description" name="meta_description" placeholder="Enter Meta Description"></textarea>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label>Meta Keywords</label>
                                                <textarea class="form-control" id="meta_keywords" name="meta_keywords" placeholder="Enter Meta Keywords"></textarea>
                                            </div>
                                        </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger light" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary" id="popUpModalButton"></button>
                                                </div>
                                                    </form>
                                            </div>
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
       function addData(){
           $("#seo_id").val("");
           $("#meta_title").val("");
           $("#meta_description").val("");
           $("#meta_keywords").val("");
           $("#page_id").val("");
           $("#popUpModalTitle").html("Add New <?= $title; ?>");
           $("#popUpModalButton").html("Save Changes");
           $("#popUpModal").modal("show");
       }
       function editData(ele){
           $("#seo_id").val($(ele).attr("seo_id"));
           $("#meta_title").val($(ele).attr("meta_title"));
           $("#meta_description").val($(ele).attr("meta_description"));
           $("#meta_keywords").val($(ele).attr("meta_keywords"));
           $("#page_id").val($(ele).attr("page_id"));
           $("#popUpModalTitle").html("Edit <?= $title; ?> - "+ $(ele).attr("meta_title"));
           $("#popUpModalButton").html("Update Changes");
           $("#popUpModal").modal("show");
       }
        $(document).ready(function(){
            $("#form").submit(function(e) {
            var formData = $('#form').serialize();
            e.preventDefault(); // avoid to execute the actual submit of the form.
            commonAjaxCall('<?= API_URL; ?>',formData,commonCallback);
        });
});
    </script>
</body>
</html>