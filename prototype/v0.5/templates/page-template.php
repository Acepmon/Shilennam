<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Шилэн нам</title>
        
        <?php include "/prototype/v0.5/templates/links-to-css.php"; ?>
        <?php include "/prototype/v0.5/templates/links-to-js.php"; ?>
        <?php include "/prototype/v0.5/models/db_cn.php"; ?>
        <?php include "/prototype/v0.5/controllers/helper-functions.php"; ?>
        
    </head>
    <body>
        
        <header>
            <?php include "/prototype/v0.5/templates/header.php"; ?>
        </header>
        
        <div ng-app="app">
            <div ui-view></div>
        </div>
        
        <footer class="footer navbar navbar-fixed-bottom">
            <?php include "/prototype/v0.5/templates/footer.php"; ?>
        </footer>
        
    </body>
</html>
