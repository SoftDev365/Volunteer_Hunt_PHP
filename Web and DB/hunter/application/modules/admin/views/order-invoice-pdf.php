<!DOCTYPE html>
<html>
<head>
    <title>Wear Your Job</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <style type="text/css" media="all">
    @page {
                margin: 100px 25px;
            }
        @media print
        {
    .head-image{margin:0 auto;}
          body{font-size:14px;}
          p{margin-bottom:5px;font-size:14px;}
          .table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th{padding:2px 6px;font-size:12px;}
          	table{border:1px solid #ddd;border-bottom:none;}
	        tr td, tr th{font-size:12px;border-bottom:1px solid #ddd;border-left:1px solid #ddd;border-collapse:collapse;}
	        tr td:first-child, tr th:first-child{border-left:none;}
            header {
                position: fixed;
                top: -80px;
                left: 0px;
                right: 0px;
                height: auto;
                margin-bottom:10px;
                border-bottom: 1px solid #ddd;
            }

            footer {
                position: fixed; 
                bottom: 5px; 
                left: 0px; 
                right: 0px;
                height: auto; 
            }
        }
        table{border:1px solid #ddd;border-bottom:none;}
        tr td, tr th{font-size:12px;border-bottom:1px solid #ddd;border-left:1px solid #ddd;border-collapse:collapse;}
        tr td:first-child, tr th:first-child{border-left:none;}
        header {
               position: fixed;
                top: -80px;
                left: 0px;
                right: 0px;
                height: auto;
                margin-bottom:10px;
                border-bottom: 1px solid #ddd;
            }

            footer {
                position: fixed; 
                bottom: 5px; 
                left: 0px; 
                right: 0px;
                height: auto; 
            }

    </style>
</head>
<body style="margin-top:0px;">
<!-- Main Content -->

<div class="page-wrapper">

    <div class="container-fluid pt-25">
    <header>
    	<table class="table" style="border:none;width:100%;margin-bottom:0px;">
            <tr>
                <td style="border:none;width:70%;">
                	<img src="<?php echo base_url('assets/front/images/logo.png'); ?>" alt="logo" style="width:150px;">
                </td>
                <td style="border:none;">
                	<h1>INVOICE</h1>
                </td>
            </tr>
        </table>
    </header>
        <table class="table" style="border:none;margin-bottom:0px;width:100%;">
            <tr>
                <td style="border:none;">
                    <h6 class="panel-title txt-dark" style="margin:0px 0px;">

                        Invoice No. <span style="color:red;"> <?php echo $invoice['orderid']; ?> </span>
                    </h6>
                </td>
                <td style="border:none;">
                    <h4 style="margin:0px 0px;">
                        <div style="float:right;border:none;">Date: <span class="right"><strong><?php echo date("d M Y",strtotime($invoice['order_time'])); ?></strong></span></div>
                    </h4>
                </td>
            </tr>
        </table>
        <main>
            <table class="table" style="border:none;margin-bottom:0px;width:100%">
                <tr>
                    <td style="border:none;width:70%;">
                        <h4 style="margin-bottom:0px;margin-top:0px;">Billing Details</h4>
                        <address style="font-size:12px;">
                            <strong>Contact Name :</strong> <?php echo $invoice['bname']; ?><br/>
                            <strong>Email :</strong> <?php echo $invoice['bemail']; ?><br/>
                            <strong>Address:</strong> <?php echo $invoice['baddress1']; ?><br/>
                            <strong>Address2:</strong> <?php echo $invoice['baddress2']; ?><br/>
                            <strong> City:</strong> <?php echo $invoice['bcity']; ?> (<?php echo $invoice['bpincode']; ?>)<br/>
                            <strong>State:</strong> <?php echo $invoice['bstate']; ?><br>
                            <strong>Phone:</strong> <?php echo $invoice['bmobile_no']; ?><br>
                        </address>
                    </td>
                    <td style="border:none;">
                        <h4 style="margin-bottom:0px;margin-top:0px;">Shipping Details</h4>
                        <address style="font-size:12px;">
                            <strong>Contact Name :</strong> <?php echo $invoice['sname']; ?><br/>
                            <strong>Email :</strong> <?php echo $invoice['semail']; ?><br/>
                            <strong>Address:</strong> <?php echo $invoice['saddress1']; ?><br/>
                            <strong>Address2:</strong> <?php echo $invoice['saddress2']; ?><br/>
                            <strong> City:</strong> <?php echo $invoice['scity']; ?> (<?php echo $invoice['spincode']; ?>)<br/>
                            <strong>State:</strong> <?php echo $invoice['sstate']; ?><br>
                            <strong>Phone:</strong> <?php echo $invoice['smobile_no']; ?>
                        </address>
                    </td>
                </tr>
            </table>
            <table class="table" style="margin-bottom:0px; width:100%">
                <thead>
                    <tr style="background-color:#ddd;">
                        <th>Sr.</th>
                        <th>Product</th>
                        <th>Qty.</th>
                        <th>GST %</th>
                        <th>Price</th>
                        <th>GST Amount</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $Subtotal = $amount = $shipping = $spr = $sup = $sgp = array();
                        if(!empty($cart)){ 
                            foreach($cart as $key => $value):
                                $price = 0; 
                                if($value['product_sale_price']!='' && $value['product_sale_price']>0){
                                    $price = ((($value['product_sale_price']*$value["qty"]))-(100*$value["qty"]));
                                    $sprice = $value['product_sale_price']-100;
                                }else{
                                   $price = (($value['product_price']*$value["qty"])-(100*$value["qty"]));
                                   $sprice = $value['product_price']-100; 
                                }
                                $amount[] = $price;

                                if($value['size']!="" && $value['size']!="undefined"){
                                    $size = "<b> ".$value['size']." size </b>";
                                }else{
                                    $size = "";
                                }
                                if(($value['size']!="" && $value['size']!="undefined") && ($value['color']!="" && $value['color']!="undefined")){
                                    $and = "<b> and </b>";
                                }else{
                                    $and = "";
                                }
                                if($value['color']!="" && $value['color']!="undefined"){
                                    $color = $value['color'];
                                }else{
                                    $color = "";
                                }

                                $gst = 18;
                                if($value['category']==17){
                                    //mouse pad
                                    $gst = 18;
                                    $cat = "Mouse Pad";
                                }
                                if($value['category']==18){
                                    //mugs
                                    $gst = 12;
                                    $cat = "Mugs";
                                }
                                if($value['category']==19){
                                    //mobile-covers
                                    $gst = 18;
                                    $cat = "Mobile Covers";
                                }
                                if($value['category']==20){
                                    //t-shirts
                                    $gst = 5;
                                    $cat = "T-shirts";
                                }
                                if($value['category']==23){
                                    //notebook
                                    $gst = 18;
                                    $cat = "Notebook";
                                }
                                $ugstprice = ($sprice*$gst)/100;
                                $uprice = $sprice-$ugstprice;
                            ?>
                        <tr>
                            <td><?php echo $key+1; ?></td>
                            <td><?php echo $value['product_name']; ?></td>
                            <td><?php echo $value['qty']; ?></td>
                            <td><?php echo $gst; ?>%</td>
                            <td>
                                INR. <?php echo number_format($uprice,2)*$value['qty']; ?> 
                                (<?php echo number_format($uprice,2); ?> x <?php echo $value['qty']; ?>)
                                <?php array_push($sup, ($uprice*$value['qty'])); ?>
                            </td>
                            <td>
                                INR. <?php echo number_format($ugstprice,2)*$value['qty']; ?> 
                                (<?php echo number_format($ugstprice,2); ?> x <?php echo $value['qty']; ?>)
                                <?php array_push($sgp, ($ugstprice*$value['qty'])); ?>
                            </td>
                            <td>
                                INR.  <?php echo number_format($price,2); ?>
                                <?php array_push($spr, $price); ?>
                            </td>
                        </tr>
                    <?php endforeach; } ?>
                    <tr style="background-color:#ddd;">
                        <td colspan="3" style="border:none;"></td>
                        <th align="right">Subtotal</th>
                        <td>INR. <?php echo number_format(array_sum($sup),2); ?></td> 
                        <td>INR. <?php echo number_format(array_sum($sgp),2); ?></td> 
                        <td>INR. <?php echo number_format(array_sum($spr),2); ?></td> 
                    </tr>
                    <?php if($invoice['sstate']=='Madhya Pradesh'){ ?>
                    <tr>
                        <td colspan="5" style="border:none;"></td>
                        <th align="right">CGST</th>
                        <td>
                            INR.  <?php echo number_format((array_sum($sgp)/2),2); ?>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="5" style="border:none;"></td>
                        <th align="right">SGST</th>
                        <td>
                            INR.  <?php echo number_format((array_sum($sgp)/2),2); ?>
                        </td>
                    </tr>
                    <?php }else{ ?>
    	            <tr>
    	            	<td colspan="5" style="border:none;"></td>
    	                <th align="right">IGST</th>
    	                <td>
    	                    INR.  <?php echo number_format(array_sum($sgp),2); ?>
    	                </td>
    	            </tr>
                    <?php } ?>
    	            <tr>
    	            	<td colspan="5"></td>
    	                <th align="right">Grand Total</th>
    	                <td>INR.  
    	                   <?php $grand = (array_sum($spr)); echo number_format($grand,2);?>
    	                </td>
    	            </tr>
    	        </tbody>
            </table>
        </main>
        <footer>
            <table class="table" style="margin-bottom:0px;border:none;width:100%">
                <tr>
                    <td style="width:100%;border:none;">
                        <table class="table" style="border:none;width:100%">
                            <tr>
                                <td style="border:none;font-size:10px;"></td>
                            </tr> 
                        </table>
                    </td>
                </tr>
            </table>
        </footer>
    </body>
</html>
