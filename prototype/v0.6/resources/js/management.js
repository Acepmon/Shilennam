$(function(){
$('.clickable').on('click',function(){
    var effect = $(this).data('effect');
        $(this).closest('.panel')[effect]();
	})
})


// var adminApp = angular.module('adminApp', [
//   'ngRoute',
//   'adminAppControllers'
// ]);
//
// adminApp.config(['$routeProvider',
//   function($routeProvider) {
//     $routeProvider
//       .when('/news', {
//         templateUrl: 'views/news/news.php',
//         controller: 'newsCtrl'
//       })
//       .otherwise({
//         redirectTo: '/';
//       });
//   }]);
