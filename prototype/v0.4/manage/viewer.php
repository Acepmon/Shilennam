<!DOCTYPE html>
<html>
<head>
	<?php
		include '../backend/DB_CN.php';
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
	            <li><a href="diagrams.php">Diagrams</a></li>
	            <li><a href="editor.php">Table editor</a></li>
	            <li class="active"><a href="viewer.php">Data viewer</a></li>
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
			<h1 class="text-center">Data Viewer</h1>
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
					<a href="diagrams.php" class="list-group-item">
						<span class="glyphicon glyphicon-list-alt"></span> Diagrams
					</a>
					<a href="editor.php" class="list-group-item">
						<span class="glyphicon glyphicon-pencil"></span> Table Editor
					</a>
					<a href="viewer.php" class="list-group-item active">
						<span class="glyphicon glyphicon-file"></span> Data Viewer
					</a>
					<a href="priviligies.php" class="list-group-item disabled">
						<span class="glyphicon glyphicon-user"></span> User Priviligies
					</a>
				</ul>
			</div>
			<div class="col-md-10">

				<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="false">
				  	<div class="panel panel-default">
				    	<div class="panel-heading" role="tab" id="headingOne" data-toggle="collapse" data-parent="#accordion" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
				      		<h4 class="panel-title">
				        		<a href="#collapseOne">
				          			Parties
				        		</a>
				      		</h4>
				    	</div>
				    	<div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
				      		<div class="panel-body">
						      	<?php
									$party = new db_cn\Table("party");
									$rows = $party->select("id,code,title,acronym");
								?>
						      	<h4>This record is of Mongolian Government parties</h4>
								<p>
									There are total of <?php echo count($rows); ?> parties recorded
									on our database. This list is not static as you can add more government
									party records into our database. If you want to insert a new record 
									<a href="editor.php#insert_party">click here</a> to insert or <a href="editor.php#edit_party">edit</a>.
								</p>
							</div>
							<table class="table table-striped <?php if(count($rows)>12)echo'table-condensed';?>">
								<tr>
									<th>Code</th>
									<th>Title</th>
									<th>Acronym</th>
								</tr>
								<?php
									foreach ($rows as $row) {
										echo "<tr>";
										echo "<td>".$row['code']."</td>";
										echo "<td>".$row['title']."</td>";
										echo "<td>".$row['acronym']."</td>";
										echo "</tr>";
									}
								?>
							</table>
						</div>
					</div>
				  	<div class="panel panel-default">
				  		<div class="panel-heading" role="tab" id="headingTwo" data-toggle="collapse" data-target="#collapseTwo" data-parent="#accordion" aria-expanded="true" aria-controls="collapseTwo">
					      	<h4 class="panel-title">
					        	<a href="#collapseTwo">
					          	Economics of government parties
					        	</a>
					      	</h4>
				    	</div>
					    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
					    	<div class="panel-body">
					      	
					      	</div>
					      	<table class="table table-striped <?php if(count($rows)>12)echo'table-condensed';?>">
					      		<tr>
					      			<th>Улс төрийн нам</th>
					      			<th>Нийт санхүүжилт</th>
					      			<th>Нийт үрэлт</th>
					      			<th>Бэлэн байгаа</th>
					      			<th>Өр зээл</th>
					      		</tr>
						      	<?php
						      		$finance = new db_cn\Table("finance");
						      		$party = new db_cn\Table("party");
						      		$income = new db_cn\Table("income");
						      		$outcome = new db_cn\Table("outcome");
						      		$list = new db_cn\Table("financial_list");
						      		$companies = new db_cn\Table("companies");
						      		$result = $list->select("financeid,partyid,outcomeid,incomeid");
						      		foreach ($result as $res) {
						      			$finance_res = $finance->selectFirst("debt,remaining", "id = ".$res['financeid']);
						      			$party_res =$party->selectFirst("title", "id = ".$res['partyid']);
						      			$outcome_res = $outcome->selectFirst("total", "id = ".$res['outcomeid']);
						      			$income_res = $income->selectFirst("total", "id = ".$res['incomeid']);

						      			echo "<tr>";
						      			echo "<td>".$party_res['title']."</td>";
						      			echo "<td>$".$income_res['total']."</td>";
						      			echo "<td>$".$outcome_res['total']."</td>";
						      			echo "<td>$".$finance_res['remaining']."</td>";
						      			echo "<td>$".$finance_res['debt']."</td>";
						      			echo "</tr>";
						      		}
						      	?>
					      	</table>
					    </div>
				  	</div>
				  	<div class="panel panel-default">
				  		<div class="panel-heading" role="tab" id="headingThree" data-toggle="collapse" data-target="#collapseThree" data-parent="#accordion" aria-expanded="true" aria-controls="collapseThree">
				  			<h4 class="panel-title">
				  				<a href="#collapseThree">
				  					Companies
				  				</a>
				  			</h4>
				  		</div>
				  		<div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
				  			<?php
				  				$result = $companies->select("id,company,sector_name");
				  			?>
				  			<div class="panel-body">

				  			</div>
				  			<table class="table table-striped">
				  				<tr>
				  					<th>id</th>
				  					<th>Company</th>
				  					<th>Sector Name</th>
				  				</tr>
				  				<?php
				  					foreach ($result as $res) {
				  						echo "<tr>";
						      			echo "<td>".$res['id']."</td>";
						      			echo "<td>".$res['company']."</td>";
						      			echo "<td>".$res['sector_name']."</td>";
						      			echo "</tr>";
				  					}
				  				?>
				  			</table>
				  		</div>
				  	</div>

				</div>
			</div>
		</div>
	</div>
</body>
</html>