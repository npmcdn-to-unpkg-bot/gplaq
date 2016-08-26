/**
 * Created by Fabiano on 29/05/2016.
 */
angular.module('appcorreios')
    .controller('baixaCtrl', function ($scope, $http) {

        $scope.objeto = [];
        $scope.quantidade = 0;

        $scope.lista = [];
        $scope.lista_unidades = [];
        $scope.unidades = {};

        $scope.salvar = function (obj) {

            var retorno = obj.codigo.split('\n');
            var qtde = retorno.length;

            for (var i=0;i<qtde;i++){
                if(checarObjeto(retorno[i])){
                    $scope.lista.push(checarObjeto(retorno[i]));
                }
            }
            req_baixar($scope.lista);

        }

        var checarObjeto = function(obj){

            var cdd = obj.substr(11, 13);

            var qtde = $scope.unidades.length;

            for(var i=0;i<qtde;i++){
                if(cdd == $scope.unidades[i].identificador){
                    return {codigo:obj,identificador:cdd};
                }
            }
        }

        var req_baixar = function (params) {
            $http({
                method: 'POST',
                url: "rest.php",
                data:
                {
                    metodo: 'baixartodos',
                    data: params,
                    classe: 'ObjetoController'
                }
            }).then(function successCallback(response) {
                if(response['data']){
                    if( response.data.result === true){
                        delete $scope.objeto;
                    }
                    listarObjetos();
                }else{
                }
            }, function errorCallback(response) {
            });
        }

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

        $scope.gerarPlanilha = function () {
            window.open('src/downloadExcel.php');

            // return $http({
            //     method: 'POST',
            //     url: "rest.php",
            //     data:
            //     {
            //         metodo: 'gerarplanilha',
            //         data: {},
            //         classe: 'ObjetoController'
            //     }
            // }).then(function successCallback(response) {
            //     if(response['data']){
            //         console.log( response.data );
            //     }else{
            //     }
            // }, function errorCallback(response) {
            // });
        }

        listarObjetos();
        listarUnidades();





    });
