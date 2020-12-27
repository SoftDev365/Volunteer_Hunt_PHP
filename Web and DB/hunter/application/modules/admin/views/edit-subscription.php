 <div class="page-wrapper">
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="text-themecolor">Edit Subscription</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Edit Subscription</li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 m-auto">
                <div class="card">
                    <div class="card-header bg-info text-center">
                        <h4 class="m-b-0 text-white">Edit Subscription</h4>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo base_url(A.'/updateSubscription');?>" method="post">
                            <div class="form-group">
                                <label>Subscription Name</label>
                                <input type="hidden" name="id" value="<?php echo $sub['id'];?>">
                                <input type="text" name="plan" value="<?php echo $sub['plan'];?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Subscription Amount</label>
                                <input type="number" name="price" value="<?php echo $sub['price'];?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Subscription Duration</label>
                                <input type="number" name="duration" value="<?php echo $sub['duration'];?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Available Songs</label>
                                <input type="number" name="song" value="<?php echo $sub['song'];?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Available Video</label>
                                <input type="number" name="video" value="<?php echo $sub['video'];?>" class="form-control">
                            </div>
                            <div class="form-actions">
                                <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
