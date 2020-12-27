<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class User_login_model extends CI_Model 
{

	public function loginValidate($post=array())
	{
		$this->db->select("*");
		$this->db->from("user");
		if(is_numeric($_POST['email']))
		{
			$this->db->where("mobile_no",$_POST['email']);
		}else{
			$this->db->where("email",$_POST['email']);
		}
		$this->db->where("password",md5($_POST['password']));
		$query = $this->db->get();
		$result = $query->result_array();
		// print_r($result);die;
		if($result){
			return $result;
		}else{
			return false;
		}
	}

	public function registerUser($post=array()) {
		$userdata = $profiledata = array();
		if(is_array($post) && !empty($post))
		{
			$userdata = $this->common->getField('user',$post);	
			$res = $this->db->insert('user',$userdata);
			return $res;
		}
	}



}