<?php

namespace Xuscrus\Model;

/**
 * Description of GometEntity
 *
 * @author jesus
 */
class GometEntity
{

    private $_x = 0;
    private $_y = 0;
    private $_color;

    function getX()
    {
        return $this->_x;
    }

    function getY()
    {
        return $this->_y;
    }

    function setPosition($x, $y)
    {
        $this->_x = $x;
        $this->_y = $y;
    }

    function setColor(ColorEntity $color)
    {
        $this->_color = $color;
    }

    function getColor()
    {
        return $this->_color;
    }

}
