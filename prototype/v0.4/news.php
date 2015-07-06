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

	<div class="content">
		<div class="container article-list" id="news">
			<div class="col-lg-9">
				<div class="row well well-sm">
					<div class="col-lg-3">
						<img src="res/news/article1_img1_thumb.jpg" alt="Article 1">
					</div>
					<div class="col-lg-7">
						<h4><a href="news-article.php#article">Тэнгэрлэг сайхан ээжүүд баярын арга хэмжээ боллоо</a></h4>
						<small>Тэнгэрлэг сайхан ээжүүд баярын арга хэмжээ боллоо Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</small>
						<br/>
						<span>2015 оны 3-р сарын 8</span>
					</div>
				</div>
				<div class="row well well-sm">
					<div class="col-lg-3">
						<img src="res/news/article1_img1_thumb.jpg" alt="Article 1">
					</div>
					<div class="col-lg-7">
						<h4><a href="news-article.php#article">Тэнгэрлэг сайхан ээжүүд баярын арга хэмжээ боллоо</a></h4>
						<small>Тэнгэрлэг сайхан ээжүүд баярын арга хэмжээ боллоо Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</small>
						<br/>
						<span>2015 оны 3-р сарын 8</span>
					</div>
				</div>
				<div class="row well well-sm">
					<div class="col-lg-3">
						<img src="res/news/article1_img1_thumb.jpg" alt="Article 1">
					</div>
					<div class="col-lg-7">
						<h4><a href="news-article.php#article">Тэнгэрлэг сайхан ээжүүд баярын арга хэмжээ боллоо</a></h4>
						<small>Тэнгэрлэг сайхан ээжүүд баярын арга хэмжээ боллоо Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</small>
						<br/>
						<span>2015 оны 3-р сарын 8</span>
					</div>
				</div>
			</div>
			<div class="col-lg-3">
				<div class="panel panel-primary tweets">
					<div class="panel-heading text-center">
						<img src="res/png/twitter-white.png" alt="twitter" class="left-block">
						<span>ХЭН ЮУ ГЭЖ ЖИРГЭВ?</span>	
					</div>
					<div class="panel-body">
						<a class="twitter-timeline" data-dnt="true" href="https://twitter.com/shilennam" data-widget-id="577928259876225024">Tweets by @shilennam</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
					</div>
				</div>
				<div class="panel panel-default mini-poll">
					<div class="panel-heading text-center">
						<span>САНАЛ АСУУЛГА</span>
					</div>
					<div class="panel-body">
						<h5 class="text-center"><b>Шилэн Нам: </b>Таны бодлоор улс төрийн намуудын санхүүжилт ил тод байх ёстой юу?</h5>
						<form>
							<div class="radio"><label><input type="radio" name="poll">Тийм</label></div>
							<div class="radio"><label><input type="radio" name="poll">Үгүй</label></div>
							<div class="radio"><label><input type="radio" name="poll">Чухал биш</label></div>
						</form>
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