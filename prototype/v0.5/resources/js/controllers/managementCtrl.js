angular.module('management').directive('ngConfirmClick', [
    function(){
        return {
            priority: 1,
            terminal: true,
            link: function (scope, element, attr) {
                var msg = attr.ngConfirmClick || "Are you sure?";
                var clickAction = attr.ngClick;
                element.bind('click',function (event) {
                    if ( window.confirm(msg) ) {
                        scope.$eval(clickAction)
                    }
                });
            }
        };
}]).directive('fileModel', ['$parse', function($parse) {
  return {
    restrict : 'A',
    link : function(scope, element, attr) {
      var model = $parse(attrs.fileModel);
      var modelSetter = model.assign;

      element.bind('change', function() {
        scope.$apply(function(){
          modelSetter(scope, element[0].files[0]);
        })
      })
    }
  }
}]).service('multipartForm', ['$http', function($http) {
  this.post = function(uploadUrl, data) {
    var fd = new FormData();
    for (var key in data) {
      fd.append(key, data[key]);
    }
    $http.post(uploadUrl, fd, {
      transformRequest : angular.identity,
      headers          : {'Content-Type' : undefined}
    });
  }
}])

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

      $scope.deleteNews = function(id, index) {
        console.log(id);
        $http({
          method  : "POST",
          url     : "/prototype/v0.5/models/management/delete_news.php",
          data    : {'id' : id},
          headers : {'Content-Type':'application/x-www-form-urlencoded'}
        }).success(function(response) {
          console.log(response);
          $scope.newslistError = response.error;
          $scope.newslistMessage = response.message;
          if (!response.error) {
            $scope.news.splice(index, 1);
          }
        });
      };
  }]).controller('managementPublishNewsCtrl',
    ['$scope', '$http', function($scope, $http) {

      // https://scotch.io/tutorials/submitting-ajax-forms-the-angularjs-way  --- see this

      $http.get("/prototype/v0.5/models/management/json_get_news.php").success(function(response) {
        $scope.news = response;
      });

      $http.get("/prototype/v0.5/models/management/json_get_uploads.php")
        .success(function(response) {
          $scope.uploads = response;
        });
      $scope.newsInsertData;

      $scope.insertNews = function() {
        $http({
          method  : "POST",
          url     : "/prototype/v0.5/models/management/insert_news.php",
          data    : $.param($scope.newsInsertData),
          headers : {'Content-Type':'application/x-www-form-urlencoded'}
        }).success(function(data) {
          if (!data.success) {
            $scope.errorTitle = data.errors.title;
            $scope.errorDate = data.errors.date;
            $scope.errorImgUpload = data.errors.img_upload;
            $scope.errorThumbUpload = data.errors.thumb_upload;
            $scope.errorDesc = data.errors.desc;
            $scope.errorProcess = data.errors.process;
          } else {
            $scope.message = data.message;
            $http.get("/prototype/v0.5/models/management/json_get_news.php").success(function(response) {
              $scope.news = response;
            });
          }
        });
      };

      $scope.deleteNews = function(id, index) {
        console.log(id);
        $http({
          method  : "POST",
          url     : "/prototype/v0.5/models/management/delete_news.php",
          data    : {'id' : id},
          headers : {'Content-Type':'application/x-www-form-urlencoded'}
        }).success(function(response) {
          console.log(response);
          $scope.newslistError = response.error;
          $scope.newslistMessage = response.message;
          if (!response.error) {
            $scope.news.splice(index, 1);
          }
        });
      };

  }]).controller('viewUploadsCtrl',
  ['$scope', '$http', function($scope, $http) {
    $http.get("/prototype/v0.5/models/management/json_get_uploads.php")
      .success(function(response) {
        $scope.uploads = response;
      });

      $scope.deleteUpload = function(id, index) {
        $http({
          method  : "POST",
          url     : "/prototype/v0.5/models/management/delete_upload.php",
          data    : {"id" : id},
          headers : {'Content-Type':'application/x-www-form-urlencoded'}
        }).success(function(response) {
          console.log(response);
          $scope.error = response.error;
          $scope.message = response.message;
          if (!response.error) {
            $scope.uploads.splice(index, 1);
          }
        })
      };

  }]).controller('uploadNewFile',
  ['$scope', '$http', function($scope, $http) {
    $http.get("/prototype/v0.5/models/management/json_get_uploads.php")
      .success(function(response) {
        $scope.uploads = response;
      });
    $scope.uploading = {};

    $scope.UploadFile = function() {
      var formData = new FormData($("#uploadNewFile"));
      $.post("/prototype/v0.5/models/management/upload_file.php", formData, function(response) {
        console.log(response);
      });
    }

    $scope.deleteUpload = function(id, index) {
      $http({
        method  : "POST",
        url     : "/prototype/v0.5/models/management/delete_upload.php",
        data    : {"id" : id},
        headers : {'Content-Type':'application/x-www-form-urlencoded'}
      }).success(function(response) {
        console.log(response);
        $scope.error = response.error;
        $scope.message = response.message;
        if (!response.error) {
          $scope.uploads.splice(index, 1);
        }
      })
    };
  }]).controller('viewMembersCtrl',
  ['$scope', '$http', function($scope, $http) {
    $http.get("/prototype/v0.5/models/management/json_get_members.php").success(function(response) {
      $scope.members = response;
      console.log($scope.members);
    });
  }]).controller('insertMembersCtrl',
  ['$scope', '$http', function($scope, $http) {
    $scope.insertMember = function() {
      $http({
        method  : "POST",
        url     : "/prototype/v0.5/models/management/insert_member.php",
        data    : $.param($scope.newsInsertData),
        headers : {'Content-Type':'application/x-www-form-urlencoded'}
      }).success(function(data) {
        if (!data.success) {
          // $scope.errorTitle = data.errors.title;
          // $scope.errorDate = data.errors.date;
          // $scope.errorImgUpload = data.errors.img_upload;
          // $scope.errorThumbUpload = data.errors.thumb_upload;
          // $scope.errorDesc = data.errors.desc;
          // $scope.errorProcess = data.errors.process;
        } else {
          // $scope.message = data.message;
          $http.get("/prototype/v0.5/models/management/json_get_members.php").success(function(response) {
            $scope.members = response;
          });
        }
      });
    };
  }])
