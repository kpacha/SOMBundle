<?php

namespace Kpacha\SOMBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * @MongoDB\EmbeddedDocument
 */
class HitCounter
{

    /**
     * @MongoDB\String
     */
    protected $actionName;

    /**
     * @MongoDB\int
     */
    protected $total;

    /**
     * Set actionName
     *
     * @param string $actionName
     * @return \HitCounter
     */
    public function setActionName($actionName)
    {
        $this->actionName = $actionName;
        return $this;
    }

    /**
     * Get actionName
     *
     * @return string $actionName
     */
    public function getActionName()
    {
        return $this->actionName;
    }

    /**
     * Set total
     *
     * @param int $total
     * @return \HitCounter
     */
    public function setTotal($total)
    {
        $this->total = $total;
        return $this;
    }

    /**
     * Get total
     *
     * @return int $total
     */
    public function getTotal()
    {
        return $this->total;
    }
}
