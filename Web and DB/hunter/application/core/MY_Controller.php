<?php defined('BASEPATH') OR exit('No direct script access allowed');

	class MY_Controller extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			$this->load->model('common_model','common');
			$this->config->load('custom');
			$this->load->library('cart');
			$this->load->helper('cart_helper');
			$this->lang->load('user');
			$this->load->library('email');
			$this->load->library('image_lib');
			$this->load->library('pagination');
			$this->load->helper('image');
			$segment = $this->uri->segment(1);
			$seg_array = array("product-detail");
			$this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
			$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
			if(!in_array($segment, $seg_array)){
				$this->output->set_header('Cache-Control: post-check=0, pre-check=0',false);
			}else{
				$this->output->set_header('Cache-Control: post-check=0, pre-check=0');
			}
			$this->output->set_header('Pragma: no-cache');
			$this->dollar = ($this->session->userdata('currency')=="USD")?'USD':'INR';
			$this->menu = $this->common->getCategories();
			$this->type = $this->session->userdata('type');
		}

		public function loadHtml($pagename='',$title='',$data=array(),$active='')
		{
			$data['title'] = $title;
			$data['active'] = $active;
			$is_logged_in = $this->session->userdata('is_logged_in');
			if(!isset($is_logged_in) || $is_logged_in != true)
			{
				$header = 'header';
				$this->load->view($header,$data);
			}else{
				$header = 'header';
			}
			$this->load->view($pagename,$data);
			$this->load->view('footer');
		}

		public function loadAdminHtml($pagename='',$title='',$data=array())
		{
			$data['head_title'] = $title;
			$is_admin_logged_in = $this->session->userdata('is_admin_logged_in');
			if(!isset($is_admin_logged_in) || $is_admin_logged_in != true)
			{
			}else{
				$header = 'admin-header';
				$this->load->view($header,$data);
			}
			if(!isset($is_admin_logged_in) || $is_admin_logged_in != true)
			{
			}else{
				$sidebar = 'admin-sidebar';
				$this->load->view($sidebar,$data);
			}
			$this->load->view($pagename,$data);
			if(!isset($is_admin_logged_in) || $is_admin_logged_in != true)
			{
			}else{
				$footer = 'admin-footer';
				$this->load->view($footer,$data);
			}
		}

		public function loadproducerHtml($pagename='',$title='',$data=array())
		{
			$data['head_title'] = $title;
			$is_logged_in = $this->session->userdata('is_user_logged_in');
			if(!isset($is_logged_in) || $is_logged_in != true)
			{
			}else{
				$header = 'producer-header';
				$this->load->view($header,$data);
			}
			if(!isset($is_logged_in) || $is_logged_in != true)
			{
			}else{
				$sidebar = 'producer-sidebar';
				$this->load->view($sidebar,$data);
			}
			$this->load->view($pagename,$data);
			if(!isset($is_logged_in) || $is_logged_in != true)
			{
			}else{
				$footer = 'producer-footer';
				$this->load->view($footer,$data);
			}
		}
	} 