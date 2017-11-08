<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="">

		<title>Château de la roche Guyon : Interface d'administration</title>

		<!-- Bootstrap core CSS -->
		<link href="<?php echo BASE_URL ?>css/bootstrap.css" rel="stylesheet">
		<link href="<?php echo BASE_URL ?>css/admin/layout.css" rel="stylesheet">
		<link href="<?php echo BASE_URL ?>css/ui-lightness/jquery-ui-1.10.3.custom.min.css" rel="stylesheet">
		<link href="<?php echo BASE_URL ?>css/colorpicker/colorpicker.css"  rel="stylesheet"/>

		<!-- Just for debugging purposes. Don't actually copy this line! -->
		<!--[if lt IE 9]>
			<script src="../../docs-assets/js/ie8-responsive-file-warning.js"></script>
		<![endif]-->

		
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
			<div class="container">
				<div class="navbar-header">					
					<a class="navbar-brand" href="#">Administration</a>
				</div>
				<div class="navbar-collapse collapse">
					<ul class="nav navbar-nav navbar-right">
						<li class="active">
							<a href="../">Déconnexion</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar" role="navigation">
				<div class="list-group">
					<a href="#" class="list-group-item active"></a>
					<a href="<?php echo BASE_URL ?>administration/slider/" class="list-group-item">Gestion du diaporama</a>
					<a href="<?php echo BASE_URL ?>administration/menus/" class="list-group-item">Gestion des rubriques</a>
					<a href="<?php echo BASE_URL ?>administration/news/" class="list-group-item">Gestion des actualités</a>
					<a href="<?php echo BASE_URL ?>administration/articles/" class="list-group-item">Gestion des articles</a>
				</div>
			</div>
			<div class="col-xs-12 col-sm-9">
				<?php echo $content;?>
			</div>
		</div>
		<script src="<?php echo BASE_URL ?>js/jquery.js"></script>
		<script src="<?php echo BASE_URL ?>js/jquery-ui-1.10.3.custom.min.js"></script>
		<script src="<?php echo BASE_URL ?>js/bootstrap.min.js"></script>
		<script src="<?php echo BASE_URL ?>js/bootstrap.file-input.js"></script>
		<script src="<?php echo BASE_URL ?>js/metadata/jquery.metadata.js"></script>
		<script src="<?php echo BASE_URL ?>js/multifile/jquery.MultiFile.pack.js"></script>		
		<script src="<?php echo BASE_URL ?>js/colorpicker/colorpicker.js"></script>
		<script src="<?php echo BASE_URL ?>js/tinymce/tinymce.min.js"></script>
		<?php echo $js;?>
	</body>	
</html>