<?php

class RunningTest extends \PHPUnit\Framework\TestCase
{
    protected $output;

    protected function setUp()
    {
        $this->output = fopen('php://memory', 'x+');
    }

    protected function tearDown()
    {
        fclose($this->output);
    }

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
        $mwrt = new MazeWriter($maze, $path, $this->output);
        $mwrt->write('text/plain');

        fseek($this->output, 0);
        $out = fread($this->output, 1000);
        $this->assertEquals($answer, $out);
    }

    public function testOutput()
    {
        fwrite($this->output, 'toto2');
        fseek($this->output, 0);
        $this->assertEquals('toto', fread($this->output, 4));
    }

    public function testException()
    {
        $file = '/tmp/test' . mt_rand();
        file_put_contents($file, mt_rand());
        new MazeReader($file);
        $this->expectException(FileNotFoundException::class);
        new MazeReader('tototo');
    }
}
