<?php
/**
 * 
 * 
 * 
 * 
 */

namespace Cotya\DeployHelper;


use Cotya\DeployHelper\Deploy\Manager\Entry;

class DeployManager
{

    /**
     * @var Entry
     */
    protected $entries;

    /**
     * @param Entry $entry
     */
    public function addEntry(Entry $entry)
    {
        $entry[] = $entry;
    }
}
