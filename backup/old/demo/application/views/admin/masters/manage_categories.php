<?php

echo"
      <div class='content-wrapper'>
        <section class='content-header'>
          <h1>
            Manage Category
            <small>This pages for category management</small>
          </h1>
          <ol class='breadcrumb'>
            <li><a href='".base_url("admin")."'><i class='fa fa-dashboard'></i> Home</a></li>
			<li><a href='#'><i class='fa fa-dashboard'></i> Masters</a></li>
            <li class='active'>Manage Category</li>
          </ol>
        </section>

        <section class='content'>

			<div class='row'>
                  <div class='col-xs-12'>
                     <div class='box'>
                        <div class='box-header'>
                           <h3 class='box-title'>
                              <button class='btn btn-block btn-primary' data-toggle='modal' data-target='#popup_add'>ADD NEW</button>
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
                                 <th width='20'>No.</th>
                                 <th>Name</th>
                                 <th>Description</th>
								 <th>Sub Category</th>
								 <th>Products</th>
                                 <th>Status</th>
                                 <th width='80px'>Action</th>
                              </tr>
";
$no = 1;
foreach($QCategories as $QCategory){
	$QSubCategories = $this->db->select("id")->where("category_id",$QCategory->id)->get("ms_category")->result();
	$QProducts = $this->db->select("id")->where("category_id in (SELECT id FROM ms_category WHERE id = ".$QCategory->id.")",null,false)->get("tb_product")->result();
	
	$countSub = "<a href='".base_url("admin/subcategories/index/".base64_encode($QCategory->id))."'><span class='label label-warning'>0</span></a>";
	$countProducts = "<a href='#'><span class='label label-warning'>0</span></a>";
	$isActive = "<a href='#' data-toggle='modal' data-target='#popup_confirm_doInactive' onclick = ctrlCategoriesManage.setCategory('".$QCategory->id."');><span class='label label-success'>Active</span></a>";
	
	if($QCategory->active == 2){
		$isActive = "<a href='#' data-toggle='modal' data-target='#popup_confirm_doActive' onclick = ctrlCategoriesManage.setCategory('".$QCategory->id."');><span class='label label-warning'>Inactive</span></a>";
	}
	
	if(sizeOf($QSubCategories) > 0){
		$countSub = "<a href='".base_url("admin/subcategories/index/".base64_encode($QCategory->id))."'><span class='label label-success'>".sizeOf($QSubCategories)."</span></a>";
	}
	
	if(sizeOf($QProducts) > 0){
		$countProducts = "<a href='#'><span class='label label-success'>".sizeOf($QProducts)."</span></a>";
	}
	
	echo"
		<tr>
			 <td>".$no."</td>
			 <td>".$QCategory->name."</td>
			 <td>".$QCategory->description."</td>
			 <td>".$countSub."</td>
			 <td>".$countProducts."</td>
			 <td>".$isActive."</td>
			 <td>
				<button class='btn btn-block btn-info btn-xs'  data-toggle='modal' data-target='#popup_edit' onclick = ctrlCategoriesManage.edit('".$QCategory->id."');>Edit</button>
				<button class='btn btn-block btn-danger btn-xs'  data-toggle='modal' data-target='#popup_confirm_delete' onclick = ctrlCategoriesManage.setCategory('".$QCategory->id."');>Delete</button>
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
	<div class='modal fade' id='popup_add' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
         <div class='modal-dialog'>
            <div class='modal-content'>
               <div class='modal-header'>
                  <button type='button' class='close' data-dismiss='modal'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button>
                  <h4 class='modal-title' id='myModalLabel'>ADD NEW CATEGORY</h4>
               </div>
			   <form id='formAdd'>
               <div class='modal-body'>
                  <div class='box-body'>
                     <div class='form-group'>
                        <label for='add_name'>Name</label>
                        <input type='text' class='form-control' id='add_name' name='add_name' placeholder='Enter name'>
                     </div>
					 <div class='form-group'>
                        <label for='add_description'>Description</label>
						<textarea class='form-control' id='add_description' name='add_description' placeholder='Enter Description'></textarea>
                     </div>
                  </div>
               </div>
			   </form>
               <div class='modal-footer'>
				  <label id='notifAdd' style='color:red;display:none;'></label>
                  <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                  <button type='button' class='btn btn-primary' id='btnAddSave'>Save</button>
               </div>
            </div>
         </div>
      </div>
	  
	  <div class='modal fade' id='popup_edit' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
         <div class='modal-dialog'>
            <div class='modal-content'>
               <div class='modal-header'>
                  <button type='button' class='close' data-dismiss='modal'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button>
                  <h4 class='modal-title' id='myModalLabel'>EDIT CATEGORY</h4>
               </div>
			   <form id='formEdit'>
			   <input type='hidden' name='edit_id' value=''>
               <div class='modal-body'>
                  <div class='box-body'>
                     <div class='form-group'>
                        <label for='edit_name'>Name</label>
                        <input type='text' class='form-control' id='edit_name' name='edit_name' placeholder='Enter name'>
                     </div>
					 <div class='form-group'>
                        <label for='edit_description'>Description</label>
                        <textarea class='form-control' id='edit_description' name='edit_description' placeholder='Enter Description'></textarea>
                     </div>
                  </div>
               </div>
			   </form>
               <div class='modal-footer'>
				  <label id='notifEdit' style='color:red;display:none;'></label>
                  <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                  <button type='button' class='btn btn-primary' id='btnEditSave'>Save</button>
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
                    <p>Are you sure to delete this category ?</p>
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
                    <p>Are you sure to activated this category ?</p>
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
                    <p>Are you sure to in-activated this category ?</p>
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
		var ctrlCategoriesManage = new CtrlCategoriesManage();
		ctrlCategoriesManage.init();
		
		var ctrlCategoriesAdd = new CtrlCategoriesAdd();
		ctrlCategoriesAdd.init();
		
		var ctrlCategoriesEdit = new CtrlCategoriesEdit();
		ctrlCategoriesEdit.init();
	</script>
";

?>