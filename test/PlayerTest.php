<?php

/**
 * Description of PlayerTest
 *
 * @author jesus
 */
class PlayerTest extends PHPUnit_Framework_TestCase
{

    private $_player;

    protected function setUp()
    {
        $this->_player = new Xuscrus\Model\Player();
    }

    /**
     * @test
     */
    function haveName()
    {
        $name = 'luis';

        $this->_player->setName($name);

        $this->assertEquals($name, $this->_player->getName());
    }

    function haveARedGometList()
    {
        $this->assertEquals(0, $this->_player->getRedGomets()->count());
    }

    /**
     * @test
     */
    function canAddRedGomets()
    {
        $gomet = new Xuscrus\Model\GometEntity();

        $this->_player->addRedGomet($gomet);

        $this->assertEquals(1, $this->_player->getRedGomets()->count());
    }

    function haveAGreenGometList()
    {
        $this->assertEquals(0, $this->_player->getGreenGomets()->count());
    }

    /**
     * @test
     */
    function canAddGreenGomets()
    {
        $gomet = new Xuscrus\Model\GometEntity();

        $this->_player->addGreenGomet($gomet);

        $this->assertEquals(1, $this->_player->getGreenGomets()->count());
    }

}
