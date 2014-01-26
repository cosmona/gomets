<?php

/**
 * Description of GometsTest
 *
 * @author jesus
 */
class GometsTest extends PHPUnit_Framework_TestCase
{

    /**
     * @test
     */
    function gometHaveAnXYposition00perDefault()
    {

        $gomet = new Xuscrus\Model\GometEntity();

        $this->assertEquals(0, $gomet->getX());
        $this->assertEquals(0, $gomet->getY());
    }

    /**
     * @test
     */
    function gometCanSetPosition()
    {
        $gomet = new Xuscrus\Model\GometEntity();

        $gomet->setPosition(10, 20);

        $this->assertEquals(10, $gomet->getX());
        $this->assertEquals(20, $gomet->getY());
    }

}
