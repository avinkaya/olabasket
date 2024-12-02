<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sliders extends CI_Controller {

	function __construct(){
        parent::__construct();
		
		if(empty($_SESSION["user_login"])){
			redirect("admin/login");
		}
    }
	
	public function index(){
		$data["QSliders"] = $this->db->get("tb_slider")->result();
		
		$this->template->viewAdmin("Advertise/sliders",$data);
	}
	
	public function doImageUpload(){
		if(!empty($_FILES["image"]) && $_FILES["image"]["name"]){
			$config['upload_path'] = './assets/pic/sliders/'; 
			$config['allowed_types'] = "gif|jpg|png|jpeg|bmp";
			$config['max_size'] = 5000;
			$config['encrypt_name'] = TRUE;
			$this->upload->initialize($config);
			
			if($this->upload->do_upload("image")){
				$data=$this->upload->data();
				$this->image_lib->clear();
				
				$image['image_library'] = "GD2";
				$image['source_image'] = $data['full_path'];
				$image['new_image'] = 'assets/pic/sliders/resize/'.$data['file_name'];
				
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
						"create_date"=>date("Y-m-d H:i:s"),
						"create_user"=>$_SESSION["user_login"]->email,
					);
					
				$Save = $this->db->insert("tb_slider",$Data);
				
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
		if($this->response->post("slide") == ""){
			$this->response->send(array("result"=>0,"message"=>"Not found data selected !","messageCode"=>1));
			return;
		}
		
		$QSlide = $this->db->where("id",$this->response->post("slide"))->get("tb_slider")->row();
		
		if(!empty($QSlide)){
			$Delete = $this->db
					->where("id",$this->response->post("slide"))
					->delete("tb_slider");
					
			if($Delete){
				@unlink("assets/pic/sliders/".$QSlide->image);
				@unlink("assets/pic/sliders/resize/".$QSlide->image);
				
				$this->response->send(array("result"=>1,"message"=>"Data has been deleted","messageCode"=>2));
			}else{
				$this->response->send(array("result"=>0,"message"=>"Can't to delete this data !","messageCode"=>3));
			}
		}else{
			$this->response->send(array("result"=>0,"message"=>"Not found data image !","messageCode"=>3));
		}
	}
}

