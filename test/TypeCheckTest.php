<?php

namespace Test\WPUtil;

use PHPUnit\Framework\TestCase;
use WPUtil\TypeCheck;

interface TypeCheckFoo {
    public function foo();
    public function test();
}

class NG1 {
    public function bar() {}
}

class NG2 {
    public function foo() {}
}

class OK {
    public function foo() {}
    public function test() {}
}

class TypeCheckTest extends TestCase
{
    public function testCheck()
    {
        // scalar
        $this->assertFalse(TypeCheck::check(TypeCheckFoo::class, 1));
        $this->assertFalse(TypeCheck::check(TypeCheckFoo::class, 'foo'));

        // object
        $this->assertFalse(TypeCheck::check(TypeCheckFoo::class, new NG1()));
        $this->assertFalse(TypeCheck::check(TypeCheckFoo::class, new NG2()));
        $this->assertTrue(TypeCheck::check(TypeCheckFoo::class, new OK()));
    }
}
