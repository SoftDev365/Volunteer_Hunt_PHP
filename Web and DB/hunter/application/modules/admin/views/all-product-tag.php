<div class="container-fluid flex-grow-1 container-p-y">
   <h4 class="font-weight-bold py-3 mb-0">Product Tags</h4>
   <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
      <ol class="breadcrumb">
         <li class="breadcrumb-item"><a href="<?php echo base_url(A);?>"><i class="feather icon-home"></i></a></li>
         <li class="breadcrumb-item active">Product Tags</li>
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
   <div class="card" style="border-bottom: 10px solid #eee;">
      <h6 class="card-header">Tags</h6>
      <div class="card-body">
        <?php if (isset($tag) && $tag[0]['product_tag']!='') {$t = explode(',', $tag[0]['product_tag']);
            if($t){$t = array_unique($t); foreach ($t as $key => $value) {?>
            <a class="btn btn-success" href="<?php echo base_url('product-tag/'.url_title($value)); ?>" target="_blank" style="margin-left:10px;margin-bottom:10px;"><i class="feather icon-tag"></i> &nbsp; <?php echo $value; ?></a>
        <?php } } } ?>
      </div>
   </div>
</div>
<script type="text/javascript">
  var site_url = "<?php echo base_url(); ?>";
  var urlLink = "<?php echo A; ?>";
    $(".coupon_delete").on("click",function(){
      var id = $(this).attr('data-id');
      var table = $(this).attr('data-table');
      var ok = confirm("Are you sure to Delete this Coupon?");
      if (ok) {
          $.ajax({
              url: site_url+urlLink+'/deleteCoupon',
              type:'POST',
              data:'id='+id+'&table='+table,
              success: function(data){
                  if(data==1)
                  {
                      location.reload();
                  }
              },
          });
      }
  });
</script>