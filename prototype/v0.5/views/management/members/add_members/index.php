<ol class="breadcrumb">
  <li><a href="#/">Эхлэл</a></li>
  <li><a href="#/members">Улс төрийн гишүүд</a></li>
  <li class="active">Гишүүн нэмэх</li>
</ol>
<hr>
<div class="row" ng-controller="insertMembersCtrl">
  <div class="col-md-4">
    <div class="panel panel-primary">
      <div class="panel-body">
        <form ng-submit="insertMember()">
          <fieldset class="form-group">
            <label for="gis_name">Гишүүн нэр</label>
            <input type="text" name="gis_name" value="" class="form-control" ng-model="memberInsertData.name">
          </fieldset>
          <fieldset class="form-group">
            <label for="gis_upload">Зураг</label>
            <select name="gis_upload" class="form-control" ng-model="memberInsertData.img" ng-options="upload.id as upload.name for upload in uploads"></select>
          </fieldset>
          <fieldset class="form-group">
            <input type="reset" value="Цэвэрлэх" class="btn btn-default">
            <input type="submit" value="Нэмэх" class="btn btn-primary">
          </fieldset>
        </form>
      </div>
    </div>
  </div>
  <div class="col-md-8">
    <div class="col-md-4" ng-repeat="member in members">
      <div class="panel panel-default" style="background-color: #f8f8f8; border-color: #e7e7e7;">
        <div class="panel-body" style="">
          <p>
            {{member.ner}}
          </p>
          <img src="../resources/uploads/{{member.img}}" class="img-responsive" />
        </div>
      </div>
    </div>
  </div>
</div>
