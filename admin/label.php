<?php
ob_start();
require_once './api/connection.php';
require_once './api/functions.php';
$where = "";
if(empty($_COOKIE['olabasket_admin_id'])){
    header('Location : login.php');
}
$title = "Label";
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
                        <button class="btn btn-primary btn-rounded" type="button" onclick="return addData();">+ Add <?= $title; ?></button>
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
                                                <th>Label Name</th>
                                                <th>Label Value EN</th>
                                                <th>Label Value IN</th>
                                                <th>Label Value AR</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                                    $fetchData = array();
$fetchData = $db->rawQuery("SELECT LM.* FROM ".LABEL." LM WHERE LM.is_deleted = '0' ORDER BY LM.label_id DESC");
if(count($fetchData) > 0){
    for($i=0;$i<count($fetchData);$i++){
        $label_id  = $fetchData[$i]['label_id'];
        $label_name = $fetchData[$i]['label_name'];
        $label_value_EN = $fetchData[$i]['label_value_EN'];
        $label_value_IN = $fetchData[$i]['label_value_IN'];
        $label_value_AR = $fetchData[$i]['label_value_AR'];
        $is_active = $fetchData[$i]['is_active'];
        $is_deleted = $fetchData[$i]['is_deleted'];
        ?>
                                            <tr>
                                                <td class="text-center"><?= $i+1; ?></td>
                                                <td><?= $label_name; ?></td>
                                                <td><?= $label_value_EN; ?></td>
                                                <td><?= $label_value_IN; ?></td>
                                                <td><?= $label_value_AR; ?></td>
                                                <td class="text-center">
							<a href="javascript:void(0)" class="btn btn-primary shadow btn-xs sharp mr-1"
                                                            title="Edit" 
                                                            label_id="<?= $label_id; ?>" 
                                                            label_name="<?= $label_name; ?>" 
                                                            label_value_EN="<?= $label_value_EN; ?>"
                                                            label_value_IN="<?= $label_value_IN; ?>"
                                                            label_value_AR="<?= $label_value_AR; ?>"
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
                                                    <input type="hidden" name="case" id="case" value="updateLabelData">
                                    <input type="hidden" name="label_id" id="label_id">
                                                    <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label>Label Name</label>
                                                <input type="text" class="form-control" id="label_name" name="label_name" placeholder="Enter Label Name" required="" readonly="">
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label>Label Value EN</label>
                                                <input type="text" class="form-control" id="label_value_EN" name="label_value_EN" placeholder="Enter Label Value EN" required="" readonly="">
                                            </div>
                                            
                                            <div class="form-group col-md-12">
                                                <label>Label Value IN</label>
                                                <input type="text" class="form-control" id="label_value_IN" name="label_value_IN" placeholder="Enter Label Value IN" required="">
                                            </div>
                                            
                                            <div class="form-group col-md-12">
                                                <label>Label Value AR</label>
                                                <input type="text" class="form-control" id="label_value_AR" name="label_value_AR" placeholder="Enter Label Value AR" required="">
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
           $("#label_id").val("");
           $("#label_name").val("");
           $("#label_value_EN").val("");
           $("#label_value_IN").val("");
           $("#label_value_AR").val("");
           $("#popUpModalTitle").html("Add New <?= $title; ?>");
           $("#popUpModalButton").html("Save Changes");
           $("#popUpModal").modal("show");
       }
       function editData(ele){
           $("#label_id").val($(ele).attr("label_id"));
           $("#label_name").val($(ele).attr("label_name"));
           $("#label_value_EN").val($(ele).attr("label_value_EN"));
           $("#label_value_IN").val($(ele).attr("label_value_IN"));
           $("#label_value_AR").val($(ele).attr("label_value_AR"));
           $("#popUpModalTitle").html("Edit <?= $title; ?> - "+ $(ele).attr("label_name"));
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