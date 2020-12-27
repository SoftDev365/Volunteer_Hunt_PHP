<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Producer_Model extends CI_Model 
{
	public function getOrders($search=array(),$params=array(),$order=array(),$single='')
	{
		$this->db->select("O.*,UOA.*,PM.payment_method_name,OS.order_status_name,U.name");
		$this->db->from("orders as O");
		$this->db->join("user as U","O.profileid=U.profileid","left");
		$this->db->join("user_order_address as UOA","O.orderid=UOA.orderid","left");
		$this->db->join("payment_method as PM","O.payment_method=PM.pm_id","left");
		$this->db->join("order_status as OS","O.order_status=OS.os_id","left");
		if($search['profileid']){
			$this->db->where("O.profileid",$search['profileid']);
		}
		if($order) {

			$this->db->order_by($order['field'],$order['by']);
		}
		if($params) {

			if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
	            $this->db->limit($params['limit'],$params['start']);
	        }
	        if(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
	            $this->db->limit($params['limit']);
	        }
		}
		$res = $this->db->get()->result_array();
		if($single)
		{
			return $res[0];
		}else{
			return $res;
		}
	}
}