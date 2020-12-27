 <div class="page-wrapper">
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="text-themecolor">Add Video</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Add Video</li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header bg-info">
                        <h4 class="m-b-0 text-white">Add Video</h4>
                    </div>
                    <div class="card-body">
                        <form id="couponForm" action="<?php echo base_url(A."/uploadVideo"); ?>" method="post" enctype="multipart/form-data">
                          <div class="row">
                              <div class="form-group col-md-12">
                                  <label>Title</label>
                                  <input type="text" placeholder="enter you video title..." name="video_title" class="form-control" required>
                              </div>
                              <div class="form-group col-md-12">
                                  <label>Description</label>
                                  <textarea name="video_description" class="form-control" rows="5"></textarea>
                              </div>
                              <div class="form-group col-md-12 mt-2">
                                  <h6 class="borderBottom">Choose Video Method:</h6><hr>
                                  <p><strong>Note:</strong> Please choose one of the following ways to embed the video into your post, the video is determined in the order: Video Code > Video URL > Video File.</p>
                              </div>
                              <div class="form-group col-md-12">
                                  <div class="radio">
                                     <input type="radio" class="fileSelector" value="2" name="video_type" id="videolink1" checked>
                                     <label class="customLabel mr-4" for="videolink1">Embed Link From Youtube/Vimeo etc..</label>
                                     <input type="radio" class="fileSelector" value="1" name="video_type" id="videolink2">
                                     <label class="customLabel mr-4" for="videolink2">Custom Video Upload</label>
                                     <hr>
                                  </div>
                              </div>
                              <div class="form-group col-md-12" id="embedVideo" >
                                  <label>Put here your video embed code:</label>
                                  <textarea name="embed_url" class="form-control"></textarea>
                              </div>
                              <div class="form-group col-md-12" id="uploadVideo" style="display: none;">
                                  <div class="upload-video">
                                      <label for="videoUpload" class="button">Upload File</label>
                                      <input type="file" id="videoUpload" name="uploaded_video" class="form-control" class="show-for-sr">
                                  </div>
                              </div>
                              <div class="form-group col-md-12">
                                  <label>Select Video Category:</label>
                                  <select name="video_category" class="form-control">
                                    <option selected disabled>Select Category</option>
                                    <?php if (isset($category) && !empty($category)){ foreach ($category as $key => $value){ ?>
                                      <option value="<?php echo $value['c_id'];?>"><?php echo $value['category'];?></option>
                                    <?php }} ?>
                                  </select>
                              </div>
                               <div class="form-group col-md-12">
                                  <label for="imgUpload" class="button">Upload Image</label>
                                  <input type="file" class="form-control" id="imgUpload" name="image" class="show-for-sr">
                              </div>
                              <div class="form-group col-md-12">
                                  <label>Meta Title:</label>
                                  <textarea placeholder="enter meta title" name="meta_title" class="form-control"></textarea>
                              </div>
                              <div class="form-group col-md-12">
                                  <label>Meta Description:</label>
                                  <textarea placeholder="enter meta Description" name="meta_description" class="form-control"></textarea>
                              </div>
                              <div class="form-group col-md-12">
                                  <label>Meta keywords:</label>
                                  <textarea placeholder="enter meta keywords" name="meta_keywords" class="form-control"></textarea>
                              </div>
                              <div class="form-group col-md-12">
                                  <button class="btn btn-primary btn-block" type="submit" name="submit">publish now</button>
                              </div>
                          </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
$('.fileSelector').on('change',function(){
    var val = $(this).val();
    if(val == 1){
        $('#uploadVideo').css('display','block');
        $('#embedVideo').css('display','none');
    }
    else if(val == 2){
        $('#uploadVideo').css('display','none');
        $('#embedVideo').css('display','block');
    }
});
</script>