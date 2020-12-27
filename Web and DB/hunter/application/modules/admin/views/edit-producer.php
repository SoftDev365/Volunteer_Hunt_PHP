 <div class="page-wrapper">
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="text-themecolor">Edit Producer</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Edit Producer</li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12">
               <div class="alert alert-success alert-dismissible" role="alert" <?php if($this->session->flashdata('message')==''){ ?> style="display:none" <?php } ?> >
                   <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                   <?php echo $this->session->flashdata('message'); ?>
               </div>
               <div class="alert alert-danger alert-dismissible" role="alert" <?php if($this->session->flashdata('emessage')==''){ ?> style="display:none" <?php } ?> >
                   <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                   <?php echo $this->session->flashdata('emessage'); ?>
               </div>
            </div>
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header bg-info">
                        <h4 class="m-b-0 text-white">Edit Producer</h4>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo base_url(A.'/EditProducer');?>" method="post" enctype="multipart/form-data">
                            <div class="form-body">
                                <h3 class="card-title">Producer Info</h3>
                                <hr>
                                <div class="row p-t-20">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Producer Name</label>
                                            <input type="hidden" name="producer_id" value="<?php echo $profile['producer_id'];?>">
                                            <input type="text" id="firstName" name="name" class="form-control" value="<?php echo $profile['name'];?>" placeholder="Enter Name">
                                        </div>
                                    </div>
                                     <div class="col-md-6">
                                        <div class="form-group has-success">
                                            <label class="control-label">Gender</label>
                                            <select name="gender" class="form-control custom-select">
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <!--/row-->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Producer Contact No.</label>
                                            <input type="text" name="mobile_no" id="mobile_no" value="<?php echo $profile['mobile_no'];?>" class="form-control" placeholder="Enter Contact No.">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Profile Image</label>
                                            <input type="file" name="image" class="form-control" >
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Producer Email</label>
                                            <input type="text" name="email" id="email"  value="<?php echo $profile['email'];?>" class="form-control" placeholder="Enter Email">
                                         </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Producer Email</label>
                                            <input type="password" name="password" id="password"  value="<?php echo $profile['plan_text'];?>" class="form-control" placeholder="Enter Email">
                                         </div>
                                    </div>
                                    
                                </div>
                          
                                <h3 class="box-title m-t-40">Address</h3>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Street</label>
                                            <input name="address" type="text" value="<?php echo $profile['address'];?>" class="form-control" placeholder="Enter Address">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Date of Birth</label>
                                            <input type="date" name="dob" value="<?php echo date('d/m/Y',strtotime($profile['dob']));?>" class="form-control" placeholder="<?php echo date('d/m/Y',strtotime($profile['dob']));?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>City</label>
                                            <input type="text" name="city" value="<?php echo $profile['city'];?>" class="form-control" placeholder="Enter City">
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>State</label>
                                            <input type="text" name="state" value="<?php echo $profile['state'];?>" class="form-control" placeholder="Enter State">
                                        </div>
                                    </div>
                                    <!--/span-->
                                </div>
                                <!--/row-->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Post Code</label>
                                            <input type="text" name="pincode" value="<?php echo $profile['pincode'];?>" class="form-control" placeholder="Enter Post Code">
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Country</label>
                                            <select name="country" class="form-control custom-select">
                                                <option selected disabled>--Select your Country--</option>
                                                <?php $country_list = $this->config->item('country_list'); if(isset($country_list)){ foreach ($country_list as $key => $value){ ?>
                                                <option <?php if($profile['country'] == $value){echo 'selected';}?>><?php echo $value;?></option>
                                                <?php }} ?>
                                            </select>
                                        </div>
                                    </div>
                                    <!--/span-->
                                </div>
                            </div>
                            <div class="form-actions">
                                <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
                                <button type="button" class="btn btn-inverse">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>