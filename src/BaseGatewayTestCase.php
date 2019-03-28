<?php

namespace Omnipay\Tests;

use Omnipay\Common\AbstractGateway;

abstract class BaseGatewayTestCase extends TestCase
{
    /** @var AbstractGateway */
    protected $gateway;

    public function testGetNameNotEmpty()
    {
        $name = $this->gateway->getName();
        $this->assertNotEmpty($name);
        $this->assertInternalType('string', $name);
    }

    public function testGetShortNameNotEmpty()
    {
        $shortName = $this->gateway->getShortName();
        $this->assertNotEmpty($shortName);
        $this->assertInternalType('string', $shortName);
    }

    public function testGetDefaultParametersReturnsArray()
    {
        $settings = $this->gateway->getDefaultParameters();
        $this->assertInternalType('array', $settings);
    }

    public function testDefaultParametersHaveMatchingMethods()
    {
        $settings = $this->gateway->getDefaultParameters();
        foreach ($settings as $key => $default) {
            $getter = 'get'.ucfirst($this->camelCase($key));
            $setter = 'set'.ucfirst($this->camelCase($key));
            $value = uniqid();

            $this->assertTrue(method_exists($this->gateway, $getter), "Gateway must implement $getter()");
            $this->assertTrue(method_exists($this->gateway, $setter), "Gateway must implement $setter()");

            // setter must return instance
            $this->assertSame($this->gateway, $this->gateway->$setter($value));
            $this->assertSame($value, $this->gateway->$getter());
        }
    }

    public function testTestMode()
    {
        $this->assertSame($this->gateway, $this->gateway->setTestMode(false));
        $this->assertSame(false, $this->gateway->getTestMode());

        $this->assertSame($this->gateway, $this->gateway->setTestMode(true));
        $this->assertSame(true, $this->gateway->getTestMode());
    }
}
