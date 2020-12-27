<style> .default-style .datepicker-dropdown { z-index: 99999 !important; }</style>
<div class="container-fluid flex-grow-1 container-p-y">
   <h4 class="font-weight-bold py-3 mb-0">Order Report</h4>
   <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
      <ol class="breadcrumb">
         <li class="breadcrumb-item"><a href="<?php echo base_url(A);?>"><i class="feather icon-home"></i></a></li>
         <li class="breadcrumb-item active">Order Report</li>
      </ol>
   </div>
   <div class="row">
      <div class="col-lg-12 col-md-12">
         <div class="alert alert-dark-success alert-dismissible" role="alert" <?php if($this->session->flashdata('message')==''){ ?> style="display:none" <?php } ?> >
             <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
             <?php echo $this->session->flashdata('message'); ?>
         </div>
         <div class="alert alert-dark-danger alert-dismissible" role="alert" <?php if($this->session->flashdata('emessage')==''){ ?> style="display:none" <?php } ?> >
             <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
             <?php echo $this->session->flashdata('emessage'); ?>
         </div>
      </div>
      <div class="col-lg-6 col-md-6 m-auto">
         <div class="card">
            <h6 class="card-header">Search Report</h6>
            <form class="form-horizontal" action="<?php echo base_url(A."/order-report"); ?>" method="post">
               <div class="card-body">

                <div class="input-daterange input-group" id="datepicker-range">
                  <input type="text" class="form-control" name="order_start">
                  <div class="input-group-prepend">
                    <span class="input-group-text">to</span>
                  </div>
                    <input type="text" class="form-control" name="order_end">
                  <div class="clearfix"></div>
                </div>
                  <!-- <div class="row">
                     <div class="col-md-6">
                        <div class="form-group">
                           <label class="form-label">Start date </label>
                           <input class="form-control start_dt" type="text" value="" name="order_start" />
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label class="form-label">End date </label>
                           <input class="form-control end_dt" type="text" value="" name="order_end" />
                        </div>
                     </div>
                  </div> -->
                  <div class="form-group">
                     <label class="form-label">Mobile Number</label>
                     <input class="form-control" type="text" value="" name="mobile_no" />
                  </div>
                  <div class="form-group">
                     <label class="form-label">Category</label>
                     <select class="form-control" name="category">
                         <option value="">Select Category</option>
                         <?php if($category){ foreach($category as $key=>$value) : ?>
                             <option value="<?php echo $value['c_id'] ?>"><?php echo $value['category'] ?></option>
                         <?php endforeach; } ?>
                     </select>
                  </div>
                  <div class="row">
                     <div class="col-md-6">
                         <div class="form-group">
                             <label class="form-label">Order Status</label>
                              <select class="form-control" name="order_status">
                                  <option value="">Select Order Status</option>
                                  <?php if($order_status){ foreach($order_status as $key=>$value) : ?>
                                      <option value="<?php echo $value['os_id'] ?>"><?php echo $value['order_status_name'] ?></option>
                                  <?php endforeach; } ?>
                              </select>
                         </div>
                     </div>
                     <div class="col-md-6">
                         <div class="form-group">
                             <label class="form-label">Order Payment Method</label>
                              <select class="form-control" name="payment_method">
                                  <option value="">Select Payment Method</option>
                                      <option value="1">Cash On Delivery</option>
                                      <option value="2">Online</option>
                              </select>
                         </div>
                     </div>
                  </div>
               </div>
               <div class="card-footer">
                  <button type="submit" class="btn btn-primary btn-block">Search</button>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>