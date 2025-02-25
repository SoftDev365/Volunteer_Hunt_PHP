<?php 
    $dprice = 0;
    if($this->dollar=='USD'){ 
        $rate = $this->common->getsData('dollarprice',array('id'=>1));
        $dprice = $rate['rate'];
    }
?>
<div id="content" class="site-content">
    <div class="col-full">
        <div class="row">
            <nav class="woocommerce-breadcrumb">
                <a href="<?php echo base_url();?>">Home</a>
                <span class="delimiter">
                    <i class="tm tm-breadcrumbs-arrow-right"></i>
                </span>
                Cart
            </nav>
            <!-- .woocommerce-breadcrumb -->
            <div id="primary" class="content-area">
                <main id="main" class="site-main">
                    <div class="type-page hentry">
                        <div class="entry-content">
                            <div class="woocommerce">
                                <div class="cart-wrapper">
                                    <div class="row" style="width: 100%;">
                                        <div class="col-md-8">
                                            <form action="<?php echo base_url('front/applyCoupon'); ?>" method="post" style="padding-bottom: 20px;border-bottom: 2px solid;">
                                                <label>Have a Coupon Code?</label><br>
                                                <input type="text" name="coupon_code" id="coupon_code" placeholder="Enter a coupon code if you have one" class="input-text" style="width: 60%;">
                                                <button  type="submit" class="button float-right" style="width: 40%;">Apply Coupon</button>
                                            </form>
                                            <form method="post" action="<?php echo base_url("cart/updateCart"); ?>" class="woocommerce-cart-form">
                                                <table class="shop_table shop_table_responsive cart">
                                                    <thead>
                                                        <tr>
                                                            <th class="product-remove">&nbsp;</th>
                                                            <th class="product-thumbnail">&nbsp;</th>
                                                            <th class="product-name">Product</th>
                                                            <th class="product-price">Price</th>
                                                            <th class="product-quantity">Quantity</th>
                                                            <th class="product-subtotal">Total</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $amount=array();if($this->cart->contents()){ ?>
                                                        <?php foreach ($this->cart->contents() as $key => $value) : 
                                                            $image = $value["options"]["product_photos"];
                                                            $price = 0;
                                                            $price = (($value['price']*$value["qty"]));//$value['subtotal']; 
                                                            $amount[] = $price;
                                                        ?>
                                                        <tr class="<?php echo "product_".$value["rowid"]; ?>">
                                                            <td class="product-remove">
                                                                <a class="remove" href="#">×</a>
                                                            </td>
                                                            <td class="product-thumbnail">
                                                                <a href="single-product-fullwidth.html">
                                                                    <img width="180" height="180" alt="" class="wp-post-image" src="<?php echo base_url($image); ?>">
                                                                </a>
                                                            </td>
                                                            <td data-title="Product" class="product-name">
                                                                <div class="media cart-item-product-detail">
                                                                    <a href="single-product-fullwidth.html">
                                                                        <img width="180" height="180" alt="" class="wp-post-image" src="<?php echo base_url($image); ?>">
                                                                    </a>
                                                                    <div class="media-body align-self-center">
                                                                        <a href="single-product-fullwidth.html"><?php echo $value["options"]["product_name"];?></a>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td data-title="Price" class="product-price">
                                                                <span class="woocommerce-Price-amount amount">
                                                                    <?php if($this->dollar=='USD' && $dprice!=0){ 
                                                                        $convert_price = number_format(($value['price']/$dprice),2);
                                                                    ?>
                                                                        <span class="price">
                                                                            $ <?php echo $convert_price; ?>
                                                                        </span>
                                                                    <?php }else{ ?>
                                                                        <span class="price">
                                                                            INR. <?php echo number_format($value['price'],2); ?>
                                                                        </span>
                                                                    <?php } ?>
                                                                </span>
                                                            </td>
                                                            <td class="product-quantity" data-title="Quantity">
                                                                <div class="quantity">
                                                                    <label for="quantity-input-1">Quantity</label>
                                                                    <input id="quantity-input-1" type="number" name="qty[]" id="qty" value="<?php echo $value['qty'];?>" title="Qty" class="input-text qty text" size="4">
                                                                <input type="hidden" name="rowid[]" value="<?php echo $value['rowid']; ?>">
                                                                </div>
                                                            </td>
                                                            <td data-title="Total" class="product-subtotal">
                                                                <span class="woocommerce-Price-amount amount <?php echo "st_".$key; ?>">
                                                                    <?php if($this->dollar=='USD' && $dprice!=0){ 
                                                                        $convert_subprice = number_format(($price/$dprice),2);
                                                                    ?>
                                                                        <span class="<?php echo "st_".$key; ?> price"> $ <?php echo $convert_subprice; ?></span>
                                                                    <?php }else{ ?>
                                                                        <span class="<?php echo "st_".$key; ?> price"> INR. <?php echo number_format(($price),2); ?></span>
                                                                    <?php } ?>
                                                                </span>
                                                                <a data-id="<?php echo $value["rowid"]; ?>" title="Remove item" href="javascript:void(0)" class="remove deleteproduct">×</a>
                                                            </td>
                                                        </tr>
                                                        <?php endforeach; ?>
                                                        <?php }else{ ?>
                                                            <tr>
                                                                <td colspan="6">
                                                                    <h1>No Product in Cart!</h1>
                                                                </td>
                                                            </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                                <a class="button" href="<?php echo base_url();?>" style="color:#fff;">Continue Shopping</a>
                                                <button value="update_qty" name="update_cart_action" type="submit" class="button float-right">Update Bag</button>
                                            </form>
                                         </div>
                                         <div class="col-md-4">
                                            <div class="cart-collaterals" style="max-width: 100%;">
                                                <div class="cart_totals">
                                                    <h2>Cart totals</h2>
                                                    <?php $cart_amount = array_sum($amount);$delivery_charge=0;?>
                                                    <table class="shop_table shop_table_responsive">
                                                        <tbody>
                                                            <tr class="cart-subtotal">
                                                                <th>Subtotal</th>
                                                                <td data-title="Subtotal">
                                                                    <span class="woocommerce-Price-amount amount">
                                                                       <?php if($this->dollar=='USD' && $dprice!=0){ 
                                                                        $convert_sub_amount = number_format(($cart_amount/$dprice),2);
                                                                    ?>
                                                                         $ <?php echo $convert_sub_amount; ?>
                                                                    <?php }else{ ?>
                                                                         INR. <?php echo number_format($cart_amount,2); ?>
                                                                    <?php } ?>
                                                                </td>
                                                            </tr>
                                                            <?php if($this->session->userdata('user_coupon')){ 
                                                                if($this->session->userdata('user_coupon_type')==0){
                                                                    $coupon_amount = $this->session->userdata('user_coupon');
                                                                }else{
                                                                    $coupon_amount = (($cart_amount)*$this->session->userdata('user_coupon'))/100;
                                                                }
                                                            ?>
                                                            <tr class="cart-subtotal">
                                                                <th>Coupon Amount</th>
                                                                <td data-title="Subtotal">
                                                                    <span class="woocommerce-Price-amount amount">
                                                                       <?php if($this->dollar=='USD' && $dprice!=0){ 
                                                                            $convert_coupon_amount = number_format(($coupon_amount/$dprice),2);
                                                                        ?>
                                                                            - $ <?php echo $convert_coupon_amount; ?>
                                                                        <?php }else{ ?>
                                                                            - INR. <?php echo $coupon_amount; ?>
                                                                        <?php } ?>
                                                                </td>
                                                            </tr>
                                                            <?php }else{$coupon_amount =0;} ?>
                                                            <tr class="order-total">
                                                                <th>Total</th>
                                                                <td data-title="Total">
                                                                    <strong>
                                                                        <span class="woocommerce-Price-amount amount">
                                                                           <?php if($this->dollar=='USD' && $dprice!=0){ 
                                                                                $convert_gtotal = number_format((($cart_amount+$delivery_charge-$coupon_amount)/$dprice),2);
                                                                            ?>
                                                                                $ <?php echo $convert_gtotal; ?>
                                                                            <?php }else{ ?>
                                                                                INR. <?php echo number_format(($cart_amount+$delivery_charge-$coupon_amount),2);?>
                                                                            <?php } ?>
                                                                    </strong>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <!-- .shop_table shop_table_responsive -->
                                                    <div class="wc-proceed-to-checkout">
                                                        <!-- <form class="woocommerce-shipping-calculator" method="post" action="#">
                                                            <div class="collapse" id="shipping-form">
                                                                <div class="shipping-calculator-form">
                                                                    <p id="calc_shipping_country_field" class="form-row form-row-wide">
                                                                        <select rel="calc_shipping_state" class="country_to_state" id="calc_shipping_country" name="calc_shipping_country">
                                                                            <option value="">Select a country…</option>
                                                                            <option value="AX">Åland Islands</option>
                                                                            <option value="AF">Afghanistan</option>
                                                                            <option value="AL">Albania</option>
                                                                            <option value="DZ">Algeria</option>
                                                                            <option value="AS">American Samoa</option>
                                                                            <option value="AD">Andorra</option>
                                                                            <option value="AO">Angola</option>
                                                                            <option value="AI">Anguilla</option>
                                                                            <option value="AQ">Antarctica</option>
                                                                            <option value="AG">Antigua and Barbuda</option>
                                                                            <option value="AR">Argentina</option>
                                                                            <option value="AM">Armenia</option>
                                                                            <option value="AW">Aruba</option>
                                                                            <option value="AU">Australia</option>
                                                                            <option value="AT">Austria</option>
                                                                            <option value="AZ">Azerbaijan</option>
                                                                        </select>
                                                                    </p>
                                                                    <p id="calc_shipping_state_field" class="form-row form-row-wide validate-required">
                                                                        <span>
                                                                            <select id="calc_shipping_state" name="calc_shipping_state">
                                                                                <option value="">Select an option…</option>
                                                                                <option value="AP">Andhra Pradesh</option>
                                                                                <option value="AR">Arunachal Pradesh</option>
                                                                                <option value="AS">Assam</option>
                                                                                <option value="BR">Bihar</option>
                                                                                <option value="CT">Chhattisgarh</option>
                                                                                <option value="GA">Goa</option>
                                                                                <option value="GJ">Gujarat</option>
                                                                                <option value="HR">Haryana</option>
                                                                                <option value="HP">Himachal Pradesh</option>
                                                                                <option value="JK">Jammu and Kashmir</option>
                                                                                <option value="JH">Jharkhand</option>
                                                                                <option value="KA">Karnataka</option>
                                                                                <option value="KL">Kerala</option>
                                                                                <option value="MP">Madhya Pradesh</option>
                                                                                <option value="MH">Maharashtra</option>
                                                                                <option value="MN">Manipur</option>
                                                                                <option value="ML">Meghalaya</option>
                                                                                <option value="MZ">Mizoram</option>
                                                                                <option value="NL">Nagaland</option>
                                                                                <option value="OR">Orissa</option>
                                                                                <option value="PB">Punjab</option>
                                                                                <option value="RJ">Rajasthan</option>
                                                                                <option value="SK">Sikkim</option>
                                                                                <option value="TN">Tamil Nadu</option>
                                                                                <option value="TS">Telangana</option>
                                                                                <option value="TR">Tripura</option>
                                                                                <option value="UK">Uttarakhand</option>
                                                                                <option value="UP">Uttar Pradesh</option>
                                                                                <option value="WB">West Bengal</option>
                                                                                <option value="AN">Andaman and Nicobar Islands</option>
                                                                                <option value="CH">Chandigarh</option>
                                                                                <option value="DN">Dadra and Nagar Haveli</option>
                                                                                <option value="DD">Daman and Diu</option>
                                                                                <option value="DL">Delhi</option>
                                                                                <option value="LD">Lakshadeep</option>
                                                                                <option value="PY">Pondicherry (Puducherry)</option>
                                                                            </select>
                                                                        </span>
                                                                    </p>
                                                                    <p id="calc_shipping_postcode_field" class="form-row form-row-wide validate-required">
                                                                        <input type="text" id="calc_shipping_postcode" name="calc_shipping_postcode" placeholder="Postcode / ZIP" value="" class="input-text">
                                                                    </p>
                                                                    <p>
                                                                        <button class="button" value="1" name="calc_shipping" type="submit">Update totals</button>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </form> -->
                                                        <!-- .wc-proceed-to-checkout -->
                                                        <a class="checkout-button button alt wc-forward" href="<?php echo base_url("checkout"); ?>">Proceed to checkout</a>
                                                        <a class="back-to-shopping" href="<?php echo base_url();?>">Back to Shopping</a>
                                                    </div>
                                                    <!-- .wc-proceed-to-checkout -->
                                                </div>
                                                <!-- .cart_totals -->
                                            </div>
                                        </div>


                                    <!-- .cart-collaterals -->
                                </div>
                                <!-- .cart-wrapper -->
                            </div>
                            <!-- .woocommerce -->
                        </div>
                        <!-- .entry-content -->
                    </div>
                    <!-- .hentry -->
                </main>
                <!-- #main -->
            </div>
            <!-- #primary -->
        </div>
        <!-- .row -->
    </div>
    <!-- .col-full -->
</div>