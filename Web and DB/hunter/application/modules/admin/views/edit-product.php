<div class="container-fluid flex-grow-1 container-p-y">
   <h4 class="font-weight-bold py-3 mb-0">Edit Product</h4>
   <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
      <ol class="breadcrumb">
         <li class="breadcrumb-item"><a href="<?php echo base_url(A);?>"><i class="feather icon-home"></i></a></li>
         <li class="breadcrumb-item active">Edit Product</li>
      </ol>
   </div>
   <form id="addProductFrom" class="form-horizontal" action="<?php echo base_url(A."/editProduct"); ?>" enctype="multipart/form-data" method='post'>
      <div class="nav-tabs-top nav-responsive-sm">
         <ul class="nav nav-tabs">
            <li class="nav-item">
               <a class="nav-link active" data-toggle="tab" href="#item-info">Product Information</a>
            </li>
         </ul>
         <div class="tab-content">

            <div class="tab-pane fade show active" id="item-info">
               <div class="card-body">
                  <div class="form-group">
                    <input type="hidden" name="productid" value="<?php echo $product['productid']; ?>" />
                    <input type="hidden" name="url" value="<?php echo uri_string(); ?>" />
                     <label class="form-label">Title</label>
                     <input type="text" name="product_name" class="form-control" placeholder="Enter Product Title" value="<?php echo $product['product_name']; ?>">
                     <div class="clearfix"></div>
                  </div>
                  <div class="form-group">
                     <label class="form-label">Slug</label>
                     <input type="text" name="product_slug" class="form-control" placeholder="Enter Product Slug" value="<?php echo $product['product_slug']; ?>">
                     <div class="clearfix"></div>
                  </div>
                  <div class="form-group">
                     <label class="form-label">SKU Number</label>
                     <input type="text" name="product_sku" class="form-control" placeholder="Enter SKU No" value="<?php echo $product['product_sku']; ?>">
                     <div class="clearfix"></div>
                  </div>
                  <div class="row">
                     <div class="form-group col-6">
                        <label class="form-label">Regular Price</label>
                        <div class="input-group">
                           <div class="input-group-prepend">
                              <div class="input-group-text">$</div>
                           </div>
                           <input type="text" name="product_price" class="form-control" placeholder="Enter Regular Price" value="<?php echo $product['product_price']; ?>">
                           <div class="clearfix"></div>
                        </div>
                     </div>
                     <div class="form-group col-6">
                        <label class="form-label">Selling Price</label>
                        <div class="input-group">
                           <div class="input-group-prepend">
                              <div class="input-group-text">$</div>
                           </div>
                           <input type="text" name="product_sale_price" class="form-control" placeholder="Enter Sell Price" value="<?php echo $product['product_sale_price']; ?>">
                           <div class="clearfix"></div>
                        </div>
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="form-label mb-2">Product Description :</label>
                     <textarea name="product_description" class="tinymce" placeholder="Enter Product Description"><?php echo $product['product_description']; ?></textarea>
                     <div class="clearfix"></div>
                  </div>
                  <div class="form-group">
                     <label class="form-label mb-2">Additional Information :</label>
                     <textarea name="add_info" class="tinymce" placeholder="Enter Additional Information"><?php echo $product['add_info']; ?></textarea>
                     <div class="clearfix"></div>
                  </div>
                  <div class="form-group">
                     <label class="form-label mb-2">Return Policy :</label>
                     <textarea name="return_policy" class="tinymce" placeholder="Enter Return Policy"><?php echo $product['return_policy']; ?></textarea>
                     <div class="clearfix"></div>
                  </div>
                  <div class="row">
                     <div class="form-group col-6">
                        <label class="form-label">Product Stock</label>
                        <input type="text" name="product_stock" class="form-control" placeholder="Enter Product Stock" value="<?php echo $product['product_stock']; ?>">
                        <div class="clearfix"></div>
                     </div>
                     <div class="form-group col-6">
                        <label class="form-label">Product Weight (In Gram)</label>
                        <div class="input-group">
                           <div class="input-group-append">
                              <div class="input-group-text">Gm -</div>
                           </div>
                           <input type="number" name="product_weight" class="form-control" placeholder="Enter Product Weight" value="<?php echo $product['product_weight']; ?>">
                        </div>
                     </div>
                  </div>
                  <?php $gallery = $this->common->getData('product_media',array('product_id'=>$product['productid']));if(isset($gallery) && !empty($gallery)){ ?>
                  <div class="form-group">
                     <div class="row">
                           <?php foreach ($gallery as $key => $value){if($value['product_image'] !==''){ ?>
                              <div class="col-md-1 text-center">
                                  <div class="thumbnail count-thumb">
                                      <img src="<?php echo base_url($value['product_image']); ?>" style="width:100px; height:100px;">
                                      <a href="javascript:void(0)" class="delete_productMedia" data-id="<?php echo $value['id'];?>" style="color:red;"><i class="fa fa-trash"></i></a>
                                  </div>
                              </div>
                          <?php } } ?>
                     </div>
                   </div>
                   <?php } ?>
                  <div class="row">
                     <div class="form-group col-6">
                        <label class="form-label">Product Image</label>
                        <input id="pimages" type="file" class="form-control" name="product_photos[]" multiple>
                        <small class="form-text text-muted">Image Size must be 600x600 px.</small>
                        <p id="imageError" class="text-danger"></p>
                        <div class="clearfix"></div>
                     </div>
                     <div class="form-group col-6">
                        <label class="form-label">Product Tags</label>
                        <input type="text" name="product_tag[]" value="<?php echo $product['product_tag']; ?>" data-role="tagsinput" class="form-control">
                        <small class="form-text text-muted">Do not use any special symbole like (!,@,#,$,%,^,&,(),_,-,+,=)</small>
                        <p id="imageError" class="text-danger"></p>
                        <div class="clearfix"></div>
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="form-label">Size</label>
                     <select multiple data-role="tagsinput" name="size[]" class="form-control" data-placeholder="Choose" id="product_size">
                       <?php if($product['size']){ $size = explode(",",$product['size']); foreach ($size as $key => $value) : ?>
                             <option value="<?php echo $value; ?>" selected="selected" ><?php echo $value; ?></option>
                         <?php endforeach; } ?>
                     </select>
                  </div>
                  <div class="form-group">
                    <label  class="form-label" >Color (Image Size : 600x600) :</label>
                  </div>
                  <div class="form-group" id="subsitute_box">                                       
                      <div class="subsitute subsitute_box col-md-12" style="padding: 0px;">
                          <div class="row">
                            <div class="col-sm-5">
                                <div  class="colorpicker input-group colorpicker-component">
                                <input type="text" class="form-control" name="color[]"/>
                                <span class="input-group-addon"><i></i></span>
                             </div>
                            </div>
                            <div class="col-sm-6">
                                <input type="file" name="colorimage[]" class="form-control"/>
                            </div>
                            <div class="col-md-1" style="padding-left:0px;">
                             <button type="button" style="padding:10px 15px;" class="btn btn-primary" id="add_subsitute"><i class="fa fa-plus-square"></i></button>
                            </div>
                         </div>
                     </div>
                  </div>
                  <div class="form-group mt-3">
                     <label class="form-label">Add Category and Subcategories</label>
                     <ul class="tristate" style="list-style-type:disc;margin-left:20px;line-height: 35px;">
                         <?php if(!empty($category)){echo editPostMenu($category,$product['product_category']);} ?>
                     </ul>
                  </div>
                  <div class="form-group">
                     <label class="form-label">Meta Keywords</label>
                     <input type="text" name="meta_keyword" class="form-control" placeholder="Enter Meta Keyword" value="<?php echo $product['meta_keyword']; ?>">
                  </div>
                  <div class="form-group">
                     <label class="form-label">Meta Description</label>
                     <input type="text" name="meta_decs" class="form-control" placeholder="Enter Meta Description" value="<?php echo $product['meta_decs']; ?>">
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="text-right mt-3">
         <button type="button" class="btn btn-default">Cancel</button> &nbsp;
         <button type="submit" id="validBtn" name="addcategory" class="btn btn-primary">Save changes</button>
      </div>
   </form>
</div>
<style type="text/css">
   label{color:#000;}
   .delete_productMedia{color: red;position: absolute;top: 0;right: 21px;}
</style>
<script type="text/javascript">
   var site_url = "<?php echo base_url(); ?>";
   var urlLink = "<?php echo A; ?>";
    $(".delete_productMedia").on("click",function(){
        var id = $(this).attr("data-id");
        var result = confirm("Do you Want to delete?");
        if(result) {
            $.ajax({
                url: site_url+urlLink+"/deleteproductMultiMedia",
                type: "POST",
                data: "id="+id,
                success: function(result){
                    if(result==1)
                    {
                        location.reload();
                    }
                }
            });
        }
    });
</script>
<script type="text/javascript">
   $("#add_subsitute").on("click",function(){
       var count = $(".subsitute").length;
       var subsitute = '<div class="subsitute col-md-12 warning subsitute_box'+count+'" style="margin-top:10px;padding:0px;">\
                     <div class="row">\
                     <div class="col-sm-5">\
                                <div  class="colorpicker input-group colorpicker-component">\
                           <input type="text" class="form-control" name="color[]"/>\
                           <span class="input-group-addon"><i></i></span>\
                        </div>\
                            </div>\
                            <div class="col-sm-6">\
                            <input type="file" name="colorimage[]" class="form-control"/>\
                        </div>\
                     <div class="col-md-1" style="padding-left:0px;">\
                        <a href="javascript:void(0)" style="padding:10px 15px;" onClick="remove_subsitute('+count+')" class="btn btn-danger remove_subsitute"><i class="fa fa-minus-square"></i></a>\
                     </div>\
                     </div>\
                  </div>';
       $("#subsitute_box").append(subsitute);
       $('.colorpicker').colorpicker({format: "hex"});
   });
   function remove_subsitute(no){
       $(".subsitute_box"+no).remove();
   };
</script>
<script type="text/javascript">
    $("#pimages").on("change", function(){
        var cthumb = $(".count-thumb").length;
        var uplaodFile = $("input[type='file']")[0].files.length;
        var items = $("input[type='file']")[0].files;
        if(cthumb !=8 && cthumb<=8){
         if(cthumb ==4){
                 if(uplaodFile > 1) {
                     alert('You can select only 1 images');
                        $("#imageError").html('<p style="color:red;">You can select only 1 images</p>');
                        $("#validBtn").prop("disabled",true);
                        $("#pimages").val('');
                 } else {
                        $("#imageError").html('');
                        $("#validBtn").prop("disabled",false);
                 }
            }else if(cthumb ==3){
                 if(uplaodFile > 2) {
                     alert('You can select only 2 images');
                        $("#imageError").html('<p style="color:red;">You can select only 2 images</p>');
                        $("#validBtn").prop("disabled",true);
                        $("#pimages").val('');
                 } else {
                        $("#imageError").html('');
                        $("#validBtn").prop("disabled",false);
                 }
            }else if(cthumb ==2){
                 if(uplaodFile > 3) {
                     alert('You can select only 3 images');
                        $("#imageError").html('<p style="color:red;">You can select only 3 images</p>');
                        $("#validBtn").prop("disabled",true);
                        $("#pimages").val('');
                 } else {
                        $("#imageError").html('');
                        $("#validBtn").prop("disabled",false);
                 }
            }else if (cthumb ==1){
               if(uplaodFile > 4) {
                        alert('You can select only 4 images');
                        $("#imageError").html('<p style="color:red;">You can select only 4 images</p>');
                        $("#validBtn").prop("disabled",true);
                        $("#pimages").val('');
                 } else {
                        $("#imageError").html('');
                        $("#validBtn").prop("disabled",false);
                 } 
            }else if (cthumb ==0){
                if(uplaodFile > 5) {
                     alert('You can select only 5 images');
                        $("#imageError").html('<p style="color:red;">You can select only 5 images</p>');
                        $("#validBtn").prop("disabled",true);
                        $("#pimages").val('');
                 } else {
                        $("#imageError").html('');
                        $("#validBtn").prop("disabled",false);
                 } 
            }
        }else{
         alert('Already Uploaded 8 Images');
            $("#imageError").html('<p style="color:red;">Already Uploaded 8 Images.</p>');
            $("#pimages").val('');
        }
    });
</script>