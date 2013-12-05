$(document).ready(function() {
	$(".content").css("display","none");
	getblog("");
	/*var p = getURLParameter("p");
	if(p!=""){
		$("#content #"+p).fadeIn();
		$("#content ul li #"+p).addClass("navselected");
	}else{*/
		$("#content #home").fadeIn();
		$("#content ul li #home").addClass("navselected");
	//}
	$("#content ul li a").click(function(e){
		e.preventDefault();
		$('#content ul li a').removeClass("navselected");
		$(this).addClass("navselected");
		$(".content").css("display","none");
		$("#content #"+$(this).text()).fadeIn();
		getblog("");
		$("#blog h3").text("Blog");
		return false;
	});
	$(document).on("click",".blogrow a",function(e){
		e.preventDefault();
		getblog($(this).attr('href'));
		$("#blog h3").text("Blog : "+$(this).text());
		return false;
	});
});
function getblog(id){
	$.get("query/blog.php",{ alias:id },function(data){
		$("#bloglist").html(data);
	});
}
/*function getURLParameter(name) {
    var url = window.location.href;
    var out = url.split("/");
    var last = out.length;
    return out[last-1];
}*/
