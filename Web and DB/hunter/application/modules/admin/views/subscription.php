<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-2 align-self-center">
                <h4 class="text-themecolor">Subscriptions</h4>
            </div>
            <div class="col-md-8">
              <div <?php if($this->session->flashdata('message') == ''){ ?> class="alert alert-success alert-dismissible" style="display: none;" <?php }else { ?> class="alert alert-success alert-dismissible fade show" style="margin-bottom: 0px;" <?php } ?>>
                 <button type="button" class="close" data-dismiss="alert">×</button>
                 <?php echo $this->session->flashdata('message'); ?>
              </div>
              <div <?php if($this->session->flashdata('emessage') == ''){ ?> class="alert alert-danger alert-dismissible" style="display: none;" <?php }else { ?> class="alert alert-danger alert-dismissible fade show" style="margin-bottom: 0px;" <?php } ?>>
                 <button type="button" class="close" data-dismiss="alert">×</button>
                 <?php echo $this->session->flashdata('emessage'); ?>
              </div>
            </div>
            <div class="col-md-2 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Subscription</li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="row el-element-overlay">
          <?php if(isset($sub) && !empty($sub)){ foreach ($sub as $key => $value){ ?>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"><?php echo $value['plan'];?></h4>
                        <h1 class="card-title">$<?php echo $value['price'];?></h1>
                        <h5>Duration : <?php echo $value['duration'];?> Day</h5>
                        <ul style="padding-top: 20px;padding-bottom:20px;list-style: none;">
                          <li><i class="fa fa-check-o"></i> <?php echo $value['song'];?> Song</li>
                          <li><i class="fa fa-check-o"></i> <?php echo $value['video'];?> Video</li>
                          <li><i class="fa fa-check-o"></i> <?php echo $value['duration'];?> day expiration</li>
                        </ul>
                        <a href="<?php echo base_url(A.'/edit-subsciption/'.$value['id']);?>" class="btn btn-block btn-success text-light" style="font-weight: bold;font-size: 20px;">Edit</a>
                    </div>
                </div>
            </div>
          <?php }} ?>
        </div>
    </div>
</div>