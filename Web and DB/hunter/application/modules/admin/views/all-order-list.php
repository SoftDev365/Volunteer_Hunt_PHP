<div class="container-fluid flex-grow-1 container-p-y">
   <h4 class="font-weight-bold py-3 mb-0">All Orders</h4>
   <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
      <ol class="breadcrumb">
         <li class="breadcrumb-item"><a href="<?php echo base_url(A);?>"><i class="feather icon-home"></i></a></li>
         <li class="breadcrumb-item active">All Orders</li>
      </ol>
   </div>
   <div class="row">
      <div class="alert alert-dark-success alert-dismissible" role="alert" <?php if($this->session->flashdata('message')==''){ ?> style="display:none" <?php } ?> >
         <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
         <?php echo $this->session->flashdata('message'); ?>
      </div>
   </div>
   <div class="card">
      <h6 class="card-header">Order List
      <span class="float-right">
         <a href="<?php echo base_url(A."/orderInvoiceExcel"); ?>" class="btn btn-primary">Excel <i class="fa fa-file-pdf-o" style="color:#fff;"></i></a>
         <a href="javascript:void(0);" data-tableid="datable_1" data-table="orders" target="_blank" id="downloadZip" class="btn btn-success">Download GST Report PDF <i class="fa fa-file-pdf-o" style="color:#fff;"></i></a>
      </span></h6>
      
      <div class="card-datatable table-responsive">
         <table id="datable_1" class="datatables-demo table table-striped table-bordered">
            <thead>
               <tr>
                  <th><input type="checkbox" name="orderid" class="check-one"/></th>
                  <th>Sr. No.</th>
                  <th>Order id</th>
                  <th>Order Date</th>
                  <th>Price</th>
                  <th>Order Status</th>
                  <th>Action</th>
               </tr>
            </thead>
            <tbody>
               <?php $order_status = $this->config->item("order_status");if($orders){ foreach ($orders as $key => $value) : ?>
                  <tr id="<?php echo "orders_".$value['orderid']; ?>">
                      <td><input type="checkbox" data-id="<?php echo $value['orderid'] ?>" class="check-all"/></td>
                      <td><?php echo ($key+1); ?></td>
                      <td><a href="<?php echo base_url(A."/order-invoice/".$value['orderid']); ?>"><?php echo $value['orderid']; ?></a></td>
                      <td><?php echo date("d M Y h:i A",strtotime($value['order_time'])); ?></td>
                      <td><?php echo $value['grandtotal']; ?></td>
                      <td><?php echo (array_key_exists($value['order_status'], $order_status)?$order_status[$value['order_status']]:""); ?></td>
                      <th><a href="javascript:void(0)" class="order_delete" data-table="orders" data-value="<?php echo "orderid_".$value['orderid']; ?>"> <i class="feather icon-trash-2"></i></a></th>
                  </tr>
               <?php endforeach; } ?>
            </tbody>
         </table>
      </div>
   </div>
</div>
<script type="text/javascript">
    $(window).on('load',function(){
        var base = "<?php echo base_url();?>/<?php echo A; ?>";
        var ids = "<?php echo implode($zorderid,',');?>";
        $('#invoiceExcel').attr('href',base+'/orderInvoiceExcel?orderid='+ids);
    });
</script>
<script type="text/javascript">
    $(".check-one").on("click",function(){ 
        if($(this).is(":checked")) { 
            $(this).closest("table").find('.check-all').prop('checked',true); 
        }else{ 
            $(this).closest("table").find('.check-all').prop('checked',false); 
        } 
    });
    $("#downloadZip").on("click",function(){
        var table_id = $(this).data('tableid');
        var table = $(this).data('table');
        var field = $("#"+table_id).find('.check-one').attr('name');
        var id = [];var length=0;
        $("#"+table_id+" tbody").find("input[class='check-all']:checked").each(function(){            
            id.push($(this).data("id"));
            length++;
        });

        var ids = id.join(",");
        if(ids!=""){
            var base = "<?php echo base_url(); ?><?php echo A; ?>";
            var url = base+"/downloadOrderInvoicePdfZip?orderid="+ids;
            window.location = url;
        }else{
            alert("Select atleast one checkbox!");
            $(this).val('');
        }
    });
</script>
<script type="text/javascript">
    var site_url = "<?php echo base_url(); ?>";
    var urlLink = "<?php echo A; ?>";
    $(".order_delete").on("click",function(){
        var id = $(this).attr("data-value");
        var split = id.split("_");
        var table = $(this).attr("data-table");
        var image = ($(this).attr("data-image")=="undefined")?"":$(this).attr("data-image");
        var result = confirm("Really want to delete?");
        if(result) {
            $.ajax({
                url: site_url+urlLink+"/orderDelete",
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