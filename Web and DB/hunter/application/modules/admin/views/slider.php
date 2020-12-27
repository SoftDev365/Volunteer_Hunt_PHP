<div class="container-fluid flex-grow-1 container-p-y">
   <h4 class="font-weight-bold py-3 mb-0">Slider</h4>
   <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
      <ol class="breadcrumb">
         <li class="breadcrumb-item"><a href="<?php echo base_url(A);?>"><i class="feather icon-home"></i></a></li>
         <li class="breadcrumb-item active">Slider</li>
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
      <h6 class="card-header">Slider List<br>
       <small>Slider Image Size Must be 1600x550</small> 
       <span class="pull-right">
          <button class="btn btn-success btn-anim pull-right" data-toggle="modal" data-target="#exampleModal"><span class="btn-text">Add Slider</span></button>
        </span>
      </h6>
      <div class="card-datatable table-responsive">
         <table id="datable_1" class="datatables-demo table table-striped table-bordered">
            <thead>
               <tr>
                  <th>SR.No.</th>
                  <th>Image</th>
                  <th>URL</th>
                  <th>Action</th>
               </tr>
            </thead>
            <tbody>
              <?php if(!empty($slider)){ foreach ($slider as $key => $value): ?>
              <tr id="<?php echo "slider_".$value['id']; ?>">
                <td><?php echo $key+1; ?></td>
                <td><img src="<?php echo base_url($value['image']); ?>" style="width:300px;"> </td>
                <td><?php echo $value['url']; ?></td>
                <td>
                  <a href="javascript:void(0)" class="text-inverse slider_delete" data-table="slider" data-id="<?php echo $value['id']; ?>" data-image="<?php echo $value['image']; ?>"><i class="feather icon-trash-2"></i></a>
                </td>
              </tr>
              <?php endforeach; } ?>
            </tbody>
         </table>
      </div>
   </div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <form method="post" action="<?php echo base_url(A."/uploadSliderImage"); ?>" id="uploadBannerForm" enctype="multipart/form-data">
            <input type="hidden" name="type" value="slider" />
            <input type="hidden" name="rurl" value="<?php echo uri_string(); ?>" />
            <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
               <h4 class="modal-title" id="exampleModalLabel">Upload Slider Image</h4>
            </div>
            <div class="modal-body">
               <h6 class="panel-title txt-dark"></h6>
               <div class="form-group">
                  <label for="recipient-name" class="form-control-label">Image:</label>
                  <input type="file" class="form-control" name="image" id="upload1">
                  <div id="error"></div>
               </div>
               <div class="form-group">
                  <input type="text" name="url" placeholder="Enter Link" class="form-control" />
               </div>
            </div>
            <div class="modal-footer">
               <button type="submit" id="upload_button" name="addbanner" class="btn btn-primary">Save Image</button>
            </div>
         </form>
      </div>
   </div>
</div>
<script type="text/javascript">
  var site_url = "<?php echo base_url(); ?>";
  var urlLink = "<?php echo A; ?>";
  $("#upload").on("change",function(){
        var fileUpload = $("#upload")[0];
        var regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(.jpg|.png|.gif)$");
        if (regex.test(fileUpload.value.toLowerCase())) {
            if (typeof (fileUpload.files) != "undefined") {
                var reader = new FileReader();
                reader.readAsDataURL(fileUpload.files[0]);
                reader.onload = function (e) {
                    var image = new Image();
                    image.src = e.target.result;
                    image.onload = function () {
                        var height = this.height;
                        var width = this.width;
                        if (height < 550 || width < 1600) {
                            $("#error").html('<p style="color:red;">File size must be (1600*550).</p>');
                            $("#upload_button").prop("disabled",true);
                            status = "0";
                            $("#status").attr("value","0");
                            return false;
                        }else{
                            $("#error").html('<p style="color:green;">Uploaded image has valid Height and Width.</p>');
                            $("#upload_button").prop("disabled",false);
                            status = "1";
                            $("#status").attr("value","1");
                            return true;
                        }
                    };
                }
            }else{
                $("#error").html('<p style="color:red;">This browser does not support HTML5.</p>');
                $("#upload_button").prop("disabled",true);
                status = "0";
                $("#status").attr("value","0");
                return false;
            }
        } else {
            $("#error").html('<p style="color:red;">Please select a valid Image file.</p>');
            $("#upload_button").prop("disabled",true);
            status = "0";
            $("#status").attr("value","0");
            return false;
        }
    });
    $(".slider_delete").on("click",function(){
      var id = $(this).attr('data-id');
      var image = $(this).attr('data-image');
      var table = $(this).attr('data-table');
      var ok = confirm("Are you sure to Delete this Slider Image?");
      if (ok) {
          $.ajax({
              url: site_url+urlLink+'/deleteSlider',
              type:'POST',
              data:'id='+id+'&image='+image+'&table='+table,
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