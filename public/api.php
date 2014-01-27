<?php

include __DIR__ . '/../bootstrap.php';


$app = new \Silex\Application();
$app['debug'] = true;
session_start();
session_cache_expire(60 * 9);

$app->get('/get', function() use($app) {
    $players = get_players();

    $id = session_id();

    if (!isset($players->$id)) {
        if (!is_object($players)) {
            $players = new stdClass();
        }

        $players->$id = cerate_player();

        update_players($players);
    }

    $response = new stdClass();
    $response->players = $players;
    $response->you = $players->$id;

    unset($response->players->$id);

    echo json_encode($response);
    die();
});

$app->post('/change_name', function() use($app) {

    $data = json_decode(file_get_contents("php://input"));

    $players = get_players();
    $id = session_id();
    var_dump($data);
    $players->$id->name = $data->name;

    update_players($players);
    die();
});

$app->post('/gomet', function() use($app) {

    $data = json_decode(file_get_contents("php://input"));

    $players = get_players();

    $id = $data->player_id;
    $color = $data->color;
    $list = $players->$id->gomets->$color;
    $list[] = $data->gomet;
    $players->$id->gomets->$color = $list;

    update_players($players);
    die();
});


define('DATABASE', APP_FOLDER . '/db/players.json');

function get_players()
{
    if (!is_readable(DATABASE)) {
        if (!is_readable(APP_FOLDER . '/db/')) {
            mkdir(APP_FOLDER . '/db/');
        }

        file_put_contents(DATABASE, '{}');
    }
    return json_decode(file_get_contents(DATABASE));
}

function update_players($players)
{
    unlink(DATABASE);
    file_put_contents(DATABASE, json_encode($players));
}

function cerate_player()
{
    $player = new stdClass();

    $player->id = session_id();
    $player->gomets = new stdClass();
    $player->gomets->red = array();
    $player->gomets->green = array();

    $player->name = 'your_name';

    return $player;
}

$app->run();
