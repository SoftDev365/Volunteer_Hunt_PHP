<?php if(isset($maincat) && $maincat){$maincategory = $maincat;}else{$maincategory='explore';} ?>
<?php if(isset($subcat) && $subcat){$subcategory = $subcat;}else{$subcategory='subexplore';} ?>
<section class="breadcrumb-area">
	<div class="container-fluid custom-container">
		<div class="row bc-inner1">
			<div class="col-xl-12">
				<div class="bc-inner">
					<p><a href="#">Home  |</a> <?php echo $maincategory; ?> | <?php echo $subcategory; ?></p>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="main-product bg-one pt-0">
	<div class="container container-two">
		<div class="row">
			<div class="col-xl-12 ">
				<div class="pro-tab-filter">
					<div class="grid grid-three">
						<?php if(isset($category) && !empty($category)){ 
			              	foreach ($category as $key => $value) { 
			              		$subcat = $this->common->getData('category',array('parent'=>$value['c_id']));
			              	if(isset($subcat) && $subcat) { 
				              	$href=base_url('category-list/'.str_replace(' ', '-',$maincat).'/'.str_replace(' ', '-',$value['category']).'/'.$value['c_id']);
				          	}else{
				            	$href = str_replace(" ","-",base_url("products/".$value['category']."/pr?catid=".$value['c_id']));
				          	} 
			            ?>
							<div class="grid-item col-sm-12 col-md-4">
								<div class="sin-product style-three">
									<div class="pro-img-three">
										<div class="img-show">
											<?php if($value['image']!=''){ ?>
												<img src="<?php echo base_url($value['image']); ?>" alt="<?php echo $value['category']; ?>">
											<?php }else{ ?>
												<img src="<?php echo base_url('assets/user/'); ?>media/images/product/no-place-holder.jpg" alt="<?php echo $value['category']; ?>">
											<?php } ?>
										</div>
										<div class="img-hover">
											<?php if($value['image']!=''){ ?>
												<a href="<?php echo $href; ?>"><img src="<?php echo base_url($value['image']); ?>" alt="<?php echo $value['category']; ?>"></a>
											<?php }else{ ?>
												<a href="<?php echo $href; ?>"><img src="<?php echo base_url('assets/user/'); ?>media/images/product/no-place-holder.jpg" alt="<?php echo $value['category']; ?>"></a>
											<?php } ?>
										</div>
									</div>
									<div class="mid-wrapper">
										<!-- <h5 class="pro-title"><a href="<?php echo $href; ?>"><?php echo $value['category']; ?></a></h5> -->
										<p class="text-center"><a href="<?php echo $href; ?>" class="btn-two fadeInUp animated"><?php echo $value['category']; ?></a></p>
									</div>
								</div>
							</div>
						<?php } } ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>