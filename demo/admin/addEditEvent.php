<?php
require_once './api/connection.php';
require_once './api/functions.php';
$where = "";
if(empty($_COOKIE['olabasket_admin_id'])){
    header('Location : login.php');
}
$title = "Event";
$id = "";
$addEditText = "Add";
$fetchData = array();

$status = "";
if(isset($_POST['submit'])){
    $data = addEditEventData($_POST,$_FILES);
    $status = $data['status'];
    $msg = $data['msg'];
    if($status == SCS){
        echo '<script>window.location="event.php";</script>';
    }
}

if(!empty(trim($_GET['id']))){
    $id = base64_decode(trim($_GET['id']));
    $addEditText = "Edit";
    $fetchData = $db->rawQuery("SELECT EM.* FROM ".EVENT." EM WHERE EM.event_id = '".$id."'");
}
$event_id = isset($fetchData['0']['event_id']) ? $fetchData['0']['event_id'] : "";
$event_name = isset($fetchData['0']['event_name']) ? $fetchData['0']['event_name'] : "";
$event_slug = isset($fetchData['0']['event_slug']) ? $fetchData['0']['event_slug'] : "";
$event_image = isset($fetchData['0']['event_image']) ? $fetchData['0']['event_image'] : "";
$event_description = isset($fetchData['0']['event_description']) ? $fetchData['0']['event_description'] : "";
$is_active = isset($fetchData['0']['is_active']) ? $fetchData['0']['is_active'] : "1";
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
    <link rel="stylesheet" href="./dist-assets/css/plugins/select2.min.css" />
    <link rel="stylesheet" href="./dist-assets/css/plugins/jquery-ui.css">
    <link rel="stylesheet" href="./dist-assets/summernote/summernote-bs4.min.css">
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
                            <h1><?= $addEditText; ?> <?= $title; ?></h1>
                            <ul>
                               <li><a href="#"><?= $title ?></a></li>
                               <li><?= $addEditText; ?></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-4 text-right">
                        <button type="button" class="btn btn-danger" onclick="return back();">
                            <i class="i-Arrow-Left-2"></i>
                            BACK
                        </button>
                    </div>
                </div>
                <div class="separator-breadcrumb border-top"></div>
                <div class="row">
                    <div class="col-md-12">
                          
                        <form action="#" id="form" method="post" enctype="multipart/form-data">
                                    <div class="card mb-4">
                            <div class="card-body">
                                    <input type="hidden" name="case" id="case" value="addEditEventData">
                                    <input type="hidden" name="event_id" id="event_id" value="<?= $event_id; ?>">
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label>Name</label>
                                            <input type="text" class="form-control" id="event_name" name="event_name" value="<?= $event_name; ?>" placeholder="Event Name" required="">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Slug</label>
                                            <input type="text" class="form-control" id="event_slug" name="event_slug" value="<?= $event_slug; ?>" placeholder="" required="">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>Main Image <small>(2362px * 2362px)</small></label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" id="file" name="file" class="custom-file-input" accept="image/x-png,image/gif,image/jpeg">
                                                    <label class="custom-file-label">Choose file</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-1 text-center">
                                            <input type="hidden" id="image" name="event_image">
                                            <img id="imageUrl" class="rounded-circle" width="50px" <?php if(!empty($event_image)){ ?>src="<?= ADMIN_PANEL.$event_image; ?>"<?php } ?>>
                                        </div>
                                        </div>
                                    <div class="form-row">                               
                                        <div class="form-group col-md-12">
                                            <label>Description</label>
                                            <textarea class="form-control summernote" id="summernote" rows="5" name="event_description" placeholder=""><?= $event_description; ?></textarea>
                                        </div>
                                    </div>
                            </div>
                            </div>
<div class="card mb-4">
<div class="card-body">
                                    <div class="modal-footer text-left">
                                                    <?php if(!empty($id)){ ?>  
                                        <button type="submit" name="submit" class="btn btn-primary">Update</button>
                                        <?php }else{ ?>
                                                    <button type="submit" name="submit" class="btn btn-primary">Save</button>
                                        <?php } ?>
                                        <button type="reset" class="btn btn-secondary">Reset</button>
                                        </div>
                            </div>
                                    </div>
                                </form>
                                
                        </div>
                    </div>
                </div><!-- end of main-content -->
            <div class="flex-grow-1"></div>
            <?php
                    require_once './footer.php';
            ?>
            <!-- fotter end -->
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
    <script src="./dist-assets/js/plugins/jquery-ui.js"></script>
    <script src="dist-assets/summernote/summernote-bs4.min.js"></script>
    <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/codemirror/3.20.0/codemirror.css">
<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/codemirror/3.20.0/theme/monokai.css">
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/codemirror/3.20.0/codemirror.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/codemirror/3.20.0/mode/xml/xml.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/codemirror/2.36.0/formatting.js"></script>

<!-- Initialize Quill editor -->
<script>
  var editor = new Quill('#editor', {
    modules: { toolbar: '#toolbar' },
    theme: 'snow',
  });
</script>
        

    
    <script src="./functions.js"></script>
    <script>
       $('.summernote').summernote({
  height: 150,   //set editable area's height
  codemirror: { // codemirror options
    theme: 'monokai'
  }
});


        $(document).ready(function() {
       $('.select2').select2();
   });
   function convertToSlug(Text) {
  return Text.toLowerCase()
             .replace(/ /g, '-')
             .replace(/[^\w-]+/g, '');
}
        $(document).ready(function() {
       $('#event_name').on('change blur', function() {
            var event_name = this.value;
            if(event_name != ""){
            $('#event_slug').val(convertToSlug(event_name));
        }
});
   });
$(document).ready(function(){
            $("#form").submit(function(e) {
            var formData = $('#form').serialize();
            e.preventDefault(); // avoid to execute the actual submit of the form.
            commonAjaxCall('<?= API_URL; ?>',formData,commonCallback,"event.php");
        });
});
    </script>
</body>
</html>