<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="text-themecolor">Video List</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Videos</li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="row el-element-overlay">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Video List</h4>
                        <div class="table-responsive m-t-40">
                            <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Image</th>
                                        <th>Category</th>
                                        <th>Featured Video</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php if(!empty($post)){ foreach ($post as $key => $value):$cat = explode(',',$value['video_category']);$c = count($cat);?>
                                    <tr id="<?php echo "products_".$value['video_id']; ?>">
                                      <td><?php echo $key+1; ?></td>
                                      <td><a href="<?php echo base_url('video-detail/'.url_title($value['video_title']).'/'.$value['video_id']); ?>" target="_blank"><?php echo $value['video_title']; ?></a></td>
                                      <td>
                            
                                          <img src="<?php echo base_url($value['image']); ?>" style="height:50px; width:50px;" alt="<?php echo $value['video_title']; ?>">
                                        
                                      </td>
                                      <td>
                                          <?php if(($cat) && !empty($category)){ 
                                              foreach ($category as $key => $value1) {
                                                for($cc=0;$cc<$c; $cc++){
                                                  if($value1['c_id']==$cat[$cc]){
                                                    echo $value1['category']." | ";
                                                  }
                                                }
                                              }
                                            } 
                                          ?>
                                      </td>
                              
                                      <td><input type="checkbox" name="feat_video" class="featured_products" value="1" data-id="<?php echo $value['video_id']; ?>" <?php echo ($value['feat_video']==1)?'checked':""; ?> /></td>
                                      <td>
                                        <a href="<?php echo base_url(A.'/watch-video/'.$value['video_id']);?>" target="_blank" class="btn btn-warning"><i class="feather icon-eye" style="font-weight: bolder;"></i></a>
                                        <a href="<?php echo  base_url(A."/edit-video/".$value['video_id']); ?>" data-value="" class="btn btn-success"><i class="feather icon-settings" style="font-weight: bolder;"></i></a>
                                        <a href="javascript:void(0)" class="btn btn-danger text-inverse product_delete" data-table="products" data-value="<?php echo "video_id_".$value['video_id']; ?>" data-id="<?php echo $value['video_id']; ?>" data-image="<?php if(!empty($value['image'])){ echo $value['image'];} ?>"><i class="feather icon-trash" style="font-weight: bolder;"></i></a>
                                      </td>
                                    </tr>
                                    <?php endforeach; } ?>
                                </tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>