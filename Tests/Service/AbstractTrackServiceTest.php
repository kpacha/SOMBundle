<?php

namespace Kpacha\SOMBundle\Tests\Service;

use Kpacha\SOMBundle\Tests\Mocks;

class AbstractTrackServiceTest extends \PHPUnit_Framework_TestCase
{

    use Mocks;

    /**
     * @var DummyTrackService
     */
    protected $_subject;

    public function setUp()
    {
        $this->_subject = new DummyTrackService($this->loggerMock());
    }

    public function testRawTrackGeneration()
    {
        $rawTrackMock = $this->rawTrackMock();

        $rawTrack = $this->_subject->track($rawTrackMock->getIp(), $rawTrackMock->getData(), $rawTrackMock->getReferer(), $rawTrackMock->getSession());

        $this->assertInstanceOf('Kpacha\SOMBundle\Document\RawTrack', $rawTrack);
        $this->assertEquals($rawTrackMock->getIp(), $rawTrack->getIp());
        $this->assertEquals($rawTrackMock->getData(), $rawTrack->getData());
        $this->assertEquals($rawTrackMock->getReferer(), $rawTrack->getReferer());
        $this->assertEquals($rawTrackMock->getSession(), $rawTrack->getSession());
    }
    
    public function testRawTrackProcessing()
    {
        $rawTrack = $this->rawTrackMock();
        
        $this->assertEquals(1, $this->_subject->process($rawTrack));
    }

    public function testRawTracksProcessing()
    {
        $rawTrack[] = $this->rawTrackMock();
        $rawTrack[] = $this->rawTrackMock();
        
        $this->assertEquals(2, $this->_subject->process($rawTrack));
    }

}
