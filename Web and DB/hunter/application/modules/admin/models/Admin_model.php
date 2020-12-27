<?php 
class Admin_Model extends CI_Model
{

	public function __construct()

	{

		parent::__construct();

		if (! function_exists('array_column')) {

		    function array_column(array $input, $columnKey, $indexKey = null) {

		        $array = array();

		        foreach ($input as $value) {

		            if ( !array_key_exists($columnKey, $value)) {

		                trigger_error("Key \"$columnKey\" does not exist in array");

		                return false;

		            }

		            if (is_null($indexKey)) {

		                $array[] = $value[$columnKey];

		            }

		            else {

		                if ( !array_key_exists($indexKey, $value)) {

		                    trigger_error("Key \"$indexKey\" does not exist in array");

		                    return false;

		                }

		                if ( ! is_scalar($value[$indexKey])) {

		                    trigger_error("Key \"$indexKey\" does not contain scalar value");

		                    return false;

		                }

		                $array[$value[$indexKey]] = $value[$columnKey];

		            }

		        }

		        return $array;

		    }

		}

	}

	public function getAllProduct($where=array(),$post=array(),$params = array(),$count='')
	{
		//print_r($post); die;
		$fields = $query = $wh = $like = '';
        $query = 'SELECT P.* FROM `products` as P where P.pid!="" ';
        if(isset($post['product_name']) && $post['product_name']!=''){
        	$query.=' and P.product_name LIKE "%'.$post['product_name'].'%"';
        }
        if(isset($post['product_sku']) && $post['product_sku']!=''){
        	$query.=' and P.product_sku ="'.$post['product_sku'].'"';
        }
        $query.=$wh.$like;
        $query.=' order by P.pid desc ';
        if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
            $query.=' limit '.$params['start'].', '.$params['limit'];
        }
        if(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
            $query.=' limit '.$params['limit'];
        }

        $rquery=$this->db->query($query);
        if($count==0){
            $result = $rquery->result_array();
        }else{
            $result = $rquery->num_rows();
        }
        $rquery->free_result();
        return $result;

	}


	public function getProductsWithpag($where=array(),$get=array())
    {
        //echo "<pre>";print_r($get);
        $like=0;
        $page = (isset($get['limit']) && $get['limit'])?$get['limit']:0;
        if($page==0){
            $offset = 0;
            $where1 = array('limit'=>$this->perPage);
        }else{
            $offset = $page;
            $where1 = array('start'=>$offset,'limit'=>$this->perPage);
        }
        $totalRec = $this->getAllProduct($where,$get,array(),1);
        $data1['post'] = $this->getAllProduct($where,$get,$where1,0);
        // echo "<pre>";print_r($get['base_url']);die;
        $config=array(
                'target' => '#postList',
                'base_url' => $get['base_url'],
                'total_rows' => $totalRec,
                'per_page' => $this->perPage,
                'reuse_query_string' => true,
                'full_tag_open' => "<ul class='pagination pagination-sm no-margin pull-right' style='margin:0px 0;'>",
                'full_tag_close' => "</ul>",
                'first_tag_open' => '<li>',
                'first_tag_close' => '</li>',
                'last_tag_open' => '<li>',
                'last_tag_close' => '</li>',
                'next_tag_open' => '<li>',
                'next_tag_close' => '</li>',
                'prev_tag_open' => '<li>',
                'prev_tag_close' => '</li>',
                'num_tag_open' => '<li>',
                'num_tag_close' => '</li>',
                'cur_tag_open' => "<li class='active'><a>",
                'cur_tag_close' => "</a></li>"
            );
        $this->pagination->initialize($config);
        $data1['links'] = $this->pagination->create_links();
        $data1['h1'] = $this->pagination->totalRecords();
        $data1['h2'] = $this->pagination->noOfRecords();
        return $data1;
    }

	public function getAllPincode($where=array(),$post=array(),$params = array(),$count='')
	{
		//print_r($post); die;
		$fields = $query = $wh = $like = '';
        $query = 'SELECT P.* FROM `pincode` as P where P.id!="" ';
        if(isset($post['pincode']) && $post['pincode']!=''){
        	$query.=' and P.pincode ="'.$post['pincode'].'"';
        }
        $query.=$wh.$like;
        $query.=' order by P.id desc ';
        if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
            $query.=' limit '.$params['start'].', '.$params['limit'];
        }
        if(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
            $query.=' limit '.$params['limit'];
        }

        $rquery=$this->db->query($query);
        if($count==0){
            $result = $rquery->result_array();
        }else{
            $result = $rquery->num_rows();
        }
        $rquery->free_result();
        return $result;

	}


	public function getPincodeWithpag($where=array(),$get=array())
    {
        //echo "<pre>";print_r($get);
        $like=0;
        $page = (isset($get['limit']) && $get['limit'])?$get['limit']:0;
        if($page==0){
            $offset = 0;
            $where1 = array('limit'=>$this->perPage);
        }else{
            $offset = $page;
            $where1 = array('start'=>$offset,'limit'=>$this->perPage);
        }
        $totalRec = $this->getAllPincode($where,$get,array(),1);
        $data1['pincode'] = $this->getAllPincode($where,$get,$where1,0);
        // echo "<pre>";print_r($get['base_url']);die;
        $config=array(
                'target' => '#postList',
                'base_url' => $get['base_url'],
                'total_rows' => $totalRec,
                'per_page' => $this->perPage,
                'reuse_query_string' => true,
                'full_tag_open' => "<ul class='pagination pagination-sm no-margin pull-right' style='margin:0px 0;'>",
                'full_tag_close' => "</ul>",
                'first_tag_open' => '<li>',
                'first_tag_close' => '</li>',
                'last_tag_open' => '<li>',
                'last_tag_close' => '</li>',
                'next_tag_open' => '<li>',
                'next_tag_close' => '</li>',
                'prev_tag_open' => '<li>',
                'prev_tag_close' => '</li>',
                'num_tag_open' => '<li>',
                'num_tag_close' => '</li>',
                'cur_tag_open' => "<li class='active'><a>",
                'cur_tag_close' => "</a></li>"
            );
        $this->pagination->initialize($config);
        $data1['links'] = $this->pagination->create_links();
        $data1['h1'] = $this->pagination->totalRecords();
        $data1['h2'] = $this->pagination->noOfRecords();
        return $data1;
    }
	
	public function insertCategories($post=array(),$table='')

	{

		$res = false;

		$userdata = array();

		$category = $this->common->getField($table,$post);

		if($this->common->insertData($table,$category)){

			$res = true;

		}

		return $res;

	}

	public function getCategories()
	{
		$result = '';
		$cat = $this->common->getData("category");
		//print_r($cat);
		if($cat){
			$result = $this->buildTree($cat);//die;
		}
		return $result; 
	}

	function buildTree($items) {

	    $childs = array();

	    foreach($items as &$item) $childs[$item['parent']][] = &$item;
	    unset($item);

	    foreach($items as &$item) if (isset($childs[$item['c_id']]))
	            $item['childs'] = $childs[$item['c_id']];
	        // echo "<pre>";
        	// print_r($childs); die;
        	if(isset($childs[0])){
    			return $childs[0];
    		}else{
    			return false;
    		}
	}


	public function getParentChild($items=array())
	{
		foreach ($items as $key => $value) {
			if(isset($value['childs']) && is_array($value['childs'])){
					// print_r($value);
				$res = $this->getParentChild($value['childs']);
					// print_r($value['c_id']."=<br>");
					$this->common->deletedata('category',array('c_id'=>$value['c_id']));
			}else{
				// print_r($value['c_id']."==<br>");
				$this->common->deletedata('category',array('c_id'=>$value['c_id']));
			}
		}
	}



	public function deleteCategory($post=array())
	{
		$cat = $this->common->getData("category",array(),array("c_id","parent"));
		$result = $this->buildTree($cat);
		$res = $this->getSubCat($result,$_POST['id']);
		$this->getParentChild(array($res));
		// foreach ($result as $key => $value) {
		// 	if($value['c_id']==$post['id']){
		// 		$this->getParentChild(array($value));
		// 	}
		// }
		return true;
	}

	public function getSubCat($result=array(),$id='')
	{
		if($result) {
			foreach ($result as $key => $value) {
				if($value['c_id'] == $id) {
					return $value;break;
				}else{
					if(isset($value['childs']) && $value['childs']) {
						$r = $this->getSubCat($value['childs'],$id);
						if(is_array($r)) {
							return $r;break;
						}
					}
				}
			}
		}
	}

	public function getOrders($orderid=array(),$single='')
	{
		$this->db->select("O.*,UOA.*,OS.order_status_name,U.name");
		$this->db->from("orders as O");
		$this->db->join("cart_mapping as CM","CM.orderid=O.orderid","left");
		$this->db->join("user as U","O.profileid=U.profileid","left");
		$this->db->join("user_order_address as UOA","O.orderid=UOA.orderid","left");
		$this->db->join("payment_method as PM","O.payment_method=PM.pm_id","left");
		$this->db->join("order_status as OS","O.order_status=OS.os_id","left");
		if($orderid){
			$this->db->where("O.orderid",$orderid);
		}
		$this->db->group_by("CM.orderid");
		$this->db->order_by("O.id","desc");
		$res = $this->db->get()->result_array();
		$this->session->set_userdata('order_invoice',$this->db->last_query());
		if($single)
		{
			return $res[0];
		}else{
			return $res;
		}

	}

	public function getCancleOrder($where=array())
	{
		if($where){
			$this->db->select("O.*,CO.*,CM.product_photos,CM.product_name,CM.product_price,CM.subtotal,CM.qty as quantity");
		}else{
			$this->db->select("*");
		}
		$this->db->from("cancle_order as CO");
		$this->db->join("orders as O","O.orderid=CO.orderid","left");
		if($where){
			$this->db->join("cart_mapping as CM","O.orderid=CM.orderid","left");
			$this->db->where($where);
		}else{
			$this->db->group_by("CO.orderid");
		}
		$this->db->order_by("CO.order_time","desc");
		$res = $this->db->get()->result_array();
		//echo $this->db->last_query(); die;
		return $res;
	}

	public function orderReportSearch($post=array())
	{
		//echo "<pre>";print_r($post);
		if(isset($post['category']) && $post['category']!=""){
			$query = 'SELECT O.*,DATE(O.order_time),U.name,U.mobile_no FROM `orders` as O left outer join cart_mapping as CA on O.orderid=CA.orderid left join products as P on CA.productid=P.productid left join user as U on O.profileid = U.profileid where O.id!="" ';
		}else{
			$query = 'SELECT O.*,DATE(O.order_time),U.name,U.mobile_no FROM `orders` as O left outer join cart_mapping as CA on O.orderid=CA.orderid left join products as P on CA.productid=P.productid left join user as U on O.profileid = U.profileid where O.id!="" ';
		}

		if((isset($post['order_start']) && $post['order_start']!="") && (isset($post['order_end']) && $post['order_end']!="")){
			$query .= ' and (DATE(O.order_time) >= "'.$post['order_start'].'" and DATE(O.order_time) <= "'.$post['order_end'].'")';
		}

		if((isset($post['order_start']) && $post['order_start']!="") && (isset($post['order_end']) && $post['order_end']=="")){
			$query .= ' and DATE(O.order_time) = "'.$post['order_start'].'" ';
		}

		if((isset($post['order_start']) && $post['order_start']=="") && (isset($post['order_end']) && $post['order_end']!="")){
			$query .= ' and DATE(O.order_time) = "'.$post['order_end'].'" ';
		}

		if((isset($post['order_start']) && $post['order_start']!="") && (isset($post['order_end']) && $post['order_end']!="") && ($post['order_start']==$post['order_end'])){
			$query .= ' and DATE(O.order_time) = "'.$post['order_start'].'" ';
		}

		if(isset($post['category']) && $post['category']!=""){
			$query .= ' and P.product_category REGEXP "[[:<:]]'.$post['category'].'[[:>:]]"';
		}

		if(isset($post['order_status']) && $post['order_status']!=""){
			$query .= ' and O.order_status = '.$post['order_status'].'';
		}

		if(isset($post['mobile_no']) && $post['mobile_no']!=""){
			$query .= ' and ( U.mobile_no = '.$post['mobile_no'].' )';
		}

		if(isset($post['payment_method']) && $post['payment_method']!=""){
			$query .= ' and ( O.payment_method = '.$post['payment_method'].' )';
		}
		$query.=' group by O.id order by O.id desc';
		//echo $query;
		$this->session->set_userdata('order_search',$query);
		$query=$this->db->query($query);
		$result = $query->result_array();
		$query->free_result();
		//echo $this->db->last_query();print_r($result);die;
        return $result;
	}

	public function getOrderCount($table,$where=array())
	{
		$this->db->select('orderid');
		$this->db->from($table);
		if(!empty($where))
		{
			$this->db->where($where);
		}
		$query = $this->db->get();
		$result = $query->num_rows();
		if($result)
		{
			return $result;
		}else{
			return false;
		}
	}

	public function getTotalEntryCount($table,$where=array(),$select='')
	{

		$this->db->select($select);

		$this->db->from($table);

		if(!empty($where))

		{

			$this->db->where($where);

		}

		$query = $this->db->get();

		$result = $query->num_rows();

		if($result)

		{

			return $result;

		}else{

			return false;

		}
	}

	public function siteVisitorCount($table,$where=array())
	{
		$this->db->select('ip_address');
		$this->db->from($table);
		if(!empty($where))
		{
			$this->db->where($where);
		}
		$query = $this->db->get();
		$result = $query->num_rows();
		if($result)
		{
			return $result;
		}else{
			return false;
		}
	}

	public function getProductTags()
	{
		$res = $this->db->query('select group_concat(product_tag) as product_tag from products where product_tag!=""')->result_array();
		return $res;
	}

	public function calculateGst($post='')
	{
		$query = 'SELECT CM.*, O.order_time,O.orderid,UOA.sstate,sum(CM.subtotal) AS samount,count(CM.category) as cqty FROM `cart_mapping` as CM left join `order` as O on CM.orderid=O.orderid left join user_order_address as UOA on O.orderid=UOA.orderid where CM.orderid!="" and O.order_time!="" and UOA.sstate!="" ';

        if(isset($post['date']) && $post['date']!=''){
        	$query.=' and date(O.order_time)="'.$post['date'].'"';
        }

        if(isset($post['category']) && $post['category']!=''){
        	$query.=' and CM.category='.$post['category'];
        }
        $query.=' group by UOA.sstate,CM.category';
        $res = $this->db->query($query)->result_array();
        return $res ;
	}


	public function getAffilated()
	{
		$this->db->select('*');
		$this->db->from('affilated_product as A');
		$this->db->join('products as P','P.productid = A.productid','left');
		$this->db->order_by('A.id','asc');
		$sql = $this->db->get()->result_array();
		return $sql;
	}
	
}
?>