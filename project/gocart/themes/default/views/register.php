<?php $this->load->view('intro'); ?>
<?php
$company	= array('id'=>'bill_company', 'class'=>'form-control', 'placeholder' => 'ej: Campo Verde', 'name'=>'company', 'value'=> set_value('company'));
$first		= array('id'=>'bill_firstname', 'class'=>'form-control', 'placeholder' => 'ej: Miguel', 'name'=>'firstname', 'value'=> set_value('firstname'));
$last		= array('id'=>'bill_lastname', 'class'=>'form-control', 'placeholder' => 'ej: Gonzales', 'name'=>'lastname', 'value'=> set_value('lastname'));
$email		= array('id'=>'bill_email', 'class'=>'form-control', 'placeholder' => 'ej: miguel@email.com', 'name'=>'email', 'value'=>set_value('email'));
$phone		= array('id'=>'bill_phone', 'class'=>'form-control', 'placeholder' => 'ej: 5545566776', 'name'=>'phone', 'value'=> set_value('phone'));
?>

<div class="row font" style="margin-top:20px;">
	<div class="col-lg-12"> 
		<div class="row">
			<div class="col-lg-12 text-center">
				<div class="page-header">
					<h1>Registrarse</h1>
				</div>
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-lg-4"></div>
			<div class="col-lg-4">
				<?php echo form_open('secure/register'); ?>
				<input type="hidden" name="submitted" value="submitted" />
				<input type="hidden" name="redirect" value="<?php echo $redirect; ?>" />
					<!-- <div class="form-group">
						<label for="exampleInputEmail1">Compañía</label>
						<?php echo form_input($company);?>
					</div> -->
					<div class="form-group">
						<label for="exampleInputPassword1">Nombre</label>
						<?php echo form_input($first);?>
					</div>
					<div class="form-group">
						<label for="exampleInputPassword1">Apellido</label>
						<?php echo form_input($last);?>
					</div>
					<div class="form-group">
						<label for="exampleInputPassword1">Email</label>
						<?php echo form_input($email);?>
					</div>
					<div class="form-group">
						<label for="exampleInputPassword1">Teléfono</label>
						<?php echo form_input($phone);?>
					</div>
					<div class="form-group">
						<label for="exampleInputPassword1">Contraseña</label>
						<input type="password" name="password" value="" class="form-control" autocomplete="off" placeholder="Nueva contraseña"/>
					</div>
					<div class="form-group">
						<label for="exampleInputPassword1">Confirmar Contraseña</label>
						<input type="password" name="confirm" value="" class="form-control" autocomplete="off" placeholder="Confirmar contraseña" />
					</div>
					<div class="checkbox">
						<label>
							<input type="checkbox" name="email_subscribe" value="1" <?php echo set_radio('email_subscribe', '1', TRUE); ?>/> Quiero recibir ofertas
						</label>
					</div>
					<input style ="width:100%" type="submit" value="Enviar" class="btn btn-success" />
				</form>
				<br>
				<div style="text-align:center; color:#cccccc">
					<a href="<?php echo site_url('secure/login'); ?>">Regresar para iniciar sesión</a>
				</div>
			</div>
		</div>
	</div>
</div>