<?php

class RunningTest extends \PHPUnit\Framework\TestCase
{
    public function testRun1()
    {
        $answer = <<<OPT
Steps: 31
Time:  ???

WWWWWWWWWWWW
WXXXW SXXWXE
WXWXXWWWXWXW
WXW XXXXXWXW
WXWWWWWWWWXW
WXXXXXXXXXXW
WWWWWWWWWWWW
31

OPT;

        $mrdr = new MazeReader('/home/matt/projects/deezer/workshop-phpunit/astar-php/examples/mazes/maze1.txt');
        $maze = $mrdr->read();
        $solver = new AStarSolver();
        $path = $solver->solve($maze);
        $output = fopen('php://memory', 'x+');
        $mwrt = new MazeWriter($maze, $path, $output);
        $mwrt->write('text/plain');

        fseek($output, 0);
        $this->assertEquals($answer, fread($output, 1000));
    }
}