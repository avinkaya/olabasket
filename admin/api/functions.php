<?php
function uploadBase64Image($base64Data,$path,$filename){
    $image = trim($base64Data);
    $image_parts = explode(";base64,", $image);
    $image_type_aux = explode("image/", $image_parts[0]);
    $image_type = $image_type_aux[1];
    $image_base64 = base64_decode($image_parts[1]);
    //$file = $path . uniqid() . '-' . time() . $image_type;
    $file = $path . $filename .'.'. $image_type;
    if(file_put_contents('../'.$file, $image_base64)){
         return $file;
    }else{
        //$result = array("status" => FAIL, "msg" => IMAGE_NOT_INSERTED);
        //return $result;
        return "";
    }
}

function formatDate($format = "",$date = ""){
    if(!empty($format) && !empty($date)){
        return date($format, strtotime($date));
    }else{
        return date("Y-m-d");
    }
}

function GetCurrentWeekDates()
{
    if (date('D') != 'Mon') {
        $startdate = date('Y-m-d', strtotime('last Monday'));
    } else {
        $startdate = date('Y-m-d');
    }

//always next saturday
    if (date('D') != 'Sat') {
        $enddate = date('Y-m-d', strtotime('next Saturday'));
    } else {
        $enddate = date('Y-m-d');
    }

    $DateArray = array();
    $timestamp = strtotime($startdate);
    while ($startdate <= $enddate) {
        $startdate = date('Y-m-d', $timestamp);
        $DateArray[] = $startdate;
        $timestamp = strtotime('+1 days', strtotime($startdate));
    }
    return $DateArray;
}

function randomPasswordGenerator($chars){
  $data = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz';
  return substr(str_shuffle($data), 0, $chars);
}

function generateOtp($digits = "4"){
    return rand(1000, 9999);
}

function sendSms($numbers,$message){
    $message = rawurlencode($message);
	$curl = curl_init();
        // Set some options - we are passing in a useragent too here
        curl_setopt_array($curl, [
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => '',
        ]);
        // Send the request & save response to $resp
        $response = curl_exec($curl);
        //print_r($response);die;
        curl_close($curl);
}

function checkSuperAdminlogin($postData){
    global $db;
    $user_email = isset($postData['user_email']) ? $postData['user_email'] : '';
    $user_password = isset($postData['user_password']) ? $postData['user_password'] : '';
    if(empty($user_email)){
        $result = array("status" => FAIL, "msg" => "Plase Enter Valid Mail.");
        return $result;
    }
    if(empty($user_password)){
        $result = array("status" => FAIL, "msg" => "Plase Enter Valid Password.");
        return $result;
    }
    $getData = array();
    $getData = $db->rawQuery("SELECT * FROM ".USER." WHERE is_deleted = '0' AND is_active = '1' AND user_email = '".$user_email."' AND user_password = '".$user_password."'");
    if(count($getData) > 0){
        $user_id = $getData['0']['user_id'];
        $user_name = $getData['0']['user_name'];
        $user_type = "";
        $result = array("status" => SCS, "msg" => LOGIN_SUCCESS, "user_id" => $user_id, "user_name" => $user_name, "user_type" => $user_type,"data" => $getData);
    }else{
        $result = array("status" => FAIL, "msg" => RECORD_NOT_FOUND);
    }
    return $result;
}

function addEditCategoryData($postData){
    global $db;
    $data = array();
    $category_id = isset($postData['category_id']) ? $postData['category_id'] : '';
    $category_name = isset($postData['category_name']) ? $postData['category_name'] : '';
    if(!empty($category_name)){
        if(!empty($category_id)){
            $fetchData = $db->rawQuery("SELECT * FROM ".CATEGORY." WHERE is_deleted = '0' AND category_name = '".$category_name."' AND category_id != '".$category_id."'");
        }else{
            $fetchData = $db->rawQuery("SELECT * FROM ".CATEGORY." WHERE is_deleted = '0' AND category_name = '".$category_name."'");
        }
        if(count($fetchData) > 0){
            $result = array("status" => FAIL, "msg" => "Sorry !!! Category ".$category_name." Is Already Exits.");
            return $result;
        }
    }else{
        $result = array("status" => FAIL, "msg" => "Please Enter Category Name.");
        return $result;
    }
    $is_popular = isset($postData['is_popular']) ? $postData['is_popular'] : '0';
    $category_slug = isset($postData['category_slug']) ? $postData['category_slug'] : '';
    if(!empty($category_slug)){
        if(!empty($category_id)){
            $fetchData = $db->rawQuery("SELECT * FROM ".CATEGORY." WHERE is_deleted = '0' AND category_slug = '".$category_slug."' AND category_id != '".$category_id."'");
        }else{
            $fetchData = $db->rawQuery("SELECT * FROM ".CATEGORY." WHERE is_deleted = '0' AND category_slug = '".$category_slug."'");
        }
        if(count($fetchData) > 0){
            $result = array("status" => FAIL, "msg" => "Sorry !!! Category Slug ".$category_slug." Is Already Exits.");
            return $result;
        }
    }else{
        $result = array("status" => FAIL, "msg" => "Please Enter Category Slug.");
        return $result;
    }
    $category_remark = isset($postData['category_remark']) ? $postData['category_remark'] : '';
    $category_index = isset($postData['category_index']) ? $postData['category_index'] : '';
    $category_image = isset($postData['category_image']) ? $postData['category_image'] : '';
    if(!empty($category_image)){
        $data['category_image'] = uploadBase64Image(trim($category_image),UPLOAD.CATEGORY_IMAGE_FOLDER,"CAT_".time());
    }
    $is_active = isset($postData['is_active']) ? $postData['is_active'] : '1';
    if(!empty($category_id)){
        $data['category_name'] = $category_name;
        $data['is_popular'] = $is_popular;
        $data['category_slug'] = $category_slug;
        $data['category_remark'] = $category_remark;
        $data['category_index'] = (integer)$category_index;
        $data['is_active'] = $is_active;
        $data['is_deleted'] = '0';
        $db->where('category_id', $category_id);
          if ($db->update(CATEGORY, $data)) {
            $result = array("status" => SCS, "msg" => "Category Updated Successfully.");
        } else {
            $result = array("status" => FAIL, "msg" => "Sorry !!! Category Not Updated.");
        }
    }else{
        $data['category_name'] = $category_name;
        $data['is_popular'] = $is_popular;
        $data['category_slug'] = $category_slug;
        $data['category_remark'] = $category_remark;
        $data['category_index'] = (integer)$category_index;
        $data['is_active'] = $is_active;
        $data['is_deleted'] = '0';
        $id = $db->insert(CATEGORY, $data);
        if($id){
            $result = array("status" => SCS, "msg" => "Category Created Successfully.");
        } else {
            $result = array("status" => FAIL, "msg" => "Sorry !!! Category Not Created.");
        }
    }
    return $result;
}

function addEditTestimonialData($postData){
    global $db;
    $data = array();
    $testimonial_id = isset($postData['testimonial_id']) ? $postData['testimonial_id'] : '';
    $testimonial_name = isset($postData['testimonial_name']) ? $postData['testimonial_name'] : '';
    if(!empty($testimonial_name)){
        if(!empty($testimonial_id)){
            $fetchData = $db->rawQuery("SELECT * FROM ".TESTIMONIAL." WHERE is_deleted = '0' AND testimonial_name = '".$testimonial_name."' AND testimonial_id != '".$testimonial_id."'");
        }else{
            $fetchData = $db->rawQuery("SELECT * FROM ".TESTIMONIAL." WHERE is_deleted = '0' AND testimonial_name = '".$testimonial_name."'");
        }
        if(count($fetchData) > 0){
            $result = array("status" => FAIL, "msg" => "Sorry !!! Testimonial ".$testimonial_name." Is Already Exits.");
            return $result;
        }
    }else{
        $result = array("status" => FAIL, "msg" => "Please Enter Testimonial Name.");
        return $result;
    }
    $testimonial_short_description = isset($postData['testimonial_short_description']) ? $postData['testimonial_short_description'] : '';
    $testimonial_description = isset($postData['testimonial_description']) ? $postData['testimonial_description'] : '';
    $testimonial_index = isset($postData['testimonial_index']) ? $postData['testimonial_index'] : '';
    $testimonial_image = isset($postData['testimonial_image']) ? $postData['testimonial_image'] : '';
    if(!empty($testimonial_image)){
        $data['testimonial_image'] = uploadBase64Image(trim($testimonial_image),UPLOAD.TESTIMONIAL_IMAGE_FOLDER,"TESTIMONIAL_".time());
    }
    $is_active = isset($postData['is_active']) ? $postData['is_active'] : '1';
    if(!empty($testimonial_id)){
        $data['testimonial_name'] = $testimonial_name;
        $data['testimonial_short_description'] = $testimonial_short_description;
        $data['testimonial_description'] = $testimonial_description;
        $data['testimonial_index'] = (integer)$testimonial_index;
        $data['is_active'] = $is_active;
        $data['is_deleted'] = '0';
        $db->where('testimonial_id', $testimonial_id);
          if ($db->update(TESTIMONIAL, $data)) {
            $result = array("status" => SCS, "msg" => "Testimonial Updated Successfully.");
        } else {
            $result = array("status" => FAIL, "msg" => "Sorry !!! Testimonial Not Updated.");
        }
    }else{
        $data['testimonial_name'] = $testimonial_name;
        $data['testimonial_short_description'] = $testimonial_short_description;
        $data['testimonial_description'] = $testimonial_description;
        $data['testimonial_index'] = (integer)$testimonial_index;
        $data['is_active'] = $is_active;
        $data['is_deleted'] = '0';
        $id = $db->insert(TESTIMONIAL, $data);
        if($id){
            $result = array("status" => SCS, "msg" => "Testimonial Created Successfully.");
        } else {
            $result = array("status" => FAIL, "msg" => "Sorry !!! Testimonial Not Created.");
        }
    }
    return $result;
}

function addEditBrandData($postData){
    global $db;
    $data = array();
    $brand_id = isset($postData['brand_id']) ? $postData['brand_id'] : '';
    $brand_name = isset($postData['brand_name']) ? $postData['brand_name'] : '';
    if(!empty($brand_name)){
        if(!empty($brand_id)){
            $fetchData = $db->rawQuery("SELECT * FROM ".BRAND." WHERE is_deleted = '0' AND brand_name = '".$brand_name."' AND brand_id != '".$brand_id."'");
        }else{
            $fetchData = $db->rawQuery("SELECT * FROM ".BRAND." WHERE is_deleted = '0' AND brand_name = '".$brand_name."'");
        }
        if(count($fetchData) > 0){
            $result = array("status" => FAIL, "msg" => "Sorry !!! Brand ".$brand_name." Is Already Exits.");
            return $result;
        }
    }else{
        $result = array("status" => FAIL, "msg" => "Please Enter Brand Name.");
        return $result;
    }
    $brand_image = isset($postData['brand_image']) ? $postData['brand_image'] : '';
    if(!empty($brand_image)){
        $data['brand_image'] = uploadBase64Image(trim($brand_image),UPLOAD.BRAND_IMAGE_FOLDER,"BRAND_".time());
    }
    $brand_redirect_url = isset($postData['brand_redirect_url']) ? $postData['brand_redirect_url'] : '';
    $is_active = isset($postData['is_active']) ? $postData['is_active'] : '1';
    if(!empty($brand_id)){
        $data['brand_name'] = $brand_name;
        $data['brand_redirect_url'] = $brand_redirect_url;
        $data['is_active'] = $is_active;
        $data['is_deleted'] = '0';
        $db->where('brand_id', $brand_id);
          if ($db->update(BRAND, $data)) {
            $result = array("status" => SCS, "msg" => "Brand Updated Successfully.");
        } else {
            $result = array("status" => FAIL, "msg" => "Sorry !!! Brand Not Updated.");
        }
    }else{
        $data['brand_name'] = $brand_name;
        $data['brand_redirect_url'] = $brand_redirect_url;
        $data['is_active'] = $is_active;
        $data['is_deleted'] = '0';
        $id = $db->insert(BRAND, $data);
        if($id){
            $result = array("status" => SCS, "msg" => "Brand Created Successfully.");
        } else {
            $result = array("status" => FAIL, "msg" => "Sorry !!! Brand Not Created.");
        }
    }
    return $result;
}

function addEditGalleryData($postData){
    global $db;
    $data = array();
    $gallery_id = isset($postData['gallery_id']) ? $postData['gallery_id'] : '';
    $gallery_title = isset($postData['gallery_title']) ? $postData['gallery_title'] : '';
    if(!empty($gallery_title)){
        if(!empty($gallery_id)){
            $fetchData = $db->rawQuery("SELECT * FROM ".GALLERY." WHERE is_deleted = '0' AND gallery_title = '".$gallery_title."' AND gallery_id != '".$gallery_id."'");
        }else{
            $fetchData = $db->rawQuery("SELECT * FROM ".GALLERY." WHERE is_deleted = '0' AND gallery_title = '".$gallery_title."'");
        }
        if(count($fetchData) > 0){
            $result = array("status" => FAIL, "msg" => "Sorry !!! Gallery ".$gallery_title." Is Already Exits.");
            return $result;
        }
    }else{
        $result = array("status" => FAIL, "msg" => "Please Enter Gallery Title.");
        return $result;
    }
    $gallery_image = isset($postData['gallery_image']) ? $postData['gallery_image'] : '';
    if(!empty($gallery_image)){
        $data['gallery_image'] = uploadBase64Image(trim($gallery_image),UPLOAD.GALLERY_IMAGE_FOLDER,"GAL_".time());
    }
    $gallery_index = isset($postData['gallery_index']) ? $postData['gallery_index'] : '';
    $is_active = isset($postData['is_active']) ? $postData['is_active'] : '1';
    if(!empty($gallery_id)){
        $data['gallery_title'] = $gallery_title;
        $data['gallery_index'] = (integer)$gallery_index;
        $data['is_active'] = $is_active;
        $data['is_deleted'] = '0';
        $db->where('gallery_id', $gallery_id);
          if ($db->update(GALLERY, $data)) {
            $result = array("status" => SCS, "msg" => "Gallery Updated Successfully.");
        } else {
            $result = array("status" => FAIL, "msg" => "Sorry !!! Gallery Not Updated.");
        }
    }else{
        $data['gallery_title'] = $gallery_title;
        $data['gallery_index'] = (integer)$gallery_index;
        $data['is_active'] = $is_active;
        $data['is_deleted'] = '0';
        $id = $db->insert(GALLERY, $data);
        if($id){
            $result = array("status" => SCS, "msg" => "Gallery Created Successfully.");
        } else {
            $result = array("status" => FAIL, "msg" => "Sorry !!! Gallery Not Created.");
        }
    }
    return $result;
}

function addEditTeamData($postData){
    global $db;
    $data = array();
    $team_id = isset($postData['team_id']) ? $postData['team_id'] : '';
    $team_name = isset($postData['team_name']) ? $postData['team_name'] : '';
    if(!empty($team_name)){
        if(!empty($team_id)){
            $fetchData = $db->rawQuery("SELECT * FROM ".TEAM." WHERE is_deleted = '0' AND team_name = '".$team_name."' AND team_id != '".$team_id."'");
        }else{
            $fetchData = $db->rawQuery("SELECT * FROM ".TEAM." WHERE is_deleted = '0' AND team_name = '".$team_name."'");
        }
        if(count($fetchData) > 0){
            $result = array("status" => FAIL, "msg" => "Sorry !!! Team ".$team_name." Is Already Exits.");
            return $result;
        }
    }else{
        $result = array("status" => FAIL, "msg" => "Please Enter Team Name.");
        return $result;
    }
    $team_designation = isset($postData['team_designation']) ? $postData['team_designation'] : '';
    $team_remark = isset($postData['team_remark']) ? $postData['team_remark'] : '';
    $team_image = isset($postData['team_image']) ? $postData['team_image'] : '';
    if(!empty($team_image)){
        $data['team_image'] = uploadBase64Image(trim($team_image),UPLOAD.TEAM_IMAGE_FOLDER,"TEAM_".time());
    }
    $is_active = isset($postData['is_active']) ? $postData['is_active'] : '1';
    if(!empty($team_id)){
        $data['team_name'] = $team_name;
        $data['team_designation'] = $team_designation;
        $data['team_remark'] = $team_remark;
        $data['is_active'] = $is_active;
        $data['is_deleted'] = '0';
        $db->where('team_id', $team_id);
          if ($db->update(TEAM, $data)) {
            $result = array("status" => SCS, "msg" => "Team Updated Successfully.");
        } else {
            $result = array("status" => FAIL, "msg" => "Sorry !!! Team Not Updated.");
        }
    }else{
        $data['team_name'] = $team_name;
        $data['team_designation'] = $team_designation;
        $data['team_remark'] = $team_remark;
        $data['is_active'] = $is_active;
        $data['is_deleted'] = '0';
        $id = $db->insert(TEAM, $data);
        if($id){
            $result = array("status" => SCS, "msg" => "Team Created Successfully.");
        } else {
            $result = array("status" => FAIL, "msg" => "Sorry !!! Team Not Created.");
        }
    }
    return $result;
}

function addEditEventData($postData){
    global $db;
    $data = array();
    $event_id = isset($postData['event_id']) ? $postData['event_id'] : '';
    $event_name = isset($postData['event_name']) ? $postData['event_name'] : '';
    if(!empty($event_name)){
        if(!empty($event_id)){
            $fetchData = $db->rawQuery("SELECT * FROM ".EVENT." WHERE is_deleted = '0' AND event_name = '".$event_name."' AND event_id != '".$event_id."'");
        }else{
            $fetchData = $db->rawQuery("SELECT * FROM ".EVENT." WHERE is_deleted = '0' AND event_name = '".$event_name."'");
        }
        if(count($fetchData) > 0){
            $result = array("status" => FAIL, "msg" => "Sorry !!! Event ".$event_name." Is Already Exits.");
            return $result;
        }
    }else{
        $result = array("status" => FAIL, "msg" => "Please Enter Event Name.");
        return $result;
    }
    $event_slug = isset($postData['event_slug']) ? $postData['event_slug'] : '';
    $event_description = isset($postData['event_description']) ? $postData['event_description'] : '';
    $event_image = isset($postData['event_image']) ? $postData['event_image'] : '';
    if(!empty($event_image)){
        $data['event_image'] = uploadBase64Image(trim($event_image),UPLOAD.EVENT_IMAGE_FOLDER,"EVENT_".time());
    }
    $is_active = isset($postData['is_active']) ? $postData['is_active'] : '1';
    if(!empty($event_id)){
        $data['event_name'] = $event_name;
        $data['event_slug'] = $event_slug;
        $data['event_description'] = $event_description;
        $data['is_active'] = $is_active;
        $data['is_deleted'] = '0';
        $db->where('event_id', $event_id);
          if ($db->update(EVENT, $data)) {
            $result = array("status" => SCS, "msg" => "Event Updated Successfully.");
        } else {
            $result = array("status" => FAIL, "msg" => "Sorry !!! Event Not Updated.");
        }
    }else{
        $data['event_name'] = $event_name;
        $data['event_slug'] = $event_slug;
        $data['event_description'] = $event_description;
        $data['event_date'] = date("Y-m-d");
        $data['event_time'] = date("H:i:s");
        $data['is_active'] = $is_active;
        $data['is_deleted'] = '0';
        $id = $db->insert(EVENT, $data);
        if($id){
            $result = array("status" => SCS, "msg" => "Event Created Successfully.");
        } else {
            $result = array("status" => FAIL, "msg" => "Sorry !!! Event Not Created.");
        }
    }
    return $result;
}

function updateLabelData($postData){
    global $db;
    $data = array();
    $label_id = isset($postData['label_id']) ? $postData['label_id'] : '';
    $label_name = isset($postData['label_name']) ? $postData['label_name'] : '';
    if(empty($label_name)){
        $result = array("status" => FAIL, "msg" => "Please Enter Label Name.");
        return $result;
    }
    $label_value_EN = isset($postData['label_value_EN']) ? $postData['label_value_EN'] : '';
    if(empty($label_value_EN)){
        $result = array("status" => FAIL, "msg" => "Please Enter Label Value EN.");
        return $result;
    }
    $label_value_IN = isset($postData['label_value_IN']) ? $postData['label_value_IN'] : '';
    if(empty($label_value_IN)){
        $result = array("status" => FAIL, "msg" => "Please Enter Label Value IN.");
        return $result;
    }
    $label_value_AR = isset($postData['label_value_AR']) ? $postData['label_value_AR'] : '';
    if(empty($label_value_AR)){
        $result = array("status" => FAIL, "msg" => "Please Enter Label Value AR.");
        return $result;
    }
    if(!empty($label_id)){
        $data['label_name'] = $label_name;
        $data['label_value_EN'] = $label_value_EN;
        $data['label_value_IN'] = $label_value_IN;
        $data['label_value_AR'] = $label_value_AR;
        $db->where('label_id', $label_id);
          if ($db->update(LABEL, $data)) {
            $result = array("status" => SCS, "msg" => "Label Updated Successfully.");
        } else {
            $result = array("status" => FAIL, "msg" => "Sorry !!! Label Not Updated.");
        }
    }else{
        $result = array("status" => FAIL, "msg" => "Enter Valid Details.");
    }
    return $result;
}

function updateSeoData($postData){
    global $db;
    $data = array();
    $seo_id = isset($postData['seo_id']) ? $postData['seo_id'] : '';
    $meta_title = isset($postData['meta_title']) ? $postData['meta_title'] : '';
    if(empty($meta_title)){
        $result = array("status" => FAIL, "msg" => "Please Enter Meta Title.");
        return $result;
    }
    $meta_description = isset($postData['meta_description']) ? $postData['meta_description'] : '';
    if(empty($meta_description)){
        $result = array("status" => FAIL, "msg" => "Please Enter Meta Description.");
        return $result;
    }
    $meta_keywords = isset($postData['meta_keywords']) ? $postData['meta_keywords'] : '';
    if(empty($meta_keywords)){
        $result = array("status" => FAIL, "msg" => "Please Enter Meta Keywords.");
        return $result;
    }
    if(!empty($seo_id)){
        $data['meta_title'] = $meta_title;
        $data['meta_description'] = $meta_description;
        $data['meta_keywords'] = $meta_keywords;
        $db->where('seo_id', $seo_id);
          if ($db->update(SEO, $data)) {
            $result = array("status" => SCS, "msg" => "SEO Details Updated Successfully.");
        } else {
            $result = array("status" => FAIL, "msg" => "Sorry !!! SEO Details Not Updated.");
        }
    }else{
        $result = array("status" => FAIL, "msg" => "Enter Valid Details.");
    }
    return $result;
}

function addEditCategoryData66($postData){
    global $db;
    $data = array();
    $category_id = isset($postData['category_id']) ? $postData['category_id'] : '';
    $vehicle_type_id = isset($postData['vehicle_type_id']) ? $postData['vehicle_type_id'] : '';
    if(empty($vehicle_type_id)){
        $result = array("status" => FAIL, "msg" => "Please Select Vehicle Type.");
        return $result;
    }
    $vehicle_company = isset($postData['vehicle_company']) ? $postData['vehicle_company'] : '';
    if(empty($vehicle_company)){
        $result = array("status" => FAIL, "msg" => "Please Select Vehicle Company.");
        return $result;
    }
    $vehicle_model = isset($postData['vehicle_model']) ? $postData['vehicle_model'] : '';
    $vehicle_number = isset($postData['vehicle_number']) ? $postData['vehicle_number'] : '';
    if(!empty($vehicle_number)){
        if(!empty($vehicle_id)){
            $getData = $db->rawQuery("SELECT * FROM ".VEHICLE." WHERE is_deleted = '0' AND vehicle_type_id = '".$vehicle_type_id."' AND vehicle_company = '".$vehicle_company."' AND vehicle_number = '".$vehicle_number."' AND vehicle_id != '".$vehicle_id."'");
        }else{
            $getData = $db->rawQuery("SELECT * FROM ".VEHICLE." WHERE is_deleted = '0' AND vehicle_type_id = '".$vehicle_type_id."' AND vehicle_company = '".$vehicle_company."' AND vehicle_number = '".$vehicle_number."'");
        }
        if(count($getData) > 0){
            $result = array("status" => FAIL, "msg" => "Sorry !!! Vehicle ".$vehicle_number." Is Already Exits.");
            return $result;
        }
    }else{
        $result = array("status" => FAIL, "msg" => "Please Enter Vehicle Number.");
        return $result;
    }
    $vehicle_image = isset($postData['vehicle_image']) ? $postData['vehicle_image'] : '';
    if(!empty($vehicle_image)){
        $data['vehicle_image'] = uploadBase64Image(trim($vehicle_image),UPLOAD.VEHICLE_IMAGE_FOLDER,"VEHICLE-".time());
    }
    $is_active = isset($postData['is_active']) ? $postData['is_active'] : '1';
    if(!empty($category_id)){
        $data['vehicle_type_id'] = (integer)$vehicle_type_id;
        $data['vehicle_company'] = $vehicle_company;
        $data['vehicle_model'] = $vehicle_model;
        $data['vehicle_number'] = $vehicle_number;
        $data['is_active'] = $is_active;
        $data['is_deleted'] = '0';
        $db->where('category_id', $category_id);
          if ($db->update(CATEGORY, $data)) {
            $result = array("status" => SCS, "msg" => "Category Updated Successfully.");
        } else {
            $result = array("status" => FAIL, "msg" => "Sorry !!! Category Not Updated.");
        }
    }else{
        $data['vehicle_type_id'] = (integer)$vehicle_type_id;
        $data['vehicle_company'] = $vehicle_company;
        $data['vehicle_model'] = $vehicle_model;
        $data['vehicle_number'] = $vehicle_number;
        $data['is_active'] = $is_active;
        $data['is_deleted'] = '0';
        $id = $db->insert(CATEGORY, $data);
        if($id){
            $result = array("status" => SCS, "msg" => "Category Created Successfully.");
        } else {
            $result = array("status" => FAIL, "msg" => "Sorry !!! Category Not Created.");
        }
    }
    return $result;
}

function addEditProductData($postData){
    global $db;
    $data = array();
    $product_id = isset($postData['product_id']) ? $postData['product_id'] : '';
    $category_id = isset($postData['category_id']) ? $postData['category_id'] : '';
    if(empty($category_id)){
        $result = array("status" => FAIL, "msg" => "Please Select Category First.");
        return $result;
    }
    $product_name = isset($postData['product_name']) ? $postData['product_name'] : '';
    if(!empty($product_name)){
//        if(!empty($product_id)){
//            $fetchData = $db->rawQuery("SELECT * FROM ".PRODUCT." WHERE is_deleted = '0' AND category_id = '".$category_id."' AND product_name = '".$product_name."' AND product_id != '".$product_id."'");
//        }else{
//            $fetchData = $db->rawQuery("SELECT * FROM ".PRODUCT." WHERE is_deleted = '0' AND category_id = '".$category_id."' AND product_name = '".$product_name."'");
//        }
//        if(count($fetchData) > 0){
//            $result = array("status" => FAIL, "msg" => "Sorry !!! Product ".$product_name." Is Already Exits.");
//            return $result;
//        }
    }else{
        $result = array("status" => FAIL, "msg" => "Please Enter Product Name.");
        return $result;
    }
    $product_slug = isset($postData['product_slug']) ? $postData['product_slug'] : '';
    if(!empty($product_slug)){
        if(!empty($product_id)){
            $fetchData = $db->rawQuery("SELECT * FROM ".PRODUCT." WHERE is_deleted = '0' AND category_id = '".$category_id."' AND product_slug = '".$product_slug."' AND product_id != '".$product_id."'");
        }else{
            $fetchData = $db->rawQuery("SELECT * FROM ".PRODUCT." WHERE is_deleted = '0' AND category_id = '".$category_id."' AND product_slug = '".$product_slug."'");
        }
        if(count($fetchData) > 0){
            $result = array("status" => FAIL, "msg" => "Sorry !!! Product Slug ".$product_slug." Is Already Exits.");
            return $result;
        }
    }else{
        $result = array("status" => FAIL, "msg" => "Please Enter Product Slug.");
        return $result;
    }
    $product_code = isset($postData['product_code']) ? $postData['product_code'] : '';
    if(!empty($product_code)){
        if(!empty($product_id)){
            $fetchData = $db->rawQuery("SELECT * FROM ".PRODUCT." WHERE is_deleted = '0' AND category_id = '".$category_id."' AND product_code = '".$product_code."' AND product_id != '".$product_id."'");
        }else{
            $fetchData = $db->rawQuery("SELECT * FROM ".PRODUCT." WHERE is_deleted = '0' AND category_id = '".$category_id."' AND product_code = '".$product_code."'");
        }
        if(count($fetchData) > 0){
            $result = array("status" => FAIL, "msg" => "Sorry !!! Product Code ".$product_code." Is Already Exits.");
            return $result;
        }
    }else{
        $result = array("status" => FAIL, "msg" => "Please Enter Product Code.");
        return $result;
    }
    $product_index = isset($postData['product_index']) ? $postData['product_index'] : '';
    $is_popular = isset($postData['is_popular']) ? $postData['is_popular'] : '0';
    $product_short_description = isset($postData['product_short_description']) ? $postData['product_short_description'] : '';
    $product_description = isset($postData['product_description']) ? $postData['product_description'] : '';
    $product_video_url = isset($postData['product_video_url']) ? $postData['product_video_url'] : '';
    $product_image = isset($postData['product_image']) ? $postData['product_image'] : '';
    if(!empty($product_image)){
        $data['product_image'] = uploadBase64Image(trim($product_image),UPLOAD.PRODUCT_IMAGE_FOLDER,"PRODUCT-".time());
    }
    $product_inner_image_1 = isset($postData['product_inner_image_1']) ? $postData['product_inner_image_1'] : '';
    if(!empty($product_inner_image_1)){
        $data['product_inner_image_1'] = uploadBase64Image(trim($product_inner_image_1),UPLOAD.PRODUCT_IMAGE_FOLDER,"PRO_INN_1-".time());
    }
    $product_inner_image_2 = isset($postData['product_inner_image_2']) ? $postData['product_inner_image_2'] : '';
    if(!empty($product_inner_image_2)){
        $data['product_inner_image_2'] = uploadBase64Image(trim($product_inner_image_2),UPLOAD.PRODUCT_IMAGE_FOLDER,"PRO_INN_2-".time());
    }
    $product_inner_image_3 = isset($postData['product_inner_image_3']) ? $postData['product_inner_image_3'] : '';
    if(!empty($product_inner_image_3)){
        $data['product_inner_image_3'] = uploadBase64Image(trim($product_inner_image_3),UPLOAD.PRODUCT_IMAGE_FOLDER,"PRO_INN_3-".time());
    }
    $product_inner_image_4 = isset($postData['product_inner_image_4']) ? $postData['product_inner_image_4'] : '';
    if(!empty($product_inner_image_4)){
        $data['product_inner_image_4'] = uploadBase64Image(trim($product_inner_image_4),UPLOAD.PRODUCT_IMAGE_FOLDER,"PRO_INN_4-".time());
    }
    $product_banner_image = isset($postData['product_banner_image']) ? $postData['product_banner_image'] : '';
    if(!empty($product_banner_image)){
        $data['product_banner_image'] = uploadBase64Image(trim($product_banner_image),UPLOAD.PRODUCT_IMAGE_FOLDER,"PRO_BANNER-".time());
    }
    if(!empty($_FILES['doc_fileToUpload']['name'])){
        $pathFolder = "./".UPLOAD.PRODUCT_IMAGE_FOLDER;
        $fileName = "CAT_" . time() . '_' . basename( $_FILES['doc_fileToUpload']['name']);
        if(move_uploaded_file($_FILES['doc_fileToUpload']['tmp_name'], $pathFolder.$fileName)) {
          $data['product_catalogue'] = UPLOAD.PRODUCT_IMAGE_FOLDER.$fileName;
        }
    }
    $is_active = isset($postData['is_active']) ? $postData['is_active'] : '1';
    $is_available = isset($postData['is_available']) ? $postData['is_available'] : '0';
    if(!empty($product_id)){
        $data['category_id'] = (integer)$category_id;
        $data['product_name'] = $product_name;
        $data['product_slug'] = $product_slug;
        $data['product_code'] = $product_code;
        $data['product_index'] = (integer)$product_index;
        $data['product_short_description'] = $product_short_description;
        $data['product_description'] = $product_description;
        $data['product_video_url'] = $product_video_url;
        $data['is_popular'] = $is_popular;
        $data['is_available'] = $is_available;
        $data['is_active'] = $is_active;
        $data['is_deleted'] = '0';
        $data['update_time'] = time();
        $db->where('product_id', $product_id);
          if ($db->update(PRODUCT, $data)) {
            $result = array("status" => SCS, "msg" => "Product Updated Successfully.");
        } else {
            $result = array("status" => FAIL, "msg" => "Sorry !!! Product Not Updated.");
        }
    }else{
        $data['category_id'] = (integer)$category_id;
        $data['product_name'] = $product_name;
        $data['product_slug'] = $product_slug;
        $data['product_code'] = $product_code;
        $data['product_index'] = (integer)$product_index;
        $data['product_short_description'] = $product_short_description;
        $data['product_description'] = $product_description;
        $data['product_video_url'] = $product_video_url;
        $data['is_popular'] = $is_popular;
        $data['is_available'] = $is_available;
        $data['is_active'] = $is_active;
        $data['is_deleted'] = '0';
        $data['insert_time'] = time();
        $data['update_time'] = time();
        $id = $db->insert(PRODUCT, $data);
        if($id){
            $result = array("status" => SCS, "msg" => "Product Created Successfully.");
        } else {
            $result = array("status" => FAIL, "msg" => "Sorry !!! New Product Not Created.");
        }
    }
    return $result;
}

function removeCategoryData($postData){
    global $db;
    $category_id = isset($postData['category_id']) ? $postData['category_id'] : '';
    if(!empty($category_id)){
        $data = [
            'is_deleted' => '1'
        ];
        $db->where('category_id', $category_id);
        if ($db->update(CATEGORY, $data)) {
            $result = array("status" => SCS, "msg" => RECORD_DELETED);
        }else{
            $result = array("status" => FAIL, "msg" => RECORD_NOT_DELETED);
        }
    }else{
        $result = array("status" => FAIL, "msg" => ENTER_VALID_DETAILS);
    }
    return $result;
}

function removeEventData($postData){
    global $db;
    $event_id = isset($postData['event_id']) ? $postData['event_id'] : '';
    if(!empty($event_id)){
        $data = [
            'is_deleted' => '1'
        ];
        $db->where('event_id', $event_id);
        if ($db->update(EVENT, $data)) {
            $result = array("status" => SCS, "msg" => RECORD_DELETED);
        }else{
            $result = array("status" => FAIL, "msg" => RECORD_NOT_DELETED);
        }
    }else{
        $result = array("status" => FAIL, "msg" => ENTER_VALID_DETAILS);
    }
    return $result;
}

function removeGalleryData($postData){
    global $db;
    $gallery_id = isset($postData['gallery_id']) ? $postData['gallery_id'] : '';
    if(!empty($gallery_id)){
        $data = [
            'is_deleted' => '1'
        ];
        $db->where('gallery_id', $gallery_id);
        if ($db->update(GALLERY, $data)) {
            $result = array("status" => SCS, "msg" => RECORD_DELETED);
        }else{
            $result = array("status" => FAIL, "msg" => RECORD_NOT_DELETED);
        }
    }else{
        $result = array("status" => FAIL, "msg" => ENTER_VALID_DETAILS);
    }
    return $result;
}

function removeBrandData($postData){
    global $db;
    $brand_id = isset($postData['brand_id']) ? $postData['brand_id'] : '';
    if(!empty($brand_id)){
        $data = [
            'is_deleted' => '1'
        ];
        $db->where('brand_id', $brand_id);
        if ($db->update(BRAND, $data)) {
            $result = array("status" => SCS, "msg" => RECORD_DELETED);
        }else{
            $result = array("status" => FAIL, "msg" => RECORD_NOT_DELETED);
        }
    }else{
        $result = array("status" => FAIL, "msg" => ENTER_VALID_DETAILS);
    }
    return $result;
}

function removeTestimonialData($postData){
    global $db;
    $testimonial_id = isset($postData['testimonial_id']) ? $postData['testimonial_id'] : '';
    if(!empty($testimonial_id)){
        $data = [
            'is_deleted' => '1'
        ];
        $db->where('testimonial_id', $testimonial_id);
        if ($db->update(TESTIMONIAL, $data)) {
            $result = array("status" => SCS, "msg" => RECORD_DELETED);
        }else{
            $result = array("status" => FAIL, "msg" => RECORD_NOT_DELETED);
        }
    }else{
        $result = array("status" => FAIL, "msg" => ENTER_VALID_DETAILS);
    }
    return $result;
}

function removeProductData($postData){
    global $db;
    $product_id = isset($postData['product_id']) ? $postData['product_id'] : '';
    if(!empty($product_id)){
        $data = [
            'is_deleted' => '1'
        ];
        $db->where('product_id', $product_id);
        if ($db->update(PRODUCT, $data)) {
            $result = array("status" => SCS, "msg" => RECORD_DELETED);
        }else{
            $result = array("status" => FAIL, "msg" => RECORD_NOT_DELETED);
        }
    }else{
        $result = array("status" => FAIL, "msg" => ENTER_VALID_DETAILS);
    }
    return $result;
}

function removeTeamData($postData){
    global $db;
    $team_id = isset($postData['team_id']) ? $postData['team_id'] : '';
    if(!empty($team_id)){
        $data = [
            'is_deleted' => '1'
        ];
        $db->where('team_id', $team_id);
        if ($db->update(TEAM, $data)) {
            $result = array("status" => SCS, "msg" => RECORD_DELETED);
        }else{
            $result = array("status" => FAIL, "msg" => RECORD_NOT_DELETED);
        }
    }else{
        $result = array("status" => FAIL, "msg" => ENTER_VALID_DETAILS);
    }
    return $result;
}

function submitContactUsInquiry($postData){
    global $db;
    $data = array();
    $contact_inquiry_id = isset($postData['contact_inquiry_id']) ? $postData['contact_inquiry_id'] : '';
    $name = isset($postData['name']) ? $postData['name'] : '';
    if(empty($name)){
        $result = array("status" => FAIL, "msg" => "Please Enter Name.");
        return $result;
    }
    $mobile = isset($postData['mobile']) ? $postData['mobile'] : '';
    if(empty($mobile)){
        $result = array("status" => FAIL, "msg" => "Please Enter Number.");
        return $result;
    }
    $email_id = isset($postData['email_id']) ? $postData['email_id'] : "";
    $subject = isset($postData['subject']) ? $postData['subject'] : "";
    $message = isset($postData['message']) ? $postData['message'] : "";
    $contact_inquiry_date = isset($postData['contact_inquiry_date']) ? $postData['contact_inquiry_date'] : date("Y-m-d");
    $is_active = isset($postData['is_active']) ? $postData['is_active'] : '1';
    if(!empty($contact_inquiry_id)){
        $data['name'] = $name;
        $data['email_id'] = $email_id;
        $data['mobile'] = $mobile;
        $data['subject'] = $subject;
        $data['message'] = $message;
        $data['contact_inquiry_date'] = $contact_inquiry_date;
        $data['is_active'] = $is_active;
        $data['is_deleted'] = '0';
        $data['update_time'] = time();
        $db->where('contact_inquiry_id', $contact_inquiry_id);
          if ($db->update(CONTACT_INQUIRY, $data)) {
            $result = array("status" => SCS, "msg" => "Inquiry Updated Successfully.");
        } else {
            $result = array("status" => FAIL, "msg" => "Sorry !!! Inquiry Not Updated.");
        }
    }else{
        $data['name'] = $name;
        $data['email_id'] = $email_id;
        $data['mobile'] = $mobile;
        $data['subject'] = $subject;
        $data['message'] = $message;
        $data['contact_inquiry_date'] = $contact_inquiry_date;
        $data['is_active'] = $is_active;
        $data['is_deleted'] = '0';
        $data['insert_time'] = time();
        $data['update_time'] = time();
        $id = $db->insert(CONTACT_INQUIRY, $data);
        if($id){
            $to = 'info@olabasket.com';
            $subject = 'Olabasket Website Inquiry';
            $headers  = "From: " . strip_tags($email_id) . "\r\n";
            $headers .= "Reply-To: " . strip_tags($email_id) . "\r\n";
            $headers .= "CC: jigarpatel.comp786@gmail.com\r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
            $message = '';
            $message .= '<h3>Dear Olabasket admin,<h3>';
            $message .= '<p>Currently there is a new inquiry that has entered the olabasket website with the following message:</p>';
            $message .= 'Full Name : '.$name;
            $message .= 'Email Address : '.$email_id;
            $message .= 'Phone Number : '.$mobile;
            $message .= 'Subject : '.$subject;
            $message .= 'message : '.$message;
            $message .= '<p>You can contact the customer via the contact above to answer the customers inquiry.</p>';
            $message .= '<p>Thanks</p>';
            mail($to, $subject, $message, $headers);

            $result = array("status" => SCS, "msg" => "Your Inquiry Submitted Successfully.");
        } else {
            $result = array("status" => FAIL, "msg" => "Sorry !!! Your Inquiry Not Submitted.");
        }
    }
    return $result;
}
function sendMail(){
    $to = 'bob@example.com';

$subject = 'Website Change Request';

$headers  = "From: " . strip_tags($_POST['req-email']) . "\r\n";
$headers .= "Reply-To: " . strip_tags($_POST['req-email']) . "\r\n";
$headers .= "CC: susan@example.com\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";

$message = '<p><strong>This is strong text</strong> while this is not.</p>';


mail($to, $subject, $message, $headers);

}
?>