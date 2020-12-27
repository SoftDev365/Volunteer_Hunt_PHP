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
                <div class="contact-page-form">
                    <h3 class="sb-title">Upload your Song</h3>
                    <div class="post-comments">
                        <form method="post" action="javascript:void(0)" id="userSubmit" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" name="song_title" class="form-control name" placeholder="Song title" style="border-radius: 0px;">
                                    </div><!--form-group end-->
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <select name="song_category" class="form-control name"  style="height: 60px;border-radius: 0px;">
                                            <option selected disabled>Select Category</option>
                                            <?php if(isset($cat) && !empty($cat)){ foreach ($cat as $key => $value){ ?>
                                            <option value="<?php echo $value['category'];?>"><?php echo $value['category'];?></option>
                                            <?php }} ?>
                                        </select>
                                    </div><!--form-group end-->
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="file" name="user_song" class="form-control" style="border-radius: 0px;">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group m-0">
                                        <button type="submit" class="btn-default" id="submit">Submit <span></span></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript">
    $(function() {
    var siteUrl = "<?php echo base_url();?>";
    $("#userSubmit").submit(function(e) {
        var $form = $(e.target);
        e.preventDefault();
        var form_data = new FormData(document.getElementById("userSubmit"));
        $.ajax({
            url: siteUrl+"/profile/UploadSong",
            type: "POST",
            data: form_data,
            processData: false,  
            contentType: false,
            success(result){
                if(result == 1){
                    alert('Your song is uploaded Successfully');
                    window.location.href = siteUrl+"/user-profile";
                }else if(result == 0){
                    alert('Something went wrong, please try again');
                }else if(result == 2){
                    alert('You dont have a Song to upload');
                    window.location.href = siteUrl+"/user-profile";
                }
            },
        });
    });
});
</script>