<?php

class MazeTest extends \PHPUnit\Framework\TestCase
{
    public function testNewInstance()
    {
        $maze = new Maze();

        $this->assertInstanceOf('Maze', $maze);
    }
}
