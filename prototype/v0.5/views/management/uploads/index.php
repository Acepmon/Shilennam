<ol class="breadcrumb">
  <li><a href="#/">Эхлэл</a></li>
  <li class="active">Бүх зураг үзэх</li>
</ol>
<hr>
<div class="row">
  <div class="col-md-10">
    <a href="#/uploads/upload_new" class="btn btn-success">Шинээр зураг оруулах</a>
  </div>
</div>
<br>
<div class="row" ng-controller="viewUploadsCtrl">
  <div class="col-md-12">
    <div class="panel panel-info">
      <div class="panel-heading">
        <h3 class="panel-title">Бүх зураг</h3>
      </div>
      <div class="panel-body" ng-show="error == false || error == true">
        <div class="alert alert-success" ng-show="error == false">
          {{message}}
        </div>
        <div class="alert alert-danger" ng-show="error == true">
          {{message}}
        </div>
      </div>
      <table class="table table-hover table-bordered" id="all_uploads">
        <tr>
          <th>Зураг</th>
          <th>Нэр</th>
          <th>Файл</th>
          <th></th>
        </tr>
        <tr ng-repeat="upload in uploads">
          <td>
            <img src="../resources/uploads/{{upload.path}}" class="img-responsive img-thumbnail"/>
          </td>
          <td>
            {{upload.name}}
          </td>
          <td>
            {{upload.path}}
          </td>
          <td class="separate-btns">
            <button class="btn btn-default"><span class="glyphicon glyphicon-eye-open"></span></button>
            <button class="btn btn-default"><span class="glyphicon glyphicon-pencil"></span></button>
            <button class="btn btn-default" ng-click="deleteUpload(upload.id, $index)" ng-confirm-click="Та устгамаар байгаадаа итгэлтэй байна уу?"><span class="glyphicon glyphicon-trash"></span></button>
          </td>
        </tr>
      </table>
    </div>
  </div>
</div>
