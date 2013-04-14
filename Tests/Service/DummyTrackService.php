<?php

namespace Kpacha\SOMBundle\Tests\Service;

use Kpacha\SOMBundle\Service\AbstractTrackService;
use Kpacha\SOMBundle\Document\CleanTrack;
use Kpacha\SOMBundle\Document\RawTrack;
use Kpacha\SOMBundle\Document\Website;
use Symfony\Component\HttpKernel\Log\LoggerInterface;

class DummyTrackService extends AbstractTrackService
{

    public function __construct(LoggerInterface $logger)
    {
        parent::__construct($logger);
    }

    protected function _storeRawTrack(RawTrack $rawTrack)
    {
        return true;
    }

    protected function _storeCleanTrack(CleanTrack $cleanTrack)
    {
        return true;
    }

    protected function _flush()
    {
        return true;
    }

    protected function _incrementWebsiteStatistics($cleanTracks)
    {
        return true;
    }

    public function updateScan()
    {
        return true;
    }

    public function getVisits($websiteName)
    {
        return null;
    }

    public function getWebsite($name)
    {
        return null;
    }

    public function getWebsites()
    {
        return null;
    }

}
