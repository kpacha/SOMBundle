<?php

namespace Kpacha\SOMBundle\Helper;

use Kpacha\SOMBundle\Document\CleanTrack;
use Kpacha\SOMBundle\Document\RawTrack;
use Kpacha\SOMBundle\Document\HitCounter;
use Kpacha\SOMBundle\Document\Scan;

trait EntityBuilder
{

    /**
     * simple pattern for the underscore to CamelCase transformation
     * @var String
     */
    private static $_sanitizePattern = array('/_(.?)/e', '/-(.?)/e', '/ (.?)/e');

    public function createRawTrack($clientIp, $queryString, $referer, $cookie)
    {
        static::$_logger->debug("Creating a new raw track", func_get_args());
        $track = new RawTrack;
        $track->setIp($clientIp);
        $track->setData($queryString);
        $track->setTime(time());
        $track->setReferer($referer);
        $track->setSession($cookie);
        static::$_logger->debug("Returning a RawTrack instance: " . print_r($track, true));
        return $track;
    }

    public function createScan($now, $visits)
    {
        static::$_logger->debug("Building a new Scan: " . print_r($visits, true));
        $scan = new Scan;
        $scan->setTime($now);
        $scan->setTotal(array_sum($visits));
        foreach ($visits as $actionName => $hits) {
            if ($hits) {
                $scan->addVisit($this->createHitCounter($actionName, $hits));
            }
        }
        static::$_logger->debug("Persistsing the scan: " . print_r($scan, true));
        return $scan;
    }

    public function createHitCounter($actionName, $hits)
    {
        static::$_logger->debug("Processing the hit counter: " . print_r(func_get_args(), true));
        $hit = new HitCounter;
        $hit->setActionName($actionName);
        $hit->setTotal($hits);
        static::$_logger->debug("Persistsing the hit counter: " . print_r($hit, true));
        return $hit;
    }

    public function createCleanTrack(RawTrack $rawTrack)
    {
        static::$_logger->debug("Creating a sanitized track");
        $cleanTrack = new CleanTrack;
        $cleanTrack->setReferer($rawTrack->getReferer())
                ->setTime($rawTrack->getTime())
                ->setSession($rawTrack->getSession())
                ->setIp($rawTrack->getIp());
        $params = explode('&', $rawTrack->getData());
        static::$_logger->debug("Exploding the query parameters of the track");
        foreach ($params as $param) {
            $cleanTrack = self::_updateParameter($cleanTrack, $param);
        }
        return $cleanTrack;
    }

    private static function _updateParameter($cleanTrack, $param)
    {
        $details = explode('=', $param);
        $setter = self::_extractSetterName($details[0]);
        if (method_exists($cleanTrack, $setter)) {
            $cleanTrack->$setter(urldecode($details[1]));
        }
        return $cleanTrack;
    }

    private static function _extractSetterName($piwikParam)
    {
        $field = trim(preg_replace(self::$_sanitizePattern, 'strtoupper("$1")', $piwikParam));
        $setter = 'set' . ucfirst($field);
        if ($setter == 'setId') {
            self::$_logger->debug("Changing the name of the piwik id parameter in order to avoid the collision with the entity id");
            $setter = 'setPiwikId';
        }
        return $setter;
    }

}
