<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="text-themecolor">Producer List</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Producers</li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="row el-element-overlay">
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
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Producer List</h4>
                        <div class="table-responsive m-t-40">
                            <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Contact No.</th>
                                        <th>Gender</th>
                                        <th>City</th>
                                        <th width="150px">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(isset($producer) && !empty($producer)){ foreach ($producer as $key => $value){ ?>
                                    <tr>
                                        <th><?php echo $key+1;?></th>
                                        <th><?php echo $value['name'];?></th>
                                        <th><?php echo $value['email'];?></th>
                                        <th><?php echo $value['mobile_no'];?></th>
                                        <th><?php echo $value['gender'];?></th>
                                        <th><?php echo $value['city'] ?></th>
                                        <th>
                                            <a href="<?php echo base_url(A.'/edit-producer/'.$value['producer_id']);?>" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                            <a href="<?php echo base_url(A.'/deleteProducer/'.$value['producer_id']);?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                        </th>
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
</div>