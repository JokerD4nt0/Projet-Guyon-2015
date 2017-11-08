<?php
	require_once "/../controleurs/CntIndex.php";
	
	$id = $_POST['id'];
	
	$bddLangue_Menu->id_menu = $id;
?>
<div id="block_dessin">
	<img src="img/menu/icon/<?php echo $donnees_menu[3] ?>"/><br/>
	<span><i>Château des lumières, château citoyen</i></span>
</div>
<div id="menu">
	<a href="">
		<div class="sous_menu">
			<?php echo $donnees_menu[2] ?>
		</div>
	</a>
</div>