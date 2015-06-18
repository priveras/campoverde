<?php if(isset($this->categories[0])):?>

	<?php foreach($this->categories[0] as $cat_menu):?>

	<div class="col-lg-4 text-center">
		<a href="<?php echo site_url($cat_menu->slug);?>">
			<img style="width:200px; height:200px; "src="<?php echo site_url('uploads/images/full/' . $cat_menu->image);?>" alt="..." class="img-circle">
		</a>
	</div>
	<?php endforeach;?>
<?php endif;