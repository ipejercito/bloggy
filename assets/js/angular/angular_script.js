var app_admin = angular.module('ng_admin', [
	'jcs-autoValidate'
]);



app_admin.run(function(defaultErrorMessageResolver){
	defaultErrorMessageResolver.getErrorMessages().then(function(errorMessages){
		errorMessages["invalid_name"] = "Invalid characters";
		errorMessages["too_short"] = "enter valid name";
	});

});

app_admin.controller("wrapper",function($scope){
	$scope.$on("LOAD",function(){$scope.loading = true});
	$scope.$on("UNLOAD",function(){$scope.loading = false});
});



app_admin.controller("ng_login_controller", function($scope,$http,$interval,$window){
	$scope.login = {};
	$scope.onSubmit = function(){
		$scope.$emit("LOAD");
		$http.post('class/users.php',$scope.login)
          .success(function(data) {
			console.log(data);
            if (data.status) {
            	$scope.status = data.status;
            	$scope.user_in_db = data.message;
            	$interval(function(){ $window.location.href = "dashboard.php";},5000);
            } else {
            	$scope.status = data.status;
            	$scope.user_in_db = data.message;
            	$interval(function(){ 
            		$scope.$emit("UNLOAD");
            	},5000);
            }

          });

	};
	
});

app_admin.controller("ng_register_controller", function($scope,$http,$interval){
	$scope.registration = {};
	
	$scope.onSubmit = function(){
		$scope.$emit("LOAD");
		$http.post('class/users.php',$scope.registration)
          .success(function(data) {
			//console.log($scope.registration);
            if (data.status) {
            	$scope.status = data.status;
            	$scope.user_in_db = data.message;
            	$interval(function(){ 
            		$scope.$emit("UNLOAD");
            	},5000);
            	console.log(data);
            } else {
            	$scope.status = data.status;
            	$scope.user_in_db = data.message;
            	$interval(function(){ 
            		$scope.$emit("UNLOAD");
            	},5000);
            	console.log(data);
            }
          });
	};
});


