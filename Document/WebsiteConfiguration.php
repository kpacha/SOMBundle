<?php
namespace Kpacha\SOMBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * @MongoDB\EmbeddedDocument
 */
class WebsiteConfiguration
{

    /**
     * @MongoDB\int
     */
    protected $scanFreq;


    /**
     * Set scanFreq
     *
     * @param int $scanFreq
     * @return \WebsiteConfiguration
     */
    public function setScanFreq($scanFreq)
    {
        $this->scanFreq = $scanFreq;
        return $this;
    }

    /**
     * Get scanFreq
     *
     * @return int $scanFreq
     */
    public function getScanFreq()
    {
        return $this->scanFreq;
    }
}
