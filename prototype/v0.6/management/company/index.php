<!DOCTYPE html>
<html>
  <head>
    <title>Шилэн нам веб сайт менежмент</title>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Link rel to bootstrap -->
    <link rel="stylesheet" href="/prototype/v0.6/bower_components/bootstrap/dist/css/bootstrap.min.css"/>

    <!-- Management page custom css -->
    <link rel="stylesheet" href="/prototype/v0.6/resources/css/management.css">

    <!-- Font Awesome CDN -->
    <!-- <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet"> -->

    <?php include "../../models/DB_CN.php"; ?>
    <?php include "../../controllers/helper-functions.php"; ?>

  </head>
  <body class="management">

    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <a href="/" class="navbar-brand">Шилэн нам</a>
        <ul class="nav navbar-nav navbar-right">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Admin <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="#"><del>Нууц үг солих</del></a></li>
              <li><a href="#"><del>Хувийн мэдээлэл</del></a></li>
              <li role="separator" class="divider"></li>
              <li><a href="#">Гарах</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>

    <aside class="col-md-2">
      <div class="panel-group">
        <ul class="list-group">
          <li class="list-group-item"><a href="/prototype/v0.6/management/">Эхлэл</a></li>
        </ul>
      </div>
      <div class="panel-group" id="accordion1">
        <div class="panel panel-default panel-group-item">
          <div class="panel-heading" data-toggle="collapse" data-target="#news_menu" data-parent="#accordion1">
            <h3 class="panel-title">Мэдээ</h3>
          </div>
          <ul class="list-group collapse" id="news_menu">
            <li class="list-group-item"><a href="/prototype/v0.6/management/news/">Бүх мэдээг үзэх</a></li>
            <li class="list-group-item"><a href="/prototype/v0.6/management/news/publish-news/">Шинэ мэдээ оруулах</a></li>
          </ul>
        </div>
        <div class="panel panel-default panel-group-item">
          <div class="panel-heading" data-toggle="collapse" data-target="#party_menu" data-parent="#accordion1">
            <h3 class="panel-title">Улс төрийн нам</h3>
          </div>
          <ul class="list-group collapse" id="party_menu">
            <li class="list-group-item"><a href="/prototype/v0.6/management/party/members/">Улс төрийн гишүүд</a></li>
            <li class="list-group-item"><a href="/prototype/v0.6/management/party/party-lists/">Намуудын жагсаалт</a></li>
            <li class="list-group-item"><a href="/prototype/v0.6/management/party/irged-aan/">Иргэд аж ахуй нам</a></li>
          </ul>
        </div>
        <div class="panel panel-default panel-group-item">
          <div class="panel-heading" data-toggle="collapse" data-target="#company_menu" data-parent="#accordion1">
            <h3 class="panel-title">Байгууллага</h3>
          </div>
          <ul class="list-group collapse" id="company_menu">
            <li class="list-group-item"><a href="/prototype/v0.6/management/company/ediin_zasag/">Эдийн засгийн ангилал</a></li>
            <li class="list-group-item"><a href="/prototype/v0.6/management/company/">Байгууллагууд</a></li>
          </ul>
        </div>
      </div>
      <div class="panel-group" id="accordion2">
        <div class="panel panel-default panel-group-item">
          <div class="panel-heading" data-toggle="collapse" data-target="#img_menu" data-parent="accordion2">
            <h3 class="panel-title">Зураг</h3>
          </div>
          <ul class="list-group collapse" id="img_menu">
            <li class="list-group-item"><a href="/prototype/v0.6/management/uploads/">Бүх зураг үзэх</a></li>
            <li class="list-group-item"><a href="/prototype/v0.6/management/uploads/upload-new/">Шинээр зураг оруулах</a></li>
          </ul>
        </div>
      </div>
    </aside>

    <main class="col-md-10">
      <!-- Your stuff here -->
    </main>

    <!-- JQuery javascript api -->
    <script type="text/javascript" src="/prototype/v0.6/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap js file -->
    <script type="text/javascript" src="/prototype/v0.6/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Custom global js file -->
    <script type="text/javascript" src="/prototype/v0.6/resources/js/global.js"></script>

  </body>
</html>
