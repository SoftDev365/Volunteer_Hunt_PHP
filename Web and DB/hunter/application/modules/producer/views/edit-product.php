 <div class="page-wrapper">
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="text-themecolor">Edit Product</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Edit Product</li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                 <div class="alert alert-success alert-dismissible" role="alert" <?php if($this->session->flashdata('message')==''){ ?> style="display:none" <?php } ?> >
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">X</button>
                 <span style="color:green;"><?php echo $this->session->flashdata('message'); ?></span>
                 </div>
                 <div class="alert alert-warning alert-dismissible" role="alert" <?php if($this->session->flashdata('emessage')==''){ ?> style="display:none" <?php } ?> >
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">X</button>
                 <span style="color:red;"><?php echo $this->session->flashdata('emessage'); ?></span>
                 </div>
            </div>
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header bg-info">
                        <h4 class="m-b-0 text-white">Edit Product</h4>
                    </div>
                    <div class="card-body">
                        <form id="couponForm" action="<?php echo base_url(P."/EditProduct"); ?>" method="post" enctype="multipart/form-data">
                          <div class="row">
                              <div class="form-group col-md-12">
                                  <label>Product Title</label>
                                  <input type="hidden" name="productid" value="<?php echo $pro['productid'];?>">
                                  <input type="text" placeholder="enter you product title..." value="<?php echo $pro['product_name'];?>" name="product_name" class="form-control" required>
                              </div>
                              <div class="form-group col-md-12">
                                  <label>Product Description</label>
                                  <textarea name="product_description" class="form-control" rows="5"><?php echo $pro['product_description'];?></textarea>
                              </div>
                              <div class="form-group col-md-12" id="uploadVideo">
                                  <div class="upload-video">
                                      <label for="videoUpload" class="button">Product Image</label>
                                      <input type="file" id="videoUpload" name="product_photos[]" class="form-control" class="show-for-sr">
                                  </div>
                              </div>
                              <div class="form-group col-md-12">
                                  <div class="upload-video">
                                      <label for="videoUpload" class="button">Product Price</label>
                                      <input type="number" value="<?php echo $pro['product_price'];?>"  name="product_price" class="form-control" class="show-for-sr">
                                  </div>
                              </div>
                              <div class="form-group col-md-12">
                                  <div class="upload-video">
                                      <label for="videoUpload" class="button">Product URL</label>
                                      <input type="url" value="<?php echo $pro['product_url'];?>" name="product_url" class="form-control" class="show-for-sr" required>
                                  </div>
                              </div>
                              <div class="form-group col-md-12">
                                  <label>Select Product Category:</label>
                                  <select name="product_category" class="form-control">
                                    <option selected disabled>Select Category</option>
                                    <?php if (isset($category) && !empty($category)){ foreach ($category as $key => $value){ ?>
                                      <option <?php if($pro['product_category'] == $value['c_id']){echo 'selected';}?> value="<?php echo $value['c_id'];?>"><?php echo $value['category'];?></option>
                                    <?php }} ?>
                                  </select>
                              </div>
                              <div class="form-group col-md-12">
                                  <button class="btn btn-primary btn-block" type="submit" name="submit">publish now</button>
                              </div>
                          </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
$('.fileSelector').on('change',function(){
    var val = $(this).val();
    if(val == 1){
        $('#uploadVideo').css('display','block');
        $('#embedVideo').css('display','none');
    }
    else if(val == 2){
        $('#uploadVideo').css('display','none');
        $('#embedVideo').css('display','block');
    }
});
</script>