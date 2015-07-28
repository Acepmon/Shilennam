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
                </div>
            </div>
        </div>


        <footer class="footer navbar navbar-fixed-bottom">
            <?php include "templates/footer.php"; ?>
        </footer>

    </body>
</html>
