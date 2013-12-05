<form class="form-horizontal" role="form">
	<input type="hidden" id="id" value="">
	<?php
	include('../class.php');
	$f = new form();
	echo $f->formtext('Username','username');
	echo $f->formpassword('Password','password');
        echo $f->formpassword('Password Confirm','password');
	?>
</form>
