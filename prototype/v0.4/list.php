<!DOCTYPE html>
<html lang="en">
<head>
	<?php
		include 'backend/DB_CN.php';
	?>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<title>Шилэн Нам</title>

	<!-- Bootstrap -->
	<link href="css/bootstrap.min.css" rel="stylesheet">

	<!-- Vertical bootstrap tabs -->
	<link rel="stylesheet" href="css/bootstrap.vertical-tabs.min.css">

	<!-- Custom Css -->
	<link rel="stylesheet" href="css/global.css">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	
	<header>
		<?php
			include "templates/header.php";
		?>
	</header>
	
	<div class="lists">
		<div class="container row-fluid">
			<ul class="nav nav-tabs tabs-left span2">
				<li class="active"><a href="#parties" data-toggle="tab" aria-controls="parties">Улс төрийн намууд</a></li>
				<li><a href="#presidentials" data-toggle="tab" aria-controls="presidentials">Ерөнхийлөгчид нэр дэвшигчид</a></li>
				<li><a href="#circles" data-toggle="tab" aria-controls="circles">Тойргийн нэр дэвшигчид</a></li>
				<li><a href="#companies" data-toggle="tab" aria-controls="companies">Байгууллагууд</a></li>
				<li><a href="#presidential_economics" data-toggle="tab" aria-controls="presidential_economics">Ерөнхийлөгчийн сонгуулийн санхүүжилт</a></li>
			</ul>
			<div class="col-xs-9 tab-content span10">
				<div class="tab-pane active" id="parties">
					<br>
					<div class="col-sm-12 party-lists">
						
						<?php
							$party = new db_cn\Table("party");
							$results = $party->select("*");
			                foreach ($results as $res) {
			                	$party_img = "res/png/img_error.jpg";
			                	if (empty($res['logo_url'])) {
			                		$party_img = "res/png/img_error.jpg";
			                	} else {
			                		$party_img = "res/party/logos/".$res['logo_url'];
			                	}
						?>

						<div class="col-sm-12 party-list-item">
							<div class="party-list-item-container container-fluid well well-xs row fluid">
								<div class="col-sm-6 party-list-item-img span2">
									<img src="<?php echo $party_img; ?>" alt="" class="img-responsive">
								</div>
								<div class="col-sm-6 party-list-item-desc span10">
									<h2 class="party-title"><?php echo $res['title']; ?> <small>(<?php echo $res['acronym']; ?>)</small></h2>
									<hr>
									<p class="party-date"><?php echo $res['founded_in']; ?></p>
									<!-- <p class="party-description">
										
									</p> -->
									<table class="table table-borderless">
										<tr>
											<th>Намын дарга</th>
											<td><?php echo $res['leader']; ?></td>
										</tr>
										<tr>
											<th>Гишүүдийн тоо</th>
											<td><?php echo $res['member_count']; ?></td>
										</tr>
									</table>
									<div class="party-read">
										<a href="party.php?p_id=<?php echo $res['id'];?>" class="btn btn-default">Цааш унших</a>
									</div>
								</div>
							</div>
						</div>
						<?php
							}
						?>
					</div>
				</div>
				<div class="tab-pane" id="presidentials">
					
				</div>
				<div class="tab-pane" id="circles">
					
				</div>
				<div class="tab-pane" id="companies">
					<br>
					<div class="col-sm-12">
						<?php 
							$companies = new db_cn\Table("companies");
							$results = $companies->select("*");
							shuffle($results);
							foreach ($results as $res) {
						?>
						
						<div class="col-sm-6">
							<table class="table table-bordered">
								<tr>
									<th>Байгууллага</th>
									<td><?php echo $res['company']; ?></td>
								</tr>
								<tr>
									<th>Салбар дугаар</th>
									<td><?php echo $res['sector_code']; ?></td>
								</tr>
								<tr>
									<th>Салбар аж ахуй</th>
									<td><?php echo $res['sector_name']; ?></td>
								</tr>
							</table>	
						</div>

						<?php
							}
						?>
					</div>
				</div>
				<div class="tab-pane" id="presidential_economics">
					<br>
					<div class="col-sm-12">
						<?php 
							
						?>
					</div>
				</div>
			</div>
		</div>
	</div>


	<footer class="footer navbar navbar-fixed-bottom">
		<?php
			include "templates/footer.php";
		?>
	</footer>

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="js/jquery-1.11.2.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Custom Global Javascript and Jquery -->
	<script src="js/global.js"></script>
</body>
</html>