<section class="pager-section">
    <div class="fixed-bg pager-bg"></div>
    <div class="container">
        <div class="pager-details text-center">
            <h2 class="page-title">My Songs</h2>
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
                <section class="block pt-0">
                    <div class="container">
                        <div id="jp_container_12" class="jp-audio" role="application" aria-label="media player">
                            <div class="jp-type-playlist">
                                <div class="jp-gui jp-interface play-list-style align-items-center">
                                    <div class="album-img">
                                        <img src="<?php echo base_url('assets/front/');?>images/resources/album-img.jpg" alt="">
                                    </div><!--album-img end-->
                                    <div class="musicc-controls">
                                        <div class="beatx-playyer">
                                            <div id="jp_container_2" class="jp-audio" role="application" aria-label="media player">
                                                <div class="jp-type-playlist">
                                                    <div class="jp-gui jp-interface align-items-center">
                                                        <div class="musicc-controls">
                                                            <div class="row align-items-center">
                                                                <div class="col-xl-12">
                                                                    <div class="song-title">
                                                                        <h2 class="jp-title"></h2>
                                                                    </div>
                                                                </div>
                                                                <div class="col-xl-5 col-lg-5 col-md-5">
                                                                    <div class="jp-controls d-flex flex-wrap align-items-center justify-content-start">
                                                                        <button class="jp-previous" role="button" tabindex="0"><i class="flaticon-backward-arrows-couple-pointing-to-left"></i></button>
                                                                        <button class="jp-play" role="button" tabindex="0"><i class="fa fa-play"></i></button>
                                                                        <button class="jp-next" role="button" tabindex="0"><i class="flaticon-fast-forward"></i></button>
                                                                    </div>
                                                                </div>
                                                                <div class="col-xl-7 col-lg-7 col-md-7 text-right">
                                                                    <div class="controls-sc">
                                                                        <div class="jp-progress">
                                                                            <div class="jp-seek-bar">
                                                                                <div class="jp-play-bar"></div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="jp-time-holder">
                                                                            <div class="jp-current-time" role="timer" aria-label="time">&nbsp;</div>
                                                                            <div class="jp-duration" role="timer" aria-label="duration">&nbsp;</div>
                                                                        </div>
                                                                        <div class="jp-toggles">
                                                                            <button class="jp-repeat" role="button" tabindex="0"><i class="fa fa-redo-alt"></i></button>
                                                                            <button class="jp-shuffle" role="button" tabindex="0"><i class="fa fa-random"></i></button>
                                                                        </div>
                                                                        <div class="jp-volume-controls">
                                                                            <!-- <button class="jp-mute" role="button" tabindex="0"><i class="fa fa-volume-off"></i></button> -->
                                                                            <div class="jp-volume-bar">
                                                                                <div class="jp-volume-bar-value"></div>
                                                                            </div>
                                                                            <button class="jp-mute" role="button" tabindex="0"><i class="fa fa-volume-up"></i></button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="jp-playlist">
                                                        <h3>My Songs</h3>
                                                        <ul>
                                                            <li>&nbsp;</li>
                                                        </ul>
                                                    </div>
                                                    <div class="jp-no-solution">
                                                        <span>Update Required</span>
                                                        To play the media you will need to either update your browser to a recent version or update your <a href="http://get.adobe.com/flashplayer/" target="_blank">Flash plugin</a>.
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!--beatx-music-player end-->
                                    </div>
                                </div>
                                <div class="jp-playlist">
                                    <h3>My Songs 
                                        <span class="float-right"><a href="<?php echo base_url('comments-delete-songs');?>" class="btn btn-primary text-light">Comments / Delete Songs</a></span>
                                    </h3>
                                    <ul>
                                        <li>&nbsp;</li>
                                    </ul>
                                </div>
                                <div class="jp-no-solution">
                                    <span>Update Required</span>
                                    To play the media you will need to either update your browser to a recent version or update your <a href="http://get.adobe.com/flashplayer/" target="_blank">Flash plugin</a>.
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript">
    $(document).ready(function(){
        new jPlayerPlaylist({jPlayer:"#jquery_jplayer_1",
        cssSelectorAncestor:"#jp_container_12"},
        [
    <?php if(isset($song) && !empty($song)){ foreach ($song as $key => $value) {?>
        {title:"<?php echo $value['song_title'];?>",mp3:"<?php echo base_url($value['user_song']);?>"},
    <?php }} ?>
        ],{swfPath:"<?php echo base_url('assets/front/js/jplayer');?>",supplied:"oga, mp3",wmode:"window",useStateClassSkin:!0,autoBlur:!1,smoothPlayBar:!0,keyEnabled:!0})});

</script>

