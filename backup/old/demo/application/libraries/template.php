<?php class Template{
	
    function view($view=null, $data=null){
        $ci =& get_instance();
		
		$ci->load->view('v1/header', $data);
		$ci->load->view('v1/top', $data);
		$ci->load->view('v1/top_menu', $data);
        $ci->load->view('v1/'.$view, $data);
        $ci->load->view('v1/bottom', $data);
    }
	
	function viewSlider($view=null, $data=null){
        $ci =& get_instance();
		
		$ci->load->view('v1/header', $data);
		$ci->load->view('v1/top', $data);
        $ci->load->view('v1/top_slider', $data);
		$ci->load->view('v1/top_menu', $data);
        $ci->load->view('v1/'.$view, $data);
        $ci->load->view('v1/bottom', $data);
    }
	
	function viewAdmin($view=null, $data=null){
        $ci =& get_instance();
		
		$ci->load->view('admin/header', $data);
		$ci->load->view('admin/menu_top', $data);
		$ci->load->view('admin/menu_left', $data);
        $ci->load->view('admin/'.$view, $data);
        $ci->load->view('admin/bottom', $data);
    }
	
    function paging($total,$uri,$url,$limit){
        $ci 						=& get_instance();
		$config['base_url'] 		= base_url($url);
		$config['total_rows'] 		= count($total);
		$config['per_page']			= $limit;
		$config['full_tag_open']	= '<div id="pagination">';
		$config['full_tag_close']	= '</div>';
		$config['uri_segment']		= $uri;
		$config['first_link']		= 'First';
		$config['last_link']		= 'Last';
		$config['next_link']		= '&raquo;';
		$config['prev_link']		= '&laquo;';
		
		$ci->pagination->initialize($config);
		return $ci->pagination->create_links();
    }
	
	
	function paging1($pg,$uri,$url,$limit){
        $ci =& get_instance();
        $pg=$pg;
		
		$config['base_url'] = base_url($url);
		$config['total_rows'] = $pg->num_rows();
		$config['per_page']=$limit;
		$config['full_tag_open']='<div id="pagination">';
		$config['full_tag_close']='</div>';
		$config['uri_segment']=$uri;
		$config['first_link']='First';
		$config['last_link']='Last';
		$config['next_link']='>>';
		$config['prev_link']='<<';
		
		$ci->pagination->initialize($config);
		return $ci->pagination->create_links();
    }
    
	
	function send_email($to, $subject, $message, $from=null, $nama=null){
        $ci = & get_instance();
        $ci->load->library('email');
		
		$config['protocol'] = "smtps";
        $config['smtp_host'] = "ssl://smtp.gmail.com";
        $config['smtp_port'] = "465";
        $config['smtp_user'] = "hsbn89@gmail.com"; 
        $config['smtp_pass'] = "Sulistiani89";
        $config['charset'] = "utf-8";
        $config['mailtype'] = "html";
        $config['newline'] = "\r\n";
        $config['wordwrap'] = TRUE;
		
		/*
		$config['protocol'] = "smtp";
        $config['smtp_host'] = "mail.rosyid.com";
        $config['smtp_port'] = "25";
        $config['smtp_user'] = "info@rosyid.com"; 
        $config['smtp_pass'] = "Sulistiani89";
        $config['charset'] = "utf-8";
        $config['mailtype'] = "html";
        $config['newline'] = "\r\n";
        $config['wordwrap'] = TRUE;
		
		$config['protocol'] = "smtp";
        $config['smtp_host'] = "mail.ismpl.com";
        $config['smtp_port'] = "25";
        $config['smtp_user'] = "sales@ismpl.com"; 
        $config['smtp_pass'] = "salesadmin";
        $config['charset'] = "utf-8";
        $config['mailtype'] = "html";
        $config['newline'] = "\r\n";
        $config['wordwrap'] = TRUE;
		
        $config['protocol'] = "smtps";
        $config['smtp_host'] = "ssl://smtp.gmail.com";
        $config['smtp_port'] = "465";
        $config['smtp_user'] = "hsbn89@gmail.com"; 
        $config['smtp_pass'] = "Sulistiani89";
        $config['charset'] = "utf-8";
        $config['mailtype'] = "html";
        $config['newline'] = "\r\n";
        $config['wordwrap'] = TRUE;
		
		
		$config['protocol'] = "smtps";
        $config['smtp_host'] = "ssl://smtp.gmail.com";
        $config['smtp_port'] = "465";
        $config['smtp_user'] = "ifarsolo@gmail.com"; 
        $config['smtp_pass'] = "ifarsolo123";
        $config['charset'] = "utf-8";
        $config['mailtype'] = "html";
        $config['newline'] = "\r\n";
        $config['wordwrap'] = TRUE;
		*/
		
        $ci->email->initialize($config);
        
		if($from != null){
            $ci->email->from($from,$nama);
        }else{
            $ci->email->from('no-reply@ismpl.com','(ISMPL MAIL SERVER)');
        }
        
		$ci->email->to($to);
        $ci->email->subject($subject);
        $ci->email->message($message);
        $send = $ci->email->send();
		if($send){
			return 'sent';
		}
    }
	
	function rand($length){
        $key = '';
        $keys = array_merge(range(0, 9), range('a', 'z'));
        for ($i = 0; $i < $length; $i++) {
            $key .= $keys[array_rand($keys)];
        }
        return $key;
    }
		
    # ENCRIPTION
    //$key = 'visione-system@12345'; ojo diganti
    var $key = 'visione-system@12345';
    function encrypt($string) {
            $result = '';
            for($i = 0; $i < strlen($string); $i++) {
                    $char = substr($string, $i, 1);
                    $keychar = substr($this->key, ($i % strlen($this->key))-1, 1);
                    $char = chr(ord($char) + ord($keychar));
                    $result .= $char;
            }

            return base64_encode($result);
    }

    function decrypt($string) {
            $result = '';
            $string = base64_decode($string);

            for($i = 0; $i < strlen($string); $i++) {
                    $char = substr($string, $i, 1);
                    $keychar = substr($this->key, ($i % strlen($this->key))-1, 1);
                    $char = chr(ord($char) - ord($keychar));
                    $result .= $char;
            }

            return $result;
    }
	
	//upload picture with resize
	function upload_picture($url,$name,$picture=null,$width=325,$height=325){
		$ci = & get_instance();
        $ci->load->library('upload');
		$ci->load->library('image_lib');
        $config['upload_path'] 		= $url; 
        $config['allowed_types'] 	= "gif|jpg|png|jpeg|bmp";
        $config['max_size'] 		= 3000;
        $config['encrypt_name'] 	= TRUE;
        $ci->upload->initialize($config);
        $logo='';
        if($ci->upload->do_upload($name)){
            $data=$ci->upload->data();
            $ci->image_lib->clear();
            $image['image_library'] = "GD2";
            $image['source_image'] 	= $data['full_path'];
            $image['new_image'] 	= $url.'resize/'.$data['file_name'];
            $size 					= getimagesize($_FILES[$name]["tmp_name"]);
            $image['maintain_ratio']= TRUE;
			$image['master_dim'] 	= 'auto';
			$image['width'] 		= $width;
			$image['height'] 		= $height;
            $ci->image_lib->initialize($image);
            $ci->image_lib->resize();
            $logo 	= $data['file_name'];
            if($picture!=null){
                @unlink($url.$picture);
                @unlink($url."resize/$picture");
            }
        }else{
			$logo = 'error';
		}
        return $logo;
    }
	
	function sluggify($url){
		# Prep string with some basic normalization
		$url = strtolower($url);
		$url = strip_tags($url);
		$url = stripslashes($url);
		$url = html_entity_decode($url);
	
		# Remove quotes (can't, etc.)
		$url = str_replace('\'', '', $url);
	
		# Replace non-alpha numeric with hyphens
		$match = '/[^a-z0-9]+/';
		$replace = '-';
		$url = preg_replace($match, $replace, $url);
	
		$url = trim($url, '-');
	
		return $url;
	}

    function removeSlash($text){
        # Prep string with some basic normalization
        $text = stripslashes($text);
    
        # Remove quotes (can't, etc.)
        $text = str_replace('\'', '', $text);
    
        # Replace non-alpha numeric with hyphens
        $match = '/[^a-z0-9]+/';
        $replace = '';
        $text = preg_replace($match, $replace, $text);
    
        return $text;
    }
	
	function limitChar($content, $limit=15){
		if (strlen($content) <= $limit) {
			return $content;
		} else {
			$hasil = substr($content, 0, $limit);
			return $hasil . "...";
		}
	}
	
	function notif($patern,$data1=null,$data2=null,$data3=null){
		$notif = lang($patern);
		
		if(!empty($data1)){
			$notif = str_replace("[1?]",$data1,$notif);
		}
		
		if(!empty($data2)){
			$notif = str_replace("[2?]",$data2,$notif);
		}
		
		if(!empty($data3)){
			$notif = str_replace("[3?]",$data3,$notif);
		}
		
		$notif = str_replace("[1?]","",$notif);
		$notif = str_replace("[2?]","",$notif);
		$notif = str_replace("[3?]","",$notif);
		
		return $notif;
	}

	function closetags ( $html )
        {
        #put all opened tags into an array
        preg_match_all ( "#<([a-z]+)( .*)?(?!/)>#iU", $html, $result );
        $openedtags = $result[1];
        #put all closed tags into an array
        preg_match_all ( "#</([a-z]+)>#iU", $html, $result );
        $closedtags = $result[1];
        $len_opened = count ( $openedtags );
        # all tags are closed
        if( count ( $closedtags ) == $len_opened )
        {
        return $html;
        }
        $openedtags = array_reverse ( $openedtags );
        # close tags
        for( $i = 0; $i < $len_opened; $i++ )
        {
            if ( !in_array ( $openedtags[$i], $closedtags ) )
            {
            $html .= "</" . $openedtags[$i] . ">";
            }
            else
            {
            unset ( $closedtags[array_search ( $openedtags[$i], $closedtags)] );
            }
        }
        return $html;
    }

    public function selisih($jam_masuk,$jam_keluar) {
        list($h,$m,$s) = explode(":",$jam_masuk);
        $dtAwal = mktime($h,$m,$s,"1","1","1");
        list($h,$m,$s) = explode(":",$jam_keluar);
        $dtAkhir = mktime($h,$m,$s,"1","1","1");
        $dtSelisih = $dtAkhir-$dtAwal;

        $totalmenit=$dtSelisih/60;
        $jam =explode(".",$totalmenit/60);
        $sisamenit=($totalmenit/60)-$jam[0];
        $sisamenit2=$sisamenit*60;
        $jml_jam=$jam[0];
        return $jml_jam;
    }
	
	function xTimeAgo ($oldTime, $newTime) {
        $timeCalc = strtotime($newTime) - strtotime($oldTime);       
        $timeCalc = round($timeCalc/60/60);
        return $timeCalc;
    }
	
}