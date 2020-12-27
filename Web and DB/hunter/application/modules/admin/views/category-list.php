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
                      <?php if(isset($allcategory) && !empty($allcategory)){echo drawMenu($allcategory,0);}?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editcategorypopup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel"></h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <form id="addCategoryForm" method="post" action="<?php echo base_url(A.'/editCategory'); ?>" enctype="multipart/form-data" style="width: 100%;">
            <div class="card panel-default text-center">
              <div class="card-body">
                <div class="form-group">
                  <label style="float: left;">Category</label>
                  <input type="hidden" name="catid" value="" id="catid"/>
                  <input class="form-control" type="text" name="" id="cattype" data-type="" data-id="" placeholder="Email Id">
                  <input type="hidden" name="old_img" id="old_img" value="" />
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
<script type="text/javascript">
var site_url = "<?php echo base_url(); ?>";
var urlLink = "<?php echo A; ?>";
$(".showonfront").on("click",function(){
    var id = $(this).val();
    if($(this).is(":checked"))
    {
        val = 1;
    }else{
        val = 0;
    }
    $.ajax({
        url  : site_url+urlLink+"/checkCategory",
        type : 'POST',
        data : 'val='+val+'&id='+id,
        success : function(data){
            if(data==1)
            {
                if(val==1)
                {
                    alert("Show on front");
                }else{
                    alert("Not show on front");
                }
            }else{
                alert("error");
            }
        }
    });
});
$(".todaySpecial").on("click",function(){
    var id = $(this).val();
    if($(this).is(":checked"))
    {
        val = 1;
    }else{
        val = 0;
    }
    $.ajax({
        url  : site_url+urlLink+"/checkTodayCategory",
        type : 'POST',
        data : 'val='+val+'&id='+id,
        success : function(data){
            if(data==1)
            {
                if(val==1)
                {
                    alert("Show on today");
                }else{
                    alert("Not show on today");
                }
            }else{
                alert("error");
            }
        }
    });
});
$(".edit_category").on("click",function(){
    var id = $(this).attr('data-id');
    var type = $(this).attr('data-type');
    var img = $(this).attr('data-image');
    var aff = $(this).attr('data-aff');
    if(type=="category")
    {
      $("#myModalLabel").html("Edit Category");
      $("#tex_percentage").parent().parent().hide();
      var val = $("#category_"+id).attr('data-val');
    }
    $("#catid").val(id);
    $("#cattype").attr("name",type);
    $("#old_img").val(img);
    $("#cattype").val(val);
    $("#AffilatePer").val(aff);
    $("#cattype").attr('data-id',id);
});
$(".deleteCategory").on("click",function(){
    var type = $(this).data('type');
    var id = $(this).data('id');
    var ok = confirm("Are you sure to Delete?");
    if (ok) {
      $.ajax({
          url: site_url+urlLink+'/deleteCategory',
          type:'POST',
          data:'type='+type+'&id='+id,
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
<style>
  img{vertical-align: middle;}
  .panel .panel-heading .pull-right i{vertical-align:middle;color:#fff;}
</style>