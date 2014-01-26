<?php

namespace Xuscrus\Model;

/**
 * Description of ColorEntity
 *
 * @author jesus
 */
class ColorEntity
{

    private $_type;

    function setType($param)
    {
        $this->_type = $param;
    }

    function getType()
    {
        return $this->_type;
    }

}
