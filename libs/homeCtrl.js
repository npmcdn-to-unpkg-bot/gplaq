/**
 * Created by Fabiano on 29/05/2016.
 */
angular.module('appcorreios')
    .controller('homeCtrl', function ($scope, $http) {

        $scope.objeto = [];
        $scope.quantidade = 0;

        $scope.lista = [];
        $scope.lista_unidades = [];
        $scope.unidades = {};



        var listarObjetos = function () {
            return $http({
                method: 'POST',
                url: "rest.php",
                data:
                {
                    metodo: 'listar',
                    data: {},
                    classe: 'ObjetoController'
                }
            }).then(function successCallback(response) {
                if(response['data'] != 'null'){
                    $scope.objetos = response.data;
                    $scope.quantidade = $scope.objetos.length;
                }else{
                }
            }, function errorCallback(response) {
            });
        }

        var listarUnidades = function () {
            return $http({
                method: 'POST',
                url: "rest.php",
                data:
                {
                    metodo: 'listar',
                    data: {},
                    classe: 'UnidadeController'
                }
            }).then(function successCallback(response) {
                if(response['data']){
                    $scope.unidades = response.data;
                }else{
                }
            }, function errorCallback(response) {
            });
        }

        listarObjetos();
        listarUnidades();





    });
