<?php

namespace Xuscrus\Model;

use \ArrayObject;

/**
 * Description of Player
 *
 * @author jesus
 * @Entity
 */
class Player
{

    /** @Column(length=50) */
    private $_name;

    /**
     *
     * @var ArrayObject
     */
    private $_redGomets;

    /**
     *
     * @var ArrayObject
     */
    private $_greenGomets;

    public function __construct()
    {
        $this->_redGomets = new ArrayObject();
        $this->_greenGomets = new ArrayObject();
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

    /**
     *
     * @return \ArrayObject
     */
    function getGreenGomets()
    {
        return $this->_greenGomets;
    }

    /**
     *
     * @param \Xuscrus\Model\GometEntity $gomet
     */
    function addGreenGomet(GometEntity $gomet)
    {
        $this->_greenGomets->append($gomet);
    }

}
