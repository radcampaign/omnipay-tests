<?php
/**
 * Provides a helper for testing support methods
 */
namespace Omnipay\Tests;

use Omnipay\Common\Message\RequestInterface;

trait TestsSupportMethodsTrait
{
    /**
     * Helper test function - tets the supportFunc and then runs the func if it exists
     * or makes sure that it doesn't exist
     *
     * @param  string $supportsFunc the method name of the function that checks for support
     * @param  string $func        the method name being checked
     * @return void
     */
    protected function _testSupport($supportsFunc = '', $func = '')
    {
        $doesSupport = $this->gateway->$supportsFunc();
        $this->assertInternalType('boolean', $doesSupport);

        if ($doesSupport) {
            $this->assertInstanceOf(RequestInterface::class, $this->gateway->$func());
        } else {
            $this->assertFalse(method_exists($this->gateway, $func));
        }
    }
}
