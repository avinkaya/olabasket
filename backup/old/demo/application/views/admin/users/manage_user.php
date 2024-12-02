<?php

echo"
      <div class='content-wrapper'>
        <section class='content-header'>
          <h1>
            Manage User
            <small>This pages for user management and privilage</small>
          </h1>
          <ol class='breadcrumb'>
            <li><a href='".base_url("admin")."'><i class='fa fa-dashboard'></i> Home</a></li>
			<li><a href='#'><i class='fa fa-dashboard'></i> Users</a></li>
            <li class='active'>Manage User</li>
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
                                 <th width='50'>&nbsp;</th>
                                 <th width='20'>No.</th>
                                 <th>Name</th>
                                 <th>Email</th>
								 <th>Username</th>
                                 <th>Status</th>
                                 <th width='80px'>Action</th>
                              </tr>
";
$no = 1;
foreach($QUsers as $QUser){
	$isActive = "<a href='#' data-toggle='modal' data-target='#popup_confirm_doInactive' onclick = ctrlUsersManage.setUser('".$QUser->id."');><span class='label label-success'>Active</span></a>";
	if($QUser->active == 2){
		$isActive = "<a href='#' data-toggle='modal' data-target='#popup_confirm_doActive' onclick = ctrlUsersManage.setUser('".$QUser->id."');><span class='label label-warning'>Inactive</span></a>";
	}
	echo"
		<tr>
			 <td><img src='".base_url("assets/admin/img/user2-160x160.jpg")."' class='table-image' alt='User Image'></td>
			 <td>".$no."</td>
			 <td>".$QUser->name."</td>
			 <td>".$QUser->email."</td>
			 <td>".$QUser->username."</td>
			 <td>".$isActive."</td>
			 <td>
				<button class='btn btn-block btn-info btn-xs'  data-toggle='modal' data-target='#popup_edit' onclick = ctrlUsersManage.edit('".$QUser->id."');>Edit</button>
				<button class='btn btn-block btn-danger btn-xs'  data-toggle='modal' data-target='#popup_confirm_delete' onclick = ctrlUsersManage.setUser('".$QUser->id."');>Delete</button>
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
                  <h4 class='modal-title' id='myModalLabel'>ADD NEW USER</h4>
               </div>
			   <form id='formAdd'>
               <div class='modal-body'>
                  <div class='box-body'>
                     <div class='form-group'>
                        <label for='add_name'>Name</label>
                        <input type='text' class='form-control' id='add_name' name='add_name' placeholder='Enter user full name'>
                     </div>
					 <div class='form-group'>
                        <label for='add_email'>Email</label>
                        <input type='text' class='form-control' id='add_email' name='add_email' placeholder='Enter email'>
                     </div>
                     <div class='form-group'>
                        <label for='add_username'>Username</label>
                        <input type='text' class='form-control' id='add_username' name='add_username' placeholder='Enter username'>
                     </div>
					 <div class='form-group'>
                        <label for='add_password'>Password</label>
                        <input type='password' class='form-control' id='add_password' name='add_password' placeholder='Enter password'>
                     </div>
					 <div class='form-group'>
                        <label for='add_passwordre'>Retype Password</label>
                        <input type='password' class='form-control' id='add_passwordre' name='add_passwordre' placeholder='Enter retype password'>
                     </div>
                     <div class='form-group' style='display:none;'>
                        <label for='logo'>Picture</label>
                        <input type='file' id='image' name='image'>
                        <p class='help-block'><img id='image_tumb' style='width:125px!important;' src='".base_url("assets/admin/img/user2-160x160.jpg")."' class='table-image'/></p>
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
                  <h4 class='modal-title' id='myModalLabel'>EDIT USER</h4>
               </div>
			   <form id='formEdit'>
			   <input type='hidden' name='edit_id' value=''>
               <div class='modal-body'>
                  <div class='box-body'>
                     <div class='form-group'>
                        <label for='edit_name'>Name</label>
                        <input type='text' class='form-control' id='edit_name' name='edit_name' placeholder='Enter user full name'>
                     </div>
					 <div class='form-group'>
                        <label for='edit_email'>Email</label>
                        <input type='text' class='form-control' id='edit_email' name='edit_email' placeholder='Enter email'>
                     </div>
                     <div class='form-group'>
                        <label for='edit_username'>Username</label>
                        <input type='text' class='form-control' id='edit_username' name='edit_username' placeholder='Enter username'>
                     </div>
					 <div class='form-group' style='display:none;'>
                        <label for='logo'>Picture</label>
                        <input type='file' id='image' name='image'>
                        <p class='help-block'><img id='image_tumb' style='width:125px!important;' src='".base_url("assets/admin/img/user2-160x160.jpg")."' class='table-image'/></p>
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
                    <p>Are you sure to delete this user ?</p>
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
                    <p>Are you sure to activated this user ?</p>
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
                    <p>Are you sure to in-activated this user ?</p>
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
		var ctrlUsersManage = new CtrlUsersManage();
		ctrlUsersManage.init();
		
		var ctrlUsersAdd = new CtrlUsersAdd();
		ctrlUsersAdd.init();
		
		var ctrlUsersEdit = new CtrlUsersEdit();
		ctrlUsersEdit.init();
	</script>
";

?>