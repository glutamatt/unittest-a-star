<?php

class DemoTest extends PHPUnit_Framework_TestCase
{
    public function testDemo()
    {
        $this->assertTrue(1 === 1);

        $this->assertEquals(2 , 1 + 1, '3  === test ===  1 + 1');

        $this->assertContains('demo', 'i do a demo');
    }

    public function testFail()
    {
        $this->assertTrue(43 === 43);
    }

    public function testQuiSePlanteTropSouvent()
    {
        $this->markTestSkipped('Fix this random test');
        $this->assertGreaterThan(10, mt_rand(0, 20));
    }

    public function testAfaireMaisFlemme()
    {
        $this->markTestIncomplete('Too Lazy but worth it');
    }
}
