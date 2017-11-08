<?php
	$titre='<h2>Diaporama <a href="index.php?page=AjouterSlider&id_langue='.$_GET['id_langue'].'" class="btn btn-default btn-sm">Ajouter une image</a></h2>';
	
	$contenu='
		<div class="notification-block">
			<?php echo $message ?>
		</div>
		<legend>Gestion des images du Diaporama</legend>
	';
	
	foreach($reponse_slider as $donnees_slider){
		
		$contenu.=
		'
			<div class="col-sm-3 col-md-3" id="'.$donnees_slider[3].'">
				<button type="button" class="btn btn-info btn-xs move-slide"><span class="glyphicon glyphicon-move"></span></button>
				<div class="thumbnail">
					<img src="../../img/slider/'.$donnees_slider[0].'" alt="'.$donnees_slider[0].'" style="width: 100%; height: 100px"/>
					<div class="caption">
						<p>
						<div class="btn-group">								
							<a href="index.php?page=EditerSlider&id_langue='.$_GET['id_langue'].'&id_slider='.$donnees_slider[3].'"<button type="button" class="btn btn-default edit-slide"><span class="glyphicon glyphicon-pencil"></span></button></a>
							<a href="index.php?page=SupprimerSlider&id_langue='.$_GET['id_langue'].'&id_slider='.$donnees_slider[3].'"><button type="button" class="btn btn-danger delete-slide" data-id="'.$donnees_slider[3].'"><span class="glyphicon glyphicon-trash"></span></button></a>
						</div>
						<input type="hidden" name="image" value="img/slider/"'.$donnees_slider[0].'"/>
						<input type="hidden" name="id" value="'.$donnees_slider[3].'"/>
		';
		
	
		if($donnees_slider[2] == 1){
		
			$contenu.='<span class="label label-success">Visible</span>';
		}else{
		
			$contenu.='<span class="label label-warning">Masquée</span>';
		}
		
		$contenu.='
						<input type="hidden" name="visible" value="'.$donnees_slider[2].'"/>
						<input type="hidden" name="ordre" value="'.$donnees_slider[1].'"/>
						</p>
					</div>
				</div>
			</div>
		';
	}
	
	$js=
	"
	";
	
	require_once "SqueletteAdmin.php";
?>