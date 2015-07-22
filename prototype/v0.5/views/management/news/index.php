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

  <div class="col-md-10" ng-controller="managementAllNewsCtrl">
    <div class="panel panel-info">
      <div class="panel-heading">
        <h3 class="panel-title">Бүх мэдээ</h3>
        <!-- <span class="pull-right clickable" data-effect="fadeOut"><i class="fa fa-times"></i></span> -->
      </div>
        <table class="table" id="all_news">
          <tr>
            <th>Зураг</th>
            <th>Гарчиг</th>
            <th>Огноо</th>
            <th>Үйлдлүүд</th>
          </tr>
          <tr ng-repeat="news in news">
            <td><img src="../resources/uploads/{{news.thumb}}" class="img-responsive img-thumbnail" /></td>
            <td>{{news.title}}</td>
            <td>{{news.date}}</td>
            <td>
              <a href='' class='btn btn-default'><span class='glyphicon glyphicon-eye-open'></span></a>
              <a href='' class='btn btn-default'><span class='glyphicon glyphicon-pencil'></span></a>
              <a href='' class='btn btn-default'><span class='glyphicon glyphicon-trash'></span></a>
            </td>
          </tr>

        </table>
    </div>
  </div>

</div>
