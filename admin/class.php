<?php
class database{
	function connect(){
		$con = new mysqli('localhost','admin','dallas99','blog');
		return $con;
	}
	function query($sql,$con){
		if($con->connect_errno > 0) die($con->connect_error);
		if(!$r = $con->query($sql)) die($con->error);
		return $r;
		$r->free();
	}
	function formtable($r,$row,$hidden){
		echo '<table class="table table-striped"><tr>';
		foreach($row AS $row1){
			echo '<th>'.$row1.'</th>';
		}
		echo '<th>&nbsp;</th><th>&nbsp;</th></tr>';
		while($d = $r->fetch_assoc()){
			echo '<tr>';
			foreach($row AS $row1){
				echo '<td class="attr'.$row1.'">'.$d[$row1].'</td>';
			}
			foreach($hidden AS $hidden1){
				echo '<td class="attr'.$hidden1.'" style="display:none;">'.$d[$hidden1].'</td>';
			}
			echo '<td class="mod showform">edit</td><td class="mod showform">del</td></tr>';
		}
		echo '</table>';
		$r->free();
	}
	function pagination($rtotal,$index){
		echo '<ul class="pagination">';
		$j=1;
		for($i=1;$i<$rtotal;$i=$i+10){
			if($j==$index){
				echo '<li class="active"><a href="#">'.$j.'</a></li>';
			}else{
				echo '<li><a href="#">'.$j.'</a></li>';
			}
			$j++;
		}
		echo '</ul>';
	}
}
class form{
	function formbase($title,$input){
		$out = '<div class="form-group">
				<label for="title" class="col-lg-2 control-label">'.$title.'</label>
				<div class="col-lg-10">'.$input.'</div>
			</div>';
		return $out;
	}
	function formbase_nolabel($input){
		$out = '<div class="form-group"><div class="col-lg-offset-2 col-lg-10">'.$input.'</div></div>';
		return $out;
	}
	function formtext($title,$id,$textarea=false){
		if($textarea==true){
			$input = '<textarea class="form-control" rows="5" id="'.$id.'"></textarea>';
		}else{
			$input = '<input type="text" class="form-control" id="'.$id.'" placeholder="'.$title.'">';
		}
		$out = $this->formbase($title,$input);
		return $out;
	}
	function formtextsmall($title,$id){
		$input = '<input type="text" class="form-control" id="'.$id.'" placeholder="'.$title.'" style="width:100px;">';
		$out = $this->formbase($title,$input);
		return $out;
	}
	function formbutton($title,$id,$type='button'){
		$input = '<button type="'.$type.'" class="btn btn-primary" id="'.$id.'">'.$title.'</button>';
		$out = $this->formbase_nolabel($input);
		return $out;
	}
	function formfile($title,$id){
		$input = '<div style="float:left;"><input type="file" name="'.$id.'[]" multiple></div><div style="float:left;"><input type="submit" value="Upload" id="uploadpic" class="btn btn-primary"></div><div style="clear:both;"></div><div id="status"></div>';
		$out = $this->formbase($title,$input);
		$out .= '<script>(function(){$(\'#upload\').ajaxForm({complete:function(xhr){$(\'#status\').html(xhr.responseText);}});})();</script>';
		return $out;
	}
}
?>
