<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product extends CI_Controller {

	function __construct(){
        parent::__construct();
    }
	
	public function index(){
		$data["QCategoryParents"] = $this->db->where("category_id",0)->where("active",1)->get("ms_category")->result();
		
		$this->template->view("product/categories",$data);
	}
	
	public function products(){
		if($this->uri->segment(3) == null){
			redirect("product");
			return;
		}
		
		$QCategory = $this->db->where("id",$this->uri->segment(3))->where("active",1)->get("ms_category")->row();
		
		if(empty($QCategory)){
			redirect("product");
			return;
		}
		
		if($QCategory->category_id == 0){
			$data["QCategories"] = $this->db->where("category_id",$QCategory->id)->where("active",1)->get("ms_category")->result();
			$data["QProducts"] = $this->db->where("category_id IN (SELECT mc.id FROM ms_category mc WHERE mc.category_id = ".$QCategory->id.") ",null,false)->where("active",1)->get("tb_product")->result();
			
			if($QCategory->id == 7){
				$data["cssBoxProduct"] = "product_image_portait";
			}else{
				$data["cssBoxProduct"] = "product_image";
			}
		}else{
			$data["QCategories"] = $this->db->where("category_id",$QCategory->category_id)->where("active",1)->get("ms_category")->result();
			$data["QProducts"] = $this->db->where("category_id",$QCategory->id)->where("active",1)->get("tb_product")->result();
			
			if($QCategory->id == 7){
				$data["cssBoxProduct"] = "product_image_portait";
			}else{
				$data["cssBoxProduct"] = "product_image";
			}
		}
		
		$data["QCategory"] = $QCategory;
		$data["QCategoryParents"] = $this->db->where("category_id",0)->where("active",1)->get("ms_category")->result();
		
		$this->template->view("product/products",$data);
	}
}

