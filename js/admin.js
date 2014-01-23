function loadblog(pg){
	switch($('#menuindex').text()){
		case "Blog":
			var menuindex = "blog";
			var add = {title:$("#title").val(),description:$("#description").val(),detail:$("#detail").val()};
			break;
		case "Content":
			var menuindex = "content";
			var add = {title:$("#title").val(),alias:$("#alias").val(),priority:$("#priority").val(),description:$("#description").val()};
			break;
                case "User":
			var menuindex = "user";
			var add = {username:$("#username").val(),password:$("#password").val()};
			break;
	}
	var basic = {id:$("#id").val(),search:$("#search").val(),submit:$("#submit").text(),index:pg};
	var json = mergejson(basic,add);
	var query = "query/"+menuindex+".php";
	$.get(query,json,function(data){
		$("#list").html(data);
	});
}
function emptyform(){
	$("#formcontainer input,#formcontainer textarea").val('');
	$('#uploadpic').val("Upload");
	$('#status').html('');
}
function loadform(){
	switch($('#menuindex').text()){
		case "Blog":
			var menuindex = "blog";
			break;
		case "Content":
			var menuindex = "content";
			break;
                case "User":
			var menuindex = "user";
			break;
	}
	var formcontent = "form/"+menuindex+".php";
	$.get(formcontent,function(data){
		$("#formcontainer").html(data);
	});
}
function mergejson(obj1,obj2){
	var obj3 = {};
	for (var attrname in obj1) { obj3[attrname] = obj1[attrname]; }
	for (var attrname in obj2) { obj3[attrname] = obj2[attrname]; }
	return obj3;
}
$(document).ready(function() {
	loadblog('1');
        loadform();
	$('#searchbtn').click(function(){
		loadblog('1');
	});
	$('#adminnav li a').click(function(e){
            if($(this).text()!=='Logout'){
                e.preventDefault();
		$('#menuindex').text($(this).text());
		loadblog('1');
            }
            loadform();
	});
	$('#addnew').click(function(){
                $("#formcontainer").css("display","block");
                $("#formdelete").css("display","none");
		$("#submit").text("add");
	});
	$(document).on("click",".pagination li",function(){
		loadblog($(this).text());
	});
	$(document).on("click","#submit",function(){
		loadblog('1');
		emptyform();
	});
	$(document).on("click","#cancel",function(){
		$("#submit").text("add");
		emptyform();
	});
	$(document).on("click",".showform",function(){
		$('#myModal').modal({show:true});
	});
	$(document).on("click",".mod",function(){
                var form = $("#formcontainer input,#formcontainer textarea").toArray();
                for(var i=0;i<form.length;i++){
                        var id = form[i].getAttribute("id");
                        $("#"+id).val($(this).parent().children('.attr'+id).html());
                }
                if($(this).text()!=='del'){
                    $("#formcontainer").css("display","block");
                    $("#formdelete").css("display","none");
                }else{
                    $("#formcontainer").css("display","none");
                    $("#formdelete").css("display","block");
                }
		$("#submit").text($(this).text());
		$('#uploadpic').val("Upload");
	});
});
