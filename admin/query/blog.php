<?php
include('../class.php');
$q = new database();
$con = $q->connect();
if($_GET['submit']=='add' && !empty($_GET['title'])){
	$q->query("INSERT INTO blog VALUES(null,'%s','%s','%s','%s',null,'%d')",$con,array($_GET['title'],$_GET['title'],$_GET['description'],$_GET['detail'],$_GET['session']));
}elseif($_GET['submit']=='edit'){
	$q->query("UPDATE blog SET title='%s',alias='%s',description='%s',detail='%s' WHERE id='%d'",$con,array($_GET['title'],$_GET['title'],$_GET['description'],$_GET['detail'],$_GET['id']));
}elseif($_GET['submit']=='del'){
        $rblog = $q->query("SELECT session FROM blog WHERE id='%d'",$con,array($_GET['id']));
        while($dblog = $rblog->fetch_assoc()){
            $session = $dblog['session'];
        }
        $rpic = $q->query("SELECT filename FROM pictures WHERE session='".$session."'",$con);
        while($dpic = $rpic->fetch_assoc()){
            $filename = $path.$dpic['filename'];
            if (file_exists($filename)) {
                unlink($filename);
            }
        }
        $q->query("DELETE FROM pictures WHERE session='".$session."'",$con);
        $q->query("DELETE FROM blog WHERE id='%d'",$con,array($_GET['id']));
}
$where = '';
if(!empty($_GET['search'])){
	$where = "WHERE title like'%".$con->real_escape_string($_GET['search'])."%'";
}
$page = ($_GET['index']-1)*10;
$r = $q->query("SELECT * FROM blog ".$where." LIMIT ".$page.",10",$con);
$rtotal = $q->query("SELECT * FROM blog ".$where,$con);
$q->formtable($r,array('title','date'),array('id','alias','description','detail','session'));
$q->pagination($rtotal->num_rows,$_GET['index']);
$con->close();
?>
