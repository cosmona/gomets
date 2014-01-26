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

}
