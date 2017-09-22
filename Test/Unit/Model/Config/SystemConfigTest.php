<?php
namespace Flagbit\Inxmail\Test\Unit\Model\Config;
use Flagbit\Inxmail\Model\Config\SystemConfig;

/**
 * Class SystemConfigTest
 * @package Flagbit\Inxmail\Test\Unit\Model\Config
 * @runTestsInSeparateProcesses
 */
class SystemConfigTest extends \PHPUnit\Framework\TestCase
{
    protected $config;

    public function setUp()
    {

        $this->configHelper = $this->getMockBuilder('Flagbit\Inxmail\Helper\Config')
            ->disableOriginalConstructor()
            ->getMock();

        $this->configModel =  SystemConfig::getSystemConfig($this->configHelper);
    }

    public function testGetConfigUrl()
    {
        $this->configHelper->expects($this->once())
            ->method('getConfig')
            ->with('inxmail/general/api_url')
            ->will($this->returnValue('http://tes.example.com/testing'));

        $modelReturn = $this->configModel->getApiUrl();
        $this->assertEquals($modelReturn, 'http://tes.example.com/testing');
    }
}
