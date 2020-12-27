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
                                <div class="jp-playlist">
                                    <h3>My Songs</h3>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Song Title</th>
                                                <th>Category</th>
                                                <th>Upload Date</th>
                                                <th>Likes</th>
                                                <th>Comments</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if(isset($song) && !empty($song)){ foreach ($song as $key => $value){ $comment = $this->common->getData('song_comments',array('songid'=>$value['songid']));$likes = $this->common->getData('song_likes',array('songid'=>$value['songid']));?>
                                            <tr>
                                                <td><?php echo $key+1;?></td>
                                                <td><?php echo $value['song_title'];?></td>
                                                <td><?php echo $value['song_category'];?></td>
                                                <td><?php echo date('d/M/Y H:i A',strtotime($value['date']));?></td>
                                                <td><?php if(!empty($likes)){ echo count($likes);}else{ echo '0';}?> &nbsp;&nbsp;<i class="fa fa-heart" style="color: red;"></i></td>
                                                <td><?php if(!empty($comment)){ echo count($comment);}else{ echo '0';}?> &nbsp;&nbsp;<i class="fa fa-comment text-primary"></i></td>
                                                <td>
                                                    <a href="<?php echo base_url('song-comments/'.$value['songid']);?>" title="View Comments"><i class="fa fa-eye text-primary"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <a href="<?php echo base_url('profile/deleteSong/'.$value['songid']);?>" title="Delete Song"><i class="fa fa-trash text-warning"></i></a>
                                                </td>
                                            </tr>
                                            <?php }} ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</section>