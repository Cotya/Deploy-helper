<?php
/**
 * 
 * 
 * 
 * 
 */

namespace Cotya\DeployHelper\Deploy\Mapper;


class Base implements MapperInterface
{
    protected $targetBasePath;
    
    protected $sourceBasePath;
    
    public function __construct(\SplFileInfo $sourceBasePath, \SplFileInfo $targetBasePath)
    {
        $this->targetBasePath = $targetBasePath;
        $this->sourceBasePath = $sourceBasePath;
    }

    /**
     * @param \SplFileInfo $file
     *
     * @return \SplFileInfo
     */
    public function getFileTarget(\SplFileInfo $file)
    {
        if (strpos($file->getPathname(), $this->sourceBasePath->getPathname()) == 0) {
            $result = $this->calculateTargetPath($file);
        } else {
            throw new \InvalidArgumentException('file is not part of source Path');
        }
        
        return $result;
        
    }

    protected function calculateTargetPath(\SplFileInfo $file)
    {
        $pattern = $this->sourceBasePath->getPathname();
        $pattern = '|^'.str_replace('|', '\|', $pattern).'|';
        $result = new \SplFileInfo(preg_replace(
            $pattern,
            $this->targetBasePath->getPathname(),
            $file->getPathname()
        ));
        return $result;
    }
}
