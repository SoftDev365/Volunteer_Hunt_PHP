<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="text-themecolor">Product List</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Products</li>
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
                        <h4 class="card-title">Product List</h4>
                        <div class="table-responsive m-t-40">
                            <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Product Name</th>
                                        <th>Product Image</th>
                                        <th>Product Price</th>
                                        <th>Product Category</th>
                                        <th>Upload By</th>
                                        <th>Url</th>
                                        <th width="150px">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(isset($pro) && !empty($pro)){ foreach ($pro as $key => $value){ $image=$this->common->getData('product_media',array('product_id'=>$value['productid']));$cat=$this->common->getsData('category',array('c_id'=>$value['product_category']));$produ=$this->common->getsData('producers',array('producer_id'=>$value['upload_by']));?>
                                    <tr>
                                        <th><?php echo $key+1;?></th>
                                        <th><?php echo $value['product_name'];?></th>
                                        <th><?php if($image[0]['product_image']!=''){ ?><img src="<?php echo base_url($image[0]['product_image']);?>" style="width: 50px;"><?php } ?></th>
                                        <th><?php echo $value['product_price'];?></th>
                                        <th><?php echo $cat['category'];?></th>
                                        <th><?php if(!empty($produ)){ echo $produ['name'].' ('.$value['upload_by'].')';}?></th>
                                        <th><a href="<?php echo $value['product_url'] ?>"><?php echo $value['product_url'] ?></a></th>
                                        <th>
                                            <a href="<?php echo base_url(A.'/deleteProduct/'.$value['productid']);?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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