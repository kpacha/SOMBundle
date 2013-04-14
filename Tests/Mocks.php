<?php
namespace Kpacha\SOMBundle\Tests;

use Kpacha\SOMBundle\Document\RawTrack;

trait Mocks
{
    public function loggerMock()
    {
        $loggerClass = 'Symfony\Component\HttpKernel\Log\LoggerInterface';

        $logger = $this->getMockBuilder($loggerClass)->getMock();
        $logger->expects($this->any())
            ->method('debug')
            ->will($this->returnValue(true));

        return $logger;
    }
    
    public function rawTrackMock()
    {
        $rawTrack = new RawTrack;
        $rawTrack->setIp('256.256.256.256');
        $rawTrack->setReferer("http://localhost/");
        $rawTrack->setSession("someSessionId");
        $rawTrack->setTime(time());
        $rawTrack->setData("_idn=0&_idts=1364592982&_idvc=3&_refts=0&_viewts=1364598280&action_name=My%20Blog&ag=0&amp%3Bcookie=1&cs=ISO-8859-1&dir=0&dir=0&fla=1&gears=0&generation_time_ms=32&h=1&id=c96a901b3c794dbb&idsite=hacking_away&java=1&m=29&pdf=1&qt=1&r=336003&realp=0&rec=1&res=1440x900&s=57&url=http%3A%2F%2Flocalhost%2Fsample%2Flong%2Furl%2Fquery%2Fto%2Fstore&wma=2");
        return $rawTrack;
    }
}
