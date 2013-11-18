<form class="form-horizontal" role="form">
	<input type="hidden" id="id" value="">
	<?php
	include('../class.php');
	$f = new form();
	echo $f->formtext('Title','title');
	echo $f->formtext('Alias','alias');
	echo $f->formtextsmall('Priority','priority');
	echo $f->formtext('Description','description',true);
	?>
</form>
