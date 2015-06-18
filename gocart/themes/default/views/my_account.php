<?php if(validation_errors()):?>
<div class="alert allert-error">
	<a class="close" data-dismiss="alert">×</a>
	<?php echo validation_errors();?>
</div>
<?php endif;?>
<script>
$(document).ready(function(){
	$('.delete_address').click(function(){
		if($('.delete_address').length > 1)
		{
			if(confirm('<?php echo lang('delete_address_confirmation');?>'))
			{
				$.post("<?php echo site_url('secure/delete_address');?>", { id: $(this).attr('rel') },
					function(data){
						$('#address_'+data).remove();
						$('#address_list .my_account_address').removeClass('address_bg');
						$('#address_list .my_account_address:even').addClass('address_bg');
					});
			}
		}
		else
		{
			alert('<?php echo lang('error_must_have_address');?>');
		}	
	});
	
	$('.edit_address').click(function(){
		$.post('<?php echo site_url('secure/address_form'); ?>/'+$(this).attr('rel'),
			function(data){
				$('#address-form-container').html(data).modal('show');
			}
		);
	});
});


function set_default(address_id, type)
{
	$.post('<?php echo site_url('secure/set_default_address') ?>/',{id:address_id, type:type});
}


</script>


<?php
$company	= array('id'=>'company', 'class'=>'form-control', 'name'=>'company', 'value'=> set_value('company', $customer['company']));
$first		= array('id'=>'firstname', 'class'=>'form-control', 'name'=>'firstname', 'value'=> set_value('firstname', $customer['firstname']));
$last		= array('id'=>'lastname', 'class'=>'form-control', 'name'=>'lastname', 'value'=> set_value('lastname', $customer['lastname']));
$email		= array('id'=>'email', 'class'=>'form-control', 'name'=>'email', 'value'=> set_value('email', $customer['email']));
$phone		= array('id'=>'phone', 'class'=>'form-control', 'name'=>'phone', 'value'=> set_value('phone', $customer['phone']));

$password	= array('id'=>'password', 'class'=>'form-control', 'name'=>'password', 'value'=>'', 'placeholder' => 'Nueva contraseña');
$confirm	= array('id'=>'confirm', 'class'=>'form-control', 'name'=>'confirm', 'value'=>'', 'placeholder' => 'Confirmar contraseña');
?>	
	<br>
	<br>
	<div class="col-lg-4 font">
		<?php echo form_open('secure/my_account'); ?>
		<div class="panel panel-default">
			<div class="panel-heading">Datos de usuario</div>
			<div class="panel-body">
				<fieldset>
					<div class="form-group">
						<?php echo form_input($first);?>
					</div>
					<div class="form-group">
						<?php echo form_input($last);?>
					</div>
					<div class="form-group">
						<?php echo form_input($email);?>
					</div>
					<div class="form-group">
						<?php echo form_input($phone);?>
					</div>
					<div class="checkbox">
						<label>
							<input type="checkbox" name="email_subscribe" value="1" <?php if((bool)$customer['email_subscribe']) { ?> checked="checked" <?php } ?>/> Recibir ofertas por email
						</label>
					</div>
					<div class="well well-sm">
						Si no deseas cambiar la contraseña deja estos 2 campos vacíos
					</div>
					<div class="form-group">
						<?php echo form_input($password);?>
					</div>
					<div class="form-group">
						<?php echo form_input($confirm);?>
					</div>
					<input style="width:100%;" type="submit" value="Actualizar Datos" class="btn btn-success" />
				</fieldset>
			</div>
		</div>
		</form>
	</div>
	
	<div class="col-lg-8 font">
		<div class="row">
			<div class="panel panel-default">
				<div class="panel-heading">Administrador de Direcciones</div>
				<!-- <input type="button" class="btn edit_address" rel="0" value="<?php echo lang('add_address');?>"/> -->
				<div class="panel-body">
					<?php if(count($addresses) > 0):?>
					<table class="table table-bordered table-striped">
						<?php
						$c = 1;
						foreach($addresses as $a):?>
							<tr id="address_<?php echo $a['id'];?>">
								<td>
									<?php
									$b	= $a['field_data'];
									echo format_address($b, true);
									?>
								</td>
								<td>
									<div class="row-fluid">
										<div class="span12">
											<div class="btn-group pull-right">
												<input type="button" class="btn btn-default edit_address" rel="<?php echo $a['id'];?>" value="Editar" />
												<input type="button" class="btn btn-danger delete_address" rel="<?php echo $a['id'];?>" value="Eliminar" />
											</div>
										</div>
									</div>
									<div class="pull-right" style="padding-top:7px; margin-right:15px;">
										<!-- <input type="radio" name="bill_chk" onclick="set_default(<?php echo $a['id'] ?>, 'bill')" <?php if($customer['default_billing_address']==$a['id']) echo 'checked="checked"'?> /> <?php echo lang('default_billing');?> -->
										<!-- &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; -->
										<input type="radio" name="ship_chk" onclick="set_default(<?php echo $a['id'] ?>,'ship')" <?php if($customer['default_shipping_address']==$a['id']) echo 'checked="checked"'?>/> Dirección principal
									</div>
								</td>
							</tr>
						<?php endforeach;?>
						</table>
					<?php endif;?>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="panel panel-default">
				<div class="panel-heading">Órdenes</div>
				<div class="panel-body">
					<?php if($orders):?>
					<table class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Fecha</th>
								<th>Número de orden</th>
								<th>Status</th>
							</tr>
						</thead>

						<tbody>
						<?php
						foreach($orders as $order): ?>
							<tr>
								<td>
									<?php $d = format_date($order->ordered_on); 
							
									$d = explode(' ', $d);
									echo $d[0].' '.$d[1].', '.$d[3];
							
									?>
								</td>
								<td><?php echo $order->order_number; ?></td>
								<td><?php echo $order->status;?></td>
							</tr>
					
						<?php endforeach;?>
						</tbody>
					</table>
					<?php else: ?>
					<div class="row text-center">
						<h3>Aun no has realizado ninguna orden</p><h3><br>
						<a href="<?php echo base_url()?>"><div class="btn btn-success">Haz tu primer pedido</div></a>
					</div>
					<?php endif;?>
					<div class="row">
						<div class="col-lg-12 text-right">
							<?php echo $orders_pagination?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>