<div class="container-fluid flex-grow-1 container-p-y">
   <h4 class="font-weight-bold py-3 mb-0">Pincode List</h4>
   <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
      <ol class="breadcrumb">
         <li class="breadcrumb-item"><a href="<?php echo base_url(A);?>"><i class="feather icon-home"></i></a></li>
         <li class="breadcrumb-item active">Pincode List</li>
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
      <h6 class="card-header">All Pincode List
      </h6>
      <div class="card-header pb-0" style="border-bottom:none;">
        <div class="row">
          <div class="col-md-2">
            <div class="form-group">
              <label class="float-left pt-2 pr-2">Show</label>
              <select id="admin_length" class="form-control float-left" style="width: 65px;">
                <option value="10" <?php echo ($this->perPage==10)?'selected':""; ?>>10</option>
                <option value="20" <?php echo ($this->perPage==20)?'selected':""; ?>>20</option>
                <option value="50" <?php echo ($this->perPage==50)?'selected':""; ?>>50</option>
                <option value="100" <?php echo ($this->perPage==100)?'selected':""; ?>>100</option>
                <option value="250" <?php echo ($this->perPage==250)?'selected':""; ?>>250</option>
                <option value="500" <?php echo ($this->perPage==500)?'selected':""; ?>>500</option>
              </select>
              <label class="pl-2 pt-2">entries</label>
            </div>
          </div>
          <div class="col-md-10">
            <p class="float-right pt-2"><?php echo (isset($h1)?$h1:""); ?></p>
          </div>
        </div>
      </div>
      <div class="card-datatable table-responsive">
         <table class="table table-striped table-bordered">
            <thead>
              <tr>
                <th>#</th>
                <th>Pincode</th>
                <th>City</th>
                <th>State</th>
                <th>State Code</th>
                <th>Prepaid</th>
                <th>Reverse Pikup</th>
                <th>REPL</th>
                <th>Cod</th>
                <th>Dispatch Center</th>
                <th>sort code</th>
                <th>value capping</th>
                <th>Action</th>
               </tr>
            </thead>
            <tbody>
              <?php if($pincode){ foreach ($pincode as $key => $value) : ?>
                <tr id="<?php echo "pincode_".$value['id']; ?>">
                    <td><?php echo ($k++); ?></td>
                    <td><?php echo $value['pincode']; ?></td>
                    <td><?php echo $value['city']; ?></td>
                    <td><?php echo $value['state']; ?></td>
                    <td><?php echo $value['state_code']; ?></td>
                    <td><?php echo $value['prepaid']; ?></td>
                    <td><?php echo $value['reverse_pikup']; ?></td>
                    <td><?php echo $value['repl']; ?></td>
                    <td><?php echo $value['cod']; ?></td>
                    <td><?php echo $value['dispatch_center']; ?></td>
                    <td><?php echo $value['sort_code']; ?></td>
                    <td><?php echo $value['value_capping']; ?></td>
                    <th><a href="javascript:void(0)" class="ajax_delete" data-table="pincode" data-value="<?php echo "id_".$value['id']; ?>"> <i class="feather icon-trash-2"></i></a></th>
                </tr>
              <?php endforeach; } ?>
            </tbody>
         </table>
      </div>
      <div class="card-footer">
        <div class="row">
          <div class="col-md-6"><?php echo (isset($h2)?$h2:""); ?> Entries</div>
          <div class="col-md-6"><div class="float-right"><?php echo (isset($links))?$links:""; ?></div></div>
        </div>
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
<script type="text/javascript">
    var path = "<?php echo base_url(A); ?>";
    $("#admin_length").on("change",function(){
        var length = $(this).val();
        $.ajax({
            url: path+"/AdminSearchLength",
            type:"POST",
            data:"length="+length,
            success: function(result){
                if(result==1){
                    window.location.reload();
                }
            }
        });
    });
</script>