/**
 * Created by Fabiano on 29/05/2016.
 */
angular.module('appcorreios')
    .controller('lancamentoCtrl', function ($scope, $http) {

        $scope.objeto = [];
        $scope.objetos = [];
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
            console.log($scope.lista);
            req_lancamento($scope.lista);
            if($scope.lista != 'null'){
                $scope.quantidade = $scope.lista.length;
            }


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

        var req_lancamento = function (params) {
            $http({
                method: 'POST',
                url: "rest.php",
                data:
                {
                    metodo: 'salvartodos',
                    data: params,
                    classe: 'ObjetoController'
                }
            }).then(function successCallback(response) {
                if(response['data']){
                    if(response.data.result === true){
                        listarObjetos(params);
                    }

                }else{
                }
            }, function errorCallback(response) {
            });
        }

        var listarObjetos = function (objs) {

            $scope.objetos = objs;
            delete $scope.objeto;
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

        // var procurarNaLista = function (obj) {
        //     listarObjetos();
        //
        //     var qtde = $scope.unidades.length
        //     for(var i=0;i<qtde;i++){
        //         if(obj == $scope.unidades[i]){
        //             $scope.lista_unidades.push($scope.unidades[i]);
        //         }
        //     }
        // }

        listarObjetos();
        listarUnidades();





    });
