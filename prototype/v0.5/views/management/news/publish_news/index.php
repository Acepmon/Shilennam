<ol class="breadcrumb">
  <li><a href="#/">Эхлэл</a></li>
  <li><a href="#/news">Бүх мэдээ</a></li>
  <li class="active">Шинэ мэдээ оруулах</li>
</ol>
<hr>
<div class="row">
  <div class="col-md-4" ng-controller="managementPublishNewsCtrl">
    <div class="panel panel-success">
      <div class="panel-heading">
        <h3 class="panel-title">Шинэ мэдээ оруулах</h3>
      </div>
      <div class="panel-body">
        <form action="">
          <fieldset class="form-group">
            <label for="">Гарчиг</label>
            <input type="text" class="form-control" name="title">
          </fieldset>
          <fieldset class="form-group" id="publish_news_date_picker">
            <label for="">Огноо</label>
            <input type="text" class="form-control" placeholder="yyyy-mm-dd" name="date">
          </fieldset>
          <fieldset class="form-group">
            <label for="">Нүүр зураг</label>
            <select name="img_upload" id="" class="form-control">
              <option></option>
              <option ng-repeat="upload in uploads" name="large_upload_id" value="{{upload.id}}">{{upload.name}}</option>
            </select>
          </fieldset>
          <fieldset class="form-group">
            <label for="">Бага хэмжээний зураг</label>
            <select name="thumb_upload" id="" class="form-control">
              <option></option>
              <option ng-repeat="upload in uploads" name="thumb_upload_id" value="{{upload.id}}">{{upload.name}}</option>
            </select>
          </fieldset>
          <fieldset class="form-group">
            <label for="">Дэлгэрэнгүй тайлбар</label>
            <textarea name="desc" id="" cols="30" rows="10" class="form-control"></textarea>
          </fieldset>
          <fieldset class="form-group">
            <input type="reset" value="Цэвэрлэх" class="btn btn-default">
            <input type="submit" name="name" value="Батлах" class="btn btn-primary">
          </fieldset>
        </form>
      </div>
    </div>
  </div>
  <div class="col-md-6" ng-controller="managementPublishUpdatedNewsCtrl">
    <div class="panel panel-info">
      <div class="panel-heading">
        <h3 class="panel-title">Бүх мэдээ</h3>
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
