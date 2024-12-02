<?php
ob_start();
require_once './api/connection.php';
require_once './api/functions.php';
$where = "";
if(empty($_COOKIE['olabasket_admin_id'])){
    header('Location : login.php');
}
$title = "Team";
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
                                                <th>Name</th>
                                                <th>Image</th>
                                                <th>Designation</th>
                                                <th>Remark</th>
                                                <th class="text-center">Status</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                                    $fetchData = array();
$fetchData = $db->rawQuery("SELECT TM.* FROM ".TEAM." TM WHERE TM.is_deleted = '0' ORDER BY TM.team_id DESC");
if(count($fetchData) > 0){
    for($i=0;$i<count($fetchData);$i++){
        $team_id  = $fetchData[$i]['team_id'];
        $team_name = $fetchData[$i]['team_name'];
        $team_designation = $fetchData[$i]['team_designation'];
        $team_image = ADMIN_PANEL.$fetchData[$i]['team_image'];
        $team_remark = $fetchData[$i]['team_remark'];
        $is_active = $fetchData[$i]['is_active'];
        $is_deleted = $fetchData[$i]['is_deleted'];
        ?>
                                            <tr>
                                                <td class="text-center"><?= $i+1; ?></td>
                                                <td><?= $team_name; ?></td>
                                                <td class="text-center"><img width="50" class="rounded-circle" src="<?= $team_image; ?>" alt=""></td>
                                                <td><?= $team_designation; ?></td>
                                                <td><?= $team_remark; ?></td>
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
							<a href="javascript:void(0)" class="btn btn-primary shadow btn-xs sharp mr-1"
                                                            title="Edit" 
                                                            team_id="<?= $team_id; ?>" 
                                                            team_name="<?= $team_name; ?>" 
                                                            team_designation="<?= $team_designation; ?>"
                                                            team_image="<?= $team_image; ?>"
                                                            team_remark="<?= $team_remark; ?>"
                                                            is_active="<?= $is_active; ?>" 
                                                            onclick="return editData(this);">
                                                            <i class="nav-icon i-Pen-4"></i>
                                                        </a>
							<a href="javascript:void(0)" class="btn btn-danger shadow btn-xs sharp" 
                                                           title="Remove" key="team_id" val="<?= $team_id; ?>" 
                                                           function_name="removeTeamData" 
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
                                                    <input type="hidden" name="case" id="case" value="addEditTeamData">
                                    <input type="hidden" name="team_id" id="team_id">
                                                    <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label>Name</label>
                                                <input type="text" class="form-control" id="team_name" name="team_name" placeholder="Enter Name" required="">
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label>Designation</label>
                                                <input type="text" class="form-control" id="team_designation" name="team_designation" placeholder="Enter Designation" required="">
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label>Remark</label>
                                                <textarea class="form-control" id="team_remark" name="team_remark" placeholder="Enter Remark"></textarea>
                                            </div>
                                        </div>
                                    <div class="form-row">
                                            <div class="form-group col-md-8">
                                                <label>Image</label>
                                                <div class="input-group">
                                                   <div class="custom-file">
                                                       <input type="file" id="file" name="file" class="custom-file-input" accept="image/x-png,image/gif,image/jpeg">
                                                        <label class="custom-file-label">Choose file</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-4 text-center">
                                                <input type="hidden" id="image" name="team_image">
                                                <img id="imageUrl" width="75" src="">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label><?= $title; ?> Status</label>
                                                <select id="is_active" name="is_active" class="form-control default-select" required="">
                                                    <option value="">Select Status</option>
                                                    <option value="1" selected="">Active</option>
                                                    <option value="0">In Active</option>
                                                </select>
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
           $("#team_id").val("");
           $("#team_name").val("");
           $("#team_designation").val("");
           $("#team_remark").val("");
           $("#imageUrl").attr("src","");
           $("#is_active").val("1").trigger("change");
           $("#popUpModalTitle").html("Add New <?= $title; ?>");
           $("#popUpModalButton").html("Save Changes");
           $("#popUpModal").modal("show");
       }
       function editData(ele){
           $("#team_id").val($(ele).attr("team_id"));
           $("#team_name").val($(ele).attr("team_name"));
           $("#team_designation").val($(ele).attr("team_designation"));
           $("#team_remark").val($(ele).attr("team_remark"));
           $("#imageUrl").attr("src",$(ele).attr("team_image"));
           $("#is_active").val($(ele).attr("is_active")).trigger("change");
           $("#popUpModalTitle").html("Edit <?= $title; ?> - "+ $(ele).attr("team_name"));
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