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

            <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
            <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
            <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
            <![endif]-->
            <link rel="shortcut icon" href="<?php echo base_url('img/favicon.ico'); ?>">
	</head>
	<body class="tooltips full-content">
	<input type="hidden" id="url_base" value="<?php echo $base_url; ?>" />
	<!-- Begin page -->
	<div class="container">
		<div class="full-content-center animated fadeInDownBig">
			<a href=""><img src="<?php echo base_url(); ?>img/logo_facturacorp.png" class="" alt="Logo"></a>
			<div class="login-wrap">
				<div class="box-info">
                                    <h2 class="text-center">Formulario para <strong>Entrar</strong></h2>

                                    <form id="mc_autentificarse" class="formulario" accept-charset="utf-8" method="post" role="form" action="<?php echo base_url('usuario/login'); ?>">
                                        <div class="form-group login-input">
                                            <i class="fa fa-sign-in overlay"></i>
                                            <input type="text" name="usuario" id="usuario" class="form-control text-input requerido" placeholder="Usuario">
                                        </div>
                                        <div class="form-group login-input">
                                            <i class="fa fa-key overlay"></i>
                                            <input type="password" name="password" id="password" class="form-control text-input requerido" placeholder="Contraseña">
                                        </div>					

                                        <div class="row">
                                            <div class="col-sm-12">
                                                <button id="MC_login" type="submit" class="btn btn-info btn-block btn_login"><i class="fa fa-unlock"></i>Entrar</button>
                                            </div>							
                                        </div>
                                        
                                        <div class="alert alert-danger alert-dismissable hidden MC_mensajes">
                                            <button class="close" aria-hidden="true" data-dismiss="alert" type="button"></button>
                                            <div class="MC_mensaje">
                                                
                                            </div>
                                        </div>
                                    </form>										
				</div>				
			</div>
			
		</div>
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
                <script src="<?php echo base_url('js/login.js'); ?>" charset="utf-8"></script>
	</body>
</html>