<?php if (!defined('BASEPATH')) exit('No direct script access allowed');



class Cart_Model extends CI_Model 

{

	

	public function addProductInCart($post=array())

	{

		$cart = $cartdata = $names = array();

		$qty='';

		$found = $inc =  false;

		$productdata = $post['productid'];

		$p = $this->getAllProducts(array('P.productid'=>$productdata));

		$product = $p[0];

		if(isset($post['qty']))

		{

			$qty = $post['qty'];

		}

		$msg = "";

		$cart = $this->cart->contents();

		//print_r($cart);die;

		if($cart)

		{

			foreach($cart as $value):

					if(($productdata == $value['id']) && ($post['size'] == $value['options']['size']) && ($post['color'] == $value['options']['color']))

					{

						$incr = $value['qty']+(($qty!='')?$qty:1);

						if($incr>$value['options']['product_stock'])

						{

							$msg = "Sorry! Product is OUT OF STOCK...";

							$inc = true;

						}else{

							$this->cart->update(array(

				               'rowid' => $value['rowid'],

				               'qty'   => $incr,

				            ));

							$found = true;

						}

					}

			endforeach;

		}

		//print_r($this->cart->contents());die;

		if($found == false && $inc == false)

		{

			if($qty>$product['product_stock'])

			{

				$msg = "Sorry! Product is OUT OF STOCK...";

				//echo $msg;

				$inc=true;

			}else{

				$cartdata = $this->createCart($product,$qty,$post);

				$this->cart->insert($cartdata);

			}

		}

		if($inc == false)

		{

			$productAmountCount = productAmountCount();

			$cartDropdown = cartDropdown($this->cart->contents());

			$cart = array('productAmountCount'=>$productAmountCount,'cartDropdown'=>$cartDropdown,'found'=>0,"count"=>count($this->cart->contents()));

		}else{

			$cart = array('msg'=>$msg,'found'=>1);

		}

		//$this->countCouponCategory();

		return $cart;

		/*print_r($productAmountCount);

		print_r($cartDropdown);*/

	}

	public function getAllProducts($where=array(),$limit='')

	{

		$prod = array();

		$products = $this->allProducts($where,$limit);

		return $products;

	}

	public function allProducts($where=array(),$limit=1)

	{

		$this->db->select("P.*,PM.product_image");

		$this->db->from('products as P');

		$this->db->join('product_media as PM','P.productid=PM.product_id','left');

		if(!empty($where))

		{

			$this->db->where($where);

		}

		$this->db->group_by('PM.product_id');

		if($limit==1)

		{

			$this->db->limit(10);

		}

		$res = $this->db->get()->result_array();

		return $res;

	}



	public function createCart($product=array(),$qty1='',$post=array())

	{
		$productcart = array();

		$image = $product['product_image'];

		$price = ($product['product_sale_price'])?$product['product_sale_price']:$product['product_price'];

		$productcart = array(

               'id'      => $product['productid'],

               'qty'     => ($qty1!='')?$qty1:1,

               'price'   => $price,

               'name'    => "niceSpend",//htmlentities($product['product_name'],ENT_QUOTES | ENT_SUBSTITUTE, "UTF-8" ),
               //'coupon_amount'  => 0,
               'options' => array(

               					'productid' => $product['productid'],

               					'product_name' => htmlentities($product['product_name'],ENT_QUOTES | ENT_SUBSTITUTE, "UTF-8" ),

               					'product_price' => $product['product_price'],

               					'product_sale_price' => $product['product_sale_price'],

               					'product_stock' => $product['product_stock'],
               					
               					'product_weight' => $product['product_weight'],

               					'product_photos' => $image,

               					'size' => $post['size'],

               					'color' => $post['color'],

               					'category' => $product['product_category']

               				)

            );

			// echo "<pre>";
			// print_r($productcart); die;

		return $productcart;

	}

	public function productAmountCount()

	{

		//$c = $this->countCouponCategory();

		$cart = $this->cart->contents();

	    $count = $amt = 0;

	    $amount = $shipping = $discount = $st = $gst = array();

	    foreach ($cart as $key => $value) {

			$price = 0;

            $price = (($value['price']*$value["qty"])); 

            $amount[] = $price;

            //$GST[] = (($price*$value['options']['product_gst'])/100);

            $shipping[] = ($value["price"]*$value["qty"]);

            //array_push($discount, array("d_".$key=>number_format($value['coupon_amount'],2)));

            array_push($st, array("st_".$key=>$price));

            //array_push($gst, array("gst_".$key=>number_format((($price*$value['options']['product_gst'])/100),2)));

			$count++;

	    }

	    $cart_amount = array_sum($amount);

        //$gst_amount = array_sum($GST);

        //$shipping_count = array_sum($shipping);

		/*if($c==0){

			$this->session->unset_userdata("coupon");

		}*/

	    return array("st"=>$cart_amount,"cst"=>$st);

	}

	public function updateCartProductQty($post=array())

	{

		$count = 0;

		$cart = $this->cart->contents();

		foreach ($cart as $key => $value) {

			foreach ($_POST['rowid'] as $key1 => $value1) {

				if($value['rowid']==$value1)

				{

					$qty = $post['qty'][$key1];

					if($value['qty']!=$qty)

					{

						$incr = $qty;

						if($incr>$value['options']['product_stock'])

						{

							//echo $incr." > ".$value['options']['product_stock'];

							$msg = "Sorry! Product is OUT OF STOCK...";

							$inc = true;

							//exit(0);

						}else{

							$this->cart->update(array(

				               'rowid' => $value['rowid'],

				               'qty'   => $incr,

				            ));

							$found = true;

						}

					}

				}

			}

		}

		//$this->countCouponCategory();

		return true;

	}

	public function deleteProductFromCart($post=array())

	{

		$cart1 = array();

		$product = $this->getAllProducts(array('P.productid'=>$post['productid']));

		$cart = $this->cart->contents();

		if($cart) {

			foreach($cart as $value):

				if($post['productid'] == $value['rowid']) {

					$this->cart->update(array(

		               'rowid' => $post['productid'],

		               'qty'   => 0,

		            ));

				}

			endforeach;

		}

		$cart1 = $this->cart->contents();

		if(empty($cart1)) {
			$this->session->unset_userdata("coupon");
		}
		$c = $this->productAmountCount();

		$cartDropdown = cartDropdown($this->cart->contents());

		$cart1 = array_merge(array('cartDropdown'=>$cartDropdown),$c);//'productAmountCount'=>$productAmountCount,

		return $cart1;

	}


}