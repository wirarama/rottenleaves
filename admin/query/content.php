<?php
include('../class.php');
$q = new database();
$con = $q->connect();
if($_GET['submit']=='add' && !empty($_GET['title'])){
	$q->query("INSERT INTO content VALUES(null,'%s','%s','%d','%s',null)",$con,array($_GET['title'],$_GET['alias'],$_GET['priority'],$_GET['description']));
}elseif($_GET['submit']=='edit'){
	$q->query("UPDATE content SET title='%s',alias='%s',priority='%d',description='%s' WHERE id='%d'",$con,array($_GET['title'],$_GET['alias'],$_GET['priority'],$_GET['description'],$_GET['id']));
}elseif($_GET['submit']=='del'){
	$q->query("DELETE FROM content WHERE id='%d'",$con,array($_GET['id']));
}
$where = '';
if(!empty($_GET['search'])){
	$where = "WHERE title like'%".$con->real_escape_string($_GET['search'])."%'";
}
$page = ($_GET['index']-1)*10;
$r = $q->query("SELECT * FROM content ".$where." ORDER BY priority LIMIT ".$page.",10",$con);
$rtotal = $q->query("SELECT * FROM content ".$where,$con);
$q->formtable($r,array('title','alias','priority','date'),array('id','description'));
$q->pagination($rtotal->num_rows,$_GET['index']);
$con->close();
?>
