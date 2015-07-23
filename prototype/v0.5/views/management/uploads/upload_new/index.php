<ol class="breadcrumb">
  <li><a href="#/">Эхлэл</a></li>
  <li><a href="#/uploads">Бүх зураг үзэх</a></li>
  <li class="active">Шинээр зураг оруулах</li>
</ol>
<hr>
<div class="row" ng-controller="uploadNewFile">
  <div class="col-md-5">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title">Зураг оруулах</h3>
      </div>
      <div class="panel-body">
        <form action="/prototype/v0.5/models/management/upload_file.php" method="POST" enctype="multipart/form-data" id="uploadNewFile">
          <fieldset class="form-group">
            <label for="">Зурагны нэр</label>
            <input type="text" class="form-control" ng-model="uploading.name" name="name" required>
          </fieldset>
          <fieldset class="form-group">
            <label for="">Зураг сонгох</label>
            <input type="file" name="file" accept="image/*" required>
          </fieldset>
          <hr>
          <fieldset class="form-group">
            <input type="reset" value="Цэвэрлэх" class="btn btn-default">
            <button type="submit" class="btn btn-primary">Оруулах</button>
          </fieldset>
        </form>
      </div>
    </div>
  </div>
  <div class="col-md-7">
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
