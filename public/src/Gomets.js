var app = angular.module('Gomets', []);


app.controller('PlayerController', function ($scope, apiService) {

    $scope.players = [];

    $scope.players = apiService.get().then(function (data) {
        $scope.players = data;
        $scope.current = $scope.players[0];
    });


    $scope.gometType = 'red';


    $scope.selectPlayer = function (player) {
        $scope.current = player;
    };

    $scope.isActive = function (player) {
        if (player === $scope.current) {
            return 'active';
        }
    };


    $scope.addGomet = function (event)
    {

        $.ionSound.play($scope.gometType);

        var offset = $('.face-container').offset();
        var fix = 15;
        var x = event.clientX - offset.left - fix;
        var y = event.clientY - offset.top - fix;
        var gomet = {x: x, y: y};
        $scope.current.gomets[$scope.gometType].push(gomet);
        apiService.put($scope.current.id, gomet, $scope.gometType);
    };

    loadSounds = function () {
        $.ionSound({
            sounds: ["red", "green"],
            path: "media/sound/",
            volume: "0.3"
        });
    };

    loadSounds();

    updateData = function () {
        apiService.get().then(function (data) {
            var players = {};
            for (var key in data) {
                var player = data[key];
                players['p' + player.id] = player;
            }

            for (var key in $scope.players) {
                var player = $scope.players[key]
                var dataUpdated = players['p' + player.id];

                $scope.players[key].gomets = dataUpdated.gomets;
            }
        });
    };

    setInterval(function () {
        updateData();
    }, 1000);
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
        },
        put: function (id, gomet, color) {
            var data = {
                player_id: id,
                gomet: gomet,
                color: color
            };

            return $http.post('./api.php?put', data)
                    .then(function (result) {
                        //resolve the promise as the data
                        return result.data;
                    });
        }
    };
});
