<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class MY_Admin_Controller extends MY_Controller {

	function __construct() {
		
		parent::__construct();
		$data = array();
		$this->load->model(A."/admin_model","admin");

		$this->load->helper('admin');

		$this->adminid = $this->session->userdata('adminid');
		$this->admin_name = $this->session->userdata('admin_name');
		$this->admin_type = $this->session->userdata('admin_type');
		$this->load->library('pagination');
		$this->perPage = ($this->session->userdata("admin_length")?$this->session->userdata("admin_length"):10);
	}

	public function AdminSearchLength()
    {
        $this->session->set_userdata(array("admin_length"=>$_POST['length']));
        echo 1;die;
    }

    public function setBestSellingProducts()
	{
		$result = $this->common->updateData("producers",array('approved'=>$_POST['approved']),array('producer_id'=>$_POST['producer_id']));
		if($result){
			echo "1";
		}else{
			echo "0";
		}die;
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



	public function addCategory()
	{
		//print_r($_POST); die;
		if(isset($_POST['addcategory']))
		{
			if(isset($_FILES['image']['name']) && $_FILES['image']['name'] != ""){
	           	$upload_rslt = $this->do_upload('image','assets/categories/');
	           	if(!empty($upload_rslt['upload_data'])){ 
					$filename = $upload_rslt['upload_data']['file_name'];
					$image = 'assets/categories/'.$filename;
		    		$_POST['image'] = $image;
	            }
	        }
			$res = $this->admin->insertCategories($_POST,'category');
			if($res){
				$this->session->set_flashdata('message','Category Added');
			}else{
				$this->session->set_flashdata('emessage','Category is Not Add Please Try Again.');
			}
		}

		redirect(base_url(A."/add-category"));

	}


	public function editCategory()
	{ 
	    $check = $this->common->getsData('category',array('c_id'=>$_POST['catid']));
		if(isset($_FILES['image']['name']) && $_FILES['image']['name'] != ""){
		    if($check['image']!=''){
		        unlink($check['image']);
		    }
           $upload_rslt = $this->do_upload('image','assets/categories/');
            if(!empty($upload_rslt['upload_data'])){ 
			    $image1 = $upload_rslt['upload_data']['file_name'];	
			    $image =  'assets/categories/'.$image1; 
        		$_POST['image'] = $image;
            }
        }
        $catid = $_POST['catid'];
        unset($_POST['catid']);
        unset($_POST['old_img']);
        unset($_POST['old_bannerimg']);
        unset($_POST['old_backimg']);
        $res = $this->common->updateData('category',$_POST,array('c_id'=>$catid));
        if($res){
			$this->session->set_flashdata('message','Category Update Successfully');
		}else{
			$this->session->set_flashdata('emessage','Category Not Update');
		}
		redirect(base_url(A."/all-category"));

	}

	public function deleteCategory()
	{
		if($this->admin->deleteCategory($_POST))
		{
			echo 1;
		}else{
			echo 0;
		}die;
	}

	public function checkCategory()
	{
		if($this->common->updateData('category',array('show'=>$_POST['val']),array('c_id'=>$_POST['id'])))
		{
			echo 1;
		}else{
			echo 0;
		}die;
	}
	
	public function uploadVideo()
	{
		$productdata = $this->common->getField('videos',$_POST);
		if(isset($_POST) && $_POST)
		{	
		  	$productdata['video_id'] = md5(date('Y-m-d H:i:s'));
			if(isset($_POST['video_type']) && $_POST['video_type'] == 1){
                if(isset($_FILES['uploaded_video']['name']) && $_FILES['uploaded_video']['name']!='')
                {
                    $filename = $_FILES['uploaded_video']['name'];
    	    		$path = 'assets/uploaded_video/'.rand('0','9999')."-".$filename;
    	    		$tmpname = $_FILES['uploaded_video']['tmp_name'];
    	    		if(move_uploaded_file($tmpname, $path)){
    	    			$productdata['uploaded_video'] = $path;
    	    		}       
                }
            }
			if(isset($_FILES['image']['name']) && $_FILES['image']['name'] != ""){
	           	$upload_rslt = $this->do_upload('image','assets/video-thumb/');
	           	if(!empty($upload_rslt['upload_data'])){ 
					$filename = $upload_rslt['upload_data']['file_name'];
					$image = 'assets/video-thumb/'.$filename;
		    		$productdata['image'] = $image;
	            }
	        }
			$res = $this->common->insertData('videos',$productdata);
			if($res){
				$this->session->set_flashdata('message','Video is uploaded');
			}else{
				$this->session->set_flashdata('message','Something Went Wrong, Please try again');
			}
		}
		redirect(base_url(A.'/video-list'));
	}

	public function EditVideo()
	{
		$productdata = $this->common->getField('videos',$_POST);
		$check = $this->common->getsData('videos',array('video_id'=>$_POST['video_id']));
		if(isset($_POST) && $_POST){
			if(isset($_POST['video_type']) && $_POST['video_type'] == 1){
                if(isset($_FILES['uploaded_video']['name']) && $_FILES['uploaded_video']['name']!='')
                {
                    
                    $filename = $_FILES['uploaded_video']['name'];
    	    		$path = 'assets/uploaded_video/'.rand('0','9999')."-".$filename;
    	    		$tmpname = $_FILES['uploaded_video']['tmp_name'];
    	    		if(move_uploaded_file($tmpname, $path)){
    	    			if($check['uploaded_video']!=''){
    	    				unlink($check['uploaded_video']);
    	    			}
    	    			$video = $path;
    	    		}
                    
                }
            }
			if(isset($_FILES['image']['name']) && $_FILES['image']['name'] != ""){
				if($check['image']!=''){
					unlink($check['image']);
				}
	           	$upload_rslt = $this->do_upload('image','assets/video-thumb/');
	           	// print_r($upload_rslt);die;
	           	if(!empty($upload_rslt['upload_data'])){ 
					$filename = $upload_rslt['upload_data']['file_name'];
					$image = 'assets/video-thumb/'.$filename;
		    		$productdata['image'] = $image;
	            }
	        }
			$res = $this->common->updateData('videos',$productdata,array('video_id'=>$_POST['video_id']));
			if($res){
				$this->session->set_flashdata('message','Video is Updated');
			}else{
				$this->session->set_flashdata('message','Something Went Wrong, Please try again');
			}
		}
		redirect(base_url(A.'/video-list'));
	}

	public function updateSubscription()
	{
		if(isset($_POST) && !empty($_POST))
		{
			$res = $this->common->updateData('subscription',$_POST,array('id'=>$_POST['id']));
			if($res){
				$this->session->set_flashdata('message','Subscription Details Updated');
			}else{
				$this->session->set_flashdata('message','Something Went Wrong');
			}
		}
		redirect(base_url(A.'/subscriptions'));
	}

	public function deleteVideo($id)
	{
		$check = $this->common->getsData('videos',array('video_id'=>$id));
		$this->common->deleteData('videos',array('video_id'=>$id));
		if($this->db->affected_rows()){
			if($check['video_type'] == 1){
				if($check['uploaded_video']!=''){
					unlink($check['uploaded_video']);
				}
			}
			if($check['image']!=''){
				unlink($check['image']);
			}
			$this->session->set_flashdata('message','Video Deleted');
		}else{
			$this->session->set_flashdata('emessage','Something Went Wrong');
		}
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function addProducer()
	{
		if(isset($_POST['dob']) && $_POST['dob']!=''){
			$_POST['dob'] = date('Y-m-d',strtotime($_POST['dob']));
		}
		$productdata = $this->common->getField('producers',$_POST);
		if(isset($_POST) && !empty($_POST))
		{
			$productdata['producer_id'] = "RSP".time();
			$productdata['date'] = date('Y-m-d H:i:s');
			$productdata['approved'] = '1';
			$productdata['plan_text'] = $_POST['password'];
			$productdata['password'] = md5($_POST['password']);
			if(isset($_FILES['image']['name']) && $_FILES['image']['name'] != ""){
	           	$upload_rslt = $this->do_upload('image','assets/producers/');
	           	if(!empty($upload_rslt['upload_data'])){ 
					$filename = $upload_rslt['upload_data']['file_name'];
					$image = 'assets/producers/'.$filename;
		    		$productdata['image'] = $image;
	            }
	        }
	        $res = $this->common->insertData('producers',$productdata);
	        if($res){
	        	$this->session->set_flashdata('message','Producer Added Successfully');
	        }else{
	        	$this->session->set_flashdata('emessage','Something Went Wrong');
	        }
		}
		redirect(base_url(A.'/producers-list'));
	}

	public function deleteProduct($id)
	{
		$this->common->deleteData('products',array('productid'=>$id));
		if($this->db->affected_rows()){
			$check = $this->common->getData('product_media',array('product_id'=>$id));
			if($check){
				foreach ($check as $key => $value) {
					unlink($value['product_image']);
				}
				$this->common->deleteData('product_media',array('product_id'=>$id));
			}
			$this->session->set_flashdata('message','Product Deleted');
		}else{
			$this->session->set_flashdata('emessage','Something Went Wrong');
		}
		redirect(base_url(A.'/product-list'));
	}

	public function deleteProducer($id)
	{
		$check = $this->common->getData('producers',array('producer_id'=>$id));
		$this->common->deleteData('producers',array('producer_id'=>$id));
		if($this->db->affected_rows()){
			if($check['image']!=''){
				unlink($value['image']);
			}
			$this->session->set_flashdata('message','Producer Deleted');
		}else{
			$this->session->set_flashdata('emessage','Something Went Wrong');
		}
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function EditProducer()
	{
		$email = $this->common->getsData('producers',array('email'=>$_POST['email'],'producer_id!='=>$_POST['producer_id']));
		if($email){
			$this->session->set_flashdata('emessage','Email Already Registered with other Account');
			redirect($_SERVER['HTTP_REFERER']);
		}
		if(isset($_POST['dob']) && $_POST['dob']!=''){
			$_POST['dob'] = date('Y-m-d',strtotime($_POST['dob']));
		}
		$_POST['plan_text'] = $_POST['password'];
		$_POST['password'] = md5($_POST['password']);
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
	        $res = $this->common->updateData('producers',$_POST,array('producer_id'=>$_POST['producer_id']));
	        if($res){
	        	$this->session->set_flashdata('message','Producer Detail Updated Successfully');
	        }else{
	        	$this->session->set_flashdata('emessage','Something Went Wrong');
	        }
		}
		redirect($_SERVER['HTTP_REFERER']);
	}
}