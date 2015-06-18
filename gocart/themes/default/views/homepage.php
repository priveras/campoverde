<br><br><br>
<div class="row font">
	<div class="col-lg-12 text-center">
		<h1 style="font-weight:100">CARNE DIRECTO A TU CASA</h1>
		<h3><small>Envío gratuito en el sur de la ciudad de México</small></h3>
	</div>
</div>
<!-- <br>
<br>
<div class="row font">
	<div class="col-lg-4"></div>
	<div class="col-lg-4">
		<div class="row">
			<div class="col-lg-4">
				<div class="btn btn-success">Carne</div>
			</div>
			<div class="col-lg-4">
				<div class="btn btn-success">Carne</div>
			</div>
			<div class="col-lg-4">
				<div class="btn btn-success">Carne</div>
			</div>
		</div>
	</div>
</div> -->
<br><br><br><br><br><br>
<div class="row text-center font">
	<div class="col-lg-2"></div>
	<div class="col-lg-8">
		<div class="row">
			<div class="col-lg-4">
				<div class="row">
					<div class="col-lg-12">
						<h3>Lorem ipsum dolor sit</h3>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12">
						<i class="fa fa-barcode fa-5x"></i>
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-lg-12 text-justify">
						Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. 
					</div>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="row">
					<div class="col-lg-12">
						<h3>Lorem ipsum dolor sit</h3>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12">
						<i class="fa fa-truck fa-5x"></i>
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-lg-12 text-justify">
						Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. 
					</div>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="row">
					<div class="col-lg-12">
						<h3>Lorem ipsum dolor sit</h3>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12">
						<i class="fa fa-cutlery fa-5x"></i>
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-lg-12 text-justify">
						Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. 
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<br>
<br>
<!-- <div class="row">
	<div class="col-lg-2"></div>
	<div class="col-lg-8">
		<div role="tabpanel">
			Nav tabs 
			<ul class="nav nav-tabs nav-justified" role="tablist">
				<li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Carne de Cerdo</a></li>
				<li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Carne de Pollo</a></li>
				<li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Carne de Res</a></li>
			</ul>

			Tab panes 
			<div class="tab-content">
				<div role="tabpanel" class="tab-pane active" id="home">
					<?php

					$itm_cnt = 1;
					foreach($products as $product):
						if($itm_cnt == 1):?>
					<div class="row">
						<?php endif;?>
						<div class="col-lg-4 product">
							<div>
								<?php
								$photo  = theme_img('no_picture.png', lang('no_image_available'));
	                            $product->images    = array_values($product->images);

	                            if(!empty($product->images[0]))
	                            {
	                            	$primary    = $product->images[0];
	                            	foreach($product->images as $photo)
	                            	{
	                            		if(isset($photo->primary))
	                            		{
	                            			$primary    = $photo;
	                            		}
	                            	}

	                                $photo  = '<img src="'.base_url('uploads/images/thumbnails/'.$primary->filename).'" alt="'.$product->seo_title.'"/>';
	                            }
	                            ?>
	                            <div class="product-image">
	                                <a class="thumbnail" href="<?php echo site_url(implode('/', $base_url).'/'.$product->slug); ?>">
	                                    <?php echo $photo; ?>
	                                </a>
	                            </div>
	                            <h5 style="margin-top:5px;">
	                                <a class="product-name" href="<?php echo site_url(implode('/', $base_url).'/'.$product->slug); ?>">
	                                    <?php echo $product->name;?>
	                                </a>
	                                <?php if($this->session->userdata('admin')): ?>
	                                    <a class="btn" title="<?php echo lang('edit_product'); ?>" href="<?php echo  site_url($this->config->item('admin_folder').'/products/form/'.$product->id); ?>"><i class="icon-pencil"></i></a>
	                                <?php endif; ?>
	                            </h5>

	                            <?php if($product->excerpt != ''): ?>
	                                <div class="product-excerpt" class="excerpt"><?php echo $product->excerpt; ?></div>
	                            <?php endif; ?>
	                        
	                            <div style="margin-bottom:40px;">
	                                <?php if($product->saleprice > 0):?>
	                                    <span class="price-slash"><?php echo lang('product_reg');?> <?php echo format_currency($product->price); ?></span>
	                                    <span class="price-sale"><?php echo lang('product_sale');?> <?php echo format_currency($product->saleprice); ?></span>
	                                <?php else: ?>
	                                    <span class="price-reg"><?php echo lang('product_price');?>Precio: <?php echo format_currency($product->price); ?></span>
	                                <?php endif; ?>
	                            </div>
	                        
	                            <?php if((bool)$product->track_stock && $product->quantity < 1 && config_item('inventory_enabled')) { ?>
	                                <div class="stock_msg"><?php echo lang('out_of_stock');?></div>
	                            <?php } ?>
	                        </div>
	                    </div>
	                <?php endforeach; ?>
	                <?php if($itm_cnt != 1){
	                	echo '</div>';
	                }?>
		            </div>
				</div>
				<div role="tabpanel" class="tab-pane" id="profile">...</div>
				<div role="tabpanel" class="tab-pane" id="messages">...</div>
			</div>
		</div>
	</div>
</div> -->