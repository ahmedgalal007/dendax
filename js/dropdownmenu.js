var $menuService = '/services/menu.php';

function getMenuChilds(item){
	if (item.attr('data-childs') == 1) {
		var $data = { "menuId" : item.attr('data-id') };
		$.ajax({
			 type: 'GET',
			 url: $menuService + "?menuId=" + item.attr('data-id'),
			 dataType: "json",
			 data: JSON.stringify($data),
			 complete: function(data) {
			 	var cls = "dropdown-menu sub-menu";

			 	var ul = "<ul class='" + cls + "'>" ;
			 	//alert(JSON.stringify(data.responseJSON));
                         		$.each(data.responseJSON, function(index, value){
                         			var trigClass = "";
                         			if (value.childs == 1) { trigClass = " class='trigger right-caret' "};
                         			ul += "<li>";
					ul += "<a " + trigClass + " href='" + value.link + "' data-id='" + value.ID + "' data-childs='" + value.childs + "'>" + value.name + "</a>";
					ul += "</li>";
                         		});

				ul += "</ul>";
			 	item.parent().append(ul);
			 	item.parent().find(".dropdown-menu > li > a.trigger").on("mouseover", triggerMouseover);
				item.parent().find(".dropdown-menu > li > a:not(.trigger)").on("mouseover", nonTriggerMouseover);
			 }
		});
	};
}


function triggerMouseover(e){
	if (!$(this).next().hasClass('sub-menu')) {
		getMenuChilds($(this));
	};
	
	var current=$(this).next();
	var grandparent=$(this).parent().parent();
	if($(this).hasClass('left-caret')||$(this).hasClass('right-caret'))
		$(this).toggleClass('right-caret left-caret');
	grandparent.find('.left-caret').not(this).toggleClass('right-caret left-caret');
	grandparent.find(".sub-menu:visible").not(current).hide();
	current.toggle();
	e.stopPropagation();
}

function nonTriggerMouseover(e){
	var root=$(this).parent().parent();
	root.find('.sub-menu:visible').hide();
	root.find('.left-caret').toggleClass('right-caret left-caret');
}

$(function(){
	$(".dropdown-toggle").on("mouseover", function(e){
		$(this).trigger("click");
		if (!$(this).next().hasClass('sub-menu')) {
			getMenuChilds($(this));
		};
	});
	$(".dropdown-menu > li > a.trigger").on("mouseover", triggerMouseover);
	$(".dropdown-menu > li > a:not(.trigger)").on("mouseover", nonTriggerMouseover);

});

