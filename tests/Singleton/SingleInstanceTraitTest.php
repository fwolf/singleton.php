<?php
namespace FwolfTest\Base\Singleton;

use Fwolf\Base\Singleton\SingleInstanceTrait;
use PHPUnit_Framework_MockObject_MockObject as MockObject;
use PHPUnit_Framework_TestCase as PHPUnitTestCase;

/**
 * @copyright   Copyright 2015-2016 Fwolf
 * @license     http://opensource.org/licenses/MIT MIT
 */
class SingleInstanceTraitTest extends PHPUnitTestCase
{
    /**
     * @return  MockObject|SingleInstanceTrait
     */
    protected function buildMock()
    {
        $mock = $this->getMockBuilder(
            SingleInstanceTrait::class
        )
            ->setMethods(null)
            ->getMockForTrait();

        return $mock;
    }


    public function testGetInstance()
    {
        $mockInstance = $this->buildMock();

        $firstInstance = $mockInstance::getInstance();
        $secondInstance = $mockInstance::getInstance();
        $this->assertEquals(
            get_class($firstInstance),
            get_class($secondInstance)
        );

        /** @noinspection PhpUndefinedFieldInspection */
        {
            // Add a temp property to test no duplicate 'new' operate
            $str = 'should exists in next getInstance()';
            $firstInstance->fooBar = $str;
            $this->assertEquals($str, $secondInstance::getInstance()->fooBar);
        }
    }
}
