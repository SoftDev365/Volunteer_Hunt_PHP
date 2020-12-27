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

                                        Your Order ID: <?php echo $email['orderid']; ?>

                                    </p>

                                    <br>

                                </td>
                                <td width="50%" align="right" valign="top">
                                    <p style="padding:0;margin:0;color:#565656;line-height:22px;font-size:13px">
                                        Dispatch Date: <?php echo $email['date']; ?>
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

    <table width="100%" cellspacing="0" cellpadding="0" style="max-width:600px;border-left:solid 1px #6e6d6d;border-right:solid 1px #6e6d6d;">

        <tbody>

            <tr>

                <td valign="top" align="left" style="background-color:#ffffff;color:#2c2c2c;display:block;font-weight:300;margin:0;padding:0;clear:both" bgcolor="#ffffff">

                    <table width="100%" cellspacing="0" cellpadding="0">

                        <tbody>

                            <tr>

                                <td valign="top" align="left" style="padding:20px 20px 0 20px;margin:0">

                                    <p style="margin:0;padding:0;color:#565656;font-size:13px;text-align: center;">
                                        Dear User, Your Order #<?php echo $email['orderid']; ?> has been dispatched and will reach you by <?php echo $email['date']; ?>. 
                                    </p>
                                    <p>&nbsp;</p>
                                    <p style="margin:0;padding:0;color:#565656;font-size:13px;text-align:center;">
                                       Click for Track your order
                                    </p>
                                    <p>&nbsp;</p>
                                    <p style="text-align:center;"><a href="<?php echo $email['link']; ?>" style="padding:10px 25px;border-radius:15px;border-color:#D55A2E;background:#D55A2E;color:#fff;text-decoration:none;">Track your order</a></p>
                                    <p>&nbsp;</p>
    
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
