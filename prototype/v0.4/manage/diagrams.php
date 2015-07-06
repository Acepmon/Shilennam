<!DOCTYPE html>
<html>
<head>
	<?php
		require_once "../backend/init.php";	
	?>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<title>Шилэн Нам</title>

	<!-- Bootstrap -->
	<link href="../css/bootstrap.min.css" rel="stylesheet">

	<!-- Custom Css -->
	<link rel="stylesheet" href="../css/global.css">
	<link rel="stylesheet" type="text/css" href="../css/manage.css">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="../js/jquery-1.11.2.min.js"></script>
	<!-- AngularJs minified version js file -->
	<script src="../js/angular.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="../js/bootstrap.min.js"></script>
	<!-- Custom Global Javascript and Jquery -->
	<script src="../js/global.js"></script>
</head>
<body>
	<nav class="navbar navbar-default navbar-static-top navbar-md">
	  <div class="container">
	    <!-- Brand and toggle get grouped for better mobile display -->
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <a class="navbar-brand" href="../">Shilen Nam</a>
	    </div>

	    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav">
	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Databases <span class="caret"></span></a>
	          <ul class="dropdown-menu" role="menu">
	            <li class="active"><a href="diagrams.php">Diagrams</a></li>
	            <li><a href="editor.php">Table editor</a></li>
	            <li><a href="viewer.php">Data viewer</a></li>
	            <li><a href="priviligies.php">User priviligies</a></li>
	          </ul>
	        </li>
	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Dropdown <span class="caret"></span></a>
	          <ul class="dropdown-menu" role="menu">
	            <li><a href="#">Action</a></li>
	            <li><a href="#">Another action</a></li>
	            <li><a href="#">Something else here</a></li>
	            <li class="divider"></li>
	            <li><a href="#">Separated link</a></li>
	          </ul>
	        </li>
	      </ul>
	    </div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>

	<div class="container">
		<header class="header">
			<h1 class="text-center">Diagrams</h1>
		</header>
		<hr>
		<div class="col-md-12">
			<div class="col-md-2">
				<ul class="list-group">
					<a href="#" class="list-group-item" id="collapse_side_menu" data-parent="editor_side_menu">
						<span class="glyphicon glyphicon-menu-left"></span> Collapse menu
					</a>
					<a href="index.php" class="list-group-item">
						<span class="glyphicon glyphicon-book"></span> Instructions
					</a>
					<a href="diagrams.php" class="list-group-item active">
						<span class="glyphicon glyphicon-list-alt"></span> Diagrams
					</a>
					<a href="editor.php" class="list-group-item">
						<span class="glyphicon glyphicon-pencil"></span> Table Editor
					</a>
					<a href="viewer.php" class="list-group-item">
						<span class="glyphicon glyphicon-file"></span> Data Viewer
					</a>
					<a href="priviligies.php" class="list-group-item disabled">
						<span class="glyphicon glyphicon-user"></span> User Priviligies
					</a>
				</ul>
			</div>
			<div class="col-md-10">
				<h3 class="text-left">Core Skeleton</h3>
				<img src="diagrams/coreSkeleton.JPG" class="img-responsive">
				<hr>
				<h3 class="text-left">Objects in Diagram</h3>
				<img src="diagrams/objectsInDiagram.JPG" class="img-responsive">
				<hr>
				<h3 class="text-left">Main Database</h3>
				<img src="diagrams/mainDatabaseCompleted.JPG" class="img-responsive">
			</div>			
		</div>
	</div>

</body>
</html>