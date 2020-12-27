<div class="container-fluid flex-grow-1 container-p-y">
   <h4 class="font-weight-bold py-3 mb-0">Orders List</h4>
   <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
      <ol class="breadcrumb">
         <li class="breadcrumb-item"><a href="<?php echo base_url(A);?>"><i class="feather icon-home"></i></a></li>
         <li class="breadcrumb-item active">Orders List</li>
      </ol>
   </div>
   <div class="row">
    <div class="col-md-12">
      <div class="alert alert-dark-success alert-dismissible" role="alert" <?php if($this->session->flashdata('message')==''){ ?> style="display:none" <?php } ?> >
         <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
         <?php echo $this->session->flashdata('message'); ?>
      </div>
    </div>
   </div>
   <div class="card">
      <h6 class="card-header">Order List</h6>
      <div class="card-datatable table-responsive">
         <table id="datable_1" class="datatables-demo table table-striped table-bordered">
            <thead>
               <tr>
                  <th>#</th>
                  <th>Order id</th>
                  <th>Name</th>
                  <th>Mobile No.</th>
                  <th>Order Time</th>
                  <th>Product Quantity</th>
                  <th>Order Status</th>
                  <th>Total</th>
               </tr>
            </thead>
            <tbody>
              <?php if(!empty($result)){ foreach ($result as $key => $value) : ?>
                <tr>
                  <td><?php echo $key+1; ?></td>
                  <td><a href="<?php echo base_url(A."/order-invoice/".$value['orderid']); ?>"><?php echo $value['orderid']; ?></a></td>
                  <td><?php echo $value['name']; ?></td>
                  <td><?php echo $value['mobile_no']; ?></td>
                  <td><?php echo date("d-m-Y H:i:s A",strtotime($value['order_time'])); ?></td>
                  <td><?php echo $value['quantity']; ?></td>
                  <td><?php echo (array_key_exists($value['order_status'], $order_status))?$order_status[$value['order_status']]:""; ?></td>
                  <td><?php echo $value['grandtotal']; ?></td>
                </tr>
              <?php endforeach; } ?>
            </tbody>
         </table>
      </div>
   </div>
</div>
<script type="text/javascript">
  var site_url = "<?php echo base_url(); ?>";
  var urlLink = "<?php echo A; ?>";
  $(".ajax_delete").on("click",function(){
      var id = $(this).attr("data-value");
      var split = id.split("_");
      var table = $(this).attr("data-table");
      var image = ($(this).attr("data-image")=="undefined")?"":$(this).attr("data-image");
      var result = confirm("Really want to delete?");
      if(result) {
          $.ajax({
              url: site_url+urlLink+"/ajaxDelete",
              type: "POST",
              data: split[0]+"="+split[1]+"&table="+table+"&image="+image,
              success: function(result){
                  if(result==1)
                  {
                      $("#"+table+"_"+split[1]).remove();
                  }
              }
          });
      }
  });
</script>