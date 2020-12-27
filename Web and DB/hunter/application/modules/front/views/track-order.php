<div class="breadcrumb-box" style="padding-top: 20px;">
    <a href="#">Home</a>
    <a href="#">Track Order</a>
</div>

<div class="information-blocks">
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-success" role="alert" <?php if($this->session->flashdata('message')==''){ ?> style="display:none" <?php } ?> >
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                <?php echo $this->session->flashdata('message'); ?>
            </div>
            <div class="alert alert-warning" role="alert" <?php if($this->session->flashdata('emessage')==''){ ?> style="display:none" <?php } ?> >
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                <?php echo $this->session->flashdata('emessage'); ?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6 information-entry">
            <div class="login-box" style="min-height: unset;">
                <div class="article-container style-1">
                    <h3>Track Order</h3>
                </div>
                <form id="orderTrackingForm" action="<?php echo base_url('track-order-action'); ?>" method="post">
                    <label>Order ID</label>
                    <input class="simple-field" type="text" placeholder="Enter Order ID" name="orderid"/>
                    <div class="button style-10">Submit<input type="submit" value=""/></div>
                </form>
            </div>
        </div>
        <div class="col-sm-3"></div>
    </div>
</div>
<div class="information-blocks">
    <div class="row">
        <?php if(isset($trackorder) && !empty($trackorder)){ ?>
        <div class="col-md-12 information-entry">
            <div class="table-responsive">
                <table class="cart-table">
                    <tr>
                        <th class="column-1" style="width: 50px;padding-left:0px !important;">Status</th>
                        <th class="column-2">Message</th>
                        <th class="column-3">Date</th>
                        <th class="column-4" style="width: 80px;">Total Amount</th>
                    </tr>
                    <?php if(isset($order_status_message) && !empty($order_status_message)){ ?>
                        <?php foreach ($order_status_message as $key => $value) { ?>
                            <tr>
                                <td>
                                    <?php if($value['status']==1){echo "Pending";} ?>
                                    <?php if($value['status']==2){echo "Dispatched";} ?>
                                    <?php if($value['status']==3){echo "On Hold";} ?>
                                    <?php if($value['status']==4){echo "Delivered";} ?>
                                    <?php if($value['status']==5){echo "Cancelled";} ?>
                                    <?php if($value['status']==6){echo "Refunded";} ?>
                                    <?php if($value['status']==7){echo "Failed";} ?>
                                    <?php if($value['status']==8){echo "On the way";} ?>
                                </td>
                                <td>
                                    <p>
                                        <?php if($value['status']==2){ ?>
                                            <?php echo "Order dispatched: ".$value['orderid']." has been dispatched and will reach you by ".date('d-m-Y',strtotime($value['date'])).". Track your order at: <a href='".$value['link']."'>".$value['link']."</a>"; ?></p>
                                        <?php } ?>
                                    <p><?php echo $value['message']; ?></p>
                                </td>
                                <td><?php echo $value['status_date']; ?></td>
                                <td><?php echo $trackorder['grandtotal']; ?></td>
                            </tr>
                        <?php } ?>
                    <?php }else{ ?>
                        <tr>
                            <td><?php echo $trackorder['order_status_name']; ?></td>
                            <td>
                                <?php //echo $trackorder['order_status_msg']; ?>
                                <?php
                                    $reg_exUrl = "/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/";
                                    $pmatch = preg_match($reg_exUrl, $trackorder['order_status_msg'], $url);
                                    if($pmatch){
                                        echo preg_replace($reg_exUrl, "<a target='_blank' href='{$url[0]}'>{$url[0]}</a>", $trackorder['order_status_msg']);
                                    }else{
                                        echo $trackorder['order_status_msg'];
                                    }
                                ?>
                            </td>
                            <td><?php echo $trackorder['LastUpdate']; ?></td>
                            <td><?php echo $trackorder['grandtotal']; ?></td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
        <?php }else{ ?>
        <div class="col-md-12 information-entry">
            <h3>No Order Found...</h3>
        </div>
        <?php } ?>
    </div>
</div>