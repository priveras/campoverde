<div class="row">
    <div class="col-lg-12" style="height:700px; background-image:url('assets/img/bg-2.png'); background-size:cover;">
        <div class="row" style="color:white">
            <br><br><br><br><br><br><br>
            <div class="col-lg-3"></div>
            <div class="col-lg-6 text-center">
                <div style="margin:0 auto;height:100px; width:100px; background-image:url('assets/img/CampoVerde.png'); background-size:cover;"></div>
                <h1 style="font-weight:200; font-size:70px;">Campo Verde</h1>
                <h2 style="font-weight:100; font-size:50px;">La mejor carne de res, pollo y cerdo directo a tu casa</h2>
            </div>
        </div>
        <br><br><br>
        <div class="row">
            <div class="col-lg-12 text-center">
                <a href="<?php echo base_url('cart/categories')?>" class="btn btn-lg transition ease" style="background-color:none; border:3px solid white; color:white; width:200px;">Hacer pedido</a>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('intro'); ?>
<br><br><br>
<div class="row font">
	<div class="col-lg-12 text-center">
		<h2 style="font-weight:100">En Campo Verde tenemos la mejor carne de res, pollo y cerdo y la mandamos directo a tu casa sin costo de envío.</h2>

	</div>
</div>
<br><br><br><br>
<div id="about">
<?php if(isset($this->categories[0])):?>

	<?php foreach($this->categories[0] as $cat_menu):?>
	<div class="col-lg-4">
		<a href="<?php echo base_url() . $cat_menu->slug ?>">
        <div class="col-lg-12 text-center transition ease" style="height:200px; border-radius:5px; margin-bottom:30px;background-image: url('<?php echo site_url('uploads/images/full/' . $cat_menu->image);?>'); background-size:cover">
            <br><br><br>
            <h1 style="color:white; font-weight:100;"><?php echo $cat_menu->name ?></h1>
		</div>
        </a>
	</div>
	<?php endforeach;?>
<?php endif;?>
</div>
<br><br><br><br>
<div class="row">
    <div class="col-lg-12 text-center">
        <h1 style="font-weight:200; font-size:50px;">¿Cómo funciona?</h1>
    </div>
</div>
<br><br><br>
<div class="row text-center font">
	<div class="col-lg-2"></div>
	<div class="col-lg-8">
		<div class="row">
			<div class="col-lg-4">
				<div class="row">
					<div class="col-lg-12">
						<h3>Haz tu pedido en línea</h3>
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
						<h3>Lo enviamos a tu domicilio</h3>
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
						<h3>Disfruta tus productos</h3>
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
<br><br><br>
<div class="jumbotron text-center intro-jumbotron" style="background-color:#00793E;">
	<h2 style="font-weight:100; color:white; margin-top:5px;">Tenemos más de 40 años en la cría y engorda de ganado (cerdo, res y pollo)</h2>
	<br/><br/><br/><br/>
</div>
<br>
<div class="container">
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 text-center">
			<div class="row">
				<div class="col-lg-4"></div>
				<div class="col-lg-4">
					<br>
					<p style="font-size:30px;"><i style="color:#666666"class="fa fa-cog fa-spin fa-5x"></i></p>
				</div>
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 text-center">
			<div class="row">
				<div class="col-lg-12 text-center">
					<h2 style="font-weight:200">Control de Calidad</h2>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-lg-2"></div>
				<div class="col-lg-8 text-justify">
					<p style="font-weight:200; font-size:17px;">El control de calidad, es muy sencillo, le pedimos a todos nuestros proveedores que el mismo producto que nos entreguen se lo den a sus hijos y familiares, con eso estamos conformes.</p>
				</div>
			</div>
		</div>
	</div>
    <hr>
    <div class="row">
    	<div class="col-lg-6 col-md-6 col-sm-6 text-center hidden-lg hidden-md hidden-sm">
    		<div class="row">
    			<div class="col-lg-4"></div>
    			<div class="col-lg-4">
    				<p style="font-size:30px;"><i style="color:#aaaaaa;" class="fa fa-barcode fa-5x"></i></p>
    			</div>
    		</div>
    	</div>
    	<div class="col-lg-6 col-md-6 col-sm-6 text-center">
    		<div class="row">
    			<div class="col-lg-12 text-center">
    				<h2 style="font-weight:200">Empaque</h2>
    			</div>
    		</div>
    		<br>
    		<div class="row">
    			<div class="col-lg-2"></div>
    			<div class="col-lg-8 text-justify">
    				<p style="font-weight:200; font-size:17px;">La carne se encuentra sellada al alto vacio desde nuestras instalaciones, el vendedor , repartidor nunca tiene contacto directo con la carne. esto nos da una mayor higiene, estandar de calidad, ya que contamos con personal altamente capacitado y eso lo refleja trabajar con pasion.</p>
    			</div>
    		</div>
    	</div>
    	<div class="col-lg-6 col-md-6 col-sm-6 text-center hidden-xs">
    		<div class="row">
    			<div class="col-lg-4"></div>
    			<div class="col-lg-4">
    				<br><br><br>
    				<p style="font-size:30px;"><i style="color:#aaaaaa;" class="fa fa-barcode fa-5x"></i></p>
    			</div>
    		</div>
    	</div>
    </div>
    <hr>
    <div class="row">
    	<div class="col-lg-6 col-md-6 col-sm-6 text-center">
        	<div class="row">
        		<div class="col-lg-2"></div>
        		<div class="col-lg-8">
        			<br><br>
        			<p style="font-size:30px;"><i style="color:#666555;" class="fa fa-motorcycle fa-5x"></i></p>
        		</div>
        	</div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 text-center">
        	<div class="row">
        		<div class="col-lg-12 text-center">
        			<h2 style="font-weight:200">Envío</h2>
        		</div>
        	</div>
        	<br>
        	<div class="row">
        		<div class="col-lg-2"></div>
        		<div class="col-lg-8 text-justify">
        			<p style="font-weight:200; font-size:17px;">Si el pedido es antes de las 4 pm se entrega en el mismo dia en menos de 4 horas, si el pedido lo realiza despues de las 4 pm lo entregamos en la mañana del dia siguiente. te llamamos a tu casa o tel personal para confirmar tu pedido</p>
        		</div>
        	</div>
        </div>
    </div>
    <br><br>
    <div class="jumbotron text-center intro-jumbotron" style="background-color:#00793E;">
    	<h2 style="font-weight:100; color:white; margin-top:5px;">Visitanos en nuestros puntos de venta</h2>
    	<br/><br/><br/><br/>
    </div>
    <br>
    <br>
    <div class="row">
    	<div class="col-lg-12 text-center">
            <div class="row">
                <div class="col-lg-3"></div>
                <div class="col-lg-6">
                    <div class="alert" style="background-color:#ff9500; color:white" role="alert">
                        Local comercial # 8 de Plaza Lídice , Heroes de Padierna número 132 col. San Jeronimo Lídice, Delegación Magdalena Contreras , CP 10200. Ciudad de México 
                    </div>
                </div>
            </div>
            <iframe width="600" height="450" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/search?q=Heroes%20de%20Padierna%20132%2C%20San%20Jer%C3%B3nimo%20L%C3%ADdice%2C%20Mexico%20City%2C%20Mexico&key=AIzaSyBD8NNoEVyhouBnCU5Exp_eKHK--eOay2Y" allowfullscreen></iframe>	
    	</div>
    </div>
    <br>
    <hr>
    <br>
    <br>
    <div class="row">
    	<div class="col-lg-1"></div>
    	<div class="col-lg-10 text-center">
    		<p class="lead">¿Tienes dudas?<br>Ponte en <span style="color:#ff9500">contacto</span> con nosotros</p>
    	</div>
    </div>
    <div class="row">
    	<div class="col-lg-3"></div>
    	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 text-center">
    		<div type="button" class="btn btn-default btn-circle btn-xl"><i class="fa fa-envelope-o" style="margin-top:12px;"></i></div>
            <p style="font-weight:200; margin-top:20px;">contacto@tucampoverde.com</p>
    	</div>
    	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 text-center">
    		<div type="button" class="btn btn-default btn-circle btn-xl"><i class="fa fa-phone" style="margin-top:12px;"></i></div>
            <p style="font-weight:200; margin-top:20px;">55 67 89 09</p>
    	</div>
    	<div class="col-lg-3"></div>
    	<!-- <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 text-center">
    		<a target="_blank" href="https://twitter.com/BeerhouseMex"type="button" class="btn btn-default btn-circle btn-xl"><i class="fa fa-twitter" style="margin-top:12px;"></i></a>
    	</div>
    	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 text-center">
    		<a target="_blank" href="https://www.facebook.com/beerhouseoficial"type="button" class="btn btn-default btn-circle btn-xl"><i class="fa fa-facebook" style="margin-top:12px;"></i></a>
    	</div> -->
    </div>    
  </div>




















