<form class="form-horizontal" role="form">
	<input type="hidden" id="id" value="">
	<?php
	include('../class.php');
	$f = new form();
	echo $f->formtext('Title','title');
	echo $f->formtext('Description','description',true);
	echo $f->formtext('Detail','detail',true);
	?>
</form>
<form action="upload.php" id="upload" method="post" enctype="multipart/form-data">
	<?php
	echo $f->formfile('Picture','picture');
	?>
</form>
