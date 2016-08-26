/**
 * Created by Fabiano on 29/05/2016.
 */
angular.module('appcorreios')
    .controller('PainelEnemCtrl', function ($scope, $http, $anchorScroll, $interval, $state) {

        $scope.total = 0;

        $scope.trocarCor = function (obj) {
            if(obj.total === obj.conferidos){
                return 'verde';
            }
            else{
                return'vermelho';
            }

        }
        var gerarPainel = function () {
            return $http({
                method: 'POST',
                url: "rest.php",
                data:
                {
                    metodo: 'gerarPainel',
                    data: '2016-11-05',
                    classe: 'EnemController'
                }
            }).then(function successCallback(response) {
                if(response['data'] != 'null'){
                    $scope.painel = response.data.painel;
                    // console.log(response.data.painel.length);
                    // $scope.total = $scope.painel.length;
                }else{
                }
            }, function errorCallback(response) {
            });
        }

        gerarPainel();

        $interval(callAtTimeout, 5000);

        function callAtTimeout() {
            gerarPainel();
        }
    });