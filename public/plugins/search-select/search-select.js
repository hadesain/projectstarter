(function() {
	'use strict';
	 angular.module('angular-search-select', [])
	 .directive('searchSelect', function($http, $timeout) {
	 	return {
	 		require : 'ngModel',
	 		scope : {	 			
	 			value : '=',	 			
	 			text : '=',	
	 			ngDisabled : '=' 		 					
	 		},
	 		replace: true,	 		
	 		template : '<div class="search-select">'+	 						
	 						'<input type="hidden" ng-model="value">'+
	 						'<input type="text" class="form-control" ng-model="text" ng-disabled="ngDisabled">'+
	 						'<div class="search-select-dropdown">'+	 						
	 							'<div class="search-select-info" ng-show="(!text && !resource)">Ketik untuk mencari / <a href ng-click="loadAll()">Tampilkan Semua</a></div>'+	
	 							'<div class="search-select-loading" ng-show="loading">Loading...</div>'+	
	 							'<div class="search-select-option" ng-repeat="list in resource" ng-click="setValue(list.value, list.text)">{{ list.text }}</div>'+
	 						'</div>'+
	 				   '</div>',
	 		link : function(scope, elem, attr, ctrl) {
	 			var searchTimer;	 			
	 			scope.loading = false;	 				 		
	 			scope.setValue = function(value, text) {
	 				scope.value = value;
	 				scope.text = text;
	 				ctrl.$setViewValue(value);	 				
	 				angular.element('.search-select-dropdown', elem).hide();
	 			}

	 			scope.loadAll = function() {
	 				scope.loading = true;
 					scope.resource = {};
 					angular.element('.search-select-dropdown', elem).show(); 						 						 					
	 				$http.get(attr.url).then(function(response) {
	 					scope.loading = false;
	 					scope.resource = response.data.data; 				 					
	 				});	 	
	 			}

	 			angular.element('input[type="text"]', elem).on('click', function(e) {	
	 				if (!scope.resource && scope.text) {
	 					scope.loading = true;
	 					scope.resource = {};
	 					angular.element('.search-select-dropdown', elem).show(); 						 						 					
	 					if (attr.url.indexOf('?')) {
			 				var url = attr.url + '&key=' +angular.element('input[type="text"]', elem).val();
			 			} else {
			 				var url = attr.url + '?key=' +angular.element('input[type="text"]', elem).val();
			 			}	
		 				$http.get(url).then(function(response) {
		 					scope.loading = false;
		 					scope.resource = response.data.data; 				 					
		 				});	 
	 				} 			 					 	
	 				angular.element('.search-select-dropdown', elem).show();				 				
	 				angular.element('.search-select-dropdown', elem).on('click', function(e) {
	 					angular.element('html').on('click', function() {
			 				angular.element('.search-select-dropdown', elem).hide();
			 			});
			 			e.stopPropagation();
	 				});
	 				angular.element('html').on('click', function() {
		 				angular.element('.search-select-dropdown', elem).hide();
		 			});
		 			e.stopPropagation();
	 			});

	 			angular.element('input[type="text"]', elem).on('keyup', function() {
	 				clearTimeout(searchTimer);
	 				searchTimer = setTimeout(function() {
	 					scope.loading = true;
	 					scope.resource = {};
	 					angular.element('.search-select-dropdown', elem).show(); 						 						 					
	 					if (attr.url.indexOf('?')) {
			 				var url = attr.url + '&key=' +angular.element('input[type="text"]', elem).val();
			 			} else {
			 				var url = attr.url + '?key=' +angular.element('input[type="text"]', elem).val();
			 			}	
		 				$http.get(url).then(function(response) {
		 					scope.loading = false;
		 					scope.resource = response.data.data; 				 					
		 				});	 				
	 				}, 1000)
	 			});	 		
	 		}
	 	}
	 })
	 .directive('searchGridSelect', function($http, $timeout) {
	 	return {
	 		require : 'ngModel',
	 		scope : {	 			
	 			value : '=',	 			
	 			text : '=',	 
	 			ngDisabled : '='	 					
	 		},
	 		replace: true,	 		
	 		template : '<div class="search-select">'+	 						
	 						'<input type="hidden" ng-model="value">'+
	 						'<input type="text" class="form-control" ng-model="text" ng-disabled="ngDisabled">'+
	 						'<div class="search-select-dropdown">'+	 						
	 							'<div class="search-select-info" ng-show="(!text && !resource)">Ketik untuk mencari / <a href ng-click="loadAll()">Tampilkan Semua</a></div>'+	
	 							'<div class="search-select-loading" ng-show="loading">Loading...</div>'+	
	 							'<table ng-show="!loading && resource" class="search-select-table table table-bordered">'+
	 								'<thead>'+
		 								'<tr>'+
		 									'<th ng-repeat="list in resource.header">{{ list }}</th>'+
		 								'</tr>'+
		 							'</thead>'+
		 							'<tbody>'+
		 								'<tr ng-repeat="row in resource.data" ng-click="setValue(row.value, row.text)">'+
		 									'<td ng-repeat="col in row.data">{{ col }}</td>'+
		 								'<tr>'+
	 								'</tbody>'+
	 							'</table>'+	 							
	 						'</div>'+
	 				   '</div>',
	 		link : function(scope, elem, attr, ctrl) {
	 			var searchTimer;	 			
	 			scope.loading = false;	 				 		
	 			scope.setValue = function(value, text) {
	 				scope.value = value;
	 				scope.text = text;
	 				ctrl.$setViewValue(value);	 				
	 				angular.element('.search-select-dropdown', elem).hide();
	 			}

	 			scope.loadAll = function() {
	 				scope.loading = true;
 					scope.resource = {};
 					angular.element('.search-select-dropdown', elem).show(); 						 						 					
	 				$http.get(attr.url).then(function(response) {
	 					scope.loading = false;
	 					scope.resource = response.data.data; 				 					
	 				});	 	
	 			}

	 			angular.element('input[type="text"]', elem).on('click', function(e) {	
	 				if (!scope.resource && scope.text) {
	 					scope.loading = true;
	 					scope.resource = {};
	 					angular.element('.search-select-dropdown', elem).show(); 						 						 					
	 					if (attr.url.indexOf('?')) {
			 				var url = attr.url + '&key=' +angular.element('input[type="text"]', elem).val();
			 			} else {
			 				var url = attr.url + '?key=' +angular.element('input[type="text"]', elem).val();
			 			}	
		 				$http.get(url).then(function(response) {
		 					scope.loading = false;
		 					scope.resource = response.data.data; 				 					
		 				});	 
	 				} 			 					 	
	 				angular.element('.search-select-dropdown', elem).show();				 				
	 				angular.element('.search-select-dropdown', elem).on('click', function(e) {
	 					angular.element('html').on('click', function() {
			 				angular.element('.search-select-dropdown', elem).hide();
			 			});
			 			e.stopPropagation();
	 				});
	 				angular.element('html').on('click', function() {
		 				angular.element('.search-select-dropdown', elem).hide();
		 			});
		 			e.stopPropagation();
	 			});

	 			angular.element('input[type="text"]', elem).on('keyup', function() {
	 				clearTimeout(searchTimer);
	 				searchTimer = setTimeout(function() {
	 					scope.loading = true;
	 					scope.resource = {};
	 					angular.element('.search-select-dropdown', elem).show(); 						 						 					
	 					if (attr.url.indexOf('?')) {
			 				var url = attr.url + '&key=' +angular.element('input[type="text"]', elem).val();
			 			} else {
			 				var url = attr.url + '?key=' +angular.element('input[type="text"]', elem).val();
			 			}	
		 				$http.get(url).then(function(response) {
		 					scope.loading = false;
		 					scope.resource = response.data.data; 				 					
		 				});	 				
	 				}, 1000)
	 			});	 		
	 		}
	 	}
	 });
}());