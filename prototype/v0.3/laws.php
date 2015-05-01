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
		<div class="row-quick-link">
			<div class="container">
				<div class="pull-left">
					<a href="#" class="btn btn-sm">Тусламж</a>
					<a href="#" class="btn btn-sm">Бидэнтэй холбогдох</a>
					<a href="manage/" class="btn btn-sm">Менежмент</a>
				</div>
				<div class="pull-right">
					<a href="https://www.facebook.com/pages/Shilennam/633649973430676" target="_blank" class="btn btn-sm"><img class='img-responsive' src="res/png/fb-white.png" alt="png"></a>
					<a href="https://twitter.com/shilennam" target="_blank" class="btn btn-sm"><img class='img-responsive' src="res/png/twitter-white.png" alt="png"></a>
					<a href="#" class="btn btn-sm">
						<span class="glyphicon glyphicon-search"></span>
					</a>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
		<div class="row-menu">
			<nav class="navbar navbar-default navbar-md">
				<div class="container">
					<div id="generated-menus">
						<div class="navbar-header">
							<a href="index.php" class="navbar-brand">Шилэн Нам</a>
						</div>
						<ul class="nav navbar-nav">
							<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">НАМУУДЫН САНХҮҮЖИЛТ <span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li><a href="#">УЛСЫН ТӨСӨВ</a></li>
									<li><a href="#">ХАНДИВААР</a></li>
									<li><a href="#">ГИШҮҮДИЙН ТАТВАР</a></li>
									<li><a href="#">ХУУЛИАР ЗӨВШӨӨРСӨН</a></li>
									<li><a href="#">БУСАД</a></li>
								</ul>
							</li>
							<li><a href="news.php#news">МЭДЭЭ МЭДЭЭЛЭЛ</a></li>
							<li><a href="laws.php#laws">ХУУЛИАС</a></li>
							<li><a href="#">УЛС ТӨРЧДИЙН ХАМААРАЛ</a></li>
							<li><a href="#">ХОЛБООСУУД</a></li>
						</ul>
					</div>
				</div>
			</nav>
		</div>

		<div id="slide" class="carousel slide" data-ride="carousel">
			<!-- Indicators -->
		    <ol class="carousel-indicators">
		      <li data-target="#slide" data-slide-to="0" class="active"></li>
		      <li data-target="#slide" data-slide-to="1"></li>
		      <li data-target="#slide" data-slide-to="2"></li>
		    </ol>

		    <!-- Wrapper for slides -->
		    <div class="carousel-inner" role="listbox">
			<?php
				$for_once = false;
				$laws = new db_cn\Table("laws");
				$result = $laws->select("text,sanctions,source", "sanctions is not null");
				for ($a = 0; $a < 4; $a++) {
					$randomIndex = rand(0, sizeof($result)-1);
					$random3 = rand(1, 3);
			?>
				<div class="item <?php if ($for_once == false) { echo "active"; $for_once = true; } ?>">
			      	<img src="res/img/ub<?php echo $random3; ?>.jpg" alt="Steppe">
			      	<div class="carousel-caption">
						<?php
							echo "<h3>".$result[$randomIndex]['source']."</h3>";
							echo "<blockquote><a href='laws.php'>".$result[$randomIndex]['text']."</a></blockquote>";
							echo "<blockquote><p>".$result[$randomIndex]['sanctions']."</p></blockquote>";
						?>

			      	</div>
		      	</div>
	      	<?php 
	      		}
	      	?>
		    </div>

		    <!-- Left and right controls -->
		    <a class="left carousel-control" href="#slide" role="button" data-slide="prev">
		      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
		      <span class="sr-only">Previous</span>
		    </a>
		    <a class="right carousel-control" href="#slide" role="button" data-slide="next">
		      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
		      <span class="sr-only">Next</span>
		    </a>
		</div>
	</header>

	<!-- Stored law information will be implemented here! -->
	
	<div class="container" id="laws">
		<h1 class='text-center'>Хуулиас</h1>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur odit unde accusantium deserunt cumque soluta ea nemo neque voluptatibus et sequi, tempora, obcaecati officia. Dolore culpa ratione reiciendis ducimus minus! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate beatae ratione magni minima voluptatem doloremque, tenetur facilis soluta blanditiis, vero autem laboriosam, labore quos maiores consectetur? Deleniti sed, quos veritatis.</p>
		
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
		<div class="container">
			<div class="row">
				<a href="index.php">ЭХЛЭЛ</a>
				<a href="economics.php#eco">НАМУУДЫН САНХҮҮЖИЛТ</a>
				<a href="news.php#news">МЭДЭЭ МЭДЭЭЛЭЛ</a>
				<a href="manage/">МЕНЕЖМЕНТ</a>
				<a href="laws.php#laws">ХУУЛИАС</a>
				<a href="#"><del>УЛС ТӨРӨГЧДИЙН ХАМААРАЛ</del></a>
				<a href="#"><del>ХОЛБООСУУД</del></a>
			</div>
			<div class="row">
				<i>Copyright© 2015 . Шилэн Данс</i>
			</div>
		</div>
	</footer>

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="js/jquery-1.11.2.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Custom Global Javascript and Jquery -->
	<script src="js/global.js"></script>
</body>
</html>