<section class="pager-section">
    <div class="fixed-bg pager-bg"></div>
    <div class="container">
        <div class="pager-details text-center">
            <h2 class="page-title">Login & Register</h2>
            <ul class="breadcrumb">
                <li><a href="#" title="">Home</a></li>
                <li><a href="#" title="">Pages</a></li>
                <li><span>Login & Register</span></li>
            </ul><!--breadcrumb end-->
        </div><!--pager-details end-->
    </div>
</section><!--pager-section end-->

<section class="block">
    <div class="container">
        <div class="login-register">
            <div class="row">
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
                        <form method="post" action="<?php echo base_url("user_login/doLogin");?>">
                            <div class="form-group">
                                <input type="email" name="email" placeholder="Email Address" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" placeholder="Password" class="form-control">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn-default">Login <span></span></button>
                                <a href="#" title="">Forget a Password</a>
                            </div>
                        </form>
                    </div><!--login end-->
                </div>
                <div class="col-lg-2">
                    <div class="or">
                        <span>Or</span>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="lg-form">
                        <h3 class="mm-title">Not Yet Register?</h3>
                        <form method="post" action="<?php echo base_url("user_login/registerUser");?>">
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
                                <button type="submit" class="btn-default">Create New Account <span></span></button>
                            </div>
                        </form>
                    </div><!--login end-->
                </div>
            </div>
        </div><!--login-register end-->
        <div class="pl-section text-center">
            <div class="section-title text-center">
                <span>Artists’ rights and making the music</span>
                <h2>RELEASE ALL YOUR MUSIC ON...</h2>
            </div><!--section-title end-->
            <div class="pl-logos">
                <div class="pl-logo">
                    <img src="images/resources/pl-1.png" alt="">
                </div><!--pl-logo end-->
                <div class="pl-logo">
                    <img src="images/resources/pl-2.png" alt="">
                </div><!--pl-logo end-->
                <div class="pl-logo">
                    <img src="images/resources/pl-3.png" alt="">
                </div><!--pl-logo end-->
                <div class="pl-logo">
                    <img src="images/resources/pl-4.png" alt="">
                </div><!--pl-logo end-->
                <div class="pl-logo">
                    <img src="images/resources/pl-5.png" alt="">
                </div><!--pl-logo end-->
                <div class="pl-logo">
                    <img src="images/resources/pl-1.png" alt="">
                </div><!--pl-logo end-->
                <div class="pl-logo">
                    <img src="images/resources/pl-2.png" alt="">
                </div><!--pl-logo end-->
                <div class="pl-logo">
                    <img src="images/resources/pl-3.png" alt="">
                </div><!--pl-logo end-->
                <div class="pl-logo">
                    <img src="images/resources/pl-4.png" alt="">
                </div><!--pl-logo end-->
                <div class="pl-logo">
                    <img src="images/resources/pl-5.png" alt="">
                </div><!--pl-logo end-->
            </div><!--pl-logos end-->
            <a href="#" title="" class="btn-default">SELL YOUR MUSIC <span></span></a>
        </div><!--pl-section end-->
    </div>
</section>