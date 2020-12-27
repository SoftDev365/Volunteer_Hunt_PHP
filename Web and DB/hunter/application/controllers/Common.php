<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Common extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$data = array();
		$this->adminid = $this->session->userdata('adminid');
		$this->load->model("common_model","common");
	}
	public function index()
	{
		echo "common";
	}
	public function rmdirRecursive($dir)
	{
	    foreach(scandir($dir) as $file) {
	        if ('.' === $file || '..' === $file) continue;
	        if (is_dir("$dir/$file")) $this->rmdirRecursive("$dir/$file");
	        else unlink("$dir/$file");
	    }
	    rmdir($dir);
	}
	public function ajaxDelete()
	{
		$table = $_POST['table'];
		unset($_POST['table']);
		$fields = $this->common->getField($table,$_POST);
		$key = key($fields);
		//print_r($fields);print_r($key);die;
		$this->common->deleteData($table,$fields);
		if($this->db->affected_rows())
		{
			$dir = $_POST['image'];
			//echo $dir;
			if(is_dir($dir))
			{
				$this->rmdirRecursive($dir);
				//unlink($dir);
			}
			if(is_file($dir)){
				unlink($dir);
			}
			echo "1";
		}else{
			echo "0";
		}die;
	}

	public function setCurrency()
	{
		if($_POST['currency']){
			$this->session->set_userdata('currency',$_POST['currency']);
			echo 1;
		}else{
			echo 0;
		}
	}

}