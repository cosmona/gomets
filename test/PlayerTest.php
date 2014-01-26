<?php

/**
 * Description of PlayerTest
 *
 * @author jesus
 */
class PlayerTest extends PHPUnit_Framework_TestCase
{

    /**
     * @test
     */
    function HaveName()
    {
        $name = 'luis';

        $player = new Xuscrus\Model\Player();

        $player->setName($name);

        $this->assertEquals($name, $player->getName());
    }

}
