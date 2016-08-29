/**
 * Created by Fabiano Costa on 27/05/2016.
 */
angular.module('appcorreios', ['ui.router'])
    .config(function ($stateProvider, $urlRouterProvider) {
        /*
         $ocLazyLoadProvider.config({
         // Set to true if you want to see what and when is dynamically loaded
         debug: false
         });
         */
        $stateProvider
            .state('home', {
                url: '/home',
                templateUrl: 'views/home.html',
                controller: 'homeCtrl'
            })
            .state('lancamento', {
                url: '/lancamento',
                templateUrl: 'views/lancamento.html',
                controller: 'lancamentoCtrl'
            })
            .state('relatorio', {
                url: '/relatorio',
                templateUrl: 'views/relatorio.html',
                controller: 'relatorioCtrl'
            })
            .state('baixa', {
                url: '/baixa',
                templateUrl: 'views/baixa.html',
                controller: 'baixaCtrl'
            })
            .state('eneminterior', {
                url: '/eneminterior',
                templateUrl: 'views/rotas.html',
                controller: 'enemCtrl'
            })
            .state('enemcapital', {
                url: '/enemcapital',
                templateUrl: 'views/enemcapital.html',
                controller: 'enemCapitalCtrl'
            })
            .state('painelenemcapital', {
                url: '/painelenemcapital',
                templateUrl: 'views/painelenemcapital.html',
                controller: 'PainelEnemCapitalCtrl'
            })
            .state('painelenem', {
                url: '/painelenem',
                templateUrl: 'views/painelenem.html',
                controller: 'PainelEnemCtrl'
            });
        $urlRouterProvider.otherwise('/home');
    })
    .directive('ngEnter', function () {
        return function (scope, element, attrs) {
            element.bind("keydown keypress", function (event) {
                if (event.which === 13) {
                    scope.$apply(function () {
                        scope.$eval(attrs.ngEnter);
                    });
                    event.preventDefault();
                }
            });
        };
    })
    .directive('focusMe', ['$timeout', '$parse', function ($timeout, $parse) {
        return {
//scope: true, // optionally create a child scope
            link: function (scope, element, attrs) {
                var model = $parse(attrs.focusMe);
                scope.$watch(model, function (value) {
                    console.log('value=', value);
                    if (value === true) {
                        $timeout(function () {
                            element[0].focus();
                        });
                    }
                });
// to address @blesh's comment, set attribute value to 'false'
// on blur event:
                element.bind('blur', function () {
                    console.log('blur');
                    scope.$apply(model.assign(scope, false));
                });
            }
        };
    }]);