<?php
/**
 * 
 * 
 * 
 * 
 */

namespace Cotya\DeployHelper\Tests\Deploy\Mapper;


use Cotya\DeployHelper\Deploy\Mapper\Filemap;

class BaseFilemapTest extends \PHPUnit_Framework_TestCase
{
    
    public function testBasicMapping()
    {
        $mapper = $this->getExampleMapper();
        $mapper->addMapping('/test1.txt', '/test1__.txt');
        $sourceFile = new \SplFileInfo('/imaginary/source/path/test1.txt');
        $this->assertNotEquals(
            '/imaginary/source/path/test1.txt',
            $mapper->getFileTarget($sourceFile)->getPathname()
        );
        $this->assertNotEquals(
            '/imaginary/target/path/test1.txt',
            $mapper->getFileTarget($sourceFile)->getPathname()
        );
        $this->assertEquals(
            '/imaginary/target/path/test1__.txt',
            $mapper->getFileTarget($sourceFile)->getPathname()
        );
    }


    protected function getExampleMapper()
    {
        $sourcePath = new \SplFileInfo('/imaginary/source/path');
        $targetPath = new \SplFileInfo('/imaginary/target/path');
        $mapper = new Filemap($sourcePath, $targetPath);
        return $mapper;
    }
}
