<?php

class RunningTest extends \PHPUnit\Framework\TestCase
{
    public function getMazes()
    {
        return [
            ['maze1.txt', 'solution1.txt'],
            ['maze2.txt', 'sol2.txt'],
            ['maze3.txt', 'sol3'],
            ['tiny.txt', 'tiny.txt'],
        ];
    }

    /**
     * @dataProvider getMazes
     */
    public function testRun1($mazeFile, $solutionFile)
    {
        $answer = file_get_contents('/home/matt/projects/deezer/workshop-phpunit/astar-php/examples/solutions/' . $solutionFile);
        $mrdr = new MazeReader('/home/matt/projects/deezer/workshop-phpunit/astar-php/examples/mazes/' . $mazeFile);

        $maze = $mrdr->read();
        $solver = new AStarSolver();
        $path = $solver->solve($maze);
        $output = fopen('php://memory', 'x+');
        $mwrt = new MazeWriter($maze, $path, $output);
        $mwrt->write('text/plain');

        fseek($output, 0);
        $out = fread($output, 1000);
        $this->assertEquals($answer, $out);
    }
}
