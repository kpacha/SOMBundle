<?php

namespace Kpacha\SOMBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * @MongoDB\Document
 */
class CleanTrack
{

    /**
     * @MongoDB\Id
     */
    protected $id;

    /**
     * @MongoDB\int
     */
    protected $piwikId;

    /**
     * @MongoDB\int
     */
    protected $idn;

    /**
     * @MongoDB\int
     */
    protected $idts;

    /**
     * @MongoDB\int
     */
    protected $idvc;

    /**
     * @MongoDB\int
     */
    protected $refts;

    /**
     * @MongoDB\int
     */
    protected $viewts;

    /**
     * @MongoDB\String
     */
    protected $actionName;

    /**
     * @MongoDB\int
     */
    protected $ag;

    /**
     * @MongoDB\int
     */
    protected $cookie;

    /**
     * @MongoDB\String
     */
    protected $cs;

    /**
     * @MongoDB\int
     */
    protected $fla;

    /**
     * @MongoDB\int
     */
    protected $gears;

    /**
     * @MongoDB\int
     */
    protected $generationTimeMs;

    /**
     * @MongoDB\int
     */
    protected $h;

    /**
     * @MongoDB\String
     */
    protected $idsite;

    /**
     * @MongoDB\String
     */
    protected $dir;

    /**
     * @MongoDB\int
     */
    protected $java;

    /**
     * @MongoDB\int
     */
    protected $m;

    /**
     * @MongoDB\int
     */
    protected $pdf;

    /**
     * @MongoDB\int
     */
    protected $qt;

    /**
     * @MongoDB\int
     */
    protected $r;

    /**
     * @MongoDB\int
     */
    protected $realp;

    /**
     * @MongoDB\int
     */
    protected $rec;

    /**
     * @MongoDB\String
     */
    protected $res;

    /**
     * @MongoDB\int
     */
    protected $s;

    /**
     * @MongoDB\String
     */
    protected $url;

    /**
     * @MongoDB\String
     */
    protected $urlref;

    /**
     * @MongoDB\int
     */
    protected $wma;

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
     * Set piwikId
     *
     * @param int $piwikId
     * @return \CleanTrack
     */
    public function setPiwikId($piwikId)
    {
        $this->piwikId = $piwikId;
        return $this;
    }

    /**
     * Get piwikId
     *
     * @return int $piwikId
     */
    public function getPiwikId()
    {
        return $this->piwikId;
    }

    /**
     * Set idn
     *
     * @param int $idn
     * @return \CleanTrack
     */
    public function setIdn($idn)
    {
        $this->idn = $idn;
        return $this;
    }

    /**
     * Get idn
     *
     * @return int $idn
     */
    public function getIdn()
    {
        return $this->idn;
    }

    /**
     * Set idts
     *
     * @param int $idts
     * @return \CleanTrack
     */
    public function setIdts($idts)
    {
        $this->idts = $idts;
        return $this;
    }

    /**
     * Get idts
     *
     * @return int $idts
     */
    public function getIdts()
    {
        return $this->idts;
    }

    /**
     * Set idvc
     *
     * @param int $idvc
     * @return \CleanTrack
     */
    public function setIdvc($idvc)
    {
        $this->idvc = $idvc;
        return $this;
    }

    /**
     * Get idvc
     *
     * @return int $idvc
     */
    public function getIdvc()
    {
        return $this->idvc;
    }

    /**
     * Set refts
     *
     * @param int $refts
     * @return \CleanTrack
     */
    public function setRefts($refts)
    {
        $this->refts = $refts;
        return $this;
    }

    /**
     * Get refts
     *
     * @return int $refts
     */
    public function getRefts()
    {
        return $this->refts;
    }

    /**
     * Set viewts
     *
     * @param int $viewts
     * @return \CleanTrack
     */
    public function setViewts($viewts)
    {
        $this->viewts = $viewts;
        return $this;
    }

    /**
     * Get viewts
     *
     * @return int $viewts
     */
    public function getViewts()
    {
        return $this->viewts;
    }

    /**
     * Set actionName
     *
     * @param string $actionName
     * @return \CleanTrack
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
     * Set ag
     *
     * @param int $ag
     * @return \CleanTrack
     */
    public function setAg($ag)
    {
        $this->ag = $ag;
        return $this;
    }

    /**
     * Get ag
     *
     * @return int $ag
     */
    public function getAg()
    {
        return $this->ag;
    }

    /**
     * Set cookie
     *
     * @param int $cookie
     * @return \CleanTrack
     */
    public function setCookie($cookie)
    {
        $this->cookie = $cookie;
        return $this;
    }

    /**
     * Get cookie
     *
     * @return int $cookie
     */
    public function getCookie()
    {
        return $this->cookie;
    }

    /**
     * Set cs
     *
     * @param string $cs
     * @return \CleanTrack
     */
    public function setCs($cs)
    {
        $this->cs = $cs;
        return $this;
    }

    /**
     * Get cs
     *
     * @return string $cs
     */
    public function getCs()
    {
        return $this->cs;
    }

    /**
     * Set fla
     *
     * @param int $fla
     * @return \CleanTrack
     */
    public function setFla($fla)
    {
        $this->fla = $fla;
        return $this;
    }

    /**
     * Get fla
     *
     * @return int $fla
     */
    public function getFla()
    {
        return $this->fla;
    }

    /**
     * Set gears
     *
     * @param int $gears
     * @return \CleanTrack
     */
    public function setGears($gears)
    {
        $this->gears = $gears;
        return $this;
    }

    /**
     * Get gears
     *
     * @return int $gears
     */
    public function getGears()
    {
        return $this->gears;
    }

    /**
     * Set generationTimeMs
     *
     * @param int $generationTimeMs
     * @return \CleanTrack
     */
    public function setGenerationTimeMs($generationTimeMs)
    {
        $this->generationTimeMs = $generationTimeMs;
        return $this;
    }

    /**
     * Get generationTimeMs
     *
     * @return int $generationTimeMs
     */
    public function getGenerationTimeMs()
    {
        return $this->generationTimeMs;
    }

    /**
     * Set h
     *
     * @param int $h
     * @return \CleanTrack
     */
    public function setH($h)
    {
        $this->h = $h;
        return $this;
    }

    /**
     * Get h
     *
     * @return int $h
     */
    public function getH()
    {
        return $this->h;
    }

    /**
     * Set idsite
     *
     * @param string $idsite
     * @return \CleanTrack
     */
    public function setIdsite($idsite)
    {
        $this->idsite = $idsite;
        return $this;
    }

    /**
     * Get idsite
     *
     * @return string $idsite
     */
    public function getIdsite()
    {
        return $this->idsite;
    }

    /**
     * Set java
     *
     * @param int $java
     * @return \CleanTrack
     */
    public function setJava($java)
    {
        $this->java = $java;
        return $this;
    }

    /**
     * Get java
     *
     * @return int $java
     */
    public function getJava()
    {
        return $this->java;
    }

    /**
     * Set m
     *
     * @param int $m
     * @return \CleanTrack
     */
    public function setM($m)
    {
        $this->m = $m;
        return $this;
    }

    /**
     * Get m
     *
     * @return int $m
     */
    public function getM()
    {
        return $this->m;
    }

    /**
     * Set pdf
     *
     * @param int $pdf
     * @return \CleanTrack
     */
    public function setPdf($pdf)
    {
        $this->pdf = $pdf;
        return $this;
    }

    /**
     * Get pdf
     *
     * @return int $pdf
     */
    public function getPdf()
    {
        return $this->pdf;
    }

    /**
     * Set qt
     *
     * @param int $qt
     * @return \CleanTrack
     */
    public function setQt($qt)
    {
        $this->qt = $qt;
        return $this;
    }

    /**
     * Get qt
     *
     * @return int $qt
     */
    public function getQt()
    {
        return $this->qt;
    }

    /**
     * Set r
     *
     * @param int $r
     * @return \CleanTrack
     */
    public function setR($r)
    {
        $this->r = $r;
        return $this;
    }

    /**
     * Get r
     *
     * @return int $r
     */
    public function getR()
    {
        return $this->r;
    }

    /**
     * Set realp
     *
     * @param int $realp
     * @return \CleanTrack
     */
    public function setRealp($realp)
    {
        $this->realp = $realp;
        return $this;
    }

    /**
     * Get realp
     *
     * @return int $realp
     */
    public function getRealp()
    {
        return $this->realp;
    }

    /**
     * Set rec
     *
     * @param int $rec
     * @return \CleanTrack
     */
    public function setRec($rec)
    {
        $this->rec = $rec;
        return $this;
    }

    /**
     * Get rec
     *
     * @return int $rec
     */
    public function getRec()
    {
        return $this->rec;
    }

    /**
     * Set res
     *
     * @param string $res
     * @return \CleanTrack
     */
    public function setRes($res)
    {
        $this->res = $res;
        return $this;
    }

    /**
     * Get res
     *
     * @return string $res
     */
    public function getRes()
    {
        return $this->res;
    }

    /**
     * Set s
     *
     * @param int $s
     * @return \CleanTrack
     */
    public function setS($s)
    {
        $this->s = $s;
        return $this;
    }

    /**
     * Get s
     *
     * @return int $s
     */
    public function getS()
    {
        return $this->s;
    }

    /**
     * Set url
     *
     * @param string $url
     * @return \CleanTrack
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
     * Set urlref
     *
     * @param string $urlref
     * @return \CleanTrack
     */
    public function setUrlref($urlref)
    {
        $this->urlref = $urlref;
        return $this;
    }

    /**
     * Get urlref
     *
     * @return string $urlref
     */
    public function getUrlref()
    {
        return $this->urlref;
    }

    /**
     * Set wma
     *
     * @param int $wma
     * @return \CleanTrack
     */
    public function setWma($wma)
    {
        $this->wma = $wma;
        return $this;
    }

    /**
     * Get wma
     *
     * @return int $wma
     */
    public function getWma()
    {
        return $this->wma;
    }

    /**
     * Set ip
     *
     * @param string $ip
     * @return \CleanTrack
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
     * @return \CleanTrack
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
     * @return \CleanTrack
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
     * @return \CleanTrack
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
     * Set dir
     *
     * @param string $dir
     * @return \CleanTrack
     */
    public function setDir($dir)
    {
        $this->dir = $dir;
        return $this;
    }

    /**
     * Get dir
     *
     * @return string $dir
     */
    public function getDir()
    {
        return $this->dir;
    }
}
