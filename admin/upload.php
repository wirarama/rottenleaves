<?php
include('class.php');
$q = new database();
$con = $q->connect();
$output_dir = $path."/uploads/";
$files = array();
$fdata = $_FILES['picture'];
if (is_array($fdata['name'])) {
    for ($i = 0; $i < count($fdata['name']);  ++$i) {
        $files[] = array(
            'name' => $fdata['name'][$i],
            'type' => $fdata['type'][$i],
            'tmp_name' => $fdata['tmp_name'][$i],
            'error' => $fdata['error'][$i],
            'size' => $fdata['size'][$i]
        );
    }
} else {
    $files[] = $fdata;
}
foreach($files as $file){
	move_uploaded_file($file["tmp_name"],$output_dir.$file["name"]);
        resizejpg($output_dir.$file["name"],$output_dir.$file["name"],600);
        $query = $q->query("INSERT INTO pictures VALUES(null,'%s','%d')",$con,array($file["name"],$_POST['sessionpic']));
        echo '<div><img src="'.$output_dir.$file['name'].'"></div>';
}
$con->close();
function resizejpg($input,$output,$newwidth,$newheight=NULL){
    list($width, $height) = getimagesize($input);
    if ($newheight === \NULL) {
        $newheight = intval(($newwidth / $width) * $height);
    }
    $thumb = imagecreatetruecolor($newwidth, $newheight);
    $source = imagecreatefromjpeg($input);
    imagecopyresized($thumb,$source,0,0,0,0,$newwidth,$newheight,$width,$height);
    imagejpeg($thumb,$output,65);
}