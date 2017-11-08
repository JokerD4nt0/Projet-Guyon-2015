<?php
	if(!empty($_GET['page']) && is_file('../../controleurs/Cnt'.$_GET['page'].'.php')){
		require_once '../../controleurs/Cnt'.$_GET['page'].'.php';
	}else{
		require_once '../../controleurs/CntIndex.php';
	}
?>