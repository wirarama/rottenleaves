<?php
include('../admin/class.php');
$q = new database();
$con = $q->connect();
if(!empty($_GET['alias'])){
	$r = $q->query("SELECT detail FROM blog WHERE alias='".str_replace('#','',$_GET['alias'])."' LIMIT 0,1",$con);
	while($d = $r->fetch_assoc()){
		echo '<p>'.nl2br($d['detail']).'</p>';
	}
}else{
	$r = $q->query("SELECT * FROM blog ORDER BY id DESC LIMIT 0,10",$con);
	while($d = $r->fetch_assoc()){
		echo '<div class="row blogrow">
				<div class="col-md-2"><a href="#'.$d['alias'].'"><img src="images/thumb.jpg" alt="" /></a></div>
				<div class="col-md-10"><h4><a href="#'.$d['alias'].'">'.$d['title'].'</a></h4>'.$d['description'].'</div>
			</div>';
	}
}
$con->close();
?>
