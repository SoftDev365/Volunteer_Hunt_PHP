<section class="pager-section">
    <div class="fixed-bg pager-bg"></div>
    <div class="container">
        <div class="pager-details text-center">
            <h2 class="page-title">Welcome, <?php echo $this->session->userdata('user_name');?></h2>
            <ul class="breadcrumb">
                <li><a href="<?php echo base_url();?>" title="">Home</a></li>
                <li><span>Profile</span></li>
            </ul>
        </div>
    </div>
</section>
<style type="text/css">
    .user-menu-btn { border-radius: 0; }
    .list-sec { padding-top: 250px; }
    .profileDash { padding-bottom: 250px; }
    @media (max-width: 768px){
        .list-sec { padding-top: 60px !important; }
        .profileDash { padding-bottom:50px !important; }
    }
    .dash-widget{
        border-radius: 10px;
        display: flex;
        justify-content: space-between;
        padding: 20px;
        align-items: center;
        margin-bottom: 30px;
    }
    .dash-widget-1 {
        background-color: #ff0080;
    }
    .dash-widget-2 {
        background-color: #d9c505;
    }
    .dash-widget-icon {
        width: 60px;
        height: 60px;
        border: 2px solid #fff;
        text-align: center;
        line-height: 60px;
        border-radius: 50%;
        color: #fff;
        font-size: 20px;
        font-weight: 500;
        flex: 0 0 60px;
        margin-right: 10px;
    }
    .dash-widget-info > span {
        color: #fff;
        font-size: 18px;
        font-weight: 700;
        margin-bottom: 0;
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
                 <?php if(isset($order) && !empty($order)){ if($order['subscribe'] == '1'){ ?>
                    <div class="row">
                        <div class="col-md-6">
                            <a href="" class="dash-widget dash-widget-1">
                                <span class="dash-widget-icon"><?php echo $order['available_songs'] ?></span>
                                <div class="dash-widget-info">
                                    <span>Available Songs</span>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-6">
                            <a href="" class="dash-widget dash-widget-2">
                                <span class="dash-widget-icon"><?php if(!empty($song)){ echo count($song);}else{echo 0;}?></span>
                                <div class="dash-widget-info">
                                    <span>Uploaded Songs</span>
                                </div>
                            </a>
                        </div>
                        <?php if(!empty($order)){ ?>
                        <div class="col-lg-12" style="margin-bottom: 30px;">
                            <div class="price-col" style="background: #323031;">
                                <h4 style="color: #fff">Active Plan Details</h4>
                                <h2 style="color: #fff"><sup>End Date</sup></h2>
                                <h4 style="color: #fff;font-size: 24px;"> <?php echo date('d-M-Y H:i A',strtotime($order['end_plan']));?></h4>
                                <i class="flaticon-playlist"></i>
                                <a href="javascript:void(0)" title="" class="btn-default" style="margin-top: 20px;"><?php echo $order['plan'];?><small> Plan</small></a>
                            </div>
                        </div>
                    <?php } ?>
                    </div>
                    
                  <?php }else{ ?>
                        <section class="block list-sec">
                            <div class="container">
                                <div class="wlc-sec">
                                    <div class="wl-txt">
                                        <i class="flaticon-playlist"></i>
                                        <h2>Simply post your demos and let the rest be History!</h2>
                                        <p class="text-danger">You Dont Have Any Subscription right Now</p>
                                        <a href="#subscribe" title="" class="btn-default open-music-player"><i class="fa fa-play"></i> Subscribe Now <span></span></a>
                                    </div><!--wl-txt end-->
                                    <div class="row">
                                        <div class="col-lg-5">
                                            <div class="wl-col">
                                                <img src="<?php echo base_url('assets/front/');?>images/resources/imgg1.png" alt="">
                                            </div><!--wl-col end-->
                                        </div>
                                        <div class="col-lg-5 ml-auto">
                                            <div class="wl-coll text-right">
                                                <div class="imgg-one">
                                                    <img class="imgg-one" src="<?php echo base_url('assets/front/');?>images/resources/imgg2.png" alt="">
                                                </div>
                                                <img src="<?php echo base_url('assets/front/');?>images/resources/imgg3.png" alt="">
                                            </div><!--wl-col end-->
                                        </div>
                                    </div>
                                </div><!--wlc-sec end-->
                            </div>
                        </section>
                  <?php }}else{ ?>
                
                <section class="block list-sec">
                    <div class="container">
                        <div class="wlc-sec">
                            <div class="wl-txt">
                                <i class="flaticon-playlist"></i>
                                <h2>Simply post your demos and let the rest be History!</h2>
                                <p class="text-danger">You Dont Have Any Subscription right Now</p>
                                <a href="<?php echo base_url('subscribe-now');?>" title="" class="btn-default"><i class="fa fa-play"></i> Subcribe Now <span></span></a>
                            </div>
                        </div>
                    </div>
                </section>
                  <?php } ?>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript">
    <?php $song = $this->common->getData('user_songs',array('profileid'=>$this->profileid),array(),array('field'=>'id','by'=>'desc'),array('limit'=>10));?>
    $(document).ready(function(){
        new jPlayerPlaylist({jPlayer:"#jquery_jplayer_1",
        cssSelectorAncestor:"#jp_container_12"},
        [
    <?php if(isset($song) && !empty($song)){ foreach ($song as $key => $value) {?>
        {title:"<?php echo $value['song_title'];?>",mp3:"<?php echo base_url($value['user_song']);?>"},
    <?php }} ?>
        ],{swfPath:"<?php echo base_url('assets/front/js/jplayer');?>",supplied:"oga, mp3",wmode:"window",useStateClassSkin:!0,autoBlur:!1,smoothPlayBar:!0,keyEnabled:!0})});

</script>