<ol class="breadcrumb">
  <li><a href="#/">Эхлэл</a></li>
  <li><a href="#/news">Бүх мэдээ</a></li>
  <li class="active">Шинэ мэдээ оруулах</li>
</ol>
<hr>
<div class="row" ng-controller="managementPublishNewsCtrl">
  <div class="col-md-4">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title">Шинэ мэдээ оруулах</h3>
      </div>
      <div class="panel-body">
        <form ng-submit="insertNews()">
          <div class="alert alert-success" ng-show="message">
            {{message}}
          </div>
          <div class="alert alert-danger" ng-show="errorProcess">
            {{errorProcess}}
          </div>
          <fieldset class="form-group" ng:class="errorTitle ? 'has-error' : ''">
            <label for="">Гарчиг</label>
            <input type="text" class="form-control" name="title" ng-model="newsInsertData.title">
          </fieldset>
          <fieldset class="form-group" id="publish_news_date_picker" ng:class="errorDate ? 'has-error' : ''">
            <label for="">Огноо</label>
            <input type="text" class="form-control" placeholder="yyyy-mm-dd" name="date" ng-model="newsInsertData.date">
          </fieldset>
          <fieldset class="form-group" ng:class="errorImgUpload ? 'has-error' : ''">
            <label for="">Нүүр зураг</label>
            <select class="form-control" name="img_upload" ng-model="newsInsertData.img_upload" ng-options="upload.id as upload.name for upload in uploads">
            </select>
          </fieldset>
          <fieldset class="form-group" ng:class="errorThumbUpload ? 'has-error' : ''">
            <label for="">Бага хэмжээний зураг</label>
            <select id="" class="form-control" name="thumb_upload" ng-model="newsInsertData.thumb_upload">
              <option></option>
              <option ng-repeat="upload in uploads" name="thumb_upload_id" value="{{upload.id}}">{{upload.name}}</option>
            </select>
          </fieldset>
          <fieldset class="form-group" ng:class="errorDesc ? 'has-error' : ''">
            <label for="">Дэлгэрэнгүй тайлбар</label>
            <textarea cols="30" rows="10" class="form-control" name="desc" ng-model="newsInsertData.desc"></textarea>
          </fieldset>
          <fieldset class="form-group">
            <input type="reset" value="Цэвэрлэх" class="btn btn-default">
            <input type="submit" name="name" value="Батлах" class="btn btn-primary">
          </fieldset>
        </form>
      </div>
    </div>
  </div>
  <div class="col-md-8">
    <div class="panel panel-info">
      <div class="panel-heading">
        <h3 class="panel-title">Бүх мэдээ</h3>
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
            <th>Үйлдлүүд</th>
          </tr>
          <tr ng-repeat="news in news">
            <td><img src="../resources/uploads/{{news.thumb}}" class="img-responsive img-thumbnail" /></td>
            <td>{{news.title}}</td>
            <td>{{news.date}}</td>
            <td>
              <button class='btn btn-default'><span class='glyphicon glyphicon-eye-open'></span></button>
              <button class='btn btn-default'><span class='glyphicon glyphicon-pencil'></span></button>
              <button ng-click="deleteNews(news.id, $index)" ng-confirm-click="Are you sure want to delete?" class='btn btn-default'><span class='glyphicon glyphicon-trash'></span></button>
            </td>
          </tr>

        </table>
    </div>
  </div>
</div>
