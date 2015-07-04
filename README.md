# Peek and Poke Proxy

Proxy for accessing non-public attributes and methods of an object.

## Installation

To add Peek and Poke Proxy as a local, per-project dependency to your project, simply add a dependency on `sebastian/peek-and-poke` to your project's `composer.json` file. Here is a minimal example of a `composer.json` file that just defines a dependency on Peek and Poke Proxy 1.0:

    {
        "require": {
            "sebastian/peek-and-poke": "1.0.*"
        }
    }

## Usage

```php

namespace Acme\Test\Foo;
use SebastianBergmann\PeekAndPoke\Proxy;
use Acme\Foo\Bar;

class BarTest extends \PHPUnit_Framework_TestCase
{
    public function testSomeProtectedMethod()
    {
        $targetObject = new Bar();
        $proxy = new Proxy($targetObject);
        $this->assertEquals('result', $proxy->protectedMethod());
    }
}
```
