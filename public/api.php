<?php

include __DIR__ . '/../bootstrap.php';

session_start();

$document = APP_FOLDER . '/db/players.json';
if (!is_readable($document)) {
    file_put_contents($document, '');
}

if (isset($_GET['put'])) {
    $data = json_decode(file_get_contents("php://input"));

    $players = json_decode(file_get_contents($document));

    foreach ($players as $key => $player) {
        if ($player->id == $data->player_id) {
            $color = $data->color;
            $list = $players[$key]->gomets->$color;
            $list[] = $data->gomet;

            $players[$key]->gomets->$color = $list;
        }
    }

    unlink($document);
    file_put_contents($document, json_encode($players));
} else {
    echo file_get_contents($document);
}
