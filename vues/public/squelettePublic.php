<!DOCTYPE html>
<html>
	<head>
		<title>Château de La Roche-Guyon</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="IE=10,chrome=1">
		
		<link href="css/li-scroller.css" rel="stylesheet" media="screen">
		<link href="css/lightview/lightview.css" rel="stylesheet" media="screen">
		<link href="css/left_calendar.css" rel="stylesheet" media="screen">
		<link href="css/style.css" rel="stylesheet" media="screen">
	</head>
	<body>
		<div id="banner_header">
			<div id="page-header">
				<a href="index.php?page=Index">
					<div id="block_titre">
						<h1>Château de<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;La Roche-Guyon</h1>
					</div>
				</a>
				<div id="head">
					<div id="icones">
						<div class="icon_head_lang"><a>De</a></div>
						<div class="icon_head_lang"><a>En</a></div>
						<div class="icon_head_lang active"><a>Fr</a></div>
						<a href="mailto:service.reservation@chateaudelarocheguyon.fr" ><img class="icon_head mail" src="img/mail.png"/></a>
						<a href="https://www.facebook.com/pages/Ch\âteau-de-La-Roche-Guyon/157066454316159?fref=ts" target="_blank"><img class="icon_head" src="img/facebook.png"/></a>
						<a href=""><img class="icon_head" src="img/loupe.png"/></a>
					</div>
					<?php echo $menu; ?>
				</div>
			</div>
		</div>
		<div id="all_menu">
			<div id="background_menu">
				<div class="container_menu">
				</div>
			</div>
		</div>
		<?php echo $contenu; ?>
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
		<script type="text/javascript" src="js/jquery.marquee.min.js"></script>
		<script type="text/javascript" src="js/jquery.pause.min.js"></script>
		<script type="text/javascript" src="js/jquery.mousewheel.min.js"></script>
		<script type="text/javascript" src="js/jquery.cycle2.min.js"></script>
		<script type="text/javascript" src="js/jquery.li-scroller.1.0.js"></script>
		<script type="text/javascript" src="js/lightview/lightview.js"></script>
		<script type="text/javascript" src="js/jquery-ui-datepicker.js"></script>
		<script type="text/javascript">
		<?php echo $js; ?>
		</script>
		<script type="text/javascript">
			$(function(){
				$('.marquee').marquee({
					//duration in milliseconds in which marquee will finish one round
					duration: 15000,
					gap: 50,
					delayBeforeStart: 0,
					direction: 'left',
					pauseOnHover: true
				});
				
				$(".block_categ").mouseenter(function(){
					$(".block_categ").css("background-color", "#000000");
					$(".block_categ.active").css("background-color", $(".block_categ.active input").val());
					$("#background_menu .container_menu").html("");
					$("#fleche").css("visibility", "hidden");
					id = $(this).attr("id");
					position = $(this).position();
					$("#fleche").css("left", (position.left+50));
					$("#fleche").css("top", (position.top+45));
					$.ajax({
						url: "vues/public/sous_menu.php",
						type: "GET",
						data:"id="+id,
						success:function(result){
							$("#background_menu .container_menu").html(result);
						}
					});
					$("#fleche").css("visibility", "visible");
					$("#all_menu").css("visibility", "visible");
				})
				
				$("#all_menu").mouseleave(function(){
					$(".block_categ").css("background-color", "#000000");
					$(".block_categ.active").css("background-color", $(".block_categ.active input").val());
					$("#background_menu").css("background-color", "transparent");
					$("#background_menu .container_menu").html("");
					$("#fleche").css("visibility", "hidden");
					$("#all_menu").css("visibility", "hidden");
				});
				
				$('#left_calendar').datepicker({
					inline: true,
			        firstDay: 1,
					dateFormat: "yy-mm-dd",
			        dayNamesMin: ['D', 'L', 'M', 'M', 'J', 'V', 'S'],
					monthNames: [ "janvier", "févier", "mars", "avril", "mai", "juin", "juillet", "août", "septembre", "octobre", "novembre", "décembre" ],
					onSelect: findArticlesByEventDate
			    });
			});
			
			function findArticlesByEventDate(date){
			
				window.location.href = "index.php?page=Page&id_page=19&id_langue=1&id_menu=3"+"&date=\""+date+"\"";
			}
			
			function menu_color(color, id){
				$(id).css("background-color", color);
				$("#background_menu").css("background-color", color);
				$('#menu_calendar').datepicker({
			        inline: true,
			        firstDay: 1,
					dateFormat: "yy-mm-dd",
			        dayNamesMin: ['D', 'L', 'M', 'M', 'J', 'V', 'S'],
					monthNames: [ "janvier", "févier", "mars", "avril", "mai", "juin", "juillet", "août", "septembre", "octobre", "novembre", "décembre" ],
					onSelect: findArticlesByEventDate
			    });
			}
		</script>
	</body>
</html>