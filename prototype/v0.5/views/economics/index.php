<?php include "../../models/db_cn.php"; ?>
<?php include "../../controllers/helper-functions.php"; ?>

<?php $tab = isset($_GET['tab']) ? $_GET['tab'] : ""; ?>

<div class="content">
    <div class="container economics" id="eco">
        <div class="col-lg-9 well well-sm">
            <ul class="nav nav-tabs">
                <li <?php if ($tab === "1") { echo "class='active'"; } ?>><a data-toggle="tab" data-target="#party-economics-tab-songuuli">Сонгуулийн санхүүжилт</a></li>
                <li <?php if ($tab === "2") { echo "class='active'"; } ?>><a data-toggle="tab" data-target="#party-economics-tab-nam">Намуудын санхүүжилт</a></li>
                <li <?php if ($tab === "3") { echo "class='active'"; } ?>><a data-toggle="tab" data-target="#party-economics-tab-ediinzasag">Эдийн засгийн ангилал</a></li>
                <!--
                <li><a data-toggle='tab' href="#party-economics-tab-income">Income</a></li>
                <li><a data-toggle='tab' href="#party-economics-tab-outcome">Income</a></li> -->
            </ul>
            <div class="tab-content">
                <?php
                $party_finance_list = new db_cn\Table("party_financial_list");
                $finance = new db_cn\Table("finance");
                $party = new db_cn\Table("party");
                $income = new db_cn\Table("income");
                $outcome = new db_cn\Table("outcome");
                $companies = new db_cn\Table("companies");
                ?>
                <div id="party-economics-tab-songuuli" class="tab-pane fade in <?php if ($tab === "1") { echo "active"; } ?>">


                    <div class="row">
                        <div class="dropdown pull-left" style="margin-right: 10px; margin-left: 15px;">
                            <button class="btn btn-default dropdown-toggle" type="button" id="election" data-toggle="dropdown">Сонгуулийн жил <span class="caret"></span></button>
                            <ul class="dropdown-menu" role="menu" aria-labelledby="election">
                                <li role="presentation"><a role="menuitem" href="economics.php?tab=1&year=all#eco">Бүгд</a></li>
                                <li role="presentation"><a role="menuitem" href="economics.php?tab=1&year=2013#eco">2013 - <i>Ерөнхийлөгчийн сонгууль</i></a></li>
                                <li role="presentation"><a role="menuitem" href="economics.php?tab=1&year=2012#eco">2012 - <i>УИХ-ын сонгууль</i></a></li>
                                <li role="presentation"><a role="menuitem" href="economics.php?tab=1&year=2009#eco">2009 - <i>Ерөнхийлөгчийн сонгууль</i></a></li>
                                <li role="presentation"><a role="menuitem" href="economics.php?tab=1&year=2008#eco">2008 - <i>УИХ-ын сонгууль</i></a></li>
                            </ul>

                        </div>
                        <?php
                        $y_str = "";
                        if (isset($_GET['year'])) {
                            if ($_GET['year'] == "all") {
                                echo "<h4 class='text-primary'>";
                                echo "Бүх оны сонгуулийн санхүүжилт";
                                echo "</h4>";
                            } else {
                                $y = $_GET['year'];
                                if ($y % 2 == 0) {
                                    $y_str = "УИХ";
                                } else {
                                    $y_str = "ерөнхийлөгчийн";
                                }
                                echo "<h4 class='text-primary'>";
                                echo $_GET['year'] . " оны " . $y_str . " сонгуулийн санхүүжилт";
                                echo "</h4>";
                            }
                        } else {
                            echo "<div class='alert alert-info'>Сонгуулийн жил сонгоно уу!</div>";
                        }
                        ?>
                        <div class="clearfix"></div>
                    </div>


                    <?php
                    if (isset($_GET['request']) & isset($_GET['target'])) {
                        $request = $_GET['request'];
                        $target_id = $_GET['target'];

                        if ($request == "income") {
                            $result = $income->select("*", "id = " . $target_id);
                            echo "<div class='table-responsive'>";
                            echo "<table class='table table-condensed table-bordered table-hover' align='left'>";
                            echo "<tr>";
                            echo "<th>Нам, эвсэл, бие даан нэр дэвшигчийн өөрийн хөрөнгөөс өгсөн</th>";
                            echo "<th>Хуулийн этгээдээс өгсөн хандив</th>";
                            echo "<th>Иргэдээс өгсөн хандив</th>";
                            echo "<th>Бусад</th>";
                            echo "<th>талархан дэмжигч намаас</th>";
                            echo "<th>Орлогын дүн</th>";
                            echo "</tr>";
                            foreach ($result as $row) {
                                echo "<tr>";
                                echo "<td>" . $row['from_inside'] . "</td>";
                                echo "<td>" . $row['from_candidate'] . "</td>";
                                echo "<td>" . $row['from_people'] . "</td>";
                                echo "<td>" . $row['other_parties'] . "</td>";
                                echo "<td>" . $row['other'] . "</td>";
                                echo "<td>" . $row['total'] . "</td>";
                                echo "</tr>";
                            }
                            echo "</table>";
                            echo "</div>";
                        } else if ($request == "outcome") {
                            $result = $outcome->select("*", "id = " . $target_id);
                            echo "<div class='table-responsive'>";
                            echo "<table class='table table-condensed table-bordered table-hover' align='left'>";
                            echo "<tr>";
                            echo "<th>Нам, эвслийн мөрийн хөтөлбөрийг тайлбарлан таниулах</th>";
                            echo "<th>Нэр дэвшигчийг сурталчлах</th>";
                            echo "<th>Уулзалт, хурал цуглаан зохион байгуулах</th>";
                            echo "<th>Ажилтан, ухуулагч, шадар туслагчийн хөлс, урамшуулал</th>";
                            echo "<th>Бичиг хэрэг</th>";
                            echo "<th>Шуудан холбоо</th>";
                            echo "<th>Шатахуун, унаа</th>";
                            echo "<th>Томилолт</th>";
                            echo "<th>Бусад</th>";
                            echo "<th>Зардлын дүн</th>";
                            echo "</tr>";
                            foreach ($result as $row) {
                                echo "<tr>";
                                echo "<td>" . $row['presentation'] . "</td>";
                                echo "<td>" . $row['advertisement'] . "</td>";
                                echo "<td>" . $row['management'] . "</td>";
                                echo "<td>" . $row['employee_salary'] . "</td>";
                                echo "<td>" . $row['chancery'] . "</td>";
                                echo "<td>" . $row['mail_and_shipping'] . "</td>";
                                echo "<td>" . $row['transportation'] . "</td>";
                                echo "<td>" . $row['assignment'] . "</td>";
                                echo "<td>" . $row['other'] . "</td>";
                                echo "<td>" . $row['total'] . "</td>";
                                echo "</tr>";
                            }
                            echo "</table>";
                            echo "</div>";
                        }
                    }
                    ?>
                    <?php
                    if (isset($_GET['year'])) {
                        $year = $_GET['year'];
                        if ($year == "all") {
                            ?>
                            <div class='table-responsive'>
                                <table class="table table-condensed table-bordered table-hover" align="left">
                                    <tr>
                                        <th><a href='list.php?list=party'>Улс төрийн нам</a></th>
                                        <th style="width: 85px;"><a href="economics.php?tab=1&year=<?php echo $year; ?>#eco">Огноо</a></th>
                                        <th><a href='economics.php?tab=1&year=<?php echo $year; ?>#eco'>Нийт санхүүжилт</a></th>
                                        <th><a href='economics.php?tab=1&year=<?php echo $year; ?>#eco'>Нийт зарцуулалт</a></th>
                                        <th><a href="economics.php?tab=1&year=<?php echo $year; ?>#eco">Бэлэн байгаа</a></th>
                                        <th><a href="economics.php?tab=1&year=<?php echo $year; ?>#eco">Өр зээл</a></th>
                                    </tr>
                                    <?php
                                    $res = $finance->select("id");

                                    $f_party_id = 0;
                                    for ($i = 0; $i < sizeof($res); $i++) {
                                        $inner_result = $party_finance_list->select("financeid,partyid,outcomeid,incomeid", "financeid = " . $res[$i]['id']);

                                        for ($in = 0; $in < sizeof($inner_result); $in++) {
                                            $finance_res = $finance->selectFirst("year,month,day,debt,remaining", "id = " . $inner_result[$in]['financeid']);
                                            $party_res = $party->selectFirst("id, title, acronym", "id = " . $inner_result[$in]['partyid']);
                                            $outcome_res = $outcome->selectFirst("id, total", "id = " . $inner_result[$in]['outcomeid']);
                                            $income_res = $income->selectFirst("id, total", "id = " . $inner_result[$in]['incomeid']);

                                            $total_income = $income_res['total'];
                                            $total_outcome = $outcome_res['total'];
                                            $total_rem = $finance_res['remaining'];
                                            $total_debt = $finance_res['debt'];

                                            $fi_id = $inner_result[$in]['financeid'];

                                            if ($fi_id == 18) {
                                                $total_income = 14471847.1;
                                                $total_outcome = 14252447;
                                                $total_rem = 219400.1;
                                                $total_debt = 9960;
                                            } else if ($fi_id == 20) {
                                                $total_income = 1293467.4;
                                                $total_outcome = 1289953.8;
                                                $total_rem = 3513.6;
                                                $total_debt = 0;
                                            } else if ($fi_id == 22) {
                                                $total_income = 302150.6;
                                                $total_outcome = 298211;
                                                $total_rem = 3939.6;
                                                $total_debt = 0;
                                            } else if ($fi_id == 24) {
                                                $total_income = 16192643.1;
                                                $total_outcome = 16141128.4;
                                                $total_rem = 50514.7;
                                                $total_debt = 1000;
                                            } else if ($fi_id == 27) {
                                                $total_income = 102049.8;
                                                $total_outcome = 102165.15;
                                                $total_rem = 1115.35;
                                                $total_debt = 1000;
                                            } else if ($fi_id == 29) {
                                                $total_income = 387277;
                                                $total_outcome = 378800.5;
                                                $total_rem = 8476.5;
                                                $total_debt = 0;
                                            } else if ($fi_id == 31) {
                                                $total_income = 169608.3;
                                                $total_outcome = 169329.8;
                                                $total_rem = 278.5;
                                                $total_debt = 0;
                                            } else if (
                                                    $fi_id == 19 ||
                                                    $fi_id == 21 ||
                                                    $fi_id == 23 ||
                                                    $fi_id == 25 ||
                                                    $fi_id == 28 ||
                                                    $fi_id == 30 ||
                                                    $fi_id == 32) {
                                                continue;
                                            }

                                            echo "<tr>";
                                            echo "<td title='" . $party_res['acronym'] . "'><a href='party.php?p_id=" . $party_res['id'] . "'>" . $party_res['title'] . "</a></td>";
                                            echo "<td>" . $finance_res['day'] . "-" . $finance_res['month'] . "-<strong>" . $finance_res['year'] . "</strong></td>";
                                            echo "<td><a href='economics.php?tab=1&year=" . $year . "&request=income&target=" . $income_res['id'] . "#eco'>" . $total_income . "</a></td>";
                                            echo "<td><a href='economics.php?tab=1&year=" . $year . "&request=outcome&target=" . $outcome_res['id'] . "#eco'>" . $total_outcome . "</a></td>";
                                            echo "<td>" . $total_rem . "</td>";
                                            echo "<td>" . $total_debt . "</td>";
                                            echo "</tr>";
                                        }
                                    }
                                    ?>
                                </table>
                            </div>
                            <?php
                        } else {
                            ?>
                            <div class='table-responsive'>
                                <table class="table table-condensed table-bordered table-hover" align="left">
                                    <tr>
                                        <th><a href='list.php?list=party'>Улс төрийн нам</a></th>
                                        <th style="width: 85px;"><a href="economics.php?tab=1&year=<?php echo $year; ?>#eco?">Огноо</a></th>
                                        <th><a href='economics.php?tab=1&year=<?php echo $year; ?>#eco'>Нийт санхүүжилт</a></th>
                                        <th><a href='economics.php?tab=1&year=<?php echo $year; ?>#eco'>Нийт зарцуулалт</a></th>
                                        <th><a href="economics.php?tab=1&year=<?php echo $year; ?>#eco">Бэлэн байгаа</a></th>
                                        <th><a href="economics.php?tab=1&year=<?php echo $year; ?>#eco">Өр зээл</a></th>
                                    </tr>
                                    <?php
                                    $result = $finance->select("id", "year = " . $year);
                                    foreach ($result as $row) {
                                        $result = $party_finance_list->select("financeid,partyid,outcomeid,incomeid", "financeid = " . $row['id']);
                                        for ($in = 0; $in < sizeof($result); $in++) {
                                            $finance_res = $finance->selectFirst("year,month,day,debt,remaining", "id = " . $result[$in]['financeid']);
                                            $party_res = $party->selectFirst("id, title, acronym", "id = " . $result[$in]['partyid']);
                                            $outcome_res = $outcome->selectFirst("id, total", "id = " . $result[$in]['outcomeid']);
                                            $income_res = $income->selectFirst("id, total", "id = " . $result[$in]['incomeid']);

                                            $total_income = $income_res['total'];
                                            $total_outcome = $outcome_res['total'];
                                            $total_rem = $finance_res['remaining'];
                                            $total_debt = $finance_res['debt'];

                                            $fi_id = $result[$in]['financeid'];

                                            if ($fi_id == 18) {
                                                $total_income = 14471847.1;
                                                $total_outcome = 14252447;
                                                $total_rem = 219400.1;
                                                $total_debt = 9960;
                                            } else if ($fi_id == 20) {
                                                $total_income = 1293467.4;
                                                $total_outcome = 1289953.8;
                                                $total_rem = 3513.6;
                                                $total_debt = 0;
                                            } else if ($fi_id == 22) {
                                                $total_income = 302150.6;
                                                $total_outcome = 298211;
                                                $total_rem = 3939.6;
                                                $total_debt = 0;
                                            } else if ($fi_id == 24) {
                                                $total_income = 16192643.1;
                                                $total_outcome = 16141128.4;
                                                $total_rem = 50514.7;
                                                $total_debt = 1000;
                                            } else if ($fi_id == 27) {
                                                $total_income = 102049.8;
                                                $total_outcome = 102165.15;
                                                $total_rem = 1115.35;
                                                $total_debt = 1000;
                                            } else if ($fi_id == 29) {
                                                $total_income = 387277;
                                                $total_outcome = 378800.5;
                                                $total_rem = 8476.5;
                                                $total_debt = 0;
                                            } else if ($fi_id == 31) {
                                                $total_income = 169608.3;
                                                $total_outcome = 169329.8;
                                                $total_rem = 278.5;
                                                $total_debt = 0;
                                            } else if (
                                                    $fi_id == 19 ||
                                                    $fi_id == 21 ||
                                                    $fi_id == 23 ||
                                                    $fi_id == 25 ||
                                                    $fi_id == 28 ||
                                                    $fi_id == 30 ||
                                                    $fi_id == 32) {
                                                continue;
                                            }

                                            echo "<tr>";
                                            echo "<td title='" . $party_res['acronym'] . "'><a href='party.php?p_id=" . $party_res['id'] . "'>" . $party_res['title'] . "</a></td>";
                                            echo "<td>" . $finance_res['day'] . "-" . $finance_res['month'] . "-<strong>" . $finance_res['year'] . "</strong></td>";
                                            echo "<td><a href='economics.php?tab=1&year=" . $year . "&request=income&target=" . $income_res['id'] . "#eco'>" . $income_res['total'] . "</a></td>";
                                            echo "<td><a href='economics.php?tab=1&year=" . $year . "&request=outcome&target=" . $outcome_res['id'] . "#eco'>" . $outcome_res['total'] . "</a></td>";
                                            echo "<td>" . $finance_res['remaining'] . "</td>";
                                            echo "<td>" . $finance_res['debt'] . "</td>";
                                            echo "</tr>";
                                        }
                                    }
                                    ?>
                                </table>
                            </div>
                            <?php
                        }
                    }
                    ?>
                </div>
                <div id="party-economics-tab-nam" class="tab-pane fade in <?php if ($tab === "2") { echo "active"; } ?>">

                </div>
                <div id="party-economics-tab-ediinzasag" class="tab-pane fade in <?php if ($tab === "3") { echo "active"; } ?> ediin-zasag">
                    <section class="col-sm-12">
                          <div class="input-group">
                              <div class="input-group-addon" style="padding: 0px;">
                                <select class="" name="" style="width: 250px; height: 100%; border: none; outline: none;">
                                  <option>Бүх мэдээлэл харах</option>
                                  <option><span class="text-primary">2013</span> - <i>Ерөнхийлөгчийн сонгууль</i></option>
                                  <option><span class="text-primary">2012</span> - <i>УИХ-ын сонгууль</i></option>
                                  <option><span class="text-primary">2009</span> - <i>Ерөнхийлөгчийн сонгууль</i></option>
                                  <option><span class="text-primary">2008</span> - <i>УИХ-ын сонгууль</i></option>
                                </select>
                              </div>
                              <input type="text" class="form-control" data-toggle="input-search-field" placeholder="Эдийн засгийн ангилалаар хайх..." <?php if (isset($_GET['search_query'])) { echo "value='".$_GET['search_query']."'"; }?>/>
                              <div class="input-group-addon" style="cursor: pointer" data-toggle="input-search-caret-button">
                                  <a href="#eco">
                                      <span class="glyphicon glyphicon-chevron-down" data-toggle="input-search-caret-drop"></span>
                                  </a>
                              </div>
                              <div class="input-group-addon" style="cursor: pointer">
                                  <span class="glyphicon glyphicon-search"></span>
                              </div>
                          </div>
                          <ul class="list-group hide" data-toggle="input-search-result" style="position: absolute; z-index: 3; max-height: 250px; overflow: auto; width: 96%; background-color: #eee; border: 1px solid #eee;"></ul>
                    </section>

                    <section class="col-sm-12" style="margin-top: 25px;">
                      <a href="economics.php?tab=3&year=all&sector_code=%20#eco" class="btn btn-primary pull-left">Бүх мэдэээлэл харах</a>

                      <div class="clearfix"></div>
                    </section>

                    <section class="col-sm-12 company-list">
                        <?php
                        $sector_code = isset($_GET['sector_code']) ? $_GET['sector_code'] : "";
                        if (!empty($sector_code) && empty($_GET['ediin_action'])) {
                          $companies = new db_cn\Table("companies");
                          $irged = new db_cn\Table("irged_aan");
                          $comp = $companies->select("company", "sector_code = '$sector_code'");
                          $list = [];
                          $for_counting = [];
                          foreach ($comp as $com) {
                            $c = $com['company'];
                            $tmp_arr = $irged->select("*", "ner = '$c' && type = 'c'");
                            foreach ($tmp_arr as $tmp) {
                              array_push($list, $tmp);
                              array_push($for_counting, $tmp['party']);
                            }
                          }
                          // echo "<pre>", print_r($for_counting), "</pre>";
                          // echo "<pre>", print_r(array_count_values($for_counting)), "</pre>";
                          // echo "<pre>", print_r($list), "</pre>";
                          usort($list, function($a1, $a2) {
                            return strnatcmp($a1['party'], $a2['party']);
                          });

                          $by_parties = [];
                          $tmp_item = "";
                          $tmp_arr = [];
                          for ($i = 0; $i < count($list); $i++) {
                            if ($i == 0) {
                              $tmp_item = $list[$i]['party'];
                              array_push($tmp_arr, $list[$i]);
                              if ($i == (count($list) - 1)) {
                                array_push($by_parties, $tmp_arr);
                              }
                            } else if ($i == (count($list) - 1)) {
                              if ($tmp_item == $list[$i]['party']) {
                                array_push($tmp_arr, $list[$i]);
                                array_push($by_parties, $tmp_arr);
                              } else {
                                array_push($by_parties, $tmp_arr);
                                $tmp_arr = [];
                                array_push($tmp_arr, $list[$i]);
                                array_push($by_parties, $tmp_arr);
                              }
                            } else {
                              if ($tmp_item == $list[$i]['party']) {
                                array_push($tmp_arr, $list[$i]);
                                $tmp_item = $list[$i]['party'];
                              } else {
                                array_push($by_parties, $tmp_arr);
                                $tmp_arr = [];
                                $tmp_item = $list[$i]['party'];
                                array_push($tmp_arr, $list[$i]);
                              }
                            }
                          }

                          ?>
                          <h3>Нэгтгэсэн хандив мэдээлэл</h3>
                          <hr>
                          <table class="table table-striped table-bordered">
                            <tr>
                              <th>
                                Нам
                              </th>
                              <th>
                                Байгуулгын тоо
                              </th>
                              <th>
                                Мөнгөн дүн<br>
                                <?php
                                $mon = 0;
                                foreach ($by_parties as $parties) {
                                  foreach ($parties as $party) {
                                    $mon += intval($party['hemjee']);
                                  }
                                }
                                echo "Нийт: ".$mon;
                                $mon = 0;
                                ?>
                              </th>
                            </tr>

                          <?php

                          foreach ($by_parties as $parties) {
                            $party_name = "";
                            $count = 0;
                            $mon = 0;
                            $year = "";

                            $party_name = $parties[0]['party'];
                            if (strpos($party_name, "тойрог")) {
                              // continue;
                            }
                            $count = count($parties);
                            foreach ($parties as $par) {
                              $year = $par['year'];
                              $mon += intval($par['hemjee']);
                            }
                            ?>
                            <tr>
                              <td>
                                <a href="economics.php?tab=3&year=all&sector_code=<?php echo $sector_code; ?>&ediin_action=in_party&ediin_data=<?php echo $party_name; ?>#eco">
                                <?php echo $party_name; ?>
                                </a>
                              </td>
                              <td>
                                <a href="economics.php?tab=3&year=all&sector_code=<?php echo $sector_code; ?>&ediin_action=in_party&ediin_data=<?php echo $party_name; ?>#eco">
                                <?php echo $count; ?>
                                </a>
                              </td>
                              <td>
                                <?php echo $mon; ?>
                              </td>
                            </tr>
                            <?php
                            $party_name = "";
                            $count = 0;
                            $mon = 0;
                          }
                          ?>

                          </table>
                          <?php


                        } else {

                        // Requirement 1 : party_name
                        // Requirement 2 : count_of_companies
                        // Requirement 3 : donation_of_companies

                          $irged_aan = new db_cn\Table("irged_aan");
                          $irged_res = $irged_aan->select("*", "type = 'c'");

                          $i = 0;
                          $party_name = "";
                          $count_of_companies = 0;
                          $donation_of_companies = 0;
                          $broke = break_into($irged_res, 'party');

                          $ediin_action = isset($_GET['ediin_action']) ? $_GET['ediin_action'] : "";
                          $ediin_data = isset($_GET['ediin_data']) ? $_GET['ediin_data'] : "";

                          if (!empty($ediin_action) && !empty($ediin_data)) {

                            if ($ediin_action == "in_party") {
                              $sector_code = $_GET['sector_code'];
                              $companies = new db_cn\Table("companies");
                              $irged = new db_cn\Table("irged_aan");
                              $comp = $companies->select("company", "sector_code = '$sector_code'");
                              $list = [];
                              foreach ($comp as $com) {
                                $c = $com['company'];
                                $tmp_arr = $irged->select("*", "ner = '$c' && type = 'c'");
                                foreach ($tmp_arr as $tmp) {
                                  if ($tmp['party'] == $ediin_data) {
                                    array_push($list, $tmp);
                                  }
                                }
                              }
                              usort($list, function($a1, $a2) {
                                if ($a1['year'] > $a2['year']) {
                                  return -1;
                                } else if ($a1['year'] < $a2['year']) {
                                  return 1;
                                }
                                return 0;
                              });
                              ?>
                              <h3>Дэлгэрэнгүй хандив мэдээлэл <a href="#eco" class="btn btn-primary" onclick="history.back();">Буцах</a></h3>
                              <hr>
                              <table class="table table-striped table-bordered">
                                <tr>
                                  <th>
                                    Огноо
                                  </th>
                                  <th>
                                    Байгууллага
                                  </th>
                                  <th>
                                    Нам
                                  </th>
                                  <th>
                                    Мөнгөн дүн<br>
                                    <?php
                                    $mon = 0;
                                    foreach ($list as $l) {
                                      if ($l['party'] == $ediin_data) {
                                        $mon += intval($l['hemjee']);
                                      }
                                    }
                                    echo "Нийт: ".$mon;
                                    $mon = 0;
                                    ?>
                                  </th>
                                </tr>
                              <?php
                              foreach ($list as $l) {
                                ?>
                                <tr>
                                  <td>
                                    <?php echo $l['year']; ?>
                                  </td>
                                  <td>
                                    <?php echo $l['ner']; ?>
                                  </td>
                                  <td>
                                    <?php echo $l['party']; ?>
                                  </td>
                                  <td>
                                    <?php echo $l['hemjee']; ?>
                                  </td>
                                </tr>
                                <?php
                              }?></table><?php
                            } else if ($ediin_action == "in_company") {
                              $sector_code = $_GET['sector_code'];
                              $companies = new db_cn\Table("companies");
                              $irged = new db_cn\Table("irged_aan");
                              $comp = $companies->select("company", "sector_code = '$sector_code'");
                              $list = [];
                              foreach ($comp as $com) {
                                $c = $com['company'];
                                $tmp_arr = $irged->select("*", "ner = '$c' && type = 'c'");
                                foreach ($tmp_arr as $tmp) {
                                  if ($tmp['party'] == $ediin_data) {
                                    array_push($list, $tmp);
                                  }
                                }
                              }
                              ?>
                              <h3>Дэлгэрэнгүй хандив мэдээлэл <a href="#eco" class="btn btn-primary" onclick="history.back();">Буцах</a></h3>
                              <hr>
                              <table class="table table-striped table-bordered">
                                <tr>
                                  <th>
                                    Огноо
                                  </th>
                                  <th>
                                    Байгууллага
                                  </th>
                                  <th>
                                    Нам
                                  </th>
                                  <th>
                                    Мөнгөн дүн<br>
                                    <?php
                                    $mon = 0;
                                    foreach ($list as $l) {
                                      if ($l['party'] == $ediin_data) {
                                        $mon += intval($l['hemjee']);
                                      }
                                    }
                                    echo "Нийт: ".$mon;
                                    $mon = 0;
                                    ?>
                                  </th>
                                </tr>
                              <?php
                              foreach ($list as $l) {
                                ?>
                                <tr>
                                  <td>
                                    <?php echo $l['year']; ?>
                                  </td>
                                  <td>
                                    <?php echo $l['ner']; ?>
                                  </td>
                                  <td>
                                    <?php echo $l['party']; ?>
                                  </td>
                                  <td>
                                    <?php echo $l['hemjee']; ?>
                                  </td>
                                </tr>
                                <?php
                              }?></table><?php
                            } else if ($ediin_action == "party") {
                              ?>
                              <h3>Дэлгэрэнгүй хандив мэдээлэл <a href="#eco" class="btn btn-primary" onclick="history.back();">Буцах</a></h3>
                              <hr>
                              <table class="table table-striped table-bordered">
                                <tr>
                                  <th>
                                    Огноо
                                  </th>
                                  <th>
                                    Байгууллага
                                  </th>
                                  <th>
                                    Нам
                                  </th>
                                  <th>
                                    Мөнгөн дүн<br>
                                    <?php
                                    $index = ($ediin_data == "0") ? 0 : intval($ediin_data);
                                    $index--;
                                    $mon = 0;
                                    foreach ($broke[$index] as $res) {
                                      $mon += intval($res['hemjee']);
                                    }
                                    echo "Нийт: ".$mon;
                                    $mon = 0;
                                    ?>
                                  </th>
                                </tr>
                              <?php
                              $index = ($ediin_data == "0") ? 0 : intval($ediin_data);
                              $index--;
                              usort($broke[$index], function($a1, $a2) {
                                if ($a1['year'] > $a2['year']) {
                                  return -1;
                                } else if ($a1['year'] < $a2['year']) {
                                  return 1;
                                }
                                return 0;
                              });
                              foreach ($broke[$index] as $res) {
                                ?>
                                <tr>
                                  <td>
                                    <?php echo $res['year']; ?>
                                  </td>
                                  <td>
                                    <?php echo $res['ner']; ?>
                                  </td>
                                  <td>
                                    <?php echo $res['party']; ?>
                                  </td>
                                  <td>
                                    <?php echo $res['hemjee']; ?>
                                  </td>
                                </tr>
                                <?php
                              }?></table><?php
                            } else if ($ediin_action == "company") {
                              ?>
                              <h3>Дэлгэрэнгүй хандив мэдээлэл</h3>
                              <hr>
                              <table class="table table-striped table-bordered">
                                <tr>
                                  <th>
                                    Байгууллага
                                  </th>
                                  <th>
                                    Нам
                                  </th>
                                  <th>
                                    Мөнгөн дүн
                                  </th>
                                </tr>
                              <?php
                              $index = ($ediin_data == "0") ? 0 : intval($ediin_data);
                              $index--;
                              foreach ($broke[$index] as $res) {
                                ?>
                                <tr>
                                  <td>
                                    <?php echo $res['ner']; ?>
                                  </td>
                                  <td>
                                    <?php echo $res['party']; ?>
                                  </td>
                                  <td>
                                    <?php echo $res['hemjee']; ?>
                                  </td>
                                </tr>
                                <?php
                              }
                            }
                            ?></table><?php
                          } else {
                          // Home contents

                          $sector_code = isset($_GET['sector_code']) ? $_GET['sector_code'] : "";
                          if (empty($_GET['ediin_action'])) {
                            $companies = new db_cn\Table("companies");
                            $irged = new db_cn\Table("irged_aan");
                            $comp = $companies->select("company", "sector_code = '$sector_code'");
                            $list = [];
                            $for_counting = [];
                            foreach ($comp as $com) {
                              $c = $com['company'];
                              $tmp_arr = $irged->select("*", "ner = '$c' && type = 'c'");
                              foreach ($tmp_arr as $tmp) {
                                array_push($list, $tmp);
                                array_push($for_counting, $tmp['party']);
                              }
                            }
                            // echo "<pre>", print_r($for_counting), "</pre>";
                            // echo "<pre>", print_r(array_count_values($for_counting)), "</pre>";
                            // echo "<pre>", print_r($list), "</pre>";
                            usort($list, function($a1, $a2) {
                              return strnatcmp($a1['party'], $a2['party']);
                            });

                            $by_parties = [];
                            $tmp_item = "";
                            $tmp_arr = [];
                            for ($i = 0; $i < count($list); $i++) {
                              if ($i == 0) {
                                $tmp_item = $list[$i]['party'];
                                array_push($tmp_arr, $list[$i]);
                                if ($i == (count($list) - 1)) {
                                  array_push($by_parties, $tmp_arr);
                                }
                              } else if ($i == (count($list) - 1)) {
                                if ($tmp_item == $list[$i]['party']) {
                                  array_push($tmp_arr, $list[$i]);
                                  array_push($by_parties, $tmp_arr);
                                } else {
                                  array_push($by_parties, $tmp_arr);
                                  $tmp_arr = [];
                                  array_push($tmp_arr, $list[$i]);
                                  array_push($by_parties, $tmp_arr);
                                }
                              } else {
                                if ($tmp_item == $list[$i]['party']) {
                                  array_push($tmp_arr, $list[$i]);
                                  $tmp_item = $list[$i]['party'];
                                } else {
                                  array_push($by_parties, $tmp_arr);
                                  $tmp_arr = [];
                                  $tmp_item = $list[$i]['party'];
                                  array_push($tmp_arr, $list[$i]);
                                }
                              }
                            }

                            ?>
                            <h3>Нэгтгэсэн хандив мэдээлэл</h3>
                            <hr>
                            <table class="table table-striped table-bordered">
                              <tr>
                                <th>
                                  Нам
                                </th>
                                <th>
                                  Байгуулгын тоо
                                </th>
                                <th>
                                  Мөнгөн дүн<br>
                                  <?php
                                  $mon = 0;
                                  foreach ($by_parties as $parties) {
                                    foreach ($parties as $party) {
                                      $mon += intval($party['hemjee']);
                                    }
                                  }
                                  echo "Нийт: ".$mon;
                                  $mon = 0;
                                  ?>
                                </th>
                              </tr>

                            <?php

                            foreach ($by_parties as $parties) {
                              $party_name = "";
                              $count = 0;
                              $mon = 0;
                              $year = "";

                              $party_name = $parties[0]['party'];
                              if (strpos($party_name, "тойрог")) {
                                // continue;
                              }
                              $count = count($parties);
                              foreach ($parties as $par) {
                                $year = $par['year'];
                                $mon += intval($par['hemjee']);
                              }
                              ?>
                              <tr>
                                <td>
                                  <a href="economics.php?tab=3&year=all&sector_code=<?php echo $sector_code; ?>&ediin_action=in_party&ediin_data=<?php echo $party_name; ?>#eco">
                                  <?php echo $party_name; ?>
                                  </a>
                                </td>
                                <td>
                                  <a href="economics.php?tab=3&year=all&sector_code=<?php echo $sector_code; ?>&ediin_action=in_party&ediin_data=<?php echo $party_name; ?>#eco">
                                  <?php echo $count; ?>
                                  </a>
                                </td>
                                <td>
                                  <?php echo $mon; ?>
                                </td>
                              </tr>
                              <?php
                              $party_name = "";
                              $count = 0;
                              $mon = 0;
                            }
                            ?></table><?php
                          }
                          }
                        }
                        ?>
                    </section>
                    <div class="clearfix"></div>
                </div>

            </div>
        </div>
        <div class="col-lg-3">

            <div class="panel panel-default classification">
                <div class="panel-heading text-center">
                    <span>АНГИЛАЛ</span>
                </div>
                <div class="panel-body">
                    <ul class="list-unstyled">
                        <li>АНГИЛАЛ 1
                            <ul>
                                <li>ДЭД АНГИЛАЛ 1</li>
                                <li>ДЭД АНГИЛАЛ 2</li>
                                <li>ДЭД АНГИЛАЛ 3</li>
                            </ul>
                        </li>
                        <li>АНГИЛАЛ 2</li>
                        <li>АНГИЛАЛ 3</li>
                        <li>АНГИЛАЛ 4</li>
                    </ul>
                </div>
            </div>

            <div class="panel panel-default mini-poll">
                <div class="panel-heading text-center">
                    <span>САНАЛ АСУУЛГА</span>
                </div>
                <div class="panel-body">
                    <h5 class="text-center"><b>Шилэн Нам: </b>Таны бодлоор улс төрийн намуудын санхүүжилт ил тод байх ёстой юу?</h5>
                    <form>
                        <div class="radio"><label><input type="radio" name="poll">Тийм</label></div>
                        <div class="radio"><label><input type="radio" name="poll">Үгүй</label></div>
                        <div class="radio"><label><input type="radio" name="poll">Чухал биш</label></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
