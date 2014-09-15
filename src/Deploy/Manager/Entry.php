<?php
/**
 * 
 * 
 * 
 * 
 */

namespace Cotya\DeployHelper\Deploy\Manager;


class Entry
{

    /**
     * @var \Cotya\DeployHelper\Deploy\StrategyInterface
     */
    protected $deployStrategy;



    /**
     * @param \Cotya\DeployHelper\Deploy\StrategyInterface $deployStrategy
     */
    public function setDeployStrategy($deployStrategy)
    {
        $this->deployStrategy = $deployStrategy;
    }

    /**
     * @return \Cotya\DeployHelper\Deploy\StrategyInterface
     */
    public function getDeployStrategy()
    {
        return $this->deployStrategy;
    }
}
