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

	<style type="text/css">
		.gov-party-lists {
			background: url("../res/patt/swirl_pattern2.png") repeat;
			padding-top: 20px;
			padding-bottom: 20px;
		}
		.gov-party-lists .gov-party-lists-item {
			width: 100%;
			background-color: #FAFAFA;
		}
		.gov-party-lists .gov-party-lists-item .party-img {
			width: 35%;
		}
		.gov-party-lists .gov-party-lists-item .party-desc {
			width: 60%;
			margin-left: 5%;
		}
	</style>
</head>
<body>
	
	<header>
		<?php
			include "templates/header.php";
		?>
	</header>

	<!-- Stored law information will be implemented here! -->
	
	<div class="container" id="laws">
		<h1 class='text-center'>Хуулиас</h1>

		<p style="font-size: 18px;">
			Улс төрийн намуудын санхүүжилттэй холбоотой хуулийн заалтуудаас түүвэрлэн авч ашиглахад хялбар байдлаар бэлтгэлээ. Хуулийн эхтэй нь танилцахыг хүсвэл <a target="_blank" href="http://www.legalinfo.mn">www.legalinfo.mn</a> сайт руу орж үзнэ үү.
		</p>
		
		<ul class='list-group'>
			<li class='list-group-item'>
				<h4 style="font-size: 16px;"><a href='#' data-toggle="collapse" data-target="#country_laws" aria-expanded="false">УЛС ТӨРИЙН НАМЫН ТУХАЙ</a></h4>
				<div id="country_laws" class='collapse out'>
					<ul class="nav nav-list">
					<?php 
						$laws = new db_cn\Table("laws");
						foreach ($laws->select("text,sanctions", "source = 'УЛС ТӨРИЙН НАМЫН ТУХАЙ'") as $law) {
					?>
						<li>
					  		<blockquote>
						    	<p><?php echo $law['text']; ?></p>
					  		</blockquote>
				  		</li>
			  		<?php
			  			}
			  		?>
			  		</ul>
		  		</div>
			</li>
			<li class='list-group-item'>
				<h4 style="font-size: 16px;"><a href='#' data-toggle="collapse" data-target="#congress_laws" aria-expanded="false">МОНГОЛ УЛСЫН ИХ ХУРЛЫН СОНГУУЛИЙН ТУХАЙ</a></h4>
		  		<div id="congress_laws" class='collapse out'>
		  			<ul class="nav nav-list">
		  			<?php
		  				foreach ($laws->select("text,sanctions", "source = 'МОНГОЛ УЛСЫН ИХ ХУРЛЫН СОНГУУЛИЙН ТУХАЙ'") as $law) {
		  			?>
		  				<li>
							<blockquote>
								<p><?php echo $law['text']; ?></p>
							</blockquote>
							<?php
							if (!is_null($law['sanctions'])) {
								echo "<ul><li>";
								echo "<blockquote>";
								echo "<p class='text-danger'>".$law['sanctions']."</p>";
								echo "</blockquote";
								echo "</li></ul>";
							}
							?>
						</li>
		  			<?php 
		  				}
		  			?>
		  			</ul>
		  		</div>
			</li>
		</ul>
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