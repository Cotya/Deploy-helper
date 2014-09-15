<?php
/**
 * 
 * 
 * 
 * 
 */

namespace Cotya\DeployHelper\Tests\Deploy\Mapper;


use Cotya\DeployHelper\Deploy\Mapper\Base;

class BaseTest extends \PHPUnit_Framework_TestCase
{
    

    public function testBase()
    {
        $mapper = $this->getExampleMapper();
        $sourceFile = new \SplFileInfo('/imaginary/source/path/test1.txt');
        $this->assertNotEquals(
            '/imaginary/source/path/test1.txt',
            $mapper->getFileTarget($sourceFile)->getPathname()
        );
        $this->assertEquals(
            '/imaginary/target/path/test1.txt',
            $mapper->getFileTarget($sourceFile)->getPathname()
        );
    }


    public function testInternalPatternEscaping()
    {
        $mapper = $this->getExampleMapper();
        $sourceFile = new \SplFileInfo('/imaginary/source/path/test|1.txt');
        $this->assertEquals(
            '/imaginary/target/path/test|1.txt',
            $mapper->getFileTarget($sourceFile)->getPathname()
        );

        $sourceFile = new \SplFileInfo('/imaginary/source/path/test\|1.txt');
        $this->assertEquals(
            '/imaginary/target/path/test\|1.txt',
            $mapper->getFileTarget($sourceFile)->getPathname()
        );
    }
    
    protected function getExampleMapper()
    {
        $sourcePath = new \SplFileInfo('/imaginary/source/path');
        $targetPath = new \SplFileInfo('/imaginary/target/path');
        $mapper = new Base($sourcePath, $targetPath);
        return $mapper;
    }
}
