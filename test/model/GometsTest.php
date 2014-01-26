<?php

/**
 * Description of GometsTest
 * @backupGlobals disabled
 * @backupStaticAttributes disabled
 * @author jesus
 */
class GometsTest extends PHPUnit_Framework_TestCase
{

    private $_gomet;

    protected function setUp()
    {
        parent::setUp();
        $this->_gomet = new Xuscrus\Model\GometEntity();
    }

    /**
     * @test
     */
    function HaveAnXYposition00perDefault()
    {
        $this->assertEquals(0, $this->_gomet->getX());
        $this->assertEquals(0, $this->_gomet->getY());
    }

    /**
     * @test
     */
    function CanSetPosition()
    {
        $this->_gomet->setPosition(10, 20);

        $this->assertEquals(10, $this->_gomet->getX());
        $this->assertEquals(20, $this->_gomet->getY());
    }

    /**
     * @test
     */
    function canHaveAColor()
    {
        $colour = new Xuscrus\Model\ColorEntity();
        $this->_gomet->setColor($colour);

        $this->assertEquals($colour, $this->_gomet->getColor());
    }

}
