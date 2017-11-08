<?php
	ob_start();

	require_once "../config.inc.php";
	
	$oTOOLS = TOOLS::getInstance();
	$oMENU = new MENU;	
	$message = null;
	
	if(isset($_GET["action"])){
		if($_GET["action"] == "reorder"){
			$i = 1;
			foreach($_POST["ids"] as $id){
				$menu = new MENU;
				$menu->id = $id;
				$menu->get();
				$menu->ordre = $i;
				$menu->update();
				unset($menu);
				$i++;
			}
			die();				
		}
	}
	
	$menus = $oMENU->find("menu_parent is null order by ordre")->Objets();	
?>
<h1>Gestion des rubriques <a href="../pages/ajouter_page.php" class="btn btn-default btn-sm">Ajouter une page</a></h1>
<div class="notification-block">
	<?php echo $message ?>
</div>
<hr />
<div class="table-responsive">
	<table class="table table-condensed table-hover table-bordered table-striped">
		<thead>
			<tr>
				<th>#</th>
				<th>Titre</th>
				<th>Option</th>
			</tr>		
		</thead>
		<tbody class="sortable">
			<?php if(!empty($menus)){ ?>
			<?php foreach($menus as $i => $menu){ ?>
			<tr id="<?php echo $menu->id; ?>">
				<td><button type="button" class="btn btn-info btn-xs move-menu"><span class="glyphicon glyphicon-move"></span></button></td>
				<td><?php echo $menu->title_fr; ?></td>
				<td>
					<div class="btn-group">
						<a href="modifier_menu.php?id=<?php echo $menu->id; ?>" class="btn btn-default btn-sm edit-menus"><span class="glyphicon glyphicon-pencil"></span></a>
						<?php if($menu->id == 3){ ?>
							<a href="../evenements/" class="btn btn-default btn-sm edit-menus">Gestion des événements</a>
						<?php }else{ ?>
							<a href="../pages/?menu_parent=<?php echo $menu->id; ?>" class="btn btn-default btn-sm edit-menus">Gestion des pages</a>
						<?php } ?>
					</div>
				</td>
			</tr>
			<?php } ?>
			<?php }else{ ?>
			<tr>
				<td clospan="4">Aucune rubriques trouvées.</td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
</div>
<?php
	$content = ob_get_contents();
	ob_end_clean();
	
	ob_start();
?>
<script>
	$(document).ready(function(){
		
		$("tbody.sortable").sortable({
			placeholder: "ui-state-highlight warning",
			cursor: "move",
			handle: ".move-menu",
			cancel: "a",
			stop: function( event, ui ) {
				var ids = $(this).sortable("toArray");
				$.ajax({
					url: "index.php?action=reorder",
					data: {'ids[]' : ids},
					type: "POST"
				})
			}
		});
						
	});
</script>
<?php
	$js = ob_get_contents();
	ob_end_clean();
	include LAYOUT;
?>