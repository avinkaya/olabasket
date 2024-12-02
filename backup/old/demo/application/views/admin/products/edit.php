<?php

echo"
      <div class='content-wrapper'>
        <section class='content-header'>
          <h1>
            Edit Product
            <small>This pages for edit product</small>
          </h1>
          <ol class='breadcrumb'>
            <li><a href='".base_url("admin")."'><i class='fa fa-dashboard'></i> Home</a></li>
			<li><a href='#'><i class='fa fa-dashboard'></i> Products</a></li>
            <li class='active'>Edit Product</li>
          </ol>
        </section>

        <section class='content'>
			<form id='formEdit'>
			<input type='hidden' id='edit_id' name='edit_id' value='".$QProduct->id."'>
			<input type='hidden' id='edit_attrs' name='edit_attrs' value='".sizeOf($QAttributes)."'>
			<div class='row'>
                <div class='col-xs-12'>
                     <div class='box' style='padding:25px;'>
						<div class='box-header'>
                           <h3 class='box-title'>
							  <button type='button' class='btn btn-primary' style='width:150px' id='btnEditSave'>SAVE</button>
							  <a href='".base_url("admin/products/image")."'><button type='button' class='btn btn-primary' style='width:150px'>IMAGES</button></a>
							  <button type='reset' class='btn btn-danger' style='width:100px'>RESET</button>
                           </h3>
						</div><br><label id='notifEdit' style='color:red;display:none;'></label><br><br>
							<div class='box-body table-responsive'>
								<div style='max-width:500px;'>
									<div class='form-group'>
										<label for='edit_code'>Code</label>
										<input type='text' class='form-control' id='edit_code' name='edit_code' placeholder='Enter product code' style='width:200px' value='".$QProduct->code."'>
									</div>
									<div class='form-group'>
										<label for='edit_name'>Name</label>
										<input type='text' class='form-control' id='edit_name' name='edit_name' placeholder='Enter product name' value='".$QProduct->name."'>
									</div>
									<div class='form-group'>
										<label for='edit_price'>Price (USD $)</label>
										<input type='text' class='form-control' id='edit_price' name='edit_price' placeholder='Enter product price (USD $)' style='width:250px' value='".$QProduct->price."'>
									</div>
									<div class='form-group'>
										<label for='edit_unit'>Unit</label>
										<select class='form-control' id='edit_unit' name='edit_unit' placeholder='Select unit' style='width:200px'>
											<option value='".$QProduct->unit_id."' style='display:none;'>".$QUnit->name."</option>
								";
								
								foreach($QUnits as $QUnit){
										echo"<option value='".$QUnit->id."'>".$QUnit->name."</option>";
								}
								
								echo"
										</select>
									</div>
									<div class='form-group'>
										<label for='edit_category'>Category</label>
										<select class='form-control' id='edit_category' name='edit_category' placeholder='Select unit'>
											<option value='".$QProduct->category_id."' style='display:none;'>".$QCategory->name."</option>
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
									<label for='edit_description'>Description</label>
									<textarea class='form-control' id='edit_description' name='edit_description' placeholder='Enter decription about us this product' style='height:300px'>".$QProduct->description."</textarea>
								</div>
								
								<div style='max-width:510px;'>
									<div class='form-group'>
										<label>More Attributes</label>
										
										<div id='divAttribute'>
								";
									$i=1;
									foreach($QAttributes as $QAttribute){
										echo"
											<div style='display:inline-block;margin-bottom:5px;'>
												<input type='hidden' id='edit_attr".$i."_id' name='edit_attr".$i."_id' value='".$QAttribute->id."'>
												<input type='text' class='form-control' id='edit_attr".$i."_name' name='edit_attr".$i."_name' placeholder='Label' style='width:200px; float:left;margin-right:10px;' value='".$QAttribute->name."'>
												<input type='text' class='form-control' id='edit_attr".$i."_value' name='edit_attr".$i."_value' placeholder='Enter attribute value' style='width:300px; float:left;' value='".$QAttribute->value."'>
											</div>";
										$i++;
									}
								echo"
										</div>
									</div>
									
									<a href='javascript:void(0)' id='aEditAttribute'><label style='cursor:pointer;'>[ + ] Attributes</label></a>
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
		var ctrlProductsEdit = new CtrlProductsEdit();
		ctrlProductsEdit.setAttributes('".sizeOf($QAttributes)."');
		ctrlProductsEdit.init();
	</script>
";
?>