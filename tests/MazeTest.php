<?php

class MazeTest extends \PHPUnit\Framework\TestCase
{
    public function testNewInstance()
    {
        $maze = new Maze();
        $this->assertInstanceOf('Maze', $maze);

        return $maze;
    }

    /**
     * @param Maze $m
     * @depends testNewInstance
     */
    public function testMethod(Maze $m)
    {
        $m->setStartNode(23);
        $this->assertEquals(23 , $m->getStartIndex());
        $m->setGoalNode(55);
        $this->assertEquals(55, $m->getGoalIndex());
    }
}
