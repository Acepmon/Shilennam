angular.module('management').controller('managementUploadsCtrl',
  ['$scope', '$http', function($scope, $http) {
    $http.get("/prototype/v0.5/models/management/json_get_uploads.php").success(function(response) {
      $scope.uploads = response;
    });
  }]).controller('managementAllNewsCtrl',
    ['$scope', '$http', function($scope, $http) {
      $http.get("/prototype/v0.5/models/management/json_get_news.php").success(function(response) {
        $scope.news = response;
      });
  }]).controller('managementPublishNewsCtrl',
    ['$scope', '$http', function($scope, $http) {

      $scope.news-insert-data = {};

      // https://scotch.io/tutorials/submitting-ajax-forms-the-angularjs-way  --- see this

      $http.get("/prototype/v0.5/models/management/json_get_uploads.php")
        .success(function(response) {
          $scope.uploads = response;
        });

  }]).controller('managementPublishUpdatedNewsCtrl',
    ['$scope', '$http', function($scope, $http) {
      $http.get("/prototype/v0.5/models/management/json_get_news.php").success(function(response) {
        $scope.news = response;
      });
  }])
