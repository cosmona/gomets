$(document).on('ready', inicio);

function inicio ()
{
    //$('.face-container').on('click', add_gomet);
}

function add_gomet (e)
{
    $.ionSound({
        sounds: ["punch", "green"],
        path: "media/sound/",
        volume: "0.3"
    });

    $.ionSound.play("punch");
    //$.ionSound.play("green");


    var offset = $(this).offset();
    var fix = 15;
    var x = e.clientX - offset.left - fix;
    var y = e.clientY - offset.top - fix;
    $(this).append('<div class="gomet" style="left:' + x + 'px;top:' + y + 'px;"></div>');
}

function PlayerController ($scope) {
    $scope.players = [
        {
            name: 'Ramon',
            gomets: {
                red: [],
                green: []
            }
        },
        {
            name: 'Jesus',
            gomets: {
                red: [],
                green: []
            }
        }
    ];

    $scope.current = $scope.players[0];

    $scope.gometType = 'red';


    $scope.selectPlayer = function (p) {
        console.log(p);
        $scope.current = p;
    }

    $scope.isActive = function (p) {
        if (p == $scope.current) {
            return 'active';
        }
    }


    $scope.addGomet = function (e)
    {
        $.ionSound({
            sounds: ["red", "green"],
            path: "media/sound/",
            volume: "0.3"
        });

        $.ionSound.play($scope.gometType);

        var offset = $('.face-container').offset();
        var fix = 15;
        var x = e.clientX - offset.left - fix;
        var y = e.clientY - offset.top - fix;

        $scope.current.gomets[$scope.gometType].push({x: x, y: y});
    }
}