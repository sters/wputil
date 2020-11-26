<?php

namespace Test\WPUtil\Filter;

use PHPUnit\Framework\TestCase;
use WPUtil\Filter\Filter;
use WPUtil\Filter\Register;

class FakeFilter extends Filter
{
    public $callAdd = 0;
    public $callRemove = 0;

    public function add()
    {
        $this->callAdd++;
    }

    public function remove()
    {
        $this->callRemove++;
    }
}

class RegisterTest extends TestCase
{
    public function testRegister()
    {
        $register = new Register;
        $filter1 = new FakeFilter;
        $filter2 = new FakeFilter;

        $register->add($filter1);
        $register->remove($filter2);
        $register->register();

        $this->assertEquals(1, $filter1->callAdd);
        $this->assertEquals(0, $filter1->callRemove);
        $this->assertEquals(0, $filter2->callAdd);
        $this->assertEquals(1, $filter2->callRemove);
    }
}
