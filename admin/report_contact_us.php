<?php
ob_start();
require_once './api/connection.php';
require_once './api/functions.php';
$where = "";
if(empty($_COOKIE['olabasket_admin_id'])){
    header('Location : login.php');
}
$title = "Contact Us Inquiry Report";
$from_date = date("Y-m-01");
$to_date = date("Y-m-31");
if(!empty($_REQUEST['from_date']) && !empty($_REQUEST['to_date'])){
    $from_date = trim($_REQUEST['from_date']);
    $to_date = trim($_REQUEST['to_date']);
}
$where .= " AND contact_inquiry_date BETWEEN '".$from_date."' AND '".$to_date."'";
?>
<!DOCTYPE html>
<html lang="en" dir="">
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title><?= $title; ?></title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,400i,600,700,800,900" rel="stylesheet" />
    <link href="./dist-assets/css/themes/lite-purple.min.css" rel="stylesheet" />
    <link href="./dist-assets/css/plugins/perfect-scrollbar.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="./dist-assets/css/plugins/datatables.min.css" />
    <link rel="stylesheet" href="./dist-assets/css/plugins/toastr.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.2/css/buttons.dataTables.min.css" />
    <link rel="stylesheet" href="./dist-assets/css/plugins/select2.min.css" />
    <link rel="stylesheet" href="./dist-assets/css/plugins/jquery-ui.css">
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
                                <li><a href="#">Reports</a></li>
                                <li><?= $title; ?></li>
                            </ul>
                        </div>
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
                                        <label for="picker1">From Date</label>
                                        <input class="form-control datepicker" id="from_date" placeholder="yyyy-mm-dd" name="from_date" value="<?= $from_date; ?>" autocomplete="off" />
                                    </div>
                                    <div class="col-md-2 form-group mb-4">
                                        <label for="picker1">To Date</label>
                                        <input class="form-control datepicker" id="to_date" placeholder="yyyy-mm-dd" name="to_date" value="<?= $to_date; ?>" autocomplete="off" />
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
                                    <table class="display table table-striped table-bordered" id="exportDataTable" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th class="text-center">SrNo</th>
                                                <th>Name</th>
                                                <th>Email Id</th>
                                                <th>Mobile</th>
                                                <th>Subject</th>
                                                <th class="text-center">Date</th>
                                                <th>Message</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $fetchData = array();
$fetchData = $db->rawQuery("SELECT * FROM ".CONTACT_INQUIRY." WHERE is_deleted = '0' AND is_active = '1' $where ORDER BY contact_inquiry_id DESC");
if(count($fetchData) > 0){
    for($i=0;$i<count($fetchData);$i++){
        $contact_inquiry_id = $fetchData[$i]['contact_inquiry_id'];
                $name = $fetchData[$i]['name'];
                $email_id = $fetchData[$i]['email_id'];
                $mobile = $fetchData[$i]['mobile'];
                $subject = $fetchData[$i]['subject'];
                $message = $fetchData[$i]['message'];
                $contact_inquiry_date = $fetchData[$i]['contact_inquiry_date'];
        ?>
                                            <tr>
                                                <td class="text-center"><?= $i+1; ?></td>
                                                <td><?= $name; ?></td>
                                                <td><?= $email_id; ?></td>
                                                <td><?= $mobile; ?></td>
                                                <td><?= $subject; ?></td>
                                                <td class="text-center"><?= $contact_inquiry_date; ?></td>
                                                <td><?= $message; ?></td>
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
    <script src="./dist-assets/js/plugins/select2.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.print.min.js"></script>
    <script src="./dist-assets/js/plugins/jquery-ui.js"></script>
    <script src="./functions.js"></script>
    <script>
$(document).ready(function() {
    $('.datepicker').datepicker({ 
        dateFormat: 'yy-mm-dd' 
    });
});
$(document).ready(function() {
    $('.select2').select2();
});
function showBigImage(ele){
    var src = $(ele).attr("src");
    $("#popUpModal").modal("show");
    $("#bigImage").attr("src",src);
    }
    </script>
</body>
</html>