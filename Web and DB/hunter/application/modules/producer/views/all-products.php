<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="text-themecolor">Events List</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Events</li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="row el-element-overlay">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Events List</h4>
                        <div class="table-responsive m-t-40">
                            <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Events Name</th>
                                        <th>Events Image</th>
                                        <th>Date</th>
                                        <th width="150px">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(isset($pro) && !empty($pro)){ foreach ($pro as $key => $value){ $image = $this->common->getData('product_media',array('product_id'=>$value['productid']));?>
                                    <tr>
                                        <td><?php echo $key+1;?></td>
                                        <td><?php echo $value['product_name'];?></td>
                                        <td><?php if(!empty($image[0]['product_image'])){?><img src="<?php echo base_url($image['0']['product_image']);?>" style="width: 50px;"><?php } ?></td>
                                        <td><?php echo $value['product_price'];?></td>
                                        <td><?php echo $value['product_upload_date'];?></td>
                                        <td>
                                            <a href="<?php echo base_url(P.'/edit-product/'.$value['productid']);?>" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                            <a href="javascript:void(0)" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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
</div>