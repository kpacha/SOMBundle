<?php
namespace Kpacha\SOMBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * @MongoDB\Document
 */
class RawTrack
{
    /**
     * @MongoDB\Id
     */
    protected $id;
    
    /**
     * @MongoDB\String
     */
    protected $data;
    
    /**
     * @MongoDB\String
     */
    protected $ip;
    
    /**
     * @MongoDB\String
     */
    protected $referer;
    
    /**
     * @MongoDB\String
     */
    protected $session;
    
    /**
     * @MongoDB\int
     */
    protected $time;

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
     * Set data
     *
     * @param string $data
     * @return \Track
     */
    public function setData($data)
    {
        $this->data = $data;
        return $this;
    }

    /**
     * Get data
     *
     * @return string $data
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Set ip
     *
     * @param string $ip
     * @return \Track
     */
    public function setIp($ip)
    {
        $this->ip = $ip;
        return $this;
    }

    /**
     * Get ip
     *
     * @return string $ip
     */
    public function getIp()
    {
        return $this->ip;
    }

    /**
     * Set referer
     *
     * @param string $referer
     * @return \Track
     */
    public function setReferer($referer)
    {
        $this->referer = $referer;
        return $this;
    }

    /**
     * Get referer
     *
     * @return string $referer
     */
    public function getReferer()
    {
        return $this->referer;
    }

    /**
     * Set session
     *
     * @param string $session
     * @return \Track
     */
    public function setSession($session)
    {
        $this->session = $session;
        return $this;
    }

    /**
     * Get session
     *
     * @return string $session
     */
    public function getSession()
    {
        return $this->session;
    }

    /**
     * Set time
     *
     * @param int $time
     * @return \Track
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
}
