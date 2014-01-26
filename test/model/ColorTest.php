<?php

/**
 * Description of ColorTest
 *
 * @author jesus
 */
class ColorTest extends PHPUnit_Framework_TestCase
{

    /**
     * @test
     */
    function colorHaveType()
    {
        $color = new Xuscrus\Model\ColorEntity();

        $color->setType('red');
        $this->assertEquals('red', $color->getType());
    }

}
