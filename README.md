[![Build Status](https://img.shields.io/travis/sebastianbergmann/peek-and-poke/master.svg?style=flat-square)](https://travis-ci.org/sebastianbergmann/peek-and-poke)

# Peek and Poke Proxy

Proxy for accessing non-public attributes and methods of an object.

## Installation

To add Peek and Poke Proxy as a local, per-project dependency to your project, simply add a dependency on `sebastian/peek-and-poke` to your project's `composer.json` file. Here is a minimal example of a `composer.json` file that just defines a dependency on Peek and Poke Proxy 1.0:

```JSON
{
    "require": {
        "sebastian/peek-and-poke": "1.0.*"
    }
}
```

## Usage

```php
class Foo
{
    private $bar = 'baz';

    private function notPublic()
    {
        print __METHOD__ . PHP_EOL;
    }
}

$foo   = new Foo;
$proxy = new SebastianBergmann\PeekAndPoke\Proxy($foo);

print $proxy->bar . PHP_EOL;
$proxy->notPublic();
```

```
baz
Foo::notPublic
```

