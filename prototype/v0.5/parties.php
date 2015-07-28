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
            <?php include "templates/footer.php"; ?>
        </footer>

    </body>
</html>
