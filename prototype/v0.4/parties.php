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

	<div class="gov-party-lists">
		<div class="container">
			<div class="col-lg-12 party-lists">
				
				<?php
					$party = new db_cn\Table("party");
					$results = $party->select("id, title,acronym, logo_url");
	                foreach ($results as $res) { 
				?>

				<div class="col-lg-9 party-list-item">
					<div class="party-list-item-container container-fluid well well-xs">
						<div class="col-lg-6 party-list-item-img">
							<img src="res/party/logos/<?php echo $res['logo_url']; ?>" alt="" class="img-responsive">
						</div>
						<div class="col-lg-6 party-list-item-desc">
							<h2 class="party-title"><?php echo $res['title']; ?> <small>(<?php echo $res['acronym']; ?>)</small></h2>
							<hr>
							<p class="party-date">2015.03.15</p>
							<p class="party-description">Lorem ipsum dolor siicing elit. Quo incidunt deleniti at velit tempore ad nobis odio sint 
								laboriosam asperiores molestias reprehenderit
							</p>
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