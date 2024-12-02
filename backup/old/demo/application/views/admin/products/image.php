<?php

echo"
      <div class='content-wrapper'>
        <section class='content-header'>
          <h1>
            ".$QProduct->name."
            <small>Upload images for this product</small>
          </h1>
          <ol class='breadcrumb'>
            <li><a href='".base_url("admin")."'><i class='fa fa-dashboard'></i> Home</a></li>
			<li><a href='#'><i class='fa fa-dashboard'></i> Products</a></li>
            <li class='active'>Product Image</li>
          </ol>
        </section>

        <section class='content'>
			<form id='formImage'>
			<input type='hidden' id='product_id' name='product_id' value='".$QProduct->id."'>
			<div class='row'>
                <div class='col-xs-12'>
                     <div class='box' style='padding:25px;'>
						<div class='box-header'>
                           <h3 class='box-title'>
							  <button type='button' id='btn_add_image' class='btn btn-primary' data-toggle='modal' data-target='#popup_add'>UPLOAD NEW IMAGE</button>
							  <a href='".base_url("admin/products/edit/".base64_encode($_SESSION["product_id"]))."' ><button type='button' class='btn btn-danger' style='width:100px'>CANCEL</button></a>
                           </h3>
						</div><br><label id='notifImage' style='color:red;display:none;'></label>
							<div class='box-body table-responsive div-image'>
								<ul>
						";
						
						foreach($QProductImages as $QProductImage){
							echo"
								<li>
									<div id='a_image_remove' class='div-image-delete' data-toggle='modal' data-target='#popup_confirm_delete' onclick = ctrlProductsImage.setImage('".$QProductImage->id."');></div>
									<div class='div-image-content' style='background-image:url(".base_url("assets/pic/products/resize/".$QProductImage->image).")'></div>
								</li>
							";
						}
						
						echo"
								</ul>
							</div>
					 </div>
				</div>
			</div>
			</form>
        </section>
      </div>
	  
	  
	  <div class='modal fade' id='popup_add' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
         <div class='modal-dialog'>
            <div class='modal-content'>
               <div class='modal-header'>
                  <button type='button' class='close' data-dismiss='modal'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button>
                  <h4 class='modal-title' id='myModalLabel'>UPLOAD IMAGE</h4>
               </div>
			   <form id='formAdd' enctype='multipart/form-data'>
               <div class='modal-body'>
                  <div class='box-body'>
					 <div class='form-group'>
                        <label for='logo'>Picture</label>
                        <input type='file' name='image' style='display:none;'>
                        <p class='help-block' align='center'>
							<img id='add_image' style='width:auto!important;height:300px!important;cursor:pointer;' title='Click to select new image' src=''/>
						</p>
                     </div>
					 <div class='form-group'>
                        <label for='add_description'>Description</label>
                        <textarea class='form-control' id='add_description' name='add_description' placeholder='Enter image description' height='150px'></textarea>
                     </div>
                  </div>
               </div>
			   </form>
               <div class='modal-footer'>
				  <label id='notifAdd' style='color:red;display:none;'></label>
                  <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                  <button type='button' class='btn btn-primary' id='btn_add_upload'>Upload</button>
               </div>
            </div>
         </div>
      </div>
	  
	  <div class='modal fade modal-danger' id='popup_confirm_delete' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
         <div class='modal-dialog modal-sm'>
            <div class='modal-content'>
               <div class='modal-header'>
                  <button type='button' class='close' data-dismiss='modal'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button>
                  <h4 class='modal-title' id='myModalLabel'>Delete</h4>
               </div>
               <div class='modal-body'>
                  <div class='box-body'>
                    <p>Are you sure to delete this image ?</p>
                  </div>
               </div>
               <div class='modal-footer'>
                  <button type='button' class='btn btn-default' data-dismiss='modal'>Cancel</button>
                  <button type='button' class='btn btn-primary' id='btnDeleteOk'>OK</button>
               </div>
            </div>
         </div>
      </div>
";

echo"
	<script>
		var ctrlProductsImage = new CtrlProductsImage();
		ctrlProductsImage.init();
	</script>
";
?>