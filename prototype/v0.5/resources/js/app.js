angular.module('app', [
    'ui.router'
]).config(['$urlRouterProvider', '$stateProvider', function($urlRouterProvider, $stateProvider) {
    $urlRouterProvider.otherwise('/');

    $stateProvider.state('home', {
        url: '/',
        templateUrl: 'views/homepage/index.php',
        controller: 'homeCtrl'
    }).state('news', {
        url: '/news',
        templateUrl: 'views/news/index.php'
    }).state('news-article', {
        url: '/news/news-article',
        templateUrl: 'view/news/index.php'
    })
}])
angular.module('management', [
    'ui.router'
]).config(['$urlRouterProvider', '$stateProvider', function($urlRouterProvider, $stateProvider) {
    $urlRouterProvider.otherwise('/');

    $stateProvider.state('home', {
      url: '/',
      templateUrl: '../views/management/homepage/index.php'
    }).state('view_news', {
      url: '/news',
      templateUrl: '../views/management/news/index.php'
    }).state('publish_news', {
      url: '/news/publish_news',
      templateUrl: '../views/management/news/publish_news/index.php'
    }).state('view_parties', {
      url: '/party/',
      templateUrl: '../views/management/party/index.php'
    }).state('view_irged_aan', {
      url: '/irged_aan',
      templateUrl: '../views/management/irged_aan/index.php'
    }).state('ediin_zasag_angi', {
      url: '/ediin_zasag_angi',
      templateUrl: '../views/management/ediin_zasag_angi/index.php'
    }).state('companies', {
      url: '/companies',
      templateUrl: '../views/management/company/index.php'
    }).state('uploads', {
      url: '/uploads',
      templateUrl: '../views/management/uploads/index.php'
    }).state('upload_new', {
      url: '/uploads/upload_new',
      templateUrl: '../views/management/uploads/upload_new/index.php'
    })
}]);
