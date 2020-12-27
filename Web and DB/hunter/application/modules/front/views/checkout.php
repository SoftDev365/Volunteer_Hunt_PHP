<?php 
  $dprice = 0;
  if($this->dollar=='USD'){ 
    $rate = $this->common->getsData('dollarprice',array('id'=>1));
    $dprice = $rate['rate'];
  }
?>
<?php 
  if($this->session->userdata('profileid')){
    $userdata = $this->common->getData('user_address',array('profileid'=>$this->session->userdata('profileid')));
    if($userdata){
      $userdata = $userdata[0];
    }
  }
  $bname = (isset($userdata['bname']))?$userdata['bname']:'';
  $bemail = (isset($userdata['bemail']))?$userdata['bemail']:'';
  $bmobile_no = (isset($userdata['bmobile_no']))?$userdata['bmobile_no']:'';
  $baddress1 = (isset($userdata['baddress1']))?$userdata['baddress1']:'';
  $baddress2 = (isset($userdata['baddress2']))?$userdata['baddress2']:'';
  $bcity = (isset($userdata['bcity']))?$userdata['bcity']:'';
  $bcountry = (isset($userdata['bcountry']))?$userdata['bcountry']:'';
  $bstate = (isset($userdata['bstate']))?$userdata['bstate']:'';
  $bpincode = (isset($userdata['bpincode']))?$userdata['bpincode']:'';

  $sname = (isset($userdata['sname']))?$userdata['sname']:'';
  $semail = (isset($userdata['semail']))?$userdata['semail']:'';
  $smobile_no = (isset($userdata['smobile_no']))?$userdata['smobile_no']:'';
  $saddress1 = (isset($userdata['saddress1']))?$userdata['saddress1']:'';
  $saddress2 = (isset($userdata['saddress2']))?$userdata['saddress2']:'';
  $scountry = (isset($userdata['scountry']))?$userdata['scountry']:'';
  $scity = (isset($userdata['scity']))?$userdata['scity']:'';
  $sstate = (isset($userdata['sstate']))?$userdata['sstate']:'';
  $spincode = (isset($userdata['spincode']))?$userdata['spincode']:'';
?>
<?php $countrylist = $this->config->item('country_list'); ?>
<div id="content" class="site-content">
    <div class="col-full">
        <div class="row">
            <nav class="woocommerce-breadcrumb">
                <a href="<?php echo base_url();?>">Home</a>
                <span class="delimiter">
                    <i class="tm tm-breadcrumbs-arrow-right"></i>
                </span>
                Checkout
            </nav>
            <!-- .woocommerce-breadcrumb -->
            <div class="content-area" id="primary">
                <main class="site-main" id="main">
                    <div class="type-page hentry">
                        <div class="entry-content">
                            <div class="woocommerce">
                                <form id="checkout-form" action="<?php echo base_url('front/placeOrder'); ?>" class="checkout woocommerce-checkout" method="post">
                                    <div id="customer_details" class="col2-set">
                                        <div class="col-1">
                                            <div class="woocommerce-billing-fields">
                                                <h3>Billing Details</h3>
                                                <div class="woocommerce-billing-fields__field-wrapper-outer">
                                                    <div class="woocommerce-billing-fields__field-wrapper">
                                                        <p id="billing_first_name_field" class="form-row form-row-first validate-required woocommerce-invalid woocommerce-invalid-required-field">
                                                            <label class="" for="billing_first_name">First Name
                                                                <abbr title="required" class="required">*</abbr>
                                                            </label>
                                                            <input type="text" id="bname" name="bname" placeholder="Full Name" value="<?php echo $bname; ?>" class="input-text ">
                                                        </p>
                                                        <p id="billing_last_name_field" class="form-row form-row-first validate-required woocommerce-invalid woocommerce-invalid-required-field">
                                                           <label class="" for="billing_company">Email Address</label>
                                                            <input type="email"id="bemail" name="bemail" placeholder="Email address" value="<?php echo $bemail; ?>" class="input-text ">
                                                        </p>
                                                        <div class="clear"></div>
                                                        <p id="billing_phone_field" class="form-row form-row-wide">
                                                            <label class="" for="billing_company">Contact Number</label>
                                                            <input type="text" id="bmobile_no" name="bmobile_no" placeholder="Phone no." value="<?php echo $bmobile_no; ?>" class="input-text ">
                                                        </p>
                                                        <p id="billing_country_field" class="form-row form-row-wide validate-required validate-email">
                                                            <?php if($this->dollar=='USD' && $dprice!=0){  ?>
                                                            <label class="" for="billing_country">Country
                                                                <abbr title="required" class="required">*</abbr>
                                                            </label>
                                                            <select autocomplete="country" class="country_to_state country_select select2-hidden-accessible"id="bcountry" name="bcountry" aria-hidden="true">
                                                                <option disabled selected>Select a country…</option>
                                                                <?php if(isset($countrylist) && !empty($countrylist)){ foreach($countrylist as $key=>$value) : ?>
                                                                <option <?php echo ($bcountry==$value)?'selected':''; ?> value="<?php echo $value; ?>"><?php echo $value; ?></option>
                                                              <?php endforeach; } ?>
                                                            </select>
                                                            <?php }else{ ?>
                                                            <label class="" for="billing_country">Country
                                                                <abbr title="required" class="required">*</abbr>
                                                            </label>
                                                            <input type="text" name="bcountry" class="input-text" value="India" required readonly>
                                                            <?php } ?>
                                                        </p>
                                                        <div class="clear"></div>
                                                        <p id="billing_address_1_field" class="form-row form-row-wide address-field validate-required">
                                                            <label class="" for="billing_address_1">Address line 1
                                                                <abbr title="required" class="required">*</abbr>
                                                            </label>
                                                            <input type="text" id="baddress1" name="baddress1"  placeholder="Address line 1" value="<?php echo $baddress1; ?>" class="input-text ">
                                                        </p>
                                                        <p id="billing_address_2_field" class="form-row form-row-wide address-field">
                                                            <input type="text"id="baddress2" name="baddress2" placeholder="Address line 2" value="<?php echo $baddress2; ?>" class="input-text ">
                                                        </p>
                                                        <p id="billing_city_field" class="form-row form-row-wide address-field validate-required" data-o_class="form-row form-row form-row-wide address-field validate-required">
                                                            <label class="" for="billing_city">Town / City
                                                                <abbr title="required" class="required">*</abbr>
                                                            </label>
                                                            <input type="text" id="bcity" name="bcity" placeholder="Town / City" value="<?php echo $bcity; ?>" class="input-text ">
                                                        </p>
                                                        <p id="billing_state_field" class="form-row form-row-wide address-field validate-required" data-o_class="form-row form-row form-row-wide address-field validate-required">
                                                            <label class="" for="billing_city">State / Province
                                                                <abbr title="required" class="required">*</abbr>
                                                            </label>
                                                            <input type="text" id="bstate" name="bstate" placeholder="State / Province" value="<?php echo $bstate; ?>" class="input-text ">
                                                        </p>
                                                        <p id="billing_postcode_field" class="form-row form-row-wide address-field validate-postcode validate-required" data-o_class="form-row form-row form-row-last address-field validate-required validate-postcode">
                                                            <label class="" for="billing_postcode">Postcode / ZIP
                                                                <abbr title="required" class="required">*</abbr>
                                                            </label>
                                                            <input type="text" id="bpincode" name="bpincode" placeholder="Pin Code" value="<?php echo $bpincode; ?>" class="input-text ">
                                                        </p>
                                                    </div>
                                                </div>
                                                <!-- .woocommerce-billing-fields__field-wrapper-outer -->
                                            </div>
                                        </div>
                                        <!-- .col-1 -->
                                        <div class="col-2">
                                            <div class="woocommerce-shipping-fields">
                                                <h3 id="ship-to-different-address">
                                                    <label class="collapsed woocommerce-form__label woocommerce-form__label-for-checkbox checkbox" data-toggle="collapse" data-target="#shipping-address" aria-controls="shipping-address">
                                                        <input id="ship-to-different-address-checkbox" class="woocommerce-form__input woocommerce-form__input-checkbox input-checkbox" type="checkbox" value="1" name="ship_to_different_address">
                                                        <span>Ship to a different address?</span>
                                                    </label>
                                                </h3>
                                                <div class="shipping_address collapse" id="shipping-address">
                                                    <div class="woocommerce-shipping-fields__field-wrapper">
                                                        <p id="shipping_first_name_field" class="form-row form-row-first validate-required woocommerce-invalid woocommerce-invalid-required-field">
                                                            <label class="" for="shipping_first_name">Full Name
                                                                <abbr title="required" class="required">*</abbr>
                                                            </label>
                                                            <input type="text" id="sname" name="sname" placeholder="Full Name" value="<?php echo $sname; ?>" class="input-text ">
                                                        </p>
                                                        <p id="shipping_last_name_field" class="form-row form-row-first validate-required woocommerce-invalid woocommerce-invalid-required-field">
                                                           <label class="" for="shipping_company">Email Address</label>
                                                            <input type="email"id="semail" name="semail" placeholder="Email address" value="<?php echo $semail; ?>" class="input-text ">
                                                        </p>
                                                        <div class="clear"></div>
                                                        <p id="shipping_phone_field" class="form-row form-row-wide">
                                                            <label class="" for="shipping_company">Contact Number</label>
                                                            <input type="text" id="smobile_no" name="smobile_no" placeholder="Phone no." value="<?php echo $smobile_no; ?>" class="input-text ">
                                                        </p>
                                                        <p id="shipping_country_field" class="form-row form-row-wide validate-required validate-email">
                                                            <?php if($this->dollar=='USD' && $dprice!=0){  ?>
                                                            <label class="" for="shipping_country">Country
                                                                <abbr title="required" class="required">*</abbr>
                                                            </label>
                                                            <select autocomplete="country" class="country_to_state country_select select2-hidden-accessible" id="scountry" name="scountry" aria-hidden="true">
                                                                <option disabled selected>Select a country…</option>
                                                                <?php if(isset($countrylist) && !empty($countrylist)){ foreach($countrylist as $key=>$value) : ?>
                                                                <option <?php echo ($scountry==$value)?'selected':''; ?> value="<?php echo $value; ?>"><?php echo $value; ?></option>
                                                              <?php endforeach; } ?>
                                                            </select>
                                                            <?php }else{ ?>
                                                            <label class="" for="shipping_country">Country
                                                                <abbr title="required" class="required">*</abbr>
                                                            </label>
                                                            <input type="text" id="scountry" name="scountry" class="input-text" placeholder="Enter Country" value="India" readonly>
                                                            <?php } ?>
                                                        </p>
                                                        <div class="clear"></div>
                                                        <p id="shipping_address_1_field" class="form-row form-row-wide address-field validate-required">
                                                            <label class="" for="shipping_address_1">Address line 1
                                                                <abbr title="required" class="required">*</abbr>
                                                            </label>
                                                            <input type="text" id="saddress1" name="saddress1"  placeholder="Address line 1" value="<?php echo $saddress1; ?>" class="input-text ">
                                                        </p>
                                                        <p id="shipping_address_2_field" class="form-row form-row-wide address-field">
                                                            <input type="text"id="saddress2" name="saddress2" placeholder="Address line 2" value="<?php echo $saddress2; ?>" class="input-text ">
                                                        </p>
                                                        <p id="shipping_city_field" class="form-row form-row-wide address-field validate-required" data-o_class="form-row form-row form-row-wide address-field validate-required">
                                                            <label class="" for="shipping_city">Town / City
                                                                <abbr title="required" class="required">*</abbr>
                                                            </label>
                                                            <input type="text" id="scity" name="scity" placeholder="Town / City" value="<?php echo $scity; ?>" class="input-text ">
                                                        </p>
                                                        <p id="shipping_state_field" class="form-row form-row-wide address-field validate-required" data-o_class="form-row form-row form-row-wide address-field validate-required">
                                                            <label class="" for="shipping_city">State / Province
                                                                <abbr title="required" class="required">*</abbr>
                                                            </label>
                                                            <input type="text" id="sstate" name="sstate" placeholder="State / Province" value="<?php echo $sstate; ?>" class="input-text ">
                                                        </p>
                                                        <p id="shipping_postcode_field" class="form-row form-row-wide address-field validate-postcode validate-required" data-o_class="form-row form-row form-row-last address-field validate-required validate-postcode">
                                                            <label class="" for="shipping_postcode">Postcode / ZIP
                                                                <abbr title="required" class="required">*</abbr>
                                                            </label>
                                                            <input type="text" id="spincode" name="spincode" placeholder="Pin Code" value="<?php echo $spincode; ?>" class="input-text ">
                                                        </p>
                                                    </div>
                                                    <!-- .woocommerce-shipping-fields__field-wrapper -->
                                                </div>
                                                <!-- .shipping_address -->
                                            </div>
                                            <!-- .woocommerce-shipping-fields -->
                                            <!-- <div class="woocommerce-additional-fields">
                                                <div class="woocommerce-additional-fields__field-wrapper">
                                                    <p id="order_comments_field" class="form-row notes">
                                                        <label class="" for="order_comments">Order notes</label>
                                                        <textarea cols="5" rows="2" placeholder="Notes about your order, e.g. special notes for delivery." id="order_comments" class="input-text " name="order_comments"></textarea>
                                                    </p>
                                                </div>
                                            </div> -->
                                            <!-- .woocommerce-additional-fields -->
                                        </div>
                                        <!-- .col-2 -->
                                    </div>
                                    <!-- .col2-set -->
                                    <h3 id="order_review_heading">Your order</h3>
                                    <div class="woocommerce-checkout-review-order" id="order_review">
                                        <div class="order-review-wrapper">
                                            <h3 class="order_review_heading">Your Order</h3>
                                            <table class="shop_table woocommerce-checkout-review-order-table">
                                                <thead>
                                                    <tr>
                                                        <th class="product-name">Product</th>
                                                        <th class="product-total">Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                     <?php $amount=$pweight=array();
                                                      if($this->cart->contents()){ ?>
                                                      <?php foreach ($this->cart->contents() as $key => $value) : 
                                                          $price = 0;
                                                          $price = (($value['price']*$value["qty"]));//$value['subtotal']; 
                                                          $amount[] = $price;
                                                          $pweight[] = ($value["options"]['product_weight']*$value["qty"]);
                                                      ?>
                                                    <tr class="cart_item">
                                                        <td class="product-name" style="width: 80%;">
                                                            <strong class="product-quantity"><?php echo $value['qty'];?> ×</strong> <?php echo $value["options"]["product_name"];?>&nbsp;
                                                        </td>
                                                        <td class="product-total">
                                                            <span class="woocommerce-Price-amount amount <?php echo "st_".$key; ?>">
                                                                <?php if($this->dollar=='USD' && $dprice!=0){ 
                                                                  $convert_price = number_format(($value['price']/$dprice),2);
                                                                ?>
                                                                  $ <?php echo $convert_price; ?>
                                                                <?php }else{ ?>
                                                                  INR. <?php echo number_format($value['price'],2); ?>
                                                                <?php } ?>        
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <?php endforeach; } ?>  
                                                </tbody>
                                                <tfoot>
                                                    <?php $cart_amount = array_sum($amount); $delivery_charge=0;?>
                                                    <tr class="cart-subtotal">
                                                        <th>Subtotal</th>
                                                        <td>
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
                                                            $coupon_amount = (($this->cart->total())*$this->session->userdata('user_coupon'))/100;
                                                            //echo $coupon_amount;
                                                        }
                                                    ?>
                                                    <tr class="cart-subtotal">
                                                        <th>Coupon Amount</th>
                                                        <td>
                                                            <?php if($this->dollar=='USD' && $dprice!=0){ 
                                                              $convert_coupon_amount = number_format(($coupon_amount/$dprice),2);
                                                            ?>
                                                             - $ <?php echo $convert_coupon_amount; ?>
                                                            <?php }else{ ?>
                                                             - INR. <?php echo $coupon_amount; ?>
                                                            <?php } ?>
                                                        </td>
                                                    </tr>
                                                    <?php }else{
                                                        $coupon_amount =0;
                                                    } ?>
                                                    <tr class="order-total">
                                                        <th>Total</th>
                                                        <td>
                                                            <strong>
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
                                                </tfoot>
                                            </table>
                                            <!-- /.woocommerce-checkout-review-order-table -->
                                            <div class="woocommerce-checkout-payment" id="payment">
                                                <ul class="wc_payment_methods payment_methods methods">
                                                    <li class="wc_payment_method payment_method_cod">
                                                        <input type="radio" checked id="COD" value="COD" name="payment_method" class="input-radio">
                                                        <label for="payment_method_cod">Cash on delivery </label>
                                                    </li>
                                                </ul>
                                                <div class="form-row place-order">
                                                    <p class="form-row terms wc-terms-and-conditions woocommerce-validated">
                                                        <label class="woocommerce-form__label woocommerce-form__label-for-checkbox checkbox">
                                                            <input type="checkbox" id="terms" class="woocommerce-form__input woocommerce-form__input-checkbox input-checkbox">
                                                            <span>I’ve read and accept the <a class="woocommerce-terms-and-conditions-link" href="terms-and-conditions.html">terms &amp; conditions</a></span>
                                                            <span class="required">*</span>
                                                        </label>
                                                    </p>
                                                    <button type="submit" disabled="true" id="PlaceOrderButton" class="button wc-forward text-center">Place order</button>
                                                    <script type="text/javascript">
                                                        $('#terms').on('change',function(){
                                                            if($(this).is(":checked"))
                                                            {
                                                                $('#PlaceOrderButton').prop('disabled',false);
                                                            }else{
                                                                $('#PlaceOrderButton').prop('disabled',true);
                                                            }
                                                        })
                                                    </script>
                                                </div>
                                            </div>
                                            <!-- /.woocommerce-checkout-payment -->
                                        </div>
                                        <!-- /.order-review-wrapper -->
                                    </div>
                                    <!-- .woocommerce-checkout-review-order -->
                                </form>
                                <!-- .woocommerce-checkout -->
                            </div>
                            <!-- .woocommerce -->
                        </div>
                        <!-- .entry-content -->
                    </div>
                    <!-- #post-## -->
                </main>
                <!-- #main -->
            </div>
            <!-- #primary -->
        </div>
        <!-- .row -->
    </div>
    <!-- .col-full -->
</div>