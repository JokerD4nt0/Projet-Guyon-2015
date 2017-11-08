<?php
	ob_start();

	require_once "../config.inc.php";
	
	$oTOOLS = TOOLS::getInstance();
	$oMENU = new MENU;	
	$message = null;
	
	$menu_parent = 3;
	
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
	
	$menus = $oMENU->find("menu_parent = $menu_parent and id != 15 order by ordre")->Objets();	
?>
<h1>Gestion des événements 
<div class="btn-group">
	<a class="btn btn-default btn-sm">Ajouter une rubrique</a>
	<a class="btn btn-default btn-sm">Créer un événement</a>
</div>
</h1>
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
				<th>url</th>
				<th>Visible</th>
				<th>Option</th>
			</tr>		
		</thead>
		<tbody class="sortable">
			<?php if(!empty($menus)){ ?>
			<?php foreach($menus as $i => $menu){ ?>
			<tr id="<?php echo $menu->id; ?>">
				<td><button type="button" class="btn btn-info btn-xs move-menu"><span class="glyphicon glyphicon-move"></span></button></td>
				<td><?php echo $menu->title_fr; ?></td>
				<td><?php echo $menu->url; ?></td>
				<td>
					<?php if($menu->visible == 1){ ?>
						<span class="label label-success">Visible</span>
					<?php }else{ ?>
						<span class="label label-warning">Masquée</span>
					<?php } ?>
				</td>
				<td>
					<div class="btn-group">
						<?php if($menu->id != 15){ ?> <a href="modifier_page.php?id=<?php echo $menu->id; ?>" class="btn btn-default btn-sm edit-menus"><span class="glyphicon glyphicon-pencil"></span></a> <?php } ?>
					</div>
				</td>
			</tr>
			<?php } ?>
			<?php }else{ ?>
			<tr>
				<td colspan="5">Aucune rubriques trouvées.</td>
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