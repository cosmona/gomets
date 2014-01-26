<?php

namespace Xuscrus\Model;

use \ArrayObject;

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

    /**
     *
     * @return \ArrayObject
     */
    function getRedGomets()
    {
        return new ArrayObject();
    }

}
