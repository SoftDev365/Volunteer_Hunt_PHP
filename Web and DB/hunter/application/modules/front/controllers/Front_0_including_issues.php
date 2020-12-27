<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Front extends MY_Front_Controller {



    Public function __construct(){

        parent::__construct(); 

        $this->load->helper('text');



    }




    public function index()
    {
        $this->loadHtml('index');
    }

    public function Loginpage()
    {
        $this->loadHtml('login-select',"Select Login");
    }

    public function getCategoryListPage($cat='',$cid='')

    {

        $data['maincat'] = str_replace('-', ' ', $cat);

        $data['catimages'] = $this->common->getsData('category',array('c_id'=>$cid));

        $data['category']=$this->common->getData('category',array('parent'=>$cid));

        $this->loadHtml('category-list','product category list',$data);

    }

    public function getSubCategoryListPage($cat='',$scat='',$cid='')

    {

        $data['maincat'] = str_replace('-', ' ', $cat);

        $data['subcat'] = str_replace('-', ' ', $scat);

        $data['catimages'] = $this->common->getsData('category',array('c_id'=>$cid));

        $data['category']=$this->common->getData('category',array('parent'=>$cid));

        $this->loadHtml('subcat-list','product category list',$data);

    }



    public function getAllProducts($offset=''){

        $where = array();
        $data['category_title'] = array("category"=>"All Products");

        if(isset($_GET['usd']) && $_GET['usd']!=''){

                $where['usd']=$_GET['usd'];

        }

        if(isset($_GET['price']) && $_GET['price']!=''){

            $where['price']=$_GET['price'];

        }

        if(isset($_GET['product']) && $_GET['product']!=''){

            $where['product']=$_GET['product'];

        }

        if(isset($_GET['category']) && $_GET['category']!=""){

            $where["category"]=$_GET['category'];

        }

        if(isset($_GET['per_page']) && $_GET['per_page']!=''){

            $offset = $_GET['per_page'];

        }

        $config =  array(

                'page_query_string' => true,

                'base_url' => base_url('products/all-products/pr'),

                'per_page' =>12,

                'total_rows' => $this->front->countProduct('products'),

                'full_tag_open' => "<ul class='pages-box'>",

                'full_tag_close' => "</ul>",

                'first_tag_open' => '<li class="square-button">',

                'first_tag_close' => '</li>',

                'last_tag_open' => '<li class="square-button">',

                'last_tag_close' => '</li>',

                'next_tag_open' => '<li class="square-button">',

                'next_tag_close' => '</li>',

                'prev_tag_open' => '<li class="square-button">',

                'prev_tag_close' => '</li>',

                'num_tag_open' => '<li class="square-button">',

                'num_tag_close' => '</li>',

                'cur_tag_open' => "<li class='square-button active'><a style='color:#fff;'>",

                'cur_tag_close' => "</a></li>"

                 );

        $this->pagination->initialize($config);
        $data['products'] = $this->front->getProducts($where,$config["per_page"],$offset);
        $data['links'] = $this->pagination->create_links();
        $data['h1'] = $this->pagination->totalRecords();
        $data['h2'] = $this->pagination->noOfRecords();
        $this->loadHtml('shop','Shop',$data);

    }



    public function shopPage($category_name='',$pr='',$offset='')

    {

        $where = array();

        if(isset($_GET['catid']) && $_GET['catid']!=""){



            $catid = $_GET['catid'];



            $data['category_title'] = $this->common->getsData('category',array('c_id'=>$catid));

            $where["product_category"]=$catid;



            if(isset($_GET['usd']) && $_GET['usd']!=''){

                $where['usd']=$_GET['usd'];

            }



            if(isset($_GET['price']) && $_GET['price']!=''){

                $where['price']=$_GET['price'];

            }



            if(isset($_GET['color']) && $_GET['color']!=''){

                $where['color']=$_GET['color'];

            }



            if(isset($_GET['size']) && $_GET['size']!=''){

                $where['size']=$_GET['size'];

            }



            if(isset($_GET['discount']) && $_GET['discount']!=''){

                $where['discount']=$_GET['discount'];

            }



            if(isset($_GET['product']) && $_GET['product']!=''){

                $where['product_name']=$_GET['product'];

            }

            



            if(isset($_GET['per_page']) && $_GET['per_page']!=''){

                $offset = $_GET['per_page'];

            }

            $config =  array(

                'page_query_string' => true,

                'base_url' => base_url('products/'.$category_name.'/pr?catid='.$catid) ,

                'per_page' =>12,

                'total_rows' => $this->front->record_count('products',$catid),

                'full_tag_open' => "<ul class='pagination mt-3 justify-content-center pagination_style1'>",

                'full_tag_close' => "</ul>",

                'first_tag_open' => '<li class="page-item">',

                'first_tag_close' => '</li>',

                'last_tag_open' => '<li class="page-item">',

                'last_tag_close' => '</li>',

                'next_tag_open' => '<li class="page-item">',

                'next_tag_close' => '</li>',

                'prev_tag_open' => '<li class="page-item">',

                'prev_tag_close' => '</li>',

                'num_tag_open' => '<li class="page-item">',

                'num_tag_close' => '</li>',

                'cur_tag_open' => '<li class="page-item active"><a class="page-link">',

                'cur_tag_close' => '</a></li>'

                 );

            $this->pagination->initialize($config);

            
            $data['h1'] = $this->pagination->totalRecords();

            $data['h2'] = $this->pagination->noOfRecords();

            $data['products'] = $this->front->getProducts($where,$config["per_page"],$offset);

            $data['links'] = "products/".$category_name."/pr";

            $data['catimages'] = $this->common->getsData('category',array('c_id'=>$catid));

            $this->load->view('shop',$data);

        }else{

            redirect(base_url());

        }

    }



    public function brandProductPage($brand_name='',$pr='')

    {

        if(isset($_GET['brandid']) && $_GET['brandid']!=""){

            $brandid = $_GET['brandid'];

            $data['brand_title'] = $this->common->getsData('brand',array('id'=>$brandid));

            $data['product'] = $this->front->getProducts(array("product_brand"=>$brandid));

            // echo $this->db->last_query();

            // echo "<pre>";

            // print_r($data['product']);

            // die;

            $this->loadHtml('brand','Brand Products Page',$data);

        }else{

          redirect(base_url());  

        }

    }

    public function addtowishlist()
    {
        if(isset($_POST) && $_POST)
        {
            $check = $this->common->getsData('wishlist',array('productid'=>$_POST['productid'],'profileid'=>$_POST['profileid']));
            if(!$check)
            {
                $this->common->insertData('wishlist',$_POST);
                echo 1;
            }else{
                echo 0;
            }
        }die;
    }

    public function removeFromWishList()
    {
        if(isset($_POST) && $_POST)
        {
            $this->common->deleteData('wishlist',array('productid'=>$_POST['productid'],'profileid'=>$_POST['profileid']));
            if($this->db->affected_rows())
            {
                echo 1;
            }else{
                echo 0;
            }
        }die;
    }

    function wishlistPage()
    {
        $data['wish'] = $this->common->getData('wishlist',array('profileid'=>$this->session->userdata('profileid')));
        $this->loadHtml('wishlist','Wishlist',$data);
    }

    function AddtocompareProductData()
    {
        if(isset($_POST) && $_POST)
        {  
            if($this->session->userdata('compareProduct1')!=''){
                if($this->session->userdata('compareProduct1') == $_POST['productid'])
                {
                    echo 0;
                }
            }
            elseif($this->session->userdata('compareProduct1') == '')
            {
                $this->session->set_userdata('compareProduct1',$_POST);
                echo 1;
            }
            elseif($this->session->userdata('compareProduct2')!=''){
                if($this->session->userdata('compareProduct2') == $_POST['productid'])
                {
                    echo 0;
                }
            }
            elseif($this->session->userdata('compareProduct2') == '')
            {
                echo 1;
                $this->session->set_userdata('compareProduct2',$_POST);
            }
            elseif($this->session->userdata('compareProduct3')!=''){
                if($this->session->userdata('compareProduct3') == $_POST['productid'])
                {
                    echo 0;
                }else{
                    echo 3;
                }
            }
            elseif($this->session->userdata('compareProduct3') == '')
            {
                echo 1;
                $this->session->set_userdata('compareProduct3',$_POST);
            }else{
                echo 3;
            }
        }die;
    }

    function comparePage()
    {
        $data = array();
        if($this->session->userdata('compareProduct1')!='')
        {
            $p1 = $this->session->userdata('compareProduct1');
            $data['p1'] = $this->common->getsData('products',array('productid'=>$p1['productid']));
        }
        if($this->session->userdata('compareProduct2')!='')
        {
            $p2 = $this->session->userdata('compareProduct2');
            $data['p2'] = $this->common->getsData('products',array('productid'=>$p2['productid']));
        }
        if($this->session->userdata('compareProduct3')!='')
        {
            $p3 = $this->session->userdata('compareProduct3');
            $data['p3'] = $this->common->getsData('products',array('productid'=>$p3['productid']));
        }
        $this->loadHtml('compare','Compare',$data);
    }

    public function removeCompareProduct()
    {
        if(isset($_POST) && $_POST)
        {
            if($_POST['session'] == 1)
            {
                $this->session->unset_userdata('compareProduct1');
            }
            elseif ($_POST['session'] == 2) 
            {
                $this->session->unset_userdata('compareProduct2');
            }
            elseif ($_POST['session'] == 3) 
            {
                $this->session->unset_userdata('compareProduct3');
            }
        }die;
    }

    public function productDetailPage($p_name='',$pid='')
    {
        // if ($pid!="") {

        //     $data['product'] = $this->common->getsData("products",array("productid"=>$pid));
        //     $this->session->set_userdata('recentviewProduct',$data['product']);
        //     if($data['product']){

        //         $data['feat'] = $this->front->getProducts(array("feat_prod"=>1,"limit"=>6));

        //         $data['hp2'] = $this->front->getProducts(array("best_selling"=>1,"limit"=>5));

        //         $data['reletedProduct'] = $this->front->getProducts(array("product_category"=>$data['product']['product_category'],"limit"=>4,"where"=>array("productid !="=>$data['product']['productid'])));

        //         $this->load->view("product-detail",$data);

        //     }else{

        //         redirect(base_url());

        //     }

        // }else{

        //     redirect(base_url());

        // }
        $this->loadHtml('product-detail');

    }



    public function shoppingCartPage()

    {

        $data['feat'] = $this->front->getProducts(array("feat_prod"=>1,"limit"=>6));

        $this->loadHtml("shopping-cart","Shopping Cart",$data);

    }



    public function trackOrderPage()

    {

        $this->loadHtml("track-order","Track Order");

    }



    public function userCheckoutPage()

    {

        $is_user_logged_in = $this->session->userdata('is_user_logged_in');

        $user_login_type = $this->session->userdata('user_login_type');



        if(!$this->cart->contents()){

            $this->session->set_flashdata("emessage",$this->lang->line("email_empty"));

            redirect(base_url("shopping-cart"));

        }



        if(!isset($is_user_logged_in) || $is_user_logged_in != true)

        {

            redirect(base_url('user-login'));

        }else{

            $this->loadHtml("checkout","Checkout Page");

        }

    }

    public function thankYouPage()
    {
        $this->loadHtml("thank-you","Thank You");
    }



    public function aboutUsPage()

    {   

        $this->loadHtml("about-us","About Us");

    }



    public function privacyPolicyPage()

    {

        $this->loadHtml("privacy-policy","Privacy Policy");

    }



    public function shippingRefundPage()

    {

        $this->loadHtml("shipping-refund","Shipping & Refund");

    }



    public function cancellationPolicyPage()

    {

        $this->loadHtml("cancellation-policy","Cancellation Policy");

    }



    public function termConditionPage()

    {

        $this->loadHtml("terms-condition","Terms & Condition");

    }

    public function disclamerPage()

    {

        $this->loadHtml("disclamer","Disclamer");

    }



    public function faqPage()

    {

        $data['feat'] = $this->front->getProducts(array("feat_prod"=>1,"limit"=>6));

        $this->loadHtml("faq","FAQ",$data);

    }



    public function contactUsPage()
    {

        $this->loadHtml("contact-us","Contact Us");

    }

 public function trackPage()

    {

        $this->loadHtml("trackorder","trackPage");

    } 

    public function refundreplacementPage()

    {

        $this->loadHtml("refund-replacement","refundreplacementPage");

    } 

    public function shippingpolicyPage()

    {

        $this->loadHtml("shipping-policy","shippingpolicyPage");

    }





    public function notifyProductByUser()

    {

        // echo "<pre>";

        // print_r($_POST); die;

        $url = $_POST['url'];

        unset($_POST['url']);

        if($_POST){

            $_POST['date'] = date('Y-m-d H:i:s');

            $res = $this->common->insertData('product_notify',$_POST);

            if($res){

                $this->session->set_flashdata('message', 'Enquiry Submitted.');

            }else{

                $this->session->set_flashdata('emessage', 'Enquiry Not Submitted.');

            }

        }else{

            $this->session->set_flashdata('emessage', 'Something Went Wrong...');

        }

        redirect($url);

    }



    public function contactUs() {

        $html='';

        foreach ($_POST as $key => $value) {

            $html.=ucwords(str_replace("_", " ", $key)).': '.$value."<br /><br/>";

        }

        $config = Array(        



            'protocol' => 'sendmail',



            'smtp_host' => 'your domain SMTP host',



            'smtp_port' => 25,



            'smtp_user' => 'SMTP Username',



            'smtp_pass' => 'SMTP Password',



            'smtp_timeout' => '4',



            'mailtype'  => 'html', 



            'charset'   => 'iso-8859-1'



        );

        //echo "<pre>"; print_r($html); die;

        $this->load->library('email', $config);

        $this->email->from("lavneetbhand12@gmail.com","IRAJWEB Ecommerce Site Demo");

        $this->email->to('lavneetbhand12@gmail.com,'.$_POST['email']);

        $this->email->subject("User Enquiry");

        $this->email->message($html);

        if($this->email->send()){

            $this->session->set_flashdata("message","Thank you for showing your interest! We will contact you soon.");

        }else{

            $this->session->set_flashdata("emessage","Something went wrong.");

        }

        redirect(base_url("contact-us"));

    }



    public function directSearchProduct()

    {

        if(isset($_POST['search']) && $_POST['search']!=''){

            $data['product'] = $this->front->directSearchProduct($_POST);

        }else{

            $data['product'] = '';

        }

        $this->loadHtml("search-result","Search",$data);



    }



    public function searchProductAuto()

    {



        $html='';



        $term = $_GET['term'];



        $data = $this->front->autocomplete($term);



        print_r(json_encode($data));die;



    }



    public function searchProductByTagPage($tag='')

    {

        $tag = str_replace('-', ' ', $tag);

        if(isset($tag) && $tag!=''){

            $data['head_title'] = $tag;

            $data['products'] = $this->front->searchByTag($tag);

        }else{

            $data['head_title'] = '';

            $data['products'] = '';

        }        

        $this->loadHtml("search-result","Search",$data);

    }



    public function trackOrderAction()

    {

        if(isset($_POST['orderid']) && $_POST['orderid']!=''){

            $orderid = $_POST['orderid'];

            $data['trackorder'] = $this->front->getOrders($orderid,1);

            $data['order_status_message'] = $this->common->getData('order_status_message',array('orderid'=>$orderid),array(),array('field'=>'status','by'=>'desc'));

            // echo "<pre>";

            // print_r($data['trackorder']); die;

            $this->loadHtml("track-order","Track Order",$data);

        }else{

            $data['trackorder']='';

            $this->loadHtml("track-order","Track Order",$data);

        }

    }



    function setSession()

    {

        $user = $this->common->getsData('user',array('profileid'=>$this->profileid),array('user_type'));

        if($_POST['A'] == 1){

            $this->session->set_userdata('A','1');

            unset($_POST['A']);

            $this->session->set_userdata('bguest',$_POST);echo 1;die;

        }else if($_POST['A'] == 2){

            $this->session->set_userdata('A','2');

            unset($_POST['A']);

            $this->session->set_userdata('sguest',$_POST);echo 1;die;

        }else if($_POST['A'] == 3){

            $this->session->set_userdata('A','3');

            unset($_POST['A']);

            $this->session->set_userdata('gpay',$_POST['pay']);

            echo 3;die;

        }else{

            echo 0;die;

        }

    }



    function unsetCheckoutSession()

    {

        if($_POST['A'] == 3){

            $this->session->set_userdata('A','2');echo 1;die;

        }else if($_POST['A'] == 2){

            $this->session->set_userdata('A','1');echo 1;die;

        }else if($_POST['A'] == 1){

            $this->session->unset_userdata('A');echo 1;die;

        }else{

            echo 0;die;

        }

    }



    function logout()

    {

        //$this->session->sess_destroy();

        $this->session->unset_userdata('A');

        $this->session->unset_userdata('B');

        $this->session->unset_userdata('C');

        $this->session->unset_userdata('email');

        $this->session->unset_userdata('profileid');

        $this->session->unset_userdata('is_user_logged_in');

        $this->session->set_userdata(array("user_login_type"=>"guest_user"));

        $this->session->unset_userdata("sfirst_name");

        $this->session->unset_userdata("slast_name");

        $this->session->unset_userdata("scity");

        $this->session->unset_userdata("sstate");

        $this->session->unset_userdata("scountry");

        $this->session->unset_userdata("spostalcode");

        $this->session->unset_userdata("smobile_no");

        $this->session->unset_userdata("saddress1");

        $this->session->unset_userdata("saddress2");

        $this->session->unset_userdata("bfirst_name");

        $this->session->unset_userdata("blast_name");

        $this->session->unset_userdata("bcity");

        $this->session->unset_userdata("bstate");

        $this->session->unset_userdata("bcountry");

        $this->session->unset_userdata("bpostalcode");

        $this->session->unset_userdata("bmobile_no");

        $this->session->unset_userdata("baddress1");

        $this->session->unset_userdata("baddress2");

        $this->session->unset_userdata("payment_method");

        $this->session->unset_userdata("awtc");

        $this->session->unset_userdata("user_coupon");

        redirect(base_url());

    }

}

