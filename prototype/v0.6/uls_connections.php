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

        <div class="row-connections">
            <div class="container">
                <div class="some-links" id="uls_connections">
                    <div class="jumbotron">
                        <h2 class="text-center">
                            Улс төрчдийн холбоо хамаарал
                        </h2>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-md-12">
                        <?php
                            $db = new db_cn\Connector();
                            $db->query("select * from gishuun");
                            $result = $db->resultset();
                            $broke = break_array($result, 6);
                            foreach ($broke as $resu) {
                              echo "<div class='row'>";
                              foreach ($resu as $res) {
                              $db->query("select path from uploads where id = :id");
                              $db->bind(":id", $res['upload_pic']);
                              $img = $db->single()['path'];
                              ?>
                              <div class="col-md-2">
                              <div class="panel panel-default clickable-panel" data-target="<?php echo $res['name']; ?>" data-toggle="get_connected_gishuun" onclick="location.href='uls_connections_expand.php?expand=true&id=<?php echo $res['id']; ?>#uls_connections'">
                                <div class="panel-body" style="padding: 0px;">
                                  <img src="resources/uploads/<?php echo $img; ?>" alt="" class="img-responsive img-thumbnail">
                                </div>
                                <div class="panel-footer">
                                  <h4 class="panel-title">
                                    <?php echo $res['name']; ?>
                                  </h4>
                                </div>
                              </div>
                              </div>
                              <?php
                            }
                            echo "</div>";
                            }
                        ?>
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
