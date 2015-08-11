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

        <div class="container" id="party">

      		<div class="row">
      			<!-- Party logo goes here -->
      			<div class="col-md-6">
      				<div class="party_logo">
      					<img src="res/party/logos/AN_logo.png" alt="AN">
      				</div>
      			</div>

      			<!-- Party short description goes here -->
      			<div class="col-md-6">
      				<div class="party_short_desc">
      					<h1>
      						Ардчилсан нам <small>(АН)</small>
      					</h1>
      				</div>
      			</div>
      		</div>

      		<div class="row">
      			<div class="col-md-12">
      				<ul class="nav nav-pills" role="tablist">
      					<li role="presentation" class="active"><a href="#detailedInfo" aria-controls="detailedInfo" data-toggle="tab">Дэлгэрэнгүй мэдээлэл</a></li>
      					<li role="presentation"><a href="#partyEconomics" aria-controls="partyEconomics" data-toggle="tab">Намын санхүүжилт</a></li>
      				</ul>
      			</div>
      		</div>
      		<div class="tab-content row">
      			<div class="tab-pane active" id="detailedInfo" role="tabpanel">
      				<!-- Party social information goes here -->
      				<div class="col-md-6">
      					<div class="party_social">
      						<table class="table table-hover">
      							<tr>
      								<th>Регистрийн дугаар</th>
      								<td></td>
      							</tr>
      							<tr>
      								<th>Бүртгэлийн дугаар</th>
      								<td></td>
      							</tr>
      							<tr>
      								<th>Намын дарга</th>
      								<td></td>
      							</tr>
      							<tr>
      								<th>Гүшүүдийн тоо</th>
      								<td></td>
      							</tr>
      							<tr>
      								<th>Хаяг</th>
      								<td></td>
      							</tr>
      							<tr>
      								<th>Утас</th>
      								<td></td>
      							</tr>
      							<tr>
      								<th>Факс</th>
      								<td></td>
      							</tr>
      							<tr>
      								<th>Электрон шуудан</th>
      								<td></td>
      							</tr>
      							<tr>
      								<th>Веб сайт</th>
      								<td></td>
      							</tr>
      						</table>
      					</div>
      				</div>

      				<!-- Party founding information and law related goes here -->
      				<div class="col-md-6">
      					<div class="party-founding">
      						<table class="table table-hover">
      							<tr>
      								<th>Анх байгуулагдсан огноо</th>
      								<td></td>
      							</tr>
      							<tr>
      								<th>Үүсгэн байгуулах баримт бичгийн тухай</th>
      								<td></td>
      							</tr>
      							<tr>
      								<th>Улсын дээд шүүхэд бүртгүүлсэн огноо</th>
      								<td></td>
      							</tr>
      							<tr>
      								<th>Улсын бүртгэлийн гэрчилгээ олгогдсон огноо</th>
      								<td></td>
      							</tr>
      						</table>
      					</div>
      				</div>
      			</div>
      			<div class="tab-pane" id="partyEconomics" role="tabpanel">
      				<div class="col-md-12">

      				</div>
      			</div>
      		</div>
      	</div>

        <footer class="footer navbar navbar-fixed-bottom">
            <?php include "templates/footer.php"; ?>
        </footer>

    </body>
</html>
