<?php

class DemoTest extends PHPUnit_Framework_TestCase
{
    public function testDemo()
    {
        $this->assertTrue(1 === 1);
    }

    public function testFail()
    {
        $this->assertFalse(43 === 43);
    }
}
