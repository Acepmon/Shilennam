<ol class="breadcrumb">
  <li><a href="#/">Эхлэл</a></li>
  <li class="active">Улс төрийн гишүүд</li>
</ol>
<hr>
<div class="row">
  <div class="col-md-12">
    <a href="#/members/add_members" class="btn btn-success">Гишүүн нэмэх</a>
  </div>
</div>
<br>
<div class="row" ng-controller="viewMembersCtrl">
  <div class="col-md-2" ng-repeat="member in members">
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
