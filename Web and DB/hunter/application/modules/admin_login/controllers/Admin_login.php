<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_Login extends MY_Controller {

	public function __construct() { 
		parent::__construct();
		$this->is_logged_in();
	}

	function is_logged_in()
	{
		$is_admin_logged_in = $this->session->userdata('is_admin_logged_in');
		if(!isset($is_admin_logged_in) || $is_admin_logged_in != true)
		{
		}else{
			redirect(base_url(A));
		}
	}

	public function index()
	{
		$this->loadAdminHtml("login","Login Page");
	}

	public function adminLoginPage()
	{
		$this->loadAdminHtml("login","Login Page");
	}

	public function doLogin()
	{
		if(isset($_POST['email']) && isset($_POST['password']))
			{
				if($data = $this->common->getData('admin',array('email'=>$_POST['email'],'password'=>md5($_POST['password']))))
				{
					if(($data[0]['email']!=$_POST['email']) || ($data[0]['password']!=md5($_POST['password'])))
					{
						$this->session->set_flashdata('emessage','User name or Password Wrong');
						redirect(base_url(A."-login"));
					}else{
						$this->loginRedirect($_POST['email'],$data[0]['adminid']);
					}
				}else{
					$this->session->set_flashdata('emessage','User name or Password Wrong');
					redirect(base_url(A."-login"));
				}
			}
	}

	public function loginRedirect($email='',$adminid='')
	{
		$sdata = array(
			'admin_email' => $email,
			'adminid' => $adminid,
			'is_admin_logged_in' => true
		);
		$this->session->set_userdata($sdata);
		redirect(base_url(A));
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */