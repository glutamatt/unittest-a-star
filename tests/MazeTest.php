<?php

class MazeTest extends \PHPUnit\Framework\TestCase
{
    public function testNewInstance()
    {
        $maze = new Maze();
        $this->assertInstanceOf('Maze', $maze);
    }

    public function testMethod()
    {
        $m = new Maze();
        $m->setStartNode(23);
        $this->assertEquals(23 , $m->getStartIndex());

        $m->setGoalNode(55);

        $this->assertEquals(55, $m->getGoalIndex());
    }
}
