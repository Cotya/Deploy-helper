<?php
/**
 * 
 * 
 * 
 * 
 */

namespace Cotya\DeployHelper\Deploy\Mapper;


class Filemap extends Base
{
    protected $filemap = array();
    
    public function addMapping($from, $to)
    {
        if (strpos($from, '/') != 0 or strpos($to, '/')) {
            throw new \InvalidArgumentException('mapping paths need to start with an "/"');
        }
        if (isset($this->filemap[$from])) {
            throw new \InvalidArgumentException('$from already exists');
        }
        $this->filemap[$from] = $to;
    }
    
    protected function calculateTargetPath(\SplFileInfo $file)
    {
        $pattern = $this->sourceBasePath->getPathname();
        $pattern = '|^'.str_replace('|', '\|', $pattern).'|';
        $fromPath = new \SplFileInfo(preg_replace(
            $pattern,
            '',
            $file->getPathname()
        ));
        if (!isset($this->filemap[$fromPath->getPathname()])) {
            throw new \InvalidArgumentException("no mapping found for \"$file\"");
        }
        $result = new \SplFileInfo($this->targetBasePath->getPathname().$this->filemap[$fromPath->getPathname()]);
        return $result;
    }
}
