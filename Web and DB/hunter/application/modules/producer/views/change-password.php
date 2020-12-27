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
                                    <form method="post" action="<?php echo base_url("profile/changePassword"); ?>" class="woocommerce-cart-form">
                                        <p class="form-row form-row-wide">
                                            <label for="reg_email">Email address
                                                <span class="required">*</span>
                                            </label>
                                            <input type="email" id="reg_email" name="email" class="woocommerce-Input woocommerce-Input--text input-text">
                                        </p>
                                        <p class="form-row form-row-wide">
                                            <label for="reg_email">Old Password
                                                <span class="required">*</span>
                                            </label>
                                            <input type="password" name="password" class="woocommerce-Input woocommerce-Input--text input-text">
                                        </p>
                                        <p class="form-row form-row-wide">
                                            <label for="reg_email">New Password
                                                <span class="required">*</span>
                                            </label>
                                            <input type="password" name="new_password" class="woocommerce-Input woocommerce-Input--text input-text">
                                        </p>
                                        <p class="form-row form-row-wide">
                                            <label for="reg_email">Confirm Password
                                                <span class="required">*</span>
                                            </label>
                                            <input type="password" name="confirm_password" class="woocommerce-Input woocommerce-Input--text input-text">
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