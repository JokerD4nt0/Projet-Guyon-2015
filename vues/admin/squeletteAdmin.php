<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="">

		<title>Château de La Roche-Guyon</title>

		<!-- Bootstrap core CSS -->
		<link href="css/bootstrap.css" rel="stylesheet">
		<link href="css/admin/layout.css" rel="stylesheet">
		<link href="css/ui-lightness/jquery-ui-1.10.3.custom.min.css" rel="stylesheet">
		<link href="css/colorpicker/colorpicker.css"  rel="stylesheet"/>
		
		<link href="../../css/bootstrap.css" rel="stylesheet">
		<link href="../../css/admin/layout.css" rel="stylesheet">
		<link href="../../css/ui-lightness/jquery-ui-1.10.3.custom.min.css" rel="stylesheet">
		<link href="../../css/colorpicker/colorpicker.css"  rel="stylesheet"/>
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
					<a class="navbar-brand" href="index.php?page=Administration&id_langue=<?php echo $_GET['id_langue'] ?>">Administration</a>
				</div>
				<div class="navbar-collapse collapse">
					<ul class="nav navbar-nav navbar-right">
						<li class="active">
							<a href="../admin/sessionDestroy.php">Déconnexion</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar" role="navigation">
				<div class="list-group">
					<!--<span href="#" class="list-group-item active">-->				
						<!--<form method="GET">
							<input type="hidden" name="page" value="Administration"/>
							<span>Langue :</span>
							<select name="id_langue">
								<?php
									foreach($reponse_langue as $index => $donnees_langue){								
										
								?>
								<option value="<?php echo $donnees_langue[0] ?>" <?php if($index == ($_GET['id_langue'] - 1)) echo "selected=\"\"" ?>><?php echo $donnees_langue[1] ?> </option>
								<?php		
									}
								?>
							</select>							
							<input type="submit" class="btn btn-default" value="Valider" href=""/>
						</form>-->
					</span>
					<a href="index.php?page=GestionSlider&id_langue=<?php echo $_GET['id_langue'] ?>" class="list-group-item">Diaporama</a>
					<a href="index.php?page=GestionNews&id_langue=<?php echo $_GET['id_langue'] ?>" class="list-group-item">Actualités</a>
					<a href="index.php?page=GestionMenu&id_langue=<?php echo $_GET['id_langue'] ?>" class="list-group-item">Menus et pages</a>
					<a href="index.php?page=GestionArticle&id_langue=<?php echo $_GET['id_langue'] ?>" class="list-group-item">Articles</a>
					<!--<a href="index.php?page=GestionLangue" class="list-group-item">Langues</a>-->
					<!--<a href="index.php?page=GestionUtilisateur" class="list-group-item">Utilisateurs</a>-->
				</div>
			</div>
			<div class="col-xs-12 col-sm-9">
				<?php echo $titre;?>
				<?php echo $contenu;?>
			</div>
		</div>
		<script src="../../js/jquery.js"></script>
		<script src="../../js/jquery-ui-1.10.3.custom.min.js"></script>
		<script src="../../js/bootstrap.min.js"></script>
		<script src="../../js/bootstrap.file-input.js"></script>
		<script src="../../js/metadata/jquery.metadata.js"></script>
		<script src="../../js/multifile/jquery.MultiFile.pack.js"></script>		
		<script src="../../js/colorpicker/colorpicker.js"></script>
		<script src="../../js/tinymce/tinymce.min.js"></script>
		
		<script src="js/jquery.js"></script>
		<script src="js/jquery-ui-1.10.3.custom.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/bootstrap.file-input.js"></script>
		<script src="js/metadata/jquery.metadata.js"></script>
		<script src="js/multifile/jquery.MultiFile.pack.js"></script>		
		<script src="js/colorpicker/colorpicker.js"></script>
		<script src="js/tinymce/tinymce.min.js"></script>
		<?php echo $js; ?>
	</body>
</html>