<style type="text/css">
	.placeholder {
		display:none;
	}
</style>
<div class="row font">
	<div class="col-lg-12 text-center">
		<div class="page-header">
			<h1>Checkout</h1>
		</div>
	</div>
</div>

<?php if (validation_errors()):?>
	<div class="alert alert-error">
		<a class="close" data-dismiss="alert">×</a>
		<?php echo validation_errors();?>
	</div>
<?php endif;?>

<script type="text/javascript">
	$(document).ready(function(){
		
		//if we support placeholder text, remove all the labels
		if(!supports_placeholder())
		{
			$('.placeholder').show();
		}
		
		<?php
		// Restore previous selection, if we are on a validation page reload
		$zone_id = set_value('zone_id');

		echo "\$('#zone_id').val($zone_id);\n";
		?>
	});
	
	function supports_placeholder()
	{
		return 'placeholder' in document.createElement('input');
	}
</script>



<script type="text/javascript">
$(document).ready(function() {
	$('#country_id').change(function(){
		populate_zone_menu();
	});	

});
// context is ship or bill
function populate_zone_menu(value)
{
	$.post('<?php echo site_url('locations/get_zone_menu');?>',{id:$('#country_id').val()}, function(data) {
		$('#zone_id').html(data);
	});
}
</script>
<?php /* Only show this javascript if the user is logged in */ ?>
<?php if($this->Customer_model->is_logged_in(false, false)) : ?>
<script type="text/javascript">	
	<?php
	$add_list = array();
	foreach($customer_addresses as $row) {
		// build a new array
		$add_list[$row['id']] = $row['field_data'];
	}
	$add_list = json_encode($add_list);
	echo "eval(addresses=$add_list);";
	?>
		
	function populate_address(address_id)
	{
		if(address_id == '')
		{
			return;
		}
		
		// - populate the fields
		$.each(addresses[address_id], function(key, value){
			
			$('.address[name='+key+']').val(value);

			// repopulate the zone menu and set the right value if we change the country
			if(key=='zone_id')
			{
				zone_id = value;
			}
		});
		
		// repopulate the zone list, set the right value, then copy all to billing
		$.post('<?php echo site_url('locations/get_zone_menu');?>',{id:$('#country_id').val()}, function(data) {
			$('#zone_id').html(data);
			$('#zone_id').val(zone_id);
		});		
	}
	
</script>
<?php endif;?>

<?php
$countries = $this->Location_model->get_countries_menu();

if(!empty($customer[$address_form_prefix.'_address']['country_id']))
{
	$zone_menu	= $this->Location_model->get_zones_menu($customer[$address_form_prefix.'_address']['country_id']);
}
else
{
	$zone_menu = array(''=>'')+$this->Location_model->get_zones_menu(array_shift(array_keys($countries)));
}

//form elements

$company	= array('placeholder'=>'Compañía','class'=>'address form-control', 'name'=>'company', 'value'=> set_value('company', @$customer[$address_form_prefix.'_address']['company']));
$address1	= array('placeholder'=>'Calle y número', 'class'=>'address form-control', 'name'=>'address1', 'value'=> set_value('address1', @$customer[$address_form_prefix.'_address']['address1']));
$address2	= array('placeholder'=>'Número Interior (opcional)', 'class'=>'address form-control', 'name'=>'address2', 'value'=>  set_value('address2', @$customer[$address_form_prefix.'_address']['address2']));
$first		= array('placeholder'=>'Nombre', 'class'=>'address form-control', 'name'=>'firstname', 'value'=>  set_value('firstname', @$customer[$address_form_prefix.'_address']['firstname']));
$last		= array('placeholder'=>'Apellido', 'class'=>'address form-control', 'name'=>'lastname', 'value'=>  set_value('lastname', @$customer[$address_form_prefix.'_address']['lastname']));
$email		= array('placeholder'=>'Email', 'class'=>'address form-control', 'name'=>'email', 'value'=> set_value('email', @$customer[$address_form_prefix.'_address']['email']));
$phone		= array('placeholder'=>'Teléfono', 'class'=>'address form-control', 'name'=>'phone', 'value'=> set_value('phone', @$customer[$address_form_prefix.'_address']['phone']));
$city		= array('placeholder'=>'Colonia', 'class'=>'address form-control', 'name'=>'city', 'value'=> set_value('city', @$customer[$address_form_prefix.'_address']['city']));
$zip		= array('placeholder'=>'Código Postal', 'maxlength'=>'10', 'class'=>'address form-control', 'name'=>'zip', 'value'=> set_value('zip', @$customer[$address_form_prefix.'_address']['zip']));


?>
	
	<?php
	//post to the correct place.
	echo ($address_form_prefix == 'bill')?form_open('checkout/step_1'):form_open('checkout/shipping_address');?>

	<div class="row">
		<div class="col-lg-3"></div>
		<div class="col-lg-6">
			<form class="form-horizontal" role="form">
				<fieldset>

					<!-- Form Name -->
					<legend><?php echo ($address_form_prefix == 'bill')?lang('address'):lang('shipping_address');?></legend>

					<!-- Text input-->
					<!-- <div class="form-group">
						<div class="col-sm-12">
							<?php echo form_input($company);?>
						</div>
					</div>
					<br><br> -->

					<!-- Text input-->
					<div class="form-group">
						<div class="col-sm-6">
							<?php echo form_input($first);?>
						</div>

						<div class="col-sm-6">
							<?php echo form_input($last);?>
						</div>
					</div>
					<br><br>

					<!-- Text input-->
					<div class="form-group">
						<div class="col-sm-6">
							<?php echo form_input($email);?>
						</div>

						<div class="col-sm-6">
							<?php echo form_input($phone);?>
						</div>
					</div>
					<br><br>

					<!-- Text input-->
					<div class="form-group">
						<div class="col-sm-12">
							<?php $countries_alt = array('138' => 'Mexico')?>
							<?php echo form_dropdown('country_id',$countries_alt, @$customer[$address_form_prefix.'_address']['country_id'], 'id="country_id" class="address form-control"');?>
						</div>
					</div>
					<br><br>

					<!-- Text input-->
					<div class="form-group">
						<div class="col-sm-12">
							<?php echo form_input($address1);?>
						</div>
					</div>
					<br><br>

					<!-- Text input-->
					<div class="form-group">
						<div class="col-sm-12">
							<?php echo form_input($address2);?>
						</div>
					</div>
					<br><br>

					<!-- Text input-->
					<div class="form-group">
						<div class="col-sm-4">
							<?php echo form_input($city);?>
						</div>

						<div class="col-sm-4">
							<?php $zone_menu_alt = array('2153' => 'Distrito Federal') ?>
							<?php 
							echo form_dropdown('zone_id',$zone_menu_alt, @$customer[$address_form_prefix.'_address']['zone_id'], 'id="zone_id" class="address form-control" ');?>
						</div>

						<div class="col-sm-4">
							<?php echo form_input($zip);?>
						</div>
					</div>
					<br>

					<?php if($address_form_prefix=='bill') : ?>

					<div class="checkbox">
						<div class="col-sm-12">
							<label for="use_shipping">
								<?php echo form_checkbox(array('name'=>'use_shipping', 'value'=>'yes', 'id'=>'use_shipping', 'checked'=>$use_shipping)) ?>
								Enviar a esta dirección
							</label>
						</div>
					</div>

					<?php endif ?>
					<br><br>
					<div class="col-lg-12">
						<?php if($address_form_prefix=='ship') : ?>
						<input class="btn btn-block btn-large btn-secondary" type="button" value="<?php echo lang('form_previous');?>" onclick="window.location='<?php echo base_url('checkout/step_1') ?>'"/>
						<?php endif; ?>
						<input class="btn btn-block btn-large btn-success" type="submit" value="<?php echo lang('form_continue');?>"/>
					</div>
				</fieldset>
			</form>
		</div>
	</div>

<?php if($this->Customer_model->is_logged_in(false, false)) : ?>

<div class="modal hide" id="address_manager">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">×</button>
		<h3><?php echo lang('your_addresses');?></h3>
	</div>
	<div class="modal-body">
		<p>
			<table class="table table-striped">
			<?php
			$c = 1;
			foreach($customer_addresses as $a):?>
				<tr>
					<td>
						<?php
						$b	= $a['field_data'];
						echo nl2br(format_address($b));
						?>
					</td>
					<td style="width:100px;"><input type="button" class="btn btn-primary choose_address pull-right" onclick="populate_address(<?php echo $a['id'];?>);" data-dismiss="modal" value="<?php echo lang('form_choose');?>" /></td>
				</tr>
			<?php endforeach;?>
			</table>
		</p>
	</div>
	<div class="modal-footer">
		<a href="#" class="btn" data-dismiss="modal">Close</a>
	</div>
</div>
<?php endif;?>