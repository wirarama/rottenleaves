<?php
$output_dir = "../uploads/";
$files = array();
$fdata = $_FILES['picture'];
if(is_array($fdata['name'])){
	for($i=0;$i<count($fdata['name']);++$i){
		$files[]=array(
			'name'    =>$fdata['name'][$i],
			'type'  => $fdata['type'][$i],
			'tmp_name'=>$fdata['tmp_name'][$i],
			'error' => $fdata['error'][$i], 
			'size'  => $fdata['size'][$i]  
		);
	}
}else $files[] = $fdata;
foreach($files as $file){ 
	echo $file['name'].'<br>';
	move_uploaded_file($file["tmp_name"],$output_dir.$file["name"]);
}
?>
