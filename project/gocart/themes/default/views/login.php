<?php $this->load->view('intro'); ?>
<div class="row font" style="margin-top:20px;">
	<div class="col-lg-12"> 
		<div class="row">
			<div class="col-lg-12 text-center">
				<div class="page-header">
					<h1>Iniciar Sesión</h1>
				</div>
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-lg-4"></div>
			<div class="col-lg-4">
				<?php echo form_open('secure/login'); ?>
					<div class="form-group">
						<label for="exampleInputEmail1">Email</label>
						<input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Tu email aquí">
					</div>
					<div class="form-group">
						<label for="exampleInputPassword1">Contraseña</label>
						<input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Tu contraseña aquí">
					</div>
					<div class="checkbox">
						<label>
							<input name="remember" value="true" type="checkbox"> Recordarme
						</label>
					</div>
					<button style="width:100%;" type="submit" name="submit" class="btn btn-success">Enviar</button>
					<input type="hidden" value="<?php echo $redirect; ?>" name="redirect"/>
					<input type="hidden" value="submitted" name="submitted"/>
				</form>
				<br>
				<div style="text-align:center; color:#cccccc">
					<a href="<?php echo site_url('secure/forgot_password'); ?>">Recuperar contraseña</a> | <a href="<?php echo site_url('secure/register'); ?>">Registrarse</a>
				</div>
			</div>
		</div>
	</div>
</div>