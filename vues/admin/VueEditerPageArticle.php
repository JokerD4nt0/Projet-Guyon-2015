<?php
	$titre='<h2>Modification d\'un lien</h2>';
	
	$contenu='
		<div class="notification-block">
		<?php echo $message; ?>
	</div>
	<hr />
	<form method="POST">
		<div class="form-group">
			<label>Position de l\'article dans la page</label>
			<p class="help-block">
				<em>Position actuelle :</em>
		';
		
		foreach($reponse_pa as $donnees_pa){
			
			$contenu.=''.$donnees_pa[2].'';
		}
		
		$contenu.='</p>
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
		<input type="submit" class="btn btn-default" value="Modifier" />
		<a href="index.php?page=GestionPageArticle&id_langue='.$_GET['id_langue'].'" class="btn btn-primary">Retour</a>
	</form>
	<br/>
	';
	
	if(isset($_POST['ordre'])){
		
		$titre.='<br/><strong>Le lien a été correctement modifié !</strong>';
	}
	
	$js='';
	
	require_once 'squeletteAdmin.php';
?>