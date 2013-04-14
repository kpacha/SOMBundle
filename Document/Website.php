<?php

namespace Kpacha\SOMBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @MongoDB\Document
 */
class Website
{

    /**
     * @MongoDB\Id
     */
    protected $id;

    /**
     * @MongoDB\String
     * @MongoDB\Index(unique=true, order="asc")
     */
    protected $name;

    /**
     * @MongoDB\String
     * @MongoDB\Index(unique=true, order="asc")
     */
    protected $url;

    /**
     * @MongoDB\EmbedOne(targetDocument="WebsiteConfiguration")
     */
    protected $configuration;

    /**
     * @MongoDB\EmbedMany(targetDocument="HitCounter")
     */
    protected $visitsLastScan;

    /**
     * @MongoDB\EmbedMany(targetDocument="Scan")
     */
    protected $visitsLastDay;

    /**
     * @MongoDB\EmbedMany(targetDocument="Scan")
     */
    protected $visitsLastWeek;

    /**
     * @MongoDB\EmbedMany(targetDocument="Scan")
     */
    protected $visitsLastMonth;

    /**
     * @MongoDB\EmbedMany(targetDocument="Scan")
     */
    protected $visitsLastYear;

    public function __construct()
    {
        $this->visitsLastScan = null;
        $this->visitsLastDay = new ArrayCollection();
        $this->visitsLastWeek = new ArrayCollection();
        $this->visitsLastMonth = new ArrayCollection();
        $this->visitsLastYear = new ArrayCollection();
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
     * Set name
     *
     * @param string $name
     * @return Website
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Get name
     *
     * @return string $name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set url
     *
     * @param string $url
     * @return Website
     */
    public function setUrl($url)
    {
        $this->url = $url;
        return $this;
    }

    /**
     * Get url
     *
     * @return string $url
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Add a hit
     *
     * @param HitCounter $hit
     */
    public function addVisitsLastScan(HitCounter $hit)
    {
        $this->visitsLastScan[] = $hit;
    }

    /**
     * Remove a hit
     *
     * @param HitCounter $hit
     */
    public function removeVisitsLastScan(HitCounter $hit)
    {
        $this->visitsLastScan->removeElement($hit);
    }

    /**
     * Get visitsLastScan
     *
     * @return collection $visitsLastScan
     */
    public function getVisitsLastScan()
    {
        return $this->visitsLastScan;
    }

    /**
     * Add visitsLastDay
     *
     * @param Scan $visitsLastDay
     */
    public function addVisitsLastDay(Scan $visitsLastDay)
    {
        $this->visitsLastDay[] = $visitsLastDay;
    }

    /**
     * Remove visitsLastDay
     *
     * @param Scan $visitsLastDay
     */
    public function removeVisitsLastDay(Scan $visitsLastDay)
    {
        $this->visitsLastDay->removeElement($visitsLastDay);
    }

    /**
     * Get visitsLastDay
     *
     * @return Doctrine\Common\Collections\Collection $visitsLastDay
     */
    public function getVisitsLastDay()
    {
        return $this->visitsLastDay;
    }

    /**
     * Add visitsLastWeek
     *
     * @param Scan $visitsLastWeek
     */
    public function addVisitsLastWeek(Scan $visitsLastWeek)
    {
        $this->visitsLastWeek[] = $visitsLastWeek;
    }

    /**
     * Remove visitsLastWeek
     *
     * @param Scan $visitsLastWeek
     */
    public function removeVisitsLastWeek(Scan $visitsLastWeek)
    {
        $this->visitsLastWeek->removeElement($visitsLastWeek);
    }

    /**
     * Get visitsLastWeek
     *
     * @return Doctrine\Common\Collections\Collection $visitsLastWeek
     */
    public function getVisitsLastWeek()
    {
        return $this->visitsLastWeek;
    }

    /**
     * Add visitsLastMonth
     *
     * @param Scan $visitsLastMonth
     */
    public function addVisitsLastMonth(Scan $visitsLastMonth)
    {
        $this->visitsLastMonth[] = $visitsLastMonth;
    }

    /**
     * Remove visitsLastMonth
     *
     * @param Scan $visitsLastMonth
     */
    public function removeVisitsLastMonth(Scan $visitsLastMonth)
    {
        $this->visitsLastMonth->removeElement($visitsLastMonth);
    }

    /**
     * Get visitsLastMonth
     *
     * @return Doctrine\Common\Collections\Collection $visitsLastMonth
     */
    public function getVisitsLastMonth()
    {
        return $this->visitsLastMonth;
    }

    /**
     * Add visitsLastYear
     *
     * @param Scan $visitsLastYear
     */
    public function addVisitsLastYear(Scan $visitsLastYear)
    {
        $this->visitsLastYear[] = $visitsLastYear;
    }

    /**
     * Remove visitsLastYear
     *
     * @param Scan $visitsLastYear
     */
    public function removeVisitsLastYear(Scan $visitsLastYear)
    {
        $this->visitsLastYear->removeElement($visitsLastYear);
    }

    /**
     * Get visitsLastYear
     *
     * @return Doctrine\Common\Collections\Collection $visitsLastYear
     */
    public function getVisitsLastYear()
    {
        return $this->visitsLastYear;
    }


    /**
     * Set configuration
     *
     * @param Kpacha\SOMBundle\Document\WebsiteConfiguration $configuration
     * @return \Website
     */
    public function setConfiguration(\Kpacha\SOMBundle\Document\WebsiteConfiguration $configuration)
    {
        $this->configuration = $configuration;
        return $this;
    }

    /**
     * Get configuration
     *
     * @return Kpacha\SOMBundle\Document\WebsiteConfiguration $configuration
     */
    public function getConfiguration()
    {
        return $this->configuration;
    }
}
