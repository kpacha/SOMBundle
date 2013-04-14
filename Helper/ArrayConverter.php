<?php

namespace Kpacha\SOMBundle\Helper;

use Kpacha\SOMBundle\Document\Scan;

trait ArrayConverter
{

    public function scanToArray(Scan $scan)
    {
        static::$_logger->debug("Building a new Scan: " . print_r($scan, true));
        $scanArray = array('time' => $scan->getTime(), 'total' => $scan->getTotal());
        foreach ($scan->getVisits()->toArray() as $hit) {
            $scanArray['visits'][] = array('actionName' => $hit->getActionName(), 'total' => $hit->getTotal());
        }
        static::$_logger->debug("Persistsing the scan: " . print_r($scanArray, true));
        return $scanArray;
    }

}
