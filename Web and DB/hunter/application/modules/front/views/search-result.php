<section class="breadcrumb-area">
	<div class="container-fluid custom-container">
		<div class="row  bc-inner1">
			<div class="col-xl-12">
				<div class="bc-inner">
					<p><a href="#">Home  |</a> <!-- <?php echo $head_title; ?> --></p>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="shop-area">
	<div class="container-fluid custom-container">
		<div class="row">
			<div class="order-1 order-lg-1 col-lg-12 col-xl-12">
				<div class="shop-content">
					<div class="tab-content" id="myTabContent">
						<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
							<div class="row">
								<?php if (isset($products) && !empty($products)){
									foreach ($products as $key => $value) {
								?>
									<div class="col-sm-3 col-xl-3 col-6">
										<div class="sin-product style-two">
											<div class="pro-img">
												<?php if($value['product_image']!=''){ ?>
													<img src="<?php echo base_url($value['product_image']); ?>" alt="<?php echo $value['product_name']; ?>">
												<?php }else{ ?>
													<img src="<?php echo base_url('assets/user/assets/img/no-place-holder.jpg'); ?>" alt="<?php echo $value['product_name']; ?>">
												<?php } ?>
											</div>
											<div class="mid-wrapper">
												<h5 class="pro-title"><a href="<?php echo base_url('product-detail/'.strtolower($value['product_slug']).'/'.$value['productid']); ?>"><?php echo $value['product_name']; ?></a></h5>
												<div class="color-variation">
													<?php 
														$color = json_decode($value['color'],true);
														if($color){
													?>
														<ul>
															<?php foreach ($color as $key1 => $value1){ ?>
																<li><i class="fas fa-circle" style="color:<?php echo $value1['color']; ?>"></i></li>
															<?php } ?>
														</ul>
													<?php } ?>
												</div>
												<p class="text-center">
													<?php if($value['product_sale_price']!=0){ ?>
			                                            <span class="new-price">Rs. <?php echo $value['product_sale_price']; ?></span>
			                                            <span class="old-price"><del>Rs. <?php echo $value['product_price']; ?></del></span>
			                                        <?php }else{ ?>
			                                            <span class="new-price">Rs. <?php echo $value['product_price']; ?></span>
			                                        <?php } ?>
												</p>
											</div>
											<div class="icon-wrapper">
												<div class="add-to-cart">
													<a href="<?php echo base_url('product-detail/'.strtolower($value['product_slug']).'/'.$value['productid']); ?>">Buy Now</a>
												</div>
											</div>
										</div>
									</div>
								<?php } }else{ ?>
                                    <br><br>
                                    <h1 class="text-center">No Products Available..</h1>
                                <?php } ?>
							</div>
						</div>
					</div>
					<div class="clearfix"></div>
					<div class="row">
	                    <div class="col-md-12 pagignation-top text-center">
	                        <center>
	                            <nav aria-label="...">
	                                  <?php echo $this->pagination->create_links(); ?>
	                            </nav>
	                        </center>
	                    </div>
	                </div>	
				</div>
			</div>
		</div>
	</div>
</section>