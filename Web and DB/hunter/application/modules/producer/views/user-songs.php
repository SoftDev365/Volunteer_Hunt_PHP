<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="text-themecolor">User Songs</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Songs</li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="row el-element-overlay">
            <div class="col-md-12">
                <div <?php if($this->session->flashdata('message') == ''){ ?> class="alert alert-danger alert-dismissible" style="display: none;" <?php }else { ?> class="alert alert-success alert-dismissible fade show" <?php } ?>>
                    <button type="button" class="close" data-dismiss="alert">×</button>
                     <?php echo $this->session->flashdata('message'); ?>
                </div>
                <div <?php if($this->session->flashdata('emessage') == ''){ ?> class="alert alert-danger alert-dismissible" style="display: none;" <?php }else { ?> class="alert alert-danger alert-dismissible fade show" <?php } ?>>
                    <button type="button" class="close" data-dismiss="alert">×</button>
                     <?php echo $this->session->flashdata('emessage'); ?>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Song List</h4>
                        <div class="table-responsive m-t-40">
                            <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Image</th>
                                        <th>Title</th>
                                        <th>Uploaded By</th>
                                        <th>Comments</th>
                                        <th>Likes</th>
                                        <th class="text-nowrap">Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Image</th>
                                        <th>Title</th>
                                        <th>Uploaded By</th>
                                        <th>Comments</th>
                                        <th>Likes</th>
                                        <th class="text-nowrap">Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php if(isset($songs) && !empty($songs)){ foreach ($songs as $key => $value){ $user = $this->common->getsData('user',array('profileid'=>$value['profileid'])); $comments = $this->common->getData('song_comments',array('songid'=>$value['songid']),array('id'));$likes = $this->common->getData('song_likes',array('songid'=>$value['songid']),array('id'));$likealready = $this->common->getsData('song_likes',array('songid'=>$value['songid'],'producer_id'=>$this->producerid));?>
                                    <tr>
                                        <td><?php echo $key+1; ?></td>
                                        <td>
                                        <?php if($user['image']!=''){ ?>
                                            <img src="<?php echo base_url($user['image']);?>" alt="<?php echo $user['name'];?>"  style="width: 60px;height: 60px;"/>
                                        <?php }else{ ?>
                                            <img src="<?php echo base_url('assets/admin/');?>dist/images/alb1.jpg" alt="user"  style="width: 60px;height: 60px;"/>
                                        <?php } ?>
                                        </td>
                                        <td><?php echo $value['song_title'];?></td>
                                        <td><?php if(!empty($user['name'])){echo $user['name'];}else{echo $user;}?></td>
                                        <td><span style="font-size: 16px;font-weight: 600;"><?php if(!empty($comments)){ echo count($comments);}else{echo 0;} ?></span> </td>
                                        <td><span style="font-size: 16px;font-weight: 600;"><?php if(!empty($likes)){ echo count($likes);}else{echo 0;} ?> </td>
                                        <td class="text-nowrap">
                                            <a href="javascript:void(0)" data-toggle="tooltip" data-original-title="Comment" class="AddComment btn btn-dark" data-song="<?php echo $value['songid'];?>"><i class="fa fa-comment"></i></a>
                                            <a href="<?php echo base_url(P.'/song-detail/'.$value['songid']);?>" data-toggle="tooltip" data-original-title="View Detail" class="btn btn-dark" data-song="<?php echo $value['songid'];?>"><i class="fa fa-eye"></i></a>
                                            <?php if(!empty($likealready)){ ?>
                                                <a href="javascript:void(0)" data-toggle="tooltip" data-original-title="Like" class="RemoveLike btn btn-dark" data-song="<?php echo $value['songid'];?>"><i class="fa fa-heart" style="color:red;"></i></a>
                                            <?php }else{ ?>
                                                <a href="javascript:void(0)" data-toggle="tooltip" data-original-title="Like" class="AddLike btn btn-dark" data-song="<?php echo $value['songid'];?>"><i class="fa fa-heart"></i></a>
                                            <?php } ?>
                                            <a href="javascript:void(0)" data-toggle="tooltip" data-original-title="Play" data-title="<?php echo $value['song_title'];?>" data-song="<?php echo base_url($value['user_song']);?>" class="PlaySong link btn btn-dark text-light"> <i class="fa fa-play-circle"></i> </a>
                                        </td>
                                    </tr>
                                    <?php }} ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mplayer">
        <div id="jp_container_N" class="bg-dark">
            <div class="jp-type-playlist">
                <div id="jplayer_N" class="jp-jplayer hide"></div>
                <div class="jp-gui">
                    <div class="jp-interface">
                        <div class="jp-controls">
                            <div><a class="jp-previous"><i class="fa fa-step-backward"></i></a></div>
                            <div>
                                <a class="jp-play"><i class="fa fa-play-circle fa-2x"></i></a>
                                <a class="jp-pause"><i class="fa fa-pause fa-2x"></i></a>
                            </div>
                            <div><a class="jp-next"><i class="fa fa-step-forward"></i></a></div>
                            <div class="jp-progress hidden-xs">
                                <div class="jp-seek-bar">
                                    <div class="jp-play-bar play-progress">
                                    </div>
                                    <div class="jp-current-time current-time text-white"></div>
                                    <div class="jp-title text-white">
                                        <ul>
                                            <li></li>
                                        </ul>
                                    </div>
                                    <div class="jp-duration duration text-white"></div>
                                </div>
                            </div>
                            <div class="hidden-xs hidden-sm">
                                <a class="jp-mute" title="mute"><i class="fa fa-volume-up"></i></a>
                                <a class="jp-unmute" title="unmute"><i class="fa fa-volume-off"></i></a>
                            </div>
                            <div class="jp-volume hidden-xs hidden-sm">
                                <div class="jp-volume-bar bg-muted">
                                    <div class="jp-volume-bar-value"></div>
                                </div>
                            </div>
                            <!-- <div>
                         <a class="jp-shuffle" title="shuffle"><i class="icon-shuffle text-muted"></i></a>
                         <a class="jp-shuffle-off hid" title="shuffle off"><i class="icon-shuffle text-lt"></i></a>
                         </div> -->
                            <!-- <div>
                         <a class="jp-repeat" title="repeat"><i class="icon-loop text-muted"></i></a>
                         <a class="jp-repeat-off hid" title="repeat off"><i class="icon-loop text-lt"></i></a>
                         </div> -->
                            <div><a class="" data-toggle="dropdown" data-target="#playlist"><i class="fa fa-bars"></i></a></div>
                        </div>
                    </div>
                </div>
                <div class="jp-playlist dropup" id="playlist">
                    <ul class="dropdown-menu bg-inverse m-b-0">
                        <li class="list-group-item"></li>
                    </ul>
                </div>
                <div class="jp-no-solution hide">
                    <span>Update Required</span> To play the media you will need to either update your browser to a recent version or update your <a href="http://get.adobe.com/flashplayer/" target="_blank">Flash plugin</a>.
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        var site_url = "<?php echo base_url(); ?>";
        var urlTitle = "<?php echo P; ?>";
        $('.AddComment').on('click',function(){
            var songid = $(this).attr('data-song');
            $('.modal-body #songid').val(songid);
            $('#AddComment').modal('show');
        });

        $('.AddLike').on('click',function(){
            var songid = $(this).attr('data-song');
            $.ajax({
                url  : site_url+urlTitle+"/LikeUserSOng",
                type : 'POST',
                data : 'songid='+songid,
                success : function(data){
                    location.reload();
                }
            });
        });
        $('.RemoveLike').on('click',function(){
            var songid = $(this).attr('data-song');
            $.ajax({
                url  : site_url+urlTitle+"/RemoveProducerLike",
                type : 'POST',
                data : 'songid='+songid,
                success : function(data){
                    location.reload();
                }
            });
        });
    });
</script>
<div class="modal fade" id="AddComment" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Comment</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?php echo base_url(P.'/AddComment');?>" method="post">
          <div class="modal-body">
            <input type="hidden" name="songid" value="" id="songid">
            <div class="form-group">
                <textarea name="comment" class="form-control" rows="5"></textarea>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
      </form>
    </div>
  </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $('.PlaySong').on('click',function(){
            var title = $(this).attr('data-title');
            var song = $(this).attr('data-song');
            $("#jplayer_N").jPlayer("setMedia", {title:title,mp3: song}).jPlayer("play");
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function(){
        new jPlayerPlaylist({jPlayer:"#jplayer_N",
        cssSelectorAncestor:"#jp_container_N"},
        [
     <?php if(isset($songs) && !empty($songs)){ foreach ($songs as $key => $value){ ?>
        {title:"<?php echo $value['song_title'];?>",mp3:"<?php echo base_url($value['user_song']);?>"},
    <?php }} ?>
        ],{swfPath:"<?php echo base_url('assets/front/js/jplayer');?>",supplied:"oga, mp3",wmode:"window",useStateClassSkin:!0,autoBlur:!1,smoothPlayBar:!0,keyEnabled:!0})});

</script>