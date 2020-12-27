<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<div style="width:100%;min-height:100%;margin:10px auto;padding:0;background-color:#ffffff;font-family:Arial,Tahoma,Verdana,sans-serif;font-weight:299px;font-size:13px;text-align:center" bgcolor="#ffffff">



    <table width="100%" cellspacing="0" cellpadding="0" style="max-width:600px">

        <tbody>

            <tr>

                <td width="10" bgcolor="#027cd5" style="width:10px;background-color:#000;">&nbsp;</td>

                <td valign="middle" align="left" height="50" bgcolor="#027cd5" style="background-color:#000;padding:0;margin:0">

                    <a style="text-decoration:none;outline:none;color:#ffffff;font-size:13px" href="#" target="_blank">

                        <img src="<?php echo base_url('assets/user/media/images/logo.png'); ?>" height="40">

                    </a>

                </td>

                <td valign="middle" align="right" height="50" bgcolor="#D19E66" style="background-color:#D19E66;padding:0;margin:0">

                    <!-- <a style="text-decoration:none;outline:none;color:#ffffff;font-size:11px" href="https://play.google.com/store/apps/details?id=com.starwebindia.suchetasrumcollection" target="_blank">

                        <img border="0" style="vertical-align:middle" alt="Download APP" height="33" src="https://ci5.googleusercontent.com/proxy/hS9JzJTA9y70XwZpM7nQq7HCCueE_fLN4VSjCulG6i4YZIaccgUKbdf3QPRso62TeaebhXxHaWbrExjLLioSgnHiwTscb2EFFMBSTOvLZYXETbb0X4ZqS3UTwKZ54d4=s0-d-e1-ft#http://img5a.flixcart.com/www/promos/new/20150722-131253-download-app.png" class="CToWUd"> DOWNLOAD APP

                    </a> -->

                </td>

                <td width="10" bgcolor="#D19E66" style="width:10px;background-color:#000">&nbsp;</td>

            </tr>

        </tbody>

    </table>

    <table width="100%" cellspacing="0" cellpadding="0" style="max-width:600px;border-left:solid 1px #6e6d6d;border-right:solid 1px #6e6d6d">

        <tbody>

            <tr>

                <td align="left" valign="top" style="background-color:#ffffff;display:block;margin:0 auto;clear:both;padding:20px 20px 0 20px" bgcolor="">

                    <table border="0" cellspacing="0" cellpadding="0" width="100%" style="margin:0">

                        <tbody>

                            <!-- <tr>
                                <td colspan="4" align="left" valign="top">
                                    <p style="padding:0;margin:0;color:#565656;line-height:22px;font-size:13px">
                                        Gst num is - 
                                    </p>
                                </td>
                            </tr> -->

                            <tr>

                                <td colspan="3" align="left" valign="top">

                                    <p style="padding:0;margin:0;color:#565656;line-height:22px;font-size:13px">

                                        Your Order ID: <?php echo $orderid; ?>

                                    </p>

                                    <br>

                                </td>
                                <td width="50%" align="right" valign="top">
                                    <p style="padding:0;margin:0;color:#565656;line-height:22px;font-size:13px">
                                        Order Date: <?php echo $order_time; ?>
                                    </p>
                                </td>

                            </tr>

                            <tr>

                                <td colspan="4" align="left" valign="top">

                                    <table border="0" cellspacing="0" cellpadding="0" width="100%">

                                        <tbody>

                                            <tr>

                                                <!-- <td valign="middle" align="left" rowspan="2" style="white-space:nowrap;padding-right:5px;font-size:13px">Seller: </td> -->

                                                <td valign="middle" align="left" style="border-bottom:solid 2px #565656;width:90%"> </td>

                                            </tr>

                                            <tr>

                                                <td valign="middle" align="left"> </td>

                                            </tr>

                                        </tbody>

                                    </table>

                                </td>

                            </tr>

                        </tbody>

                    </table>

                </td>

            </tr>

        </tbody>

    </table>

    <table width="100%" cellspacing="0" cellpadding="0" style="max-width:600px;border-left:solid 1px #6e6d6d;border-right:solid 1px #6e6d6d">

        <tbody>

            <?php $grandtotal = $shipping = array(); 

                foreach ($cart as $key => $value) : 

                    //$grandtotal[] = $value['subtotal']; 

                    //$shipping[] = ($value["options"]["amount"]*$value['qty']); 

                    $price = 0;

                    $price = (($value['price']*$value["qty"]));

                    $amount[] = $price;

            ?>

            <tr>

                <td valign="top" align="center" width="350" style="background-color:#ffffff">

                    <table border="0" cellspacing="0" cellpadding="0" width="100%">

                        <tbody>

                            <tr>

                                <td width="40%" style="padding-left:20px;text-align:center" valign="middle" align="center">

                                    <a style="text-decoration:none" href="" target="_blank">

                                        <img border="0" style="width: 75px" src="<?php echo base_url($value['options']['product_photos']); ?>" class="CToWUd">

                                    </a>

                                </td>

                                <td width="60%" align="center" valign="top" style="padding:12px 15px 0 10px;margin:0;vertical-align:top;min-width:100px">

                                    <p style="padding:0;margin:0"> 
                                        <a style="text-decoration:none;color:#565656" href="" target="_blank"><span style="color:#565656;font-size:13px"><?php echo $value["options"]["product_name"]; ?></span></a> 
                                    </p>
                                    <p class="c-p-size">
                                        <?php if($value["options"]["size"]!='undefined'){ ?>
                                            <span>Size : </span> <button class="btn" type="button" style="width:35px;height:30px;line-height: 15px;border:1px solid #ddd;border-radius:0px;background:#fff;" disabled><?php echo $value["options"]["size"]; ?></button> &nbsp;&nbsp;
                                        <?php } ?>
                                        <?php if($value["options"]["color"]!='undefined' && $value["options"]["color"]!=''){ ?>
                                            <span>Color : <button type="button" style="width:20px;height:20px;border:none;border-radius:50px;background-color:<?php echo $value["options"]["color"]; ?>" disabled>&nbsp;</button></span>
                                        <?php } ?>
                                    </p>

                                </td>

                            </tr>

                        </tbody>

                    </table>

                </td>

                <td valign="top" align="center" width="250" style="background-color:#ffffff">

                    <table border="0" cellspacing="0" cellpadding="0" width="100%">

                        <tbody>

                            <tr>

                                <td width="33%" valign="top" align="center" style="padding:12px 10px 0 10px;margin:0;text-align:center">

                                    <p style="white-space:nowrap;padding:0;margin:0;color:#848484;font-size:12px">Item Price</p>

                                    <p style="white-space:nowrap;margin:0;padding:7px 0 0 0;color:#565656;font-size:13px">
                                        <?php if($currency=='USD' && $usdrate!=0){ 
                                          $convert_price = number_format(($value['price']/$usdrate),2);
                                        ?>
                                            $ <?php echo $convert_price; ?>
                                        <?php }else{ ?>
                                            INR. <?php echo number_format($value['price'], 2, '.', ''); ?> 
                                        <?php } ?>
                                    </p>

                                </td>

                                <td width="33%" valign="top" align="center" style="padding:12px 10px 0 10px;margin:0;text-align:center">

                                    <p style="padding:0;margin:0;color:#848484;font-size:12px">Qty</p>

                                    <p style="padding:7px 0 0 0;margin:0;color:#565656;font-size:13px"><?php echo $value['qty']; ?></p>

                                </td>

                                <td width="33%" valign="top" align="center" style="padding:12px 20px 0 10px;margin:0;text-align:center">

                                    <p style="white-space:nowrap;padding:0;margin:0;color:#848484;font-size:12px">Subtotal</p>

                                    <p style="white-space:nowrap;padding:7px 0 0 0;margin:0;color:#565656;font-size:13px">
                                        <?php if($currency=='USD' && $usdrate!=0){ 
                                          $convert_subprice = number_format(($price/$usdrate),2);
                                        ?>
                                            $ <?php echo $convert_subprice; ?>
                                        <?php }else{ ?>
                                            INR. <?php echo number_format($price, 2, '.', ''); ?> 
                                        <?php } ?>
                                    </p>

                                </td>

                            </tr>

                        </tbody>

                    </table>

                </td>

            </tr>

        <?php endforeach; ?>

        </tbody>

    </table>

    <?php 

    $Subtotal = array_sum($grandtotal);



    $cart_amount = array_sum($amount);

?>

    <table width="100%" cellspacing="0" cellpadding="0" style="max-width:600px;border-left:solid 1px #6e6d6d;border-right:solid 1px #6e6d6d;">

        <tbody>

            <tr>

                <td align="right" valign="top" style="background-color:#ffffff;display:block;margin:0 auto;clear:both;padding:5px 20px 0 20px" bgcolor="">

                    <table border="0" cellspacing="0" cellpadding="0" width="100%" style="margin:0">

                        <tbody>

                            <tr>

                                <td colspan="4" align="right" valign="top" style="padding:10px 0 0 0">

                                    <p style="text-align:right;padding:0;margin:0;color:#565656;font-size:13px">

                                        Sub Total INR. 
                                        <span style="font-size:21px">
                                            <?php if($currency=='USD' && $usdrate!=0){ 
                                              $convert_sub_tprice = number_format(($cart_amount/$usdrate),2);
                                            ?>
                                                $ <?php echo $convert_sub_tprice; ?>
                                            <?php }else{ ?>
                                                <?php echo number_format($cart_amount, 2, '.', ''); ?>
                                            <?php } ?>
                                        </span>

                                    </p>

                                </td>

                            </tr>
                            <?php if($coupon!=0){ ?>
                            <tr>

                                <td colspan="4" align="right" valign="top" style="padding:10px 0 0 0">

                                    <p style="text-align:right;padding:0;margin:0;color:#565656;font-size:13px">

                                        <?php if($currency=='USD' && $usdrate!=0){ 
                                          $convert_couponprice = number_format(($coupon/$usdrate),2);
                                        ?>
                                            Coupon Amount $ <?php echo $convert_couponprice; ?>
                                        <?php }else{ ?>
                                            Coupon Amount INR. <span style="font-size:21px"> - <?php echo number_format($coupon, 2, '.', ''); ?></span>
                                        <?php } ?>

                                    </p>

                                </td>

                            </tr>
                            <?php } ?>
                            <?php if($firstorder!=0){ ?>
                            <tr>

                                <td colspan="4" align="right" valign="top" style="padding:10px 0 0 0">

                                    <p style="text-align:right;padding:0;margin:0;color:#565656;font-size:13px">

                                        <?php if($currency=='USD' && $usdrate!=0){ 
                                          $convert_firstorder = number_format(($firstorder/$usdrate),2);
                                        ?>

                                            QBQ Discount $ <?php echo $convert_firstorder; ?>

                                        <?php }else{ ?>

                                            QBQ Discount INR. <span style="font-size:21px"> - <?php echo number_format($firstorder, 2, '.', ''); ?></span>

                                        <?php } ?>

                                    </p>

                                </td>

                            </tr>
                            <?php } ?>
                            <!-- <tr>

                                <td colspan="4" align="right" valign="top" style="padding:10px 0 0 0">

                                    <p style="text-align:right;padding:0;margin:0;color:#565656;font-size:13px">

                                        Shipping Amount Rs. <span style="font-size:21px"> <?php //echo number_format($ship_charge, 2, '.', ''); ?></span>

                                    </p>

                                </td>

                            </tr> -->

                        </tbody>

                    </table>

                </td>

            </tr>

        </tbody>

    </table>

    <table width="100%" cellspacing="0" cellpadding="0" style="max-width:600px;border-left:solid 1px #6e6d6d;border-right:solid 1px #6e6d6d;">

        <tbody>

            <tr>

                <td valign="top" align="right" bgcolor="" style="clear:both;display:block;margin:0 auto;padding:10px 20px 0 20px;background-color:#ffffff">

                    <table cellspacing="0" cellpadding="0" width="100%">

                        <tbody>

                            <tr>

                                <td bgcolor="#f9f9f9" valign="top" align="right" style="border-top:2px solid #565656;border-bottom:1px solid #e6e6e6;padding:15px 0;margin:0;background-color:#f9f9f9">

                                    <p style="padding:0;margin:0;text-align:right;color:#565656;line-height:22px;white-space:nowrap;font-size:13px">

                                        <?php if($currency=='USD' && $usdrate!=0){ 
                                          $convert_ampaidprice = number_format((($cart_amount-$coupon-$firstorder)/$usdrate),2);
                                        ?>
                                            Amount Paid $ <span style="font-size:21px"> <?php echo $convert_ampaidprice; ?></span> 
                                        <?php }else{ ?>
                                            Amount Paid INR. <span style="font-size:21px"> <?php echo number_format(($cart_amount-$coupon-$firstorder),2); ?></span> 
                                        <?php } ?>
                                    </p>

                                </td>

                            </tr>

                        </tbody>

                    </table>

                </td>

            </tr>

        </tbody>

    </table>

    <table width="100%" cellspacing="0" cellpadding="0" style="max-width:600px;border-left:solid 1px #6e6d6d;border-right:solid 1px #6e6d6d;">

        <tbody>

            <tr>

                <td valign="top" align="left" style="background-color:#ffffff;color:#2c2c2c;display:block;font-weight:300;margin:0;padding:0;clear:both" bgcolor="#ffffff">

                    <table width="100%" cellspacing="0" cellpadding="0">

                        <tbody>

                            <tr>

                                <td valign="top" align="left" style="padding:20px 20px 0 20px;margin:0">

                                    <p style="margin:0;padding:0;color:#565656;font-size:13px">YOUR SHIPPING ADDRESS DETAIL:</p>

                                    <p style="padding:0;margin:15px 0 10px 0;font-size:15px;color:#333333;line-height:25px;">

                                        <?php echo "Name - ".$address['sname'].",<br> Mobile No. - ".$address['smobile_no']."<br>"; ?>

                                        <?php echo "Address Line1 - ".$address['saddress1']."<br>"; ?>

                                        <?php echo "Address Line2 - ".$address['saddress2']."<br>"; ?>

                                        <?php echo "Country - ".$address['scountry'].",<br>"; ?> 

                                        <?php echo "City - ".$address['scity'].",<br>"; ?> 

                                        <?php echo "State - ".$address['sstate'].",<br>"; ?> 

                                        <?php echo "Pincode - ".$address['spincode']; ?>

                                    </p>

                                </td>

                            </tr>

                        </tbody>

                    </table>

                </td>

            </tr>

        </tbody>

    </table>



  

    <table width="100%" cellspacing="0" cellpadding="0" style="max-width:600px;border: solid 1px #6e6d6d;border-top:none">

        <tbody>

            <tr>

                <td valign="top" align="center" style="text-align:center;background-color:#f9f9f9;display:block;margin:0 auto;clear:both;padding:15px 40px" bgcolor="">

                    <p style="padding:0;margin:0 0 7px 0"> Design & Developed By <a href="http://www.starwebindia.com/" style="text-decoration:none;color:#565656" target="_blank"><span style="color:#565656;font-size:13px">Star Web India</span></a> </p>

                    <p style="padding:10px 0 0 0;margin:0;border-top:solid 1px #cccccc;font-size:11px;color:#565656">

                        24x7 Customer Support | Buyer Protection | Flexible Payment Options | Largest Collection

                    </p>

                
                </td>

            </tr>

        </tbody>

    </table> 

</div>



</body>
</html>
