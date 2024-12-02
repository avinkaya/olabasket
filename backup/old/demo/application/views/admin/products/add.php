<?php

echo"
      <div class='content-wrapper'>
        <section class='content-header'>
          <h1>
            Add New Product
            <small>This pages for add new product</small>
          </h1>
          <ol class='breadcrumb'>
            <li><a href='".base_url("admin")."'><i class='fa fa-dashboard'></i> Home</a></li>
			<li><a href='#'><i class='fa fa-dashboard'></i> Products</a></li>
            <li class='active'>Add New Product</li>
          </ol>
        </section>

        <section class='content'>
			<form id='formAdd'>
			<input type='hidden' id='add_attrs' name='add_attrs' value='0'>
			<div class='row'>
                <div class='col-xs-12'>
                     <div class='box' style='padding:25px;'>
						<div class='box-header'>
                           <h3 class='box-title'>
							  <button type='button' class='btn btn-primary' style='width:150px' id='btnAddSave'>SAVE</button>
							  <button type='reset' class='btn btn-danger' style='width:100px'>RESET</button>
                           </h3>
						</div><br><label id='notifAdd' style='color:red;display:none;'></label><br><br>
							<div class='box-body table-responsive'>
								<div style='max-width:500px;'>
									<div class='form-group'>
										<label for='add_code'>Code</label>
										<input type='text' class='form-control' id='add_code' name='add_code' placeholder='Enter product code' style='width:200px'>
									</div>
									<div class='form-group'>
										<label for='add_name'>Name</label>
										<input type='text' class='form-control' id='add_name' name='add_name' placeholder='Enter product name'>
									</div>
									<div class='form-group'>
										<label for='add_price'>Price (USD $)</label>
										<input type='text' class='form-control' id='add_price' name='add_price' placeholder='Enter product price (USD $)' style='width:250px'>
									</div>
									<div class='form-group'>
										<label for='add_unit'>Unit</label>
										<select class='form-control' id='add_unit' name='add_unit' placeholder='Select unit' style='width:200px'>
								";
								
								foreach($QUnits as $QUnit){
										echo"<option value='".$QUnit->id."'>".$QUnit->name."</option>";
								}
								
								echo"
										</select>
									</div>
									<div class='form-group'>
										<label for='add_category'>Category</label>
										<select class='form-control' id='add_category' name='add_category' placeholder='Select unit'>
								";
								
								foreach($QCategories as $QCategory){
									echo"<option value='".$QCategory->id."' disabled style='color:#313131;background:#717171;color:white;'>".strtoupper($QCategory->name)."</option>";
									
									$QSubcategories = $this->db->where("category_id",$QCategory->id)->get("ms_category")->result();
									foreach($QSubcategories as $QSubcategory){
										echo"<option value='".$QSubcategory->id."'>&nbsp&nbsp".$QSubcategory->name."</option>";
									}
								}
								
								echo"
										</select>
									</div>
								</div>
								
								<div class='form-group'>
									<label for='add_description'>Description</label>
									<textarea class='form-control' id='add_description' name='add_description' placeholder='Enter decription about us this product' style='height:300px'></textarea>
								</div>
								
								<div style='max-width:510px;'>
									<div class='form-group'>
										<label>More Attributes</label>
										
										<div id='divAttribute'>
										</div>
									</div>
									
									<a href='javascript:void(0)' id='aAddAttribute'><label style='cursor:pointer;'>[ + ] Attributes</label></a>
								</div>
							</div>
					 </div>
				</div>
			</div>
			</form>
        </section>
      </div>
";

echo"
	<script>
		var ctrlProductsAdd = new CtrlProductsAdd();
		ctrlProductsAdd.init();
	</script>
";
?>