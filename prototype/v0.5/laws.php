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
            <?php include "templates/footer.php"; ?>
        </footer>

    </body>
</html>
