<?php

namespace Omnipay\Tests;

use Omnipay\Common\AbstractGateway;

abstract class AccountGatewayTestCase extends BaseGatewayTestCase
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

    /**
     * Tests supportCreate
     *
     * @return void
     */
    public function testSupportsCreate()
    {
        $this->_testSupport('supportsCreate', 'create');
    }

    /**
     * Tests supportModify
     *
     * @return void
     */
    public function testSupportsModify()
    {
        $this->_testSupport('supportsModify', 'modify');
    }

    /**
     * Tests supportsDelete
     *
     * @return void
     */
    public function testSupportsDelete()
    {
        $this->_testSupport('supportsDelete', 'delete');
    }
}
