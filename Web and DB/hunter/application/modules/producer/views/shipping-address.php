<div id="content" class="site-content">
    <div class="col-full">
        <div class="row">
            <nav class="woocommerce-breadcrumb">
                <a href="<?php echo base_url();?>">Home</a>
                <span class="delimiter">
                    <i class="tm tm-breadcrumbs-arrow-right"></i>
                </span>
                Shipping Address
            </nav>
            <!-- .woocommerce-breadcrumb -->
            <div id="primary" class="content-area">
                <main id="main" class="site-main">
                    <div class="type-page hentry">
                        <div class="entry-content">
                            <div class="woocommerce">
                                <div class="cart-wrapper">
                                    <form method="post" action="<?php echo base_url("profile/updateShippingInformation"); ?>" class="woocommerce-cart-form">
                                        <p class="form-row form-row-wide">
                                            <label for="reg_email">Full Name
                                                <span class="required">*</span>
                                            </label>
                                            <input type="text" value="<?php echo $sprofile['sname']; ?>"  id="name" name="sname" class="woocommerce-Input woocommerce-Input--text input-text">
                                        </p>
                                        <p class="form-row form-row-wide">
                                            <label for="reg_email">Email address
                                                <span class="required">*</span>
                                            </label>
                                            <input type="email" value="<?php echo $sprofile['semail']; ?>" id="reg_email" name="semail" class="woocommerce-Input woocommerce-Input--text input-text">
                                        </p>
                                        <p class="form-row form-row-wide">
                                            <label for="reg_email">Mobile Number
                                                <span class="required">*</span>
                                            </label>
                                            <input type="text" value="<?php echo $sprofile['smobile_no']; ?>" id="mobile_no" name="smobile_no" class="woocommerce-Input woocommerce-Input--text input-text">
                                        </p>
                                        <p class="form-row form-row-wide">
                                            <label for="reg_password">Address
                                                <span class="required">*</span>
                                            </label>
                                            <input type="text" id="reg_password" value="<?php echo $sprofile['saddress1']; ?>" name="saddress1" class="woocommerce-Input woocommerce-Input--text input-text">
                                            <input type="text" id="reg_password" value="<?php echo $sprofile['saddress2']; ?>" name="saddress2" class="woocommerce-Input woocommerce-Input--text input-text">
                                        </p>
                                        <p class="form-row form-row-wide">
                                            <label for="reg_password">State
                                                <span class="required">*</span>
                                            </label>
                                             <?php $sstate = $sprofile['sstate']; ?>
                                            <select name="sstate" class="woocommerce-Input">
                                                <option <?php echo($sstate=='')?'selected':''; ?> value="">Please Select Region, State or Province</option>
                                                 <option <?php echo($sstate=='Andhra Pradesh')?'selected':''; ?> value="Andhra Pradesh">Andhra Pradesh  </option>
                                                 <option <?php echo($sstate=='Arunachal Pradesh')?'selected':''; ?> value="Arunachal Pradesh">Arunachal Pradesh</option>
                                                 <option <?php echo($sstate=='Assam')?'selected':''; ?> value="Assam"> Assam </option>
                                                 <option <?php echo($sstate=='Bihar')?'selected':''; ?> value="Bihar">Bihar </option>
                                                 <option <?php echo($sstate=='Chandigarh')?'selected':''; ?> value="Chandigarh">Chandigarh </option>
                                                 <option <?php echo($sstate=='Chhattisgarh')?'selected':''; ?> value="Chhattisgarh"> Chhattisgarh </option>
                                                 <option <?php echo($sstate=='Dadra and Nagar Haveli')?'selected':''; ?> value="Dadra and Nagar Haveli">Dadra and Nagar Haveli </option>
                                                 <option <?php echo($sstate=='Daman and Diu')?'selected':''; ?> value="Daman and Diu">Daman and Diu </option>
                                                 <option <?php echo($sstate=='Delhi')?'selected':''; ?> value="Delhi">Delhi </option>
                                                 <option <?php echo($sstate=='Goa')?'selected':''; ?> value="Goa">Goa </option>
                                                 <option <?php echo($sstate=='Gujarat')?'selected':''; ?> value="Gujarat">Gujarat </option>
                                                 <option <?php echo($sstate=='Haryana')?'selected':''; ?> value="Haryana">Haryana </option>
                                                 <option <?php echo($sstate=='Himachal Pradesh')?'selected':''; ?> value="Himachal Pradesh">Himachal Pradesh </option>
                                                 <option <?php echo($sstate=='Jammu and Kashmir')?'selected':''; ?> value="Jammu and Kashmir">Jammu and Kashmir</option>
                                                 <option <?php echo($sstate=='Jharkhand')?'selected':''; ?> value="Jharkhand">Jharkhand </option>
                                                 <option <?php echo($sstate=='Karnataka')?'selected':''; ?> value="Karnataka">Karnataka </option>
                                                 <option <?php echo($sstate=='Kerala')?'selected':''; ?> value="Kerala">Kerala</option>
                                                 <option <?php echo($sstate=='Madhya Pradesh')?'selected':''; ?> value="Madhya Pradesh"> Madhya Pradesh</option>
                                                 <option <?php echo($sstate=='Maharashtra')?'selected':''; ?> value="Maharashtra">Maharashtra </option>
                                                 <option <?php echo($sstate=='Manipur')?'selected':''; ?> value="Manipur">Manipur </option>
                                                 <option <?php echo($sstate=='Meghalaya')?'selected':''; ?> value="Meghalaya">Meghalaya </option>
                                                 <option <?php echo($sstate=='Mizoram')?'selected':''; ?> value="Mizoram"> Mizoram </option>
                                                 <option <?php echo($sstate=='Nagaland')?'selected':''; ?> value="Nagaland">Nagaland </option>
                                                 <option <?php echo($sstate=='Orissa')?'selected':''; ?> value="Orissa">Orissa </option>
                                                 <option <?php echo($sstate=='Puducherry')?'selected':''; ?> value="Puducherry">Puducherry </option>
                                                 <option <?php echo($sstate=='Punjab')?'selected':''; ?> value="Punjab"> Punjab  </option>
                                                 <option <?php echo($sstate=='Rajasthan')?'selected':''; ?> value="Rajasthan">Rajasthan </option>
                                                 <option <?php echo($sstate=='Sikkim')?'selected':''; ?> value="Sikkim">Sikkim </option>
                                                 <option <?php echo($sstate=='Tamil Nadu')?'selected':''; ?> value="Tamil Nadu">Tamil Nadu </option>
                                                 <option <?php echo($sstate=='Tripura')?'selected':''; ?> value="Tripura">Tripura</option>
                                                 <option <?php echo($sstate=='Uttar Pradesh')?'selected':''; ?> value="Uttar Pradesh">Uttar Pradesh </option>
                                                 <option <?php echo($sstate=='Uttarakhand')?'selected':''; ?> value="Uttarakhand">Uttarakhand </option>
                                                 <option <?php echo($sstate=='West Bengal')?'selected':''; ?> value="West Bengal"> West Bengal </option>
                                            </select>
                                            
                                        </p>

                                        <p class="form-row form-row-wide">
                                            <label for="reg_email">City
                                                <span class="required">*</span>
                                            </label>
                                            <input type="text" value="<?php echo $sprofile['scity']; ?>" id="scity" name="scity" class="woocommerce-Input woocommerce-Input--text input-text">
                                        </p>
                                        <p class="form-row form-row-wide">
                                            <label for="reg_email">Pincode
                                                <span class="required">*</span>
                                            </label>
                                            <input type="text" value="<?php echo $sprofile['spincode']; ?>" id="spincode" name="spincode" class="woocommerce-Input woocommerce-Input--text input-text">
                                        </p>
                                        <p class="form-row">
                                            <input type="submit" class="woocommerce-Button button" value="Save Details" />
                                        </p>
                                    </form>
                                    <!-- .woocommerce-cart-form -->
                                    <div class="cart-collaterals">
                                        <div class="cart_totals">
                                            <h2>My Account</h2>
                                            <table class="shop_table shop_table_responsive">
                                                <tbody>
                                                    <tr>
                                                        <td><a href="<?php echo base_url("user-profile");?>">Account Dashboard</a></td>
                                                    </tr>
                                                    <tr>
                                                        <td><a href="<?php echo base_url("add-billing-address"); ?>">Billing Information</a></td>
                                                    </tr>
                                                    <tr>
                                                        <td><a href="<?php echo base_url("add-shipping-address"); ?>">Shipping Information</a></td>
                                                    </tr>
                                                    <tr>
                                                        <td><a href="<?php echo base_url("all-orders"); ?>">Orders History</a></td>
                                                    </tr>
                                                    <tr>
                                                        <td><a href="<?php echo base_url("user-change-password"); ?>">Change Password</a></td>
                                                    </tr>
                                                    <tr>
                                                        <td><a href="<?php echo base_url("front/logout");?>">Logout</a></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <!-- .wc-proceed-to-checkout -->
                                        </div>
                                        <!-- .cart_totals -->
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
<!-- #content -->
<div class="col-full">
    <section class="brands-carousel">
        <h2 class="sr-only">Brands Carousel</h2>
        <div class="col-full" data-ride="tm-slick-carousel" data-wrap=".brands" data-slick="{&quot;slidesToShow&quot;:6,&quot;slidesToScroll&quot;:1,&quot;dots&quot;:false,&quot;arrows&quot;:true,&quot;responsive&quot;:[{&quot;breakpoint&quot;:400,&quot;settings&quot;:{&quot;slidesToShow&quot;:1,&quot;slidesToScroll&quot;:1}},{&quot;breakpoint&quot;:800,&quot;settings&quot;:{&quot;slidesToShow&quot;:3,&quot;slidesToScroll&quot;:3}},{&quot;breakpoint&quot;:992,&quot;settings&quot;:{&quot;slidesToShow&quot;:3,&quot;slidesToScroll&quot;:3}},{&quot;breakpoint&quot;:1200,&quot;settings&quot;:{&quot;slidesToShow&quot;:4,&quot;slidesToScroll&quot;:4}},{&quot;breakpoint&quot;:1400,&quot;settings&quot;:{&quot;slidesToShow&quot;:5,&quot;slidesToScroll&quot;:5}}]}">
            <div class="brands">
                <div class="item">
                    <a href="shop.html">
                        <figure>
                            <figcaption class="text-overlay">
                                <div class="info">
                                    <h4>apple</h4>
                                </div>
                                <!-- /.info -->
                            </figcaption>
                            <img width="145" height="50" class="img-responsive desaturate" alt="apple" src="<?php echo base_url('assets/front');?>/images/brands/1.png">
                        </figure>
                    </a>
                </div>
                <!-- .item -->
                <div class="item">
                    <a href="shop.html">
                        <figure>
                            <figcaption class="text-overlay">
                                <div class="info">
                                    <h4>bosch</h4>
                                </div>
                                <!-- /.info -->
                            </figcaption>
                            <img width="145" height="50" class="img-responsive desaturate" alt="bosch" src="<?php echo base_url('assets/front');?>/images/brands/2.png">
                        </figure>
                    </a>
                </div>
                <!-- .item -->
                <div class="item">
                    <a href="shop.html">
                        <figure>
                            <figcaption class="text-overlay">
                                <div class="info">
                                    <h4>cannon</h4>
                                </div>
                                <!-- /.info -->
                            </figcaption>
                            <img width="145" height="50" class="img-responsive desaturate" alt="cannon" src="<?php echo base_url('assets/front');?>/images/brands/3.png">
                        </figure>
                    </a>
                </div>
                <!-- .item -->
                <div class="item">
                    <a href="shop.html">
                        <figure>
                            <figcaption class="text-overlay">
                                <div class="info">
                                    <h4>connect</h4>
                                </div>
                                <!-- /.info -->
                            </figcaption>
                            <img width="145" height="50" class="img-responsive desaturate" alt="connect" src="<?php echo base_url('assets/front');?>/images/brands/4.png">
                        </figure>
                    </a>
                </div>
                <!-- .item -->
                <div class="item">
                    <a href="shop.html">
                        <figure>
                            <figcaption class="text-overlay">
                                <div class="info">
                                    <h4>galaxy</h4>
                                </div>
                                <!-- /.info -->
                            </figcaption>
                            <img width="145" height="50" class="img-responsive desaturate" alt="galaxy" src="<?php echo base_url('assets/front');?>/images/brands/5.png">
                        </figure>
                    </a>
                </div>
                <!-- .item -->
                <div class="item">
                    <a href="shop.html">
                        <figure>
                            <figcaption class="text-overlay">
                                <div class="info">
                                    <h4>gopro</h4>
                                </div>
                                <!-- /.info -->
                            </figcaption>
                            <img width="145" height="50" class="img-responsive desaturate" alt="gopro" src="<?php echo base_url('assets/front');?>/images/brands/6.png">
                        </figure>
                    </a>
                </div>
                <!-- .item -->
                <div class="item">
                    <a href="shop.html">
                        <figure>
                            <figcaption class="text-overlay">
                                <div class="info">
                                    <h4>handspot</h4>
                                </div>
                                <!-- /.info -->
                            </figcaption>
                            <img width="145" height="50" class="img-responsive desaturate" alt="handspot" src="<?php echo base_url('assets/front');?>/images/brands/7.png">
                        </figure>
                    </a>
                </div>
                <!-- .item -->
                <div class="item">
                    <a href="shop.html">
                        <figure>
                            <figcaption class="text-overlay">
                                <div class="info">
                                    <h4>kinova</h4>
                                </div>
                                <!-- /.info -->
                            </figcaption>
                            <img width="145" height="50" class="img-responsive desaturate" alt="kinova" src="<?php echo base_url('assets/front');?>/images/brands/8.png">
                        </figure>
                    </a>
                </div>
                <!-- .item -->
                <div class="item">
                    <a href="shop.html">
                        <figure>
                            <figcaption class="text-overlay">
                                <div class="info">
                                    <h4>nespresso</h4>
                                </div>
                                <!-- /.info -->
                            </figcaption>
                            <img width="145" height="50" class="img-responsive desaturate" alt="nespresso" src="<?php echo base_url('assets/front');?>/images/brands/9.png">
                        </figure>
                    </a>
                </div>
                <!-- .item -->
                <div class="item">
                    <a href="shop.html">
                        <figure>
                            <figcaption class="text-overlay">
                                <div class="info">
                                    <h4>samsung</h4>
                                </div>
                                <!-- /.info -->
                            </figcaption>
                            <img width="145" height="50" class="img-responsive desaturate" alt="samsung" src="<?php echo base_url('assets/front');?>/images/brands/10.png">
                        </figure>
                    </a>
                </div>
                <!-- .item -->
                <div class="item">
                    <a href="shop.html">
                        <figure>
                            <figcaption class="text-overlay">
                                <div class="info">
                                    <h4>speedway</h4>
                                </div>
                                <!-- /.info -->
                            </figcaption>
                            <img width="145" height="50" class="img-responsive desaturate" alt="speedway" src="<?php echo base_url('assets/front');?>/images/brands/11.png">
                        </figure>
                    </a>
                </div>
                <!-- .item -->
                <div class="item">
                    <a href="shop.html">
                        <figure>
                            <figcaption class="text-overlay">
                                <div class="info">
                                    <h4>yoko</h4>
                                </div>
                                <!-- /.info -->
                            </figcaption>
                            <img width="145" height="50" class="img-responsive desaturate" alt="yoko" src="<?php echo base_url('assets/front');?>/images/brands/12.png">
                        </figure>
                    </a>
                </div>
                <!-- .item -->
            </div>
        </div>
        <!-- .col-full -->
    </section>
    <!-- .brands-carousel -->
</div>