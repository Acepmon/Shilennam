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

        <div class="content">
            <div class="container article-list" id="news">
                <div class="col-lg-9">
                    <?php
                    $news = new db_cn\Table("news");
                    $uploads = new db_cn\Table("uploads");
                    $news_result = $news->select("*");
                    foreach ($news_result as $res) {
                      $id = $res['id'];
                      $title = $res['title'];
                      $date = $res['date'];
                      $img = $uploads->selectFirst("path", "id = ".$res['img_upload_id'])['path'];
                      $thumb = $uploads->selectFirst("path", "id = ".$res['thumb_upload_id'])['path'];
                      $desc = $res['description'];
                      ?>
                      <div class="row well well-sm">
                          <div class="col-lg-3">
                              <img src="resources/uploads/<?php echo $thumb; ?>">
                          </div>
                          <div class="col-lg-7">
                              <h4><a href="news-article.php?article=<?php echo $id; ?>#article"><?php echo $title; ?></a></h4>
                              <small><?php echo substr($desc, 0, 255) . "..."; ?></small>
                              <br/>
                              <span><?php echo $date; ?></span>
                          </div>
                      </div>
                      <?php
                    }

                    ?>
                </div>
                <div class="col-lg-3">
                    <div class="panel panel-primary tweets">
                        <div class="panel-heading text-center">
                            <img src="res/png/twitter-white.png" alt="twitter" class="left-block">
                            <span>ХЭН ЮУ ГЭЖ ЖИРГЭВ?</span>
                        </div>
                        <div class="panel-body">
                            <a class="twitter-timeline" data-dnt="true" href="https://twitter.com/shilennam" data-widget-id="577928259876225024">Tweets by @shilennam</a>
                            <script>!function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0], p = /^http:/.test(d.location) ? 'http' : 'https';
        if (!d.getElementById(id)) {
            js = d.createElement(s);
            js.id = id;
            js.src = p + "://platform.twitter.com/widgets.js";
            fjs.parentNode.insertBefore(js, fjs);
        }
    }(document, "script", "twitter-wjs");</script>
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

        <footer class="footer navbar navbar-fixed-bottom">
            <?php include "templates/footer.php"; ?>
        </footer>

    </body>
</html>
