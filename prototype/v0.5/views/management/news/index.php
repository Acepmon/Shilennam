<ol class="breadcrumb">
  <li><a href="#/">Эхлэл</a></li>
  <li class="active">Бүх мэдээ</li>
</ol>
<hr>
<div class="row">
  <div class="col-md-10">
    <a href="#/news/publish_news" class="btn btn-success">Шинэ мэдээ оруулах</a>
  </div>
</div>
<br>
<div class="row">

  <div class="col-md-12" ng-controller="managementAllNewsCtrl">
    <div class="panel panel-info">
      <div class="panel-heading">
        <h3 class="panel-title">Бүх мэдээ</h3>
        <!-- <span class="pull-right clickable" data-effect="fadeOut"><i class="fa fa-times"></i></span> -->
      </div>
      <div class="panel-body" ng-show="newslistError == false || newslistError == true">
        <div class="alert alert-success" ng-show="newslistError == false">
          {{newslistMessage}}
        </div>
        <div class="alert alert-danger" ng-show="newslistError == true">
          {{newslistMessage}}
        </div>
      </div>
        <table class="table" id="all_news">
          <tr>
            <th>Зураг</th>
            <th>Гарчиг</th>
            <th>Огноо</th>
            <th></th>
          </tr>
          <tr ng-repeat="news in news">
            <td><img src="../resources/uploads/{{news.thumb}}" class="img-responsive img-thumbnail" /></td>
            <td>{{news.title}}</td>
            <td>{{news.date}}</td>
            <td>
              <button class='btn btn-default'><span class='glyphicon glyphicon-eye-open'></span></button>
              <button class='btn btn-default'><span class='glyphicon glyphicon-pencil'></span></button>
              <button ng-click="deleteNews(news.id, $index)" ng-confirm-click="Та устгамаар байгаадаа итгэлтэй байна уу?" class='btn btn-default'><span class='glyphicon glyphicon-trash'></span></button>
            </td>
          </tr>

        </table>
    </div>
  </div>

</div>
