<?php include_once "../../models/DB_CN.php"; ?>
<?php include_once "../../controllers/helper-functions.php"; ?>

<!-- Homepage content -->
<div class="row-gov-party">
    <div class="container-fluid">
        <h3 class="text-center"><a href="#/lists">Улс төрийн намууд</a></h3>

        <div class="row-centered" ng-repeat="lists in partyLists">
          <div class="gov-party col-sm-1 col-centered" ng-repeat="party in lists">
            <div class="well well-xs center-block">
              <div class="gov-party-img-holder">
                <img src="resources/images/{{party.img}}" />
              </div>
              <h4>
                <a href="#/party" title="{{party.title}}">{{party.acronym}}</a>
              </h4>
            </div>
          </div>
        </div>

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
<!-- Homepage content end! -->
