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

class Proxy
{
    /**
     * @var object
     */
    private $object;

    /**
     * @param  object $object
     * @throws InvalidArgumentException
     */
    public function __construct($object)
    {
        $this->ensureArgumentIsObject($object);

        $this->object = $object;
    }

    /**
     * @param  string $name
     * @param  array  $arguments
     * @return mixed
     */
    public function __call($name, array $arguments)
    {
        try {
            $method = new \ReflectionMethod($this->object, $name);
        } catch (\ReflectionException $e) {
            throw new BadMethodCallException(
                sprintf(
                    'Call to undefined method %s::%s()',
                    get_class($this->object),
                    $name
                )
            );
        }

        $method->setAccessible(true);

        return $method->invokeArgs($this->object, $arguments);
    }

    /**
     * @param  object $object
     * @throws InvalidArgumentException
     */
    private function ensureArgumentIsObject($object)
    {
        if (!is_object($object)) {
            throw new InvalidArgumentException('Argument must be an object');
        }
    }
}
