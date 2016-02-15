var BASE_URL = '/angularity';
var app = angular.module('angularityApp',['ngRoute']);


	app.config(function ($routeProvider,$locationProvider){
		$routeProvider

			.when('/',{

				templateUrl : 'angularity/public/tpl/index.html'
			})

			.when('/signup',{

				controller : 'UsersController',

				templateUrl : 'angularity/public/tpl/signup.html'
			})
			
			.when('/login',{

				controller : 'UsersController',
				templateUrl : 'angularity/public/tpl/login.html'


			})
			.when('/post',{

				controller : 'PostController',
				templateUrl : 'angularity/public/tpl/post.html'
			})
			.otherwise({

				templateUrl : 'angularity/public/tpl/error.html'

			});
		

		

	
	});

