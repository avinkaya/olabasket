<?php

echo"
      <div class='content-wrapper'>
        <section class='content-header'>
          <h1>
            Manage Slider
            <small>Upload images for slide show on home</small>
          </h1>
          <ol class='breadcrumb'>
            <li><a href='".base_url("admin")."'><i class='fa fa-dashboard'></i> Home</a></li>
			<li><a href='#'><i class='fa fa-dashboard'></i> Slider & Advertise</a></li>
            <li class='active'>Manage Slide</li>
          </ol>
        </section>

        <section class='content'>
			<div class='row'>
                <div class='col-xs-12'>
                     <div class='box' style='padding:25px;'>
						<div class='box-header'>
                           <h3 class='box-title'>
							  <button type='button' id='btn_add_image' class='btn btn-primary' data-toggle='modal' data-target='#popup_add'>UPLOAD NEW IMAGE</button>
                           </h3>
						</div><br><label id='notifImage' style='color:red;display:none;'></label>
							<div class='box-body table-responsive div-image'>
								<ul>
						";
						
						foreach($QSliders as $QSlide){
							echo"
								<li>
									<div id='a_image_remove' class='div-image-delete' data-toggle='modal' data-target='#popup_confirm_delete' onclick = ctrlSliders.setSlide('".$QSlide->id."');></div>
									<div class='div-image-content-portait' style='background-image:url(".base_url("assets/pic/sliders/resize/".$QSlide->image).")'></div>
								</li>
							";
						}
						
						echo"
								</ul>
							</div>
					 </div>
				</div>
			</div>
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
							<img id='add_image' style='width:500px!important;height:auto!important;cursor:pointer;' title='Click to select new image' src=''/>
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
		var ctrlSliders = new CtrlSliders();
		ctrlSliders.init();
	</script>
";
?>