<?php

echo"
      <div class='content-wrapper'>
        <section class='content-header'>
          <h1>
            Manage Product
            <small>This pages for product management</small>
          </h1>
          <ol class='breadcrumb'>
            <li><a href='".base_url("admin")."'><i class='fa fa-dashboard'></i> Home</a></li>
			<li><a href='#'><i class='fa fa-dashboard'></i> Products</a></li>
            <li class='active'>Manage Product</li>
          </ol>
        </section>

        <section class='content'>

			<div class='row'>
                  <div class='col-xs-12'>
                     <div class='box'>
                        <div class='box-header'>
                           <h3 class='box-title'>
                              <a href='".base_url("admin/products/add/")."'><button class='btn btn-block btn-primary'>ADD NEW</button></a>
                           </h3>
                           <div class='box-tools'>
                              <div class='input-group' style='width: 150px;'>
                                 <input type='text' name='table_search' class='form-control input-sm pull-right' placeholder='Search'>
                                 <div class='input-group-btn'>
                                    <button class='btn btn-sm btn-default'><i class='fa fa-search'></i></button>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!-- /.box-header -->
                        <div class='box-body table-responsive no-padding'>
							<label id='notifManage' style='color:red;display:none;'></label>
                           <table class='table table-hover'>
                              <tr>
								 <th width='50'>&nbsp;</th>
                                 <th width='20'>No.</th>
								 <th>Code</th>
                                 <th>Name</th>
                                 <th>Category</th>
								 <th>Price</th>
                                 <th>Status</th>
                                 <th width='80px'>Action</th>
                              </tr>
";
$no = 1;
foreach($QProducts as $QProduct){
	$isActive = "<a href='#' data-toggle='modal' data-target='#popup_confirm_doInactive' onclick = ctrlProductsManage.setProduct('".$QProduct->id."');><span class='label label-success'>Active</span></a>";
	if($QProduct->active == 2){
		$isActive = "<a href='#' data-toggle='modal' data-target='#popup_confirm_doActive' onclick = ctrlProductsManage.setProduct('".$QProduct->id."');><span class='label label-warning'>Inactive</span></a>";
	}
	
	$product_image = base_url("assets/image/img_default_photo.jpg");
	$QProductImage = $this->db->where("product_id",$QProduct->id)->get("tb_product_image")->row();
	if(!empty($QProductImage)){
		if(@getimagesize(base_url("assets/pic/products/resize/".$QProductImage->image))){
			$product_image = base_url("assets/pic/products/resize/".$QProductImage->image);
		}
	}
	
	echo"
		<tr>
			 <td><img src='".$product_image."' class='table-image' alt='Product Image'></td>
			 <td>".$no."</td>
			 <td>".$QProduct->code."</td>
			 <td>".$QProduct->name."</td>
			 <td>".$QProduct->category_name."</td>
			 <td>".$QProduct->price."</td>
			 <td>".$isActive."</td>
			 <td>
				<a href='".base_url("admin/products/edit/".base64_encode($QProduct->id))."'><button class='btn btn-block btn-info btn-xs'>Edit</button></a>
				<button class='btn btn-block btn-danger btn-xs'  data-toggle='modal' data-target='#popup_confirm_delete' onclick = ctrlProductsManage.setProduct('".$QProduct->id."');>Delete</button>
			 </td>
		  </tr>
	";
	$no++;
}
echo"
                           </table>
                        </div>
                        <!-- /.box-body -->
                        <div class='box-footer clearfix'>
                           <ul class='pagination pagination-sm no-margin pull-right'>
                              <li><a href='#'>«</a></li>
                              <li><a href='#'>1</a></li>
                              <li><a href='#'>2</a></li>
                              <li><a href='#'>3</a></li>
                              <li><a href='#'>»</a></li>
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
		
        </section>
      </div>
";


echo"
	  <div class='modal fade modal-danger' id='popup_confirm_delete' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
         <div class='modal-dialog modal-sm'>
            <div class='modal-content'>
               <div class='modal-header'>
                  <button type='button' class='close' data-dismiss='modal'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button>
                  <h4 class='modal-title' id='myModalLabel'>Delete</h4>
               </div>
               <div class='modal-body'>
                  <div class='box-body'>
                    <p>Are you sure to delete this unit ?</p>
                  </div>
               </div>
               <div class='modal-footer'>
                  <button type='button' class='btn btn-default' data-dismiss='modal'>Cancel</button>
                  <button type='button' class='btn btn-primary' id='btnDeleteOk'>OK</button>
               </div>
            </div>
         </div>
      </div>
	  
	  <div class='modal fade modal-info' id='popup_confirm_doActive' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
         <div class='modal-dialog modal-sm'>
            <div class='modal-content'>
               <div class='modal-header'>
                  <button type='button' class='close' data-dismiss='modal'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button>
                  <h4 class='modal-title' id='myModalLabel'>Activated</h4>
               </div>
               <div class='modal-body'>
                  <div class='box-body'>
                    <p>Are you sure to activated this unit ?</p>
                  </div>
               </div>
               <div class='modal-footer'>
                  <button type='button' class='btn btn-default' data-dismiss='modal'>Cancel</button>
                  <button type='button' class='btn btn-primary' id='btnActiveOk'>OK</button>
               </div>
            </div>
         </div>
      </div>
	  
	  <div class='modal fade modal-danger' id='popup_confirm_doInactive' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
         <div class='modal-dialog modal-sm'>
            <div class='modal-content'>
               <div class='modal-header'>
                  <button type='button' class='close' data-dismiss='modal'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button>
                  <h4 class='modal-title' id='myModalLabel'>In Activated</h4>
               </div>
               <div class='modal-body'>
                  <div class='box-body'>
                    <p>Are you sure to in-activated this unit ?</p>
                  </div>
               </div>
               <div class='modal-footer'>
                  <button type='button' class='btn btn-default' data-dismiss='modal'>Cancel</button>
                  <button type='button' class='btn btn-primary' id='btnInactiveOk'>OK</button>
               </div>
            </div>
         </div>
      </div>
";

echo"
	<script>
		var ctrlProductsManage = new CtrlProductsManage();
		ctrlProductsManage.init();
	</script>
";

?>