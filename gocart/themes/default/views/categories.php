<?php $this->load->view('intro'); ?>
<br><br>
<div class="row">
	<div class="col-lg-12 text-center">
		<h1 style="font-weight:100; font-size:60px;">Nuestros productos</h1>
	</div>
</div>
<br><br>
<?php if(isset($this->categories[0])):?>

	<?php foreach($this->categories[0] as $cat_menu):?>

	<div class="col-lg-12 text-center" style="margin-bottom:30px;">
		<a class="hover" href="<?php echo base_url() . $cat_menu->slug ?>"><div class="bg-position transition ease"style="width:90%; margin:0 auto; border-radius:10px;background-size:cover; background-repeat:no-repeat; height:300px;background-image:url('<?php echo site_url('uploads/images/full/' . $cat_menu->image);?>')">
			<br><br><br><br><br>
            <h1 style="color:white; font-weight:100; font-size:60px;"><?php echo $cat_menu->name ?></h1>
		</div>
		</a>
	</div>
	<?php endforeach;?>
<?php endif;