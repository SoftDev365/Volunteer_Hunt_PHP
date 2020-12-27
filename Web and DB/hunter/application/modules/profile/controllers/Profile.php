<?php if (!defined('BASEPATH')) exit('No direct script access allowed');



class Profile extends MY_Profile_Controller {



    Public function __construct(){

        parent::__construct();
        $this->load->helper('front_helper');

    }

    public function index()
    {
        redirect(base_url("user-profile"));
    }

    public function userProfilePage()
    {

        $ocheck = $this->common->getsData('orders',array('profileid'=>$this->session->userdata('profileid')));
        if($ocheck!='')
        {   
            $date = $ocheck['end_plan'];
            $today = date('Y-m-d H:i:s');
            if($today > $date)
            {
                $this->common->updateData('orders',array('subscribe'=>'0','available_songs'=>'0'),array('profileid'=>$this->session->userdata('profileid')));
            }
            elseif($today == $date)
            {
                $this->common->updateData('orders',array('subscribe'=>'0','available_songs'=>'0'),array('profileid'=>$this->session->userdata('profileid')));
            }
        }
        $data['order'] = $this->common->getsData('orders',array('profileid'=>$this->session->userdata('profileid')));
        $data['profile'] = $this->common->getsData("user",array("profileid"=>$this->profileid));
        $data['song'] = $this->common->getData('user_songs',array('profileid'=>$this->profileid));
        $data['subs'] = $this->common->getData('subscription');
        $this->loadHtml("dashboard","My Profile",$data);
    }

    public function UserAccountDetails()
    {
        $data['profile'] = $this->common->getsData("user",array("profileid"=>$this->profileid));
        $this->loadHtml("account-details","Account Details",$data);
    }
    public function SongCommentPage($id)
    {
        $data['profile'] = $this->common->getsData("user",array("profileid"=>$this->profileid));
        $data['song'] = $this->common->getsData('user_songs',array('songid'=>$id));
        $data['comment'] = $this->common->getData('song_comments',array('songid'=>$id));
        $this->loadHtml("comments","Comments",$data);
    }

    public function UploadSongPage()
    {
        $data['profile'] = $this->common->getsData('user',array('profileid'=>$this->profileid));
        $data['cat'] = $this->common->getData('category',array('show'=>1));
        $this->loadHtml("upload-song","Upload Song",$data);
    }

    public function userallSongs()
    {
        $data['profile'] = $this->common->getsData('user',array('profileid'=>$this->profileid));
        $data['song'] = $this->common->getData('user_songs',array('profileid'=>$this->profileid),array(),array('field'=>'id','by'=>'desc'));
        $this->loadHtml("user-songs","User Songs",$data);
    }
    public function CommentsDeleteSongs()
    {
        $data['profile'] = $this->common->getsData('user',array('profileid'=>$this->profileid));
        $data['song'] = $this->common->getData('user_songs',array('profileid'=>$this->profileid),array(),array('field'=>'id','by'=>'desc'));
        $this->loadHtml("comments-delete","Comments or Delete Song",$data);
    }

    public function subscriptionPage()
    {
        $data['subs'] = $this->common->getData('subscription');
        $data['profile'] = $this->common->getsData('user',array('profileid'=>$this->profileid));
        $data['order'] = $this->common->getsData('orders',array('profileid'=>$this->session->userdata('profileid')));
        $this->loadHtml('subscibe-now','Subscribe Now',$data);
    }

    public function userChangePasswordPage()
    {
        $data['profile'] = $this->common->getsData('user',array('profileid'=>$this->profileid));
        $this->loadHtml("change-password","Change Password",$data);
    }

    public function UserEditProfilePage()
    {
        $data['profile'] = $this->common->getsData('user',array('profileid'=>$this->profileid));
        $this->loadHtml("edit-profile","Edit Profile",$data);
    }

    public function changePassword()
    {
        $data = $this->common->getsData('user',array('email'=>$_POST['email']),array('profileid','password'));
        // print_r($data);die;
        if($data){
            if($data['password'] != md5($_POST['password']))
            {
                $this->session->set_flashdata('emessage',"Old Password Wrong");
            }else{
                if(md5($_POST['new_password'])==md5($_POST['confirm_password']))
                {
                    $this->common->updateData('user',array('password'=>md5($_POST['new_password'])),array('profileid'=>$data['profileid']));
                    $this->session->set_flashdata('message',"Password Update Successfully");
                }
            }
        }else{
            $this->session->set_flashdata('emessage',"Something went wrong");
        }
        redirect(base_url('change-password'));
    }



    public function allOrdersPage()
    {
        $data['profile'] = $this->common->getsData("user",array("profileid"=>$this->profileid));
        $data['order'] = $this->profile->getOrders(array("profileid"=>$this->profileid),array(),array("field"=>"O.id","by"=>"desc"));
        $this->loadHtml("all-orders","All Orders",$data);
    }

    public function orderCartDetailPage($orderid='')
    {
        $this->load->model(A."/".A."_model","admin");
        $data['invoice'] = $this->admin->getOrders($orderid,1);
        $data['order_status'] = $this->common->getData("order_status");
        $data['cart'] = $this->common->getData("cart_mapping",array("orderid"=>$data['invoice']['orderid']),array(),array(),array("field"=>"cmid","by"=>"asc"));
        $data['cancle_orders'] = $this->admin->getCancleOrder(array("O.orderid"=>$orderid));
        $this->loadHtml('order-detail','Orders Invoice',$data);
    }

    public function cancleOrder()
    {
        // echo "<pre>";
        // print_r ($_POST);
        // echo "</pre>"; die;
        if(isset($_POST)){
            $status_cancle = $this->common->updateData('orders',array('order_status'=>5),array('orderid'=>$_POST['orderid']));
            if($status_cancle){
                $_POST['cancle_by'] = "User";
                $res = $this->common->insertData('cancle_order',$_POST);
                if($res){
                    $usermobile = $this->common->getsData('user',array('profileid'=>$_POST['profileid']),'mobile_no,email');
                    $mobile_no = $usermobile['mobile_no'];
                    $email = $usermobile['email'];

                    $umessage = "User Cancelled this Order (".$_POST['orderid'].") because of ".$_POST['order_cancle_reson'];

                    $this->email->from("ankit.d100@gmail.com","Suchetas Rum Collection");

                    $this->email->to('vinod.starwebindia@gmail.com');

                    $this->email->subject("Your Suchetas Rum Collection order is Cancelled with Order Id ".$_POST['orderid']);

                    $this->email->message($umessage);

                    $this->email->send();

                    $this->session->set_flashdata("message","Order Is Cancelled");
                }else{
                    $this->session->set_flashdata("emessage","something Went Wrong");
                }
            }else{
                $this->session->set_flashdata("emessage","something Went Wrong");
            }
        }
        redirect(base_url('user-profile'));
    }

}