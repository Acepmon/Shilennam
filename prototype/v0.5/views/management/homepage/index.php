
  <h1 class="text-primary">Менежментийн хэсэг</h1>
  <hr>
  <div class="row">
    <div class="col-lg-5">
      <div class="panel panel-success">
        <div class="panel-heading">
          <h3 class="panel-title">Шинэ мэдээ оруулах</h3>
          <span class="pull-right clickable" data-effect="fadeOut"><i class="fa fa-times"></i></span>
        </div>
        <div class="panel-body">
          <form action="">
            <fieldset class="form-group">
              <label for="">Гарчиг</label>
              <input type="text" class="form-control">
            </fieldset>
            <fieldset class="form-group">
              <label for="">Огноо</label>
              <input type="text" class="form-control">
            </fieldset>
            <fieldset class="form-group">
              <label for="">Нүүр зураг</label>
              <select name="" id="" class="form-control"></select>
            </fieldset>
            <fieldset class="form-group">
              <label for="">Бага хэмжээний зураг</label>
              <select name="" id="" class="form-control"></select>
            </fieldset>
            <fieldset class="form-group">
              <label for="">Дэлгэрэнгүй тайлбар</label>
              <textarea name="" id="" cols="30" rows="10" class="form-control"></textarea>
            </fieldset>
            <fieldset class="form-group">
              <input type="reset" value="Цэвэрлэх" class="btn btn-default">
              <input type="submit" name="name" value="Батлах" class="btn btn-primary">
            </fieldset>
          </form>
        </div>
      </div>
    </div>
    <div class="col-lg-7" ng-controller="managementAllNewsCtrl">
      <div class="panel panel-info">
        <div class="panel-heading">
          <h3 class="panel-title">Бүх мэдээ</h3>
          <span class="pull-right clickable" data-effect="fadeOut"><i class="fa fa-times"></i></span>
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
    <div class="col-lg-7" ng-controller="managementUploadsCtrl">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Бүх зураг</h3>
          <span class="pull-right clickable" data-effect="fadeOut"><i class="fa fa-times"></i></span>
        </div>
        <table class="table table-hover table-bordered" id="all_uploads">
          <tr>
            <th>Зураг</th>
            <th>Нэр</th>
            <th>Файл</th>
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
          </tr>
        </table>
      </div>
    </div>
  </div>
  <div class="row">

  </div>
