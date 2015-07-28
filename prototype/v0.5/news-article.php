<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Шилэн нам</title>

        <?php include "templates/links-to-css.php"; ?>
        <?php include "templates/links-to-js.php"; ?>
        <?php include "models/DB_CN.php"; ?>
        <?php include "controllers/helper-functions.php"; ?>

    </head>
    <body>

        <header>
            <?php include "templates/header.php"; ?>
        </header>

        <div class="content">
      		<div class="container article" id="article">
      			<div class="col-lg-9">

              <?php

              $id = isset($_GET['article']) ? $_GET['article'] : "";
              if (!empty($id)) {
                $news = new db_cn\Table("news");
                $uploads = new db_cn\Table("uploads");
                $result = $news->selectFirst("*", "id = ".$id);
                $title = $result['title'];
                $date = $result['date'];
                $desc = $result['description'];
                $img = $uploads->selectFirst("path", "id = ".$result['img_upload_id'])['path'];
                ?>
                <header class="well well-sm">
        					<h3><?php echo $title; ?></h3>
        					<span><?php echo $date; ?></span>
        					<img src="resources/uploads/<?php echo $img; ?>">
        				</header>
        				<section class="well well-sm">
        					<p><?php echo $desc; ?></p>
        				</section>
        				<footer>

        				</footer>
                <?php
              }
              ?>
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
            <?php include "templates/footer.php"; ?>
        </footer>

    </body>
</html>
