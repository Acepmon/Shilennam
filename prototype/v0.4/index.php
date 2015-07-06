<!DOCTYPE html>
<html lang="en">
<head>
	<?php
		include 'backend/DB_CN.php';
		include 'backend/helper.php';
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

	<div class="row-gov-party">
		<div class="container-fluid">
			<h3 class="text-center"><a href="list.php?list=party">Улс төрийн намууд</a></h3>
			<?php
				$party = new db_cn\Table("party");
				$results = $party->select("id,title,acronym, logo_url");
				$broken_results = break_array($results, 11);
				foreach ($broken_results as $result) {
					echo "<div class='row-centered'>";

					foreach ($result as $res) {
						$party_img = "res/png/img_error.jpg";
	                	if (empty($res['logo_url'])) {
	                		$party_img = "res/png/img_error.jpg";
	                	} else {
	                		$party_img = "res/party/logos/".$res['logo_url'];
	                	}
					?>
					<div class="gov-party col-sm-1 col-centered">
						<div class="well well-xs center-block">
							<div class="gov-party-img-holder">
								<img src="<?php echo $party_img; ?>" alt="">
							</div>
							<h4><a href="party.php?p_id=<?php echo $res['id']; ?>" title="<?php echo $res['title']; ?>"><?php echo $res['acronym']; ?></a></h4>
						</div>
					</div>
					<?php
					}
					echo "</div>";
					
                }
            ?>
		</div>
	</div>

	<!-- <div class="row-gov-party-eco">
		<div class="container">
			<h3 class="text-center"><a href="economics.php#eco">Намуудын санхүүжилт</a></h3>
			<div class="table-responsive">
				<table class="table">
		      		<tr>
		      			<th><a href='parties.php?'>Улс төрийн нам</a></th>
		      			<th><a href='economics.php?year=2012#eco'>Нийт санхүүжилт</a></th>
		      			<th><a href='economics.php?year=2012#eco'>Нийт үрэлт</a></th>
		      			<th>Бэлэн байгаа</th>
		      			<th>Өр зээл</th>
		      		</tr>
			      	<?php
			      		// $finance = new db_cn\Table("finance");
			      		// $party = new db_cn\Table("party");
			      		// $income = new db_cn\Table("income");
			      		// $outcome = new db_cn\Table("outcome");
			      		// $list = new db_cn\Table("party_financial_list");
			      		// $result = $list->select("financeid,partyid,outcomeid,incomeid");
			      		// foreach ($result as $res) {
			      		// 	$finance_res = $finance->selectFirst("debt,remaining", "id = ".$res['financeid']);
			      		// 	$party_res =$party->selectFirst("id, title,acronym", "id = ".$res['partyid']);
			      		// 	$outcome_res = $outcome->selectFirst("total", "id = ".$res['outcomeid']);
			      		// 	$income_res = $income->selectFirst("total", "id = ".$res['incomeid']);

			      		// 	echo "<tr>";
			      		// 	echo "<td title='".$party_res['acronym']."'><a href='party.php?p_id=".$party_res['id']."'>".$party_res['title']."</a></td>";
			      		// 	echo "<td>".$income_res['total']."</td>";
			      		// 	echo "<td>".$outcome_res['total']."</td>";
			      		// 	echo "<td>".$finance_res['remaining']."</td>";
			      		// 	echo "<td>".$finance_res['debt']."</td>";
			      		// 	echo "</tr>";
			      		// }
			      	?>
		      	</table>
			</div>
		</div>
	</div> -->

	<div class="poll">
		<div class="container">
			<h3 class="text-center">Санал асуулга</h3>
			<h5 class="text-center"><b>Шилэн Нам: </b>Таны бодлоор улс төрийн намуудын санхүүжилт ил тод байх ёстой юу?</h5>
			<form>
				<div class="radio"><label><input type="radio" name="poll">Тийм</label></div>
				<div class="radio"><label><input type="radio" name="poll">Үгүй</label></div>
				<div class="radio"><label><input type="radio" name="poll">Чухал биш</label></div>
			</form>
		</div>
	</div>

	<div class="contact">
		<div class="container">
			<div class="col-lg-4">
				<h3 class="text-center">Холбоо барих</h3>
			</div>
			<div class="col-lg-8">
				<form action="" class="form-horizontal">
					<div class="form-group col-md-4">
						<label for="firstname">НЭР:*</label><br/>
						<input type="text" id="firstname">
					</div>
					<div class="form-group col-md-4">
						<label for="email">И-МЭЙЛ:*</label><br/>
						<input type="text" id="email">
					</div>
					<div class="form-group col-md-8">
						<label for="message">МЭССЭЖ:*</label>
						<textarea class="form-control" rows="5" id="message"></textarea>
					</div>
					<div class="form-group col-md-8">
						<button type="submit" class="btn btn-default">ИЛГЭЭХ</button>
					</div>
				</form>
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