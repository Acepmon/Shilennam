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

                            $db->query("select * from hom_ho where ner = (select name from gishuun where id = $g_id);");
                            $result = $db->resultset();
                            $g_baiguulga = [];
                            foreach ($result as $res) {
                              $arr = [];
                              $arr['xo_ner'] = $res['xo_ner'];
                              $arr['xo_huvitsaa'] = $res['xo_huvitsaa'];
                              $arr['huvi'] = $res['huvi'];
                              array_push($g_baiguulga, $arr);
                            }

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


        <script src="bower_components/cytoscape/cytoscape.min.js"></script>
        <!-- <script src="resources/js/cycode.js"></script> -->
        <script>
        $(function(){ // on dom ready

        var cy = cytoscape({
          container: $('#cy')[0],

          style: cytoscape.stylesheet()
            .selector('node')
              .css({
                'content': 'data(name)',
                'text-valign': 'center',
                'color': 'white',
                'text-outline-width': 2,
                'text-outline-color': '#888',
                'source-arrow-shape': 'diamon',
              })
            .selector(':selected')
              .css({
                'background-color': 'black',
                'line-color': 'black',
                'target-arrow-color': 'black',
                'source-arrow-color': 'black',
                'text-outline-color': 'black'
              }),

          elements: {
            <?php
            if (!empty($g_baiguulga)) {
             ?>
            nodes: [
              { data: { id: 'main_person', name: '<?php echo $name; ?>', href: '/' } },
              <?php
              for ($i = 0; $i < sizeof($g_baiguulga); $i++) {
                $id = "gbid_".$i;
                $name = $g_baiguulga[$i]['xo_ner'];
                $last_thing = ",";
                if ($i == sizeof($g_baiguulga) -1) {
                  $last_thing = "";
                }
                echo "{ data : { id : '$id', name : '$name', href : '#uls_connections'} }".$last_thing;
              }
              ?>
            ],
            edges: [
              <?php
              for ($i = 0; $i < sizeof($g_baiguulga); $i++) {
                $source = "main_person";
                $target = "gbid_".$i;
                $last_thing = ",";
                if ($i == sizeof($g_baiguulga) -1) {
                  $last_thing = "";
                }
                echo "{ data: { source: '$source', target: '$target' } }".$last_thing;
              }
              ?>
            ]
            <?php
            }
            ?>
          },

          layout: {
            name: 'circle',
            fit: true, // whether to fit the viewport to the graph
            directed: false, // whether the tree is directed downwards (or edges can point in any direction if false)
            padding: 10, // padding on fit
            circle: false, // put depths in concentric circles if true, put depths top down if false
            spacingFactor: 1.75, // positive spacing factor, larger => more space between nodes (N.B. n/a if causes overlap)
            boundingBox: undefined, // constrain layout bounds; { x1, y1, x2, y2 } or { x1, y1, w, h }
            avoidOverlap: true, // prevents node overlap, may overflow boundingBox if not enough space
            roots: undefined, // the roots of the trees
            maximalAdjustments: 0, // how many times to try to position the nodes in a maximal way (i.e. no backtracking)
            animate: false, // whether to transition the node positions
            animationDuration: 500, // duration of animation in ms if enabled
            ready: undefined, // callback on layoutready
            stop: undefined // callback on layoutstop
          }
        });

        cy.on('tap', 'node', function(){
          try { // your browser may block popups
            window.open( this.data('href') );
          } catch(e){ // fall back on url change
            window.location.href = this.data('href');
          }
        });


        }); // on dom ready
        </script>
    </body>
</html>
