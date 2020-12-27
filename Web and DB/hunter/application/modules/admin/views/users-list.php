<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="text-themecolor">User List</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Users</li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="row el-element-overlay">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">User List
                        </h4>
                        <div class="table-responsive m-t-40">
                            <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                              <thead>
                                 <tr>
                                    <th>Sr. No.</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Mobile No.</th>
                                    <th>Action</th>
                                 </tr>
                              </thead>
                              <tbody>
                                <?php $order_status = $this->config->item("order_status");
                                 if($users){ foreach ($users as $key => $value) : ?>
                                    <tr id="<?php echo "user_".$value['profileid']; ?>">
                                        <td><?php echo ($key+1); ?></td>
                                        <td><?php echo $value['name']; ?></td>
                                        <td><?php echo $value['email']; ?></td>
                                        <td><?php echo $value['mobile_no']; ?></td>
                                        <th><a href="javascript:void(0)" class="ajax_delete" data-table="user" data-value="<?php echo "profileid_".$value['profileid']; ?>"> <i class="feather icon-trash-2"></i></a></th>
                                    </tr>
                                <?php endforeach; } ?>
                              </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
  var site_url = "<?php echo base_url(); ?>";
  var urlLink = "<?php echo A; ?>";
   $('.ChangeStatus').change(function(){
      var td = this.checked ? '1' : '0';
      var uid = $(this).attr('data-id');
      $.ajax({
          url: site_url+urlLink+"/ChangeUserStatus",
          type: "POST",
          data: "profileid="+uid+"&status="+td,
          success: function(data){ 
            alert('Product Update'); 
          }
      });
  });
   $('.ChnageReject').change(function(){
      var td = this.checked ? '1' : '0';
      var uid = $(this).attr('data-id');
      $.ajax({
          url: site_url+urlLink+"/ChangeUserReject",
          type: "POST",
          data: "profileid="+uid+"&reject="+td,
          success: function(data){ 
            alert('Product Update'); 
          }
      });
  });
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
<div class="modal fade" id="mailUsers" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel">Mail Users</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <form id="addCategoryForm" method="post" action="<?php echo base_url(A.'/editCategory'); ?>" enctype="multipart/form-data" style="width: 100%;">
            <div class="card panel-default text-center">
              <div class="card-body">
                
                <div class="form-group">
                  <label class="float-left">Users</label>
                  <select name="email[]" class="form-control select2" multiple>
                    <?php if(isset($users) && !empty($users)){ foreach ($users as $key => $user){ ?>
                    <option value="<?php echo $user['email'] ?>"><?php echo $user['name'];?></option>
                    <?php }} ?>
                  </select>
                </div>
                <div class="form-group">
                  <label class="float-left">Message</label>
                  <textarea name="message" rows="8" class="form-control"></textarea>
                </div>
                <div class="form-group">
                  <input type="submit" class="btn btn-primary" value="Submit">
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>