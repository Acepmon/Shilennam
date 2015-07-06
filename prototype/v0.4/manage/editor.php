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
	            <li class="active"><a href="editor.php">Table editor</a></li>
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
			<h1 class="text-center">Data Viewer</h1>
		</header>
		<hr>
		<div class="col-md-12">
			<div class="col-md-2">
				<ul class="list-group" id="editor_side_menu">
					<a href="#" class="list-group-item" id="collapse_side_menu" data-parent="editor_side_menu">
						<span class="glyphicon glyphicon-menu-left"></span> Collapse menu
					</a>
					<a href="index.php" class="list-group-item">
						<span class="glyphicon glyphicon-book"></span> Instructions
					</a>
					<a href="diagrams.php" class="list-group-item">
						<span class="glyphicon glyphicon-list-alt"></span> Diagrams
					</a>
					<a href="editor.php" class="list-group-item active">
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

				<div class="panel-group editor-group" id="accordion" role="tablist" aria-multiselectable="false">

					<!-- Editing of party begins here... -->
				  	<div class="panel panel-default">
				    	<div class="panel-heading" role="tab" id="edit-party-heading" data-toggle="collapse" data-parent="#accordion" data-target="#edit-party-collapse" aria-expanded="false" aria-controls="edit-party-collapse">
					      	<h4 class="panel-title">
					        	<a href="#edit-party-collapse" >
					          	Party
					        	</a>
					      	</h4>
				    	</div>
					    <div id="edit-party-collapse" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="edit-party-heading">
					    	<div class="panel-body">
					    		<ul class="nav nav-tabs nav-justified">	
									<li role="presentation" class="active">
										<a href="#edit_party" data-toggle="tab">Edit Record</a>
									</li>
									<li role="presentation">
										<a href="#insert_party" data-toggle="tab">Add New Record</a>
									</li>
								</ul>
								<div class="tab-content">
									<div id="edit_party" class="tab-pane fade in active">
										<?php
											$party = new db_cn\Table("party");
											$rows = $party->select("id,code,title,acronym");
										?>
										<h4 class="text-danger text-center">
											<span class="glyphicon glyphicon-warning-sign"></span> Be sure to verify the data that you are editing!
										</h4>
										<div class="table-responsive">
											<table class="table table-hover">
												<tr>
													<th>Code</th>
													<th>Title</th>
													<th>Acronym</th>
													<th></th>
												</tr>
												<?php
													foreach ($rows as $row) {
														echo "<tr>";
														echo "<td>".$row['code']."</td>";
														echo "<td>".$row['title']."</td>";
														echo "<td>".$row['acronym']."</td>";
														echo "<td class='text-center'>
														<button type='button' id='party_edit_".$row['id']."' class='btn btn-default' data-target='#edit_modal' data-toggle='modal'>
														<span class='glyphicon glyphicon-pencil'></span>
														</button>
														<button type='button' class='btn btn-default disabled'>
														<span class='glyphicon glyphicon-trash'></span>
														</button>
														</td>";
														echo "</tr>";
													}
												?>
											</table>
										</div>
									</div>
									<div id="insert_party" class="tab-pane fade in">
										<h4 class="text-info">
											Be sure to check your credentials before you submit data
										</h4>
										<form action="../backend/Editor.php" method="post">
											<div class="form-group">
												<label for="party-code">Code : </label>
												<input type="text" class="form-control" id="party-code" name="party-code">
											</div>
											<div class="form-group">
												<label for="party-title">Title : </label>
												<input type="text" class="form-control" id="party-title" name="party-title">
											</div>
											<div class="form-group">
												<label for="party-acronym">Acronym</label>
												<input type="text" class="form-control" id="party-title" name="party-acronym">
											</div>
											<div class="form-group">
												<input type="submit" class="btn btn-primary" value="Add New Party Record" name="action">
												<input type="reset" class="btn btn-default" value="Clear">
											</div>
										</form>
									</div>
								</div>
								<div class="modal fade" id="edit_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
								  	<div class="modal-dialog">
								    	<div class="modal-content">
								   	  		<form action="">
										      	<div class="modal-header">
											        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
											        <h4 class="modal-title" id="myModalLabel">Edit Record</h4>
										      	</div>
										      	<div class="modal-body" id="edit_output">
											       	<div class="form-group">
											       		<label for="edit_party_code">Code : </label>
											       		<div class="input-group">
											       			<span class="input-group-addon btn btn-warning party_edit_valid" data-toggle="button" aria-pressed="false" autocomplete="off">Edit</span>
											       			<input type="text" id="edit_party_code" class="form-control" readonly="true">	
											       		</div>
											       	</div>
											       	<div class="form-group">
											       		<label for="edit_party_title">Title : </label>
											       		<div class="input-group">
											       			<span class="input-group-addon btn btn-warning party_edit_valid" data-toggle="button" aria-pressed="false" autocomplete="off">Edit</span>
											       			<input type="text" id="edit_party_title" class="form-control" readonly="true">
											       		</div>
											       	</div>
											       	<div class="form-group">
											       		<label for="edit_party_acronym">Acronym : </label>
											       		<div class="input-group">
											       			<span class="input-group-addon btn btn-warning party_edit_valid" data-toggle="button" aria-pressed="false" autocomplete="off">Edit</span>
											       			<input type="text" id="edit_party_acronym" class="form-control" readonly="true">
											       		</div>
											       	</div>
											       	<div id="editor_test">
											       		
											       	</div>
										      	</div>
										      	<div class="modal-footer">
											        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
											        <input type="submit" class="btn btn-primary disabled" value="Save Changes">
										      	</div>
								      		</form>
								    	</div>
								  	</div>
								</div>
					      	</div>
					    </div>
					</div>
					<!-- Editing of party ends here! -->

					<!-- Editing of party economics starts here... -->
				  	<div class="panel panel-default">
				    	<div class="panel-heading" role="tab" id="edit-party-economics-heading" data-toggle="collapse" data-parent="#accordion" data-target="#edit-party-economics-collapse" aria-expanded="false" aria-controls="edit-party-economics-collapse">
					      	<h4 class="panel-title">
					        	<a href="#edit-party-economics-collapse">
					          	Party Economics
					        	</a>
					      	</h4>
				    	</div>
				    	<div id="edit-party-economics-collapse" class="panel-collapse collapse" role="tabpanel" aria-labelledby="edit-party-economics-heading">
				      		<div class="panel-body">

				      			<?php
				      				$finance_list = new db_cn\Table("financial_list");
				      				$finance = new db_cn\Table("finance");
						      		$party = new db_cn\Table("party");
						      		$income = new db_cn\Table("income");
						      		$outcome = new db_cn\Table("outcome");
						      		$companies = new db_cn\Table("companies");
				      			?>
								
								<ul class="nav nav-tabs">
									<li class="active"><a data-toggle="tab" href="#edit-party-economics-tab-summary">Summary</a></li>
									<li><a data-toggle="tab" href="#edit-party-economics-tab-finance">Finance</a></li>
									<li><a data-toggle="tab" href="#edit-party-economics-tab-income">Income</a></li>
									<li><a data-toggle="tab" href="#edit-party-economics-tab-outcome">Outcome</a></li>
								</ul>
								<div class="tab-content">
									<div id="edit-party-economics-tab-summary" class="tab-pane fade in active">
										<div class="table-responsive">
											<table class="table table-condensed table-striped table-bordered">
												<tr>
									      			<th>Улс төрийн нам</th>
									      			<th>Нийт санхүүжилт</th>
									      			<th>Нийт үрэлт</th>
									      			<th>Бэлэн байгаа</th>
									      			<th>Өр зээл</th>
									      		</tr>
												<?php
													$result = $finance_list->select("financeid,partyid,outcomeid,incomeid");
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
									<div id="edit-party-economics-tab-finance" class="tab-pane fade in">
										<div class="table-responsive">
											<table class="table table-condensed table-striped table-bordered">
												<tr>
									      			<th>ID</th>
									      			<th>Date</th>
									      			<th>Name</th>
									      			<th>Debt</th>
									      			<th>Remaining</th>
									      			<th></th>
									      		</tr>
												<?php
													$result = $finance->select("*");
										      		foreach ($result as $res) {
										      			echo "<tr>";
										      			echo "<td>".$res['id']."</td>";
										      			echo "<td>".$res['day']."/".$res['month']."/".$res['year']."</td>";
										      			echo "<td>".$res['name']."</td>";
										      			echo "<td>$".$res['debt']."</td>";
										      			echo "<td>$".$res['remaining']."</td>";
										      			echo "<td class='text-center'>
															<button type='button' id='party_edit_".$res['id']."' class='btn btn-default' data-target='#edit_finance_list_modal' data-toggle='modal'>
															<span class='glyphicon glyphicon-pencil'></span>
															</button>
															<button type='button' class='btn btn-default disabled'>
															<span class='glyphicon glyphicon-trash'></span>
															</button>
															</td>";
										      			echo "</tr>";
										      		}
												?>
											</table>
										</div>
										<div class="add_button">
											<button type="button" data-target="add_finance_modal" class="btn btn-primary pull-right disabled">Add finance record</button>
											<div class="clearfix"></div>
										</div>
									</div>
									<div id="edit-party-economics-tab-income" class="tab-pane fade in">
										<div class="table-responsive">
											<table class="table table-condensed table-striped table-bordered">
												<tr>
									      			<th>ID</th>
									      			<th>From inside</th>
									      			<th>From people</th>
									      			<th>Other parties</th>
									      			<th>Other</th>
									      			<th>Total</th>
									      			<th></th>
									      		</tr>
												<?php
													$result = $income->select("*");
										      		foreach ($result as $res) {
										      			echo "<tr>";
										      			echo "<td>".$res['id']."</td>";
										      			echo "<td>$".$res['from_inside']."</td>";
										      			echo "<td>$".$res['from_people']."</td>";
										      			echo "<td>$".$res['other_parties']."</td>";
										      			echo "<td>$".$res['other']."</td>";
										      			echo "<td>$".$res['total']."</td>";
										      			echo "<td class='text-center'>
														<button type='button' id='party_edit_".$res['id']."' class='btn btn-default' data-target='#edit_finance_list_modal' data-toggle='modal'>
														<span class='glyphicon glyphicon-pencil'></span>
														</button>
														<button type='button' class='btn btn-default disabled'>
														<span class='glyphicon glyphicon-trash'></span>
														</button>
														</td>";
										      			echo "</tr>";
										      		}
												?>
											</table>
										</div>
										<div class="add_button">
											<button type="button" data-target="add_income_modal" class="btn btn-primary pull-right disabled">Add income record</button>
											<div class="clearfix"></div>
										</div>
									</div>
									<div id="edit-party-economics-tab-outcome" class="tab-pane fade in">
										<div class="table-responsive">
											<table class="table table-condensed table-striped table-bordered">
												<tr>
									      			<th>ID</th>
									      			<th>Presentation</th>
									      			<th>Advertisement</th>
									      			<th>Management</th>
									      			<th>Employee Salary</th>
									      			<th>Chancery</th>
									      			<th>Mail & Shipping</th>
									      			<th>Transportation</th>
									      			<th>Assignment</th>
									      			<th>Other</th>
									      			<th>Total</th>
									      			<th></th>
									      		</tr>
												<?php
													$result = $outcome->select("*");
										      		foreach ($result as $res) {
										      			echo "<tr>";
										      			echo "<td>".$res['id']."</td>";
										      			echo "<td>$".$res['presentation']."</td>";
										      			echo "<td>$".$res['advertisement']."</td>";
										      			echo "<td>$".$res['management']."</td>";
										      			echo "<td>$".$res['employee_salary']."</td>";
										      			echo "<td>$".$res['chancery']."</td>";
										      			echo "<td>$".$res['mail_and_shipping']."</td>";
										      			echo "<td>$".$res['transportation']."</td>";
										      			echo "<td>$".$res['assignment']."</td>";
										      			echo "<td>$".$res['other']."</td>";
										      			echo "<td>$".$res['total']."</td>";
										      			echo "<td class='text-center'>
														<button type='button' id='party_edit_".$res['id']."' class='btn btn-default' data-target='#edit_finance_list_modal' data-toggle='modal'>
														<span class='glyphicon glyphicon-pencil'></span>
														</button>
														<button type='button' class='btn btn-default disabled'>
														<span class='glyphicon glyphicon-trash'></span>
														</button>
														</td>";
										      			echo "</tr>";
										      		}
												?>
											</table>
										</div>
										<div class="add_button">
											<button type="button" data-target="add_outcome_modal" class="btn btn-primary pull-right disabled">Add outcome record</button>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								<div class="financial_list">
									<div class="table-responsive">
										<table class="table table-hover table-bordered table-condensed table-nonfluid">
											<tr>
								      			<th>Finance ID</th>
								      			<th>Party ID</th>
								      			<th>Outcome ID</th>
								      			<th>Income ID</th>
								      			<th>
								      				<div class="add_button" style="margin: 0px;">
														<button type="button" data-target="add_finance_modal" class="btn btn-primary pull-right disabled">Add New</button>
														<div class="clearfix"></div>
													</div>
												</th>
								      		</tr>
											<?php
												$result = $finance_list->select("id,financeid,partyid,outcomeid,incomeid");
									      		foreach ($result as $res) {
									      			echo "<tr>";
									      			echo "<td>".$res['financeid']."</td>";
									      			echo "<td>".$res['partyid']."</td>";
									      			echo "<td>".$res['outcomeid']."</td>";
									      			echo "<td>".$res['incomeid']."</td>";
									      			echo "<td class='text-center'>
															<button type='button' id='party_edit_".$res['id']."' class='btn btn-default' data-target='#edit_finance_list_modal' data-toggle='modal'>
															<span class='glyphicon glyphicon-pencil'></span>
															</button>
															<button type='button' class='btn btn-default disabled'>
															<span class='glyphicon glyphicon-trash'></span>
															</button>
															</td>";
									      			echo "</tr>";
									      		}
											?>
										</table>
									</div>
								</div>
									
								<div class="modal fade" id="edit_finance_list_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
								  	<div class="modal-dialog">
								    	<div class="modal-content">
								   	  		<form action="">
										      	<div class="modal-header">
											        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
											        <h4 class="modal-title" id="myModalLabel">Edit Financial Lists</h4>
										      	</div>
										      	<div class="modal-body" id="edit_output">
											       	
										      	</div>
										      	<div class="modal-footer">
											        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
											        <input type="submit" class="btn btn-primary disabled" value="Save Changes">
										      	</div>
								      		</form>
								    	</div>
								  	</div>
								</div>

				      		</div>
				    	</div>
					</div>
					<!-- Editing of party economics ends here! -->

					<!-- Editing of companies starts here... -->
					<div class="panel panel-default">
				  		<div class="panel-heading" role="tab" id="edit-company-heading" data-toggle="collapse" data-target="#edit-company-collapse" data-parent="#accordion" aria-expanded="true" aria-controls="edit-company-collapse">
				  			<h4 class="panel-title">
				  				<a href="#collapseThree">
				  					Companies
				  				</a>
				  			</h4>
				  		</div>
				  		<div id="edit-company-collapse" class="panel-collapse collapse" role="tabpanel" aria-labelledby="edit-company-heading">
				  			<?php
				  				$result = $companies->select("*");
				  			?>
				  			<div class="panel-body">
				  				<div class="table-responsive">
					  				<table class="table table-bordered table-hover">
						  				<tr>
						  					<th>id</th>
						  					<th>Company</th>
						  					<th>Register Code</th>
						  					<th>Sector Code</th>
						  					<th>Sector Name</th>
						  					<th>Org</th>
						  					<th>
												<button type="button" data-target="add_finance_modal" class="btn btn-primary text-center disabled">Add Company</button>
						  					</th>
						  				</tr>
						  				<?php
						  					foreach ($result as $res) {
						  						echo "<tr>";
								      			echo "<td>".$res['id']."</td>";
								      			echo "<td>".$res['company']."</td>";
								      			echo "<td>".$res['reg_code']."</td>";
								      			echo "<td>".$res['sector_code']."</td>";
								      			echo "<td>".$res['sector_name']."</td>";
								      			echo "<td>".$res['org']."</td>";
								      			echo "<td class='text-center'>
													<button type='button' id='party_edit_".$res['index_id']."' class='btn btn-default' data-target='#edit_company_modal' data-toggle='modal'>
													<span class='glyphicon glyphicon-pencil'></span>
													</button>
													<button type='button' class='btn btn-default disabled'>
													<span class='glyphicon glyphicon-trash'></span>
													</button>
													</td>";
								      			echo "</tr>";
						  					}
						  				?>
						  			</table>
				  				</div>

					  			<div class="modal fade" id="edit_company_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
								  	<div class="modal-dialog">
								    	<div class="modal-content">
								   	  		<form action="">
										      	<div class="modal-header">
											        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
											        <h4 class="modal-title" id="myModalLabel">Edit Companies</h4>
										      	</div>
										      	<div class="modal-body" id="edit_output">
											       	
										      	</div>
										      	<div class="modal-footer">
											        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
											        <input type="submit" class="btn btn-primary disabled" value="Save Changes">
										      	</div>
								      		</form>
								    	</div>
								  	</div>
								</div>
				  			</div>
				  		</div>
				  	</div>
					<!-- Editing of companies ends here! -->

				</div>
			</div>
		</div>
	</div>
</body>
</html>