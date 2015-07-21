<?php include "../../models/db_cn.php"; ?>
<?php include "../../controllers/helper-functions.php"; ?>

<!-- News Content -->
<div class="content">
    <div class="container article-list" id="news">
        <div class="col-lg-9">
<!--            <div class="row well well-sm">
                <div class="col-lg-3">
                    <img src="res/news/article1_img1_thumb.jpg" alt="Article 1">
                </div>
                <div class="col-lg-7">
                    <h4><a href="news-article.php#article">Тэнгэрлэг сайхан ээжүүд баярын арга хэмжээ боллоо</a></h4>
                    <small>Тэнгэрлэг сайхан ээжүүд баярын арга хэмжээ боллоо Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</small>
                    <br/>
                    <span>2015 оны 3-р сарын 8</span>
                </div>
            </div>-->
            <?php
            $news = new db_cn\Table("news");
            $uploads = new db_cn\Table("uploads");
            $result = $news->select("*");
            foreach ($result as $res) {
                $title = $res['title'];
                $thumb = $uploads->selectFirst("path", "id = ".$res['thumb_upload_id'])['path'];
                $desc = $res['description'];
                $date = $res['date'];
                ?>
                <div class="row well well-sm">
                    <div class="col-lg-3">
                        <img src="resources/uploads/<?php echo $thumb; ?>">
                    </div>
                    <div class="col-lg-7">
                        <h4><a href="#/news/news-article"><?php echo $title; ?></a></h4>
                        <small><?php echo substr($desc, 0, 250)."..."; ?></small>
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
                    <img src="resources/images/png/twitter-white.png" alt="twitter" class="left-block">
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
<!-- News content end! -->