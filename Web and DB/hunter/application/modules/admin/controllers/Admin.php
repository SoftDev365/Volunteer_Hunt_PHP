<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Admin_Controller {

	Public function __construct() { 
		parent::__construct();
		$this->is_logged_in();		
	}

	public function is_logged_in(){

		$is_admin_logged_in = $this->session->userdata('is_admin_logged_in');
		if(!isset($is_admin_logged_in) || $is_admin_logged_in != true){

			redirect(base_url(A."-login"));
		}
	}

	/*public function counter(){
		$c_data=$this->common->getData("site_visit");
        foreach ($c_data as $key => $value) {
        	$visit[]= $value['count'];
        }
        return array_sum($visit);
	}*/

	public function index()
	{
		// $data['t_order'] = $this->admin->getOrderCount('orders');
		// $data['tc_order'] = $this->admin->getOrderCount('orders',array('order_status'=>5));
		// $data['tp_order'] = $this->admin->getOrderCount('orders',array('order_status'=>1));
		// $data['tco_order'] = $this->admin->getOrderCount('orders',array('order_status'=>4));

		// $data['total_product'] = $this->admin->getTotalEntryCount('products',array(),'pid');
		$data['total_user'] = $this->admin->getTotalEntryCount('user',array('user_type'=>'register_user'),'id');
		$this->loadAdminHtml("index","Home Page",$data);
	}

	public function addCategoryPage()
	{
		$data['category'] = $this->admin->getCategories();
		$this->loadAdminHtml("add-category","Add Category",$data);
	}

	public function categoryListPage()
	{
		$data['allcategory'] = $this->admin->getCategories();
		$this->loadAdminHtml('category-list','All Category List',$data);
	}

	public function categoryHomeBannerPage()
	{	
		$data['category'] = $this->common->getData('category');
		$data['cathomebanner'] = $this->common->getData("home_cat_banner",array(),array(),array('field'=>'id','by'=>'desc'));
		$this->loadAdminHtml('home-cat-banner','Add Banner',$data);
	}

	public function UserSongsPage()
	{
		// $data['dollar'] = $this->common->getsData('dollarprice',array('id'=>1));
		$this->loadAdminHtml("user-songs","User Songs");
	}

	public function addProducerPage()
	{
		$data['category'] = $this->admin->getCategories();
		$this->loadAdminHtml('add-producer','Add Producer',$data);
	}

	public function allProducersList($limit='')
	{
		$data['producer'] = $this->common->getData("producers",array(),array());
		$this->loadAdminHtml('producer-list','Producer List',$data);
	}

	public function allProductList()
	{
		$data['pro'] = $this->common->getData("products",array(),array());
		$this->loadAdminHtml('product-list','Product List',$data);
	}


	public function EditProducerPage($productid='')
	{	
		$data['category'] = $this->admin->getCategories();
		$data['profile'] = $this->common->getsData("producers",array("producer_id"=>$productid));
		$this->loadAdminHtml('edit-producer','Edit Producer',$data);
	}

	public function Watchvideopage($id)
	{
		$data['video'] = $this->common->getsData('videos',array('video_id'=>$id));
		$this->loadAdminHtml('watch-video','Watch Video',$data);
	}


	public function AddVideoPage()
	{
		$data['category'] = $this->common->getData('category',array('show'=>1));
		$this->loadAdminHtml('add-video','Add Video',$data);
	}


	public function EditVideoPage($id)
	{
		$data['category'] = $this->common->getData('category',array('show'=>1));
		$data['video'] = $this->common->getsData('videos',array('video_id'=>$id));
		$this->loadAdminHtml('edit-video','Edit Video',$data);
	}


	public function AllVideoListPage()
	{
		$data['post'] = $this->common->getData('videos',array(),array(),array('field'=>'id','by'=>'desc'));
		$this->loadAdminHtml('video-list','Video List',$data);
	}

	public function SubscriptionSettingPage()
	{	
		$data['sub'] = $this->common->getData("subscription");
		$this->loadAdminHtml('subscription','Subscription',$data);
	}
	public function editSubsciptionPage($id)
	{	
		$data['sub'] = $this->common->getsData("subscription",array('id'=>$id));
		$this->loadAdminHtml('edit-subscription','Edit Subscription',$data);
	}
	public function addLeftimagePage()
	{	
		$data['left'] = $this->common->getData("left_image");
		$this->loadAdminHtml('Left-image','Add Left Image',$data);
	}

	public function addBelowSliderBannerPage()
	{	
		$data['slider'] = $this->common->getData("slider",array('type'=>'catbanner'),array(),array('field'=>'id','by'=>'desc'));
		$data['category'] = $this->common->getData("category");
		$this->loadAdminHtml('below-sliderbanner','Add Banner',$data);
	}

	public function allOrderListPage()
	{
		$data['orders'] = $this->admin->getOrders();
		$this->loadAdminHtml('all-order-list','All Orders',$data);
	}

	public function orderInvoice($orderid='')
	{
		$data['invoice'] = $this->admin->getOrders($orderid,1);
		
		$data['order_status'] = $this->common->getData("order_status");
		$data['cart'] = $this->common->getData("cart_mapping",array("orderid"=>$data['invoice']['orderid']),array(),array(),array("field"=>"cmid","by"=>"asc"));
		//$data['cancle_orders'] = $this->admin->getCancleOrder(array("O.orderid"=>$orderid));
		$this->loadAdminHtml('order-invoice','Orders Invoice',$data);
	}

	public function calculateGstPage()
	{	
		$where = array();
		if(isset($_GET['date']) && $_GET['date']!=''){
			$where['date'] = $_GET['date'];
		}
		if(isset($_GET['category']) && $_GET['category']!=''){
			$where['category'] = $_GET['category'];
		}
		if(!empty($where)){
			$data['gst'] = $this->admin->calculateGst($where);
			// echo "<pre>";
			// echo $this->db->last_query();
			// print_r($data);die;
		}
		$data['category'] = $this->common->getData('category');
		$this->loadAdminHtml('gst','Calculate Gst',$data);
	}

	public function cancleOrderList()
	{
		$data['orders'] = $this->admin->getCancleOrder();
		$this->loadAdminHtml('cancle-order-list','Cancle Orders',$data);
	}

	public function usersListPage()
    {
    	$data['users'] = $this->common->getData("user");
    	$this->loadAdminHtml('users-list','All Users List',$data);
    }

	public function pincodeListPage($limit='')
    {
    	$get=array();
        if (isset($_GET)) {
            $get = $_GET;
        }
        if($limit!="")
        {
            $get['limit'] = $limit;            
        }
        $get['base_url'] = base_url(A.'/pincode-list');

		$where = array("P.type"=>"0");
		$data = $this->admin->getPincodeWithpag($where,$get);
		// echo $this->db->last_query();
		// echo "<pre>";
		// print_r($data); die;
		$data['k'] = ($limit!="")?$limit+1:1;
    	$this->loadAdminHtml('pincode-list','All Pincode List',$data);
    }

    public function productNotifyListPage()
    {
    	$data['users'] = $this->common->getData("product_notify");
    	$this->loadAdminHtml('product-notify-list','Product Notify Users List',$data);
    }

    public function reportSearchPage()
	{
		$data['category'] = $this->common->getData("category",array(),array("c_id","category"));
		$data['order_status'] = $this->common->getData("order_status");
		$this->loadAdminHtml('report-search','Report Search Page',$data);
	}

    public function AffilatedMarketingPage()
	{
		$data['category'] = $this->common->getData("category",array(),array("c_id","category"));
		$data['affilate'] = $this->admin->getAffilated();
		// print_r($data['affilate']);die;
		$this->loadAdminHtml('affilate-detail','Affilated Details',$data);
	}



	function logout(){

		$this->session->unset_userdata('email');
		$this->session->unset_userdata('adminid');
		$this->session->unset_userdata('admin_type');
		$this->session->unset_userdata('is_admin_logged_in');
		redirect(base_url(A."-login"));
	}
}
