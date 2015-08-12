<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<!-- JQuery javascript api -->
<script type="text/javascript" src="/prototype/v0.6/bower_components/jquery/dist/jquery.min.js"></script>

<!-- Bootstrap js file -->
<script type="text/javascript" src="/prototype/v0.6/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- AngularJS one page application api -->
<!-- <script type="text/javascript" src="/prototype/v0.5/bower_components/angular/angular.min.js"></script> -->

<!-- Angular UI Router -->
<script type="text/javascript" src="/prototype/v0.6/bower_components/angular-ui-router/release/angular-ui-router.min.js"></script>

<!-- Custom global js file -->
<script type="text/javascript" src="/prototype/v0.6/resources/js/global.js"></script>

<!-- Angular app for the website -->
<!-- <script type="text/javascript" src="/prototype/v0.5/resources/js/app.js"></script> -->
<!-- <script type="text/javascript" src="/prototype/v0.5/resources/js/controllers/rootCtrl.js"></script> -->

<script type="text/javascript">
    $(document).ready(function () {
        $('[data-toggle=input-search-field]').keyup(function () {
            if ($(this).val()) {
                $('[data-toggle=input-search-result]').removeClass('hide');

                $.post("models/homepage/get_results_ediin.php", {action: "search_ediin", keyword : $(this).val()}, function(data) {
                    $('[data-toggle=input-search-result]').html(data);
                });

            } else {
                $('[data-toggle=input-search-result]').addClass('hide');
            }
        });
        $('[data-toggle=input-search-caret-button]').click(function() {
          if ($('[data-toggle=input-search-result]').hasClass('hide')) {
            $('[data-toggle=input-search-result]').removeClass('hide');
            $('[data-toggle=input-search-caret-drop]').removeClass('glyphicon-chevron-down');
            $('[data-toggle=input-search-caret-drop]').addClass('glyphicon-chevron-up');
            $.post("models/homepage/get_results_ediin.php", {action: "search_ediin", keyword : '^all^'}, function(data) {
                $('[data-toggle=input-search-result]').html(data);
            });
          } else {
            $('[data-toggle=input-search-result]').addClass('hide');
            $('[data-toggle=input-search-caret-drop]').removeClass('glyphicon-chevron-up');
            $('[data-toggle=input-search-caret-drop]').addClass('glyphicon-chevron-down');
          }

        });
    });
</script>
