<div id="content" class="site-content">
    <div class="col-full">
        <div class="row">
            <nav class="woocommerce-breadcrumb">
                <a href="<?php echo base_url();?>">Home</a>
                <span class="delimiter">
                    <i class="tm tm-breadcrumbs-arrow-right"></i>
                </span>Compare
            </nav>
            <!-- .woocommerce-breadcrumb -->
            <div id="primary" class="content-area">
                <main id="main" class="site-main">
                    <div class="type-page hentry">
                        <div class="entry-content">
                            <div class="table-responsive">
                                <table class="table table-compare compare-list">
                                    <tbody>
                                        <tr>
                                            <th>Product</th>
                                            <td>
                                                <?php if(isset($p1) && !empty($p1)){ $image = $this->common->getData('product_media',array('product_id'=>$p1['productid']));?>
                                                <a class="product" href="<?php echo base_url('product-detail/'.strtolower($p1['product_slug']).'/'.$p1['productid']); ?>">
                                                    <div class="product-image">
                                                        <div class="image">
                                                            <img width="300" height="300" alt="" class="attachment-shop_catalog size-shop_catalog wp-post-image" src="<?php echo base_url($image[0]['product_image']);?>">
                                                        </div>
                                                    </div>
                                                    <div class="product-info">
                                                        <h3 class="product-title"><?php echo $p1['product_name'];?></h3>
                                                    </div>
                                                </a>
                                                <?php } ?>
                                                <!-- /.product -->
                                            </td>
                                            <td>
                                                <?php if(isset($p2) && !empty($p2)){ $image = $this->common->getData('product_media',array('product_id'=>$p2['productid']));?>
                                                <a class="product" href="<?php echo base_url('product-detail/'.strtolower($p2['product_slug']).'/'.$p2['productid']); ?>">
                                                    <div class="product-image">
                                                        <div class="image">
                                                            <img width="300" height="300" alt="" class="attachment-shop_catalog size-shop_catalog wp-post-image" src="<?php echo base_url($image[0]['product_image']);?>">
                                                        </div>
                                                    </div>
                                                    <div class="product-info">
                                                        <h3 class="product-title"><?php echo $p2['product_name'];?></h3>
                                                    </div>
                                                </a>
                                                <?php } ?>
                                                <!-- /.product -->
                                            </td>
                                            <td>
                                                <?php if(isset($p3) && !empty($p3)){ $image = $this->common->getData('product_media',array('product_id'=>$p3['productid']));?>
                                                <a class="product" href="<?php echo base_url('product-detail/'.strtolower($p3['product_slug']).'/'.$p3['productid']); ?>">
                                                    <div class="product-image">
                                                        <div class="image">
                                                            <img width="300" height="300" alt="" class="attachment-shop_catalog size-shop_catalog wp-post-image" src="<?php echo base_url($image[0]['product_image']);?>">
                                                        </div>
                                                    </div>
                                                    <div class="product-info">
                                                        <h3 class="product-title"><?php echo $p3['product_name'];?></h3>
                                                    </div>
                                                </a>
                                                <?php } ?>
                                                <!-- /.product -->
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Price</th>
                                            <td>
                                                <?php if(isset($p1) && !empty($p1)){ ?>
                                                <div class="product-price price">
                                                    <ins>
                                                        <span class="woocommerce-Price-amount amount">
                                                           <?php echo R.$p1['product_sale_price'];?>
                                                        </span>
                                                    </ins>
                                                    <del>
                                                        <span class="woocommerce-Price-amount amount">
                                                            <?php echo R.$p1['product_price'];?>
                                                        </span>
                                                    </del>
                                                </div>
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <?php if(isset($p2) && !empty($p2)){ ?>
                                                <div class="product-price price">
                                                    <ins>
                                                        <span class="woocommerce-Price-amount amount">
                                                           <?php echo R.$p2['product_sale_price'];?>
                                                        </span>
                                                    </ins>
                                                    <del>
                                                        <span class="woocommerce-Price-amount amount">
                                                            <?php echo R.$p2['product_price'];?>
                                                        </span>
                                                    </del>
                                                </div>
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <?php if(isset($p3) && !empty($p3)){ ?>
                                                <div class="product-price price">
                                                    <ins>
                                                        <span class="woocommerce-Price-amount amount">
                                                           <?php echo R.$p3['product_sale_price'];?>
                                                        </span>
                                                    </ins>
                                                    <del>
                                                        <span class="woocommerce-Price-amount amount">
                                                            <?php echo R.$p3['product_price'];?>
                                                        </span>
                                                    </del>
                                                </div>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Availability</th>
                                            <td>
                                                <?php if(isset($p1) && !empty($p1)){ if($p1['product_stock']!=''){ ?>
                                                <span>In stock</span>
                                                <?php }else{ ?>
                                                <span>Not Available</span>
                                                <?php }} ?>
                                            </td>
                                            <td>
                                                <?php if(isset($p2) && !empty($p2)){ if($p2['product_stock']!=''){ ?>
                                                <span>In stock</span>
                                                <?php }else{ ?>
                                                <span>Not Available</span>
                                                <?php }} ?>
                                            </td>
                                            <td>
                                                <?php if(isset($p3) && !empty($p3)){ if($p3['product_stock']!=''){ ?>
                                                <span>In stock</span>
                                                <?php }else{ ?>
                                                <span>Not Available</span>
                                                <?php }} ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Description</th>
                                            <td>
                                                <?php if(isset($p1) && !empty($p1)){ ?>
                                                <p><?php echo $p1['product_short_summary'];?></p>
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <?php if(isset($p2) && !empty($p2)){ ?>
                                                <p><?php echo $p2['product_short_summary'];?></p>
                                                <?php } ?>
                                            </td>
                                            <td>
                                               <?php if(isset($p3) && !empty($p3)){ ?>
                                                <p><?php echo $p3['product_short_summary'];?></p>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Add to cart</th>
                                            <td>
                                                <?php if(isset($p1) && !empty($p1)){ ?>
                                                <a class="button" href="<?php echo base_url('product-detail/'.strtolower($p1['product_slug']).'/'.$p1['productid']); ?>">Add to cart</a>
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <?php if(isset($p2) && !empty($p2)){ ?>
                                                <a class="button" href="<?php echo base_url('product-detail/'.strtolower($p2['product_slug']).'/'.$p2['productid']); ?>">Add to cart</a>
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <?php if(isset($p3) && !empty($p3)){ ?>
                                                <a class="button" href="<?php echo base_url('product-detail/'.strtolower($p3['product_slug']).'/'.$p3['productid']); ?>">Add to cart</a>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>&nbsp;</th>
                                            <td class="text-center">
                                                <?php if(isset($p1) && !empty($p1)){ ?>
                                                <a title="Remove" class="remove-icon RemoveCompareOption" data-ses="1" href="javascript:void(0)">
                                                    <i class="fa fa-times"></i>
                                                </a>
                                                <?php } ?>
                                            </td>
                                            <td class="text-center">
                                                <?php if(isset($p2) && !empty($p2)){ ?>
                                                <a title="Remove" class="remove-icon RemoveCompareOption" data-ses="2" href="javascript:void(0)">
                                                    <i class="fa fa-times"></i>
                                                </a>
                                                <?php } ?>
                                            </td>
                                            <td class="text-center">
                                                 <?php if(isset($p3) && !empty($p3)){ ?>
                                                <a title="Remove" class="remove-icon RemoveCompareOption" data-ses="3" href="javascript:void(0)">
                                                    <i class="fa fa-times"></i>
                                                </a>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <!-- /.table-compare compare-list -->
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- .entry-content -->
                    </div>
                    <!-- .hentry -->
                </main>
                <!-- #main -->
            </div>
            <!-- #primary -->
        </div>
        <!-- .row -->
    </div>
    <!-- .col-full -->
</div>