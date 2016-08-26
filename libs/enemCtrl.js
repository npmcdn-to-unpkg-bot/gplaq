/**
 * Created by Fabiano on 29/05/2016.
 */
angular.module('appcorreios')
    .controller('enemCtrl', function ($scope, $http, $anchorScroll) {
        $scope.lista = [];
        $scope.enem = {'rota':0, 'destinatario': ""};
        $scope.restante = 0;

        $scope.qtde = function () {
            return $scope.lista.length;
        }
        $scope.pegarDados = function () {
            return $http({
                method: 'POST',
                url: "rest.php",
                data:
                {
                    metodo: 'getdata',
                    data: {},
                    classe: 'EnemController'
                }
            }).then(function successCallback(response) {
                if(response['data'] != 'null'){
                    $scope.result = response.data;
                    $scope.quantidade = $scope.result.length;
                }else{
                }
            }, function errorCallback(response) {
            });
        }
        $scope.envia = function (codigo) {
            return $http({
                method: 'POST',
                url: "rest.php",
                data:
                {
                    metodo: 'pegarRota',
                    data: {codigo: codigo},
                    classe: 'EnemController'
                }
            }).then(function successCallback(response) {
                if(response['data'] != 'null'){
                    if(response.data.result != null)
                    {
                        $scope.enem = response.data.result;

                        // console.log(response.data.painel);
                        $scope.lista.push(response.data.result);
                    }else{
                        delete $scope.enem;
                        alert('Objeto já lançado ou não existe!');
                    }
                    delete $scope.codigo;
                    $scope.focus = true;
                    $scope.painel = response.data.painel;
                    $scope.restante = response.data.restante;

                }else{
                }
            }, function errorCallback(response) {
            });
        }
        $scope.mudarCor = function (data) {
            if(data == '2016-11-05'){
                return 'corverde';
            }else{
                return 'corvermelho'
            }
        }
        $scope.focus = true;



        $scope.trocarCor = function (obj) {
            if(obj.total === obj.conferidos){
                return 'verde';
            }
            else{
                return'vermelho';
            }

        }

    });