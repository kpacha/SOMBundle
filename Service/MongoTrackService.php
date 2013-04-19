<?php

namespace Kpacha\SOMBundle\Service;

use Symfony\Component\HttpKernel\Log\LoggerInterface;
use Doctrine\ODM\MongoDB\DocumentManager;
use Doctrine\Bundle\MongoDBBundle\ManagerRegistry;
use Kpacha\SOMBundle\Document\CleanTrack;
use Kpacha\SOMBundle\Document\RawTrack;
use Kpacha\SOMBundle\Helper\ArrayConverter;

class MongoTrackService extends AbstractTrackService
{

    use ArrayConverter;

    /**
     * @var DocumentManager 
     */
    private $dm;

    public function __construct(ManagerRegistry $doctrineMongoManager, LoggerInterface $logger)
    {
        parent::__construct($logger);
        $this->dm = $doctrineMongoManager->getManager();
    }

    public function track($clientIp, $queryString, $referer, $cookie)
    {
        $rawTrack = $this->_track($clientIp, $queryString, $referer, $cookie);
        return $this->process($rawTrack);
    }

    protected function _storeRawTrack(RawTrack $rawTrack)
    {
        
    }

    protected function _storeCleanTrack(CleanTrack $cleanTrack)
    {
        self::$_logger->debug("Persisting cleanTrack in mongoDb: " . print_r($cleanTrack, true));
        $this->dm->persist($cleanTrack);
    }

    protected function _flush()
    {
        self::$_logger->debug("Flushing mongoDb connection");
        $this->dm->flush();
    }

    protected function _incrementWebsiteStatistics($cleanTracks)
    {
        $urls = self::_parseTracks($cleanTracks);
        self::$_logger->debug("Registering new visits in mongoDb: " . print_r($urls, true));

        foreach ($urls as $idSite => $statistics) {
            $this->dm->createQueryBuilder('KpachaSOMBundle:Visit')
                    // Update with upsert the visit counters
                    ->update()
                    ->field('website.name')->equals($idSite)
                    ->setNewObj(array('$inc' => $statistics))
                    ->upsert()
                    ->getQuery()
                    ->execute();
        }
    }

    private static function _parseTracks($cleanTracks)
    {
        self::$_logger->debug("Parsing new tracks");
        $urls = array();
        foreach ($cleanTracks as $cleanTrack) {
            self::$_logger->debug("Parsing new track: " + print_r($cleanTrack, true));
            $idSite = $cleanTrack->getIdsite();
            $url = 'hits.' . urlencode($cleanTrack->getActionName());
            if (isset($urls[$idSite]) && isset($urls[$idSite][$url])) {
                $urls[$idSite][$url]++;
            } else {
                $urls[$idSite][$url] = 1;
            }
        }
        return $urls;
    }

    public function updateScan($limit = 50)
    {
        self::$_logger->debug("Updating the hit counters from $limit websites");
        $cursor = $this->dm->getDocumentCollection('KpachaSOMBundle:Visit')
                ->find(array('hits' => array('$exists' => true)))
                ->limit($limit);

        $total = 0;
        $now = time();
        foreach ($cursor as $visit) {
            $arrayScan = $this->scanToArray($this->createScan($now, $visit['hits']));
            $push = array('visitsLastDay' => $arrayScan);
            $set = array('name' => $visit['website']['name']);
            $this->dm->getDocumentCollection('KpachaSOMBundle:Website')
                    ->update(
                            array('name' => $visit['website']['name']),
                            array('$push' => $push,'$set' => $set),
                            array('upsert' => true)
                            );
            
            $update = array('$set' => array('since' => $now));
            foreach ($visit['hits'] as $url => $hits) {
                if ($hits) {
                    $update['$inc']['hits.' . $url] = -$hits;
                }
            }
            if(isset($update['$inc'])){
                $this->dm->getDocumentCollection('KpachaSOMBundle:Visit')
                        ->update(array('_id'=>$visit['_id']), $update, array('upsert' => true));
            }
            $total++;
        }

        return $total;
    }

    public function getVisits($websiteName)
    {
        self::$_logger->debug("Looking for [$websiteName] in mongoDb");
        $cursor = $this->dm->getDocumentCollection('KpachaSOMBundle:Visit')
                ->find(array('website.name' => $websiteName));
        foreach ($cursor as $scan) {
            $scans[] = $scan;
        }
        return $scans;
    }

    public function getWebsite($name)
    {
        self::$_logger->debug("Looking for [$name] in mongoDb");
        return $this->dm->getRepository('KpachaSOMBundle:Website')
                        ->findOneBy(array('name' => $name));
    }
    
    public function getWebsites()
    {
        self::$_logger->debug("Getting websites out from mongoDb");
        return $this->dm->getRepository('KpachaSOMBundle:Website')
                        ->findAll()->sort(array('name' => 1));
    }

}
