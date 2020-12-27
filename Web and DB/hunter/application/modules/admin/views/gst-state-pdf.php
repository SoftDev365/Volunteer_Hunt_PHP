<!DOCTYPE html>

<html>

<head>

    <title>Wear Your Job</title>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    

    <!-- <link rel="stylesheet" href="http://dragonpartners.net/assets/dfront/bootstrap/css/bootstrap.min.css"> -->

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
                            	<img src="<?php echo base_url('assets/user/images/logo-police.png'); ?>" alt="logo" style="width:150px;">
                            </td>
                            <td style="border:none;">
                            	<h1>GST Calculation</h1>
                            </td>
                        </tr>
                    </table>
                </header>

                <main>
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

                                        $t_gst = ($sprice*$gst)/100;
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
            </div>
        </div>
    </body>
</html>

