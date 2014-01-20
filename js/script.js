$(document).ready(function() {
	$(".content").css("display","none");
	getblog("");
        $("#content #home").fadeIn();
        $("#content ul li #home").addClass("navselected");
	$("#content nav ul li a").click(function(e){
		e.preventDefault();
		$('#content nav ul li a').removeClass("navselected");
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