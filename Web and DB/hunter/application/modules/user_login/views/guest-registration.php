<div class="breadcrumb-box" style="padding-top: 20px;">
    <a href="#">Home</a>
    <a href="#">Register</a>
</div>

<div class="information-blocks">
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-success alert-dismissible" role="alert" <?php if($this->session->flashdata('message')==''){ ?> style="display:none" <?php } ?> >
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                <?php echo $this->session->flashdata('message'); ?>
            </div>
            <div class="alert alert-warning alert-dismissible" role="alert" <?php if($this->session->flashdata('emessage')==''){ ?> style="display:none" <?php } ?> >
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                <?php echo $this->session->flashdata('emessage'); ?>
            </div>
            <div class="alert alert-success1" role="alert" <?php if($this->session->flashdata('guestmessage')==''){ ?> style="display:none" <?php } ?> >
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                <?php echo $this->session->flashdata('guestmessage'); ?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6 information-entry">
            <div class="login-box">
                <div class="article-container style-1">
                    <h3>Register With Us</h3>
                    <p>By creating an account with our store, you will be able to move through the checkout process faster, store multiple shipping addresses, view and track your orders in your account and more.</p>
                </div>
                <form method="post" action="<?php echo base_url("user_login/GuestUserregister"); ?>">
                    
                    <!-- <a href="#0" class="social_bt google">Sign up with Google</a>
                    <div class="divider"><span>Or</span></div>
                    <h6>Personal details</h6> -->
                    
                    <label>Name</label>
                    <input class="simple-field" type="text" placeholder="Enter Full Name" name="name"/>
                    <label>Email</label>
                    <input class="simple-field" type="email" placeholder="Enter Email Address" name="email"/>
                    <label>Mobile Number</label>
                    <input class="simple-field" type="text" placeholder="Enter Mobile Number" name="mobile_no"/>
                    <label>Password</label>
                    <input class="simple-field" type="password" placeholder="Enter Password" name="password"/>
                    <div class="button style-10">Register Account<input type="submit" value=""/></div>
                </form>
            </div>
        </div>
        <div class="col-sm-6 information-entry">
            <div class="login-box">
                <div class="article-container style-1">
                    <h3>Registered Customers</h3>
                    <p>Already a Customer Login Here.</p>
                </div>
                <a href="<?php echo base_url('user-login');?>" class="button style-12">Login Account</a>
            </div>
        </div>
    </div>
</div>