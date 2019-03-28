<?php

namespace Omnipay\Tests;

use Omnipay\Common\AbstractGateway;

abstract class UserGatewayTestCase extends BaseGatewayTestCase
{
    use TestsSupportMethodsTrait;

    /**
     * Tests support find
     *
     * @return void
     */
    public function testSupportsFind()
    {
        $this->_testSupport('supportsFind', 'find');
    }
}
