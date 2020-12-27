 <div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="text-themecolor"><?php echo $song['song_title'];?></h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Profile</li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- Column -->
            <div class="col-lg-4 col-xlg-3 col-md-5">
                <div class="card">
                    <div class="card-body">
                        <center class="m-t-30"> <img src="<?php echo base_url($user['image']);?>" class="img-circle" width="150" height="150" />
                            <h4 class="card-title m-t-10"><?php echo $user['name'];?></h4>
                            <h6 class="card-subtitle"><?php echo $user['profession'];?></h6>
                            <div class="row text-center justify-content-md-center">
                                <?php $total = $this->common->getData('user_songs',array('profileid'=>$user['profileid']),array('id'));?>
                                <div class="col-4"><a href="javascript:void(0)" class="link"><i class="ti-music-alt"></i> <font class="font-medium"><?php if(!empty($total)){echo count($total);}else{echo 0;}?></font> Total Songs</a></div>
                            </div>
                        </center>
                    </div>
                    <div>
                        <hr> </div>
                    <div class="card-body"> <small class="text-muted">Email address </small>
                        <h6><?php echo $user['email'];?></h6> <small class="text-muted p-t-30 db">Phone</small>
                        <h6><?php echo $user['mobile_no'];?></h6> <small class="text-muted p-t-30 db">Address</small>
                        <h6><?php echo $user['address'];?></h6><small class="text-muted p-t-30 db">City</small>
                        <h6><?php echo $user['city'];?></h6> <small class="text-muted p-t-30 db">State</small>
                        <h6><?php echo $user['state'];?></h6> <small class="text-muted p-t-30 db">Date of Birth</small>
                        <h6><?php echo date('d/M/Y',strtotime($user['dob']));?></h6>
                        
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-lg-8 col-xlg-9 col-md-7">
                <div class="card">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs profile-tab" role="tablist">
                        <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home" role="tab">Comments</a> </li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane active" id="home" role="tabpanel" style="height: 600px;overflow-y: scroll;">
                            <div class="card-body">
                                <div class="profiletimeline">
                                    <?php if(isset($comments) && !empty($comments)){ foreach ($comments as $key => $value){ $producer = $this->common->getsData('producers',array('producer_id'=>$value['producer_id']));?>
                                    <div class="sl-item">
                                        <div class="sl-right">
                                            <div><a href="javascript:void(0)" class="link">By <?php if(!empty($producer)){echo $producer['name'];}else{echo 'Producer';}?></a> <span class="sl-date">(<?php echo date('d-M-Y H:i A',strtotime($value['date']));?>)</span>
                                                <p style="font-size: 16px;"><?php echo $value['comment'];?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <?php }} ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
        </div>
    </div>
</div>