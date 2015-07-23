<?php include_once "../../models/DB_CN.php"; ?>
<?php include_once "../../controllers/helper-functions.php"; ?>

<div class="lists" ng-controller="listsCtrl">
  <div class="container row-fluid">
    <ul class="nav nav-tabs tabs-left span2">
      <li class="active"><a data-toggle="tab" data-target="#parties" aria-controls="parties">Улс төрийн намууд</a></li>
      <li><a data-toggle="tab" data-target="#presidentials" aria-controls="presidentials">Ерөнхийлөгчид нэр дэвшигчид</a></li>
      <li><a data-toggle="tab" data-target="#circles" aria-controls="circles">Тойргийн нэр дэвшигчид</a></li>
      <li><a data-toggle="tab" data-target="#companies" aria-controls="companies">Байгууллагууд</a></li>
      <li><a data-toggle="tab" data-target="#presidential_economics" aria-controls="presidential_economics">Ерөнхийлөгчийн сонгуулийн санхүүжилт</a></li>
    </ul>
    <div class="col-xs-9 tab-content span10">
      <div class="tab-pane active" id="parties">
        <br>
        <div class="col-sm-12 party-lists">

          <?php
            $party = new db_cn\Table("party");
            $results = $party->select("*");
                    foreach ($results as $res) {
                      $party_img = "res/png/img_error.jpg";
                      if (empty($res['logo_url'])) {
                        $party_img = "resources/images/png/img_error.jpg";
                      } else {
                        $party_img = "resources/images/party/logos/".$res['logo_url'];
                      }
          ?>

          <div class="col-sm-12 party-list-item">
            <div class="party-list-item-container container-fluid well well-xs row fluid">
              <div class="col-sm-6 party-list-item-img span2">
                <img src="<?php echo $party_img; ?>" alt="" class="img-responsive">
              </div>
              <div class="col-sm-6 party-list-item-desc span10">
                <h2 class="party-title"><?php echo $res['title']; ?> <small>(<?php echo $res['acronym']; ?>)</small></h2>
                <hr>
                <p class="party-date"><?php echo $res['founded_in']; ?></p>
                <!-- <p class="party-description">

                </p> -->
                <table class="table table-borderless">
                  <tr>
                    <th>Намын дарга</th>
                    <td><?php echo $res['leader']; ?></td>
                  </tr>
                  <tr>
                    <th>Гишүүдийн тоо</th>
                    <td><?php echo $res['member_count']; ?></td>
                  </tr>
                </table>
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
      <div class="tab-pane" id="presidentials">

      </div>
      <div class="tab-pane" id="circles">

      </div>
      <div class="tab-pane" id="companies">
        <br>
        <div class="col-sm-12">
          <?php
            $companies = new db_cn\Table("companies");
            $results = $companies->select("*");
            shuffle($results);
            foreach ($results as $res) {
          ?>

          <div class="col-sm-6">
            <table class="table table-bordered">
              <tr>
                <th>Байгууллага</th>
                <td><?php echo $res['company']; ?></td>
              </tr>
              <tr>
                <th>Салбар дугаар</th>
                <td><?php echo $res['sector_code']; ?></td>
              </tr>
              <tr>
                <th>Салбар аж ахуй</th>
                <td><?php echo $res['sector_name']; ?></td>
              </tr>
            </table>
          </div>

          <?php
            }
          ?>
        </div>
      </div>
      <div class="tab-pane" id="presidential_economics">
        <br>
        <div class="col-sm-12">
          <?php

          ?>
        </div>
      </div>
    </div>
  </div>
</div>
