 <div class="page-wrapper">
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="text-themecolor">Add Category</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Add Category</li>
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
            <div class="col-lg-6 col-md-6">
               <div class="card mb-4">
                  <h6 class="card-header">Category</h6>
                  <div class="card-body">
                     <form id="addCategoryForm" class="form-horizontal" action="<?php echo base_url(A."/addCategory"); ?>" enctype="multipart/form-data" method='post'>
                        <div class="form-group">
                           <label class="form-label">Category Name</label>
                           <input type="text" name="category" class="form-control" placeholder="Category Name">
                           <div class="clearfix"></div>
                        </div>
                        <button class="btn btn-primary ladda-button" data-style="expand-right" type="submit" name="addcategory"><span class="ladda-label">Submit</span><span class="ladda-spinner"></span><div class="ladda-progress" style="width: 0px;"></div></button>
                     </form>
                  </div>
               </div>
            </div>
        </div>
    </div>
</div>