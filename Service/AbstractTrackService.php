<?php

namespace Kpacha\SOMBundle\Service;

use Kpacha\SOMBundle\Document\CleanTrack;
use Kpacha\SOMBundle\Document\RawTrack;
use Kpacha\SOMBundle\Helper\EntityBuilder;
use Symfony\Component\HttpKernel\Log\LoggerInterface;

abstract class AbstractTrackService
{

    use EntityBuilder;

    /**
     * @var LoggerInterface
     */
    protected static $_logger;

    public function __construct(LoggerInterface $logger)
    {
        self::$_logger = $logger;
    }

    public function track($clientIp, $queryString, $referer, $cookie)
    {
        return $this->_track($clientIp, $queryString, $referer, $cookie);
    }

    protected function _track($clientIp, $queryString, $referer, $cookie)
    {
        self::$_logger->debug("Creating a new raw track", func_get_args());
        $track = $this->createRawTrack($clientIp, $queryString, $referer, $cookie);

        $this->_storeRawTrack($track);
        self::$_logger->debug("Returning a RawTrack instance: " . print_r($track, true));
        return $track;
    }

    abstract protected function _storeRawTrack(RawTrack $rawTrack);

    public function process($rawTracks)
    {
        self::$_logger->debug("Processing raw track(s)", func_get_args());
        if (!is_array($rawTracks)) {
            $rawTracks = array($rawTracks);
        }
        $cleanTracks = array();
        foreach ($rawTracks as $rawTrack) {
            $this->_storeCleanTrack($cleanTracks[] = $this->createCleanTrack($rawTrack));
        }
        self::$_logger->debug("Incrementing the stats with the track(s)");
        $this->_incrementWebsiteStatistics($cleanTracks);
        self::$_logger->debug("Finishing the persistence of the track(s)");
        $this->_flush();

        $processedTracks = count($rawTracks);
        self::$_logger->debug("Processed [$processedTracks] raw track(s)");
        return $processedTracks;
    }

    abstract protected function _storeCleanTrack(CleanTrack $cleanTrack);

    abstract protected function _incrementWebsiteStatistics($cleanTracks);

    abstract protected function _flush();

    abstract public function updateScan();

    abstract public function getVisits($websiteName);

    abstract public function getWebsite($name);

    abstract public function getWebsites();
}
