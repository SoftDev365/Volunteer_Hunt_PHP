<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class MY_Profile_Controller extends MY_Controller
{
	Public function __construct(){
		parent::__construct();
		$this->load->model("profile_model","profile");
		$this->profileid = $this->session->userdata('profileid');
		$this->is_logged_in();
	}

	function is_logged_in()
	{
		//echo "<pre>"; print_r($this->session->all_userdata());die;
		$is_user_logged_in = $this->session->userdata('is_user_logged_in');
		//echo $is_user_logged_in;
		if(!isset($is_user_logged_in) || $is_user_logged_in != true)
		{
			//$this->session->set_userdata(array("current"=>uri_string()));
			redirect(base_url("user-login"));
		}
	}

	public function UpdateUserProfile()
	{
		$userdata = $this->common->getField("user",$_POST);
		$check = $this->common->getsData('user',array('profileid'=>$this->profileid));
		if($check){
			if(isset($_FILES['image']['name']) && $_FILES['image']['name']!='')
            {
                $filename = $_FILES['image']['name'];
	    		$path = 'assets/user-images/'.rand('0','9999')."-".$filename;
	    		$tmpname = $_FILES['image']['tmp_name'];
	    		if(move_uploaded_file($tmpname, $path)){
	    			if($check['image']!=''){
	    				unlink($check['image']);
	    			}
	    			$userdata['image'] = $path;
	    		}       
            }	
			$res = $this->common->updateData("user",$userdata,array("profileid"=>$this->profileid));
			if($res){
				$this->session->set_flashdata("message","Profile Update Successfully");
			}else{
				$this->session->set_flashdata("emessage","Profile Update Faild");

			}
		}
		redirect(base_url("user-profile"));
	}

	public function UploadSong()
	{
		$order = $this->common->getsData('orders',array('profileid'=>$this->profileid));
		// print_r($order);die;	
		if($order)
		{
			if($order['subscribe'] == 1 && $order['available_songs'] > 0){
				$_POST['profileid'] = $this->profileid;
				$_POST['songid'] = "SO".time();
				$_POST['date'] = date('Y-m-d H:i:s');
				$song = $this->common->getField('user_songs',$_POST);
				if(isset($_FILES['user_song']['name']) && $_FILES['user_song']['name']!='')
                {
                    $filename = $_FILES['user_song']['name'];
    	    		$path = 'assets/user-songs/'.rand('0','9999')."-".$filename;
    	    		$tmpname = $_FILES['user_song']['tmp_name'];
    	    		if(move_uploaded_file($tmpname, $path)){
    	    			$song['user_song'] = $path;
    	    		}       
                }
                $res = $this->common->insertData('user_songs',$song);
                if($res){
                	$avil = ($order['available_songs']-1);
                	$this->common->updateData('orders',array('available_songs'=>$avil),array('profileid'=>$this->profileid));
                	echo 1;
                }else{
                	echo 0;
                }
			}else{
				echo 2;
			}
		}die;
	}

	public function deleteSong($id)
	{
		$check = $this->common->getsData('user_songs',array('songid'=>$id));
		if($check){
			if($check['user_song']!=''){
				unlink($check['user_song']);
			}
			$this->common->deleteData('user_songs',array('songid'=>$id));
			$this->session->set_userdata('message','Song Deleted');
		}else{
			$this->session->set_userdata('emessage','Something Went Wrong');
		}
		redirect($_SERVER['HTTP_REFERER']);
	}




	public function updateBillingInformation()
	{
		$addressdata = $this->common->getField("user_address",$_POST);
		//echo "<pre>";print_r($this->profileid);die;
		$uad = $this->common->getData('user_address',array('profileid'=>$this->profileid));
		if($uad){
			$this->common->updateData("user_address",$addressdata,array("profileid"=>$this->profileid));
		}else{
			$addressdata['profileid'] = $this->profileid;
			$this->common->insertData("user_address",$addressdata);
		}
		if($this->db->affected_rows()){
			$this->session->set_flashdata("message","Billing Address Update Successfully");
		}else{
			$this->session->set_flashdata("emessage","Billing Address Update Faild");

		}
		redirect(base_url("add-billing-address"));
	}

	public function updateShippingInformation()
	{
		$addressdata = $this->common->getField("user_address",$_POST);
		//echo "<pre>";print_r($addressdata);die;
		$uad = $this->common->getData('user_address',array('profileid'=>$this->profileid));
		if($uad){
			$this->common->updateData("user_address",$addressdata,array("profileid"=>$this->profileid));
		}else{
			$addressdata['profileid'] = $this->profileid;
			$this->common->insertData("user_address",$addressdata);
		}
		if($this->db->affected_rows()){
			$this->session->set_flashdata("message","Shipping Address Update Successfully");
		}else{
			$this->session->set_flashdata("emessage","Shipping Address Update Faild");

		}
		redirect(base_url("add-shipping-address"));
	}

}