<?php
	require_once "/../../modeles/ModLangue_Menu.php";
	require_once "/../../modeles/ModLangue_Page.php";
	
	$id_menu = $_GET['id'];
	
	try{
	
		$bddLangue_Menu = new Langue_Menu;
		$bddLangue_Menu->id_langue = 1;
		$bddLangue_Menu->id_menu = $id_menu;
		// $bddLangue_Menu->id_menu = $_POST['id'];
		$reponse_menu = $bddLangue_Menu->recupererLangue_Menu();
		
		$bddLangue_Page = new Langue_Page;
		$bddLangue_Page->id_langue = 1;
		$bddLangue_Page->id_menu = $id_menu;
		// $bddLangue_Page->id_menu = $_POST['id'];
		$reponse_page = $bddLangue_Page->listerLangue_Page();
	}catch(Exception $e){
	
		echo "Erreur :" .$e->getMessage();
	}
	
?>
<div id="block_dessin">
	<?php
	foreach($reponse_menu as $donnees_menu)
	if($donnees_menu[0] == 3){
	?>
		<br/><div id="menu_calendar"></div>
	<?php
	}else if($donnees_menu[3] != "" ){
	?>
	<img src="img/menu/icon/<?php foreach($reponse_menu as $donnees_menu){ echo $donnees_menu[3]; }?>"/><br/>
	<?php
	}
	?>
	<span><i>Château des lumières, château citoyen</i></span>
</div>
<div id="menu">
	<?php foreach($reponse_page as $donnees_page){ ?>
	<a href="index.php?page=Page&id_page=<?php echo $donnees_page[0]; ?>&id_langue=<?php echo $donnees_page[1]; ?>&id_menu=<?php echo $donnees_menu[0]; ?>">
	<div class="sous_menu">
		<?php echo $donnees_page[3]; ?>
		<br/>
	</div>
	</a>
	<?php } ?>
</div>
<script type="text/javascript">
	menu_color("#<?php foreach($reponse_menu as $donnees_menu){ echo $donnees_menu[5]; }?>", "#<?php foreach($reponse_menu as $donnees_menu){ echo $donnees_menu[0]; }?>");
</script>