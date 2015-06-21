<?php
namespace SebastianBergmann\PeekAndPoke;

class Foo
{
    public $publicAttribute = 'value';
    protected $protectedAttribute = 'value';
    private $privateAttribute = 'value';

    public function publicMethod()
    {
        return 'result';
    }

    protected function protectedMethod()
    {
        return 'result';
    }

    private function privateMethod()
    {
        return 'result';
    }
}
