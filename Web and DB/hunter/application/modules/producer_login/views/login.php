<div class="page-title-section section section-padding-top-0" style="background-image: url(<?php echo base_url('assets/front/images/page-banner/about-us-01-hero-bg.jpg');?>);">
    <div class="page-title">
        <div class="container">
            <h1 class="title" style="color: #fff;padding-top: 100px;">Hunter Login</h1>
        </div>
    </div>
    <div class="page-breadcrumb">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="<?php echo base_url();?>" style="color: #fff;">Home</a></li>
                <li class="current" style="color: #fff;">Login & Register</li>
            </ul>
        </div>
    </div>
</div>

<section class="block">
    <div class="container">
        <div class="login-register">
            <div class="row" style="padding-top: 80px;">
                <div class="col-md-12">
                     <div class="alert alert-success alert-dismissible" role="alert" <?php if($this->session->flashdata('message')==''){ ?> style="display:none" <?php } ?> >
                     <button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="fa fa-times"></i></button>
                     <span style="color:green;"><?php echo $this->session->flashdata('message'); ?></span>
                     </div>
                     <div class="alert alert-warning alert-dismissible" role="alert" <?php if($this->session->flashdata('emessage')==''){ ?> style="display:none" <?php } ?> >
                     <button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="fa fa-times"></i></button>
                     <span style="color:red;"><?php echo $this->session->flashdata('emessage'); ?></span>
                     </div>
                </div>
                <div class="col-lg-5">
                    <div class="lg-form">
                        <h3 class="mm-title">Login</h3>
                        <form method="post" action="<?php echo base_url("producer_login/doLogin");?>">
                            <div class="form-group">
                                <input type="email" name="email" placeholder="Email Address" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" placeholder="Password" class="form-control">
                            </div>
                            <div class="form-group">
                                <a href="#" title="" class="float-right">Forget a Password</a>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-hover-secondary">Login <span></span></button>
                            </div>
                        </form>
                    </div><!--login end-->
                </div>
                <div class="col-lg-2">
                    
                </div>
                <div class="col-lg-5">
                    <div class="lg-form">
                        <h3 class="mm-title">Not Yet Register?</h3>
                        <form method="post" action="<?php echo base_url("producer_login/registerUser");?>">
                            <div class="form-group">
                                <input type="text" name="name" placeholder="Full Name" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" placeholder="Email Address" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="text" name="mobile_no" maxlength="10" placeholder="Mobile No." class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" placeholder="Password" class="form-control">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-hover-secondary">Create New Account <span></span></button>
                            </div>
                        </form>
                    </div><!--login end-->
                </div>
            </div>
        </div>
    </div>
</section>