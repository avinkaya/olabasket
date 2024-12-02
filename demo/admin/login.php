<?php
require_once './api/connection.php';
require_once './api/functions.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Signin | <?= PROJECT_NAME; ?></title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,400i,600,700,800,900" rel="stylesheet">
    <link href="./dist-assets/css/themes/lite-purple.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./dist-assets/css/plugins/toastr.css" />
</head>
<body>
    <style>
    .select2 {
        width: 100% !important;
        height: 20px !important;
    }
    .select2-container .select2-selection--single {
        height: 34px !important;
    }
.loader {
  width: 100px;
  height: 100px;
  position: fixed;
  z-index: 10000;
  top: 45%;
  left: 48%;
  display: none;
}
</style>
<div class="loader">
    <div class="spinner-glow spinner-glow-primary mr-5" style="font-size: 25px;"></div>
</div>
<div class="auth-layout-wrap" style="background-image: url(./upload/login_banner.jpg)">
    <div class="auth-content" style="min-width: 400px;">
        <div class="card o-hidden">
            <div class="row">
                <div class="col-md-12"> 
                    <div class="p-4">
                        <div class="auth-logo1 text-center mb-4">
                            <img src="./upload/logo.png" alt="<?= PROJECT_NAME; ?>" style="width: 155px;">
                        </div>
                        <h1 class="mb-3 text-18">Login In</h1>
                        <form id="form" method="post">
                            <input type="hidden" name="case" id="case" value="checkSuperAdminlogin">
                            <div class="form-group">
                                <label for="email">User Name</label>
                                <input class="form-control form-control-rounded" id="user_email" name="user_email" type="text" required="">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input class="form-control form-control-rounded" id="user_password" name="user_password" type="password" required="">
                            </div>
                            <br/>
                            <div class="form-group">
                            <button class="btn btn-rounded btn-primary btn-block mt-2">Sign In</button>
                            </div>
                        </form>
<!--                        <div class="mt-3 text-center"><a class="text-muted" href="#">
                                <u>Forgot Password?</u></a></div>-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <script src="./dist-assets/js/plugins/jquery-3.3.1.min.js"></script>
    <script src="./dist-assets/js/plugins/toastr.min.js"></script>
    <script src="./dist-assets/js/scripts/toastr.script.min.js"></script>
    <script src="./functions.js"></script>
       <script>
$(document).ready(function(){
   $("#form").submit(function(e) {
     var formData = $('#form').serialize();
     e.preventDefault(); // avoid to execute the actual submit of the form.
     commonAjaxCall('<?= API_URL; ?>',formData,commonCallback,"login");
   });
});
</script>
<?php
ob_end_flush();
?>
</body>
</html>