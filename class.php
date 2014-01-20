<?php
include('admin/class.php');
class content{
	function getcontent(){
		$q = new database();
		$con = $q->connect();
		$r = $q->query("SELECT * FROM content ORDER BY priority",$con);
                $nav = '<nav class="navbar navbar-default" role="navigation">
            		<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					  <span class="sr-only">Toggle navigation</span>
					  <span class="icon-bar"></span>
					  <span class="icon-bar"></span>
					  <span class="icon-bar"></span>
					</button>
				  </div>
				  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <div class="navbar-left">';
		$nav .= '<ul class="nav navbar-nav">';
		$body = '';
		while($d = $r->fetch_assoc()){
			$nav .= $this->formatnav($d['alias']);
			$body .= $this->formatbody($d['alias'],$d['title'],$d['description']);
		}
                $nav .= '</ul></div>
            </nav>';
		$con->close();
		$out = $nav.$body;
		return $out;
	}
	function formatnav($alias){
		$out = '<li><a href="#'.$alias.'" id="'.$alias.'">'.$alias.'</a></li>';
		return $out;
	}
	function formatbody($alias,$title,$description){
		$out = '<div id="'.$alias.'" class="content"><h3>'.$title.'</h3><p>'.nl2br($description).'</p>';
		switch($alias){
			case 'contact':
				$out .= $this->contactform();
				break;
			case 'blog':
				$out .= '<div id="bloglist"></div>';
				break;
		}
		$out .= '</div>';
		return $out;
	}
	function contactform(){
		$out = '<form class="form-horizontal" role="form">';
		$f = new form();
		$out .= $f->formtext('Name','name');
		$out .= $f->formtext('Email','email');
		$out .= $f->formtext('Message','message',true);
		$out .= $f->formbutton('Send','send');
		$out .= '</form>';
		return $out;
	}
}
?>
