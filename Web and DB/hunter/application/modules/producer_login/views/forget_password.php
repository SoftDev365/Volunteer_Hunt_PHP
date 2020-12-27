<section class="breadcrumb-area">
  <div class="container-fluid custom-container">
    <div class="row bc-inner1">
      <div class="col-xl-12">
        <div class="bc-inner">
          <p><a href="<?php echo base_url(); ?>">Home  |</a> Forgot Password</p>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="contact-area">
      <div class="container-fluid custom-container">
        <div class="cntainer">          
            <div class="row">
              <div class="col-xs-12 col-md-6 col-md-offset-3">
                <div class="alert alert-success alert-dismissible" role="alert" <?php if($this->session->flashdata('message')==''){ ?> style="display:none" <?php } ?> >
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <?php echo $this->session->flashdata('message'); ?>
                </div>
                <div class="alert alert-danger alert-dismissible" role="alert" <?php if($this->session->flashdata('emessage')==''){ ?> style="display:none" <?php } ?> >
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <?php echo $this->session->flashdata('emessage'); ?>
                </div>
              </div>
            </div>
        </div>
        <div class="section-heading pb-30">
          <h3>Forgot <span>Password</span></h3>
        </div>
        <div class="row justify-content-center">
          <div class="col-sm-9 col-md-8 col-lg-6 col-xl-4">
            <div class="contact-form login-form">
              <form method="post" action="<?php echo base_url("user_login/forgetPassword"); ?>" id="forget_Otpform">
                <input type="hidden" name="mobile_no" value="<?php echo $this->session->userdata('mobileno'); ?>" />
                 <div class="form-group">
                    <input type="text" class="input-text required-entry form-control" name="email" placeholder="Email">
                 </div>
                 <input type="submit" value="Submit">
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>