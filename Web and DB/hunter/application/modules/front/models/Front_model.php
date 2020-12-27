<?php if (!defined('BASEPATH')) exit('No direct script access allowed');



class Front_Model extends CI_Model

{



	public function __construct()

	{

		parent::__construct();	

	}



	public function record_count($table,$cat) {

		$query = "SELECT COUNT(*) as R FROM ".$table." WHERE ";

		if((isset($cat) && $cat!=''))

		{

			$query.=" product_category REGEXP '[[:<:]]".$cat."[[:>:]]'";

		}

		$res = $this->db->query($query)->result_array();

		if($res){

			$count = $res[0]['R'];

		}else{

			$count = 0;

		}

		//print_r($count);

		return $count;

	}



	public function countProduct($table) {

		$query = "SELECT COUNT(*) as R FROM ".$table."";

		$res = $this->db->query($query)->result_array();

		if($res){

			$count = $res[0]['R'];

		}else{

			$count = 0;

		}

		return $count;

	}







	public function getProducts($post=array(),$limit='',$offset='')

	{

		// print_r($post);die;

		$sd='';

		$query='select P.pid,P.productid,P.product_name,P.product_description,P.product_url,P.product_price,P.product_category,PM.product_image,C.category from products as P LEFT JOIN product_media as PM ON P.productid=PM.product_id LEFT JOIN category as C ON P.product_category=C.c_id where P.productid!="" ';



		if(isset($post['product_category']) && $post['product_category']!=""){

			$cat = explode(",", $post['product_category']);

			if($cat){

				$query.=" and (";

				foreach ($cat as $key => $value) {

					$query.=(($key==0)?"":" or ").' P.product_category REGEXP "[[:<:]]'.$value.'[[:>:]]" ';

				}

				$query.=" )";

			}

		}



		if(isset($post['product_brand']) && $post['product_brand']!=""){

			$query.=' and ( P.product_brand='.$post['product_brand'].' )';

		}



		if(isset($post['productid']) && $post['productid']!=""){

			$query.=' and ( P.productid = '.$post['productid'].' )';

		}



		if(isset($post['best_selling']) && $post['best_selling']!=""){

			$query.=' and ( P.best_selling = "'.$post['best_selling'].'" )';

		}



		if(isset($post['feat_prod']) && $post['feat_prod']!=""){

			$query.=' and ( P.feat_prod = "'.$post['feat_prod'].'" )';

		}



		if(isset($post['price']) && $post['price']!=""){

			if(isset($post['usd']) && $post['usd']!=''){

				$range = explode('-', $post['price']);

				$query.=' and (P.product_sale_price!=0) and ( P.product_sale_price BETWEEN '.$range[0]*$post['usd'].' AND '.$range[1]*$post['usd'].' )';

			}else{

				if($post['price']=='999-above'){

					$range = explode('-', $post['price']);

					$query.=' and (P.product_sale_price!=0) and ( P.product_sale_price >= '.$range[0].' )';

				}else{

					$range = explode('-', $post['price']);

					$query.=' and (P.product_sale_price!=0) and ( P.product_sale_price BETWEEN '.$range[0].' AND '.$range[1].' )';

				}

			}

		}



		if(isset($post['color']) && $post['color']!=""){

			$query.=' and ( P.color LIKE "%'.$post['color'].'%" ) ';

		}

		if(isset($post['product']) && $post['product']!=""){

			$query.=' and ( P.product_name LIKE "%'.$post['product'].'%")';

		}

		if(isset($post['category']) && $post['category']!=''){

			$query.=' and P.product_category LIKE "%'.$post['category'].'%"';

		}

		// echo $this->db->last_query();die;

		if(isset($post['size']) && $post['size']!=""){

			$query.=' and ( P.size REGEXP "[[:<:]]'.$post['size'].'[[:>:]]" )';

		}



		if(isset($post['discount']) && $post['discount']!=""){

			$query.=' and ( P.discount >= '.$post['discount'].' )';

		}



		if(isset($post['where']) && is_array($post['where']) && !empty($post['where'])){

			$query.=" and (";

			foreach ($post['where'] as $key => $value) {

				$query.=(($key==0)?"":" and ").$key."'".$value."'";

			}

			$query.=" )";

		}



		if(isset($post['k']) && $post['k']!=""){

			$term1 = str_replace(array('(',')'), "", $post['k']);

    		$keywords = explode(",", $term1);

			if (is_array($keywords) && !empty($keywords)){

                foreach ($keywords as $key => $value) :

                    $k1 = explode(" ", trim($value));

                    $sd .= ($key==0)?"":" or ";

                    $sd .= ' P.product_name REGEXP "[[:<:]]'.trim($value).'[[:>:]]" ';

                    if(count($k1)>1){

                        $sd.=' or (';

                        foreach ($k1 as $key1 => $value1) {

                            $k2 = trim($value1);

                            $sd .= ($key1==0)?"":" and ";

                            $sd .= ' P.product_name REGEXP "[[:<:]]'.$k2.'[[:>:]]" ';

                        }

                        $sd.=' ) ';

                    }

                endforeach;

                $query.=($sd)?" and ( ".$sd." )":"";

            }

        }



        $query.=' group by P.productid, PM.product_id';



		if(isset($post['order']) && is_array($post['order']) && !empty($post['order'])){

			$query.=' order by '.$post['order']['field']." ".$post['order']['by'];

		}else{

			$query.=' order by P.pid desc';

		}



		if(isset($post['limit']) && isset($post['offset'])){

			$query.=' limit '.$post['limit']." offset ".$post['offset'];

		}



		if(isset($post['limit']) && !isset($post['offset'])){

			$query.=' limit '.$post['limit'];

		}



		if((isset($limit) && $limit!='') && (isset($offset) && $offset!=''))

		{

			$query.=' limit '.$offset.','.$limit;

		}



		else if(isset($limit) && $limit!='')

		{

			$query.=' limit '.$limit;

		}



		$res = $this->db->query($query)->result_array();

		//echo $this->db->last_query();die;



		return $res;

	}



	public function directSearchProduct($post)

    {

    	$result=0;

		$query = 'select P.*,PM.product_image from products as P LEFT JOIN product_media as PM ON P.productid=PM.product_id where ';

		$result1=array();

		$search_string = explode(" ", $post['search']);

		$common_words = $this->config->item('commonWords');

		//print_r($common_words); die;

		$result1 = array_diff($search_string, $common_words);

		$query_1="";

		if ($result1) {

			$or = false;

			foreach ($result1 as $key => $value) {

				if ($value != "" and $value != '(' and $value != ')') {

					$query_1 .= (($or)?' or ':'').'P.product_name LIKE "%'.trim($value).'%"';

					$or = true;

				}

			}

		}

		$result=1;

		$query.=' MATCH(P.product_name) AGAINST ("'.$_POST['search'].'" IN NATURAL LANGUAGE MODE) '.' UNION '.$query.$query_1;



		$products = $this->db->query($query)->result_array();



		return $products;

    }





    public function autocomplete($term)

    {



    	$c=$sc=array();



    	$sd='';



    	$category = $this->common->getData("category",array(),array("c_id","category"));



    	$subcategory = $this->common->getData("subcategory",array(),array("sc_id","subcategory"));



    	if($category){



	    	foreach ($category as $key => $value) {



	    		$c[$value['c_id']]=$value['category'];



	    	}



	    }



	    if($subcategory){



	    	foreach ($subcategory as $key => $value) {



	    		$sc[$value['sc_id']]=$value['subcategory'];



	    	}



	    }



    	if($term!=""){



    		$term1 = str_replace(array('(',')'), "", $term);



    		$keywords = explode(",", $term1);





	        $query = "SELECT P.product_name,P.pid,P.productid,P.product_slug,P.product_category,P.product_subcategory FROM products P WHERE  ";



	           

	        if (is_array($keywords) && !empty($keywords)){



                foreach ($keywords as $key => $value) :



                    $k1 = explode(" ", trim($value));



                    $sd .= ($key==0)?"":" or ";

                    

                    $sd .= ' P.product_name LIKE "%'.trim($value).'%" ';



                    if(count($k1)>1){



                        $sd.=' or (';



                        foreach ($k1 as $key1 => $value1) {



                            $k2 = trim($value1);



                            $sd .= ($key1==0)?"":" or ";



                            $sd .= ' P.product_name LIKE "%'.$k2.'%" ';



                        }



                        $sd.=' ) ';



                    }



                endforeach;



                $query.=($sd)?" ( ".$sd." )":"";



            }



            $query.=" GROUP BY P.product_category";



	        $q = $this->db->query($query);



	        $result = $q->result_array();



	        // echo $this->db->last_query();

	        // echo "<pre>";

	        // print_r($result); die;



	        foreach ($result as $key => $value) {



	        	if($value['product_category']!=""){



	        		$product_category = explode(",", $value['product_category']);



	        		//print_r($product_category);



	        		//echo "count = ".count($product_category);



	        		if(count($product_category)==1){



	        			if(array_key_exists($value['product_category'], $c)){



	        				$result[$key]['category_name'] = $c[$value['product_category']];



	        			}



	        		}else{



	        			$cat=array();



	        			foreach ($product_category as $key1 => $value1) {



	        				if(array_key_exists($value1, $c)){



		        				array_push($cat,$c[$value1]);



		        			}



	        			}



	        			$result[$key]['category_name'] = implode(",", $cat);



	        		}



	        	}







	        	if($value['product_subcategory']!=""){



	        		$product_subcategory = explode(",", $value['product_subcategory']);



	        		if(count($product_subcategory)==1){



	        			if(array_key_exists($value['product_subcategory'], $sc)){



	        				$result[$key]['subcategory_name'] = $sc[$value['product_subcategory']];



	        			}



	        		}else{



	        			$subcat=array();



	        			foreach ($product_subcategory as $key1 => $value1) {



	        				if(array_key_exists($value1, $sc)){



		        				array_push($subcat,$sc[$value1]);



		        			}



	        			}



	        			$result[$key]['subcategory_name'] = implode(",", $subcat);



	        		}



	        	}



	        	$result[$key]['keyword'] = $term;



	        }



	        //print_r($result); die;



	        return $result;



    	}



    }



	public function searchByTag($post='')

	{

		$query='select P.product_name,P.product_slug,P.productid,P.product_sale_price,P.product_price,P.size,P.color,PM.product_image from products as P LEFT JOIN product_media as PM ON P.productid=PM.product_id where P.productid!="" and P.product_tag!=""';

		if(isset($post) && $post!=""){

			$query.=' and ( P.product_tag REGEXP "[[:<:]]'.$post.'[[:>:]]" )';

		}



		$res = $this->db->query($query)->result_array();

		return $res;

	}



	public function getOrders($orderid=array(),$single='',$profileid='')

	{

		$this->db->select("O.*,O.orderid as order_id,UOA.*,OS.order_status_name,U.name,OSM.message");

		$this->db->from("orders as O");

		$this->db->join("cart_mapping as CM","CM.orderid=O.orderid","left");

		$this->db->join("user as U","O.profileid=U.profileid","left");

		$this->db->join("user_order_address as UOA","O.orderid=UOA.orderid","left");

		$this->db->join("payment_method as PM","O.payment_method=PM.pm_id","left");

		$this->db->join("order_status as OS","O.order_status=OS.os_id","left");
		$this->db->join("order_status_message as OSM","OS.os_id=OSM.status","left");

		if($orderid){

			$this->db->where("O.orderid",$orderid);

		}

		if($profileid){

			$this->db->where("O.profileid",$profileid);

		}

		$this->db->group_by("CM.orderid");

		$this->db->order_by("O.id","desc");

		$res = $this->db->get()->result_array();

		$this->session->set_userdata('order_invoice',$this->db->last_query());

		//echo $this->db->last_query();

		if($res)

		{

			if($profileid){

				return $res;

			}else{

				return $res[0];

			}

		}else{

			return $res;

		}



	}

	

}

?>