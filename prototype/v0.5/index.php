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

        <div class="row-gov-party">
            <div class="container-fluid">
                <h3 class="text-center"><a href="list.php?list=party">Улс төрийн намууд</a></h3>
                <?php
                $party = new db_cn\Table("party");
                $results = $party->select("id,title,acronym, logo_url");
                $broken_results = break_array($results, 11);
                foreach ($broken_results as $result) {
                    echo "<div class='row-centered'>";

                    foreach ($result as $res) {
                        $party_img = "resources/images/png/img_error.jpg";
                        if (empty($res['logo_url'])) {
                            $party_img = "resources/images/png/img_error.jpg";
                        } else {
                            $party_img = "resources/images/party/logos/" . $res['logo_url'];
                        }
                        ?>
                        <div class="gov-party col-sm-1 col-centered">
                            <div class="well well-xs center-block" onclick="location.href='party.php?p_id=<?php echo $res['id']; ?>#party'">
                                <div class="gov-party-img-holder">
                                    <img src="<?php echo $party_img; ?>" alt="">
                                </div>
                                <h4><a href="party.php?p_id=<?php echo $res['id']; ?>#party" title="<?php echo $res['title']; ?>"><?php echo $res['acronym']; ?></a></h4>
                            </div>
                        </div>
                        <?php
                    }
                    echo "</div>";
                }
                ?>
            </div>
        </div>

        <div class="poll">
            <div class="container">
                <h3 class="text-center">Санал асуулга</h3>
                <h5 class="text-center"><b>Шилэн Нам: </b>Таны бодлоор улс төрийн намуудын санхүүжилт ил тод байх ёстой юу?</h5>
                <form>
                    <div class="radio"><label><input type="radio" name="poll">Тийм</label></div>
                    <div class="radio"><label><input type="radio" name="poll">Үгүй</label></div>
                    <div class="radio"><label><input type="radio" name="poll">Чухал биш</label></div>
                </form>
            </div>
        </div>

        <div class="contact">
            <div class="container">
                <div class="col-lg-4">
                    <h3 class="text-center">Холбоо барих</h3>
                </div>
                <div class="col-lg-8">
                    <form action="" class="form-horizontal">
                        <div class="form-group col-md-4">
                            <label for="firstname">НЭР:*</label><br/>
                            <input type="text" id="firstname">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="email">И-МЭЙЛ:*</label><br/>
                            <input type="text" id="email">
                        </div>
                        <div class="form-group col-md-8">
                            <label for="message">МЭССЭЖ:*</label>
                            <textarea class="form-control" rows="5" id="message"></textarea>
                        </div>
                        <div class="form-group col-md-8">
                            <button type="submit" class="btn btn-default">ИЛГЭЭХ</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <footer class="footer navbar navbar-fixed-bottom">
            <?php include "templates/footer.php"; ?>
        </footer>

    </body>
</html>
