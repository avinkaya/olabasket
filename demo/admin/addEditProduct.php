<?php
ob_start();
require_once './api/connection.php';
require_once './api/functions.php';
$where = "";
if(empty($_COOKIE['olabasket_admin_id'])){
    header('Location : login.php');
}
$title = "Product";
$id = "";
$addEditText = "Add";
$fetchData = array();

$status = "";
if(isset($_POST['submit'])){
    $data = addEditProductData($_POST,$_FILES);
    $status = $data['status'];
    $msg = $data['msg'];
    if($status == SCS){
        echo '<script>window.location="product.php";</script>';
    }
}

if(!empty(trim($_GET['id']))){
    $id = base64_decode(trim($_GET['id']));
    $addEditText = "Edit";
    $fetchData = $db->rawQuery("SELECT PM.* FROM ".PRODUCT." PM WHERE PM.product_id = '".$id."'");
}
$product_id = isset($fetchData['0']['product_id']) ? $fetchData['0']['product_id'] : "";
$category_id = isset($fetchData['0']['category_id']) ? $fetchData['0']['category_id'] : "";
$product_short_description = isset($fetchData['0']['product_short_description']) ? $fetchData['0']['product_short_description'] : "";
$product_name = isset($fetchData['0']['product_name']) ? $fetchData['0']['product_name'] : "";
$product_slug = isset($fetchData['0']['product_slug']) ? $fetchData['0']['product_slug'] : "";
$product_image = isset($fetchData['0']['product_image']) ? $fetchData['0']['product_image'] : "";
$is_popular = isset($fetchData['0']['is_popular']) ? $fetchData['0']['is_popular'] : "0";
$product_banner_image = isset($fetchData['0']['product_banner_image']) ? $fetchData['0']['product_banner_image'] : "";
$product_inner_image_1 = isset($fetchData['0']['product_inner_image_1']) ? $fetchData['0']['product_inner_image_1'] : "";
$product_inner_image_2 = isset($fetchData['0']['product_inner_image_2']) ? $fetchData['0']['product_inner_image_2'] : "";
$product_inner_image_3 = isset($fetchData['0']['product_inner_image_3']) ? $fetchData['0']['product_inner_image_3'] : "";
$product_inner_image_4 = isset($fetchData['0']['product_inner_image_4']) ? $fetchData['0']['product_inner_image_4'] : "";
$product_description = isset($fetchData['0']['product_description']) ? $fetchData['0']['product_description'] : "";
$product_video_url = isset($fetchData['0']['product_video_url']) ? $fetchData['0']['product_video_url'] : "";
$product_catalogue = isset($fetchData['0']['product_catalogue']) ? $fetchData['0']['product_catalogue'] : "";
$product_code = isset($fetchData['0']['product_code']) ? $fetchData['0']['product_code'] : "";
$product_index = isset($fetchData['0']['product_index']) ? $fetchData['0']['product_index'] : "";
$is_available = isset($fetchData['0']['is_available']) ? $fetchData['0']['is_available'] : "1";
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
                                    <input type="hidden" name="case" id="case" value="addEditProductData">
                                    <input type="hidden" name="product_id" id="product_id" value="<?= $product_id; ?>">
                                    <div class="form-row">
                                        <div class="form-group col-md-2">
                                            <label>Category</label>
                                            <select id="category_id" name="category_id" class="form-control" required="">
                                                <option selected>Select</option>
                                                <?php
                                                                    $fetchData = array();
$fetchData = $db->rawQuery("SELECT * FROM ".CATEGORY." WHERE is_deleted = '0' AND is_active = '1' ORDER BY category_name ASC");
if(count($fetchData) > 0){
    for($i=0;$i<count($fetchData);$i++){
        $category_id_tmp  = $fetchData[$i]['category_id'];
        $category_name = $fetchData[$i]['category_name'];
        ?>
                                                <option value="<?= $category_id_tmp; ?>" <?php if($category_id_tmp == $category_id){ ?>selected=""<?php } ?>><?= $category_name; ?></option>
                                                    <?php
    }
}
    ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-5">
                                            <label>Name</label>
                                            <input type="text" class="form-control" id="product_name" name="product_name" value="<?= $product_name; ?>" placeholder="" required="">
                                        </div>
                                        <div class="form-group col-md-5">
                                            <label>Slug</label>
                                            <input type="text" class="form-control" id="product_slug" name="product_slug" value="<?= $product_slug; ?>" placeholder="" required="">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-2">
                                            <label>Product Code</label>
                                            <input type="text" class="form-control" id="product_code" name="product_code" value="<?= $product_code; ?>" placeholder="" required="">
                                        </div>
                                        <div class="form-group col-md-1">
                                            <label>Index</label>
                                            <input type="text" class="form-control number" id="product_index" name="product_index" value="<?= $product_index; ?>" placeholder="">
                                        </div>
<!--<div class="form-group col-md-2">
                                            <label>Is Available</label>
                                            <select id="is_available" name="is_available" class="form-control default-select" required="">
                                                <option value="">Select</option>
                                                <option value="1" <?php if($is_available == "1"){ ?>selected=""<?php } ?>>Yes</option>
                                                <option value="0" <?php if($is_available == "0"){ ?>selected=""<?php } ?>>No</option>
                                            </select>
                                        </div>-->
                                        <div class="form-group col-md-2">
                                            <label>Is Popular</label>
                                            <select id="is_popular" name="is_popular" class="form-control default-select" required="">
                                                <option selected>Select</option>
                                                <option value="1" <?php if($is_popular == "1"){ ?>selected=""<?php } ?>>Yes</option>
                                                <option value="0" <?php if($is_popular == "0"){ ?>selected=""<?php } ?>>No</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label>Status</label>
                                            <select id="is_active" name="is_active" class="form-control default-select" required="">
                                                <option value="">Select Status</option>
                                                <option value="1" <?php if($is_active == "1"){ ?>selected=""<?php } ?>>Active</option>
                                                <option value="0" <?php if($is_active == "0"){ ?>selected=""<?php } ?>>In Active</option>
                                            </select>
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
                                        <div class="form-group col-md-2 text-center">
                                            <input type="hidden" id="image" name="product_image">
                                            <img id="imageUrl" class="rounded-circle" width="50px" <?php if(!empty($product_image)){ ?>src="<?= ADMIN_PANEL.$product_image; ?>"<?php } ?>>
                                        </div>
                                        </div>
                                    <div class="form-row">                               
                                        <div class="form-group col-md-12">
                                            <label>Video URL</label>
                                            <input type="url" class="form-control" id="product_video_url" name="product_video_url" value="<?= $product_video_url; ?>">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>Short Description</label>
                                            <textarea class="form-control" rows="2" id="editor" name="product_short_description" placeholder=""><?= $product_short_description; ?></textarea>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>Description</label>
                                            <textarea class="form-control summernote" id="summernote" rows="5" name="product_description" placeholder=""><?= $product_description; ?></textarea>
                                        </div>
                                    </div>
                            </div>
                            </div>
<!--<div class="card mb-4">
<div class="card-body">
                                            <div class="card-title mb-3">Product Catalog</div>
                                            
                                            <div class="form-row">                               
                                        <div class="form-group col-md-4">
                                            <label>Product Catalogue <small>(Only PDF)</small></label>
                                            <input type="file" class="form-control" accept=".pdf" id="doc_fileToUpload" name="doc_fileToUpload" />
                                        </div>
                                        <div class="form-group col-md-2 text-center">
                                            <?php if(!empty($product_catalogue)){
                                                       ?>
                                                    <a href="<?= $product_catalogue; ?>" download>
                                                        <button class="btn btn-info" type="button" style="margin-top: 35px;">Download</button>
                                                    </a>
                                                    <?php
                                                   }?>
                                        </div>
                                            </div>
</div>
</div>-->
<div class="card mb-4">
<div class="card-body">
                                            <div class="card-title mb-3">Product Inner Images</div>
                                            
                                    <div class="form-row">                               
                                        <div class="form-group col-md-4">
                                            <label>Inner Image 1 <small>(2362px * 2362px)</small></label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" id="file_1" name="file_1" class="custom-file-input" accept="image/x-png,image/gif,image/jpeg">
                                                    <label class="custom-file-label">Choose file</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-2 text-center">
                                            <input type="hidden" id="product_inner_image_1" name="product_inner_image_1">
                                            <img id="imageUrl_1" class="rounded-circle" width="75px" <?php if(!empty($product_inner_image_1)){ ?>src="<?= ADMIN_PANEL.$product_inner_image_1; ?>"<?php } ?>>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Inner Image 2 <small>(2362px * 2362px)</small></label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" id="file_2" name="file_2" class="custom-file-input" accept="image/x-png,image/gif,image/jpeg">
                                                    <label class="custom-file-label">Choose file</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-2 text-center">
                                            <input type="hidden" id="product_inner_image_2" name="product_inner_image_2">
                                            <img id="imageUrl_2" class="rounded-circle" width="75px" <?php if(!empty($product_inner_image_2)){ ?>src="<?= ADMIN_PANEL.$product_inner_image_2; ?>"<?php } ?>>
                                        </div>
                                    </div>
                                    <div class="form-row">                               
                                        <div class="form-group col-md-4">
                                            <label>Inner Image 3 <small>(2362px * 2362px)</small></label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" id="file_3" name="file_3" class="custom-file-input" accept="image/x-png,image/gif,image/jpeg">
                                                    <label class="custom-file-label">Choose file</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-2 text-center">
                                            <input type="hidden" id="product_inner_image_3" name="product_inner_image_3">
                                            <img id="imageUrl_3" class="rounded-circle" width="75px" <?php if(!empty($product_inner_image_3)){ ?>src="<?= ADMIN_PANEL.$product_inner_image_3; ?>"<?php } ?>>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Inner Image 4 <small>(2362px * 2362px)</small></label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" id="file_4" name="file_4" class="custom-file-input" accept="image/x-png,image/gif,image/jpeg">
                                                    <label class="custom-file-label">Choose file</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-2 text-center">
                                            <input type="hidden" id="product_inner_image_4" name="product_inner_image_4">
                                            <img id="imageUrl_4" class="rounded-circle" width="75px" <?php if(!empty($product_inner_image_4)){ ?>src="<?= ADMIN_PANEL.$product_inner_image_4; ?>"<?php } ?>>
                                        </div>
                                    </div>
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
       $('#product_name').on('change blur', function() {
            var product_name = this.value;
            if(product_name != ""){
            $('#product_slug').val(convertToSlug(product_name));
        }
});
   });
$(document).ready(function(){
            $("#form").submit(function(e) {
            var formData = $('#form').serialize();
            e.preventDefault(); // avoid to execute the actual submit of the form.
            commonAjaxCall('<?= API_URL; ?>',formData,commonCallback,"product.php");
        });
});
$(document).ready(function(){
$("#file_1").on('change',function(){
   var selectedFile = this.files[0];
   selectedFile.convertToBase64(function(base64){
      $('#product_inner_image_1').val(base64);
      $('#imageUrl_1').show();
      $('#imageUrl_1').attr("src",base64);
   }) 
});
$("#file_2").on('change',function(){
   var selectedFile = this.files[0];
   selectedFile.convertToBase64(function(base64){
      $('#product_inner_image_2').val(base64);
      $('#imageUrl_2').show();
      $('#imageUrl_2').attr("src",base64);
   }) 
});
$("#file_3").on('change',function(){
   var selectedFile = this.files[0];
   selectedFile.convertToBase64(function(base64){
      $('#product_inner_image_3').val(base64);
      $('#imageUrl_3').show();
      $('#imageUrl_3').attr("src",base64);
   }) 
});
$("#file_4").on('change',function(){
   var selectedFile = this.files[0];
   selectedFile.convertToBase64(function(base64){
      $('#product_inner_image_4').val(base64);
      $('#imageUrl_4').show();
      $('#imageUrl_4').attr("src",base64);
   }) 
});
$("#file_b").on('change',function(){
   var selectedFile = this.files[0];
   selectedFile.convertToBase64(function(base64){
      $('#product_banner_image').val(base64);
      $('#imageUrl_b').show();
      $('#imageUrl_b').attr("src",base64);
   }) 
});
});
    </script>
</body>
</html>