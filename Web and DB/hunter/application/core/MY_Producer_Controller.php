<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class MY_Producer_Controller extends MY_Controller {

	function __construct() {
		
		parent::__construct();
		$data = array();
		$this->load->model("producer/producer_model","producer");
		$this->load->helper('admin');
		$this->producerid = $this->session->userdata('producerid');
		$this->producer_name = $this->session->userdata('producer_name');
		$this->user_type = $this->session->userdata('user_type');
		$this->load->library('pagination');
		$this->perPage = ($this->session->userdata("admin_length")?$this->session->userdata("admin_length"):10);
	}

	public function AdminSearchLength()
    {
        $this->session->set_userdata(array("admin_length"=>$_POST['length']));
        echo 1;die;
    }

    public function ChangeAdminPassword()
    {
    	$check = $this->common->getsData('admin',array('adminid'=>$this->adminid));
    	if(isset($_POST['password']) && md5($_POST['password']) == $check['password']){
    		if(isset($_POST['new_password']) && isset($_POST['confirm_password']) && ($_POST['new_password'] == $_POST['confirm_password']))
    		{
    			$res = $this->common->updateData('admin',array('password'=>md5($_POST['new_password']),'plain_password'=>$_POST['new_password']),array('adminid'=>$this->adminid));
    			if($res){
    				echo 1;
    			}else{
    				echo 0;
    			}
    		}else{
    			echo 0;
    		}
    	}die;
    }

	public function do_upload($file_name, $path)
    {
        $config['upload_path']   = $path;
        $config['allowed_types'] = 'jpeg|jpg|png|JPEG|JPG|PNG|gif|GIF';
        $config['encrypt_name']  = true;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload($file_name))
        {
                $error = array('error' => $this->upload->display_errors());
                return $error;
                //$this->load->view('upload_form', $error);
        }
        else
        {
                $data = array('upload_data' => $this->upload->data());

                return $data;
        }
    }

   	public function addProduct()
	{
		$productdata = $this->common->getField('products',$_POST);
		$productdata['product_upload_date'] = date('Y-m-d H:i:s');
		$productdata['upload_by'] = $this->producerid;
		$productdata['productid'] = md5(date('Y-m-d H:i:s'));
		$res = $this->common->insertData('products',$productdata);
		if($res){
			$dataInfo = array();
		    $files = $_FILES;
		    $product_media='';
		    if(isset($_FILES) && !empty($_FILES)){
			    $cpt = count($_FILES['product_photos']['name']);
			    for($i=0; $i<$cpt; $i++)
			    {
			    	$product_media =  'product_photos' ;         
			        $_FILES['product_photos']['name']= $files['product_photos']['name'][$i];
			        $_FILES['product_photos']['type']= $files['product_photos']['type'][$i];
			        $_FILES['product_photos']['tmp_name']= $files['product_photos']['tmp_name'][$i];
			        $_FILES['product_photos']['error']= $files['product_photos']['error'][$i];
			        $_FILES['product_photos']['size']= $files['product_photos']['size'][$i];    

			        //$this->upload->initialize($this->set_upload_options());
			       $upload_rslt = $this->do_upload($product_media,'assets/product_image');
			       // print_r($upload_rslt);die;
			       if(!empty($upload_rslt['upload_data'])){ 
				        $dataInfo[] = $upload_rslt['upload_data'];
				    }
			    }
			}
			if(isset($dataInfo) && !empty($dataInfo)){
				for($i=0; $i<$cpt; $i++)
			    {
			    	if($dataInfo[$i]['file_name']!=''){
			    		$p_img = 'assets/product_image/'.$dataInfo[$i]['file_name'];
			    	}else{
			    		$p_img = '';
			    	}
				    $data = array(
				        'product_id' => $productdata['productid'],
				        'product_image' => $p_img
				     );
		     		$res1 = $this->common->insertData('product_media',$data);
				}
			}
			$this->session->set_flashdata('message','Product Add Successfully');
		}else{
			$this->session->set_flashdata('emessage','Product Not Add');
		}
		redirect(base_url(P."/product-list"));


	}

	public function AddComment()
	{
		if($_POST['comment'] == ''){
			$this->session->set_flashdata('emessage','Please Enter Your Comment to submit the Form');
		}else{
			$_POST['producer_id'] = $this->producerid;
			$_POST['date'] = date('Y-m-d H:i:s');
			$res = $this->common->insertData('song_comments',$_POST);
			if($res){
				$this->session->set_flashdata('message','Comment Added');
			}else{
				$this->session->set_flashdata('message','Something Wrong');
			}
		}
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function LikeUserSOng()
	{
		$_POST['producer_id'] = $this->producerid;
		$likes = $this->common->getsdata('song_likes',array('songid'=>$_POST['songid'],'producer_id'=>$this->producerid));
		if($likes){
			echo 0;
		}else{
			$this->common->insertData('song_likes',$_POST);
			echo 1;
		}die;
	}

	public function RemoveProducerLike()
	{
		$_POST['producer_id'] = $this->producerid;
		$this->common->deleteData('song_likes',array('songid'=>$_POST['songid'],'producer_id'=>$this->producerid));
		if($this->db->affected_rows()){
			echo 1;
		}else{
			echo 0;
		}die;
	}

   	public function EditProduct()
	{
		$productdata = $this->common->getField('products',$_POST);
		$res = $this->common->updateData('products',$productdata,array('productid'=>$_POST['productid']));
		if($res){
			$dataInfo = array();
		    $files = $_FILES;
		    $product_media='';
		    if(isset($_FILES) && !empty($_FILES)){
			    $cpt = count($_FILES['product_photos']['name']);
			    for($i=0; $i<$cpt; $i++)
			    {
			    	$product_media =  'product_photos' ;         
			        $_FILES['product_photos']['name']= $files['product_photos']['name'][$i];
			        $_FILES['product_photos']['type']= $files['product_photos']['type'][$i];
			        $_FILES['product_photos']['tmp_name']= $files['product_photos']['tmp_name'][$i];
			        $_FILES['product_photos']['error']= $files['product_photos']['error'][$i];
			        $_FILES['product_photos']['size']= $files['product_photos']['size'][$i];    

			        //$this->upload->initialize($this->set_upload_options());
			       $upload_rslt = $this->do_upload($product_media,'assets/product_image');
			       // print_r($upload_rslt);die;
			       if(!empty($upload_rslt['upload_data'])){ 
				        $dataInfo[] = $upload_rslt['upload_data'];
				    }
			    }
			}
			if(isset($dataInfo) && !empty($dataInfo)){
				for($i=0; $i<$cpt; $i++)
			    {
			    	if($dataInfo[$i]['file_name']!=''){
			    		$p_img = 'assets/product_image/'.$dataInfo[$i]['file_name'];
			    	}else{
			    		$p_img = '';
			    	}
				    $data = array(
				        'product_id' => $productdata['productid'],
				        'product_image' => $p_img
				     );
		     		$res1 = $this->common->insertData('product_media',$data);
				}
			}
			$this->session->set_flashdata('message','Product Updated Successfully');
		}else{
			$this->session->set_flashdata('emessage','Product Not Add');
		}
		redirect($_SERVER['HTTP_REFERER']);


	}


	public function EditProfile()
	{
		if(isset($_POST['dob']) && $_POST['dob']!=''){
			$_POST['dob'] = date('Y-m-d',strtotime($_POST['dob']));
		}
		$check = $this->common->getsData('producers',array('producer_id'=>$this->producerid));
		if(isset($_POST) && !empty($_POST))
		{
			if(isset($_FILES['image']['name']) && $_FILES['image']['name'] != ""){
				if($check['image']!=''){
					unlink($check['image']);
				}
	           	$upload_rslt = $this->do_upload('image','assets/producers/');
	           	if(!empty($upload_rslt['upload_data'])){ 
					$filename = $upload_rslt['upload_data']['file_name'];
					$image = 'assets/producers/'.$filename;
		    		$productdata['image'] = $image;
	            }
	        }
	        $res = $this->common->updateData('producers',$_POST,array('producer_id'=>$this->producerid));
	        if($res){
	        	$this->session->set_flashdata('message','Profile Updated Successfully');
	        }else{
	        	$this->session->set_flashdata('emessage','Something Went Wrong');
	        }
		}
		redirect(base_url(P.'/edit-profile'));
	}

}