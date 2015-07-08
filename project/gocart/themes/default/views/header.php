<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title><?php echo (!empty($seo_title)) ? $seo_title .' - ' : ''; echo $this->config->item('company_name'); ?></title>


<?php if(isset($meta)):?>
	<?php echo $meta;?>
<?php else:?>
<meta name="Keywords" content="Shopping Cart, eCommerce, Code Igniter">
<meta name="Description" content="Go Cart is an open source shopping cart built on the Code Igniter framework">
<?php endif;?>

<?php echo theme_css('styles.css', true);?>
<?php echo theme_css('full-width-pics.css', true);?>
<?php echo theme_js('squard.js', true);?>
<?php echo theme_js('equal_heights.js', true);?>

<!-- Font Awesome -->

<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

<!-- Google Fonts -->

<link href='http://fonts.googleapis.com/css?family=Raleway:400,700,200' rel='stylesheet' type='text/css'>

<!-- JQuery -->

<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>

<!-- Latest compiled and minified CSS -->
<?php echo theme_css('bootstrap.min.css', true);?>

<!-- Optional theme -->
<?php echo theme_css('bootstrap-theme.min.css', true);?>

<!-- Latest compiled and minified JavaScript -->
<?php echo theme_js('bootstrap.min.js', true);?>

<?php
//with this I can put header data in the header instead of in the body.
if(isset($additional_header_info))
{
	echo $additional_header_info;
}

?>
</head>

<body>
	<nav class="navbar navbar-fixed-top navbar-custom">
		<div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="<?php echo base_url()?>"><?php echo $this->config->item('company_name');?></a>
			</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<?php if(isset($this->categories[0])):?>
						<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Productos <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<?php foreach($this->categories[0] as $cat_menu):?>
									<li <?php echo $cat_menu->active ? 'class="active"' : false; ?>><a href="<?php echo site_url($cat_menu->slug);?>"><?php echo $cat_menu->name;?></a></li>
								<?php endforeach;?>
							</ul>
						</li>	
					<?php endif;

					if(isset($this->pages[0]))
					{
						foreach($this->pages[0] as $menu_page):?>
						<li>
							<?php if(empty($menu_page->content)):?>
								<a href="<?php echo $menu_page->url;?>" <?php if($menu_page->new_window ==1){echo 'target="_blank"';} ?>><?php echo $menu_page->menu_title;?></a>
							<?php else:?>
								<a href="<?php echo site_url($menu_page->slug);?>"><?php echo $menu_page->menu_title;?></a>
							<?php endif;?>
						</li>				
						<?php endforeach;	
					}
					?>
				</ul>
				<!-- <form class="navbar-form navbar-left" role="search">
					<div class="form-group">
						<input type="text" class="form-control" placeholder="Buscar">
					</div>
					<button type="submit" class="btn btn-default">Buscar</button>
				</form> -->
				<ul class="nav navbar-nav navbar-right">
					<?php if($this->Customer_model->is_logged_in(false, false)):?>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Mi Cuenta <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="<?php echo  site_url('secure/my_account');?>">Datos</li>
							<!-- <li><a href="<?php echo  site_url('secure/my_downloads');?>"><?php echo lang('my_downloads')?></a></li> -->
							<li class="divider"></li>
							<li><a href="<?php echo site_url('secure/logout');?>">Cerrar Sesión</a></li>
						</ul>
					</li>
					<?php else: ?>
					<li><a href="<?php echo site_url('secure/login');?>"><?php echo lang('login');?></a></li>
					<?php endif; ?>
					<li>
						<a href="<?php echo site_url('cart/view_cart');?>">
							<?php
							if ($this->go_cart->total_items()==0)
							{
								echo '<i class="fa fa-shopping-cart fa-lg"></i>';
							}
							else
							{
								if($this->go_cart->total_items() > 1)
								{
									echo '<i class="fa fa-shopping-cart fa-lg"></i> ' .$this->go_cart->total_items();
								}
								else
								{
									echo '<i class="fa fa-shopping-cart fa-lg"></i> ' .$this->go_cart->total_items();
								}
							}
							?>
						</a>
					</li>
				</ul>
			</div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
	</nav>