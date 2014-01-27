var app = angular.module('Gomets', []);


app.controller('PlayerController', function ($scope, apiService) {

    $scope.players = [];

    $scope.players = apiService.get().then(function (data) {
        $scope.players = data.players;
        for (var key in $scope.players) {
            $scope.current = $scope.players[key];
            break;
        }

        $scope.you = data.you;
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

    $scope.changeName = function () {
        apiService.name($scope.you.name);
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
            for (var key in data.players) {
                var player = data.players[key]


                if (!$scope.players.hasOwnProperty(player.id)) {
                    $scope.players[player.id] = player;
                    continue;
                }

                $scope.players[player.id].name = player.name;
                $scope.players[player.id].gomets = player.gomets;
            }

            $scope.you.name = data.you.name;
            $scope.you.gomets = data.you.gomets;
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
            return $http.get('./api.php/get')
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

            return $http.post('./api.php/gomet', data)
                    .then(function (result) {
                        //resolve the promise as the data
                        return result.data;
                    });
        },
        name: function (name) {
            var data = {
                name: name
            };

            return $http.post('./api.php/change_name', data)
                    .then(function (result) {
                        //resolve the promise as the data
                        return result.data;
                    });
        },
    };
});
