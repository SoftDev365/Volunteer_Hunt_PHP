<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');


if (!function_exists('checkCouponAmmount'))

{
  function checkCouponAmmount($cart=array())

    {
        $CI =& get_instance();
        if($CI->session->userdata('user_coupon')){

          $coupon_amount = $CI->session->userdata('user_coupon');
          $cart_amount = $CI->cart->total();
          if($coupon_amount>$cart_amount){
               $CI->session->unset_userdata('user_coupon'); 
               $CI->session->unset_userdata('user_coupon_code'); 
          }
        }
    }
}

if (!function_exists('cartDropdown'))

{

    function cartDropdown($cart=array())

    {

        $CI =& get_instance();

        $html = '';

        $amount = $count = $shipping = $GST = array();

        $c = count($cart)-1;

        $site_url = base_url();

        $c1=-1;

        $no_of_products = count($cart);

        //$coupon = $CI->session->userdata("coupon");

        if(!empty($cart))

        {

            //print_r($cart);echo $no_of_products; die;
            $head ='<span class="count" id="cart-total1">'.$no_of_products.'</span>';
            $html.='<ul class="woocommerce-mini-cart cart_list product_list_widget ">';

              // echo "<pre>";
              // print_r($cart);

            foreach ($cart as $key => $value)

            {


                $price = 0;

                $price = (($value['price']*$value["qty"]));//($value["subtotal"]+($value['options']['amount']*$value["qty"]));

                $amount[] = $price;

                //$GST = (($price*$value['options']['product_gst'])/100);

                $shipping[] = ''; //($value["options"]["amount"]*$value["qty"]);

                $count[] = $value["qty"];

                $c1++;

                $html.='<li class="woocommerce-mini-cart-item mini_cart_item product_'.$value['options']['productid'].'">
                          <a href="javascript:void(0)" data-id="'.$value["rowid"].'" class="remove deleteproduct" aria-label="Remove this item">×</a>';
                                if($value["options"]["product_photos"]!=''){
                                  $html.='<a href="#" title="'.$value["name"].'">
                                    <img alt="'.$value["options"]["product_name"].'" src="'.base_url($value["options"]["product_photos"]).'"  class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image">'.word_limiter($value["options"]["product_name"],2).'
                                  </a>';
                                }else{ 
                                  $html.='<a href="#"><img src="'.base_url("assets/user/assets/img/no-place-holder.jpg").'" alt="image" class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image">'.word_limiter($value["options"]["product_name"],2).'
                                  </a>';
                              }
                  $html.='  <span class="quantity">'.$value["qty"].' ×
                            <span class="woocommerce-Price-amount amount">
                            <span class="woocommerce-Price-currencySymbol"></span>'.R.$value["price"].'</span>
                            </span>
                          </li>';
                }

            $cart_amount = array_sum($amount);

            //$gst_amount = array_sum($GST);
            $gst_amount = $GST;

            $shipping_count = array_sum($shipping);

            if($c1==$c){
                $html.='<p class="woocommerce-mini-cart__total total">
                         <strong>Subtotal:</strong>
                         <span class="woocommerce-Price-amount amount">
                            <span class="woocommerce-Price-currencySymbol"></span>'.($cart_amount+$shipping_count).'</span>
                        </p>
                        <p class="woocommerce-mini-cart__buttons buttons">
                          <a href="'.base_url("shopping-cart").'" class="button wc-forward">View cart</a>
                          <a href="'.base_url("checkout").'" class="button checkout wc-forward">Checkout</a>
                        </p>';

            }

        }else{

            $html.='<p class="woocommerce-mini-cart__total total">No Product In Cart !</p>';

        }

        return $html;

    }

}



if (!function_exists('productAmountCount'))

{

	function productAmountCount($cart=array())

	{

    $html = '';

    $amount = $count = array();

    foreach ($cart as $key => $value) {

      $amount[] = $value['subtotal'];

      $count[] = $value['qty'];

    }

    //print_r(array_sum($amount));

    //print_r(array_sum($count));

    $html = '<span class="count">'.array_sum($count).'</span>
            <span class="amount" id="amountshow">'.array_sum($amount).'</span>';

    return $html;

  }

}



if(!function_exists('trackOrderHtml'))

{

  function trackOrderHtml($data=array(),$order_status_name='')

  {

    $html = '';

    //echo "<pre>"; print_r($data);

      $html .= '<div class="content">

        <div class="row">

          <div class="col-xs-12">

            <div class="box">

              <div class="box-header">';

                $html .= '<h3 class="box-title">Track Order Products ('.$order_status_name.') </h3>

              </div>

              <div class="box-body table-responsive no-padding">

                <table class="table table-hover">

                  <thead>

                    <tr>

                      <th>Product Name</th>

                      <th>Quantity</th>

                    </tr>

                  </thead>

                  <tbody>';

                    foreach ($data as $key => $value) :

                      $html .= '

                      <tr>

                        <td>'.$value['name'].'</td>

                        <td>'.$value['quantity'].'</td>

                      </tr>';

                    endforeach;

                  $html .= '</tbody>

                </table>

              </div><!-- /.box-body -->

            </div><!-- /.box -->

          </div>

        </div>

      </div>';

    return $html;

  }

}

if (!function_exists('getCartProductname'))

{

  function getCartProductname($id)

  {
      $CI =& get_instance();
      $data = $CI->common->getsData('products',array('productid'=>$id),'product_name');
      return $data['product_name'];
  }
}


// ------------------------------------------------------------------------

/* End of file translate_helper.php */

/* Location: ./system/helpers/translate_helper.php */