<?php

namespace Xuscrus\Model;

/**
 * Description of Player
 *
 * @author jesus
 */
class Player
{

    private $_name;

    function setName($name)
    {
        $this->_name = $name;
    }

    function getName()
    {
        return $this->_name;
    }

}
