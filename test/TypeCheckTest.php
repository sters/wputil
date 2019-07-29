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
    /**
     * @dataProvider checkProvider
     */
    public function testCheck($enabled, $instance, $expect)
    {
        if ($enabled) {
            TypeCheck::enable();
        } else {
            TypeCheck::disable();
        }

        $result = TypeCheck::check(TypeCheckFoo::class, $instance);
        $this->assertEquals($expect, $result);
    }

    public function checkProvider()
    {
        // enabled, instance, assert
        return [
            [false, 1, true],
            [false, 'foo', true],
            [false, new NG1(), true],
            [false, new NG2(), true],
            [false, new OK(), true],
            [true, 1, false],
            [true, 'foo', false],
            [true, new NG1(), false],
            [true, new NG2(), false],
            [true, new OK(), true],
        ];
    }
}
