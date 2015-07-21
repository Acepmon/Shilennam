<div class="row-quick-link">
    <div class="container">
        <div class="pull-left">
            <a href="#" class="btn btn-sm">Тусламж</a>
            <a href="#" class="btn btn-sm">Бидэнтэй холбогдох</a>
            <!-- <a href="manage/" class="btn btn-sm">Менежмент</a> -->
        </div>
        <div class="pull-right">
            <a href="https://www.facebook.com/pages/Shilennam/633649973430676" target="_blank" class="btn btn-sm"><img class='img-responsive' src="resources/images/png/fb-white.png" alt="png"></a>
            <a href="https://twitter.com/shilennam" target="_blank" class="btn btn-sm"><img class='img-responsive' src="resources/images/png/twitter-white.png" alt="png"></a>
            <a href="#" class="btn btn-sm">
                <span class="glyphicon glyphicon-search"></span>
            </a>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<div class="row-menu">
    <nav class="navbar navbar-default navbar-md">
        <div class="container">
            <div id="generated-menus" style="height: 35px;">
                <!-- <div class="navbar-header">
                        <a href="index.php" class="navbar-brand">Шилэн Нам</a>
                </div> -->
                <ul class="nav navbar-nav">
                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">НАМУУДЫН САНХҮҮЖИЛТ <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="economics.php?tab=1&year=all#eco" style="text-transform: uppercase;">Сонгуулийн санхүүжилт</a></li>
                            <li><a href="economics.php?tab=2&year=all#eco" style="text-transform: uppercase;">Намуудын санхүүжилт</a></li>
                            <li><a href="economics.php?tab=3&year=all#eco" style="text-transform: uppercase;">Эдийн засгийн ангилал</a></li>
                            <li><a href="economics.php?tab=1&year=all#eco">БУСАД</a></li>
                        </ul>
                    </li>
                    <li><a href="#/news">МЭДЭЭ МЭДЭЭЛЭЛ</a></li>
                    <li><a href="laws.php#laws">ХУУЛИАС</a></li>
                    <li style="margin-top: -11px;"><a href="#/" style="padding: 0px;"><div id="logo"></div></a></li>
                    <li><a href="#">УЛС ТӨРЧДИЙН ХАМААРАЛ</a></li>
                    <li><a href="connections.php#connection">ХОЛБООСУУД</a></li>
                    <li><a href="#">БУСАД</a></li>
                </ul>
            </div>
        </div>
    </nav>
</div>

<div id="slide" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#slide" data-slide-to="0" class="active"></li>
        <li data-target="#slide" data-slide-to="1"></li>
        <li data-target="#slide" data-slide-to="2"></li>
        <li data-target="#slide" data-slide-to="3"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
        <?php
        $for_once = false;
        $laws = new db_cn\Table("laws");
        $result = $laws->select("text,sanctions,source", "sanctions is not null");
        for ($a = 0; $a < 4; $a++) {
            $randomIndex = rand(0, sizeof($result) - 1);
            $random3 = rand(1, 8);
            ?>
            <div class="item <?php if ($for_once == false) {
            echo "active";
            $for_once = true;
        } ?>">
                <img src="resources/images/uugand_imgs/img<?php echo $random3; ?>.jpg" alt="Steppe" class="img-responsive">
                <div class="carousel-caption">
                    <?php
                    echo "<h3>" . $result[$randomIndex]['source'] . "</h3>";
                    echo "<blockquote><a href='laws.php'>" . $result[$randomIndex]['text'] . "</a></blockquote>";
                    echo "<blockquote><p>" . $result[$randomIndex]['sanctions'] . "</p></blockquote>";
                    ?>

                </div>
            </div>
    <?php
}
?>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#slide" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#slide" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
