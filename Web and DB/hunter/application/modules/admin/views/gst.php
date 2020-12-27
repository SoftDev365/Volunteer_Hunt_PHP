<!-- Main Content -->

<div class="page-wrapper">

    <div class="container-fluid pt-25">

        <div class="row">

            <div class="col-md-12">

                <div class="alert alert-success alert-dismissible" role="alert" <?php if($this->session->flashdata('message')==''){ ?> style="display:none" <?php } ?> >

                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                    <?php echo $this->session->flashdata('message'); ?>

                </div>

            </div>

        </div>

        <!-- Row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default card-view">
                    <div class="panel-heading">
                        <div class="pull-left">
                            <h6 class="panel-title txt-dark">Calculate GST</h6>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                            <div class="table-wrap">
                                <form id="couponForm" action="<?php echo base_url(A."/order-gst"); ?>" method="GET">
                                    <div class="row">
                                        <div class="form-group col-md-3">
                                            <label class="control-label">Category</label>
                                            <select class="form-control" name="category">
                                                <option value="">Select Category</option>
                                                <?php if(isset($category) && !empty($category)){ 
                                                    foreach ($category as $key => $value) {
                                                ?>
                                                    <option value="<?php echo $value['c_id']; ?>"><?php echo $value['category']; ?></option>
                                                <?php } } ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="control-label">Date</label>
                                            <div class="input-group date">
                                                <input type="text" class="form-control start_dt" name="date" placeholder="Select Date">
                                                <span class="input-group-addon">
                                                    <span class="fa fa-calendar"></span>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-2"><br>
                                            <button type="submit" class="btn btn-success btn-anim">
                                                <i class="icon-rocket"></i><span class="btn-text">Search</span>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="row">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>  
            </div>
        </div>
        <!-- Row -->
        <?php if(isset($gst) && !empty($gst)){ ?>
            <div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-default card-view">
                        <div class="panel-heading">
                            <div class="pull-left">
                                <h6 class="panel-title txt-dark">GST Calculation</h6>
                            </div>
                            <div class="pull-right">
                                <a href="<?php echo base_url(A.'/downloadGstReportStateWise?category='.$_GET['category'].'&date='.$_GET['date']); ?>" class="btn btn-success">Download GST Report PDF <i class="fa fa-file-pdf-o" style="color:#fff;"></i></a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="panel-wrapper collapse in">
                            <div class="panel-body">
                                <div class="table-wrap">
                                    <table class="table" style="margin-bottom:0px; width:100%">
                                        <thead>
                                            <tr style="background-color:#ddd;">
                                                <th>Sr.</th>
                                                <th>State</th>
                                                <th>HSN Code</th>
                                                <th>Amount</th>
                                                <th>Total Product</th>
                                                <th>Gst %</th>
                                                <th>SGST</th>
                                                <th>CGST</th>
                                                <th>IGST</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $gtotal = $tpprice = $tsgst = $tcgst = $tigst = $ttotal = array();
                                                if(!empty($gst)){ 
                                                    foreach($gst as $key => $value):
                                                        $price = (($value['samount'])-(100*$value["cqty"]));
                                                        $sprice = $value['samount']-100;
                                                        $amount[] = $price;

                                                        $gst = 0;$hsncode = '';
                                                        if($value['category']){
                                                            //mouse pad
                                                            $cccc = $this->common->getsData('category',array('c_id'=>$value['category']),'hsncode,gst,category');
                                                            $gst = $cccc['gst'];
                                                            $cat = $cccc['category'];
                                                            $hsncode = $cccc['hsncode'];
                                                        }

                                                        $t_gst = ($price*$gst)/100;
                                                        if($value['sstate']=='Madhya Pradesh'){
                                                            $sgst = $t_gst/2;
                                                            $cgst = $t_gst/2;
                                                            $igst = 0;
                                                        }else{
                                                            $sgst = 0;
                                                            $cgst = 0;
                                                            $igst = $t_gst;
                                                        }
                                                    ?>
                                                <tr>
                                                    <td><?php echo $key+1; ?></td>
                                                    <td><?php echo $value['sstate']; ?></td>
                                                    <td><?php echo $hsncode; ?></td>
                                                    <td><?php echo $value['samount']; array_push($tpprice, $value['samount']); ?></td>
                                                    <td><?php echo $value['cqty']; ?></td>
                                                    <td><?php echo $gst; ?>%</td>
                                                    <td><?php echo $sgst; array_push($tsgst, $sgst); ?></td>
                                                    <td><?php echo $cgst; array_push($tcgst, $cgst); ?></td>
                                                    <td><?php echo $igst; array_push($tigst, $igst); ?></td>
                                                    <td>
                                                        PKR.  <?php echo number_format($price,2); ?>
                                                        <?php array_push($gtotal, $price); ?>
                                                    </td>
                                                </tr>
                                            <?php endforeach; } ?>
                                            <tr style="background-color:#ddd;">
                                                <th colspan="3"  align="right">Subtotal</th>
                                                <td>PKR. <?php echo number_format(array_sum($tpprice),2); ?></td> 
                                                <th colspan="2"  align="right"></th>
                                                <td>PKR. <?php echo number_format(array_sum($tsgst),2); ?></td> 
                                                <td>PKR. <?php echo number_format(array_sum($tcgst),2); ?></td> 
                                                <td>PKR. <?php echo number_format(array_sum($tigst),2); ?></td> 
                                                <td>PKR. <?php echo number_format(array_sum($gtotal),2); ?></td> 
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>  
                </div>
            </div>
        <?php } ?>
    </div>
