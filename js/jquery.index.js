$(function(){			
	$('.marquee').marquee({
		//duration in milliseconds in which marquee will finish one round
		duration: 15000,
		gap: 50,
		delayBeforeStart: 0,
		direction: 'left',
		pauseOnHover: true
	});
	
	$("#container").css("background-image", "url('../img/menu/bg/background-menu-chateau-roche-guyon-b9AzP.jpg')");
	$(".block_categ.active").css("background-color", $(".block_categ.active input").val());
	
	$("#zoom").click(function(){
		Lightview.show('../img/menu/bg/background-menu-chateau-roche-guyon-b9AzP.jpg');
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
			url: "../public/squelettePublic.php",
			type: "POST",
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
});
	
	function menu_color(color, id){
		$(id).css("background-color", color);
		$("#background_menu").css("background-color", color);
		$('#calendar').datepicker({
		    inline: true,
		    firstDay: 1,
		    showOtherMonths: false,
		    dayNamesMin: ['D', 'L', 'M', 'M', 'J', 'V', 'S']
		});
	}
});