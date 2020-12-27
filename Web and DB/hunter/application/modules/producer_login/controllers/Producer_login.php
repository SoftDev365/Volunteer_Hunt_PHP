<?php if (!defined('BASEPATH')) exit('No direct script access allowed');



class Producer_login extends MY_Controller {



    Public function __construct(){

        parent::__construct();

        $this->load->model("producer_login_model","plogin");
        $this->load->helper('front_helper');

    }

    public function loginPage()
    {
    	if(isset($_GET['url']) && !empty($_GET['url'])){
    		$url = base64_decode($_GET['url']);
    		// print_r($url);die;
    		$this->session->set_userdata('current',$url);
    	}
    	$this->loadHtml('login','User Login Page');
    }

    public function registrationPage()
    {
    	$this->loadHtml('registration','User Registration Page');
    }

    public function GuestregistrationPage()
    {
    	$this->loadHtml('guest-registration','Guest User Registration Page');
    }


    function is_logged_in()
	{
		//print_r($this->session->all_userdata());die;

		$is_user_logged_in = $this->session->userdata('is_user_logged_in');
		if(!isset($is_user_logged_in) || $is_user_logged_in != true)
		{

		}else{
			redirect(base_url());
		}

	}

	public function doLogin()
	{
		$error=1;
		$message=$location='';
		if(!isset($_POST['login']))
		{
			$_POST['login'] = 'login';
		}
		if((isset($_POST['email']) && isset($_POST['password'])) || isset($_POST['login']))
		{
			$data = $this->plogin->loginValidate($_POST);
			// print_r($data);die;
			if($data)
			{
				if($data[0]['approved'] == 0){
					$this->session->set_flashdata('emessage','Your profile is not verified yet');
					$location = base_url('producer-login');
				}
				if((($data[0]['email']!=$_POST['email']) || ($data[0]['mobile_no']!=strtolower($_POST['email']))) && ($data[0]['password']!=md5($_POST['password'])))
				{
					$this->session->set_flashdata("emessage",'Something Went Wrong,Please Try Again');
					$location = base_url("producer-login");
				}else{
					$location = $this->loginRedirect($data[0]);
				}
			}else{
				$this->session->set_flashdata("emessage",'Something Went Wrong,Please Try Again');
				$location = base_url("producer-login");
			}
		}else{
			$this->session->set_flashdata("emessage",'Something Went Wrong,Please Try Again');
			$location = base_url("producer-login");
		}
		redirect($location);
	}

	public function loginRedirect($data=array())
	{
		// print_r($data);die;
		$sdata = array(
			'email' => $data['email'],
			'producer_name' => $data['name'],
			'producerid'	=>	$data['producer_id'],
			'is_user_logged_in' => true,
			'user_type' => "producer"
		);

		$this->session->set_userdata($sdata);
		if($this->session->userdata("current")){
			$redirect = base_url($this->session->userdata("current"));
			$this->session->unset_userdata("current");
		}else{
			$redirect = base_url('producer');
		}
		return $redirect;
	}

	public function sociallogin()
    {    	
	  	$data['name'] = strtolower($this->input->post('fname')).' '.strtolower($this->input->post('lname'));
	  	$data['email'] = $this->input->post('email');
	  	//print_r($data['email']); die;
	  	$result = $this->common->getsData('user',array('email'=>$data['email']));
	  	//echo "<pre>"; print_r($result); die;
	  	if(empty($result)){
	  		$data['profileid'] = strtotime(date("Y-m-d H:i:s"));
			$data['reg_date'] = date("Y-m-d H:i:s");
			$data['user_type'] = 'register_user';
	  		$this->common->insertData('user',$data);
	  	}else{
	  		$data['profileid'] = $result['profileid'];
	  	}

		$location = $this->loginRedirect($data);		

		redirect($location);
    }


	public function registerUser()
	{
		// print_r($_POST);die;
		if(isset($_POST)){
			$message=$location='';
			$_POST['plan_text'] = $_POST['password'];
			$_POST['password'] = md5($_POST['password']);
			$_POST['producer_id'] = "RSP".strtotime(date("Y-m-d H:i:s"));
			$_POST['reg_date'] = date("Y-m-d H:i:s");
			$_POST['user_type'] = 'register_user';
			if($this->common->getData("producers",array("email"=>$_POST['email'])))
			{
				$this->session->set_flashdata("emessage",$this->lang->line("email_exist"));
				$location=base_url("user-login");
			}else if($this->common->getData("producers",array("mobile_no"=>$_POST['mobile_no']))){
				$this->session->set_flashdata("emessage",$this->lang->line("mobile_exist"));
				$location=base_url("user-login");
			}else{
				$res = $this->plogin->registerUser($_POST);
				if($res){
					$this->session->set_flashdata('message','Successfully Registered Please wait until admin approve your profile');
					$location = base_url('producer-login');
				}else{
					$this->session->set_flashdata('message','Something went wrong');
					$location = base_url("producer-login");
				}
			}
			redirect($location);
		}		

	}

	public function GuestUserregister()
	{
		// print_r($_POST);die;
		if(isset($_POST)){
			$message=$location='';
			$_POST['password'] = md5($_POST['password']);
			$_POST['user_type'] = 'register_user';
			if($this->common->getsData("user",array("email"=>$_POST['email'],'user_type'=>'guest_user'))){
				$res = $this->common->updatedata('user',$_POST,array('email'=>$_POST['email']));
				if($res){
					$this->session->set_flashdata("message",'Thankyou For Register with Us, Login to access Account');
					$location = base_url("user-login");
				}else{
					$location = base_url("user-login");
				}
			}
			else if($this->common->getData("user",array("email"=>$_POST['email'],'user_type'=>'register_user')))
			{
				$this->session->set_flashdata("emessage",$this->lang->line("email_exist"));
				$location=base_url("user-login");
			}else if($this->common->getData("user",array("mobile_no"=>$_POST['mobile_no'],'user_type'=>'register_user'))){
				$this->session->set_flashdata("emessage",$this->lang->line("mobile_exist"));
				$location=base_url("user-login");
			}else if($this->common->getData("user",array("mobile_no"=>$_POST['mobile_no'],'user_type'=>'guest_user'))){
				$res = $this->common->updatedata('user',$_POST,array('mobile_no'=>$_POST['mobile_no']));
				if($res){
					$this->session->set_flashdata("message",'Thankyou For Register with Us, Login to access Account');
					$location = base_url("user-login");
				}else{
					$location = base_url("user-login");
				}
			}
			redirect($location);
		}		

	}

	public function forgetPasswordPage()
	{
		$this->loadHtml("forget_password","Forget Password");
	}

	public function forgetPassword()
	{
		$email = $_POST['email'];
		if(isset($email))
		{
			if($data = $this->common->getsData('user',array('email'=>$email,"user_type"=>"register_user")))
			{
				$list= array();
				$characters = '0123456789';
				$length = 4;
			    $charactersLength = strlen($characters);
			    $randomString = '';
			    for ($i = 0; $i < $length; $i++) {
			        $randomString .= $characters[rand(0, $charactersLength - 1)];
			    }
			    $this->common->updateData('user',array('password'=>md5($randomString)),array('profileid'=>$data['profileid']));
			    $email_message = "Dear User ,It is Your Auto Generate password ".$randomString." Please login with this password Do not share it with any one. http://suchetas.com/user-login";
			    //echo $email_message."<br>";
			    //echo $email."<br>";
				$this->email->from('info@suchetas.com','Password Changed');
				$this->email->to($email);
				$this->email->subject('Forgot Password');
				$this->email->message($email_message);
				$this->email->send();

				$this->session->set_flashdata('message',"Password Sent Your Email. Please Check Your Email.");
				redirect(base_url("user-login"));
			}else{
				$this->session->set_flashdata('emessage','Something Went Wrong. Please Try Again.');
				redirect(base_url("forgot-password"));
			}
		}
	}

}