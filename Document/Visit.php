<?php

namespace Kpacha\SOMBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @MongoDB\Document
 */
class Visit
{

    /**
     * @MongoDB\Id
     */
    protected $id;
    
    /**
     * @MongoDB\ReferenceOne(targetDocument="Website")
     */
    protected $website;

    /**
     * @MongoDB\EmbedMany(targetDocument="HitCounter")
     */
    protected $hits;
    
    /**
     * @MongoDB\int
     */
    protected $since;

    public function __construct()
    {
        $this->hits = new ArrayCollection();
    }
    
    /**
     * Get id
     *
     * @return id $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set website
     *
     * @param Website $website
     * @return Visit
     */
    public function setWebsite(Website $website)
    {
        $this->website = $website;
        return $this;
    }

    /**
     * Get website
     *
     * @return Website $website
     */
    public function getWebsite()
    {
        return $this->website;
    }

    /**
     * Add hit
     *
     * @param HitCounter $hit
     */
    public function addHit(HitCounter $hit)
    {
        $this->hits[] = $hit;
    }

    /**
    * Remove hit
    *
    * @param HitCounter $hit
    */
    public function removeHit(HitCounter $hit)
    {
        $this->hits->removeElement($hit);
    }

    /**
     * Get hits
     *
     * @return Doctrine\Common\Collections\Collection $hits
     */
    public function getHits()
    {
        return $this->hits;
    }

    /**
     * Set since
     *
     * @param int $since
     * @return \Visit
     */
    public function setSince($since)
    {
        $this->since = $since;
        return $this;
    }

    /**
     * Get since
     *
     * @return int $since
     */
    public function getSince()
    {
        return $this->since;
    }
}
