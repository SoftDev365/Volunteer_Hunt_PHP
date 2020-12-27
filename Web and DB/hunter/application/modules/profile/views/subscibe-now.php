<style type="text/css">
    .user-menu-btn { border-radius: 0; }
    .list-sec { padding-top: 250px; }
    .profileDash { padding-bottom: 250px; }
    @media (max-width: 768px){
        .list-sec { padding-top: 60px !important; }
        .profileDash { padding-bottom:50px !important; }
    }
</style>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
<section class="block profileDash">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <center style="background: #323031;padding: 21px;">
                    <span>
                        <img src="<?php if($profile['image']!=''){ echo base_url($profile['image']);}?>" alt="<?php echo $profile['name'];?>" class="UserImage">
                        <h1 style="padding-top: 10px;color: #fff;font-size: 24px;text-transform: uppercase;font-weight: 600;"><?php echo $this->session->userdata('user_name');?></h1>
                    </span>
                </center>
                <ul class="UserMenuDefault" style="border-top: 1px solid;border-bottom: 1px solid;">
                    <li><a href="<?php echo base_url('user-profile');?>" class="btn btn-default btn-block user-menu-btn">Dashboard</a></li>
                    <li><a href="<?php echo base_url('upload-song');?>" class="btn btn-default btn-block user-menu-btn">Upload Songs</a></li>
                    <li><a href="<?php echo base_url('my-songs');?>" class="btn btn-default btn-block user-menu-btn">My Songs</a></li>
                    <li><a href="<?php echo base_url('change-password');?>" class="btn btn-default btn-block user-menu-btn">Change Password</a></li>
                    <li><a href="<?php echo base_url('subscribe-now');?>" class="btn btn-default btn-block user-menu-btn">Subscription</a></li>
                    <li><a href="<?php echo base_url('edit-profile');?>" class="btn btn-default btn-block user-menu-btn">Edit Profile</a></li>
                    <li><a href="<?php echo base_url('front/logout');?>" class="btn btn-default btn-block user-menu-btn">Logout</a></li>
                </ul>
            </div>
            <div class="col-md-9">
                <div class="row">
                    <?php if(isset($subs) && !empty($subs)){ foreach ($subs as $key => $value){  ?>
                        <div class="col-lg-6" style="margin-bottom: 30px;">
                            <div class="price-col">
                                <h2><sup>$</sup><?php echo $value['price'];?></h2>
                                <h4>Duration <?php echo $value['duration'];?> days</h4>
                                <span>(<?php echo $value['song'];?> songs)</span>
                                <i class="flaticon-playlist"></i>
                                <a href="<?php echo base_url('front/subscribeNow/'.$this->profileid.'/'.$value['id']);?>" title="" class="btn-default" style="margin-top: 20px;"><?php echo $value['plan'];?> <small>Start Now</small></a>
                            </div>
                        </div>
                    <?php }} ?>
                </div>
            </div>
        </div>
    </div>
</section>