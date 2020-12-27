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
                                    <form method="post" action="<?php echo base_url("profile/UpdateBankInfo"); ?>" class="woocommerce-cart-form">

                                    <?php if(($profile['account_name'] == '' || $profile['account_no'] == '' || $profile['ifsc_code'] == '') && $profile['reject'] != 1){ ?>
                                        <h6 style="padding: 20px;background: #f6cfcf;color: #a19a9a;margin-bottom: 20px;">Please Provide All the information in order to Afficilate the Product</h6>
                                    <?php }elseif($profile['account_status'] == 0 && $profile['reject']!=1){ ?>
                                        <h6 style="padding: 20px;background: #f8f1bf;color: #a19a9a;margin-bottom: 20px;">Verification is Under Process Please Wait Some time</h6>
                                    <?php }elseif (($profile['account_name'] != '' || $profile['account_no'] != '' || $profile['ifsc_code'] != '') && $profile['reject'] == 1 && $profile['account_status'] == 0){ ?>
                                        <h6 style="padding: 20px;background: #f6cfcf;color: #a19a9a;margin-bottom: 20px;">Your Bank Account Details are not Verified Please try again later </h6>
                                    <?php }else{ ?>
                                        <h6 style="padding: 20px;background: #bfedb9;color: #a19a9a;margin-bottom: 20px;">Account Details are Verified now you can Affilate the products</h6>
                                    <?php } ?>
                                    <?php if((($profile['account_name'] != '' && $profile['account_no'] != '' && $profile['ifsc_code'] != '') && $profile['reject'] != 1 && ($profile['account_status'] == 0 || $profile['account_status'] == 1))){ ?>
                                        <p class="form-row form-row-wide">
                                            <label for="reg_email">Bank Name
                                                <span class="required">*</span>
                                            </label>
                                            <input type="text" readonly value="<?php echo $profile['account_name'];?>" class="woocommerce-Input woocommerce-Input--text input-text">
                                        </p>
                                        <p class="form-row form-row-wide">
                                            <label for="reg_email">Bank Account Number
                                                <span class="required">*</span>
                                            </label>
                                            <input type="text" readonly value="<?php echo $profile['account_no'];?>" class="woocommerce-Input woocommerce-Input--text input-text">
                                        </p>
                                        <p class="form-row form-row-wide">
                                            <label for="reg_email">IFSC Code
                                                <span class="required">*</span>
                                            </label>
                                            <input type="text" readonly value="<?php echo $profile['ifsc_code'];?>" class="woocommerce-Input woocommerce-Input--text input-text">
                                        </p>                         

                                        <p class="form-row">
                                            <input type="submit" disabled class="woocommerce-Button button" value="Save Details" />
                                        </p>               
                                    <?php }else if(($profile['account_name'] != '' && $profile['account_no'] != '' && $profile['ifsc_code'] != '') && $profile['reject'] == 1 && $profile['account_status'] == 0){ ?>
                                        <p class="form-row form-row-wide">
                                            <label for="reg_email">Bank Name
                                                <span class="required">*</span>
                                            </label>

                                            <input type="hidden" name="reject" value="0">
                                            <input type="text" id="reg_email" name="account_name" value="<?php echo $profile['account_name'];?>" class="woocommerce-Input woocommerce-Input--text input-text">
                                        </p>
                                        <p class="form-row form-row-wide">
                                            <label for="reg_email">Bank Account Number
                                                <span class="required">*</span>
                                            </label>
                                            <input type="text" name="account_no" value="<?php echo $profile['account_no'];?>" class="woocommerce-Input woocommerce-Input--text input-text">
                                        </p>
                                        <p class="form-row form-row-wide">
                                            <label for="reg_email">IFSC Code
                                                <span class="required">*</span>
                                            </label>
                                            <input type="text" name="ifsc_code" value="<?php echo $profile['ifsc_code'];?>" class="woocommerce-Input woocommerce-Input--text input-text">
                                        </p>
                                        <p class="form-row">
                                            <input type="submit" class="woocommerce-Button button" value="Save Details" />
                                        </p>
                                    <?php }else{ ?>
                                        <p class="form-row form-row-wide">
                                            <label for="reg_email">Bank Name
                                                <span class="required">*</span>
                                            </label>
                                            <input type="text" id="reg_email" value="<?php echo $profile['account_name'];?>" name="account_name" class="woocommerce-Input woocommerce-Input--text input-text">
                                        </p>
                                        <p class="form-row form-row-wide">
                                            <label for="reg_email">Bank Account Number
                                                <span class="required">*</span>
                                            </label>
                                            <input type="text" name="account_no" value="<?php echo $profile['account_no'];?>"  class="woocommerce-Input woocommerce-Input--text input-text">
                                        </p>
                                        <p class="form-row form-row-wide">
                                            <label for="reg_email">IFSC Code
                                                <span class="required">*</span>
                                            </label>
                                            <input type="text" name="ifsc_code" value="<?php echo $profile['ifsc_code'];?>" class="woocommerce-Input woocommerce-Input--text input-text">
                                        </p>
                                        <p class="form-row">
                                            <input type="submit" class="woocommerce-Button button" value="Save Details" />
                                        </p>
                                    <?php } ?>
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
                                                        <td><a href="<?php echo base_url("account-details"); ?>">Account Details</a></td>
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