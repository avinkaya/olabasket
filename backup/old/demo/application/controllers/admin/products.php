<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Products extends CI_Controller {

	function __construct(){
        parent::__construct();
		
		if(empty($_SESSION["user_login"])){
			redirect("admin/login");
		}
    }
	
	public function index(){
		$data["QProducts"] = $this->db
						->select("tp.*, mc.name as category_name")
						->join("ms_category mc","mc.id = tp.category_id")
						->order_by("tp.id","Desc")
						->get("tb_product tp")
						->result();
						
		$this->template->viewAdmin("products/manage_product",$data);
	}
	
	public function add(){
		$_SESSION["product_id"] = null;
		
		$data["QCategories"] = $this->db->where("category_id",0)->where("active",1)->get("ms_category")->result();
		$data["QUnits"] = $this->db->where("active",1)->get("ms_unit")->result();
		
		$this->template->viewAdmin("products/add",$data);
	}
	
	public function edit(){
		if($this->uri->segment(4) == null || base64_decode($this->uri->segment(4)) == ""){
			redirect("admin/products");
			return;
		}
		
		$data["QProduct"] = $this->db->where("id",base64_decode($this->uri->segment(4)))->get("tb_product")->row();
		
		if(empty($data["QProduct"])){
			redirect("admin/products");
			return;
		}
		
		$data["QAttributes"] = $this->db->where("product_id",$data["QProduct"]->id)->get("tb_product_attribute")->result();
		$data["QCategory"] = $this->db->where("id",$data["QProduct"]->category_id)->get("ms_category")->row();
		$data["QUnit"] = $this->db->where("id",$data["QProduct"]->unit_id)->get("ms_unit")->row();
		$data["QCategories"] = $this->db->where("category_id",0)->where("active",1)->get("ms_category")->result();
		$data["QUnits"] = $this->db->where("active",1)->get("ms_unit")->result();
		
		$_SESSION["product_id"] = $data["QProduct"]->id;
		
		$this->template->viewAdmin("products/edit",$data);
		
	}
	
	public function image(){
		$data["QProduct"] = $this->db->where("id",$_SESSION["product_id"])->get("tb_product")->row();
		$data["QProductImages"] = $this->db->where("product_id",$_SESSION["product_id"])->get("tb_product_image")->result();
		
		$this->template->viewAdmin("products/image",$data);
	}
	
	public function doAddSave(){
		if($this->response->post("add_code") == ""){
			$this->response->send(array("result"=>0,"message"=>"Enter field \"Code\"","messageCode"=>1));
			return;
		}
		
		if($this->response->post("add_name") == ""){
			$this->response->send(array("result"=>0,"message"=>"Enter field \"Name\"","messageCode"=>1));
			return;
		}
		
		if($this->response->post("add_price") == ""){
			$this->response->send(array("result"=>0,"message"=>"Enter field \"Price\"","messageCode"=>2));
			return;
		}
		
		if($this->response->post("add_unit") == ""){
			$this->response->send(array("result"=>0,"message"=>"Select field \"Unit\"","messageCode"=>2));
			return;
		}
		
		if($this->response->post("add_category") == ""){
			$this->response->send(array("result"=>0,"message"=>"Select field \"Category\"","messageCode"=>2));
			return;
		}
		
		$Date = date("Y-m-d H:i:s");
		
		$Data = array(
					"code"=>$this->response->post("add_code"),
					"name"=>$this->response->post("add_name"),
					"price"=>$this->response->post("add_price"),
					"description"=>$this->response->post("add_description"),
					"unit_id"=>$this->response->post("add_unit"),
					"category_id"=>$this->response->post("add_category"),
					"active"=>1,
					"create_date"=>$Date,
					"create_user"=>$_SESSION["user_login"]->email,
				);
		$Save = $this->db->insert("tb_product",$Data);
		
		if($Save){
			$QProduct = $this->db
					->where("code",$this->response->post("add_code"))
					->where("name",$this->response->post("add_name"))
					->where("price",$this->response->post("add_price"))
					->where("description",$this->response->post("add_description"))
					->where("unit_id",$this->response->post("add_unit"))
					->where("category_id",$this->response->post("add_category"))
					->where("active",1)
					->where("create_date",$Date)
					->where("create_user",$_SESSION["user_login"]->email)
					->get("tb_product")
					->row();
					
			$Attribut = "";
			if(!empty($QProduct) && $this->response->post("add_attrs") != "" && $this->response->post("add_attrs") != "0"){
				$_SESSION["product_id"] = $QProduct->id;
				
				for($i = 1; $i <= $this->response->post("add_attrs"); $i++){
					if($this->response->post("add_attr".$i."_name") != ""){
						$Attribut = $Attribut."-> ".$this->response->post("add_attr".$i."_name");
						$Data = array(
									"name"=>$this->response->post("add_attr".$i."_name"),
									"value"=>$this->response->post("add_attr".$i."_value"),
									"product_id"=>$QProduct->id,
									"create_date"=>$Date,
									"create_user"=>$_SESSION["user_login"]->email,
								);
								
						$Save = $this->db->insert("tb_product_attribute",$Data);
						
						
					}
				}
			}
			$this->response->send(array("result"=>1,"message"=>"Data has been saved","messageCode"=>7));
		}else{
			$this->response->send(array("result"=>0,"message"=>"New data can't be saved","messageCode"=>8));
		}
	}
	
	public function doEditSave(){
		if($this->response->post("edit_id") == ""){
			$this->response->send(array("result"=>0,"message"=>"Not found product selected","messageCode"=>1));
			return;
		}
		
		if($this->response->post("edit_code") == ""){
			$this->response->send(array("result"=>0,"message"=>"Enter field \"Code\"","messageCode"=>1));
			return;
		}
		
		if($this->response->post("edit_name") == ""){
			$this->response->send(array("result"=>0,"message"=>"Enter field \"Name\"","messageCode"=>1));
			return;
		}
		
		if($this->response->post("edit_price") == ""){
			$this->response->send(array("result"=>0,"message"=>"Enter field \"Price\"","messageCode"=>2));
			return;
		}
		
		if($this->response->post("edit_unit") == ""){
			$this->response->send(array("result"=>0,"message"=>"Select field \"Unit\"","messageCode"=>2));
			return;
		}
		
		if($this->response->post("edit_category") == ""){
			$this->response->send(array("result"=>0,"message"=>"Select field \"Category\"","messageCode"=>2));
			return;
		}
		
		$Date = date("Y-m-d H:i:s");
		
		$Data = array(
					"code"=>$this->response->post("edit_code"),
					"name"=>$this->response->post("edit_name"),
					"price"=>$this->response->post("edit_price"),
					"description"=>$this->response->post("edit_description"),
					"unit_id"=>$this->response->post("edit_unit"),
					"category_id"=>$this->response->post("edit_category"),
					"update_user"=>$_SESSION["user_login"]->email,
				);
		$Save = $this->db->update("tb_product",$Data);
		
		if($Save){
			$QProduct = $this->db
					->where("id",$this->response->post("edit_id"))
					->get("tb_product")
					->row();
			
			if(!empty($QProduct) && $this->response->post("edit_attrs") != "" && $this->response->post("edit_attrs") != "0"){
				$_SESSION["product_id"] = $QProduct->id;
				
				for($i = 1; $i <= $this->response->post("edit_attrs"); $i++){
					if($this->response->post("edit_attr".$i."_id") != "" || $this->response->post("edit_attr".$i."_name") != ""){
						if($this->response->post("edit_attr".$i."_id") == ""){
							$Data = array(
									"name"=>$this->response->post("edit_attr".$i."_name"),
									"value"=>$this->response->post("edit_attr".$i."_value"),
									"product_id"=>$QProduct->id,
									"create_date"=>$Date,
									"create_user"=>$_SESSION["user_login"]->email,
								);
								
							$Save = $this->db->insert("tb_product_attribute",$Data);
						}else{
							$Data = array(
									"name"=>$this->response->post("edit_attr".$i."_name"),
									"value"=>$this->response->post("edit_attr".$i."_value"),
									"update_user"=>$_SESSION["user_login"]->email,
								);
								
							$Save = $this->db->where("id",$this->response->post("edit_attr".$i."_id"))->update("tb_product_attribute",$Data);
						}
					}
				}
			}
			$this->response->send(array("result"=>1,"message"=>"Data has been saved","messageCode"=>7));
		}else{
			$this->response->send(array("result"=>0,"message"=>"New data can't be saved","messageCode"=>8));
		}
	}
	
	public function doDelete(){
		if($this->response->post("product") == ""){
			$this->response->send(array("result"=>0,"message"=>"Not found data selected !","messageCode"=>1));
			return;
		}
		
		$Delete = $this->db
				->where("id",$this->response->post("product"))
				->delete("tb_product");
		if($Delete){
			$this->response->send(array("result"=>1,"message"=>"Data has been deleted","messageCode"=>2));
		}else{
			$this->response->send(array("result"=>0,"message"=>"Can't to delete this data !","messageCode"=>3));
		}
	}
	
	public function doActivated(){
		if($this->response->post("product") == ""){
			$this->response->send(array("result"=>0,"message"=>"Not found data selected !","messageCode"=>1));
			return;
		}
		
		$Data = array("active"=>"1");
		
		$Save = $this->db
				->where("id",$this->response->post("product"))
				->update("tb_product",$Data);
		
		if($Save){
			$this->response->send(array("result"=>1,"message"=>"Data has been activated","messageCode"=>2));
		}else{
			$this->response->send(array("result"=>0,"message"=>"Can't to activated this data !","messageCode"=>3));
		}
	}
	
	public function doInactivated(){
		if($this->response->post("product") == ""){
			$this->response->send(array("result"=>0,"message"=>"Not found data selected !","messageCode"=>1));
			return;
		}
		
		$Data = array("active"=>"2");
		
		$Save = $this->db
				->where("id",$this->response->post("product"))
				->update("tb_product",$Data);
		
		if($Save){
			$this->response->send(array("result"=>1,"message"=>"Data has been in-activated","messageCode"=>2));
		}else{
			$this->response->send(array("result"=>0,"message"=>"Can't to in-activated this data !","messageCode"=>3));
		}
	}
	
	public function doImageUpload(){
		if(!empty($_FILES["image"]) && $_FILES["image"]["name"]){
			$config['upload_path'] = './assets/pic/products/'; 
			$config['allowed_types'] = "gif|jpg|png|jpeg|bmp";
			$config['max_size'] = 1000;
			$config['encrypt_name'] = TRUE;
			$this->upload->initialize($config);
			
			if($this->upload->do_upload("image")){
				$data=$this->upload->data();
				$this->image_lib->clear();
				
				$image['image_library'] = "GD2";
				$image['source_image'] = $data['full_path'];
				$image['new_image'] = 'assets/pic/products/resize/'.$data['file_name'];
				
				$image['maintain_ratio'] = TRUE;
				$image['master_dim'] = 'auto';
				$image['width'] = 350;
				$image['height'] = 350;
				$this->image_lib->initialize($image);
				$this->image_lib->resize();
				
				$file = $data['file_name'];
				
				/*
				*	---------------------------------------------------------------
				*	Save Image data to database
				*	---------------------------------------------------------------
				*/
				
				$Data = array(
						"image"=>$file,
						"description"=>$this->response->post("add_description"),
						"product_id"=>$_SESSION["product_id"],
						"create_date"=>date("Y-m-d H:i:s"),
						"create_user"=>$_SESSION["user_login"]->email,
					);
					
				$Save = $this->db->insert("tb_product_image",$Data);
				
				if($Save){
					$this->response->send(array("result"=>1,"message"=>"Image has been uploaded !","messageCode"=>3));
				}else{
					$this->response->send(array("result"=>0,"message"=>"Can't upload image !","messageCode"=>3));
				}
			}else{
				$this->response->send(array("result"=>0,"message"=>"Can't upload image !","messageCode"=>3));
			}
		}else{
			$this->response->send(array("result"=>0,"message"=>"Empty image to uploaded !","messageCode"=>3));
		}
	}
	
	public function doImageDelete(){
		if($this->response->post("image") == ""){
			$this->response->send(array("result"=>0,"message"=>"Not found data selected !","messageCode"=>1));
			return;
		}
		
		$QProductImage = $this->db->where("id",$this->response->post("image"))->get("tb_product_image")->row();
		
		if(!empty($QProductImage)){
			$Delete = $this->db
					->where("id",$this->response->post("image"))
					->delete("tb_product_image");
					
			if($Delete){
				@unlink("assets/pic/products/".$QProductImage->image);
				@unlink("assets/pic/products/resize/".$QProductImage->image);
				
				$this->response->send(array("result"=>1,"message"=>"Data has been deleted","messageCode"=>2));
			}else{
				$this->response->send(array("result"=>0,"message"=>"Can't to delete this data !","messageCode"=>3));
			}
		}else{
			$this->response->send(array("result"=>0,"message"=>"Not found data image !","messageCode"=>3));
		}
	}
}

