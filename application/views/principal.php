<!DOCTYPE html>
<html>
	<head>
	<title>FacturaCorp</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="apple-mobile-web-app-capable" content="yes" />
	<meta name="description" content="">
	<meta name="keywords" content="admin, bootstrap,admin template, bootstrap admin, simple, awesome">
	<meta name="author" content="">

	<!-- Bootstrap -->
	<link href="<?php echo base_url('css/bootstrap.min.css'); ?>" rel="stylesheet" />
        <link href="<?php echo base_url('third/font-awesome/css/font-awesome.min.css'); ?>" rel="stylesheet" />
        <link href="<?php echo base_url('css/style.css'); ?>" rel="stylesheet" />
        <link href="<?php echo base_url('css/style-responsive.css'); ?>" rel="stylesheet" />
        <link href="<?php echo base_url('css/animate.css'); ?>" rel="stylesheet" />
        <link href="<?php echo base_url('third/morris/morris.css'); ?>" rel="stylesheet" />
        <link href="<?php echo base_url('third/nifty-modal/css/component.css'); ?>" rel="stylesheet" />
        <link href="<?php echo base_url('third/sortable/sortable-theme-bootstrap.css'); ?>" rel="stylesheet" /> 
        <link href="<?php echo base_url('third/icheck/skins/minimal/grey.css'); ?>" rel="stylesheet" /> 
        <link href="<?php echo base_url('third/select/bootstrap-select.min.css'); ?>" rel="stylesheet" /> 
        <link href="<?php echo base_url('third/summernote/summernote.css'); ?>"  rel="stylesheet" />
        <link href="<?php echo base_url('third/magnific-popup/magnific-popup.css'); ?>" rel="stylesheet" /> 
        <link href="<?php echo base_url('third/pace/pace-theme-minimal.css'); ?>" rel="stylesheet" />
        <link href="<?php echo base_url('third/datepicker/css/datepicker.css'); ?>"/>
        <link href="<?php echo base_url('css/visual.css'); ?>" rel="stylesheet" />
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
	<![endif]-->
	<link rel="shortcut icon" href="assets/img/favicon.ico">
	</head>
	<body class="tooltips">
            <input type="hidden" id="url_base" value="<?php echo base_url(); ?>" />
	
	<!-- Begin page -->
	<div class="container">
	
	<!-- Modal Dialog -->
	
	<!-- Modal Logout Primary -->
	<div class="md-modal md-fall" id="logout-modal">
		<div class="md-content">
			<h3><strong>Confirmar</strong> salida</h3>
			<div>
				<p class="text-center">¿Esta seguro de querer salir del sistema?</p>
				<p class="text-center">
				<button class="btn btn-danger md-close">No</button>
				<a href="<?php echo base_url('usuario/salir'); ?>" class="btn btn-success md-close">Si</a>
				</p>
			</div>
		</div>
	</div>
	
	<!-- Modal Logout Alternatif -->
	<div class="md-modal md-just-me" id="logout-modal-alt">
		<div class="md-content">
			<h3><strong>Confirmar</strong> salida</h3>
			<div>
				<p class="text-center">¿Esta seguro de querer salir del sistema?</p>
				<p class="text-center">
				<button class="btn btn-danger md-close">No</button>
				<a href="<?php echo base_url('usuario/salir'); ?>" class="btn btn-success md-close">Si</a>
				</p>
			</div>
		</div>
	</div>
	
	<!-- Modal Task Progress -->	
	<div class="md-modal md-slide-stick-top" id="task-progress">
		<div class="md-content">
			<h3><strong>Task Progress</strong> Information</h3>
			<div>
				<p>CLEANING BUGS</p>
				<div class="progress progress-xs for-modal">
				  <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
					<span class="sr-only">80&#37; Complete</span>
				  </div>
				</div>
				<p>POSTING SOME STUFF</p>
				<div class="progress progress-xs for-modal">
				  <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 65%">
					<span class="sr-only">65&#37; Complete</span>
				  </div>
				</div>
				<p>BACKUP DATA FROM SERVER</p>
				<div class="progress progress-xs for-modal">
				  <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 95%">
					<span class="sr-only">95&#37; Complete</span>
				  </div>
				</div>
				<p>RE-DESIGNING WEB APPLICATION</p>
				<div class="progress progress-xs for-modal">
				  <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
					<span class="sr-only">100&#37; Complete</span>
				  </div>
				</div>
				<p class="text-center">
				<button class="btn btn-danger btn-sm md-close">Close</button>
				</p>
			</div>
		</div>
	</div>
		
		
		<!-- Start sidebar menu -->
		<div class="left side-menu">
            <div class="header sidebar rows">
				<div class="logo animated bounceIn">
                                    <h1><a href=""><img src="<?php echo base_url('img/logo.png'); ?>" alt="Logo"> FacturaCorp</a></h1>
				</div>
            </div>
            <div class="body rows scroll-y animated fadeInLeftBig">
                <div class="sidebar-inner slimscroller">
					<div class="media">
					  <a class="pull-left" href="#">
						<img class="media-object img-circle" src="<?php echo base_url('assets/img/avatar/axel.jpg');?>" alt="Avatar">
					  </a>
					  <div class="media-body">
					  Bienvenido,
						<h4 class="media-heading"><strong><?php echo $nombre_completo; ?></strong></h4>
						<a href="user-profile.html">Editar</a>
						<a class="md-trigger" data-modal="logout-modal-alt">Salir</a>
					  </div>
					</div>				
                                
				<?php echo $menu; ?>
				</div>
            </div>
            <div class="footer rows animated fadeInUpBig">
				<div class="progress progress-xs progress-striped active">
				  <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
					<span class="progress-precentage">80&#37;</span>
				  </div>
				  
				  <a data-toggle="tooltip" title="See task progress" class="btn btn-default md-trigger" data-modal="task-progress"><i class="fa fa-inbox"></i></a>
				</div>
            </div>
        </div>
		<!-- End of sidebar menu -->
		
		
		
		<!-- Start right content -->
        <div class="right content-page">
            <div class="header content rows-content-header">
			
			<!-- Button mobile view to collapse sidebar menu -->
			<button class="button-menu-mobile show-sidebar">
				<i class="fa fa-bars"></i>
			</button>
			
             <div class="navbar navbar-default" role="navigation">
				  <div class="container">
					<div class="navbar-header">
					  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<i class="fa fa-angle-double-down"></i>
					  </button>
					</div>
					<div class="navbar-collapse collapse">
					
					  <ul class="nav navbar-nav">
						<li><a><i class="fa fa-cog"></i></a></li>
						<li class="dropdown">
						  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Español (ES) <i class="fa fa-chevron-down i-xs"></i></a>
						  <ul class="dropdown-menu animated half flipInX">
							<li><a href="#">English (British)</a></li>
						  </ul>
						</li>
					  </ul>
					  
					  <ul class="nav navbar-nav navbar-right top-navbar">
						<li class="dropdown">
						  <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i><span class="label label-danger absolute animated double shake">24</span></a>
						  <ul class="dropdown-menu dropdown-message animated half flipInX">
							<li class="dropdown-header notif-header">New Notifications</li>
							<li class="divider"></li>
								<li class="unread">
									<a href="#">
									<p><strong>John Doe</strong> Uploaded a photo <strong>&#34;DSC000254.jpg&#34;</strong>
									<br /><i>2 minutes ago</i></p>
									</a>
								</li>
								<li class="unread">
									<a href="#">
									<p><strong>John Doe</strong> Created an photo album  <strong>&#34;Indonesia Tourism&#34;</strong>
									<br /><i>8 minutes ago</i></p>
									</a>
								</li>
								<li>
									<a href="#">
									<p><strong>Annisa</strong> Posted an article  <strong>&#34;Yogyakarta never ending Asia&#34;</strong>
									<br /><i>an hour ago</i></p>
									</a>
								</li>
								<li>
									<a href="#">
									<p><strong>Ari Rusmanto</strong> Added 3 products
									<br /><i>3 hours ago</i></p>
									</a>
								</li>
								<li>
									<a href="#">
									<p><strong>Hana Sartika</strong> Send you a message  <strong>&#34;Lorem ipsum dolor...&#34;</strong>
									<br /><i>12 hours ago</i></p>
									</a>
								</li>
								<li>
									<a href="#">
									<p><strong>Johnny Depp</strong> Updated his avatar
									<br /><i>Yesterday</i></p>
									</a>
								</li>
							<li class="dropdown-footer"><a href=""><i class="fa fa-refresh"></i> Refresh</a></li>
						  </ul>
						</li>
						<li class="dropdown">
						  <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i><span class="label label-danger absolute animated double shake">24</span></a>
						  <ul class="dropdown-menu dropdown-message animated half flipInX">
							<li class="dropdown-header notif-header">New Messages</li>
							<li class="divider"></li>
								<li class="unread">
									<a href="#">
									<img src="<?php echo base_url('assets/img/avatar/2.jpg');?>" class="xs-avatar ava-dropdown" alt="Avatar">
									<strong>John Doe</strong><br />
									<p>Duis autem vel eum iriure dolor in hendrerit ...</p>
									<p><i>5 minutes ago</i></p>
									</a>
								</li>
								<li class="unread">
									<a href="#">
									<img src="<?php echo base_url('assets/img/avatar/1.jpg');?>" class="xs-avatar ava-dropdown" alt="Avatar">
									<strong>Annisa Rusmanovski</strong><br />
									<p>Duis autem vel eum iriure dolor in hendrerit ...</p>
									<p><i>2 hours ago</i></p>
									</a>
								</li>
								<li>
									<a href="#">
									<img src="<?php echo base_url('assets/img/avatar/3.jpg');?>" class="xs-avatar ava-dropdown" alt="Avatar">
									<strong>Ari Rusmanto</strong><br />
									<p>Duis autem vel eum iriure dolor in hendrerit ...</p>
									<p><i>5 hours ago</i></p>
									</a>
								</li>
							<li class="dropdown-footer"><a href=""><i class="fa fa-share"></i> See all messages</a></li>
						  </ul>
						</li>
						<li class="dropdown">
						  <a href="#" class="dropdown-toggle" data-toggle="dropdown"><strong>Principal</strong> <i class="fa fa-chevron-down i-xs"></i></a>
						  <ul class="dropdown-menu animated half flipInX">
							<li><a href="#">Perfil</a></li>
							<li><a href="#">Cambiar contraseña</a></li>
							<li><a href="#">Cuenta</a></li>
							<li class="divider"></li>
							<li class="dropdown-header">Ayuda</li>
							<li><a href="#">Documentación</a></li>							
							<li><a class="md-trigger" data-modal="logout-modal">Salir</a></li>
						  </ul>
						</li>
					  </ul>
					</div><!--/.nav-collapse -->
                                        
				  </div>
				</div>
            </div>
			
			
			
			<!-- ============================================================== -->
			<!-- Start Content here -->
			<!-- ============================================================== -->
            <div class="body content rows scroll-y">
				
				<!-- Page header -->
				<div class="page-heading animated fadeInDownBig">
					<h1>Tables <small>lorem ipsum dolor</small></h1>
				</div>
				<!-- End page header -->
				<div class="alert alert-danger alert-dismissable hidden MC_mensajes">
                                    <button class="close" aria-hidden="true" data-dismiss="alert" type="button"></button>
                                    <div class="MC_mensaje">
                                    </div>
                                </div>	
				
				<!-- Your awesome content goes here -->				
				<?php
                                echo $principal;
                                
                                echo $listado;
                                ?>
				
				<!-- End of your awesome content -->
			
				<footer>
				&copy; <?php echo date('Y'); ?> <a href="">FacturaCorp</a>. Desarrollado por  <a target="_black" href="http://www.medioscorp.com"><img src="http://www.medioscorp.com/firmamc.png" valign="middle" /></a>
                                <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
				</footer>
			
            </div>
			<!-- ============================================================== -->
			<!-- End content here -->
			<!-- ============================================================== -->
			
			
			
			
        </div>
		<!-- End right content -->
		
		
		
		
		
		<!-- the overlay modal element -->
		<div class="md-overlay"></div>
		<!-- End of eoverlay modal -->
		
		
		
	</div>
	<!-- End of page -->

		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="<?php echo base_url('js/jQuery.js'); ?>"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="<?php echo base_url('js/bootstrap.min.js'); ?>"></script>
		<script src="<?php echo base_url('third/knob/jquery.knob.js'); ?>"></script>
		<script src="<?php echo base_url('third/slimscroll/jquery.slimscroll.min.js'); ?>"></script>
		<script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
		<script src="<?php echo base_url('third/morris/morris.js'); ?>"></script>
		<script src="<?php echo base_url('third/nifty-modal/js/classie.js'); ?>"></script>
		<script src="<?php echo base_url('third/nifty-modal/js/modalEffects.js'); ?>"></script>
		<script src="<?php echo base_url('third/sortable/sortable.min.js'); ?>"></script>
		<script src="<?php echo base_url('third/select/bootstrap-select.min.js'); ?>"></script>
		<script src="<?php echo base_url('third/summernote/summernote.js'); ?>"></script>
		<script src="<?php echo base_url('third/magnific-popup/jquery.magnific-popup.min.js'); ?>"></script> 
		<script src="<?php echo base_url('third/pace/pace.min.js'); ?>"></script>
		<script src="<?php echo base_url('third/input/bootstrap.file-input.js'); ?>"></script>
		<script src="<?php echo base_url('third/datepicker/js/bootstrap-datepicker.js'); ?>"></script>
		<script src="<?php echo base_url('third/icheck/icheck.min.js'); ?>"></script>		
		<script src="<?php echo base_url('third/wizard/jquery.easyWizard.js'); ?>"></script>
		<script src="<?php echo base_url('third/wizard/scripts.js'); ?>"></script>
		<script src="<?php echo base_url('js/lanceng.js'); ?>"></script>
                <!--------------------------[ PROPIOS ]-------------------------------->
                <script src="<?php echo base_url('js/principal.js'); ?>" charset="utf-8"></script>

	</body>
</html>