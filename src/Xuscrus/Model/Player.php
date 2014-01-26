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

    /**
     *
     * @var ArrayObject
     */
    private $_redGomets;

    public function __construct()
    {
        $this->_redGomets = new ArrayObject();
    }

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
        return $this->_redGomets;
    }

    /**
     *
     * @param \Xuscrus\Model\GometEntity $gomet
     */
    function addRedGomet(GometEntity $gomet)
    {
        $this->_redGomets->append($gomet);
    }

}
