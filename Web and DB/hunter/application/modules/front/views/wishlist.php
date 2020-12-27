<div id="content" class="site-content">
    <div class="col-full">
        <div class="row">
            <nav class="woocommerce-breadcrumb">
                <a href="<?php echo base_url();?>">Home</a>
                <span class="delimiter">
                    <i class="tm tm-breadcrumbs-arrow-right"></i>
                </span>
                Wishlist
            </nav>
            <!-- .woocommerce-breadcrumb -->
            <div id="primary" class="content-area">
                <main id="main" class="site-main">
                    <div class="type-page hentry">
                        <header class="entry-header">
                            <div class="page-header-caption">
                                <h1 class="entry-title">Wishlist</h1>
                            </div>
                        </header>
                        <!-- .entry-header -->
                        <div class="entry-content">
                            <table class="shop_table cart wishlist_table">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th class="product-thumbnail"></th>
                                        <th class="product-name">
                                            <span class="nobr">Product Name</span>
                                        </th>
                                        <th class="product-price">
                                            <span class="nobr">
                                                Unit Price
                                            </span>
                                        </th>
                                        <th class="product-stock-status">
                                            <span class="nobr">
                                                Stock Status
                                            </span>
                                        </th>
                                        <th class="product-add-to-cart"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(isset($wish) && !empty($wish)){ foreach ($wish as $key => $value){ 
                                        $product = $this->common->getsData('products',array('productid'=>$value['productid']));
                                        if($product)
                                        {
                                            $image = $this->common->getData('product_media',array('product_id'=>$product['productid']));
                                        }
                                        ?>
                                    <tr>
                                        <td >
                                            <a title="Remove" class="remove-icon RemoveWishOption" data-id="<?php echo $value['productid'];?>" data-user="<?php echo $value['profileid'];?>" href="javascript:void(0)">
                                                <i class="fa fa-times"></i>
                                            </a>
                                        </td>
                                        <td class="product-thumbnail">
                                            <a href="<?php echo base_url('product-detail/'.strtolower($product['product_slug']).'/'.$product['productid']); ?>">
                                                <img width="180" height="180" alt="" class="wp-post-image" src="<?php echo base_url($image[0]['product_image']);?>">
                                            </a>
                                        </td>
                                        <td class="product-name">
                                            <a href="<?php echo base_url('product-detail/'.strtolower($product['product_slug']).'/'.$product['productid']); ?>"><?php echo R.$product['product_name'];?></a>
                                        </td>
                                        <td class="product-price">
                                            <ins>
                                                <span class="woocommerce-Price-amount amount"><?php echo $product['product_sale_price'];?></span>
                                            </ins>
                                            <del>
                                                <span class="woocommerce-Price-amount amount"><?php echo R.$product['product_price'];?></span>
                                            </del>
                                        </td>
                                        <td class="product-stock-status">
                                            <span class="wishlist-in-stock"><?php if($product['product_stock'] != 0){echo 'In Stock';}else{echo "Not Available";} ?></span>
                                        </td>
                                        <td class="product-add-to-cart">
                                            <a class="button add_to_cart_button button alt" href="<?php echo base_url('product-detail/'.strtolower($product['product_slug']).'/'.$product['productid']); ?>"> Buy Now</a>
                                        </td>
                                    </tr>
                                    <?php }} ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="6">
                                            <div class="yith-wcwl-share">
                                                <h4 class="yith-wcwl-share-title">Share on:</h4>
                                                <ul>
                                                    <li style="list-style-type: none; display: inline-block;">
                                                        <a title="Facebook" href="https://www.facebook.com/sharer.php?s=100&amp;p%5Btitle%5D=My+wishlist+on+Tech+Market&amp;p%5Burl%5D=http%3A%2F%2Flocalhost%2F%7Efarook%2Ftechmarket%2Fhome-v1.html%2Fwishlist%2Fview%2FD5ON1PW1PYO1%2F" class="facebook" target="_blank"></a>
                                                    </li>
                                                    <li style="list-style-type: none; display: inline-block;">
                                                        <a title="Twitter" href="https://twitter.com/share?url=http%3A%2F%2Flocalhost%2F%7Efarook%2Ftechmarket%2Fhome-v1.html%2Fwishlist%2Fview%2FD5ON1PW1PYO1%2F&amp;text=" class="twitter" target="_blank"></a>
                                                    </li>
                                                    <li style="list-style-type: none; display: inline-block;">
                                                        <a onclick="window.open(this.href); return false;" title="Pinterest" href="http://pinterest.com/pin/create/button/?url=http%3A%2F%2Flocalhost%2F%7Efarook%2Ftechmarket%2Fhome-v1.html%2Fwishlist%2Fview%2FD5ON1PW1PYO1%2F&amp;description=&amp;media=" class="pinterest" target="_blank"></a>
                                                    </li>
                                                    <li style="list-style-type: none; display: inline-block;">
                                                        <a onclick="javascript:window.open(this.href, &quot;&quot;, &quot;menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600&quot;);return false;" title="Google+" href="https://plus.google.com/share?url=http%3A%2F%2Flocalhost%2F%7Efarook%2Ftechmarket%2Fhome-v1.html%2Fwishlist%2Fview%2FD5ON1PW1PYO1%2F&amp;title=My+wishlist+on+Tech+Market" class="googleplus" target="_blank"></a>
                                                    </li>
                                                    <li style="list-style-type: none; display: inline-block;">
                                                        <a title="Email" href="mailto:?subject=I+wanted+you+to+see+this+site&amp;body=http%3A%2F%2Flocalhost%2F%7Efarook%2Ftechmarket%2Fhome-v1.html%2Fwishlist%2Fview%2FD5ON1PW1PYO1%2F&amp;title=My+wishlist+on+Tech+Market" class="email"></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                            <!-- .woocommerce -->
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