<?php
header('Content-Type: application/json; charset=UTF-8');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Methods: POST,GET,OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Content-Range, Content-Disposition, Content-Description');

require_once "./connection.php"; // CONNECTION FILE
require_once "./functions.php"; // FUNCTION FILE

$json = file_get_contents('php://input',true);
// Converts it into a PHP object
$post = json_decode($json,true);
if(empty($post)){
    $post = isset($_REQUEST) ? $_REQUEST : "";
}
// to remove session data.
$postFile = '';
$result = array();
$case = isset($post['case']) ? $post['case'] : "";
$postFile = isset($_FILES) ? $_FILES : "";
if ($case != '' && !empty($post)) {
    switch ($case) {
        case "checkSuperAdminlogin":
            $result = checkSuperAdminlogin($post);
            $jsonData = json_encode($result);
            break;
        
        case "addEditCategoryData":
            $result = addEditCategoryData($post);
            $jsonData = json_encode($result);
            break;
        
        case "removeCategoryData":
            $result = removeCategoryData($post);
            $jsonData = json_encode($result);
            break;
        
        case "submitContactUsInquiry":
            $result = submitContactUsInquiry($post);
            $jsonData = json_encode($result);
            break;
        
        case "addEditTeamData":
            $result = addEditTeamData($post);
            $jsonData = json_encode($result);
            break;

        case "addEditTestimonialData":
            $result = addEditTestimonialData($post);
            $jsonData = json_encode($result);
            break;
        
        case "removeTeamData":
            $result = removeTeamData($post);
            $jsonData = json_encode($result);
            break;
        
        case "addEditGalleryData":
            $result = addEditGalleryData($post);
            $jsonData = json_encode($result);
            break;
        
        case "addEditBrandData":
            $result = addEditBrandData($post);
            $jsonData = json_encode($result);
            break;
        
        case "removeGalleryData":
            $result = removeGalleryData($post);
            $jsonData = json_encode($result);
            break;
        
        case "removeBrandData":
            $result = removeBrandData($post);
            $jsonData = json_encode($result);
            break;

        case "removeTestimonialData":
            $result = removeTestimonialData($post);
            $jsonData = json_encode($result);
            break;
        
        case "removeEventData":
            $result = removeEventData($post);
            $jsonData = json_encode($result);
            break;
        
        case "addEditProductData":
            $result = addEditProductData($post);
            $jsonData = json_encode($result);
            break;
        
        case "addEditEventData":
            $result = addEditEventData($post);
            $jsonData = json_encode($result);
            break;
        
        case "removeProductData":
            $result = removeProductData($post);
            $jsonData = json_encode($result);
            break;
        
        case "updateLabelData":
            $result = updateLabelData($post);
            $jsonData = json_encode($result);
            break;
        
        case "updateSeoData":
            $result = updateSeoData($post);
            $jsonData = json_encode($result);
            break;
        
        default :
            $result = array("status" => FAIL, "msg" => "Please Check Api.");
            $jsonData = json_encode($result);
    }
}else{
    $result = array("status" => FAIL, "msg" => "Please Check Api.");
    $jsonData = json_encode($result);
}
if ($jsonData) {
    echo $jsonData;
} else {
    $result = array('status' => FAIL, "msg" => "No Record Found.");
    echo json_encode($result);
}
?>
