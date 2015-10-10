
<div class="row font">
	<!--<?php if(!empty($customer['bill_address'])):?>
	<div class="col-lg-3">

		<a href="<?php echo site_url('checkout/step_1');?>" class="btn btn-block">
		
			<?php if($customer['bill_address'] != @$customer['ship_address'])
			{
				echo lang('billing_address_button');
			}
			else
			{
				echo lang('address_button');
			}
			?>
		</a>
		<div class="panel panel-default">
			<div class="panel-heading">Panel heading without title</div>
			<div class="panel-body">
				<p><?php echo format_address($customer['bill_address'], true);?></p>
				<p>
					<?php echo $customer['bill_address']['phone'];?><br/>
					<?php echo $customer['bill_address']['email'];?>
				</p>
				
			</div>
		</div>
	</div>
	<?php endif;?>-->


<?php if(config_item('require_shipping')):?>
	<?php if($this->go_cart->requires_shipping()):?>
		<div class="col-lg-3">
			<div class="panel panel-default">
				<div class="panel-heading">Dirección de Envío
					<span class="pull-right" style="margin-top:-7.5px;">
						<a href="<?php echo site_url('checkout/shipping_address');?>" class="btn btn-block">Cambiar</a>
					</span></div>
				<div class="panel-body">
					<p><?php echo format_address($customer['ship_address'], true);?></p>
					<p>
						<?php echo $customer['ship_address']['phone'];?><br/>
						<?php echo $customer['ship_address']['email'];?>
					</p>
				</div>
			</div>
		</div>

		<?php
		
		if(!empty($shipping_method) && !empty($shipping_method['method'])):?>
		<div class="col-lg-3">
			<p><a href="<?php echo site_url('checkout/step_2');?>" class="btn btn-block"><?php echo lang('shipping_method_button');?></a></p>
			<strong><?php echo lang('shipping_method');?></strong><br/>
			<?php echo $shipping_method['method'].': '.format_currency($shipping_method['price']);?>
		</div>
		<?php endif;?>
	<?php endif;?>
<?php endif;?>

<?php if(!empty($payment_method)):?>
	<div class="col-lg-3">
		<p><a href="<?php echo site_url('checkout/step_3');?>" class="btn btn-block"><?php echo lang('billing_method_button');?></a></p>
		<?php echo $payment_method['description'];?>
	</div>
<?php endif;?>
	<div class="col-lg-3">
		<div class="panel panel-default" style="min-width:270px;">
			<div class="panel-heading">Método de Pago</div>
			<div class="panel-body">
				<p>El pago se hace en el momento de la entrega.</p>
				<p>
					Efectivo - Tarjeta de Débito/Crédito
					<img style="width:100px; margin-top:17px;"src="https://mailchimp.organicweb.com.au/wp-content/uploads/2015/08/Visa-MasterCard-amex.jpeg">
				</p>
			</div>
		</div>
	</div>
</div>
