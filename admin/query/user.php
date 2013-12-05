<?php
include('../class.php');
$q = new database();
$con = $q->connect();
if($_GET['submit']=='add' && !empty($_GET['username'])){
	$q->query("INSERT INTO user VALUES(null,'%s',MD5('%s'),null)",$con,array($_GET['username'],$_GET['password']));
}elseif($_GET['submit']=='edit'){
        $q->query("UPDATE user SET password=MD5('%s') WHERE id='%d'",$con,array($_GET['password'],$_GET['id']));   
}elseif($_GET['submit']=='del'){
	$q->query("DELETE FROM user WHERE id='%d'",$con,array($_GET['id']));
}
$where = '';
if(!empty($_GET['search'])){
	$where = "WHERE username like'%".$con->real_escape_string($_GET['search'])."%'";
}
$page = ($_GET['index']-1)*10;
$r = $q->query("SELECT * FROM user ".$where." LIMIT ".$page.",10",$con);
$rtotal = $q->query("SELECT * FROM user ".$where,$con);
$q->formtable($r,array('username','date'),array('id'));
$q->pagination($rtotal->num_rows,$_GET['index']);
$con->close();
?>
