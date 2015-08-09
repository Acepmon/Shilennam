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
        <style>
        #cy {
          background-color: #FFF;
          min-height: 800px;
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
                    <div class="jumbotron" style="margin-bottom:0px;">
                        <h2 class="text-center">
                            Улс төрчдийн холбоо хамаарал
                        </h2>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="col-md-6" style="background-color: #FAFAFA; border-top: 1px solid lightgray; outline: 1px solid lightgray;">
                          <h3 class="text-center text-primary">Улс төрийн нам</h3>
                          <br>
                          <?php

                          $party = new db_cn\Table("party");
                          $result = $party->select("id, acronym, logo_url");
                          $broke = break_array($result, 3);
                          foreach ($broke as $results) {
                            echo "<div class='row'>";
                          foreach ($results as $res) {
                            $id = $res['id'];
                            $acronym = $res['acronym'];

                            $party_img = "resources/images/png/img_error.jpg";
                            if (empty($res['logo_url'])) {
                                $party_img = "resources/images/png/img_error.jpg";
                            } else {
                                $party_img = "resources/images/party/logos/" . $res['logo_url'];
                            }
                            ?>
                            <div class="col-md-4">
                              <div class="panel panel-default clickable-panel">
                                <div class="panel-heading">
                                  <h4 class="panel-title text-center"><?php echo $acronym; ?></h4>
                                </div>
                                <div class="panel-body">
                                  <img src="<?php echo $party_img; ?>" alt="" class="img-responsive">
                                </div>
                              </div>
                            </div>
                            <?php
                          }
                          echo "</div>";
                          }
                          ?>
                        </div>
                        <div class="col-md-6" style="background-color: #FAFAFA; border-top: 1px solid lightgray; outline: 1px solid lightgray;">
                          <h3 class="text-center text-primary">Хувийн байгууллага</h3>
                          <br>
                          <?php
              							$companies = new db_cn\Table("companies");
              							$result = $companies->select("*");
              							$broke = break_array($result, 3);
                            foreach ($broke as $results) {
                              echo "<div class='row'>";
              							foreach ($results as $res) {
              						?>

                          <div class="col-md-4">
                            <div class="panel panel-default clickable-panel">
                              <div class="panel-heading">
                                <h4 class="panel-title text-center"><?php echo $res['company']; ?></h4>
                              </div>
                              <!-- <ul class="list-group">
                                <li class="list-group-item"><?php echo $res['sector_code']; ?></li>
                                <li class="list-group-item"><?php echo $res['sector_name']; ?></li>
                              </ul> -->
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
        </div>


        <footer class="footer navbar navbar-fixed-bottom">
            <?php include "templates/footer.php"; ?>
        </footer>

    </body>
</html>
