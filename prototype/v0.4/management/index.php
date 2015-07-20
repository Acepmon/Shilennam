<!DOCTYPE html>
<html>
  <head>
    <title>Shilennam Management</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/bootstrap.min.css" media="screen" title="no title" charset="utf-8">
    <link rel="stylesheet" href="../css/management.css" media="screen" title="no title" charset="utf-8">
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">

    <script type="text/javascript" src="../js/jquery-1.11.2.min.js"></script>
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../js/angular.min.js"></script>
    <script type="text/javascript" src="js/management.js"></script>

    <?php
    require_once '../backend/DB_CN.php';
    require_once '../backend/functions.php';
    ?>
  </head>
  <body class="management">
    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <a href="#" class="navbar-brand">Шилэн нам</a>
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
      <div class="panel-group" id="accordion1">
        <div class="panel panel-default panel-group-item">
          <div class="panel-heading" data-toggle="collapse" data-target="#news_menu" data-parent="#accordion1">
            <h3 class="panel-title">Мэдээ</h3>
          </div>
          <ul class="list-group collapse" id="news_menu">
            <li class="list-group-item"><a href="#">Шинэ мэдээ оруулах</a></li>
            <li class="list-group-item"><a href="#">Бүх мэдээг үзэх</a></li>
            <li class="list-group-item"><a href="#">Мэдээ засварлах / устгах</a></li>
          </ul>
        </div>
        <div class="panel panel-default panel-group-item">
          <div class="panel-heading" data-toggle="collapse" data-target="#party_menu" data-parent="#accordion1">
            <h3 class="panel-title">Улс төрийн нам</h3>
          </div>
          <ul class="list-group collapse" id="party_menu">
            <li class="list-group-item"><a href="#">Намуудын жагсаалт</a></li>
            <li class="list-group-item"><a href="#">Иргэд аж ахуй нам</a></li>
          </ul>
        </div>
        <div class="panel panel-default panel-group-item">
          <div class="panel-heading" data-toggle="collapse" data-target="#company_menu" data-parent="#accordion1">
            <h3 class="panel-title">Байгууллага</h3>
          </div>
          <ul class="list-group collapse" id="company_menu">
            <li class="list-group-item"><a href="#">Эдийн засгийн ангилал</a></li>
            <li class="list-group-item"><a href="#">Байгууллагууд</a></li>
          </ul>
        </div>
      </div>
      <div class="panel-group" id="accordion2">
        <div class="panel panel-default panel-group-item">
          <div class="panel-heading" data-toggle="collapse" data-target="#img_menu" data-parent="accordion2">
            <h3 class="panel-title">Зураг</h3>
          </div>
          <ul class="list-group collapse" id="img_menu">
            <li class="list-group-item"><a href="#">Бүх зураг үзэх</a></li>
            <li class="list-group-item"><a href="#">Шинээр зураг оруулах</a></li>
          </ul>
        </div>
      </div>
    </aside>
    <main class="col-md-10">
      <h1 class="text-primary">Менежментийн хэсэг</h1>
      <hr>
      <div class="row">
        <div class="col-lg-5">
          <div class="panel panel-success">
            <div class="panel-heading">
              <h3 class="panel-title">Шинэ мэдээ оруулах</h3>
              <span class="pull-right clickable" data-effect="fadeOut"><i class="fa fa-times"></i></span>
            </div>
            <div class="panel-body">
              <form action="">
                <fieldset class="form-group">
                  <label for="">Гарчиг</label>
                  <input type="text" class="form-control">
                </fieldset>
                <fieldset class="form-group">
                  <label for="">Огноо</label>
                  <input type="text" class="form-control">
                </fieldset>
                <fieldset class="form-group">
                  <label for="">Нүүр зураг</label>
                  <select name="" id="" class="form-control"></select>
                </fieldset>
                <fieldset class="form-group">
                  <label for="">Бага хэмжээний зураг</label>
                  <select name="" id="" class="form-control"></select>
                </fieldset>
                <fieldset class="form-group">
                  <label for="">Дэлгэрэнгүй тайлбар</label>
                  <textarea name="" id="" cols="30" rows="10" class="form-control"></textarea>
                </fieldset>
                <fieldset class="form-group">
                  <input type="reset" value="Цэвэрлэх" class="btn btn-default">
                  <input type="submit" name="name" value="Батлах" class="btn btn-primary">
                </fieldset>
              </form>
            </div>
          </div>
        </div>
        <div class="col-lg-7">
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title">Бүх мэдээ</h3>
              <span class="pull-right clickable" data-effect="fadeOut"><i class="fa fa-times"></i></span>
            </div>
              <table class="table">
                <tr>
                  <th>Зураг</th>
                  <th>Гарчиг</th>
                  <th>Огноо</th>
                  <th>Үйлдлүүд</th>
                </tr>
              <?php
              $news = new db_cn\Table("news");
              $uploads = new db_cn\Table("uploads");
              $result = $news->select("*");
              // echo "<pre>", print_r($result), "</pre>";
              foreach ($result as $res) {
                $path = $uploads->selectFirst("path", "id = "+$res['img_upload_id'])['path'];
                echo "<tr>";
                echo "<td><img src='../uploads/$path' class='img-responsive'></td>";
                echo "<td><h5>".$res['title']."</h5></td>";
                echo "<td><i>".$res['date']."</i></td>";
                echo "<td>
                <a href='' class='btn btn-default'><span class='glyphicon glyphicon-eye-open'></span></a>
                <a href='' class='btn btn-default'><span class='glyphicon glyphicon-pencil'></span></a>
                <a href='' class='btn btn-default'><span class='glyphicon glyphicon-trash'></span></a>
                </td>";
                echo "</tr>";
              }
              ?>
              </table>
          </div>
        </div>
        <div class="col-lg-7">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">Бүх зураг</h3>
              <span class="pull-right clickable" data-effect="fadeOut"><i class="fa fa-times"></i></span>
            </div>
            <table class="table table-hover table-bordered">
              <tr>
                <th>Зураг</th>
                <th>Нэр</th>
                <th>Файл</th>
              </tr>
              <?php
              $uploads = new db_cn\Table("uploads");
              $result = $uploads->select("*");
              // echo "<pre>", print_r($result), "</pre>";
              foreach ($result as $res) {
                echo "<tr>";
                echo "<td><img src='../uploads/".$res['path']."' class='img-responsive'></td>";
                echo "<td><h5>".$res['name']."</h5></td>";
                echo "<td><i>".$res['path']."</i></td>";
                echo "</tr>";
              }
              ?>
            </table>
          </div>
        </div>
      </div>
      <div class="row">

      </div>
    </main>
  </body>
</html>
