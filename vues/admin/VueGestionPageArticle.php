<?php
	$titre='<h2>Lier un article à une page</h2>';
	
	$contenu='
		<div class="notification-block">
			<?php echo $message ?>
		</div>
		<hr />
		
		<div class="table-responsive">
			<form method="POST" enctype=\'multipart/form-data\'>
			<div class="form-group">
				<label>Choix de la page</label>
				<select name="id_page">
	';
	
	foreach($reponse_page as $donnees_page){
	
		$contenu.='
			<option value="'.$donnees_page[0].'">'.$donnees_page[1].'</option>
		';
	}
	
	$contenu.='
		</select>
	</div>
	<div class="form-group">
		<label>Choix de l\'article</label>
		<select name="id_article">
	';
	
	foreach($reponse_article as $donnees_article){
	
		$contenu.='
			<option value="'.$donnees_article[0].'">'.$donnees_article[4].'</option>
		';
	}
	
	$contenu.='
			</select>
		</div>
		<div class="form-group">
			<label>Position de l\'article dans la page</label>
			<select name="ordre">
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
				<option value="6">6</option>
				<option value="7">7</option>
				<option value="8">8</option>
				<option value="9">9</option>
				<option value="10">10</option>
				<option value="11">12</option>
				<option value="13">13</option>
				<option value="14">14</option>
				<option value="15">15</option>
				<option value="16">16</option>
				<option value="17">17</option>
				<option value="18">18</option>
				<option value="19">19</option>
				<option value="20">20</option>
				<option value="21">21</option>
				<option value="22">22</option>
				<option value="23">23</option>
				<option value="24">24</option>
				<option value="25">25</option>
				<option value="26">26</option>
				<option value="27">27</option>
				<option value="28">28</option>
				<option value="29">29</option>
				<option value="30">30</option>
				<option value="31">31</option>
				<option value="33">33</option>
				<option value="34">34</option>
				<option value="35">35</option>
				<option value="36">36</option>
				<option value="37">37</option>
				<option value="38">38</option>
				<option value="39">39</option>
				<option value="40">40</option>
			</select>
		</div>
		<input type="submit" class="btn btn-default" value="Ajouter un lien" />
		<a href="index.php?page=GestionArticle&id_langue='.$_GET['id_langue'].'" class="btn btn-primary">Retour</a>
	</form>
	<br/>
	<label>Liste des liens existants</label>
			<table class="table table-condensed table-hover table-bordered table-striped">
				<thead>
					<tr>
						<th>#</th>
						<th>Titre de la page</th>
						<th>Titre de l\'article</th>
						<th>Position de l\'article dans la page</th>
						<th>Option</th>
					</tr>		
				</thead>
				<tbody class="sortable">
	';
	
	foreach($reponse_pa as $donnees_pa){
	
		$contenu.='
						<tr>
							<td><button type="button" class="btn btn-info btn-xs move-menu"><span class="glyphicon glyphicon-move"></span></button></td>
							<td>'.$donnees_pa[2].'</td>
							<td>'.$donnees_pa[3].'</td>
							<td>'.$donnees_pa[4].'</td>
							<td>
								<div class="btn-group">
									<a href="index.php?page=EditerPageArticle&id_langue='.$_GET['id_langue'].'&id_lien='.$donnees_pa[5].'" class="btn btn-default btn-sm edit-menus"><span class="glyphicon glyphicon-pencil"></span></a>
									<a href="index.php?page=SupprimerPageArticle&id_langue='.$_GET['id_langue'].'&id_lien='.$donnees_pa[5].'"><button type="button" class="btn btn-danger btn-sm delete-page_article" data-id=""><span class="glyphicon glyphicon-trash"></span></button>
								</div>
							</td>
						</tr>
		';
	}
	
	$contenu.='
				</tbody>
			</table>
		</div>
	<br/>
	';
	
	if(isset($_POST['id_page']) && isset($_POST['id_article']) && isset($_POST['ordre'])){
	
		$titre.='<br/><strong>Le lien a été enregistré !</strong>';
	}
	
	$js='';
	
	require_once 'squeletteAdmin.php';
?>