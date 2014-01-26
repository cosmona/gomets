var app = angular.module('Gomets', []);


app.controller('PlayerController', function ($scope, apiService) {

    $scope.players = apiService.get().then(function (data) {
        $scope.players = data;
        $scope.current = $scope.players[0];
    });


    $scope.gometType = 'red';


    $scope.selectPlayer = function (player) {
        $scope.current = player;
    };

    $scope.isActive = function (player) {
        if (player == $scope.current) {
            return 'active';
        }
    };


    $scope.addGomet = function (event)
    {
        $.ionSound({
            sounds: ["red", "green"],
            path: "media/sound/",
            volume: "0.3"
        });

        $.ionSound.play($scope.gometType);

        var offset = $('.face-container').offset();
        var fix = 15;
        var x = event.clientX - offset.left - fix;
        var y = event.clientY - offset.top - fix;

        $scope.current.gomets[$scope.gometType].push({x: x, y: y});
    };
});

app.factory('apiService', function ($http) {

    return{
        get: function () {
            //return the promise directly.
            return $http.get('./api.php')
                    .then(function (result) {
                        //resolve the promise as the data
                        return result.data;
                    });
        }
    };
});
