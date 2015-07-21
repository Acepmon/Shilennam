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
}]);