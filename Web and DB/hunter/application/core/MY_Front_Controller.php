<?php defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Front_Controller extends MY_Controller

{

	function __construct()
	{
		parent::__construct();
		$this->load->model('front_model','front'); 
		$this->load->model("user_login/user_login_model","login");
        $this->load->helper('front');
        $this->is_user_logged_in = $this->session->userdata('is_user_logged_in');
        $this->profileid = $this->session->userdata('profileid');
        $this->dprice = 0;
		if($this->dollar=='HKD'){ 
		    $rate = $this->common->getsData('dollarprice',array('id'=>1));
		    $this->dprice = $rate['rate'];
		}
        $this->load->library('paypal_lib');
	}

    function subscribeNow($profileid,$subid)
    {
        $profile = $this->common->getsData('user',array('profileid'=>$profileid));
        $pay = $this->common->getsData('subscription',array('id'=>$subid));
        $this->paymentDone($pay,$profile);
    }

    public function paymentDone($post,$user)
    {
        $orderid = 'REALSUR'.strtotime(date('Y-m-d H:i:s'));
        $this->session->set_userdata('orderid',$orderid);
        $order['orderid'] = $orderid;
        $order['profileid'] = $user['profileid'];
        $order['order_date'] = date("Y-m-d H:i:s");
        $order['paid'] = $post['price'];
        $order['payment_currency'] = "KES";
        $order['payment_method']= 'MPESA';
        $order['payment_status'] = "Complete";
        $order['subscribe'] = '1';
        $orderData = $this->common->getsData('orders',array("profileid"=>$order['profileid']));
        $order['plan'] = $post['plan'];
        if(!empty($orderData)){
            $order['end_plan'] = date("Y-m-d H:i:s", strtotime($order['order_date']. " + ".$post['duration']." day"));
            $order['available_songs']= ($orderData['available_songs']+$post['song']);
            if($orderData['end_plan'] > $order['end_plan']){
                $order['end_plan'] = $orderData['end_plan'];
                $order['plan'] = $orderData['plan'];
            }
        }else{
            $order['end_plan'] = date("Y-m-d H:i:s", strtotime($order['order_date']. " + ".$post['duration']." day"));
            $order['available_songs']= $post['song'];
        }
        // print_r($orderData);die;
        if(!$orderData){
            if($this->common->insertData("orders",$order)){
                redirect(base_url("thank-you"));
            }else{
                $this->session->set_flashdata('emessage','Something Went Wrong. Please Try Again...');
                redirect(base_url('user-profile'));
            } 
        }else{
            // print_r($order);die;
            if($this->common->updateData('orders',$order,array('profileid'=>$order['profileid']))){
                redirect(base_url("thank-you"));
            }else{
                $this->session->set_flashdata('emessage','Something Went Wrong. Please Try Again...');
                redirect(base_url('user-profile'));
            }
        }
    }

} 