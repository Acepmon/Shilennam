<div class="content" ng-controller="newsCtrl">
  <div class="container article" id="article">
    <div class="col-lg-9">
      <header class="well well-sm">
        <h3>{{article.title}}</h3>
        <span>{{article.date}}</span>
        <img src="resource/uploads/{{article.img}}">
      </header>
      <section class="well well-sm">
        <p>
          {{article.desc}}
        </p>
      </section>
      <footer>

      </footer>
    </div>
    <div class="col-lg-3">
      <div class="panel panel-primary tweets">
        <div class="panel-heading text-center">
          <img src="res/png/twitter-white.png" alt="twitter" class="left-block">
          <span>ХЭН ЮУ ГЭЖ ЖИРГЭВ?</span>
        </div>
        <div class="panel-body">
          <a class="twitter-timeline" data-dnt="true" href="https://twitter.com/shilennam" data-widget-id="577928259876225024">Tweets by @shilennam</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
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
