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
}
