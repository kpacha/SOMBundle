<?php

namespace Kpacha\SOMBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
/**
 * @MongoDB\EmbeddedDocument
 */
class Scan
{

    /**
     * @MongoDB\int
     */
    protected $time;

    /**
     * @MongoDB\int
     */
    protected $total;

    /**
     * @MongoDB\EmbedMany(targetDocument="HitCounter")
     */
    protected $visits;

    public function __construct()
    {
        $this->visits = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set time
     *
     * @param int $time
     * @return \Scan
     */
    public function setTime($time)
    {
        $this->time = $time;
        return $this;
    }

    /**
     * Get time
     *
     * @return int $time
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * Set total
     *
     * @param int $total
     * @return \Scan
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

    /**
     * Add visits
     *
     * @param HitCounter $visits
     */
    public function addVisit(HitCounter $visits)
    {
        $this->visits[] = $visits;
    }

    /**
     * Remove visits
     *
     * @param HitCounter $visits
     */
    public function removeVisit(HitCounter $visits)
    {
        $this->visits->removeElement($visits);
    }

    /**
     * Get visits
     *
     * @return Doctrine\Common\Collections\Collection $visits
     */
    public function getVisits()
    {
        return $this->visits;
    }

}
