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



    public function getAllProducts()
    {
        $this->loadHtml('shop','Shop');
    }

    public function productDetailPage($p_name='',$pid='')
    {
        $this->loadHtml('product-detail');
    }



    public function aboutUsPage()

    {   

        $this->loadHtml("about-us","About Us");

    }



    public function privacyPolicyPage()

    {

        $this->loadHtml("privacy-policy","Privacy Policy");

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

