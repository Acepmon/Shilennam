angular.module('app').controller('homeCtrl',
    ['$scope', '$http', function($scope, $http) {
      $http.get("models/homepage/get_parties_broken.php").success(function(response) {
        $scope.partyLists = response;
        console.log($scope.partyLists);
      });
}]).controller('newsCtrl',
  ['$scope', '$http', '$timeout', function($scope, $http, $timeout) {
    $http.get("models/news/get_news_list.php").success(function(response) {
      $scope.news = response;
    });
    $scope.getArticle = function(id) {
      $http.post("models/news/get_news_list.php", {"id" : id}).success(function(response) {
        $scope.article = response;
      });
    }
}]).controller('lawsCtrl',
  ['$scope', '$http', function($scope, $http) {

}]).controller('listsCtrl',
  ['$scope', '$http', function($scope, $http) {

}]).controller('economicsCtrl',
  ['$scope', '$http', function($scope, $http) {

}]).controller('ulsConnectionsCtrl',
  ['$scope', '$http', function($scope, $http) {
    
}])
