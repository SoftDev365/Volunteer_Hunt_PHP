<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Producer extends MY_Producer_Controller {

    Public function __construct() { 
        parent::__construct();  

    }

    public function index()
    {
        $data['recent'] = $this->common->getData('user_songs',array(),array(),array('field'=>'id','by'=>'desc'),array('limit'=>24));
        $this->loadproducerHtml("index","Home Page",$data);
    }


    public function UserSongsPage()
    {
        $data['songs'] = $this->common->getData('user_songs',array(),array(),array('field'=>'id','by'=>'desc'));
        $this->loadproducerHtml("user-songs","User Songs",$data);
    }

    public function UserSongsDetailPage($id)
    {
        $data['song'] = $this->common->getsData('user_songs',array('songid'=>$id));
        $data['comments'] = $this->common->getData('song_comments',array('songid'=>$id),array(),array('field'=>'id','by'=>'desc'));
        $data['user'] = $this->common->getsData('user',array('profileid'=>$data['song']['profileid']));
        $this->loadproducerHtml("song-detail","User Song Detail",$data);
    }


    public function addProductPage()
    {
        $data['category'] = $this->common->getData('category',array('show'=>1));
        $this->loadproducerHtml("add-products","Add product",$data);
    }

    public function editProductPage($id)
    {
        $data['category'] = $this->common->getData('category',array('show'=>1));
        $data['pro'] = $this->common->getsData('products',array('productid'=>$id));
        $this->loadproducerHtml("edit-product","Add product",$data);
    }

    public function editProfilePage()
    {
        $data['profile'] = $this->common->getsData('producers',array('producer_id'=>$this->producerid));
        $this->loadproducerHtml("edit-profile","Add product",$data);
    }


    public function ProductList()
    {
        $data['pro'] = $this->common->getData('products',array(),array(),array('field'=>'pid','by'=>'desc'));
        $this->loadproducerHtml("all-products","Add product",$data);
    }

   
    function logout(){

        $this->session->unset_userdata('email');
        $this->session->unset_userdata('producerid');
        $this->session->unset_userdata('producer_type');
        $this->session->unset_userdata('is_user_logged_in');
        redirect(base_url("login"));
    }
}
