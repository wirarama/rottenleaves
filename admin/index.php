<?php
include('../class.php');
$v = new login();
$valid = $v->validation();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<title>mysqli admin</title>
		<link href="../css/bootstrap.min.css" rel="stylesheet">
		<link href="../css/adminstyle.css" rel="stylesheet">
		<script type="text/javascript" src="../js/jquery.min.js"></script>
		<script type="text/javascript" src="../js/bootstrap.min.js"></script>
		<?php if($valid==true){?>
                <script type="text/javascript" src="../js/jquery.form.js"></script>
                <script type="text/javascript" src="../js/admin.js"></script>
                <?php } ?>
	</head>
	<body>
		
        <?php
        if($valid==true){
        ?>
        <div class="container-fluid">
            <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
                    <div class="navbar-brand" id="menuindex">Blog</div>
                    <div class="navbar-left">
                            <ul class="nav navbar-nav">
                                    <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-align-justify"></span> Menu <b class="caret"></b></a>
                                            <ul class="dropdown-menu" id="adminnav">
                                                    <li><a href="#">Content</a></li>
                                                    <li><a href="#">Blog</a></li>
                                                    <li><a href="#">User</a></li>
                                                    <li><a href="index.php?logout=1">Logout</a></li>
                                            </ul>
                                    </li>
                                    <li class="active showform"><a data-toggle="modal" href="#myModal" id="addnew"><span class="glyphicon glyphicon-file"></span> Add New</a></li>
                            </ul>
                    </div>
                    <form class="navbar-form navbar-right" role="search">
                            <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Search" id="search">
                            </div>
                            <button type="button" class="btn btn-info" id="searchbtn"><span class="glyphicon glyphicon-search"></span>
</button>
                    </form>
            </nav>
            <!-- Button trigger modal -->

              <!-- Modal -->
              <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h4 class="modal-title">Form</h4>
                    </div>
                    <div class="modal-body">
                            <div id="formcontainer">
                            </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-primary" id="submit" data-dismiss="modal" aria-hidden="true">add</button>
                      <button type="button" class="btn btn-warning" id="cancel" data-dismiss="modal" aria-hidden="true">cancel</button>
                    </div>
                  </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
              </div><!-- /.modal -->

            <div id="list">
            </div>
         </div>
        <?php
        }else{
        ?>
        <div class="container logincont">
             <form class="form-horizontal" method="POST" action="">
               <?php
               $f = new form();
               echo $f->formtext('Username','username');
               echo $f->formpassword('Password','password');
               echo $f->formbutton('Login','login','submit');
               ?>
             </form>
        </div>
         <?php
         }
         ?>
	</body>
</html>
