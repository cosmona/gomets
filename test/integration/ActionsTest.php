<?php

/**
 * Description of apiTests
 *
 * @author jesus
 */
class ActionsTests extends PHPUnit_Framework_TestCase
{

    /**
     * @test
     */
    function createAccount()
    {

        $api = new \Xuscrus\Gomets();


        $name = 'jesus';

        $api->createAccount('jesus');

        $player = RedBean_Facade::dispense('player');

        $player->name = $name;

        RedBean_Facade::store($player);

        RedBean_Facade::dispenseAll('player');
    }

    protected function tearDown()
    {
        $database = APP_FOLDER . '/db/test_gomets.db';

        unlink($database);
    }

}
