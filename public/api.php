<?php

include __DIR__ . '/../bootstrap.php';

$document = APP_FOLDER . '/db/players.json';
if (!is_readable($document)) {
    file_put_contents($document, '');
}


if (count($_POST) < 0) {

} else {
    echo file_get_contents($document);
}

die('');
$newProductName = 'pepito';

$player = new Xuscrus\Model\PlayerEntity();
$player->setName($newProductName);

$entityManager->persist($player);
$entityManager->flush();

echo "Created with ID " . $player->getId() . "\n";


