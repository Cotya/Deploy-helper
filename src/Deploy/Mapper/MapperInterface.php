<?php
/**
 * 
 * 
 * 
 * 
 */

namespace Cotya\DeployHelper\Deploy\Mapper;


interface MapperInterface
{
    public function getFileTarget(\SplFileInfo $file);
}
