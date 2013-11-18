<?php include('class.php'); ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<title>rotten leaves</title>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/style.css" rel="stylesheet">
		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="js/script.js"></script>
	</head>
	<body>
		<div class="container">
			<div id="head">
				<div id="txt">
					<h1>Rotten Leaves</h1>
					<h2>Before dark and lonely</h2>
				</div>
				<img src="images/back.jpg" class="img-responsive" alt="rotten leaves" id="mainpic">
				<img src="images/blood.jpg" class="img-responsive" alt="blood" id="cover">
			</div>
			<div id="content">
				<?php
				$c = new content();
				echo $c->getcontent();
				?>
			</div>
			<div id="credit">
				<h5>Rotten Leaves 2013</h5>
			</div>
		</div>
	</body>
</html>
