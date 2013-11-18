<?php
include('../class.php');
$q = new database();
$con = $q->connect();
if($_GET['submit']=='add' && !empty($_GET['title'])){
	$q->query("INSERT INTO blog VALUES(null,'".$_GET['title']."','".$_GET['title']."','".$con->real_escape_string($_GET['description'])."','".$con->real_escape_string($_GET['detail'])."'),null)",$con);
}elseif($_GET['submit']=='edit'){
	$q->query("UPDATE blog SET title='".$_GET['title']."',alias='".$_GET['title']."',description='".$con->real_escape_string($_GET['description'])."',detail='".$con->real_escape_string($_GET['detail'])."' WHERE id='".$_GET['id']."'",$con);
}elseif($_GET['submit']=='del'){
	$q->query("DELETE FROM blog WHERE id='".$_GET['id']."'",$con);
}
$where = '';
if(!empty($_GET['search'])){
	$where = "WHERE title like'%".$_GET['search']."%'";
}
$page = ($_GET['index']-1)*10;
$r = $q->query("SELECT * FROM blog ".$where." LIMIT ".$page.",10",$con);
$rtotal = $q->query("SELECT * FROM blog ".$where,$con);
$q->formtable($r,array('title','date'),array('id','alias','description','detail'));
$q->pagination($rtotal->num_rows,$_GET['index']);
$con->close();
?>
