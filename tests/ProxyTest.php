<?php
/*
 * This file is part of the Peek and Poke package.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace SebastianBergmann\PeekAndPoke;

/**
 * @covers SebastianBergmann\PeekAndPoke\Proxy
 */
class ProxyTest extends \PHPUnit_Framework_TestCase
{
    public function testCanBeCreatedForValidArgument()
    {
        $this->assertInstanceOf(Proxy::class, new Proxy(new \StdClass));
    }

    /**
     * @expectedException \SebastianBergmann\PeekAndPoke\InvalidArgumentException
     */
    public function testExceptionIsRaisedForInvalidArgument()
    {
        new Proxy(null);
    }

    /**
     * @expectedException \SebastianBergmann\PeekAndPoke\BadMethodCallException
     */
    public function testExceptionIsRaisedWhenInvokedMethodDoesNotExist()
    {
        $proxy = new Proxy(new \StdClass);
        $proxy->nonExistantMethod();
    }

    /**
     * @expectedException \SebastianBergmann\PeekAndPoke\BadAttributeAccessException
     */
    public function testExceptionIsRaisedWhenAccessedAttributeDoesNotExist()
    {
        $proxy = new Proxy(new \StdClass);
        $proxy->nonExistantAttribute;
    }

    public function testPublicMethodCanBeInvoked()
    {
        $proxy = new Proxy(new Foo);
        $this->assertEquals('result', $proxy->publicMethod());
    }

    public function testProtectedMethodCanBeInvoked()
    {
        $proxy = new Proxy(new Foo);
        $this->assertEquals('result', $proxy->protectedMethod());
    }

    public function testPrivateMethodCanBeInvoked()
    {
        $proxy = new Proxy(new Foo);
        $this->assertEquals('result', $proxy->privateMethod());
    }

    public function testPublicAttributeCanBeRead()
    {
        $proxy = new Proxy(new Foo);
        $this->assertEquals('value', $proxy->publicAttribute);
    }

    public function testProtectedAttributeCanBeRead()
    {
        $proxy = new Proxy(new Foo);
        $this->assertEquals('value', $proxy->protectedAttribute);
    }

    public function testPrivateAttributeCanBeRead()
    {
        $proxy = new Proxy(new Foo);
        $this->assertEquals('value', $proxy->privateAttribute);
    }

    public function testPublicAttributeCanBeWritten()
    {
        $proxy = new Proxy(new Foo);
        $proxy->publicAttribute = 'new value';

        $this->assertEquals('new value', $proxy->publicAttribute);
    }

    public function testProtectedAttributeCanBeWritten()
    {
        $proxy = new Proxy(new Foo);
        $proxy->protectedAttribute = 'new value';

        $this->assertEquals('new value', $proxy->protectedAttribute);
    }

    public function testPrivateAttributeCanBeWritten()
    {
        $proxy = new Proxy(new Foo);
        $proxy->privateAttribute = 'new value';

        $this->assertEquals('new value', $proxy->privateAttribute);
    }
}
