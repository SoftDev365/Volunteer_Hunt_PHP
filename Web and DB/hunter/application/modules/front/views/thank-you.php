<div id="content" class="site-content">
    <div class="col-full">
        <div class="row">
            <nav class="woocommerce-breadcrumb">
                <a href="<?php echo base_url();?>">Home</a>
                <span class="delimiter">
                    <i class="tm tm-breadcrumbs-arrow-right"></i>
                </span>Thank You
            </nav>
            <div id="primary" class="content-area">
                <main id="main" class="site-main">
                    <div class="error404">
                        <div class="info-404">
                            <p class="lead">Thank You For Shopping With The <a href="<?php echo base_url();?>">NiceSpend.com</a>.</p>
                            <p class="lead error-text">Your order id is</p>
                            <h2 class="title" style="margin-top: 30px;font-size: 60px;margin-bottom: 40px;"><?php echo $this->session->userdata("orderid"); ?></h2>
                            <div class="sub-form-row">
                                <div class="widget woocommerce widget_product_search">
                                    <a href="<?php echo base_url();?>" class="button">Continue Shopping</a>
                                </div>
                            </div>
                        </div>
                        <!-- .sub-form-row -->
                    </div>
                    <!-- .error404 -->
                </main>
                <!-- #main -->
            </div>
            <!-- #primary -->
        </div>
        <!-- .row -->
    </div>
    <!-- .col-full -->
</div>