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

        <script src="bower_components/cytoscape/cytoscape.min.js"></script>
        <script src="resources/js/cycode.js"></script>
        <script>
        $(document).ready(function() {
          function setDatasOfCy() {
            var eles = cy.add([
              { group: "nodes", data: { id: "n0" }, position: { x: 100, y: 100 } },
              { group: "nodes", data: { id: "n1" }, position: { x: 200, y: 200 } },
              { group: "edges", data: { id: "e0", source: "n0", target: "n1" } }
            ]);
          }
        });
        </script>
        <style>
        #cy {
          background-color: #FFF;
          min-height: 500px;
        }
        </style>
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

                          if (!empty($_GET['expand'])) {
                            ?>
                            <div class="col-md-10">
                              <a href="uls_connections.php#uls_connections" class="btn btn-primary">Буцах</a>
                              <button class="btn btn-info" onclick="setDatasOfCy()">ASD</button>
                            </div>
                            <div class="clearfix"></div>
                            <br>
                            <?php

                            $g_id = $_GET['id'];
                            $db = new db_cn\Connector();
                            $db->query("select * from gishuun where id = :id");
                            $db->bind(":id", $g_id);
                            $gishuun = $db->single();
                            $name = $gishuun['name'];
                            $db->query("select path from uploads where id = :id");
                            $db->bind(":id", $gishuun['upload_pic']);
                            $img = $db->single()['path'];
                            ?>
                            <div class="col-md-4">
                            <div class="panel panel-default clickable-panel" onclick="location.href='uls_connections.php?expand=true&id=<?php echo $g_id; ?>#uls_connections'">
                              <div class="panel-body" style="padding: 0px;">
                                <img src="resources/uploads/<?php echo $img; ?>" alt="" class="img-responsive img-thumbnail">
                              </div>
                              <div class="panel-footer">
                                <h4 class="panel-title">
                                  <?php echo $name; ?>
                                </h4>
                              </div>
                            </div>
                            </div>
                            <div class="col-md-8">
                              <div id="cy"></div>

                            </div>
                            <?php
                          } else {
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
                              <div class="panel panel-default clickable-panel" data-target="<?php echo $res['name']; ?>" data-toggle="get_connected_gishuun" onclick="location.href='uls_connections.php?expand=true&id=<?php echo $res['id']; ?>#uls_connections'">
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
